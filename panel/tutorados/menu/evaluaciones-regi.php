<?php
session_start();
ob_start();
include('../../php/conexion.php');
$conn = new Conexion('../../../php/datosServer.php');
$conn = $conn->conectar();
$sql = "SELECT * FROM calificaciones WHERE calificaciones.idAlumno = ".$_SESSION['alumno'];
$result = $conn->query($sql);
$info = array();
		
if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
	       $info[] = array($row['idMateria'], $row['par1'], $row['par2'], $row['par3'], $row['par4'], $row['par5'], $row['par6'], $row['par7'], $row['par8']);
	    }
	}

$conn->close();
?> 

<!-- Modal -->
<div class="row centered">
	<div class="col col-11">
		<div id="modal-evaluaciones-regi" class="animated bounceInRight">
		    <div class="modal" style="border: 1px solid #DDD;">
		        <div class="modal-header gradient">Registrar calificaciones parciales<br><span class="label tag error">Las calificaciones que se registren no pueden ser editadas posteriormente</span>
		        </div>
		        <div class="modal-body">
			         <form class="form" id="modal-evaluaciones-regi">
			         	<!-- - - - - - - - - - - - - Cabecera de la encuesta - - - - - - - - - - - -->
						<div class="row" style="font-size: 12px; text-align: center;">
							<div class="col-4">Materia <span style="font-size: 12px; text-align: center; color: #f34248;">(Ingresa números enteros)</span></div>
							<div class="col-1">U. 1</div>
							<div class="col-1">U. 2</div>
							<div class="col-1">U. 3</div>
							<div class="col-1">U. 4</div>	
							<div class="col-1">U. 5</div>	
							<div class="col-1">U. 6</div>	
							<div class="col-1">U. 7</div>	
							<div class="col-1">U. 8</div>							    
					    </div>
						<!-- Materia 1 -->
					    <div class="row">
					    <?php 
					    	echo '<div class="col-4"><div class="form-item">
						        <input type="text"  readonly="readonly" name="par1" value="'.$info[0][0].'">
						    	</div></div>';
						    	for($i = 1; $i <= 8; $i++) {
						    		if(intval($info[0][$i]) < 0) echo '<div class="col-1"><input pattern="[0-9]{1,3}" type="number" name="par1-'.$i.'"></div>';
						    		else {
						    			if(intval($info[0][$i]) > -1 && intval($info[0][$i]) < 70) echo '<div class="col-1"><input type="number" name="par1-'.$i.'" class="error" readonly="readonly" value="'.$info[0][$i].'"></div>';
						    			else echo '<div class="col-1"><input type="number" name="par1-'.$i.'" readonly="readonly" value="'.$info[0][$i].'"></div>';
						    		}
						    	}
					    ?>							    
					    </div>
					    <!-- Materia 2 -->
					    <div class="row">
							<?php 
					    	echo '<div class="col-4"><div class="form-item">
						        <input type="text"  readonly="readonly" name="par2" value="'.$info[1][0].'">
						    	</div></div>';
						    	for($i = 1; $i <= 8; $i++) {
						    		if(intval($info[1][$i]) == -1) echo '<div class="col-1"><input type="number" name="par2-'.$i.'"></div>';
						    		else {
						    			if(intval($info[1][$i]) > -1 && intval($info[1][$i]) < 70) echo '<div class="col-1"><input type="number" name="par2-'.$i.'" class="error" readonly="readonly" value="'.$info[1][$i].'"></div>';
						    			
						    			else echo '<div class="col-1"><input type="number" name="par2-'.$i.'" readonly="readonly" value="'.$info[1][$i].'"></div>';
						    			}
						    		}
					    ?>						    
					    </div>
					    <!-- Materia 3 -->
					    <div class="row">
							<?php 
					    	echo '<div class="col-4"><div class="form-item">
						        <input type="text"  readonly="readonly" name="par3" value="'.$info[2][0].'">
						    	</div></div>';
						    	for($i = 1; $i <= 8; $i++) {
						    		if(intval($info[2][$i]) < 0) echo '<div class="col-1"><input type="number" name="par3-'.$i.'"></div>';
						    		else {
										if(intval($info[2][$i]) > -1 && intval($info[2][$i]) < 70) echo '<div class="col-1"><input type="number" name="par3-'.$i.'" class="error" readonly="readonly" value="'.$info[2][$i].'"></div>';						    			
						    			else echo '<div class="col-1"><input type="number" name="par3-'.$i.'" readonly="readonly" value="'.$info[2][$i].'"></div>';
						    		}
						    	}
					    ?>							    
					    </div>
					    
					    <!-- Materia 4 -->
					    <div class="row">
							<?php 
					    	echo '<div class="col-4"><div class="form-item">
						        <input type="text"  readonly="readonly" name="par4" value="'.$info[3][0].'">
						    	</div></div>';
						    	for($i = 1; $i <= 8; $i++) {
						    		if(intval($info[3][$i]) < 0) echo '<div class="col-1"><input type="number" name="par4-'.$i.'"></div>';
						    		else {
										if(intval($info[3][$i]) > -1 && intval($info[3][$i]) < 70) echo '<div class="col-1"><input type="number" name="par4-'.$i.'" class="error" readonly="readonly" value="'.$info[3][$i].'"></div>';						    			
						    			else echo '<div class="col-1"><input type="number" name="par4-'.$i.'" readonly="readonly" value="'.$info[3][$i].'"></div>';
						    		}
						    	}
					    ?>						    
					    </div>
					    <!-- Materia 5 -->
					    <div class="row">
							<?php 
					    	echo '<div class="col-4"><div class="form-item">
						        <input type="text"  readonly="readonly" name="par5" value="'.$info[4][0].'">
						    	</div></div>';
						    	for($i = 1; $i <= 8; $i++) {
						    		if(intval($info[4][$i]) < 0) echo '<div class="col-1"><input type="number" name="par5-'.$i.'"></div>';
						    		else {
										if(intval($info[4][$i]) > -1 && intval($info[4][$i]) < 70) echo '<div class="col-1"><input type="number" name="par5-'.$i.'" class="error" readonly="readonly" value="'.$info[4][$i].'"></div>'; 						    			
						    			else echo '<div class="col-1"><input type="number" name="par5-'.$i.'" readonly="readonly" value="'.$info[4][$i].'"></div>';
						    		}
						    		}
					    ?>							    
					    </div>
					    <!-- Materia 6 -->
					    <div class="row">
							<?php 
					    	echo '<div class="col-4"><div class="form-item">
						        <input type="text"  readonly="readonly" name="par6" value="'.$info[5][0].'">
						    	</div></div>';
						    	for($i = 1; $i <= 8; $i++) {
						    		if(intval($info[5][$i]) < 0) echo '<div class="col-1"><input type="number" name="par6-'.$i.'"></div>';
						    		else {
										if(intval($info[5][$i]) > -1 && intval($info[5][$i]) < 70) echo '<div class="col-1"><input type="number" name="par6-'.$i.'" class="error" readonly="readonly" value="'.$info[5][$i].'"></div>';						    			
						    			else echo '<div class="col-1"><input type="number" name="par6-'.$i.'" readonly="readonly" value="'.$info[5][$i].'"></div>';
						    		}
						    		}
					    ?>						    
					    </div> 
					    
					    <!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
					    
					    <div class="row centered">
							    	<div class="col col-5">
							    		<div class="form-item">
									    <button type="submit" class="button aceptar width-100" id="guardar-calif"><i class="fa fa-check fa-lg"></i> Guardar Kardex</button>
									    </div>
							    	</div>
									<div class="col col-5">
									    <div class="form-item">
									    <button class="button oscuro width-100" id="cancel"><i class="fa fa-ban fa-lg"></i> Cancelar</button>
									    </div>
							    	</div>
								</div>
					    <script type="text/javascript">
					    	$(document).ready(function () {
									

					    	});
					    </script>
						<!-- </form> -->						
			        </form>
	        	</div>			        	
	        </div>
	    </div>
	</div>
</div>
		
