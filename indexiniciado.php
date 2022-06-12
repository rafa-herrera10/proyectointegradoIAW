<html lang="es">
    <meta charset="UTF-8">

    <?php
    include "conexion.php";
    include "funciones.php";
    session_start();



if ($_SESSION['nombre']=='root'){
    
?>
<header class='menuroot'>
<title>Configuración del administrador</title>
<a href="#"><img src="./imagenes/logo_empresa.PNG" width="250" heigth="125"></a>


<?php

    echo "<nav id='menu' class='root'>
    <ul>
     <li class='nombreusuario'>".$_SESSION['nombre']."
     <ul>
     <li><a href='./ajustesusuario.php'>Ajustes</a></li>
     <li><a href='./index.php'>Cerrar sesión</a></li>
    </ul>
    </li>
    </ul>
    </nav>";
    

?>
    </header>
    <body>
    <div>
    <form action="" method="post">
    <input type="submit" name="articulos" value="Cambiar artículos" class='button'>
    <input type="submit" name="usuarios" value="Cambiar usuarios" class='button'>
    <?php
    if (isset($_POST["articulos"])){
        header("Location: ./rootarticulos.php");
    }
    else if (isset($_POST["usuarios"])){
        header("Location: ./rootusuarios.php");
    }

?>
</form>
</div>
<footer>
<h3><a href="https://twitter.com"><img src="./imagenes/twitter.PNG" width="40" heigth="20"> @superherreras</h3></p>

<h3><a href="https://www.instagram.com"><img src="./imagenes/instagram.PNG" width="40" heigth="20"> superherreras</a></h3>

<h3><a href="https://www.facebook.com/watch/"><img src="./imagenes/facebook.PNG" width="40" heigth="20"> Supermercados Herrera's</a></h3>
</footer>
</body>




<?php
}
else {

?>
<header>
<title>Supermercados Herrera´s</title>
<a href="#"><img src="./imagenes/logo_empresa.PNG" width="250" heigth="125"></a>


<form action="" method="post">
<div class="buscar">
    <input type="search" name="buscar" class="busca">
    <input type="submit" name="enviar" class='button' value='Buscar'>
</div>

<?php

    echo "<nav id='menu' class='normal'>
    <ul>
     <li class='nombreusuario'>".$_SESSION['nombre']."
     <ul>
     <li><a href='./ajustesusuario.php'>Ajustes</a></li>
     <li><a href='./index.php'>Cerrar sesión</a></li>
    </ul>
    </li>
    </ul>
    </nav>";
    

?>


</header>

<body>
    <p>Incluir artículos agotados<input type="checkbox" name="agotado"></p>
    <div>
    <?php
    if (isset($_POST["buscar"])){
            echo busqueda();
        }
        else {

        if (isset($_POST["agotado"])){

            ?>

            </form>
            
            
                <form action="" method="post">
                <?php
                
                mysqli_select_db($enlace, $basededatos);
            
                    $consulta="SELECT * FROM articulos;";
            
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
                            if (isset($_POST["comprar"])){
                                header("Location: ./compra.php");
                            }
                            echo "<hr>";
                        }
                    }
                    else{
                        echo "No hay datos en la tabla articulos";
                    }
            
                    mysqli_free_result($grupo);
                    mysqli_close($enlace);
            
            
                }
        

        else {

    
        ?>

</form>


    <form action="" method="post">
    <?php
    
    mysqli_select_db($enlace, $basededatos);

        $consulta="SELECT * FROM articulos where existencias <> 0;";

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
                if (isset($_POST["comprar"])){
                    header("Location: ./compra.php");
                }
                echo "<hr>";
            }
        }
        else{
            echo "No hay datos en la tabla articulos";
        }

        mysqli_free_result($grupo);
        mysqli_close($enlace);


    }

}

        ?>

</form>
</div>
<footer>
<h3><a href="https://twitter.com"><img src="./imagenes/twitter.PNG" width="40" heigth="20"> @superherreras</h3></p>

<h3><a href="https://www.instagram.com"><img src="./imagenes/instagram.PNG" width="40" heigth="20"> superherreras</h3></p>

<h3><a href="https://www.facebook.com/watch/"><img src="./imagenes/facebook.PNG" width="40" heigth="20"> Supermercados Herrera's</h3></p>
</footer>
<?php

}
?>

<style>
html {
    font-family: Arial, Helvetica, sans-serif;
    
}


div {
  display: block;
  width: 100%;
  padding: 15px;
  border: none;
  margin-bottom: 5px;
  box-sizing: border-box;
  font-size: 1rem;
  text-align: center;
  text-decoration: none;
  background-color: #FFFFFF;
}



footer {
  width: 100%;
  display: inline-flex;
  background: #676666;
  text-align: center;
  font-size: 18px;
  color: white;
  justify-content: space-around;
}


footer a {
    color: white;
    text-decoration: none;
}


header {
    display: flex;
    width: 100%;
    flex-direction: row;
    background-color: #F5F1F1;
}



.root {
    margin-top:20px;
}


.normal{
    margin-left:800px;
}


#menu ul li {
    background-color: #0F22AB;
    border: none;
    color: white;
    padding: 10px 25px;
    text-align: center;
    text-decoration: none;
    font-size: 14px;
}

#menu ul {
  list-style:none;
  margin:0;
  padding:0;
}

#menu ul a {
  display:block;
  color:#fff;
  text-decoration:none;
  font-weight:400;
  font-size:14px;
  padding:15px;
}

 #menu ul li {
  position:relative;
  float:left;
}

#menu ul li:hover {
  background:#5b78a7;
} 

#menu ul ul {
  display:none;
  position:absolute;
  top:100%;
  left:0;
  padding:0;
}

#menu ul ul li {
  float:none;
  width:150px
}

#menu ul ul a {
  line-height:120%;
  padding:10px 15px;
}

#menu ul li:hover > ul {
  display:block;
}


.buscar{
    background-color: #F5F1F1;
    margin-bottom:0px;
  margin-right: 600px;
  margin-left: 0px;

}

.button {
    background-color: #0F22AB;
    border: none;
    color: white;
    padding: 10px 25px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
}

.busca{
    padding-left:60px;
    padding-top:5px;
    padding-bottom:5px;
}



.menuroot {
    display: flex;
    width: 100%;
    flex-direction: row;
    background-color: #F5F1F1;
    justify-content:space-around;
}

</style>


</body>
</html>