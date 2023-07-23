<?php include "head.php"; 
?>

<?php $conexion = new conexion();# es un objeto de tipo conexion,
      $proyectos= $conexion->consultar("SELECT * FROM `proyectos`"); 
?>

<body class="admin">
    <?php include "header.php"; ?>

    <div class="p-5 bg-light">
        <div class="container">
            <h1 class="display-3 h1-admin">Administrador de Portfolio Personal</h1>
            <p class="lead">Proyectos Cargados en base de datos</p>
            <hr class="my-2">
            <p class="lead" style="font-size:1.5rem;">Para poder acceder al portfolio, al final de este mismo link cambie /admin.php por: /portafolio.php <br><br>
             En abm podra:  <br> Dar de alta un nuevo proyecto <br> Dar de baja un proyecto <br> Modificar un proyecto <br>
            Cualquier duda <a href="mailto:yessivazquez53@outlook.es">Click para enviar email</a></p>
        </div>
    </div>

    <div class="proyectos-admin">
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
	<footer>
		<div class="text-center pt-4">
			<p class="footer">&copy Copyright Yessica Luciana Vazquez - 2023</p>
		</div>
	</footer>
</section>
	<!--SCRIPT-->
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>
</html>