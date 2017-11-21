<!-- Modal -->
<div class="row centered">
	<div class="col col-6">
		<div id="modal-email" class="animated bounceInRight">
		    <div class="modal" style="border: 1px solid #DDD;">
		        <div class="modal-header gradient">Enviar un correo<br><span class="label tag error">El correo se enviará a tu tutor.</span></div>
		        <div class="modal-body">
			        <form class="form" id="modal-email">
						    <div class="form-item">
						        <label>Contenido del Correo:</label>
						        <textarea id="mensaje" name="mensaje" rows="4" cols="50"></textarea>
						    </div>

						    <div class="row">
								    	<div class="col col-7">
								    		<div class="form-item">
										    <button type="submit" class="button aceptar width-100" id="email"><i class="fa fa-envelope fa-lg"></i> Enviar correo</button>
										    </div>
								    	</div>
										<div class="col">
										    <div class="form-item">
										    <button class="button oscuro width-100" id="cancel"><i class="fa fa-ban fa-lg"></i> Cancelar</button>
										    </div>
								    	</div>
							</div>
						    <script type="text/javascript">
						    	$(document).ready(function () {
						    			$('button#email').on('click', function (e) {
						    				e.preventDefault();
		  									var msj = $(this).closest('form').find('textarea#mensaje').val();
		  									if (msj != '') {
		  										enviarMsj(msj);
		  									}else {
		  										alertify.error('No puedes enviar un Email vacio.');
		  									}
						    			});
						    			
						    			function enviarMsj(msj) {
						    					$.ajax({ 
												 data: {'mensaje': msj},
							                url: '../php/mail.php',
							                type: 'POST',
												 async: false,
							                success: function (infoRegreso) {
							                	if ($.isNumeric(infoRegreso)) {
							                			switch(parseInt(infoRegreso)) {
							                				case 1:
							                				$('div#ContenedorPrincipal').load('menu/correo.php');
							                				break;
							                				case -1:
							                				alertify.error('Ha ocurrido un error, intenta nuevamente.');
							                				break;
							                				}
														}
							                		else{
							                			alertify.error('Ha ocurrido un error, intenta nuevamente.');
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