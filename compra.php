<html lang="es">
    <meta charset="UTF-8">
<header>
    <title>Confimación de compra</title>

</header>

<body>

<div>

    <h1>Confimación de compra</h1>
    <h2>Introduzca el nombre del producto para comprarlo</h2>

<form action="" method="post">
    <p><input type="text" name="producto" required></p>
    <p>¿Desea comprarlo?</p>
    <p>Sí <input type="radio" name="decision" value="si" required></p>
    <p>No <input type="radio" name="decision" value="no" required></p>
    <p><input type="submit" name="confirmar" value="Confirmar" class='button'>
 <?php
include "conexion.php";
include "funciones.php";
echo "Cantidad: "; 
echo "<select name='cantidad'>";
for ($i=0;$i<=100;$i++){
    echo "<option>" .$i. "</option></p>";
    ;
}
echo "</select>";


if (isset($_POST['confirmar'])){

    if ($_POST['decision'] == "si"){
            echo comprar();
        }
        else if ($_POST['decision'] == "no") {
        header("Location: ./indexiniciado.php");
    }
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