<?php
session_start();
ob_start();
include('conexion.php');
class Anexos{
	private $conn;

	public function contestado($ane) {
		$this->conn->next_result();
		$sql = "INSERT INTO anexolleno VALUES(".$ane.",".$_SESSION['alumno'].");";
		if ($this->conn->query($sql) === TRUE) {

			} else {
			    echo "Error: " . $this->conn->error;
			}
		}	
	
	public function guardarAnex1() {
		$this->conn = new Conexion('../../php/datosServer.php');
		$this->conn = $this->conn->conectar();
		$sql = "INSERT INTO respuestas VALUES(1, 1, ".$_SESSION['alumno'].", '".$_POST["datos"]."');";
		if ($this->conn->query($sql) === TRUE) {
				 $extension = end(explode(".", $_FILES["imagen"]["name"]));
			    move_uploaded_file($_FILES["imagen"]["tmp_name"], "../img/img_".$_SESSION['alumno'].".".$extension);
			    	$this->conn->next_result();
					$sql = "SELECT * FROM respuestas WHERE respuestas.idAnexo = 1 AND respuestas.subAnexo = 2 AND respuestas.idAlumno = ".$_SESSION['alumno'];
					$result = $this->conn->query($sql);
					if ($result->num_rows > 0) {
							$this->contestado(1);
						}
			} else {
			    echo "Error: " . $this->conn->error;
			}
			$this->conn->close(); 
		}
		
		public function guardarAnex1_2() {
		$this->conn = new Conexion('../../php/datosServer.php');
		$this->conn = $this->conn->conectar();
		$sql = "INSERT INTO respuestas VALUES(1, 2, ".$_SESSION['alumno'].", '".$_POST["datos"]."');";
		if ($this->conn->query($sql) === TRUE) {
			$this->conn->next_result();
			$sql = "SELECT * FROM respuestas WHERE respuestas.idAnexo = 1 AND respuestas.subAnexo = 1 AND respuestas.idAlumno = ".$_SESSION['alumno'];
			$result = $this->conn->query($sql);
		if ($result->num_rows > 0) {
				$this->contestado(1);
				}
			} else {
			    echo "Error: " . $this->conn->error;
			}
			$this->conn->close(); 
		}
		
		public function guardarAnex2() {
		$this->conn = new Conexion('../../php/datosServer.php');
		$this->conn = $this->conn->conectar();
		$sql = "INSERT INTO respuestas VALUES(2, 1, ".$_SESSION['alumno'].", '".$_POST["datos"]."');";
		if ($this->conn->query($sql) === TRUE) {
				$this->contestado(2);
			} else {
			    echo "Error: " . $this->conn->error;
			}
			$this->conn->close(); 
		}
		
		public function guardarAnex3() {
		$this->conn = new Conexion('../../php/datosServer.php');
		$this->conn = $this->conn->conectar();
		$cual = "";
		switch($_COOKIE['subop']) {
			case 'for': $cual = 1; break;
			case 'opo': $cual = 2; break;
			case 'deb': $cual = 3; break;
			case 'ame': $cual = 4; break;
			case 'res': $cual = 5; break;
			}		
		
		$sql = "INSERT INTO respuestas VALUES(3, ".$cual.", ".$_SESSION['alumno'].", '".$_POST["datos"]."');";
		if ($this->conn->query($sql) === TRUE) {
			$this->conn->next_result();
			$sql = "SELECT * FROM respuestas WHERE respuestas.idAnexo = 3 AND respuestas.idAlumno = ".$_SESSION['alumno'];
			$result = $this->conn->query($sql);
		if ($result->num_rows == 5) {
				$this->contestado(3);
				}
			echo $cual;
			} else {
			    echo "Error: " . $this->conn->error;
			}
			$this->conn->close(); 
		}
		
		public function guardarAnex4() {
		$this->conn = new Conexion('../../php/datosServer.php');
		$this->conn = $this->conn->conectar();
		$sql = "INSERT INTO respuestas VALUES(4, 1, ".$_SESSION['alumno'].", '".$_POST["datos"]."');";
		if ($this->conn->query($sql) === TRUE) {
				$this->contestado(4);
			} else {
			    echo "Error: " . $this->conn->error;
			}
			$this->conn->close(); 
		}
		
		public function guardarAnex5() {
		$this->conn = new Conexion('../../php/datosServer.php');
		$this->conn = $this->conn->conectar();
		$sql = "INSERT INTO respuestas VALUES(5, 1, ".$_SESSION['alumno'].", '".$_POST["datos"]."');";
		if ($this->conn->query($sql) === TRUE) {
				$this->contestado(5);
			} else {
			    echo "Error: " . $this->conn->error;
			}
			$this->conn->close(); 
		}
		
		public function guardarAnex6() {
		$this->conn = new Conexion('../../php/datosServer.php');
		$this->conn = $this->conn->conectar();
		$sql = "INSERT INTO respuestas VALUES(6, 1, ".$_SESSION['alumno'].", '".$_POST["datos"]."');";
		if ($this->conn->query($sql) === TRUE) {
				$this->contestado(6);
			} else {
			    echo "Error: " . $this->conn->error;
			}
			$this->conn->close(); 
		}
		
		public function guardarAnex7() {
		$this->conn = new Conexion('../../php/datosServer.php');
		$this->conn = $this->conn->conectar();
		$sql = "INSERT INTO respuestas VALUES(7, 1, ".$_SESSION['alumno'].", '".$_POST["datos"]."');";
		if ($this->conn->query($sql) === TRUE) {
				$this->contestado(7);
			} else {
			    echo "Error: " . $this->conn->error;
			}
			$this->conn->close(); 
		}
		
		public function guardarAnex8() {
		$this->conn = new Conexion('../../php/datosServer.php');
		$this->conn = $this->conn->conectar();
		$sql = "INSERT INTO respuestas VALUES(8, 1, ".$_SESSION['alumno'].", '".$_POST["datos"]."');";
		if ($this->conn->query($sql) === TRUE) {
				$this->contestado(8);
			} else {
			    echo "Error: " . $this->conn->error;
			}
			$this->conn->close(); 
		}
		
		public function editAnex1() {
		$this->conn = new Conexion('../../php/datosServer.php');
		$this->conn = $this->conn->conectar();
		$sql = "SELECT * FROM respuestas WHERE respuestas.idAnexo = 1 AND (respuestas.subAnexo = 1 OR respuestas.subAnexo = 2) AND respuestas.idAlumno = ".$_SESSION['alumno'];
		$result = $this->conn->query($sql);
		if ($result->num_rows > 0) {
			    // output data of each row
			    while($row = $result->fetch_assoc()) {
			        echo $row['respuestas'];
			    }
			} else {
			    echo "0 results";
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
            if(strcmp($_COOKIE["op"], 'anexos') === 0) $datos->guardarAnex1();
            else $datos->editAnex1();
        break;
        case 'form-2':
            if(strcmp($_COOKIE["op"], 'anexos') === 0) $datos->guardarAnex1_2();
            else $datos->editAnex1();
        break;
        case 'line':
        if(strcmp($_COOKIE["op"], 'anexos') === 0) $datos->guardarAnex2();
        break;
        case 'for':
        case 'opo':
        case 'deb':
        case 'ame':
        case 'res':
        if(strcmp($_COOKIE["op"], 'anexos') === 0) $datos->guardarAnex3();
        break;
        case 'habi':
        if(strcmp($_COOKIE["op"], 'anexos') === 0) $datos->guardarAnex4();
        break;
        case 'esti':
        if(strcmp($_COOKIE["op"], 'anexos') === 0) $datos->guardarAnex5();
        break;
        case 'auto':
        if(strcmp($_COOKIE["op"], 'anexos') === 0) $datos->guardarAnex6();
        break;
        case 'aser':
        if(strcmp($_COOKIE["op"], 'anexos') === 0) $datos->guardarAnex7();
        break;
        case 'real':
        if(strcmp($_COOKIE["op"], 'evaluaciones') === 0) $datos->guardarAnex8();
        break;
    }
}
?>