<!-- Modal -->
<div class="row centered">
	<div class="col">
		<div id="modal-consultas-expe" class="animated bounceInRight">
		    <div class="modal" style="border: 1px solid #DDD;">
		        <div class="modal-header gradient">Consultar Expediente de Alumno<br></div>
		        <div class="modal-body">
			        <form class="form" id="modal-consultas-expe">
			        		<div class="row centered">
			        			<div class="col col-5">
			        				 <div class="form-item">
								        <label>Número de control</label>
								        <input data-tipso="Escribe el Número de control" type="number" id="id" name="id">
								    </div>
									</div>
						    	    <div class="col col-4">
								    		<div class="form-item"><br>
										    <button type="submit" class="button aceptar width-100" id="consultar"><i class="fa fa-search-plus fa-lg"></i> Consultar</button>
										    </div>
								    	</div>
										<div class="col col-3">
										    <div class="form-item">
										    <br>
										    <button class="button oscuro width-100" id="cancel"><i class="fa fa-ban fa-lg"></i> Cancelar</button>
										    </div>
								    	</div>

						    </div>
						    <div id="informacion"></div>
						    <script type="text/javascript">
						    	$(document).ready(function () {
						    			$("input#id").tipso({
											  showArrow: true,
											  position: 'top',
											  background: 'rgba(0, 0, 0, 0.5)',
											  color: '#eee',
											  useTitle: false,
											  animationIn: 'bounceIn',
											  animationOut: 'bounceOut',
											  size: 'small'
										});
										
								$('div#informacion').on('click','i',function () {
									var cual = $(this).closest('td').attr('id');
									$.cookie('anexo', cual, {path: '/'});
									window.open('../reportes/encuestas.php', '_blank');
								});
								
								$('div#informacion').on('click','button#guarda-obs', function (e) {
									e.preventDefault();
										var id = $("div#ContenedorPrincipal").find('form#modal-consultas-expe input#id').val();
										var obs = $("div#ContenedorPrincipal").find('form#modal-consultas-expe textarea#obser').val();
										if (id != '' && obs != '') {
											$.cookie('subop', 'g-expe', {path: '/'});
											obtenerInfo(id, obs);
										}
								});
								
							function obtenerInfo(id, obs) {
							$.ajax({ 
										 data: {'id': id, 'obs': obs},
					                url: '../php/tutor-consultas.php',
					                type: 'POST',
										 async: false,
					                success: function (infoRegreso) {
					                	if (parseInt(infoRegreso) == -1) {
					                		alertify.alert('Ocurrió un error, intenta nuevamente o más tarde.');
					                	}else {
					                		alert('Se guardaron correctamente las observaciones.');
					                		location.reload();
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
