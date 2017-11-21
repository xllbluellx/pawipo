<?php
//Se inicia sesión para validar que el usuario siga siendo el mismo y no entre otro más.
    session_start();
    if(!isset($_SESSION['alumno'])){ //En caso de que no variable de sesión, redireciona.
    header("location: ../../");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>TADDI: Tutorados</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS -->
	<?php
		include('../includes/encabezados.php');
	?>
</head>

<body class="animated fadeIn">
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-87130312-1', 'auto');
  ga('send', 'pageview');

</script>
	<div class="row headerNew">
    <div class="col">
    			<?php
		    		include('../../php/obtenerImagenes.php');
		    		$img = new Imagenes();
		    		$img->imgCual('../../img/', '%img-sep-%');
		    	?>
    </div>
    <div class="col"><div class="headerTitle">Tutoría Académica Digital e Institucional</div><hr></div>
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
					                        <i class="fa fa-book"></i> Mi Cuenta
					                        <span class="caret down"></span>
					                    </a>
					                </li>
					            </ul>
					        </nav>
					    </div>
					</div>

					<div class="dropdown" id="dropdown-fixed">
					    <ul>
					    	 <!-- <li><a href="#" ><i class="fa fa-briefcase"></i> Editar Perfil</a></li> -->
					        <li><a href="#" id="change-pass-alum"><i class="fa fa-unlock-alt"></i> Cambiar Contraseña</a></li>
					        <?php
					        	$i = $img->msjAlumno($_SESSION['alumno']);
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

<?php
	include('../php/verificaciones.php');
	$datos = new Verificar();
	$datos = $datos->menu();
?>

<div class="row">
    <div class="col col-2 listas menuDeta">
    <div class="sidebar">
    	<div id="my-collapse" class="collapse menuIzquierdo BtnShadow">
    	<a  class="collapse-toggle button oscuro width-100" style="background: #2E2E2E;"><i class="fa fa-user fa-lg"></i>
    	Tutorados</a>
	<a id="anexos" href="#box-1" class="collapse-toggle button oscuro width-100"><i class="fa fa-file-text fa-lg"></i> Anexos</a>
    <div class="collapse-box" id="box-1">
    	<ul id="anexos">
    	<?php
    		if (preg_match('/1-1/',$datos)) echo '<li id="checked">Formato de entrevista 1 <span class="label tag success"><i class="fa fa-check-square"></i></span></li>';
    		else echo '<li id="form-1">Formato de entrevista 1</li>';
    		
    		if (preg_match('/1-2/',$datos)) echo '<li id="checked">Formato de entrevista 2 <span class="label tag success"><i class="fa fa-check-square"></i></span></li>';
    		else echo '<li id="form-2">Formato de entrevista 2</li>';
    		
    		if (preg_match('/2-1/',$datos)) echo '<li id="checked">Línea de vida <span class="label tag success"><i class="fa fa-check-square"></i></span></li>';
    		else echo '<li id="line">Línea de vida</li>';
    		
    		if (preg_match('/3-1/',$datos) && preg_match('/3-2/',$datos) && preg_match('/3-3/',$datos) && preg_match('/3-4/',$datos) && preg_match('/3-5/',$datos)) echo '<li id="checked">Análisis FODA <span class="label tag success"><i class="fa fa-check-square"></i></span></li>';
    		else echo '<li id="foda">Análisis FODA</li>';
    		
    		if (preg_match('/4-1/',$datos)) echo '<li id="checked">Habilidades de estudio <span class="label tag success"><i class="fa fa-check-square"></i></span></li>';
    		else echo '<li id="habi">Habilidades de estudio</li>';
    		
    		if (preg_match('/5-1/',$datos)) echo '<li id="checked">Estilos de aprendizaje <span class="label tag success"><i class="fa fa-check-square"></i></span></li>';
    		else echo '<li id="esti">Estilos de aprendizaje</li>';
    		
    		if (preg_match('/6-1/',$datos)) echo '<li id="checked">Test de autoestima <span class="label tag success"><i class="fa fa-check-square"></i></span></li>';
    		else echo '<li id="auto">Test de autoestima</li>';
    		
    		if (preg_match('/7-1/',$datos)) echo '<li id="checked">Test de asertividad <span class="label tag success"><i class="fa fa-check-square"></i></span></li>';
    		else echo '<li id="aser">Test de asertividad</li>';
    	?>   	
    	</ul>
    </div>
    <a id="evaluaciones" href="#box-2" class="collapse-toggle button oscuro width-100"><i class="fa fa-bar-chart fa-lg"></i> Evaluaciones</a>
    <div class="collapse-box" id="box-2">
    	<ul id="evaluaciones">
    	<?php
    	$datos = new Verificar();
    	$datos = $datos->anexo();
    	if ($datos) echo '<li id="checked">Realizar evaluación <span class="label tag success"><i class="fa fa-check-square"></i></span></li>';
    	else echo '<li id="real">Realizar evaluación</li>';
    	?>
    		<li id="impr">Imprimir evaluación</li>
			<li id="regi">Registrar calificaciones</li>
    	</ul>
    </div>
	 <h4></h4>
	 <a id="carga" href="#box-3" class="collapse-toggle button oscuro width-100"><i class="fa fa-archive fa-lg"></i> Carga tutorías</a>
	 <div class="collapse-box" id="box-3">
	 	<ul id="carg">
			<li id="tuto">Ver carga</li>
    	</ul>
	 </div>
	 
	 <a id="consultar" href="#box-4" class="collapse-toggle button oscuro width-100"><i class="fa fa-search fa-lg"></i> Consultar anexos</a>
	 <div class="collapse-box" id="box-4">
	 	<ul id="cons">
			<li id="form-1">Formato de entrevista</li>
			<li id="line">Línea de vida</li>
			<li id="foda">Análisis FODA</li>
			<li id="habi">Habilidades de estudio</li>
			<li id="esti">Estilos de aprendizaje</li> 
			<li id="auto">Test de autoestima</li>  
			<li id="aser">Test de asertividad</li>  
    	</ul>
	 </div>
	 
	 <a id="documentos" href="#box-5" class="collapse-toggle button oscuro width-100"><i class="fa fa-folder-open fa-lg"></i> Documentos</a>
	 <div class="collapse-box" id="box-5">
		<ul id="documentos">
			<li id="docu">Ver documentos</li>
			<li id="carg">Cargar documentos</li>
    	</ul>	 
	 </div>
	 <a id="foro" href="#box-11" class="collapse-toggle button oscuro width-100"><i></i> Foro</a>
	 <div class="collapse-box" id="box-11">
	 	<ul id="foro">
			<li id="nuevt">Nuevo tema</li>
			<li id="vert">Ver tema</li>
    	</ul>	
	 </div>
	 <h4></h4>
    <hr>
			<div class="row" id="opciones">
				<div class="col" id="correo">
				<p id="tooltip"  data-tipso="Enviar Correo" class="iconsMenu"><i class="fa fa-envelope-square fa-2x"></i></p>
				</div>
				<div class="col" id="chatear">
				<p id="tooltip" data-tipso="Chat" class="iconsMenu"><i class="fa fa-comments fa-2x"></i></p>
				</div>
				<div class="col" id="citas">
				<p id="tooltip" data-tipso="Agendar cita" class="iconsMenu"><i class="fa fa-calendar fa-2x"></i></p>
				</div>			
			</div>    
    
    	</div>
    	</div>
    </div>
    <div class="col col-9">
    
		    <!-- Contenedor ------------------------>  
		<div id="ContenedorPrincipal" class="contenedorPrincipal gradient" >
			<div class="row centered">
		    <div class="col col-6">
		    <p>
		    	<br>
		    	<?php
		    		$img->imgCual('../../img/', '%img-tad-%');
		    	?>
		    	<br>
		    </p>
		    <div class="titulos">Bienvenido(a) al área de tutorados <b><?php echo $_COOKIE['info']; ?>
		    </b>
		    </div>
		    </div>
			</div>
				<?php
		    		include('../php/mostrar-avisos.php');
		    		$avisos = new MostrarAvisos();
		    		$avisos->consultarAvisosTutorados();
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
    <script type="text/javascript" src="../js/tutorados.js"></script>
</body>
</html>