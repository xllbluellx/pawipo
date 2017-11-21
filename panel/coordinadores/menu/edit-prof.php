<!-- Modal -->
<?php
include('../../php/conexion.php');
$conn = new Conexion('../../../php/datosServer.php');
$conn = $conn->conectar();
// ---------------------------------- obtiene datos del profesor que llenan inputs.
$sql = "SELECT * FROM profesores WHERE profesores.rfc = '".$_COOKIE['dato']."'";
$result = $conn->query($sql);
$info = "";
		
	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	        $info = $row['rfc'].','.$row['nombre'].','.$row['apellidoP'].','.$row['apellidoM'].','.$row['idCarrera'].','.$row['email'].','.$row['activo'].','.$row['pass'];
	    }
	}
$infoProf = explode(",", $info);
$conn->next_result();

// ------------------------- consulta para checkboxes de tutores
$sql = "SELECT roles.idCarrera FROM roles WHERE roles.rfc = '".$_COOKIE['dato']."' AND roles.rol = 'Tutor';";
$result = $conn->query($sql);
$tuto = "";
		
	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	        $tuto .= $row['idCarrera'].',';
	    }
	}
$conn->next_result();
// ---------------------- consulta para checkboxes de coordinadores
$sql = "SELECT roles.idCarrera FROM roles WHERE roles.rfc = '".$_COOKIE['dato']."' AND roles.rol = 'Coordinador';";
$result = $conn->query($sql);
$coor = "";
		
	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	        $coor .= $row['idCarrera'].',';
	    }
	}

// ----------------------------------------------------------------------
	 unset($_COOKIE['dato']);
    setcookie('dato', null, -1, '/');
$conn->close();
?>

<div class="row centered">
	<div class="col col-10">
		<div id="modal-altas-prof" class="animated bounceInRight">
		    <div class="modal" style="border: 1px solid #DDD;">
		        <div class="modal-header gradient">Actualizar información de profesor(a)<br><span class="label tag error">Todos los campos son obligatorios</span></div>
		        <div class="modal-body">
			        <form class="form" id="modal-altas-prof">
			        		<div class="row">
			        			<div class="col">
								    <div class="form-item">
								        <label>RFC</label>
								        <?php
								        echo '<input value="'.$infoProf[0].'" data-tipso="El RFC tiene 13 caracteres."  type="text" id="rfc" name="rfc" class="width-100">';
								        ?>
								    </div>
								    
								    <div class="form-item">
								        <label>Nombre</label>
								        <?php
								        echo '<input value="'.$infoProf[1].'" type="text" id="nombre" name="nombre" class="width-100">';
								        ?>
								    </div>

								    <div class="form-item">
								        <label>Apellido paterno</label>
								        <?php 
								        echo '<input value="'.$infoProf[2].'" type="text" id="apep" name="apep" class="width-100">';
								        ?>
								    </div>
								    
								    <div class="form-item">
								        <label>Apellido materno</label>
								        <?php
								        echo '<input value="'.$infoProf[3].'" type="text" id="apem" name="apem" class="width-100">';
								        ?>
								    </div>
								    				    
			        			</div>
			        			
			        			<div class="col">
			        				<div class="form-item">
								    <label>Carrera del profesor</label>
								        <select class="select" id="carrera" name="carrera">
								            <option value="">-- Selecciona --</option>
								            <?php
													include("../../php/generarCombos.php");
													$combo = new GenerarCombos("../../../php/datosServer.php");
													$combo->generarComboCarrerasEdit($infoProf[4]);
												?>	
								        </select>
								    </div>
								    
								    <div class="form-item">
								        <label>Correo</label>
								        <?php 
								        echo '<input value="'.$infoProf[5].'" type="text" id="ema" name="ema" class="width-100">';
								        ?>
								    </div>
								    <div class="form-item">
								        <?php
								        echo '<input value="'.$infoProf[7].'"  type="hidden" id="pass" name="pass" class="width-100">';
								        ?>
								    </div>
								    <br>
								    <div class="form-item checkboxes-inline">
								    <?php 
								    	if(intval($infoProf[6])) {
								    		echo '<label><input type="radio" id="activo" name="activo" value="1" checked><span class="label  success"> Activo</span></label>
								        <label><input type="radio" id="activo" name="activo" value="0"><span class="label  error"> No Activo</span></label>';
								    		}
								    		else {
								    		echo '<label><input type="radio" id="activo" name="activo" value="1"><span class="label  success"> Activo</span></label>
								        <label><input type="radio" id="activo" name="activo" value="0" checked><span class="label  error"> No Activo</span></label>';
								    			}
								    ?>
								    </div>
								    <div class="form-item">
								        <?php
								        echo '<input value="'.$infoProf[0].'"  type="hidden" id="rfc-resp" name="rfc-resp" class="width-100">';
								        ?>
								    </div>
			        			</div>
						    </div>
						    <script type="text/javascript">
						    	$(document).ready(function () {
						    			$("input#rfc, input#pass").tipso({
											  showArrow: true,
											  position: "top",
											  background: "rgba(0, 0, 0, 0.5)",
											  color: "#eee",
											  useTitle: false,
											  animationIn: "bounceIn",
											  animationOut: "bounceOut",
											  size: "small"
										});
						    	});
						    </script>
						<!-- </form> -->
						<hr>

						<div class="row">
							<div class="col">
							
							</div>
							<div class="col">
							
							</div>						
						</div>						
						
						<div id="togglebox-tutor" class="hid">
						<!-- <form class="form" id="modal-altas-prof"> -->
			        		<div class="row">
			        			<div class="col">
									<div class="form-item checkboxes">
								    <label><i class="fa fa-user fa-lg"></i> <b>Tutor de Carrera(s):</b></label>
								            <?php
													$combo = new GenerarCombos("../../../php/datosServer.php");
													$combo->generarCheckBoxCarrerasTutCor("tut-car", $tuto);
												?>	
								    </div>
			        			</div>
			        			<div class="col">
									<div class="form-item checkboxes">
								    <label><i class="fa fa-graduation-cap fa-lg"></i> <b>Coordinador de Carrera(s):</b></label>
								            <?php
													$combo = new GenerarCombos("../../../php/datosServer.php");
													$combo->generarCheckBoxCarrerasTutCor("cor-car", $coor);
												?>	
								    </div>
								    <hr>
								    <div class="row">
								    	<div class="col col-7">
								    		<div class="form-item">
										    <button type="submit" class="button aceptar width-100" name="edit-prof" id="edit-">Actualizar <i class="fa fa-check fa-lg"></i></button>
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
</div>		
