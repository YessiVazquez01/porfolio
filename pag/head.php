<?php ob_start(); #esto evita los errores de envios de headers
set_error_handler("var_dump");
include 'conexion.php';
session_start();

if(!isset($_SESSION['usuario'])){
	header('location:../index.php');
}else{
	if($_SESSION['usuario'] != 'Yessi Vazquez'){
		header('location:../index.php');
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="img/icon.png">
	<!-- Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<!-- Font Awesome -->
	<script src="https://kit.fontawesome.com/7b655c434c.js" crossorigin="anonymous"></script>
	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Bad+Script&family=Bangers&family=Tangerine:wght@400;700&family=Yuji+Boku&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" href="../CSS/estilo.css">
	<title>Administrador</title>
</head>