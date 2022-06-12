<html lang="es">
<meta charset="UTF-8">
<header>
<title>Ajustes del usuario</title>
<a href="./indexiniciado.php"><img src="./imagenes/logo_empresa.PNG" width="300" heigth="200"></a>

</header>

<body>
<div>
<h1>Ajustes del usuario</h1>
<form action="" method="post">
    <input type="submit" name="cambiar" value="Cambiar parámetros" class='button'>
    <input type="submit" name="borrar" value="Borrar cuenta" class='button'>
    <?php
        if (isset($_POST["cambiar"])){
            header("Location: ./cambiarcuenta.php");
        }
        if (isset($_POST["borrar"])){
            header("Location: ./borrarusuario.php");
        }
    ?>

</form>

</div>
<footer>
<h3><a href="https://twitter.com"><img src="./imagenes/twitter.PNG" width="40" heigth="20"> @superherreras</a></h3>

<h3><a href="https://www.instagram.com"><img src="./imagenes/instagram.PNG" width="40" heigth="20"> superherreras</a></h3>

<h3><a href="https://www.facebook.com/watch/"><img src="./imagenes/facebook.PNG" width="40" heigth="20"> Supermercados Herrera's</a></h3>

</body>
    </footer>

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

</style>



</html>