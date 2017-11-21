<!-- Modal -->
<div class="row centered">
	<div class="col col-6">
		<div id="modal-email" class="animated bounceInRight">
		    <div class="modal" style="border: 1px solid #DDD;">
		        <div class="modal-header gradient">Agendar Citas<br><span class="label tag error">Se agendará una cita con alumno</span></div>
		        <div class="modal-body">
			        <form class="form" id="modal-email">
			        <div class="row">
			        	<div class="col">
							<div class="form-item">
						        <label>Fecha</label>
						        <input type="date" value="" id="fecha" name="fecha" />
						    </div>
					   </div>
					  <div class="col">  
			        		 <div class="form-item">
						        <label>Número de Control</label>
						        <input type="number"  id="noc" name="noc" />
						    </div>
					  </div>
					 </div>
						    <div class="form-item">
						        <label>Contenido:</label>
						        <textarea id="mensaje" name="mensaje" rows="4" cols="50"></textarea>
						    </div>

						    <div class="row">
								    	<div class="col col-7">
								    		<div class="form-item">
										    <button type="submit" class="button aceptar width-100" id="cita"><i class="fa fa-envelope fa-lg"></i> Agendar</button>
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
						    			$('button#cita').on('click', function (e) {
						    				e.preventDefault();
						    				var noc = $(this).closest('form').find('input#noc').val();
						    				var fec = $(this).closest('form').find('input#fecha').val();
		  									var msj = $(this).closest('form').find('textarea#mensaje').val();
		  									if (fec == '') {
		  										alertify.error('Selecciona una fecha en formato: dd/mm/aaaa.');
		  									}else{
		  									if (msj != '') {
		  										if (noc.length == 8 && $.isNumeric(noc)) {
		  											enviarMsj(msj, noc, fec);
		  										}else {
		  											alertify.error('El número de control es incorrecto.');
		  										}
		  									}else {
		  										alertify.error('No puedes agendar una cita sin contenido.');
		  									}
		  									}
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