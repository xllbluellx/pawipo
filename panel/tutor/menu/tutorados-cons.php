<!-- Modal -->
<div class="row centered">
	<div class="col">
		<div id="modal-consultas-expe" class="animated bounceInRight">
		    <div class="modal" style="border: 1px solid #DDD;">
		        <div class="modal-header gradient">Generar Constancia de Tutorado<br></div>
		        <div class="modal-body">
			        <form class="form" id="modal-constancia">
			        		<div class="row centered">
			        			<div class="col col-5">
			        				 <div class="form-item">
								        <label>Número de control</label>
								        <input data-tipso="Escribe el Número de control" type="number" id="id" name="id">
								    </div>
									</div>
						    	    <div class="col col-4">
								    		<div class="form-item"><br>
										    <button type="button" class="button aceptar width-100" id="constancia"><i class="fa fa-search-plus fa-lg"></i> Consultar</button>
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
										
								$('form#modal-constancia').on('click','button#constancia',function (e) {
									e.preventDefault();
									var noc = $('form#modal-constancia').find('input#id').val();
									
									if (noc.length == 8 && $.isNumeric(noc)) {
										$.cookie('anexo', '9-'+noc, {path: '/'});
										window.open('../reportes/encuestas.php', '_blank');
									}else{
										alertify.error('El formato de número de control es incorrecto.');
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
