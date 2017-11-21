<?php
include('../../php/conexion.php');
$conn = new Conexion('../../../php/datosServer.php');
$conn = $conn->conectar();
// ---------------------------------- obtiene datos del alumno que llenan inputs.
$sql = "CALL infoAlumno(".$_COOKIE['info'].");";
$result = $conn->query($sql);
$info = "";
		
	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	        $info = $row['idAlumno'].','.$row['nombre'].','.$row['apellidoP'].','.$row['apellidoM'].','.$row['idCarrera'].','.$row['email'].','.$row['activo'].','.$row['idGrupo'];
	    }
	}
$infoAlum = explode(",", $info);
$conn->next_result();

$conn->close();
?>

<!-- Modal coordinador -->
<div class="row centered">
	<div class="col col-10">
		<div id="modal-edit-alum" class="animated bounceInLeft">
		    <div class="modal" style="border: 1px dashed #BBB;">
		        <div class="modal-header">Actualizar datos de alumno<br><span class="label tag error">Todos los campos son obligatorios</span></div>
		        <div class="modal-body">
			        <form class="form" id="modal-edit-alum">
			        		<div class="row">
			        			<div class="col">
			        			<div class="form-item">
								    <label>Nombre(s)</label>
								    <?php
								       echo '<input type="text" id="nombre" name="nombre" value="'.$infoAlum[1].'" class="width-100">';
								    ?>
								    </div>
								
								    <div class="form-item">
								        <label>Apellido Paterno</label>
								        <?php
								        echo '<input type="text" id="apep" name="apep" value="'.$infoAlum[2].'" class="width-100">';
								        ?>
								    </div>
								    
								    <div class="form-item">
								        <label>Correo Electrónico</label>
								        <?php
								        echo '<input value="'.$infoAlum[5].'" type="text" id="email" name="email" class="width-100">';
								        ?>
								    </div>
								    
								    <div class="form-item checkboxes-inline">
								    <?php 
								    	if(intval($infoAlum[6])) {
								    		echo '<label><input type="radio" id="activo" name="activo" value="1" checked><span class="label  success"> Activo</span></label>
								        <label><input type="radio" id="activo" name="activo" value="0"><span class="label  error"> No Activo</span></label>';
								    		}
								    		else {
								    		echo '<label><input type="radio" id="activo" name="activo" value="1"><span class="label  success"> Activo</span></label>
								        <label><input type="radio" id="activo" name="activo" value="0" checked><span class="label  error"> No Activo</span></label>';
								    			}
								    ?>
								    </div>
			        			</div>
			        			
			        			<div class="col">
			        			<div class="form-item">
								    <label>No. de Control</label>
								    <?php
								      echo  '<input value="'.$infoAlum[0].'" title="Ingresa tu No. de Control correcto" type="text" disabled="true" id="noc" name="noc" class="width-100">';
									 ?>								    
								    </div>
								
								    <div class="form-item">
								        <label>Apellido Materno</label>
								        <?php
								        echo '<input type="text" id="apem" name="apem" value="'.$infoAlum[3].'" class="width-100">';
								        ?>
								    </div>
								    
								    <div class="form-item">
								    <label>Carrera</label>
								        <select class="select" id="carrera" name="carrera">
								            <option value="">-- Selecciona --</option>
								           <?php
													include("../../php/generarCombos.php");
													$combo = new GenerarCombos("../../../php/datosServer.php");
													$combo->generarComboCarrerasEdit($infoAlum[4]);
												?>	
								        </select>
								    </div>
								    
								    <div class="form-item">
								    <label>Grupo</label>
								        <select class="select" id="grupo" name="grupo">
								            <?php
													$combo->generarComboGruposAlum($infoAlum[7], $infoAlum[4]);
												?>
								        </select>
								    </div>								    
								    
			        			</div>
						    </div>
						    
						    <div class="row">
						    	<div class="col">
						    		<div class="form-item">
								    <button type="submit" class="button aceptar width-100" id="edit-alum" name="edit-">Actualizar <i class="fa fa-check fa-lg"></i></button>
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
