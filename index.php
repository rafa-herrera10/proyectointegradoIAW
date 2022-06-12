<html lang="es">
    <meta charset="UTF-8">

    <?php
include "conexion.php";
include "funciones.php";
?>
<header>
    <title>Supermercados Herrera´s</title>
<a href="./index.php"><img src="./imagenes/logo_empresa.PNG" width="250" heigth="125"></a>


<div class="buscar">
<form action="" method="post">
    <input type="search" name="buscar" class="busca">
    <input type="submit" name="enviar" class='button' value='Buscar'>
</div>
    <a href="./iniciosesion.php"><input type="button" name="inicioseesion" value="Iniciar sesión" class="inicio"></a>

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
            
            
                <form action="./iniciosesion.php" method="post">
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


    <form action="./iniciosesion.php" method="post">
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

<h3><a href="https://twitter.com"><img src="./imagenes/twitter.PNG" width="40" heigth="20"> @superherreras</a></h3>

<h3><a href="https://www.instagram.com"><img src="./imagenes/instagram.PNG" width="40" heigth="20"> superherreras</a></h3>

<h3><a href="https://www.facebook.com/watch/"><img src="./imagenes/facebook.PNG" width="40" heigth="20"> Supermercados Herrera's</a></h3>

</footer>

</body>


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


a {
    color: white;
    text-decoration: none;
}

header {
    display: flex;
    width: 100%;
    justify-content:space-around;
    flex-direction: row;
    background-color: #F5F1F1;
}


.buscar{
    background-color: #F5F1F1;

    margin-bottom:0px;
  margin-left: 17px;


}


.inicio{
    margin-right: 100px;
    margin-bottom:0px;
    margin-top:10px;
    background-color: #0F22AB;
    border: none;
    color: white;
    padding: 10px 25px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
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

</style>


</html>