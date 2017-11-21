<!-- Modal -->
<div class="row centered">
	<div class="col col-10">
		<div id="modal-altas-prof" class="animated bounceInRight">
		    <div class="modal" style="border: 1px solid #DDD;">
		        <div class="modal-header gradient">Registrar profesor<br><span class="label tag error">Todos los campos son obligatorios</span></div>
		        <div class="modal-body">
			        <form class="form" id="modal-altas-prof">
			        		<div class="row">
			        			<div class="col">
								    <div class="form-item">
								        <label>RFC</label>
								        <input data-tipso="El RFC tiene 13 caracteres."  type="text" id="rfc" name="rfc" class="width-100">
								    </div>
								    
								    <div class="form-item">
								        <label>Nombre</label>
								        <input type="text" id="nombre" name="nombre" class="width-100">
								    </div>

								    <div class="form-item">
								        <label>Apellido paterno</label>
								        <input  type="text" id="apep" name="apep" class="width-100">
								    </div>
								    
								    <div class="form-item">
								        <label>Apellido materno</label>
								        <input  type="text" id="apem" name="apem" class="width-100">
								    </div>
								    				    
			        			</div>
			        			
			        			<div class="col">
			        				<div class="form-item">
								    <label>Carrera del profesor</label>
								        <select class="select" id="carrera" name="carrera">
								            <option value="">-- Selecciona --</option>
								            <?php
													include("../../php/generarCombos.php");
													$combo = new GenerarCombos("../../../php/datosServer.php");
													$combo->generarComboCarreras();
												?>	
								        </select>
								    </div>
								    
								    <div class="form-item">
								        <label>Correo</label>
								        <input  type="text" id="ema" name="ema" class="width-100">
								    </div>
								    
								    <div class="form-item">
								        <label>Contraseña</label>
								        <input data-tipso="Mímino 4 caracteres" type="password" id="pass" name="pass" class="width-100">
								    </div>
								    <br>
								    <div class="form-item checkboxes-inline">
								        <label><input type="radio" id="activo" name="activo" value="1" checked><span class="label  success"> Activo</span></label>
								        <label><input type="radio" id="activo" name="activo" value="0"><span class="label  error"> No Activo</span></label>
								    </div>
								    
			        			</div>
						    </div>
						    <script type="text/javascript">
						    	$(document).ready(function () {
						    			$("input#rfc, input#pass").tipso({
											  showArrow: true,
											  position: "top",
											  background: "rgba(0, 0, 0, 0.5)",
											  color: "#eee",
											  useTitle: false,
											  animationIn: "bounceIn",
											  animationOut: "bounceOut",
											  size: "small"
										});
						    	});
						    </script>
						<!-- </form> -->
						<hr>

						<div class="row">
							<div class="col">
							
							</div>
							<div class="col">
							
							</div>						
						</div>						
						
						<div id="togglebox-tutor" class="hid">
						<!-- <form class="form" id="modal-altas-prof"> -->
			        		<div class="row">
			        			<div class="col">
									<div class="form-item checkboxes">
								    <label><i class="fa fa-user fa-lg"></i> <b>Tutor de Carrera(s):</b></label>
								            <?php
													$combo = new GenerarCombos("../../../php/datosServer.php");
													$combo->generarCheckBoxCarreras("tut-car");
												?>	
								    </div>
			        			</div>
			        			<div class="col">
									<div class="form-item checkboxes">
								    <label><i class="fa fa-graduation-cap fa-lg"></i> <b>Coordinador de Carrera(s):</b></label>
								            <?php
													$combo = new GenerarCombos("../../../php/datosServer.php");
													$combo->generarCheckBoxCarreras("cor-car");
												?>	
								    </div>
								    <hr>
								    <div class="row">
								    	<div class="col col-7">
								    		<div class="form-item">
										    <button type="submit" class="button aceptar width-100" id="guardar">Registrar <i class="fa fa-check fa-lg"></i></button>
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
			        	</form>
			        	</div>
			        	
		        </div>
		    </div>
		</div>
</div>
</div>		
