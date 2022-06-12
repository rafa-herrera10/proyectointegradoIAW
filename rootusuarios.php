<html lang="es">
<header class='menuroot'>
<title>Configuración de artículos</title>
<a href="./indexiniciado.php"><img src="./imagenes/logo_empresa.PNG" width="250" heigth="125"></a>


<?php
    session_start();

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
<h1>Cambiar usuarios</h1>
    <form action="" method="post">
    <p>Nombre de usuario: <input type="text" name="nombre"></p>
        <p>Nombre completo: <input type="text" name="entero"></p>
        <p>Correo: <input type="email" name="correo"></p>
        <p>Contraseña: <input type="password" name="password"></p>
        <input type="submit" name="insertar" value="Insertar usuario" class='button'>
        <input type="submit" name="modificar" value="Modificar usuario" class='button'>
        <input type="submit" name="eliminar" value="Eliminar usuario" class='button'>
        <input type="submit" name="listar" value="Listar usuarios" class='button'>
        <?php

        include "funciones.php";
        if (isset($_POST['insertar'])){
            echo registrar();
        }

        if (isset($_POST['modificar'])){
            echo modificarroot();
        }

        if (isset($_POST['eliminar'])){
            echo eliminarroot();
        }

        if (isset($_POST['listar'])){
            echo listar();
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


header {
    display: flex;
    width: 100%;
    flex-direction: row;
    background-color: #F5F1F1;
}



.root {
    margin-top:20px;
}


.menuroot {
    display: flex;
    width: 100%;
    flex-direction: row;
    background-color: #F5F1F1;
    justify-content:space-around;
}


</style>


</html>