<?php

include "conexion.php";


$creadBD = "CREATE DATABASE $basededatos";

mysqli_query($enlace, $creadBD);

$resultadobase = mysqli_select_db($enlace, $basededatos);
    if (!$resultadobase){
        echo "La base de datos no se creó o está ya creada\n";
    }
    else{
        echo "La base de datos se creó correctamente\n";
    }


    $usuarios="CREATE TABLE usuarios(
		nombre_usuario varchar(15) PRIMARY KEY,
		nombre_completo varchar(50) NOT NULL,
		email varchar(255) NOT NULL,
		passwd varchar(20) NOT NULL);";

    $articulos="CREATE TABLE articulos(
		id_articulos char(4) PRIMARY KEY,
    	nombre_proveedor varchar(40) NOT NULL,
		nombre varchar(40) NOT NULL,
		descripcion text,
		existencias char(3),
		precio char(8),
		imagen varchar(255));";

    $compras="CREATE TABLE compras(
		id_compras int AUTO_INCREMENT PRIMARY KEY,
		nombreusuario varchar(20) NOT NULL,
		fecha date,
		hora time(5),
    	FOREIGN KEY fk_usuario(nombreusuario) REFERENCES usuarios(nombre_usuario));";

    $guarda="CREATE TABLE guarda(
    id_guarda int AUTO_INCREMENT PRIMARY KEY,
    codigo_compras int NOT NULL,
    codigo_articulo char(4) NOT NULL,
    cantidad char(4),
    importe char(8),
    FOREIGN KEY fk_compras(codigo_compras) REFERENCES compras(id_compras),
    FOREIGN KEY fk_articulo(codigo_articulo) REFERENCES articulos(id_articulos));";

    $crearusuarios=mysqli_select_db($enlace, $basededatos);

if ($crearusuarios){
    mysqli_query($enlace, $usuarios);
    echo "Las tabla usuarios se creó correctamente";
}
else{
    echo "Las tabla usuarios no se creó\n";
}

    $creararticulos=mysqli_select_db($enlace, $basededatos);

if ($creararticulos){
    mysqli_query($enlace, $articulos);
    echo "Las tabla articulos se creó correctamente\n";
}
else{
    echo "Las tabla articulos no se creó\n";
}

    $crearcompras=mysqli_select_db($enlace, $basededatos);

if ($crearcompras){
    mysqli_query($enlace, $compras);
    echo "Las tabla compras se creó correctamente\n";
}
else{
    echo "Las tabla compras no se creó\n";
}

    $crearguarda=mysqli_select_db($enlace, $basededatos);

if ($crearguarda){
    mysqli_query($enlace, $guarda);
    echo "Las tabla guarda se creó correctamente\n";
}
else{
    echo "Las tabla guarda no se creó\n";
}

$insertarusu="INSERT INTO USUARIOS VALUES ('root','root','supermercadosherrera@gmail.com','Sudo_su14'),
('rafithaaah','Rafael Muñoz Gamero','rafamunozgamero66@gmail.com','Ivanycarmen_66'),
('marisa_eh03','María Luisa Esteban Herrera','marisaesteban789@hotmail.com','Toro_765'),
('amalia_antunez_','María Amalia Antúnez Guisado','mariamaliaantunezg53@gmail.com','Alcallata.3'),
('Andreaaaa_','Andrea José López Ugarte','andreaalopen777@gmail.com','Muriel$99'),
('pabloms_8','Pablo De la Santísima Trinidad Macho Sánchez','pablomacho777omg@hotmail.com','Gordobroncas_77'),
('D10S_delfutbol','Diego Armando Nazario Natera','diegonazarionatera@yahoo.com','Messi_10'),
('lau_20muriel','Laura Hereida Muriel','lauraherediamuriel@gmail.com','Illojuan_94');";

$usuariosinsert=mysqli_select_db($enlace, $basededatos);

if ($usuariosinsert){
    mysqli_query($enlace, $insertarusu);
    echo "Usuarios insertados\n";
}
else{
    echo "Usuarios no insertados\n";
}

$insertararti="INSERT INTO ARTICULOS VALUES (1,'Unilever','Crema de calabaza Knorr 1L','Deliciosa crema hecha con ingredientes naturales que aportará el 56% de las verduras diarias recomendadas.',20,1.99,'./imagenes/crema_knorr.jpg'),
(2,'Cruzcampo','Cruzcampo 1L','Cerveza lager, tipo Pilsen, con un contenido alcohólico de 4,8% en volumen.',100,1.22,'./imagenes/cruzcampo_1_litro.jpg'),
(3,'Pepsico','Doritos Chilli 140g','Una experiencia sólo apta para aquellos que quieran disfrutar intensamente del auténtico picante sabor a chilli. ¿Te atreves a probarlos?',20,1.62,'./imagenes/doritos_chilli.jpg'),
(4,'Coca-Cola','Coca-cola 2L','La de siempre, original y deliciosa, la que refresca a millones de personas en todo el mundo.',20,1.84,'./imagenes/cocacola_2_litros.jpg'),
(5,'Idilia Foods','ColaCao 770g','El ColaCao de siempre, eso tan tuyo. La mezcla de sus ingredientes se realiza de manera natural y sin añadir aditivos.',40,6.96,'./imagenes/colacao.jpg'),
(6,'Cruzcampo','Pack 6 Cruzcampo radler 25cl','Cerveza Cruzcampo, fusionada con zumo natural de limón, crea una experiencia doblemente refrescante ideal para disfrutar en cualquier ocasión.',80,3.20,'./imagenes/cruzcampo_radler.jpg'),
(7,'Idilia Foods','Colacao Noir 300gr','ColaCao Noir es un ColaCao más intenso, y delicioso, adaptado al paladar adulto.',60,3.76,'./imagenes/colacao_noir.jpg'),
(8,'Unilever','Mayonesa Ligeresa 450ml','Mejora el sabor de tus platos con Ligeresa. Su delicioso sabor y textura rugosa son el aliado perfecto para mezclar con tus ingredientes favoritos.',16,1.88,'./imagenes/mayonesa-ligeresa.jpg'),
(9,'Coca-Cola','Coca-cola zero 2L','Zero es una de las variantes no calóricas de Coca-Cola para ofrecer más opciones de productos sin calorías y satisfacer los deseos de las personas.',60,1.84,'./imagenes/cocacola_zero_2_litros.jpg'),
(10,'Argal','Argal Bonnatur jamon cocido 140 gr','Jamón Cocido Extra de la mejor calidad, con un 92% de carne de cerdo seleccionada. Elaborado a partir de jamones enteros y frescos.',23,2.29,'./imagenes/argal_bonnatur.jpg'),
(11,'Pepsico','Pepsi Cola 2L','¿Estás cansado de Coca-cola y de su bebida quita óxidos? Prueba la Pepsi, más sabor y mejor acompañante de tus momentos.',2,1.52,'./imagenes/pepsi.jpg'),
(12,'Argal','Paté Argal Hígado de cerdo 240g','Paté de Hígado de cerdo, ligeramente especiado, de sabor suave y fácil de untar. Formato de fácil apertura. Sabor suave y textura uniforme.',46,1.25,'./imagenes/argal_pate.jpg');";

$articulosinsert=mysqli_select_db($enlace, $basededatos);

if ($articulosinsert){
    mysqli_query($enlace, $insertararti);
    echo "Articulos insertados\n";
    mysqli_close($enlace);
}
else{
    echo "Articulos no insertados\n";
    mysqli_close($enlace);
}


?>