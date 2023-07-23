<?php ob_start(); ?>
<?php session_start();
    include "pag/conexion.php";
    
      #validar datos
    if ($_POST){
      if( ($_POST['usuario']=="visitante") && ($_POST['contraseña']=='invitado') ){
        $_SESSION['usuario']=$_POST['usuario'];
        #redirecciono porque ingreso ok 
        header("location:pag/portafolio.php");
        die();
       // exit;
      } elseif(($_POST['usuario']=="Yessi Vazquez") && ($_POST['contraseña']=='1234')){
        $_SESSION['usuario']=$_POST['usuario'];
        header("location:pag/admin.php");
         die();
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
	<link href="https://fonts.googleapis.com/css2?family=Euphoria+Script&family=Kalam&family=Rock+Salt&family=Shadows+Into+Light&family=Stalemate&display=swap&family=Bangers&family=Tangerine:wght@400;700&family=Yuji+Boku&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" href="CSS/estilo.css">
	<title>Mi Portafolio Web</title>
</head>
<body>
    <header class="header">
        <!-- Barra de navegación -->
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid justify-content-center">
              <ul class="list-group list-group-horizontal">
                    <li class="list-group-item ">
                          <a class="nav-link" target="_blank" href="https://www.linkedin.com/in/yessica-luciana-vazquez-611569230/"><i class="fa-brands fa-linkedin fa-2x text-white"></i></a>
                    </li>
                    <li class="list-group-item">
                          <a class="nav-link" target="_blank" href="https://github.com/YessiVazquez01"><i class="fa-brands fa-square-github fa-2x text-white"></i></a>
                    </li>
                    <li class="list-group-item">
                      <a class="nav-link" target="_blank" href="https://www.facebook.com/yessica.vazquez.77985"><i class="fa-brands fa-square-facebook fa-2x text-white"></i></a>
                    </li>
                    <li class="list-group-item">
                      <a class="nav-link" target="_blank" href="https://www.instagram.com/yessi_vazquez/"><i class="fa-brands fa-square-instagram fa-2x text-white"></i></a>
                    </li>
                    <li class="list-group-item">
                      <a class="nav-link" target="_blank" href="https://twitter.com/Yessi_Vazquez"><i class="fa-brands fa-square-twitter fa-2x text-white"></i></a>
                    </li>
              </ul>
            </div>
        </nav>
        <!-- Presentacion -->
        <section class="container position-absolute top-50 start-50 translate-middle">
            <div class="row justify-content-center">
                <div class="col-md-4 presentacion-login">
                    <div class="text-center pt-5">
                        <h1 class="welcome pb-4">¡Welcome!</h1>
			            <h3 class="preg pb-3">¿Quieres saber quien soy?</h3>
                    </div>
                    <div class="text-center pb-5">
                        <button type="button" class="btn btn-login" data-bs-toggle="modal" data-bs-target="#exampleModal">
                              Ver info
                        </button>
                    </div>
                </div>
            </div>
        </section>
    </header>
    <!--Login modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered text-center modal-index">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title text-center fs-5" id="exampleModalLabel">Iniciar sesión</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body login">
            <p>Para poder acceder a mi portafolio web puede utilizar una cuenta por defecto </p>
            <span class="usuario">[Usuario] visitante - [Contraseña] invitado </span>
            <form class="formulario" action="index.php" method='post' >
            <div class="mb-2 pt-3">
              <label for="exampleInputEmail1" class="form-label">Usuario</label>
              <input type="text" class="form-control" id="exampleInputEmail1 usuario" name="usuario" aria-describedby="emailHelp">
            </div>
            <div class="mb-3 pb-1">
              <label for="exampleInputPassword1" class="form-label">Contraseña</label>
              <input type="password" class="form-control" id="exampleInputPassword1 contraseña" name="contraseña">
            </div>
            <p> <span class="nota">Nota:</span> Esta cuenta solo lo dejara acceder a la informacion como una cuenta de invitado. Solo el administrador de dicho portafolio puede modificar, eliminar o agregar informacion.</p>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn ingresar">Ingresar</button>
          </div>
        </form>   
        </div>
      </div>
    </div>
    <!-- FOOTER -->
    <section class="footer text-center fixed-bottom">
      <footer>
        <div>
          <p class="text-white">&copy Copyright Yessica Luciana Vazquez - 2023</p>
        </div>
      </footer>
	<!--SCRIPT-->
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>
</html>