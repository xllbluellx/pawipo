<?php
session_start();
ob_start();
include('conexion.php');

class Citas{

	public function AgendarCita() {
		$sql = '';
		$this->conn = new Conexion('../../php/datosServer.php');
		$this->conn = $this->conn->conectar();
		if(isset($_SESSION['tutor'])) $sql = "CALL citaTutAlu('".$_SESSION['tutor']."','".$_POST['fecha']."',".$_POST['id'].",'".$_POST['mensaje']."');";
		if(isset($_SESSION['alumno'])) $sql = "CALL citaAluTut('".$_SESSION['alumno']."','".$_POST['fecha']."','".$_POST['mensaje']."');";
		if ($this->conn->query($sql) === TRUE) {
		    echo 1;
		} else {
		    echo -1;
		}
		  
		    $this->conn->close(); 
		}			
}

 if(isset($_COOKIE["subop"]))
{
	// Se crea objeto de la clase
    $datos = new Citas();
    switch($_COOKIE["subop"])
    {
        case 'citaTutor':
         $correo = $datos->AgendarCita();
        break;
        case 'citaAlumno':
         $correo = $datos->AgendarCita();
        break;
    }
}
?>