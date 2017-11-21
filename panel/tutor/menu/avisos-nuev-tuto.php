<!-- Modal -->
<div class="row centered">
	<div class="col col-6">
		<div id="modal-avisos-nuev" class="animated bounceInRight">
		    <div class="modal" style="border: 1px solid #DDD;">
		        <div class="modal-header gradient">Escribe un nuevo aviso<br><span class="label tag error">Todos los campos son obligatorios</span></div>
		        <div class="modal-body">
			        <form class="form" id="modal-avisos-nuev-tuto">
						    <div class="form-item">
						        <label>Aviso</label>
						        <textarea id="aviso" name="aviso" rows="4" cols="50"></textarea>
						    </div>
						
							<span class="label tag error">A quien va dirigido el aviso:</span>
						    <div class="form-item">
								    <label>Grupo</label>
								        <select class="select" id="grupo" name="grupo">
								            <?php
								            session_start();
													include('../../php/generarCombos.php');
													$combo = new GenerarCombos('../../../php/datosServer.php');
													$combo->generarComboGruposTutor($_SESSION['tutor']);
												?>	
								        </select>
							</div>
						    
						    <div class="row">
								    	<div class="col col-7">
								    		<div class="form-item">
										    <button type="submit" class="button aceptar width-100" id="guardar">Guardar aviso <i class="fa fa-check fa-lg"></i></button>
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