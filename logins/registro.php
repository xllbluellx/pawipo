<!-- Modal coordinador -->
<div class="row centered">
	<div class="col col-6">
		<div id="modal-registro" class="animated bounceInLeft">
		    <div class="modal" style="border: 1px dashed #BBB;">
		        <div class="modal-header">Registra tus datos<br><span class="label tag error">Todos los campos son obligatorios</span></div>
		        <div class="modal-body">
			        <form class="form" id="modal-registro">
			        		<div class="row">
			        			<div class="col">
			        			<div class="form-item">
								    <label>Nombre(s)</label>
								        <input type="text" id="nombre" name="nombre" class="width-100">
								    </div>
								
								    <div class="form-item">
								        <label>Apellido Paterno</label>
								        <input type="text" id="apep" name="apep" class="width-100">
								    </div>
								    
								    <div class="form-item">
								        <label>Correo Electrónico</label>
								        <input type="text" id="email" name="email" class="width-100">
								    </div>
								    
								    <div class="form-item">
								        <label>Contraseña</label>
								        <input title="Más de 4 digitos" type="password" id="pass1" name="pass1" class="width-100">
								    </div>
								    
								    <div class="form-item">
								        <label>Repite Contraseña</label>
								        <input type="password" id="pass2" name="pass2" class="width-100">
								    </div>
			        			</div>
			        			
			        			<div class="col">
			        			<div class="form-item">
								    <label>No. de Control</label>
								        <input title="Ingresa tu No. de Control correcto" type="text" id="noc" name="noc" class="width-100">
								    </div>
								
								    <div class="form-item">
								        <label>Apellido Materno</label>
								        <input type="text" id="apem" name="apem" class="width-100">
								    </div>
								    
								    <div class="form-item">
								    <label>Carrera</label>
								        <select class="select" id="carrera" name="carrera">
								            <option value="">-- Selecciona --</option>
								            <?php
													include('../php/generarCombos.php');
												?>	
								        </select>
								    </div>
								    
								    <div class="form-item">
								    <label>Grupo</label>
								        <select class="select" id="grupo" name="grupo">
								            <option value="">-- Selecciona --</option>
								        </select>
								    </div>
									<span class="label warning"><i class="fa fa-exclamation-circle fa-lg"></i> Pregunta de Seguridad</span>
									<div class="row">
										<div class="col">
										<div class="numberBoxes" id="num1">
						                <?php echo rand(0,15); ?>
						            </div>
										</div>
										<div class="col">
										<div class="numberBoxes">
										<b>+</b>
						            </div>
										</div>
										<div class="col">
										<div class="numberBoxes" id="num2">
						                <?php echo rand(0,15); ?>
						            </div>
										</div>
										<div class="col">
										<div class="form-item">
						                <input type="text" class="error" id="seguridad" >
						            </div>
										</div>									
									</div>								    
								    
			        			</div>
						    </div>
						    
						    <div class="row">
						    	<div class="col">
						    		<div class="form-item">
								    <button type="submit" class="button aceptar width-100" id="signin">Confirmar registro <i class="fa fa-check fa-lg"></i></button>
								    </div>
						    	</div>
								<div class="col">
								    <div class="form-item">
								    <button class="button oscuro width-50" id="cancel"><i class="fa fa-ban fa-lg"></i> Cancelar</button>
								    </div>
						    </div>
						    </div>
						</form>
		        </div>
		    </div>
		</div>
</div>
</div>		
