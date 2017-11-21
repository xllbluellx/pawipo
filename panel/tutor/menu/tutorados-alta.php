<!-- Modal -->
<div class="row centered">
	<div class="col col-10">
		<div id="modal-tutorados-alta" class="animated bounceInRight">
		    <div class="modal" style="border: 1px solid #DDD;">
		        <div class="modal-header gradient">Alta de alumno<br><span class="label tag error">Todos los campos son obligatorios</span></div>
		        <div class="modal-body">
			        <form class="form" id="modal-tutorados-alta">
			        		<div class="row centered">
			        			<div class="col col-7">
			        				 <div class="form-item">
								        <label>Número de Control</label>
								        <input data-tipso="Escribe el número de control" type="number" id="noc" name="noc">
								    </div>
								    <br>

								    <div class="row">
								    	<div class="col col-7">
								    		<div class="form-item">
										    <button type="submit" class="button aceptar width-100" id="guardar"><i class="fa fa-check fa-lg"></i> Confirmar</button>
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
						    			$("input#noc").tipso({
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
