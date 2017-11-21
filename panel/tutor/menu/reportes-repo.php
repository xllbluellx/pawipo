<!-- Modal -->
<div class="row centered">
	<div class="col col-10">
		<div id="modal-reportes-repo" class="animated bounceInRight">
		    <div class="modal" style="border: 1px solid #DDD;">
		        <div class="modal-header gradient">Reporte Semestral<br><span class="label tag error">Genera formato en PDF</span></div>
		        <div class="modal-body">
			        <form class="form" id="modal-reportes-repo">
			        		<div class="row centered">
			        			<div class="col col-10">
			        			
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
								    <div id="informacion"></div>
								    <div class="row">
								    	<div class="col col-7">
								    		<div class="form-item">
										    <button type="button" class="button aceptar width-100" id="gen-pdf"><i class="fa fa-file-pdf-o fa-lg"></i> Generar PDF</button>
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
