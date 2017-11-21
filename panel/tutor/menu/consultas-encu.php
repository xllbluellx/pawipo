<!-- Modal -->
<div class="row centered">
	<div class="col col-12">
		<div id="modal-consultas-encu" class="animated bounceInRight">
		    <div class="modal" style="border: 1px solid #DDD;">
		        <div class="modal-header gradient">Consultar Encuestas<br></div>
		        <div class="modal-body">
			        <form class="form" id="modal-consultas-encu">
			        <div class="row">
			        				<div class="col">
					        		<div class="form-item">
								    <label>Selecciona Grupo:</label>
								        <select class="select" id="grupo" name="grupo">
								            <?php
								            session_start();
													include('../../php/generarCombos.php');
													$combo = new GenerarCombos('../../../php/datosServer.php');
													$combo->generarComboGruposTutor($_SESSION['tutor']);
												?>	
								        </select>
								    </div>
								  </div>
								  <div class="col"><br>
								  <button id="genpdf" class="button oscuro outline" disabled><i class="fa fa-file-pdf-o fa-lg"></i> Generar PDF</button>
								  </div>
						</div>
							<div class="row">
			        			<div class="col">
			        				
					<table class="flat tableLines fodaDesc" style="font-size: 12px;">
						<tr>
							<td><b style="color: #400101;">E. 1:</b> Formato de Entrevista</td>	
							<td><b style="color: #400101;">E. 2:</b> Línea de Vida</td>
							<td><b style="color: #400101;">E. 3:</b> Análisis FODA</td>
							<td><b style="color: #400101;">E. 4:</b> Habilidades de Estudio</td>
							<td><b style="color: #400101;">E. 5:</b> Estilos de Aprendizaje</td>
							<td><b style="color: #400101;">E. 6:</b> Test de Autoestima</td>
							<td><b style="color: #400101;">E. 7:</b> Test de Asertividad</td>
							<td><b style="color: #400101;">E. 8:</b> Desempeño del Tutor</td>
							<td><b style="color: #400101;">E. 9:</b> Anexo 19</td>					
						</tr>		        
		        </table>
								    <div id="informacion"></div>
			        			</div>
						    </div>
						</form>
						<script type="text/javascript">
							$(document).ready(function () {
								$('div#informacion').on('click','i',function () {
									var cual = $(this).closest('td').attr('id');
									$.cookie('anexo', cual, {path: '/'});
									window.open('../reportes/encuestas.php', '_blank');
								});
							});
						</script>
		        </div>
		    </div>
		</div>
</div>
</div>