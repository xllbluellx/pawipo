<?php
//Se inicia sesión para validar que el usuario siga siendo el mismo y no entre otro más.
    session_start();
    if(!isset($_SESSION['tutor'])){ //En caso de que no variable de sesión, redireciona.
    header("location: ../../");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>TADDI: Tutor</title>
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
    			<?php
		    		include('../../php/obtenerImagenes.php');
		    		$img = new Imagenes();
		    		$img->imgCual('../../img/', '%img-sep-%');
		    	?>
    </div>
    <div class="col"><div class="headerTitle">Tutoría Académica Digital e Institucional</div>
    <hr>
	</div>
    <div class="col">
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
					                        <i class="fa fa-credit-card"></i> Mi Cuenta
					                        <span class="caret down"></span>
					                    </a>
					                </li>
					            </ul>
					        </nav>
					    </div>
					</div>

					<div class="dropdown" id="dropdown-fixed">
					    <ul>
					    	  <!-- <li><a href=""><i class="fa fa-briefcase"></i> Editar Perfil</a></li> -->
					        <li><a href="" id="change-pass-prof"><i class="fa fa-unlock-alt"></i> Cambiar Contraseña</a></li>
					         <?php
					        	$i = $img->msjTutor($_SESSION['tutor']);
					        	if($i != 0) echo '<li><a href="" id="bandeja-citas"><i class="fa fa-envelope-o"></i> Citas / Mensajes <span class="label badge primary">'.$i.'</span></a></li>';
					        	else echo '<li><a href="" id="bandeja-citas"><i class="fa fa-envelope-o"></i> Citas / Mensajes <span class="label badge primary">0</span></a></li>';
					        ?>
					        <li><a href="../php/logout.php"><i class="fa fa-sign-out"></i> Cerrar Sesión</a></li>
					    </ul>
					</div>
			   </div>
		</div> 
		 
<!-- Grid: todo el menú lateral izquierdo -->
<br> 
<div class="row">
    <div class="col col-2 listas menuDeta">    
    	<div id="my-collapse" class="collapse menuIzquierdo">
    	<a  class="collapse-toggle button oscuro width-100" style="background: #2E2E2E;"><i class="fa fa-user fa-lg"></i>
    	<?php echo strtoupper($_COOKIE['tipo']); ?></a>
	<a id="tutorados" href="#box-1" class="collapse-toggle button oscuro width-100"><i class="fa fa-users fa-lg"></i> Tutorados</a>
    <div class="collapse-box" id="box-1">
    	<ul id="tutorados">
			<li id="alta">Altas</li>
			<li id="baja">Bajas</li> 
			<li id="camb">Cambiar contraseña</li>
			<li id="cons">Constancia</li>    	
    	</ul>
    </div>
    <a id="documentos" href="#box-2" class="collapse-toggle button oscuro width-100"><i class="fa fa-file-text fa-lg"></i> Documentos</a>
    <div class="collapse-box" id="box-2">
    	<ul id="documentos">
			<li id="arch">Ver y descargar</li>
			<li id="carg">Cargar</li>
    	</ul>
    </div>
	<h4></h4>
	 <a id="reportes" href="#box-3" class="collapse-toggle button oscuro width-100"><i class="fa fa-folder-open-o fa-lg"></i> Reportes</a>
	 <div class="collapse-box" id="box-3">
	 	<ul id="reportes">
			<li id="repo">Reporte semestral</li>
			<!-- <li id="impr">Imprimir carga tutorias</li> -->
    	</ul>
	 </div>
	 <a id="evaluacion" href="#box-4" class="collapse-toggle button oscuro width-100"><i class="fa fa-check-square-o fa-lg"></i> Evaluación</a>
	 <div class="collapse-box" id="box-4">
	 	<ul id="evaluacion">
			<li id="impr">Ver / Imprimir</li>  
    	</ul>
	 </div>
	  <a id="consultas" href="#box-5" class="collapse-toggle button oscuro width-100"><i class="fa fa-search fa-lg"></i> Consultas</a>
	 <div class="collapse-box" id="box-5">
	 	<ul id="consultas">
			<li id="kard">Kárdex</li>
			<!-- <li id="carg">Carga</li> -->
			<li id="encu">Encuestas</li>
			<li id="expe">Expediente</li>   
    	</ul>
	 </div>
	  <a id="avisos" href="#box-10" class="collapse-toggle button oscuro width-100"><i class="fa fa-volume-up fa-lg"></i> Avisos</a>
	 <div class="collapse-box" id="box-10">
	 	<ul id="avisos">
			<li id="nuev-tuto">Nuevo aviso</li>
			<li id="vera-tuto">Ver avisos</li>
    	</ul>	
	 </div>

	 	 	 <a id="foro" href="#box-11" class="collapse-toggle button oscuro width-100"><i></i> Foro</a>
	 <div class="collapse-box" id="box-11">
	 	<ul id="foro">
			<li id="nuevt">Nuevo tema</li>
			<li id="vert">Ver tema</li>
    	</ul>	
	 </div>
	 
	 <hr>
			<div class="row" id="opciones">
				<div class="col" id="correo">
				<p id="tooltip" data-tipso="Correo" class="iconsMenu"><i class="fa fa-envelope-square fa-2x"></i></p>
				</div>
				<div class="col" id="chatear">
				<p id="tooltip" data-tipso="Chat" class="iconsMenu"><i class="fa fa-comments fa-2x"></i></p>
				</div>			

				<div class="col" id="citas">
				<p id="tooltip" data-tipso="Agendar cita" class="iconsMenu"><i class="fa fa-calendar-check-o fa-2x"></i></p>
				</div>
				<div class="col">
				</div>			
			</div>     
    	</div>
    </div>
    <div class="col col-9">
    
		    <!-- Contenedor ------------------------>  
		<div id="ContenedorPrincipal" class="contenedorPrincipal" >
			<div class="row centered">
		    <div class="col col-6">
		    <p>
		    	<?php
		    		$img->imgCual('../../img/', '%img-tad-%');
		    	?>
		    </p>
		    <div class="titulos">Bienvenido(a) al área de tutores <b><?php echo $_COOKIE['quien']; ?>
		    </b>
		    </div>
		    </div>
			</div>
				<?php
		    		include('../php/mostrar-avisos.php');
		    		$avisos = new MostrarAvisos();
		    		$avisos->consultarAvisosTutor();
		    	?>
		</div>
    </div>
</div>

<!-- inicia chat -->
  <div class="chat_box">
	<div class="chat_head"> Chat</div>
	<div class="chat_body"> 
 
    <object type="text/html" data="http://dsc.itmorelia.edu.mx:8000" width="400px" height="355px">
    </object>

	</div>
  </div>

<div class="msg_box" style="right:290px">
	<div class="msg_head">Administrador
	<div class="closes">x</div>
	</div>
	<div class="msg_wrap">
		<div class="msg_body">
			<div class="msg_a">Hola, esta es una prueba del Chat.</div>	
			<div class="msg_push"></div>
		</div>
	<div class="msg_footer"><textarea class="msg_input" rows="4"></textarea></div>
</div>
</div>

<!-- inicia chat -->
    <?php
    	include('../includes/librerias.php');
    ?>
    <!-- Este archivo contiene las funciones necesarias para la mecánica del sitio -->
    <script type="text/javascript" src="../js/tutor.js"></script>
</body>
</html>