<?php
include('conexion.php');
class Verificar{
	private $conn;
	
		
		public function menu() {
		$this->conn = new Conexion('../../php/datosServer.php');
		$this->conn = $this->conn->conectar();
		$sql = "SELECT * FROM respuestas WHERE respuestas.idAlumno = ".$_SESSION['alumno'];
		$result = $this->conn->query($sql);
		$anexos = "";
		if ($result->num_rows > 0) {
			    while($row = $result->fetch_assoc()) {
			        $anexos .= $row['idAnexo'].'-'.$row['subAnexo'].',';
			    }
			}
			return $anexos;
			$this->conn->close();
		}
		
		public function anexo() {
			$realizado = false;
		$this->conn = new Conexion('../../php/datosServer.php');
		$this->conn = $this->conn->conectar();
		$sql = "SELECT * FROM anexolleno WHERE anexolleno.idAnexo = 8 AND anexolleno.idAlumno = ".$_SESSION['alumno'];
		$result = $this->conn->query($sql);
		$anexos = "";
		if ($result->num_rows > 0) {
			    while($row = $result->fetch_assoc()) {
			        $realizado = true;
			    }
			}
			return $realizado;
			$this->conn->close();
		}
}

?>