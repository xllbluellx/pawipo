<?php
session_start();
ob_start();

class GenerarCombos
{
    //Atributos globales. 
    private $host="";
    private $user="";
    private $pw="";
    private $db="";
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
    
    // --- Genera combo de Coordinadores y Registro (carreras)
    public function generarComboCarreras() {
        $this->conectar();
        $combo = "";
        $sql = "CALL generarComboCarreras('var')";
        $result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
						$combo .= '<option value="'.$row['idCarrera'].'">'.$row['carrera'].'</option>';
                }
            }
            echo $combo;
            $this->conn->close();
    	}
    	

    	
      // --- Genera combo de grupos 
    public function generarComboGrupos($carrera) {
        $this->conectar();
        $combo = '<option value="">-- Selecciona --</option>';
        $sql = "CALL generarComboGrupos('".$carrera."')";
        $result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
						$combo .= '<option value="'.$row['idGrupo'].'">'.$row['nombreGrupo'].'</option>';
                }
            }
            echo $combo;
            $this->conn->close();
    	}
}

/* ---------------------------------------
------- Aquí se crea switcheo para tipo de combo mediante cookie.
------- El nombre de la cookie: tipo / se crea en js/scripts.js
------------------------------------------ */ 
 if(isset($_COOKIE["tipo"]))
{
	// Se crea objeto de la clase GenerarCombo
    $usuario = new GenerarCombos();
    switch($_COOKIE["tipo"])
    {
        case 'coordinadores':
            $usuario->generarComboCarreras();
        break;
        case 'registro':
				$usuario->generarComboCarreras();
        break;
        default:
				$usuario->generarComboGrupos($_COOKIE["tipo"]);
        break;
    }
}
?>