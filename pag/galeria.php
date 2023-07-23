<?php include "head.php" ?>

<?php 

if($_POST){#si hay envio de datos, los inserto en la base de datos  

$nombre_proyecto = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
#nombre de la imagen
$imagen = $_FILES['archivo']['name'];
#tenemos que guardar la imagen en una carpeta 
$imagen_temporal=$_FILES['archivo']['tmp_name'];
#creamos una variable fecha para concatenar al nombre de la imagen, para que cada imagen sea distinta y no se pisen 
$fecha = new DateTime();
$imagen= $fecha->getTimestamp()."_".$imagen;
move_uploaded_file($imagen_temporal,"../img/".$imagen);
$linkProyecto = $_POST['linkProyec'];


#creo una instancia(objeto) de la clase de conexion
$conexion = new conexion();
$sql="INSERT INTO `proyectos` (`id`, `nombre`, `imagen`, `descripcion`, `link`) VALUES (NULL, '$nombre_proyecto' , '$imagen', '$descripcion', '$linkProyecto')";
$id_proyecto = $conexion->ejecutar($sql);
 #para que no intente borrar muchas veces
 header("Location:galeria.php");
 die();

}

#si nos envian por url, get 
if($_GET){

    #ademas de borrar de la base , tenemos que borrar la foto de la carpeta imagenes
   if(isset($_GET['borrar'])){
        $id = $_GET['borrar'];
        $conexion = new conexion();

        #recuperamos la imagen de la base antes de borrar 
        $imagen = $conexion->consultar("select imagen FROM  `proyectos` where id=".$id);
        #la borramos de la carpeta 
        unlink("../img/".$imagen[0]['imagen']);

        #borramos el registro de la base 
        $sql ="DELETE FROM `proyectos` WHERE `proyectos`.`id` =".$id; 
        $id_proyecto = $conexion->ejecutar($sql);
         #para que no intente borrar muchas veces
         header("Location:galeria.php");
         die();
 }

 if(isset($_GET['modificar'])){
    $id = $_GET['modificar'];
    header("Location:modificar.php?modificar=".$id);
    die();
}
} 
#vamos a consultar para llenar la tabla 
$conexion = new conexion();
$proyectos= $conexion->consultar("SELECT * FROM `proyectos`");
?> 

<body class="admin">
    <?php include "header.php" ?>

    <div class="row d-flex justify-content-center mb-5 mt-3">
        <div class="col-md-10 col-sm-12">
            <div class="card datos-proyec">
                <div class="card-header d-flex justify-content-center titulo-admin">
                    Datos del Proyecto
                </div>
                <div class="card-body">
                    <!--para recepcionar archivos uso enctype-->
                    <form action="galeria.php" method="post" enctype="multipart/form-data">
                        <div>
                            <label for="nombre">Nombre del Proyecto</label>
                            <input required class="form-control" type="text" name="nombre" id="nombre">
                        </div>
                    
                        <div>
                            <label for="archivo" class="pt-2">Imagen del Proyecto</label>
                            <input required class="form-control" type="file" name ="archivo" id="archivo">
                        </div>
                        <br>
                        <div>
                            <label for="descripcion">Indique Descripción del Proyecto</label>
                            <textarea required class="form-control" name="descripcion" id="descripcion" cols="30" rows="4"></textarea>
                        </div>

                        <div>
                            <label for="linkProyec" class="pt-2">Link del Proyecto</label>
                            <input required class="form-control" type="text" name="linkProyec" id="linkProyec">
                        </div>
                        <div class="d-flex justify-content-center pt-4">
                        <br>
                        <input class="btn btn-datos" type="submit" value="Enviar Proyecto">
                        </div>
                    </form>
                </div> <!--cierra el body-->
            </div><!--cierra el card-->
        </div><!--cierra el col-->
    </div><!--cierra el row-->

    <div class="tabla-datos">
        <div class="row d-flex justify-content-center mb-2">
            <div class="col-md-10 col-sm-6">
                <h2 class="card-title text-dark text-center pt-3 pb-3 card-mobile">Listado de proyectos ingresados: </h2>
                <?php #leemos proyectos 1 por 1
                 foreach($proyectos as $proyecto){ ?>
                    <div class="col card__mobile  mb-4">
                        <div class="card border border-3 shadow w-100">
                            <h3 class="card-title text-dark"><?php echo $proyecto['nombre'];?></h3>
                            <a>
                                <img class="card-img-top" width="200" src="../img/<?php echo $proyecto['imagen'];?>" alt="">
                            </a>
                            <div class="card-body">
                               
                                <p class="card-text text-dark"><?php echo $proyecto['descripcion'];?></p>
                                <a name="eliminar" id="eliminar" class="btn btn-eliminar" href="?borrar=<?php echo $proyecto['id'];?>">Eliminar</a>
                                <a name="modificar" id="modificar" class="btn btn-modificar" href="?modificar=<?php echo $proyecto['id'];?>">Modificar</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div><!--cierra el col-->  
        </div>
    </div>
<?php include "footer.php" ?>