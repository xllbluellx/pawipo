<?php
include('conexion.php');

class Tutorados{
	private $conn;
	
	public function altas() {
		$this->conn = new Conexion('../../php/datosServer.php');
		$this->conn = $this->conn->conectar();
		$sql = "UPDATE alumnos SET alumnos.activo = 1 WHERE alumnos.idAlumno =".$_POST['noc'];

			if ($this->conn->query($sql) === TRUE) {
			    echo 1;
			} else {
			    echo -1;
			}
		$this->conn->close();
		}
		
		public function bajas() {
		$this->conn = new Conexion('../../php/datosServer.php');
		$this->conn = $this->conn->conectar();
		$sql = "UPDATE alumnos SET alumnos.activo = 0 WHERE alumnos.idAlumno =".$_POST['noc'];

			if ($this->conn->query($sql) === TRUE) {
			    echo 1;
			} else {
			    echo -1;
			}
		$this->conn->close();
		}
	}

if(isset($_COOKIE["subop"]) && isset($_COOKIE["op"]))
{
	// Se crea objeto de la clase
    $datos = new Tutorados();
    switch($_COOKIE["subop"])
    {
        case 'alta':
            $datos->altas();
        break;
        case 'baja':
            $datos->bajas();
        break;
    }
}
?>