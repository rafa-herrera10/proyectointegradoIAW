<html lang="es">
<meta charset="UTF-8">
<header>
<title>Borrar usuario</title>
<a href="./indexiniciado.php"><img src="./imagenes/logo_empresa.PNG" width="300" heigth="200"></a>

</header>

<body>
<div>
<h1>Borrar usuario</h1>
<form action="" method="post">
<p>Nombre de usuario: <input type="text" name="nombre" required></p>
        <p>Contraseña: <input type="password" name="password" required></p>
        <p>Confirmar contraseña: <input type="password" name="password2" required></p>
        <p><input type="submit" name="borrar" value="Borrar" class='button'></p>
        <?php
        include "conexion.php";

    
        if (isset($_POST['borrar'])){
            session_start();
            $nombreusuario=$_POST['nombre'];
            $password=$_POST['password'];
            $password2=$_POST['password2'];
        if ($nombreusuario==$_SESSION['nombre']){
            
            if ($password == $password2) {
                mysqli_select_db($enlace, $basededatos);
                $mirada="SELECT * FROM usuarios where nombre_usuario like '%$nombreusuario%';";
        
        $consulta=mysqli_query($enlace, $mirada);

        $contra="SELECT passwd FROM usuarios where nombre_usuario like '%$nombreusuario%' and passwd like '%$password%';";

        $consulta2=mysqli_query($enlace, $contra);
        if (mysqli_num_rows ($consulta) > 0 ) {

            if (mysqli_num_rows ($consulta2) == 1 ) {
                $_SESSION["nombre"]=$_POST['nombre'];
                header("Location: ./confirmacion.php");
                
        }
                else {
                echo "Contraseña incorrecta";
                }
        }
        else {
            echo "El usuario $nombreusuario no existe";
    }
            }
            else {
                echo 'Las contraseñas no coinciden.';
            }
                }
                else {
                    echo "Introduzca el usuario con el que que has iniciado sesión.";
                }

            }

                ?>
</form>

</body>
<div>


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

header {
    display: flex;
    width: 100%;
    flex-direction: row;
    background-color: #F5F1F1;
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


</style>


</html>