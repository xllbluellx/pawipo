<?php
session_start();
ob_start();
include('conexion.php');

class Consultar{
	private $conn;
	
	public function Encuestas() {
		$this->conn = new Conexion('../../php/datosServer.php');
		$this->conn = $this->conn->conectar();
		
		$listado = '<table class="tableLines-tutor anexosBox animated fadeIn"><tr class="titleTable"><td>No. Control</td><td>Nombre</td><td>E. 1</td><td>E. 2</td><td>E. 3</td><td>E. 4</td><td>E. 5</td><td>E. 6</td><td>E. 7</td><td>E. 8</td><td>E. 9</td></tr>';

		$sql = "CALL obtenerAlum('".$_POST['grupo']."');";

		
		$result = $this->conn->query($sql);
		if ($result->num_rows > 0) {
			    while($row = $result->fetch_assoc()) {
			    	  $listado .= '<tr>';
			        $listado .= $this->listarAlumnos($row['idAlumno'], $row['nom']);
			        $listado .= '</tr>';
			    }
			} else {
			    echo -1;
			}		
		
		$listado .= '</table>';
		echo $listado;
		$this->conn->close();
		}
		
		public function listarAlumnos($alu, $nom) {
		$this->conn->next_result();
		$list = '';
		$sql = "CALL obtenerAnexos(".$alu.");";
		$result = $this->conn->query($sql);
		if ($result->num_rows > 0) {
			$list .= '<td style="color: #400101;">'.$alu.'</td><td>'.$nom.'</td>';
			    while($row = $result->fetch_assoc()) {
			    	  if(empty($row['idAnexo'])) $list .= '<td style="font-size: 12px;"></span></td>';
			    	  else $list .= '<td id="'.$row['idAnexo'].'-'.$alu.'"><span class="success" style="cursor: pointer;"><i class="fa fa-check-square-o fa-lg"></i></span></td>';
			        
			    }
			} 
		
		return $list; 
		}
		
		public function Expediente() {
		$this->conn = new Conexion('../../php/datosServer.php');
		$this->conn = $this->conn->conectar();
		
		$listado = '<table class="flat tableLines fodaDesc anexosBox animated fadeIn" style="font-size: 12px;">
						<tr>
							<td><b style="color: #400101;">E. 1:</b> Formato de Entrevista</td>	
							<td><b style="color: #400101;">E. 2:</b> Línea de Vida</td>
							<td><b style="color: #400101;">E. 3:</b> Análisis FODA</td>
							<td><b style="color: #400101;">E. 4:</b> Habilidades de Estudio</td>
							<td><b style="color: #400101;">E. 5:</b> Estilos de Aprendizaje</td>
							<td><b style="color: #400101;">E. 6:</b> Test de Autoestima</td>
							<td><b style="color: #400101;">E. 7:</b> Test de Asertividad</td>
							<td><b style="color: #400101;">E. 8:</b> Desempeño del Tutor</td>
							<td><b style="color: #400101;">E. 9:</b> Anexo 19</td>					
						</tr>		        
		        </table>
		<table class="tableLines-tutor anexosBox animated fadeIn"><tr class="titleTable"><td>No. Control</td><td>Nombre</td><td>E. 1</td><td>E. 2</td><td>E. 3</td><td>E. 4</td><td>E. 5</td><td>E. 6</td><td>E. 7</td><td>E. 8</td><td>E. 9</td></tr>';
		$sql = "CALL obtenerObse(".$_POST['grupo'].",'".$_SESSION['tutor']."');";
		$obs = '';
		
		$result = $this->conn->query($sql);
		if ($result->num_rows > 0) {
			    while($row = $result->fetch_assoc()) {
			    	  $listado .= '<tr>';
			        $listado .= $this->listarAlumnos($row['idAlumno'], $row['nom']);
			        $listado .= '</tr>';
			        
			        	$obs = '<hr /><div class="form-item">
						        <label><b>Observaciones</b></label>
						        <textarea id="obser" name="obser" rows="4" cols="50">'.$row['ob_cues'].'</textarea>
						    </div><div class="row right"><div class="col col-3">
						    <button type="submit" class="button aceptar width-100" id="guarda-obs"><i class="fa fa-floppy-o fa-lg"></i> Guardar</button>
						    </div></div>';

			    }
			} else {
			    echo -1;
			}		
		
		$listado .= '</table>';
		echo $listado.$obs;
		$this->conn->close();
		}
		
		public function GuardaExpediente() {
		$this->conn = new Conexion('../../php/datosServer.php');
		$this->conn = $this->conn->conectar();
		
		$sql = "UPDATE infoalumnos SET infoalumnos.ob_cues = '".$_POST['obs']."' WHERE infoalumnos.idAlumno = ".$_POST['id'];

		if ($this->conn->query($sql) === TRUE) {
		    echo "Guardado";
		} else {
		    echo -1;  
		}		
		
		$this->conn->close();
		}
		
		public function GuardaKardex() {
		$this->conn = new Conexion('../../php/datosServer.php');
		$this->conn = $this->conn->conectar();
		
		$sql = "UPDATE infoalumnos SET infoalumnos.observaciones = '".$_POST['obs']."' WHERE infoalumnos.idAlumno = ".$_POST['id'];

		if ($this->conn->query($sql) === TRUE) {
		    echo "Guardado";
		} else {
		    echo -1;  
		}		
		
		$this->conn->close();
		}
		
		public function Kardex(){
			$enco = false;
			$datos = '<!-- - - - - - - - - - - - - Cabecera de la encuesta - - - - - - - - - - - -->
						<div class="animated fadeIn"><div class="row" style="font-size: 12px; text-align: center;">
							<div class="col-4"><span class="label primary">Ordinario</span> <span class="label warning">Repetición</span><span class="label error">ESPECIAL</span></div>
							<div class="col-1">U. 1</div>
							<div class="col-1">U. 2</div>
							<div class="col-1">U. 3</div>
							<div class="col-1">U. 4</div>	
							<div class="col-1">U. 5</div>	
							<div class="col-1">U. 6</div>	
							<div class="col-1">U. 7</div>	
							<div class="col-1">U. 8</div>							    
					    </div>';
			$this->conn = new Conexion('../../php/datosServer.php');
			$this->conn = $this->conn->conectar(); 
			$sql = "CALL kadexAlum(".$_POST['grupo'].",'".$_SESSION['tutor']."');";
				$result = $this->conn->query($sql);
				$info = array();
				$obs = '';

				if ($result->num_rows > 0) {
					    while($row = $result->fetch_assoc()) {
					    	
					    	 $obs = '<hr /><div class="form-item">
						    <label><b>Observaciones</b></label>
						    <textarea id="obser" name="obser" rows="4" cols="50">'.$row['observaciones'].'</textarea>
						    </div><div class="row right"><div class="col col-3">
						    <button type="submit" class="button aceptar width-100" id="guarda-obs"><i class="fa fa-floppy-o fa-lg"></i> Guardar</button>
						    </div></div>';
					       $info[] = array($row['idMateria'], $row['par1'], $row['par2'], $row['par3'], $row['par4'], $row['par5'], $row['par6'], $row['par7'], $row['par8'], $row['tipo']);
					       $enco = true;
					    }
					}
					
					if ($enco){
					     // Materia 1
					    	
						    	switch($info[0][9]) {
						    		case 'Ordinario':
						    		$datos .= '<div class="row"><div class="col-4"><div class="form-item">
							        <input type="text"  readonly="readonly" name="par1" class="label primary" value="'.$info[0][0].'">
							    	</div></div>';
						    		break;
						    		case 'Repetición':
						    		$datos .= '<div class="row"><div class="col-4"><div class="form-item">
							        <input type="text"  readonly="readonly" name="par1" class="label warning" value="'.$info[0][0].'">
							    	</div></div>';
						    		break;
									case 'Especial':
						    		$datos .= '<div class="row"><div class="col-4"><div class="form-item">
							        <input type="text"  readonly="readonly" name="par1" class="label error" value="'.strtoupper($info[0][0]).'">
							    	</div></div>';
						    		break;
						    	}
						    	for($i = 1; $i <= 8; $i++) {
						    		if(intval($info[0][$i]) < 0) $datos .= '<div class="col-1"><input pattern="[0-9]{1,3}" readonly="readonly" type="number" name="par1-'.$i.'"></div>';
						    		else {
						    			if(intval($info[0][$i]) > -1 && intval($info[0][$i]) < 70) $datos .= '<div class="col-1"><input type="number" name="par1-'.$i.'" class="error" readonly="readonly" value="'.$info[0][$i].'"></div>';
						    			else $datos .= '<div class="col-1"><input type="number" name="par1-'.$i.'" readonly="readonly" value="'.$info[0][$i].'"></div>';
						    		}
						    	}					    
					      $datos .= '</div>';
					      
					       // Materia 2
					       switch($info[1][9]) {
						    		case 'Ordinario':
						    		$datos .= '<div class="row"><div class="col-4"><div class="form-item">
							        <input type="text"  readonly="readonly" name="par1" class="label primary" value="'.$info[1][0].'">
							    	</div></div>';
						    		break;
						    		case 'Repetición':
						    		$datos .= '<div class="row"><div class="col-4"><div class="form-item">
							        <input type="text"  readonly="readonly" name="par1" class="label warning" value="'.$info[1][0].'">
							    	</div></div>';
						    		break;
									case 'Especial':
						    		$datos .= '<div class="row"><div class="col-4"><div class="form-item">
							        <input type="text"  readonly="readonly" name="par1" class="label error" value="'.strtoupper($info[1][0]).'">
							    	</div></div>';
						    		break;
						    	}
						    	for($i = 1; $i <= 8; $i++) {
						    		if(intval($info[1][$i]) < 0) $datos .= '<div class="col-1"><input pattern="[0-9]{1,3}" readonly="readonly" type="number" name="par1-'.$i.'"></div>';
						    		else {
						    			if(intval($info[1][$i]) > -1 && intval($info[1][$i]) < 70) $datos .= '<div class="col-1"><input type="number" name="par1-'.$i.'" class="error" readonly="readonly" value="'.$info[1][$i].'"></div>';
						    			else $datos .= '<div class="col-1"><input type="number" name="par1-'.$i.'" readonly="readonly" value="'.$info[1][$i].'"></div>';
						    		}
						    	}					    
					      $datos .= '</div>';
					      
					      // Materia 3
					    	switch($info[2][9]) {
						    		case 'Ordinario':
						    		$datos .= '<div class="row"><div class="col-4"><div class="form-item">
							        <input type="text"  readonly="readonly" name="par1" class="label primary" value="'.$info[2][0].'">
							    	</div></div>';
						    		break;
						    		case 'Repetición':
						    		$datos .= '<div class="row"><div class="col-4"><div class="form-item">
							        <input type="text"  readonly="readonly" name="par1" class="label warning" value="'.$info[2][0].'">
							    	</div></div>';
						    		break;
									case 'Especial':
						    		$datos .= '<div class="row"><div class="col-4"><div class="form-item">
							        <input type="text"  readonly="readonly" name="par1" class="label error" value="'.strtoupper($info[2][0]).'">
							    	</div></div>';
						    		break;
						    	}
						    	for($i = 1; $i <= 8; $i++) {
						    		if(intval($info[2][$i]) < 0) $datos .= '<div class="col-1"><input pattern="[0-9]{1,3}" readonly="readonly" type="number" name="par1-'.$i.'"></div>';
						    		else {
						    			if(intval($info[2][$i]) > -1 && intval($info[2][$i]) < 70) $datos .= '<div class="col-1"><input type="number" name="par1-'.$i.'" class="error" readonly="readonly" value="'.$info[2][$i].'"></div>';
						    			else $datos .= '<div class="col-1"><input type="number" name="par1-'.$i.'" readonly="readonly" value="'.$info[2][$i].'"></div>';
						    		}
						    	}					    
					      $datos .= '</div>';
					      
					      // Materia 4
					    	switch($info[3][9]) {
						    		case 'Ordinario':
						    		$datos .= '<div class="row"><div class="col-4"><div class="form-item">
							        <input type="text"  readonly="readonly" name="par1" class="label primary" value="'.$info[3][0].'">
							    	</div></div>';
						    		break;
						    		case 'Repetición':
						    		$datos .= '<div class="row"><div class="col-4"><div class="form-item">
							        <input type="text"  readonly="readonly" name="par1" class="label warning" value="'.$info[3][0].'">
							    	</div></div>';
						    		break;
									case 'Especial':
						    		$datos .= '<div class="row"><div class="col-4"><div class="form-item">
							        <input type="text"  readonly="readonly" name="par1" class="label error" value="'.strtoupper($info[3][0]).'">
							    	</div></div>';
						    		break;
						    	}
						    	for($i = 1; $i <= 8; $i++) {
						    		if(intval($info[3][$i]) < 0) $datos .= '<div class="col-1"><input pattern="[0-9]{1,3}" readonly="readonly" type="number" name="par1-'.$i.'"></div>';
						    		else {
						    			if(intval($info[3][$i]) > -1 && intval($info[3][$i]) < 70) $datos .= '<div class="col-1"><input type="number" name="par1-'.$i.'" class="error" readonly="readonly" value="'.$info[3][$i].'"></div>';
						    			else $datos .= '<div class="col-1"><input type="number" name="par1-'.$i.'" readonly="readonly" value="'.$info[3][$i].'"></div>';
						    		}
						    	}					    
					      $datos .= '</div>';
					      
					       // Materia 5
					       switch($info[4][9]) {
						    		case 'Ordinario':
						    		$datos .= '<div class="row"><div class="col-4"><div class="form-item">
							        <input type="text"  readonly="readonly" name="par1" class="label primary" value="'.$info[4][0].'">
							    	</div></div>';
						    		break;
						    		case 'Repetición':
						    		$datos .= '<div class="row"><div class="col-4"><div class="form-item">
							        <input type="text"  readonly="readonly" name="par1" class="label warning" value="'.$info[4][0].'">
							    	</div></div>';
						    		break;
									case 'Especial':
						    		$datos .= '<div class="row"><div class="col-4"><div class="form-item">
							        <input type="text"  readonly="readonly" name="par1" class="label error" value="'.strtoupper($info[4][0]).'">
							    	</div></div>';
						    		break;
						    	}
						    	for($i = 1; $i <= 8; $i++) {
						    		if(intval($info[4][$i]) < 0) $datos .= '<div class="col-1"><input pattern="[0-9]{1,3}" readonly="readonly" type="number" name="par1-'.$i.'"></div>';
						    		else {
						    			if(intval($info[4][$i]) > -1 && intval($info[4][$i]) < 70) $datos .= '<div class="col-1"><input type="number" name="par1-'.$i.'" class="error" readonly="readonly" value="'.$info[4][$i].'"></div>';
						    			else $datos .= '<div class="col-1"><input type="number" name="par1-'.$i.'" readonly="readonly" value="'.$info[4][$i].'"></div>';
						    		}
						    	}					    
					      $datos .= '</div>';
					      
					       // Materia 6
					    	switch($info[5][9]) {
						    		case 'Ordinario':
						    		$datos .= '<div class="row"><div class="col-4"><div class="form-item">
							        <input type="text"  readonly="readonly" name="par1" class="label primary" value="'.$info[5][0].'">
							    	</div></div>';
						    		break;
						    		case 'Repetición':
						    		$datos .= '<div class="row"><div class="col-4"><div class="form-item">
							        <input type="text"  readonly="readonly" name="par1" class="label warning" value="'.$info[5][0].'">
							    	</div></div>';
						    		break;
									case 'Especial':
						    		$datos .= '<div class="row"><div class="col-4"><div class="form-item">
							        <input type="text"  readonly="readonly" name="par1" class="label error" value="'.strtoupper($info[5][0]).'">
							    	</div></div>';
						    		break;
						    	}
						    	for($i = 1; $i <= 8; $i++) {
						    		if(intval($info[5][$i]) < 0) $datos .= '<div class="col-1"><input pattern="[0-9]{1,3}" readonly="readonly" type="number" name="par1-'.$i.'"></div>';
						    		else {
						    			if(intval($info[5][$i]) > -1 && intval($info[5][$i]) < 70) $datos .= '<div class="col-1"><input type="number" name="par1-'.$i.'" class="error" readonly="readonly" value="'.$info[5][$i].'"></div>';
						    			else $datos .= '<div class="col-1"><input type="number" name="par1-'.$i.'" readonly="readonly" value="'.$info[5][$i].'"></div>';
						    		}
						    	}					    
					      $datos .= '</div>'.$obs.'</div>';
							echo $datos;
			}
			else echo -2;
		$this->conn->close();
		}
}


if(isset($_COOKIE["subop"]) && isset($_COOKIE["op"]))
{
	// Se crea objeto de la clase
    $datos = new Consultar();
    switch($_COOKIE["subop"])
    {
    	  case 'kard':
    	  		 $datos->Kardex();
    	  break;
        case 'encu':
            $datos->Encuestas();
        break;
        case 'expe':
            $datos->Expediente();
        break;
		  case 'g-expe':
            $datos->GuardaExpediente();
        break;
        case 'g-kard':
            $datos->GuardaKardex();
        break;
    }
}
?>