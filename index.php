<?php
session_start();
	if(isset($_SESSION['alumno'])){ //En caso de que no variable de sesión, redireciona.
    header("location: panel/tutorados/");
    }
    
    if(isset($_SESSION['tutor'])){ 
    header("location: panel/tutor/");
    }
    
    if(isset($_SESSION['coordinador'])){ 
    header("location: panel/coordinadores/");
    }
    
    if(isset($_SESSION['admin'])){ 
    header("location: panel/administrador/");
    } 
?> 
<!DOCTYPE html>
<html>
<head>
    <title>TADDI</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS -->
    <link rel="stylesheet" href="css/kube.css">
	 <link rel="stylesheet" href="css/styles.css">
	 <link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/tipso.min.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/alertify.css">
</head>

<body class="animated fadeIn">
	<div class="row headerNew">
    <div class="col">
    	    	<?php
		    		include('php/obtenerImagenes.php');
		    		$img = new Imagenes();
		    		$img->imgCual('img/', '%img-sep-%');
		    	?>
    </div>
    <div class="col">
		<div class="headerTitle"><span style="font-size: 28px;">Tecnológico Nacional de México</span><br>Instituto Tecnológico de Morelia</div><hr> 
    </div>
    <div class="col">
    			<?php
		    		$img->imgCual('img/', '%img-tec-%');
		    	?>
    </div>
	</div>
	   <div class="row right">
			   <div class="col col-1 headerMenu" data-tipso="Ingresa tus datos" data-component="offcanvas" data-target="#offcanvas-right" data-direction="right">
			   <i class="fa fa-bars"></i> Menú
			   </div>
		</div>  
  
<!-- Contenedor -->  
<div id="LoginBox" >
			<div class="row centered">
		    <div class="col col-6">
		    <p>
		    	<br>
		    	<?php
		    		$img->imgCual('img/', '%img-tad-%');
		    	?>
		    	<br>
		    </p>
		    </div>
			</div>
			
			<div class="row centered">
		    <div class="col col-2">
		    	<button id="tipso" data-tipso="Ingresa tus datos" class="button oscuro  big uppe BtnShadow" data-component="offcanvas" data-target="#offcanvas-right" data-direction="right">Ingresar <i class="fa fa-sign-in fa-lg"></i></button>
		    </div>
		   </div>
</div>


<!-- Right menu -->
<div id="offcanvas-right" class="hide">
<div class="menuDerecho BtnShadow">
    <a href="#" class="close"></a>
    <nav>
        <ul>
            <br><hr>
            <li id="tipso" data-tipso="Selecciona una opción" class="borderBtn"><div  id="tutorados" class="button btntop width-100"><i class="fa fa-institution fa-lg"></i> ITMorelia</div></li>
            <li id="tipso" data-tipso="Alumnos/Tutorados" class="borderBtn"><a  id="tutorados" class="button oscuro width-100"><i class="fa fa-users fa-lg"></i> Tutorado</a></li>
            <li id="tipso" data-tipso="Tutores" class="borderBtn"><a  id="tutor" class="button oscuro width-100" ><i class="fa fa-user fa-lg"></i> Tutor</a></li>
            <li id="tipso" data-tipso="Coordinadores" class="borderBtn"><a  id="coordinadores" class="button oscuro width-100" ><i class="fa fa-graduation-cap fa-lg"></i> Coordinador</a></li>
            <li id="tipso" data-tipso="Administrador" class="borderBtn"><a  id="administrador" class="button oscuro width-100" ><i class="fa fa-gears fa-lg"></i> Administrador</a></li><hr>
            <span class="label outline"><a href="http://www.itmorelia.edu.mx" target="_blank" title="Facebook"><i class="fa fa-paper-plane"></i> ITMorelia.com</a></span> <br>
            <span class="label outline"><a href="https://www.facebook.com/ITMoreliaOficial" target="_blank" title="Facebook"><i class="fa fa-facebook-official"></i> Visítanos en Facebook</a></span> 
        </ul>
    </nav>
</div>
</div>
 
<!-- librerias -->
    <script src="js/jquery.min.js"></script>
    <script src="js/kube.js"></script>
    <script src="js/tipso.min.js"></script>
    <script src="js/alertify.js"></script>
    <script src="js/jquery.cookie.js"></script> 
	 <script src="js/scripts.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-87130312-1', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>