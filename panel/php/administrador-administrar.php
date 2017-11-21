<?php
session_start();
ob_start();
include('conexion.php');

class editarPassword
{
	private $conn;
	
	public function editPass($tipo, $quien) {
		$this->conn = new Conexion('../../php/datosServer.php');
		$this->conn = $this->conn->conectar();
		
		//Esta linea oculta el warning de cifrado, no es relevante.
    	error_reporting(E_ERROR | E_WARNING | E_PARSE);
 	   $pass = crypt(trim($_POST['pass']));		
		$sql = "";
		switch($tipo) {
			case 1:
			$sql = "CALL nvoPassProfe('".strtoupper($quien)."','".$pass."');";
			break;
			case 2:
			$sql = "CALL nvoPassAlum('".$quien."','".$pass."');";
			break;
			case 3:
			$sql = "CALL nvoPassAdmin('".$_SESSION['admin']."','".$pass."');";
			break;
			}		
			
			if ($this->conn->query($sql) === TRUE) {
				    echo 3;
				} else {
				    echo -1;
				}			
			
		$this->conn->close();
	}
	
	public function editPassAdmin() {
		$this->conn = new Conexion('../../php/datosServer.php');
		$this->conn = $this->conn->conectar();		
		$sql = "";
		$encontrado = false;
        $sql = "CALL loginAdmin('".$_SESSION['admin']."')";
        $result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    if (hash_equals($row["pass"], crypt($_POST['old-pass'], $row["pass"])) && strcmp($row["nick"], $_SESSION['admin']) == 0)
                    {
                        $encontrado = true;
                        break;
                    }
                }
            } else {
                echo -1;
            }
            
            if($encontrado) $this->editPass(3);
            else echo -1;
		
		$this->conn->close();
	}
	
	public function editPassAlum() {
		$this->conn = new Conexion('../../php/datosServer.php');
		$this->conn = $this->conn->conectar();		
		 $encontrado = false;
        $sql = "CALL loginTutorados('".$_SESSION['alumno']."')";
        $result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    if (hash_equals($row["pass"], crypt($_POST['old-pass'], $row["pass"])) && strcmp($row["idAlumno"], $_SESSION['alumno']) == 0)
                    {
                        $encontrado = true;
                        break;
                    }
                }
            } 
            
            if($encontrado) $this->editPass(2, $_SESSION['alumno']);
            else echo -1;
		
		$this->conn->close();
	}
	
		public function editPassProf() {
		$this->conn = new Conexion('../../php/datosServer.php');
		$this->conn = $this->conn->conectar();		
		 $encontrado = false;
       $sql = "CALL loginTutor('".$_SESSION['tutor']."')";
        $result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    if (hash_equals($row["pass"], crypt($_POST['old-pass'], $row["pass"])) && strcmp($row["rfc"], $_SESSION['tutor']) == 0)
                    {
                        $encontrado = true;
                        break;
                    }
                }
            } 
            
            if($encontrado) $this->editPass(1, $_SESSION['tutor']);
            else echo -1;
		
		$this->conn->close();
	}
	
	public function editPassCoord() {
		$this->conn = new Conexion('../../php/datosServer.php');
		$this->conn = $this->conn->conectar();		
		 $encontrado = false;
       $sql = "CALL loginTutor('".$_SESSION['coordinador']."')";
        $result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    if (hash_equals($row["pass"], crypt($_POST['old-pass'], $row["pass"])) && strcmp($row["rfc"], $_SESSION['coordinador']) == 0)
                    {
                        $encontrado = true;
                        break;
                    }
                }
            } 
            
            if($encontrado) $this->editPass(1, $_SESSION['coordinador']);
            else echo -1;
		
		$this->conn->close();
	}
}
/* ---------------------------------------
------- Aquí se crea switcheo para tipo de combo mediante cookie.
------- El nombre de la cookie: subop
------------------------------------------ */ 
 if(isset($_COOKIE["subop"]))
{
	// Se crea objeto de la clase
    $datos = new editarPassword();
    switch($_COOKIE["subop"])
    {
		case 'prof':
			$datos->editPass(1, $_POST['rfc']);
		break;
		case 'alum':
		case 'camb':
			$datos->editPass(2, $_POST['id']);
		break;
		case 'change-pass':
			$datos->editPassAdmin();
		break;
		case 'change-pass-alum':
			$datos->editPassAlum();
		break;
		case 'change-pass-prof':
			$datos->editPassProf();
		break;
		case 'change-pass-coord':
			$datos->editPassCoord();
		break;
    }
}
?>