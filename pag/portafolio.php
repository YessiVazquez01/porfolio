<?php include 'conexion.php'; ?>
<?php 

session_start();

if(!isset($_SESSION['usuario'])){
	header('location:../index.php');
}

$conexion = new conexion();
 /*$sql = "SELECT * FROM `proyectos`";
 $datos = $conexion->consultar($sql);*/
 $proyectos= $conexion->consultar("SELECT * FROM `proyectos`");
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
	<link href="https://fonts.googleapis.com/css2?family=Euphoria+Script&family=Indie+Flower&family=Kalam&family=Rock+Salt&family=Shadows+Into+Light&family=Stalemate&display=swap&family=Bangers&family=Tangerine:wght@400;700&family=Yuji+Boku&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" href="../CSS/estilo.css">
	<title>Mi Portafolio Web</title>
</head>
<body class="fondo">
    <header class="banner">
		<!-- Barra de navegación -->
		<nav class="navbar navbar-expand-lg bg-body-tertiary">
			<div class="container-fluid d-flex justify-content-end">
				<ul class="list-group list-group-horizontal align-items-center">
					<li class="list-group-item">
						<a class="nav-link p-1" href="#Info">Info</a>
				  	</li>	
					<li class="list-group-item">
						<a class="nav-link p-1" href="#Portafolio">Mi Portafolio</a>
				  </li>
				  <li class="list-group-item">
						<a class="nav-link p-1" href="#Contacto">Contacto</a>
				  </li>
					<li class="list-group-item">
						<a class="nav-link" href="cerrar.php"><i class="fa-solid fa-user-xmark fa-2x text-white"></i></a>
					</li>
				</ul>
			</div>
		</nav> 
		<!-- Banner - Nombre -->
		<div class="justify-content-center pt-3">
			<div class="contenido-banner">
				<h1>Yessica Luciana Vázquez</h1>
				<h3>Desarrolladora Full Stack Jr.</h3>
			</div>
		</div>
		<!-- Foto de perfil -->
		<section class="presentacion">
			<div class="col-7 img">
				<img src="../img/foto2.jpg" alt="Foto de perfil" class="rounded-circle foto">
			</div>
		</section>
	</header>
	<!-- Cuerpo -->
	<div class="caja">
		<div id="Info" class="Acerca justify-content-center pt-4">
			<h2 class="h2-index text-center">Acerca de mi</h2>
				<div>
					<p class="p-acerca">Buenas! Me llamo Yessica Luciana Vazquez, soy de Tucuman - Argentina. 
						Comence a sumergirme en el mundo de la programacion cuando vi la carrera de Tecnicatura
						Superior en Desarrollo de Software cuando volvia de mis practicas del Profesorado en Matematica.
						Me dio curiodad saber que era asi que me inscribi (2020), un año despues me recibi como Profe de Mate y otros
						año despues como Tecnica en Desarrollo de Software. </p>
					<p class="p-acerca">Mi fascinación por este mundo apenas empieza.</p>
			  </div>
		</div>

		<div class="proyectos">
			<h2 id="Portafolio" class="text-white text-center pt-4">Mi portafolio</h2>
			<div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center pt-5">
			<?php #leemos proyectos 1 por 1
        	foreach($proyectos as $proyecto){ ?>
            <div class="col">
                  <div class="card h-100">
                    <img src="../img/<?php echo $proyecto['imagen'];?>" class="card-img-top" alt="<?php echo $proyecto['nombre'];?>">
                    <div class="card-body">
                          <h5 class="card-title"><?php echo $proyecto['nombre'];?></h5>
                          <p class="card-text"><?php echo $proyecto['descripcion'];?></p>
                    </div>
                    <div class="card-footer text-center">
                          <small class="text-muted"><a href="<?php echo $proyecto['link'];?>">Visitar pagina</a></small>
                    </div>
                  </div>
            </div>
            <?php } ?>
			</div>
		</div>
		<!-- FOOTER -->
		<section>
			<footer class="text-center text-white">
				<!-- Grid container -->
				<div class="container p-4 pb-0 text-center text-white">
					<div id="Contacto">
						<p class="otros_medios text-center">Medios de comunicacion</p>
					</div>
					<!-- Section: Social media -->
					<section class="mb-4 mt-2">
						<!-- Facebook -->
						<a class="btn btn-outline-light btn-floating m-1" href="https://www.facebook.com/yessica.vazquez.77985" role="button"
						><i class="fab fa-facebook-f"></i
						></a>
					
						<!-- Twitter -->
						<a class="btn btn-outline-light btn-floating m-1" href="https://twitter.com/Yessi_Vazquez" role="button"
						><i class="fab fa-twitter"></i
						></a>
					
						<!-- Instagram -->
						<a class="btn btn-outline-light btn-floating m-1" href="https://www.instagram.com/yessi_vazquez/" role="button"
						><i class="fab fa-instagram"></i
						></a>
					
						<!-- Linkedin -->
						<a class="btn btn-outline-light btn-floating m-1" href="https://www.linkedin.com/in/yessica-luciana-vazquez-611569230/" role="button"
						><i class="fab fa-linkedin-in"></i
						></a>
					
						<!-- Github -->
						<a class="btn btn-outline-light btn-floating m-1" href="https://github.com/YessiVazquez01" role="button"
						><i class="fab fa-github"></i
						></a>
					</section>
					<!-- Section: Social media -->
				</div>
				<!-- Grid container -->
					
				<!-- Copyright -->
				<div class="footer text-center p-2" >
					&copy Copyright Yessica Luciana Vazquez - 2023
				</div>
				<!-- Copyright -->
			</footer>
		</section>
	</div>
</body>
</html>