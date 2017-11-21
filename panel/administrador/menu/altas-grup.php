<!-- Modal -->
<div class="row centered">
	<div class="col col-10">
		<div id="modal-altas-grup" class="animated bounceInRight">
		    <div class="modal" style="border: 1px solid #DDD;">
		        <div class="modal-header gradient">Registrar nuevo grupo<br><span class="label tag error">Todos los campos son obligatorios</span></div>
		        <div class="modal-body">
			        <form class="form" id="modal-altas-grup">
			        		<div class="row">
			        			<div class="col">
			        			
			        			<div class="row">
			        				<div class="col">
					        			<div class="form-item">
										    <label>Selecciona año</label>
										        <select class="select" id="anio" name="anio">
		
										        </select>
										        		<script>
										        		$(document).ready(function () {
										        		  var anios = "";
										        		  var myDate = new Date();
														  var year = myDate.getFullYear();
														  for(var i = year; i >= (year - 10); i--){
															  anios += '<option value="'+i+'">'+i+'</option>';
														  }
														  
														  $('div#ContenedorPrincipal').find('select#anio').append(anios);
										        		});
														</script>
										</div>
									 </div>
									 <div class="col">
									 <div class="form-item">
								    <label>Grupo Id</label>
								        <select class="select" id="letra" name="letra">
												<option value="A">A</option>
												<option value="B">B</option>
												<option value="C">C</option>
								        </select>
								    </div>
									 </div>
								    </div>
								
								    <div class="form-item">
								        <label>Nombre del grupo</label>
								        <input pattern=".{2,45}" data-tipso="2 caracteres mínimo"  type="text" id="nom-gru" name="nom-gru" class="width-100">
								    </div>
								    <div class="form-item">
								        <label>Hora</label>
								       <select class="select" id="hora" name="hora">
								       	<option value="">-- Selecciona --</option>
												<?php 
												$horas = "";
													for($i = 7; $i < 21; $i++) {
														if($i < 10) {
															$horas .= "<option value='0".$i.":00'>0".$i.":00</option>";
															}
															else {
															$horas .= "<option value='".$i.":00'>".$i.":00</option>";	
																}
														}
												echo $horas;
												?>
								       </select>
								    </div>
								    <div class="form-item">
								        <label>Salón</label>
								        <input placeholder="A1/AB2" pattern=".{2,3}" data-tipso="2 o 3 caracteres" type="text" id="salon" name="salon" class="width-100">
								    </div>
								    
			        			</div>
			        			
			        			<div class="col">
			        			 	 <div class="form-item">
								    <label>Selecciona periodo</label>
								        <select class="select" id="periodo" name="periodo">
												<option value="Enero-Julio">Enero-Julio</option>
												<option value="Verano">Verano</option>
												<option value="Agosto-Diciembre">Agosto-Diciembre</option>
								        </select>
								    </div>
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
								    <br>

								    <div class="row">
								    	<div class="col col-7">
								    		<div class="form-item">
										    <button type="submit" class="button aceptar width-100" id="guardar">Guardar grupo <i class="fa fa-check fa-lg"></i></button>
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
						    			$("input#salon, input#nom-gru").tipso({
											  showArrow: true,
											  position: 'top',
											  background: 'rgba(0, 0, 0, 0.5)',
											  color: '#eee',
											  useTitle: false,
											  animationIn: 'bounceIn',
											  animationOut: 'bounceOut',
											  size: 'small'
										});
						    	});
						    </script>
						</form>
		        </div>
		    </div>
		</div>
</div>
</div>		
