<?php
//Se inicia sesión para validar que el usuario siga siendo el mismo y no entre otro más.
    session_start();
    if(!isset($_SESSION['admin'])){ //En caso de que no variable de sesión, redireciona.
    header("location: ../../");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>TADDI: Administrador</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS -->
	<?php
		include('../includes/encabezados.php');
	?>
</head>

<body class="animated fadeIn">
	<div class="row headerNew">
    <div class="col">
    <!--	<img src="../../img/logosep.png" alt=""> -->
    			<?php
		    		include('../../php/obtenerImagenes.php');
		    		$img = new Imagenes();
		    		$img->imgCual('../../img/', '%img-sep-%');
		    	?>
    </div>
    <div class="col"><div class="headerTitle">Tutoría Académica Digital e Institucional</div><hr></div>
    <div class="col">
    <!-- <img src="../../img/logoITM_75.png" alt=""> -->
    			<?php
		    		$img->imgCual('../../img/', '%img-tec-%');
		    	?>
    </div>
	</div>
	   <div class="row right">
			   <div class="col col-2">
			   	<div class="nav-bar-box nav-fixed">
					    <div class="nav-bar responsive">
					        <nav class="nav-main">
					            <ul>
					                <li>
					                    <a class="button oscuro" href="" data-component="dropdown" data-target="#dropdown-fixed">
					                        <i class="fa fa-wrench"></i> Configuración
					                        <span class="caret down"></span>
					                    </a>
					                </li>
					            </ul>
					        </nav>
					    </div>
					</div>

					<div class="dropdown" id="dropdown-fixed">
					    <ul>
					        <li><a href="#" id="change-pass"><i class="fa fa-unlock-alt"></i> Cambiar Contraseña</a></li>
					        <li><a href="../php/logout.php"><i class="fa fa-sign-out"></i> Cerrar Sesión</a></li>
					    </ul>
					</div>
			   </div>
		</div> 
		 
<!-- Grid: todo el menú lateral izquierdo -->
<br> 
<div class="row">
    <div class="col col-2 listas menuDeta">
    <div class="sidebar">
    	<div id="my-collapse" class="collapse menuIzquierdo BtnShadow">
    	<a  class="collapse-toggle button oscuro width-100" style="background: #2E2E2E;"><i class="fa fa-gears fa-lg"></i>
    	<?php echo strtoupper($_COOKIE['tipo']); ?></a>
	<a id="altas" href="#box-1" class="collapse-toggle button oscuro width-100"><i class="fa fa-plus-square fa-lg"></i> Altas</a>
    <div class="collapse-box" id="box-1">
    	<ul id="altas">
			<li id="care">Carreras</li>
			<li id="prof">Profesores</li> 
			<li id="grup">Grupos</li>
    	</ul>
    </div>

	 <a id="consultar" href="#box-8" class="collapse-toggle button oscuro width-100"><i class="fa fa-search-plus fa-lg"></i> Consultar</a>
	 <div class="collapse-box" id="box-8">
    	<ul id="consultar">
			<li id="alum">Alumnos</li>
			<li id="prof">Profesores</li>
    	</ul>
    </div>
    
    	 <a id="catalogos" href="#box-3" class="collapse-toggle button oscuro width-100"><i class="fa fa-list-alt fa-lg"></i> Catálogos</a>
	 <div class="collapse-box" id="box-3">
	 	<ul id="catalogos">
			<li id="care">Carreras</li>
			<li id="grup">Grupos</li>
			<li id="tuto">Tutores</li>
			<li id="coor">Coordinadores</li>
			<li id="arch">Archivos</li>    	
			<li id="imag">Imágenes</li>
    	</ul>
	 </div>
	 <h4></h4>
	 <a id="cargar" href="#box-9" class="collapse-toggle button oscuro width-100"><i class="fa fa-upload fa-lg"></i> Cargar</a>
	 <div class="collapse-box" id="box-9">
    	<ul id="cargar">
			<!-- <li id="alum">Alumnos</li> -->
			<li id="arch">Archivos</li>
			<li id="imag">Imágenes</li>
    	</ul>
    </div>
	 
	 <a id="constancias" href="#box-4" class="collapse-toggle button oscuro width-100"><i class="fa fa-file-text-o fa-lg"></i> Constancias</a>
	 <div class="collapse-box" id="box-4">
		<ul id="constancias">
			<li id="alum">Alumno</li>
			<li id="tuto">Tutor</li>
			<li id="coor">Coordinador</li>
			<!-- <li id="carg">Carga de Tutorias</li> -->    	
    	</ul>	 
	 </div>
	 
	 <a id="imprimir" href="#box-5" class="collapse-toggle button oscuro width-100"><i class="fa fa-print fa-lg"></i> Imprimir</a>
	 <div class="collapse-box" id="box-5">
		<ul id="imprimir">
			<li id="encu">Encuestas</li>
			<li id="tuto">Reporte Semestral</li>
			<li id="eval">Evaluaciones</li>
    	</ul>	 
	 </div>
	 
	 
	 <h4></h4>
	 
	 <a id="administrar" href="#box-7" class="collapse-toggle button oscuro width-100"><i class="fa fa-suitcase fa-lg"></i> Administrar TADDI</a>
	 <div class="collapse-box" id="box-7">
	 	<ul id="administrar">
			<li id="prof">Cambiar contraseña<br> de Profesor</li>
			<li id="alum">Cambiar contraseña<br> de Alumno</li>
			<!-- <li id="imag">Imágenes TADII</li> -->
    	</ul>	
	 </div>
	 
	 <a id="avisos" href="#box-10" class="collapse-toggle button oscuro width-100"><i class="fa fa-volume-up fa-lg"></i> Avisos</a>
	 <div class="collapse-box" id="box-10">
	 	<ul id="avisos">
			<li id="nuev">Nuevo aviso</li>
			<li id="vera">Ver avisos</li>
    	</ul>	
	 </div>


	 	 <a id="foro" href="#box-11" class="collapse-toggle button oscuro width-100"><i></i> Foro</a>
	 <div class="collapse-box" id="box-11">
	 	<ul id="foro">
			<li id="nuevt">Nuevo tema</li>
			<li id="vert">Ver tema</li>
    	</ul>	
	 </div>


    	</div><!-- Fin my-collapse ////////////////////////////////////////////////////////////////// -->  

    	</div>
    </div>

    <div class="col col-9">
    
		    
		<div id="ContenedorPrincipal" class="contenedorPrincipal gradient" >
			<div class="row centered">
		    <div class="col col-6">
		    <p><!-- <img src="../../img/taddiVertical2.png" alt=""> -->
		    	<br>
		    	<?php
		    		$img->imgCual('../../img/', '%img-tad-%');
		    	?>
		    	<br>
		    </p>
		    <div class="titulos">Bienvenido(a) al área administrativa <b><?php echo strtoupper($_SESSION['admin']); ?>
		    </b>
		    </div>
		    </div>
			</div>
		</div>
    </div>
</div>
    <?php
    	include('../includes/librerias.php');
    ?>
    <!-- Este archivo contiene las funciones necesarias para la mecánica del sitio -->
    <script type="text/javascript" src="../js/administrador.js"></script>
</body>
</html>