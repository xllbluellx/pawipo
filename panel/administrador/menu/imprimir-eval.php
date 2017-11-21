<!-- Modal -->
<div class="row centered">
	<div class="col">
		<div id="modal-imprimir-eval" class="animated bounceInRight">
		    <div class="modal" style="border: 1px solid #DDD;">
		        <div class="modal-header gradient">Evaluaciones de Tutores<br><span class="label tag error">Genera formatos en PDF</span></div>
		        <div class="modal-body">
			        <form class="form" id="modal-imprimir-eval">
			        		<div class="row">

			        				<div class="col col-4">
					        		<div class="form-item">
								    <label>Carrera</label>
								        <select class="select" id="carrera" name="carrera">
								            <option value="">-- Selecciona --</option>
								            <?php
													include('../../php/generarCombos.php');
													$combo = new GenerarCombos('../../../php/datosServer.php');
													$combo->generarComboCarreras();
												?>	
								        </select>
								    </div>
 									</div>
 									
 									<div class="col">
	 									<div class="form-item">
								        <label>Año</label>
								        <input type="number" name="anio" id="anio">
								    </div>
 									</div>

								    	<div class="col">
								    		<div class="form-item"><br>
										    <button type="button" class="button aceptar width-100" id="con-eva"><i class="fa fa-search fa-lg"></i> Consultar</button>
										    </div>
								    	</div>
										<div class="col">
										    <div class="form-item"><br>
										    <button class="button oscuro width-100" id="cancel"><i class="fa fa-ban fa-lg"></i> Cancelar</button>
										    </div>
								    	</div>
						    </div>
						</form>
						<div id="tablas"></div>
		        </div>
		    </div>
		    <script type="text/javascript">
							$(document).ready(function () {
								$('div#tablas').on('click','i',function () {
									var cual = $(this).closest('td').attr('id');
									$.cookie('info', cual, {path: '/'});
									window.open('../reportes/evaluacion.php', '_blank');
								});
							});
			</script>
		</div>
</div>
</div>		
