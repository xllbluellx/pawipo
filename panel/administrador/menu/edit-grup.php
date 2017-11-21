<?php
include('../../php/conexion.php');
$conn = new Conexion('../../../php/datosServer.php');
$conn = $conn->conectar();
// ---------------------------------- obtiene datos del profesor que llenan inputs.
$sql = "SELECT * FROM grupos WHERE grupos.idGrupo = '".$_COOKIE['info']."'";
$result = $conn->query($sql);
$info = "";
		
	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	        $info = $row['idGrupo'].','.$row['nombreGrupo'].','.$row['salon'].','.$row['hora'].','.$row['idCarrera'].','.$row['idPeriodo'].','.$row['rfcTutor'];
	    }
	}
$infoGrup = explode(",", $info);
$infoIdGrupo = explode('-', $infoGrup[0]);

// ----------------------------------------------------------------------

$conn->close();
?>
<!-- Modal -->
<div class="row centered">
	<div class="col col-10">
		<div id="modal-altas-grup" class="animated bounceInRight">
		    <div class="modal" style="border: 1px solid #DDD;">
		        <div class="modal-header gradient">Editar grupo<br><span class="label tag error">Todos los campos son obligatorios</span></div>
		        <div class="modal-body">
			        <form class="form" id="modal-altas-grup">
			        		<div class="row">
			        			<div class="col">
			        			
			        			<div class="row">
			        				<div class="col">
					        			<div class="form-item">
										    <label>Selecciona año</label>
										        <select class="select" id="anio" name="anio">
													<?php
													include("../../php/generarCombos.php");
													$combo = new GenerarCombos("../../../php/datosServer.php");
													$combo->generarComboAnios($infoIdGrupo[1]);
													?>	
										        </select>
										</div>
									 </div>
									 <div class="col">
									 <div class="form-item">
								    <label>Grupo Id</label>
								        <select class="select" id="letra" name="letra">
											<?php
													$combo->generarComboGrupId($infoIdGrupo[3]);
											?>	
								        </select>
								    </div>
									 </div>
								    </div>
								
								    <div class="form-item">
								        <label>Nombre del grupo</label>
								        <?php
								         echo '<input value="'.$infoGrup[1].'" pattern=".{2,45}" data-tipso="2 caracteres mínimo"  type="text" id="nom-gru" name="nom-gru" class="width-100">';
								        ?>
								    </div>
								    <div class="form-item">
								        <label>Hora</label>
								       <select class="select" id="hora" name="hora">
								       	<option value="">-- Selecciona --</option>
												<?php 
												$horas = "";
													for($i = 7; $i < 21; $i++) {
														if($i < 10) {
															if(strcmp("0".$i.":00", $infoGrup[3]) !== 0) 
															$horas .= "<option value='0".$i.":00'>0".$i.":00</option>";
															else $horas .= "<option value='0".$i.":00' selected>0".$i.":00</option>";
															}
															else {
															if(strcmp($i.":00", $infoGrup[3]) !== 0) 
															$horas .= "<option value='".$i.":00'>".$i.":00</option>";
															else $horas .= "<option value='".$i.":00' selected>".$i.":00</option>";	
																}
														}
												echo $horas;
												?>
								       </select>
								    </div>
								    <div class="form-item">
								        <label>Salón</label>
								        <?php 
								        	echo ' <input value="'.$infoGrup[2].'" pattern=".{2,3}" data-tipso="2 o 3 caracteres" type="text" id="salon" name="salon" class="width-100">';
								        ?>
								    </div>
								    
			        			</div>
			        			
			        			<div class="col">
			        			 	 <div class="form-item">
								    <label>Selecciona periodo</label>
								        <select class="select" id="periodo" name="periodo">
												<?php
													$combo->generarComboPeriodo($infoGrup[5]);
												?>	
								        </select>
								    </div>
								    <div class="form-item">
								    <label>Carrera</label>
								        <select class="select" id="carrera" name="carrera">
								            <option value="">-- Selecciona --</option>
								            <?php
													$combo->generarComboCarrerasEdit($infoGrup[4]);
												?>	
								        </select>
								    </div>
								    
								    <div class="form-item">
								    <label>Tutor</label>
								        <select class="select" id="tutor" name="tutor">
								           <?php
													$combo->generarComboRolesEdit($infoGrup[6], $infoGrup[4]);
												?>	
								        </select>
								    </div>
								    <br>

								    <div class="row">
								    	<div class="col col-7">
								    		<div class="form-item">
										    <button type="submit" class="button aceptar width-100" name="edit-grup" id="edit-">Actualizar grupo <i class="fa fa-check fa-lg"></i></button>
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
