<?php
session_start();
ob_start();
include('conexion.php');

class Evaluar{
	private $conn;
	
		// ----------- Funcion para consultar materias.
    	public function consultarMaterias() {
    		$sql = "SELECT * FROM calificaciones WHERE calificaciones.idAlumno = ".$_SESSION['alumno'];
    		$this->conn = new Conexion('../../php/datosServer.php');
			$this->conn = $this->conn->conectar();
			
			$result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
            	echo 1;
            	}
            else {
					echo -1;            
            }
         $this->conn->close();	
			}
			
			// ----------- Funcion para registrar materias.
    	public function registrarMaterias() {
    		$sql = "";
    		$this->conn = new Conexion('../../php/datosServer.php');
			$this->conn = $this->conn->conectar();
			
			for($i = 1; $i <= 6; $i++) {
				$sql .= "INSERT INTO calificaciones VALUES (".$_SESSION['alumno'].",'".$_POST['mat-'.$i]."', -1, -1, -1, -1, -1, -1, -1, -1,'".$_POST['tip'.$i]."');";
				}
			
			if ($this->conn->multi_query($sql) === TRUE) {
				    echo 1;
				} else {
				    echo "Error: " . $sql . "<br>" . $conn->error;
				}
         $this->conn->close();	
			}
			
				// ----------- Funcion para registrar materias.
    	public function registrarKardex() {
    		$sql = "";
    		$this->conn = new Conexion('../../php/datosServer.php');
			$this->conn = $this->conn->conectar();
			$nva = 1;
			$i = 1;
			while($i <= 8) {
				if($i == 1) $sql .= "CALL guardarKardex(".$_SESSION['alumno'].",'".$_POST["par".$nva]."'";
					if(trim($_POST['par'.$nva.'-'.$i]) == '') $sql .= ",-1";
					else $sql .= ",".$_POST['par'.$nva.'-'.$i]."";
					
				if($i == 8) {
					$sql .= ");";
					$nva++;
					$i = 1;
					} else $i++;
					
				if($nva > 6) break;
				}
				
			if ($this->conn->multi_query($sql) === TRUE) {
				    echo 1;
				} else {
				    echo "Error: " . $sql . "<br>" . $conn->error;
				}
         $this->conn->close();	
			}
			
	public function editAnex8() {
		$this->conn = new Conexion('../../php/datosServer.php');
		$this->conn = $this->conn->conectar();
		$sql = "SELECT * FROM respuestas WHERE respuestas.idAnexo = 8  AND respuestas.idAlumno = ".$_SESSION['alumno'];
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

 if(isset($_COOKIE["subop"]))
{
	// Se crea objeto de la clase
    $datos = new Evaluar();
    switch($_COOKIE["subop"])
    {
        case 'regi':
            $datos->consultarMaterias();
        break;
        case 'mate':
        		$datos->registrarMaterias();
        break;
        case 'kard':
            $datos->registrarKardex();
        break;
        case 'impr':
            $datos->editAnex8();
        break;
    }
}
?>