<?php
session_start();
ob_start();
include('../../php/conexion.php');
$conn = new Conexion('../../../php/datosServer.php');
$conn = $conn->conectar();
$sql = "SELECT * FROM respuestas WHERE respuestas.idAnexo = 3 AND respuestas.idAlumno = ".$_SESSION['alumno'];
$result = $conn->query($sql);

$for = false;
$opo = false;
$deb = false;
$ame = false;
$res = false;
		
if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
	    	switch(intval($row['subAnexo'])) {
	    		case 1: $for = true; break;
	    		case 2: $opo = true; break;
	    		case 3: $deb = true; break;
	    		case 4: $ame = true; break;
	    		case 5: $res = true; break;
	    	}
	}
}

$conn->close();
?> 

<!-- Modal -->
<div class="row centered">
	<div class="col col-11">
		<div id="modal-anexos-foda" class="animated bounceInRight">
		    <div class="modal" style="border: 1px solid #DDD;">
		        <div class="modal-header gradient">Análisis FODA<br><span class="label tag error">Selecciona para contestar formulario</span></div>
		        <div class="modal-body">
			        <form class="form" id="modal-anexos-foda">
						<div class="row centered">
						<?php
						if(!$for) echo '<div class="col col-3 fodaBox fodaF" id="for">Fortalezas<br><i class="fa fa-hand-rock-o fa-lg"></i></div>';
						else echo '<div class="col col-3 fodaBox fodaF" id="done">Fortalezas<br><i class="fa fa-check-square fa-lg" style="color: green;"></i></div>';
							
						if(!$opo) echo '<div class="col col-3 fodaBox fodaO" id="opo">Oportunidades<br><i class="fa fa-paper-plane-o fa-lg"></i></div>';
						else echo '<div class="col col-3 fodaBox fodaO" id="done">Oportunidades<br><i class="fa fa-check-square fa-lg" style="color: green;"></i></div>';
						?>
						</div>
						
						<div class="row centered">
						<?php
						if(!$deb) echo '<div class="col col-3 fodaBox fodaD" id="deb">Debilidades<br><i class="fa fa-sort-amount-desc fa-lg"></i></div>';
						else echo '<div class="col col-3 fodaBox fodaD" id="done">Debilidades<br><i class="fa fa-check-square fa-lg" style="color: green;"></i></div>';	
						
						if(!$ame) echo '<div class="col col-3 fodaBox fodaA" id="ame">Amenazas<br><i class="fa fa-warning fa-lg"></i></div>';
						else echo '<div class="col col-3 fodaBox fodaA" id="done">Amenazas<br><i class="fa fa-check-square fa-lg" style="color: green;"></i></div>';
						?>
						</div>
						<br>
						<div class="row centered">
						<?php
						if(!$res) echo '<div class="col col-3 fodaBox fodaD" id="res">Resumen de instrospección<br><i class="fa fa-file-o fa-lg"></i></div>';
						else echo '<div class="col col-3 fodaBox fodaD" id="done">Resumen de instrospección<br><i class="fa fa-file-o fa-lg"></i></div>';
						?>
						</div>
						    <script type="text/javascript">
						    	$(document).ready(function () {
										$( "div" ).on('click', function() {
											var cual = $(this).attr('id');
											switch(cual) {
												case 'for':
												case 'opo':
												case 'deb':
												case 'ame':
												case 'res':
												$.cookie('subop', cual, {path: '/'});
													$('div#ContenedorPrincipal').load('menu/foda-'+cual+'.php');
												break;
												case 'done':
													alertify.alert('Ya has realizado este cuestionario.');
												break;
											}		  
										});

						    	});
						    </script>
					
			        	</form>	
			        	</div>
			        	
		        </div>
		    </div>
		</div>
</div>
		
