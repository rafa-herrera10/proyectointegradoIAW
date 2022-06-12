<html lang="es">
<meta charset="UTF-8">
<header>
<title>Cambiar parámetros</title>
<a href="./indexiniciado.php"><img src="./imagenes/logo_empresa.PNG" width="300" heigth="200"></a>

</header>

<body>
<div>
<h1>Cambiar parámetros</h1>
<form action="" method="post">
    <p>Nuevo nombre de usuario: <input type="text" name="nombre" required></p>
    <p>Nuevo nombre completo: <input type="text" name="entero" required></p>
    <p>Nuevo correo: <input type="email" name="correo" required></p>
        <p>Nueva contraseña: <input type="password" name="password" required></p>
        <p>Confirmar contraseña: <input type="password" name="password2" required></p>
        <input type="submit" name="cambiar" value="Cambiar" class='button'>
    <?php
    session_start();
    include "funciones.php";


    if (isset($_POST["cambiar"])){
        echo actualizar();
        
    }
    ?>

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