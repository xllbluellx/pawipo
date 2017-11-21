<?php
class Imagenes{
	    //Atributos globales. 
    private $host="localhost";
    private $user="root";
    private $pw="root";
    private $db="taddi2";
    private $conn;
    
	public function __construct() {
		include('datosServer.php');
		$this->host = $ho;
		$this->user = $us;
		$this->pw = $pw;
		$this->db = $db;	
	}    
    
    //--------------- función para conectar
    public function conectar()
    {
       $this -> conn = new mysqli($this->host, $this->user, $this->pw, $this->db);
       $this->conn->set_charset('utf8');
        if (mysqli_connect_error()) {
            die("Error en conexión: " . mysqli_connect_error());
        }    
    }
    
    public function imgCual($lugar, $tipo) {
    	$this->conectar();
        $sql = "CALL imagen('".$tipo."')";
        $result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
						echo '<img src="'.$lugar.$row['idImg'].'" alt="">';
                }
            }
            
            $this->conn->close();
    }
    
    public function msjTutor($quien) {
    	$this->conectar();
    	$i = 0;
        $sql = "SELECT * FROM citasAluTut WHERE visto = 0 AND para = '".$quien."';";
        $result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
						$i++;
                }
            }
            return $i;
            $this->conn->close();
    }
    
    public function msjAlumno($quien) {
    	$this->conectar();
    	$i = 0;
        $sql = "SELECT * FROM citasTutAlu WHERE visto = 0 AND para = ".$quien;
        $result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
						$i++;
                }
            }
            return $i;
            $this->conn->close();
    }
}
?>