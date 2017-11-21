<!-- Modal coordinador -->
<div class="row centered">
	<div class="col col-6">
		<div id="modal-coordinador" class="animated bounceInLeft">
		    <div class="modal" style="border: 1px dashed #BBB;">
		        <div class="modal-header">Coordinador<br><span class="label tag error">Todos los campos son obligatorios</span></div>
		        <div class="modal-body">
			        <form class="form" id="modal-coordinador">
						    <div class="form-item">
						        <label>Usuario</label>
						        <input type="text" id="user" name="user" class="width-100">
						    </div>
						
						    <div class="form-item">
						        <label>Contraseña</label>
						        <input type="password" id="pass" name="pass" class="width-100">
						    </div>
						    
						   <!-- <div class="form-item">
						    <label>Carrera</label>
						        <select class="select" id="carreras" name="carreras">
						            <option value="">-- Selecciona --</option>

									<?php
										include('../php/generarCombos.php');
									?>						             
						        </select>
						    </div> -->
						    
						     <div class="row">
						    	<div class="col col-7">
						    		<div class="form-item">
								    <button class="button aceptar width-100" id="login"><i class="fa fa-sign-in fa-lg"></i> Ingresar</button>
								    </div>
						    	</div>
								<div class="col col-5">
								    <div class="form-item">
								    <button class="button oscuro" id="cancel"><i class="fa fa-ban fa-lg"></i> Cancelar</button>
								    </div>
						    	</div>
						    </div>
						</form>
		        </div>
		    </div>
		</div>
</div>
</div>		
