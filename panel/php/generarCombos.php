<?php

class GenerarCombos
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

	// --- Genera combo de Coordinadores y Registro (carreras)
    public function obtenerCarreras($conn) {
        //$this->conectar();
        $carreras = array();
        $sql = "CALL generarComboCarreras('var')";
        $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
						array_push($carreras, $row['idCarrera']);
                }
            }
            return $carreras;
            //$this->conn->close();
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
    	
    	
    public function generarComboAnios($anio) {
        $combo = "";
		  $anioIni = date('Y');
		  if($anioIni <= $anio && $anio >= ($anioIni - 10)) {
		  	$anioFin = $anioIni - 10;
		  		for(; $anioIni >= $anioFin; $anioIni--) {
		  			if($anioIni != $anio) $combo .= '<option value="'.$anioIni.'">'.$anioIni.'</option>';
					 else $combo .= '<option value="'.$anioIni.'" selected>'.$anioIni.'</option>';
		  			}
		  }
		  else {
		  		$anioFin = $anio - 10;
		  		for(; $anioIni >= ($anioFin - 10); $anioIni--) {
		  			if($anioIni != $anio) $combo .= '<option value="'.$anioIni.'">'.$anioIni.'</option>';
					 else $combo .= '<option value="'.$anioIni.'" selected>'.$anioIni.'</option>';
		  			}
		  	}
         echo $combo;
    	}
    // ---------------------------------------------------
    	 public function generarComboGrupId($letra) {
    	  $id = array("A", "B", "C");
        $combo = "";
		  		for($i = 0; $i < 3; $i++) {
		  			if(strcmp($id[$i], $letra) !== 0) $combo .= '<option value="'.$id[$i].'">'.$id[$i].'</option>';
					 else $combo .= '<option value="'.$id[$i].'" selected>'.$id[$i].'</option>';
		  			}
         echo $combo;
    	}
        // ---------------------------------------------------
    	 public function generarComboPeriodo($perio) {
    	  $id = array("Enero-Julio", "Verano", "Agosto-Diciembre");
        $combo = "";
		  		for($i = 0; $i < 3; $i++) {
		  			if(strcmp($id[$i], $perio) !== 0) $combo .= '<option value="'.$id[$i].'">'.$id[$i].'</option>';
					 else $combo .= '<option value="'.$id[$i].'" selected>'.$id[$i].'</option>';
		  			}
         echo $combo;
    	}
        	 // --- Genera combo de Tutores
    public function generarComboRolesEdit($profe, $carrera) {
        $this->conectar();
        $combo = '<option value="">-- Selecciona --</option>';
        $sql = "CALL generarComboRoles('Tutor', '".$carrera."')";
        $result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                	$nombre = $row['nombre']." ".$row['apellidoP']." ".$row['apellidoM'];
                	if(strcmp($row['rfc'], $profe) !== 0) 
						$combo .= '<option value="'.$row['rfc'].'">'.$nombre.'</option>';
						else $combo .= '<option value="'.$row['rfc'].'" selected>'.$nombre.'</option>';
                }
            }
            echo $combo;
            $this->conn->close();
    	}		
    // ---------------------------------------------
    public function generarComboCarrerasEdit($carrera) {
        $this->conectar();
        $combo = "";
        $sql = "CALL generarComboCarreras('var')";
        $result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                if(strcmp($carrera, $row['idCarrera']) !== 0)
						$combo .= '<option value="'.$row['idCarrera'].'">'.$row['carrera'].'</option>';
					 else $combo .= '<option value="'.$row['idCarrera'].'" selected>'.$row['carrera'].'</option>';
                }
            }
            echo $combo;
            $this->conn->close();
    	}
    	 // --- Genera combo de Tutores
    public function generarComboRoles() {
        $this->conectar();
        $combo = '<option value="">-- Selecciona --</option>';
        $sql = "CALL generarComboRoles('".$_POST['rol']."', '".$_POST['carrera']."')";
        $result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                	$nombre = $row['nombre']." ".$row['apellidoP']." ".$row['apellidoM'];
						$combo .= '<option value="'.$row['rfc'].'">'.$nombre.'</option>';
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
						$combo .= '<option value="'.$row['idGrupo'].'">'.$row['nombreGrupo'].' &#8651; '.$row['idGrupo'].'</option>';
                }
            }
            echo $combo;
            $this->conn->close();
    	}
    	
    	      // --- Genera combo de grupos 
    public function generarComboGruposAlum($grupo, $carrera) {
        $this->conectar();
        $combo = '<option value="">-- Selecciona --</option>';
        $sql = "CALL generarComboGrupos('".$carrera."')";
        $result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
						if(strcmp($grupo, $row['idGrupo']) !== 0)
						$combo .= '<option value="'.$row['idGrupo'].'">'.$row['nombreGrupo'].' &#8651; '.$row['idGrupo'].'</option>';
					 else $combo .= '<option value="'.$row['idGrupo'].'" selected>'.$row['nombreGrupo'].' &#8651; '.$row['idGrupo'].'</option>';
                }
                }
            echo $combo;
            $this->conn->close();
    	}
    	
    	     // --- Sobrecarga de funcion: Genera combo de grupos tutores
    public function generarComboGruposTutor($rfc) {
        $this->conectar();
        $combo = '<option value="">-- Selecciona --</option>';
        $sql = "CALL generarComboGruposTutor('".$rfc."')";
        $result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
						$combo .= '<option value="'.$row['idGrupo'].'">'.$row['nombreGrupo'].' &#8651; '.$row['idPeriodo'].'</option>';
                }
            }
            echo $combo;
            $this->conn->close();
    	}
    	
    	    	    // --- Genera checkboxes de tutores y coordinadores
    public function generarCheckBoxCarreras($tipo) {
        $this->conectar();
        $combo = "";
        $sql = "CALL generarComboCarreras('var')";
        $result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
						$combo .= '<label><input type="checkbox" id="'.$tipo.'" name="'.$row['idCarrera'].'-'.$tipo.'" value="'.$row['idCarrera'].'">'.$row['carrera'].'</label>';
                }
            }
            echo $combo;
            $this->conn->close();
    	}
    	
    	public function generarCheckBoxCarrerasTutCor($tipo, $str) {
        $this->conectar();
        $combo = "";
        $sql = "CALL generarComboCarreras('var')";
        $result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
						if (strpos($str, $row['idCarrera']) !== FALSE) $combo .= '<label><input type="checkbox" id="'.$tipo.'" name="'.$row['idCarrera'].'-'.$tipo.'" value="'.$row['idCarrera'].'" checked>'.$row['carrera'].'</label>';
						else $combo .= '<label><input type="checkbox" id="'.$tipo.'" name="'.$row['idCarrera'].'-'.$tipo.'" value="'.$row['idCarrera'].'">'.$row['carrera'].'</label>';                
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
 if(isset($_COOKIE["accion"]))
{
	// Se crea objeto de la clase GenerarCombo
    $usuario = new GenerarCombos('../../php/datosServer.php');
    switch($_COOKIE["accion"])
    {
        case 'obtener-prof':
            $usuario->generarComboRoles();
        break;
        case 'obtener-grup':
            $usuario->generarComboGruposTutor($_POST['carrera']);
        break;
        case 'obtener-grupos':
            $usuario->generarComboGrupos($_POST['carrera']);
        break;

    }
}
?>