<?php
// Se incluye clase Generar Combos.
include ('generarCombos.php');

class AdminAltas
{
    //Atributos globales. 
    private $host="";
    private $user="";
    private $pw="";
    private $db="";
    private $conn;
    
	public function __construct($datosServer) {
		include($datosServer);
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
    
    // ----------- Altas grupo
    public function altasGrupo() {
    	$this->conectar();
		$idCarrera = "";
		switch($_POST['periodo']) {
			case 'Enero-Julio':
			$idCarrera = $_POST['carrera']."-".$_POST['anio']."-1-".$_POST['letra'];
			break;
			case 'Verano':
			$idCarrera = $_POST['carrera']."-".$_POST['anio']."-2-".$_POST['letra'];
			break;
			case 'Agosto-Diciembre':
			$idCarrera = $_POST['carrera']."-".$_POST['anio']."-3-".$_POST['letra'];
			break;
		}    	
    	
    	
    		$sql = "CALL guardarNvoGrupo('".$idCarrera."', '".trim($_POST['nom-gru'])."',
    		 '".strtoupper(trim($_POST['salon']))."', '".$_POST['hora']."', '".$_POST['carrera']."',
    		 '".$_POST['periodo']."', '".$_POST['tutor']."');";
			if ($this->conn->query($sql) === TRUE) {
			    echo 1;
			} else {
			    echo 'Ya existe el <b style="color: #000;">grupo</b>, verifica la información.';
			}
    	$this->conn->close();
    	}
    	
    	   // ----------- Altas carrera
    public function altasCarrera() {
    	$this->conectar();
 	    	 	
    		$sql = "CALL guardarNvaCarrera('".strtoupper($_POST['idCarrera'])."', '".$_POST['carrera']."');";
			if ($this->conn->query($sql) === TRUE) {
			    echo 1;
			} else {
			    echo 'Ya existe esa carrera, verifica la información.';
			}
    	$this->conn->close();
    	}
    	
    	// ------ Altas profesor
		public function altasProfesor() {
    	$this->conectar();
    	$rfc = strtoupper($_POST['rfc']);
    	if($this->verificarProfe($rfc)) {
    		echo 'Ya existe ese registro, <b style="color: #000;">consulta</b> RFC antes.';
    	}
    	else{
			$this->conn->next_result();
    		$carre = array();
 	   	$carreras = new GenerarCombos('../../php/datosServer.php');
 	   	$carre = $carreras->obtenerCarreras($this->conn);
 	   	
    	if($this->verificarRol($carre, $rfc, 'Tutor','-tut-car')) {
    		echo 'Ya es <b style="color: #000;">Tutor(a)</b> en alguna de las carreras seleccionas. <br> Consulta o da de baja profesor antes.';
    	}else{
    		if($this->verificarRol($carre, $rfc, 'Coordinador','-cor-car')){
    		echo 'Ya existe un <b style="color: #000;">Coordinador</b> en alguna de las carreras seleccionas. <br> Consulta o da de baja coordinador antes.';
    		}else {
    	//Esta linea oculta el warning de cifrado, no es relevante.
    	error_reporting(E_ERROR | E_WARNING | E_PARSE);
 	   $pass = crypt($_POST['pass']);
	   
			$this->conn->next_result();
    		$sql = "CALL guardarNvoProfe('".$rfc."', '".strtoupper($_POST['nombre'])."', '".strtoupper($_POST['apep'])."', '".strtoupper($_POST['apem'])."',
    		'".$pass."', ".$_POST['activo'].", '".$_POST['carrera']."', '".$_POST['ema']."');";
			if ($this->conn->query($sql) === TRUE) {
			    $this->altasTutCor($carre, $rfc, 'Tutor','-tut-car');
			    $this->altasTutCor($carre, $rfc, 'Coordinador','-cor-car');
			    		echo 1;
			} else {
			    echo 'Ya existe ese registro, <b style="color: #000;">consulta</b> RFC antes.';
			}
			}
		}
		}
    	$this->conn->close();
    	}
    
    public function altasTutCor($carre, $rfc, $asig, $tipo){
    			$this->conn->next_result();
    			$sql = "";
    			foreach($carre as $c) {
    				if(isset($_POST[$c.$tipo])) {
         		$sql .= "CALL guardarRol('$rfc', '".$asig."', '".$c."');";
         		} 
         	}
         	
			   if ($this->conn->multi_query($sql) === TRUE) {
				    return true;
				}else {
					return false; 
					}
			}
			
			public function verificarRol($carre, $rfc, $asig, $tipo){
    			$this->conn->next_result();
    			$sql = "";
    			foreach($carre as $c) {
    				if(isset($_POST[$c.$tipo])) {
         		$sql .= "CALL verificarRol('$rfc', '".$asig."', '".$c."');";
         		} 
         	}
         	
					if ($this->conn->multi_query($sql)) {
					    do {
					        if ($result = $this->conn->store_result()) {
					            while ($row = $result->fetch_row()) {
					                return true;
					            }
					            $result->free();
					        }
					    } while ($this->conn->next_result());
					}
					return false;
			}
			
			public function verificarProfe($rfc) {
					$result = $this->conn->query('CALL verificarProfe("'.$rfc.'");');
            	$result->num_rows > 0 ? true : false;
				}
			
}
/* ---------------------------------------
------- Aquí se crea switcheo para tipo de combo mediante cookie.
------- El nombre de la cookie: subop
------------------------------------------ */ 
 if(isset($_COOKIE["subop"]))
{
	// Se crea objeto de la clase GenerarCombo
    $datos = new AdminAltas('../../php/datosServer.php');
    switch($_COOKIE["subop"])
    {
    	  case 'care':
            $datos->altasCarrera();
        break;
        case 'grup':
            $datos->altasGrupo();
        break;
		  case 'prof':
            $datos->altasProfesor();
        break;
    }
}
?>