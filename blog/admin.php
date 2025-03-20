<?php

   $db = new PDO('sqlite:blog.db');
   $query = "SELECT * FROM configuracion";
   $stmt = $db->query($query);

   $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
	
	$query = "SELECT * FROM articulos";
	$stmt = $db->query($query);
	$articulos = $stmt->fetchAll(PDO::FETCH_ASSOC);
	
	$resultado['articulos'] = $articulos;
	if(isset($_GET['insertar'])){$resultado['insertar'] = true;}
	
	$query = "SELECT name AS nombredelcampo FROM pragma_table_info('articulos');";
	$stmt = $db->query($query);
	$columnas = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$resultado['campos'] = $columnas;
	
	include "inc/motor.php";
	
	echo renderTemplate("plantillas/escritorio.html", $resultado);
	
?>
