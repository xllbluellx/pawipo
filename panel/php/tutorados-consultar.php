<?php
session_start();
ob_start();
include('conexion.php');
class Anexos{
	private $conn;

		public function editAnex1() {
		$completo = 0;
		$this->conn = new Conexion('../../php/datosServer.php');
		$this->conn = $this->conn->conectar();
		$sql = "SELECT * FROM respuestas WHERE respuestas.idAnexo = 1 AND (respuestas.subAnexo = 1 OR respuestas.subAnexo = 2) AND respuestas.idAlumno = ".$_SESSION['alumno'];
		$result = $this->conn->query($sql);
		if ($result->num_rows == 2) {
			    // output data of each row
			    while($row = $result->fetch_assoc()) {
			        echo 1;
			    }
			} else {
			    echo -1;
			}
			
			/*foreach($array as $ar){
				echo $ar['value'].'<br>';			
			}*/
			$this->conn->close();
		}
		
		public function editAnex2() {
		$this->conn = new Conexion('../../php/datosServer.php');
		$this->conn = $this->conn->conectar();
		$sql = "SELECT * FROM respuestas WHERE respuestas.idAnexo = 2  AND respuestas.idAlumno = ".$_SESSION['alumno'];
		$result = $this->conn->query($sql);
		if ($result->num_rows > 0) {
			    // output data of each row
			    while($row = $result->fetch_assoc()) {
			        echo 2;
			    }
			} else {
			    echo -1;
			}
			$this->conn->close();
		}
		
		public function editAnex3() {
		$this->conn = new Conexion('../../php/datosServer.php');
		$this->conn = $this->conn->conectar();
		$sql = "SELECT * FROM respuestas WHERE respuestas.idAnexo = 3  AND respuestas.idAlumno = ".$_SESSION['alumno'];
		$result = $this->conn->query($sql);
		if ($result->num_rows == 5) {
			    // output data of each row
			    while($row = $result->fetch_assoc()) {
			        echo 3;
			    }
			} else {
			    echo -1;
			}
			$this->conn->close();
		}
		
		public function editAnex4() {
		$this->conn = new Conexion('../../php/datosServer.php');
		$this->conn = $this->conn->conectar();
		$sql = "SELECT * FROM respuestas WHERE respuestas.idAnexo = 4  AND respuestas.idAlumno = ".$_SESSION['alumno'];
		$result = $this->conn->query($sql);
		if ($result->num_rows > 0) {
			    // output data of each row
			    while($row = $result->fetch_assoc()) {
			        echo 4;
			    }
			} else {
			    echo -1;
			}
			$this->conn->close();
		}
		
		public function editAnex5() {
		$this->conn = new Conexion('../../php/datosServer.php');
		$this->conn = $this->conn->conectar();
		$sql = "SELECT * FROM respuestas WHERE respuestas.idAnexo = 5  AND respuestas.idAlumno = ".$_SESSION['alumno'];
		$result = $this->conn->query($sql);
		if ($result->num_rows > 0) {
			    // output data of each row
			    while($row = $result->fetch_assoc()) {
			        echo 5;
			    }
			} else {
			    echo -1;
			}
			$this->conn->close();
		}
		
		public function editAnex6() {
		$this->conn = new Conexion('../../php/datosServer.php');
		$this->conn = $this->conn->conectar();
		$sql = "SELECT * FROM respuestas WHERE respuestas.idAnexo = 6  AND respuestas.idAlumno = ".$_SESSION['alumno'];
		$result = $this->conn->query($sql);
		if ($result->num_rows > 0) {
			    // output data of each row
			    while($row = $result->fetch_assoc()) {
			        echo 6;
			    }
			} else {
			    echo -1;
			}
			$this->conn->close();
		}
		
		public function editAnex7() {
		$this->conn = new Conexion('../../php/datosServer.php');
		$this->conn = $this->conn->conectar();
		$sql = "SELECT * FROM respuestas WHERE respuestas.idAnexo = 7  AND respuestas.idAlumno = ".$_SESSION['alumno'];
		$result = $this->conn->query($sql);
		if ($result->num_rows > 0) {
			    // output data of each row
			    while($row = $result->fetch_assoc()) {
			        echo 6;
			    }
			} else {
			    echo -1;
			}
			$this->conn->close();
		}
}

 if(isset($_COOKIE["subop"]) && isset($_COOKIE["op"]))
{
	// Se crea objeto de la clase
    $datos = new Anexos();
    switch($_COOKIE["subop"])
    {
        case 'form-1':
            $datos->editAnex1();
        break;
        case 'line':
            $datos->editAnex2();
        break;
        case 'foda':
            $datos->editAnex3();
        break;
        case 'habi':
            $datos->editAnex4();
        break;
        case 'esti':
            $datos->editAnex5();
        break;
        case 'auto':
            $datos->editAnex6();
        break;
        case 'aser':
            $datos->editAnex7();
        break;
    }
}
?>