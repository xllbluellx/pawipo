<!-- Modal -->
<div class="row centered">
	<div class="col">
		<div id="modal-email" class="animated bounceInRight">
		    <div class="modal" style="border: 1px solid #DDD;">
		        <div class="modal-header gradient">Bandeja de Entrada<br><span class="label tag error">Citas / Mensajes</span></div>
		        <div class="modal-body">
			        <form class="form" id="modal-email">
							<?php
							session_start();
							ob_start();
								include('../../php/bandejas.php');
								$msj = new Bandejas();
								echo $msj->bandejaTutor($_SESSION['tutor']);
							?>
						    <script type="text/javascript">
						    	$(document).ready(function () {
						    			$('button#cita').on('click', function (e) {
						    				e.preventDefault();
						    				
						    			});
						    			
						    			function enviarMsj(msj, noc, fec) {
						    				$.cookie('subop', 'citaTutor', {path: '/'});
						    					$.ajax({ 
												 data: {'mensaje': msj, 'id': noc, 'fecha': fec},
							                url: '../php/citas.php',
							                type: 'POST',
												 async: false,
							                success: function (infoRegreso) {
							                	if ($.isNumeric(infoRegreso)) {
							                			switch(parseInt(infoRegreso)) {
							                				case 1:
							                				alertify.success("Cita agendada correctamente.");
							                				$('div#ContenedorPrincipal').load('menu/citas.php');
							                				break;
							                				case -1:
							                				alertify.error('Ha ocurrido un error o algún campo es incorrecto, intenta nuevamente.');
							                				break;
							                				}
														}
							                		else{
							                			alertify.error('Algún campo es incorrecto o no existe.');
							                		}
							                	}
							            });
						    			}
						    	});
						    </script>
						</form>
		        </div>
		    </div>
		</div>
</div>
</div>