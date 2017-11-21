<?php
include('conexion.php');
include ('generarCombos.php'); 

class editConsultar
{
	private $conn;
	
	public function editProfe() {
		$this->conn = new Conexion('../../php/datosServer.php');
		$this->conn = $this->conn->conectar();
		
		$rfc = strtoupper($_POST['rfc']);
    	if($this->verificarProfe($rfc) && strcmp($_POST['rfc'], $_POST['rfc-resp']) !== 0) {
    		echo 'Ya existe ese registro, <b style="color: #000;">consulta</b> RFC antes.';
    	}else{
    	$this->conn->next_result();		
 	   $sql = "CALL eliminarRolProfe('".$_POST['rfc-resp']."');";
	   if ($this->conn->query($sql) === TRUE){
			$this->altasProfesor();
		}else {
			echo 'Ha ocurrido un error, intenta nuevamente..';
			}
		}
	}
	
	public function editAlum() {
		$this->conn = new Conexion('../../php/datosServer.php');
		$this->conn = $this->conn->conectar();
		$sql = "CALL actualizarAlum(".$_COOKIE['info'].", '".$_POST['nombre']."', '".$_POST['apep']."', '".$_POST['apem']."', '".$_POST['email']."',".$_POST['activo']." , '".$_POST['carrera']."', '".$_POST['grupo']."');";
	   if ($this->conn->multi_query($sql) === TRUE){
			echo 2;
		}else {
			echo "Error: " . $sql . "<br>" . $this->conn->error;
			}
		$this->conn->close();
	}

		
	// ------ Altas profesor
		public function altasProfesor() {
    	$this->conn->next_result();
    	$rfc = strtoupper($_POST['rfc']);
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
    	//error_reporting(E_ERROR | E_WARNING | E_PARSE);

	   	$pass = $_POST['pass'];
			$this->conn->next_result();
    		$sql = "CALL guardarNvoProfe('".$rfc."', '".$_POST['nombre']."', '".$_POST['apep']."', '".$_POST['apem']."',
    		'".$pass."', ".$_POST['activo'].", '".$_POST['carrera']."', '".$_POST['ema']."');";
			if ($this->conn->query($sql) === TRUE) {
				$this->conn->next_result();
				if ($this->conn->query("CALL actualizarProfGrupo('".$_POST['rfc-resp']."', '".$rfc."', ".$_POST['activo'].");") === TRUE);
			    $this->altasTutCor($carre, $rfc, 'Tutor','-tut-car');
			    $this->altasTutCor($carre, $rfc, 'Coordinador','-cor-car');
			    		echo 2;
			} else {
			    echo 'Ya existe ese registro, <b style="color: #000;">consulta</b> RFC antes.';
			}
			}
		}
		
    	$this->conn->close();
    	}
    
    public function altasTutCor($carre, $rfc, $asig, $tipo){
    			$esTutor = false;
    			
    			$sql = "";
    			foreach($carre as $c) {
    				if(isset($_POST[$c.$tipo])) {
    			   $esTutor = true;
         		$sql .= "CALL guardarRol('".$rfc."', '".$asig."', '".$c."');";
         		} 
         	}
         	
         	$this->conn->next_result();
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
         		$sql .= "CALL verificarRol('".$rfc."', '".$asig."', '".$c."');";
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
            	return ($result->num_rows > 0 ? true : false);
				}
}
// ----------------------------------------------------------------------------------
class AdminConsultar extends editConsultar
{
    //Atributos globales. 
    private $conn;
    
    // ----------- Consultar alumno y profesor, además consulta tambien para bajas.
    public function consultarProfe() {
    	$this->conn = new Conexion('../../php/datosServer.php');
		$this->conn = $this->conn->conectar();
 	     error_reporting(E_ALL ^ E_NOTICE);
 	      	
 	     $encontrado = false;	 	
    	  $info = '<div class="animated fadeInDown"><table class="flat tableLines">
    	  				<span class="label warning"><i class="fa fa-search fa-lg"></i> Resultado de la Búsqueda...</span><br>';

		  		// Aquí se hace una sentencia mas precisa en caso de eliminar.
		   	$sql = 'CALL buscarProf("%'.$_POST['dato'].'%");';
		   	$info .= '<tr class="titleTable">
		   	<th>RFC</th>
		   	<th>Profesor(a)</th>
		   	<th>Email</th>
		   	<th>Asignación</th>
				<th>Activo</th>
				<th>Editar</th>
		   	</tr><tbody id="resultadoBus">';
    
        $result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
						$info .= '<tr><td style="color: #400101;">'.$row['rfc'].'</td>'.
									'<td>'.$row['nombre'].' '.$row['apellidoP'].' '.$row['apellidoM'].'</td>'.
									'<td>'.$row['email'].'</td>'.
									'<td><b>'.$row['rol'].'</b> de <br>'.$row['carrera'].'</td>';
						if(intval($row['activo']) == 1) {
							$info .= '<td><span class="label success">SI</span></td>';
							}
						else {
							$info .= '<td><span class="label error">NO</span></td>';
							}
						 $info .= '<td id="'.$row['rfc'].'"><span id="edit-prof" style="cursor: pointer;" class="label badge warning"><i class="fa fa-pencil fa-lg"></i></span></td></tr>';
                }
                
                $encontrado = true;
            }
	
            $info .= '</tbody></table></div>';
            if($encontrado == true) {
            	echo $info;
            }else echo -1;
            $this->conn->close();
    	}
    	
    	    public function consultarAlum() {
    	$this->conn = new Conexion('../../php/datosServer.php');
		$this->conn = $this->conn->conectar();
 	     error_reporting(E_ALL ^ E_NOTICE);
 	      	
 	     $encontrado = false;	 	
    	  $info = '<div class="animated fadeInDown"><table class="flat tableLines">
    	  				<span class="label warning"><i class="fa fa-search fa-lg"></i> Resultado de la Búsqueda...</span><br>';
        $sql = "";


		  		// Aquí se hace una sentencia mas precisa en caso de eliminar.
		   	//if($_POST['btnEliminar'] == 1) $sql = 'CALL buscarProfExac("'.strtoupper($_POST['dato']).'");';
		   	$sql = 'CALL buscarAlum('.$_POST['dato'].');';
		   	$info .= '<tr class="titleTable">
		   	<th>No. Control</th>
		   	<th>Nombre</th>
		   	<th>Carrera</th>
		   	<th>ID Grupo</th>
				<th>Correo</th>
				<th>Activo</th>
				<th>Editar</th>
		   	</tr><tbody id="resultadoBus">';
    
		  $rfc = "";
        $result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
						$info .= '<tr><td style="color: #400101;">'.$row['idAlumno'].'</td>'.
									'<td>'.$row['alum'].'</td>'.
									'<td>'.$row['carrera'].'</td>'.
									'<td>'.$row['idGrupo'].'</td>'.
									'<td>'.$row['email'].'</td>';
						if(intval($row['activo']) == 1) {
							$info .= '<td><span class="label success">SI</span></td>';
							}
						else {
							$info .= '<td><span class="label error">NO</span></td>';
							}
						 $info .= '<td id="'.$row['idAlumno'].'"><span id="edit-alum" style="cursor: pointer;" class="label badge warning"><i class="fa fa-pencil fa-lg"></i></span></td></tr>';
                }
                
                $encontrado = true;
            }
	
            $info .= '</tbody></table></div>';
            if($encontrado == true) {
            	echo $info;
            }else echo -1;
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
    $datos = new AdminConsultar();
    switch($_COOKIE["subop"])
    {
		case 'prof':
			$datos->consultarProfe();
		break;
		case 'alum':
			$datos->consultarAlum();
		break;
		case 'edit-prof':
			$datos->editProfe();
		break;
		case 'edit-alum':
			$datos->editAlum();
		break;
    }
}
?>