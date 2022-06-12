<html lang="es">
    <meta charset="UTF-8">
<head>
    <title>Eliminar usuario</title>


</head>

<body>
<div>
<h1>Eliminar usuario</h1>
<form action="" method="post">
    <p>¿Desea eliminar la cuenta?</p>
    <p>Sí <input type="radio" name="decision" value="si" required></p>
    <p>No <input type="radio" name="decision" value="no" required></p>
    <input type="submit" name="confirmar" value="Confirmar" class='button'>
</form>

<?php
include "funciones.php";
session_start();

if (isset($_POST['confirmar'])){
    if ($_POST['decision'] == "si"){
    echo eliminar();
    header("Location: ./index.php");
    }
    else {
        header("Location: ./indexiniciado.php");
    }

}

?>

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