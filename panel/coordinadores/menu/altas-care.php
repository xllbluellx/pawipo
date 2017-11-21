<!-- Modal -->
<div class="row centered">
	<div class="col col-6">
		<div id="modal-altas-care" class="animated bounceInRight">
		    <div class="modal" style="border: 1px solid #DDD;">
		        <div class="modal-header gradient">Ingresar nueva carrera<br><span class="label tag error">Todos los campos son obligatorios</span></div>
		        <div class="modal-body">
			        <form class="form" id="modal-altas-care">
						    <div class="form-item">
						        <label>id Carrera</label>
						        <input  data-tipso="4 letras mayúsculas: ABCD" type="text" id="idCarrera" name="idCarrera" class="width-100" required>
						    </div>
						
						    <div class="form-item">
						        <label>Carrera</label>
						        <input   data-tipso="2 o 3 caracteres" type="text" id="carrera" name="carrera" class="width-100" required>
						    </div>
						    
						    <div class="row">
								    	<div class="col col-7">
								    		<div class="form-item">
										    <button type="submit" class="button aceptar width-100" id="guardar">Guardar carrera <i class="fa fa-check fa-lg"></i></button>
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
						    			$("input#idCarrera, input#carrera").tipso({
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