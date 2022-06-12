<?php



function busqueda(){
    include "conexion.php";
    echo "<hr>";

    $nombre=$_POST['buscar'];

    mysqli_select_db($enlace, $basededatos);

    $consulta="SELECT * FROM articulos where nombre like '%$nombre%';";

    $grupo=mysqli_query($enlace, $consulta);
    
    if (mysqli_num_rows ($grupo) > 0 ) {
        while ($fila=mysqli_fetch_array($grupo)){
            ?>
            <img src="<?php echo $fila['imagen'] ?>" width="120" heigth="80">
        <?php
           $existencias=$fila['existencias'];
           echo "<br>";
           echo $fila["nombre"];
           echo "<br>";
           echo $fila["descripcion"];
           echo "<br>";
           echo $fila["precio"];
           echo " €";
           echo "<br>";
           echo "Existencias: " .$fila['existencias'];
           echo "<br>";
           echo "<br>";
           echo "<input type='submit' value='Comprar' name='comprar' class='button'>";
           echo "<hr>";
        }
    }
    else{
        echo "No se encontró nada";
    }

    mysqli_free_result($grupo);
    mysqli_close($enlace);
}

function registrar(){
    include "conexion.php";

    
        mysqli_select_db($enlace, $basededatos);
        $nombreusuario=$_POST['nombre'];
        $nombrecompleto=$_POST['entero'];
        $correo=$_POST['correo'];
        $password=$_POST['password'];

        $insertardatos = "INSERT INTO usuarios (nombre_usuario, nombre_completo, email, passwd) VALUES ('$nombreusuario', '$nombrecompleto', '$correo', '$password');";

        mysqli_query($enlace, $insertardatos);
 
        mysqli_close($enlace);

}


function comprar(){
    include "conexion.php";
    session_start();
    $nombre=$_SESSION['nombre'];

    mysqli_select_db($enlace, $basededatos);
    $producto=$_POST['producto'];
    $cantidad=$_POST['cantidad'];

    $mirada="SELECT * FROM articulos where nombre like '%$producto%';";
        
        $consulta=mysqli_query($enlace, $mirada);
    
            if (mysqli_num_rows ($consulta) > 0) {


    while ($fila=mysqli_fetch_array($consulta)){
    $existencias=$fila['existencias'];
    $codigo=$fila['id_articulos'];
    $importe=$fila['precio'];

    $total="$existencias - $cantidad";

        if ($total > 0) {
    
    $compra="UPDATE articulos SET existencias=$total WHERE nombre like '%$producto%';";

    mysqli_query($enlace, $compra);


    $apuntes="INSERT INTO COMPRAS (nombreusuario, fecha, hora) VALUES ('$nombre',CURRENT_DATE,CURRENT_TIME);";

    mysqli_query($enlace, $apuntes);

    $id_compras="SELECT * FROM compras where nombreusuario like '%$nombre%';";
        
    $consulta2=mysqli_query($enlace, $id_compras);

    while ($tupla=mysqli_fetch_array($consulta2)){

        $id=$tupla['id_compras'];
        $importetotal=$cantidad * $importe;

    

     $guarda="INSERT INTO GUARDA (codigo_compras, codigo_articulo, cantidad, importe) VALUES ($id, $codigo, $cantidad ,$importetotal);";

     mysqli_query($enlace, $guarda);

     header("Location: ./indexiniciado.php");

}
}
else {
echo "Sobrepasa su cantidad";

}

}

}
else {
    echo "El producto no existe";
}
}

function actualizar(){
    include "conexion.php";
    mysqli_select_db($enlace, $basededatos);

    if (isset($_POST['cambiar'])){
        $nombreantiguo=$_SESSION['nombre'];
        $nombreusuario=$_POST['nombre'];
        $nombrecompleto=$_POST['entero'];
        $correo=$_POST['correo'];
        $password=$_POST['password'];
        $password2=$_POST['password2'];
        if ($password == $password2) {

        $mirada="SELECT * FROM usuarios where nombre_usuario like '%$nombreusuario%';";
        
        $consulta=mysqli_query($enlace, $mirada);
    
            if (mysqli_num_rows ($consulta) <= 0 || $nombreantiguo == $nombreusuario) {


    $actualizar="UPDATE usuarios SET nombre_usuario='$nombreusuario', nombre_completo='$nombrecompleto', email='$correo', passwd='$password' WHERE nombre_usuario like '%$nombreantiguo%';";

    mysqli_query($enlace, $actualizar);

    

            } 
            else {
                echo "El usuario $nombreusuario ya existe";
            }

    }
    else {
        echo 'Las contraseñas no coinciden.';
    }
        }
        $_SESSION["nombre"]=$_POST['nombre'];
        mysqli_close($enlace);
    }


    function eliminar(){
        include "conexion.php";
        mysqli_select_db($enlace, $basededatos);

        $nombreusuario=$_SESSION['nombre'];

        $eliminar="DELETE FROM usuarios WHERE nombre_usuario like '%$nombreusuario%';";

        mysqli_query($enlace, $eliminar);


        mysqli_close($enlace);
    }


    
function modificarroot(){
    include "conexion.php";
    mysqli_select_db($enlace, $basededatos);

    if (isset($_POST['modificar'])){
        $nombreusuario=$_POST['nombre'];
        $nombrecompleto=$_POST['entero'];
        $correo=$_POST['correo'];
        $password=$_POST['password'];

        $mirada="SELECT * FROM usuarios where nombre_usuario like '%$nombreusuario%';";
        
        $consulta=mysqli_query($enlace, $mirada);
    
            if (mysqli_num_rows ($consulta) > 0) {


    $actualizar="UPDATE usuarios SET nombre_completo='$nombrecompleto', email='$correo', passwd='$password' WHERE nombre_usuario like '%$nombreusuario%';";

    mysqli_query($enlace, $actualizar);

            } 
            else {
                echo "El usuario $nombreusuario no existe";
            }

        }
        mysqli_close($enlace);
    }


    function eliminarroot(){
        include "conexion.php";
        $nombreusuario=$_POST['nombre'];
        mysqli_select_db($enlace, $basededatos);
        $mirada="SELECT * FROM usuarios where nombre_usuario like '%$nombreusuario%';";
        
        $consulta=mysqli_query($enlace, $mirada);

        if (mysqli_num_rows ($consulta) > 0) {
    

        $nombreusuario=$_POST['nombre'];

        $eliminar="DELETE FROM usuarios WHERE nombre_usuario like '%$nombreusuario%';";

        mysqli_query($enlace, $eliminar);
    }
        else {
            echo "El usuario $nombreusuario no existe";
        }

        mysqli_close($enlace);
    }



    function listar(){
        include "conexion.php";
        $nombreusuario=$_POST['nombre'];
        mysqli_select_db($enlace, $basededatos);

        $busqueda="SELECT * FROM usuarios where nombre_usuario like '%$nombreusuario%' order by nombre_usuario;";

        $consulta=mysqli_query($enlace, $busqueda);

        if (mysqli_num_rows ($consulta) > 0 ) {
            while ($fila=mysqli_fetch_array($consulta)){
                echo "<br>";
                echo "*********Datos del usuario ".$fila["nombre_usuario"]. "*************";
                echo "<br>";
                echo "Nombre completo: ".$fila["nombre_completo"];
                echo "<br>";
                echo "Correo: ".$fila["email"];
                echo "<br>";
                echo "(ATENCIÓN: intenta no ser vigilado). Su contraseña es ".$fila["passwd"];
                echo "<br>";
            }
        }
        else{
            echo "No se encontró datos";
        }

        mysqli_free_result($consulta);
        mysqli_close($enlace);

    }




    function listarproductos(){
        include "conexion.php";
        echo "<hr>";
    
        $codigo=$_POST['codigo'];
        $nombre=$_POST['nombre'];
        $proveedor=$_POST['proveedor'];
    
        mysqli_select_db($enlace, $basededatos);
    
        $consulta="SELECT * FROM articulos where id_articulos like '%$codigo%' and nombre like '%$nombre%' and nombre_proveedor like '%$proveedor%';";
    
        $grupo=mysqli_query($enlace, $consulta);
        
        if (mysqli_num_rows ($grupo) > 0 ) {
            while ($fila=mysqli_fetch_array($grupo)){
                echo "<br>";
                echo "<br>";
                ?>
                <img src="<?php echo $fila['imagen'] ?>" width="120" heigth="80">
            <?php
               echo "<br>";
               echo $fila["nombre"];
               echo "<br>";
               echo $fila["descripcion"];
               echo "<br>";
               echo $fila["precio"];
               echo " €";
               echo "<br>";
               echo "Existencias: " .$fila['existencias'];
               echo "<br>";
            }
        }
        else{
            echo "No se encontró nada";
        }
    
        mysqli_free_result($grupo);
        mysqli_close($enlace);
    }



    function eliminarproducto(){
        include "conexion.php";
        $codigo=$_POST['codigo'];
        mysqli_select_db($enlace, $basededatos);

        $mirada="SELECT * FROM articulos where id_articulos = $codigo or where nombre like '%$producto%';";
        
        $consulta=mysqli_query($enlace, $mirada);

        if (mysqli_num_rows ($consulta) > 0) {

        $eliminar="DELETE FROM articulos WHERE id_articulos = $codigo;";

        mysqli_query($enlace, $eliminar);
    }
        else {
            echo "Ese producto no existe";
        }

        mysqli_close($enlace);
    }


    function registrarproducto(){
        include "conexion.php";
    
            mysqli_select_db($enlace, $basededatos);
            
            $codigo=$_POST['codigo'];
            $proveedor=$_POST['proveedor'];
            $nombre=$_POST['nombre'];
            $descripcion=$_POST['descripcion'];
            $existencias=$_POST['existencias'];
            $precio=$_POST['precio'];
            $imagen=$_POST['imagen'];

            $mirada="SELECT * FROM articulos where id_articulos = $codigo;";
        
            $consulta=mysqli_query($enlace, $mirada);
    
            if (mysqli_num_rows ($consulta) <= 0) {

            $insertardatos = "INSERT INTO articulos(id_articulos, nombre_proveedor, nombre, descripcion, existencias, precio, imagen) 
            VALUES ('$codigo', '$proveedor', '$nombre', '$descripcion', '$existencias', '$precio', '$imagen');";
    
            mysqli_query($enlace, $insertardatos);
        }
        else {
            echo "Ese producto ya existe";
        }
     
            mysqli_close($enlace);
    
    }



    function modificarproducto(){
        include "conexion.php";
        mysqli_select_db($enlace, $basededatos);
            
        $codigo=$_POST['codigo'];
        $proveedor=$_POST['proveedor'];
        $nombre=$_POST['nombre'];
        $descripcion=$_POST['descripcion'];
        $existencias=$_POST['existencias'];
        $precio=$_POST['precio'];
        $imagen=$_POST['imagen'];

        $mirada="SELECT * FROM articulos where id_articulos = $codigo;";
    
        $consulta=mysqli_query($enlace, $mirada);
        
                if (mysqli_num_rows ($consulta) > 0) {
    
    
        $actualizar="UPDATE articulos SET nombre_proveedor='$proveedor', nombre='$nombre', descripcion='$descripcion', existencias='$existencias', precio='$precio', imagen='$imagen'
         WHERE id_articulos like '%$codigo%';";
    
        mysqli_query($enlace, $actualizar);
    
                } 
                else {
                    echo "Ese producto no existe";
                }
    

            mysqli_close($enlace);
    }

?>