<?php
include('conexion.php');

class Bandejas{
private $conn;

public function bandejaTutor($tutor){
		$datos = '<table class="tableLines-tutor anexosBox animated fadeIn"><tr class="titleTable"><th>Alumno</th><th>Mensaje</th><th>Eliminar</th></tr>';
		$this->conn = new Conexion('../../../php/datosServer.php');
		$this->conn = $this->conn->conectar();
		$sql = "CALL bandejaTutor('".$tutor."');";
		$result = $this->conn->query($sql);
		if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    			  $leido = '';
    			  if(intval($row['visto']) == 0) $leido = '<div style="float: right;"><i class="fa fa-eye-slash fa-lg"></i> No leído</div>';
    			  else $leido = '<div style="float: right;"><i class="fa fa-eye-slash fa-lg"></i> Leído</div>';
    	        $msj = substr($row['msj'], 0, 45).'... <span id="'.$row['id'].'" style="cursor: pointer;" class="label primary outline">Leer más</span>';
		        $datos .= '<tr><td>'.$row['nom'].'</td><td><b style="color: #f34248;">Cita agendada para la fecha:</b> '.$row['fecha'].'<hr><i class="fa fa-feed fa-lg"></i> '.$msj.'<br>'.$leido.'</td><td id="'.$row['id'].'"><span id="elim-msj" style="cursor: pointer;" class="label badge error"><i class="fa fa-remove fa-lg"></i></span></td></tr>';
		    }
		}
		
		$datos .= '</table>';
		$this->conn->close();
		return $datos;
}

public function bandejaAlumno($alumno){
		$datos = '<table class="tableLines-tutor anexosBox animated fadeIn"><tr class="titleTable"><th>Cita agendada</th><th>Mensaje</th><th>Eliminar</th></tr>';
		$this->conn = new Conexion('../../../php/datosServer.php');
		$this->conn = $this->conn->conectar();
		$sql = "CALL bandejaAlumno(".$alumno.");";
		$result = $this->conn->query($sql);
		if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    			  $leido = '';
    			  if(intval($row['visto']) == 0) $leido = '<div style="float: right;"><i class="fa fa-eye-slash fa-lg"></i> No leído</div>';
    			  else $leido = '<div style="float: right;"><i class="fa fa-eye-slash fa-lg"></i> Leído</div>';
    	        $msj = substr($row['msj'], 0, 45).'... <span id="'.$row['id'].'" style="cursor: pointer;" class="label primary outline">Leer más</span>';
		        $datos .= '<tr><td><b style="color: #f34248;">Cita agendada para la fecha:</b> '.$row['fecha'].'<hr></td><td><i class="fa fa-feed fa-lg"></i> '.$msj.'<br>'.$leido.'</td><td id="'.$row['id'].'"><span id="elim-msj" style="cursor: pointer;" class="label badge error"><i class="fa fa-remove fa-lg"></i></span></td></tr>';
		    }
		}
		
		$datos .= '</table>';
		$this->conn->close();
		return $datos;
}

}
?>