<?php
/* 
---- Tener en cuenta que este archivo solamente fue
creado para no modificar las cookies y no crear más clases; 
la clase de consultas que se incluye tiene los prerequisitos para
consultar antes de eliminar.
*/
include('conexion.php');

class EliminarDatos
{
private $conn;
	
	public function eliminarUser($tipo) {
		$this->conn = new Conexion('../../php/datosServer.php');
		$this->conn = $this->conn->conectar();
		
		$sql = "";
		$tipo == 1 ? $sql = "CALL bajaProfe('".$_COOKIE["eliminar"]."');" : "CALL bajaAlum('".$_COOKIE["eliminar"]."');";

		if ($this->conn->query($sql) === TRUE) {
		    echo '<div class="alert success animated fadeInDown"><i class="fa fa-thumbs-up fa-2x"></i> <b>Registro eliminado correctamente.</b></div>';
		} else {
		    echo '<div class="alert error animated fadeInDown"><i class="fa fa-warning fa-2x"></i> <b>Ocurrió un error, intenta nuevamente.</b></div>';
		}
		unset($_COOKIE["eliminar"]);
		setcookie('eliminar', '', time() - 3600, '/');
		$this->conn->close();
	}
}

if(isset($_COOKIE["eliminar"]))
{
	// Se crea objeto de la clase GenerarCombo
    $datos = new EliminarDatos();

    switch($_POST["dato"])
    {
    	  case 2:
            $datos->eliminarUser(2);
        break;
        case 1:
            $datos->eliminarUser(1);
        break;
    }
}
?>