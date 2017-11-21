<!-- Modal -->
<div class="row centered">
	<div class="col col-10">
		<div id="modal-constancias-tuto" class="animated bounceInRight">
		    <div class="modal" style="border: 1px solid #DDD;">
		        <div class="modal-header gradient">Imprimir Informe de Encuestas<br></div>
		        <div class="modal-body">
			        <form class="form" id="modal-constancias-tuto">
			        		<div class="row centered">
			        			<div class="col col-10">
			        			
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
								    <div class="form-item">
								        <label>Tutor</label>
								       <select class="select" id="tutor" name="tutor">
								       	<option value="">-- Selecciona --</option>
								       </select>
								    </div>
								    <div class="form-item">
								        <label>Grupo</label>
								       <select class="select" id="grup" name="grup">
								       	<option value="">-- Selecciona --</option>
								       </select>
								    </div>
								    
								    <div class="row">
								    	<div class="col col-7">
								    		<div class="form-item">
										    <button type="button" class="button aceptar width-100" id="cons-tuto"><i class="fa fa-file-pdf-o fa-lg"></i> Generar PDF</button>
										    </div>
								    	</div>
										<div class="col">
										    <div class="form-item">
										    <button class="button oscuro width-100" id="cancel"><i class="fa fa-ban fa-lg"></i> Cancelar</button>
										    </div>
								    	</div>
									</div>
			        			</div>
						    </div>
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
										
								$('form#modal-constancias-tuto').on('click','button#cons-tuto',function (e) {
									e.preventDefault();
									var noc = $('form#modal-constancias-tuto').find('select#grup').val();
									
									if(noc.length != 0) {
										$.cookie('info', noc+'_encu', {path: '/'});
									   generarPDF();
									  }
									
								});
								
								// ---------- Mediante AJAX se generan PDF
								function generarPDF() {	
									window.open('../reportes/reporte.php', '_blank');
								}
							
						    	}); 
						    </script>
						</form>
		        </div>
		    </div>
		</div>
</div>
</div>		
