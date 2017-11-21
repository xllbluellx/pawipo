<?php
session_start();
ob_start();
include('conexion.php');

class Correo{

	public function EnviarAlumTutor() {
		$datos = '';
		$this->conn = new Conexion('../../php/datosServer.php');
		$this->conn = $this->conn->conectar();
		$sql = "CALL AlumEmail(".$_SESSION['alumno'].");";
		$result = $this->conn->query($sql);
		if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
		        $datos = $row['email'].',';
		        break;
		    }
		}
		
		$this->conn->next_result();
		$sql = "SELECT alumnos.email FROM alumnos WHERE alumnos.idAlumno = ".$_SESSION['alumno'];
		$result = $this->conn->query($sql);
		if ($result->num_rows > 0){
		while($row = $result->fetch_assoc()) {
		        $datos .= $row['email'];
		        break;
		    }
		  }  
		    $this->conn->close(); 
			return $datos;
		}
		
		public function EnviarTutorAlum($alumno) {
		$datos = '';
		$this->conn = new Conexion('../../php/datosServer.php');
		$this->conn = $this->conn->conectar();
		$sql = "SELECT alumnos.email FROM alumnos WHERE alumnos.idAlumno = ".$alumno;
		$result = $this->conn->query($sql);
		if ($result->num_rows > 0){
		while($row = $result->fetch_assoc()) {
		        $datos = $row['email'].',';
		        break;
		    }
		  }
		
		$this->conn->next_result();
		$sql = "CALL AlumEmail(".$alumno.");";
		$result = $this->conn->query($sql);
		if ($result->num_rows > 0) {
	
	    while($row = $result->fetch_assoc()) {
			        $datos .= $row['email'];
			        break;
			    }
			}
		   $this->conn->close(); 
			return $datos;
		}
				
}
?>