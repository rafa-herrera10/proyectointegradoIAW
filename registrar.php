<html lang="es">
<meta charset="UTF-8">
<header>
<title>Registrar</title>
<a href="./index.php"><img src="./imagenes/logo_empresa.PNG" width="300" heigth="200"></a>

</header>

<body>
<div>
<h1>Regístrese</h1>
<form action="" method="post">
        <p>Nombre de usuario: <input type="text" name="nombre" required></p>
        <p>Nombre completo: <input type="text" name="entero" required></p>
        <p>Correo: <input type="email" name="correo" required></p>
        <p>Contraseña: <input type="password" name="password" required></p>
        <p>Comfirmar contraseña: <input type="password" name="password2" required></p>
        <input type="submit" name="entrar" value="Entrar" class='button'>
        <?php
session_start();

include "conexion.php";
include "funciones.php";
    if (isset($_POST["entrar"])){

        $_SESSION["nombre"]=$_POST['nombre'];
        $nombreusuario=$_POST['nombre'];
        $nombrecompleto=$_POST['entero'];
        $correo=$_POST['correo'];
        $password=$_POST['password'];
        $password2=$_POST['password2'];

        if (isset($_POST['entrar'])){
            if ($password == $password2) {
                mysqli_select_db($enlace, $basededatos);
                
                $mirada="SELECT * FROM usuarios where nombre_usuario like '%$nombreusuario%';";
        
                $consulta=mysqli_query($enlace, $mirada);
        
                if (mysqli_num_rows ($consulta) <= 0 ) {
                echo registrar();
                header("Location: ./indexiniciado.php");
                } 
                else {
                    echo "El usuario $nombreusuario ya existe";
                }

        }
        else {
            echo 'Las contraseñas no coinciden.';
        }
            }
        }
        mysqli_close($enlace);
        ?>

        <p>¿Ya tienes cuenta?<p>

        <p>Inicie sesión <a href="./iniciosesion.php">aqui</a></p>
</form>
</body>

</div>

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