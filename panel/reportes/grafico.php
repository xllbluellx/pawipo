<?php
session_start();
ob_start();
include('../php/conexion.php');
	// --------------- Anexo 8: Desempeño del tutor
class Anexo_8{
	private $conn;
	public function anexo8($i) {
		$p1 = array(0, 0, 0, 0, 0);
		$this->conn = new Conexion('../../php/datosServer.php');
		$this->conn = $this->conn->conectar();	
		if(isset($_SESSION['tutor'])) $sql = "CALL grafico('".$_SESSION['tutor']."');";
		if(isset($_SESSION['admin'])) $sql = "CALL graficoAdmin('".$_COOKIE['info']."');";
		$result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_array(MYSQLI_NUM)) {  
                   $ar = json_decode($row[0], true);

                   switch($ar[$i]['value']) {
					   case 1: $p1[0]++; break;
					   case 2: $p1[1]++; break;
					   case 3: $p1[2]++; break;
					   case 4: $p1[3]++; break;
					   case 5: $p1[4]++; break;
				   }  	
                }
            }
      
         $this->conn->close();
		 return $p1;
	}
}

?>
