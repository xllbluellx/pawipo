<?php
include('conexion.php');

class generarPDF{
	private $conn;
	private $datos;
	
	public function anexo1(){
		$titles = array('Nombre', 'Carrera','Correo','Estatura','Peso',
		'Fecha de Nacimiento', 'Género', 'Estado Civil', 'Trabaja','Lada', 'Teléfono',
		'Lugar de Nacimiento', 'Domicilio actual', 'Código Postal', 'Tipo de vivienda',
		'La Casa/Departamento donde vives es','Número de personas con quien vives', 'Nombre del Padre',
		'Profesión','Parentezco', 'Edad', 'Trabaja','Domicilio','Teléfono','Nombre de la Madre',
		'Profesión','Parentezco', 'Edad', 'Trabaja','Domicilio','Teléfono', 'Nombre', 'Fecha de Nacimiento', 'Genero','Estudios',
		'Ingresos mensuales de tu familia', 'En caso de ser económicamente independiente a cuanto asciente tu ingreso',
		'Primaria', 'Secundaria','Bachillerato','Estudios Superiores', '¿Cuenta con prescripción médica de alguna deficiencia sensorial o funcionalidad que le obligue a llevar aparatos o controlar tu actividad física?',
		'Indica Cuales');
		$array;
		$this->conn = new Conexion('../../php/datosServer.php');
		$this->conn = $this->conn->conectar();	
		$sql = "SELECT respuestas.respuestas FROM respuestas WHERE respuestas.idAnexo = 1 AND respuestas.idAlumno = 16121011;";
		$result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_array(MYSQLI_NUM)) {  
                   $array = json_decode($row[0], true);
                   break;        	
                	}
            }
         $this->conn->close();
         
			$this->anexo1_DatosPersonales($titles, $array, 0, 16);
			$this->anexo1_DatosFamiliares($titles, $array, 17, 30);
			$this->anexo1_Hermanos($titles, $array, 31, 41, $result);
			
			echo $this->datos;       
	}
	// -------------------------------------------------------------
	public function anexo1_DatosPersonales($t, $ar, $i, $f) {
			$result = "<h3>Datos Personales</h3><table style='border: 1px solid white;' width='100%'>";
			$row = 0;
         for(;$i <= $f; $i++){
         	if($row == 0) $result .= "<tr>";
         	
         	$result .= "<td style='border: 1px solid black; padding: 0 2px;' width='(100/3)%'><b style='font-size: 12px;'>".$t[$i]."</b>";
				$result .= "<br>".$ar[$i]['value'].'</td>';	
				$row++;
				
				if($row == 3){
					$result .= "</tr>";
					$row = 0;
				}	
					
			}
			$result .= "</table>";
			$this->datos = $result;
			
		}
		// -------------------------------------------------------------
		public function anexo1_DatosFamiliares($t, $ar, $i, $f) {
			$result = "<h3>Datos Familiares</h3><table style='border: 1px solid white;' width='100%'>";
			$row = 0;
         for(;$i <= $f; $i++){
         	if($row == 0) $result .= "<tr>";
         	
         	$result .= "<td style='border: 1px solid black; padding: 0 2px;' width='(100/3)%'><b style='font-size: 12px;'>".$t[$i]."</b>";
				$result .= "<br>".$ar[$i]['value'].'</td>';	
				$row++;
				
				if($row == 3){
					$result .= "</tr>";
					$row = 0;
				}	
					
			}
			$result .= "</table>";
			$this->datos .= $result;
		}
		
		// -------------------------------------------------------------
		public function anexo1_Hermanos($t, $ar, $i, $f) {
			$result = "<h3>Hermanos/as</h3><table style='border: 1px solid white;' width='100%'>";
			$h = array('Nombre', 'Fecha de Nacimiento', 'Genero','Estudios');
			$row = 0;
			$donde = 0;
         for(;$i <= $f; $i++){
         	if(strcmp($ar[$i]['name'], 'ing-men') === 0 ){
         		$donde = $i;
         		break;
         	} 
         	if($row == 0) $result .= "<tr>";
         	
         	$result .= "<td style='border: 1px solid black; padding: 0 2px;' width='(100/3)%'><b style='font-size: 12px;'>".$h[$row]."</b>";
				$result .= "<br>".$ar[$i]['value'].'</td>';	
				$row++;
				
				if($row == 4){
					$result .= "</tr>";
					$row = 0;
				}	
			}
			$result .= "</table>";
			$this->anexo1_Ingresos($t, $ar, $donde, ($donde + 1), $result);
		}
		
		// -------------------------------------------------------------
		public function anexo1_Ingresos($t, $ar, $i, $f, $result) {
			$result .= "<h3>Ingresos</h3><table style='border: 1px solid white;' width='100%'>";
			$ini = 35; //Es donde se queda el vector.
			$row = 0;
			$donde = 0;
         for(;$i <= $f; $i++){
         	if($row == 0) $result .= "<tr>";
         	$donde = $i;
         	$result .= "<td style='border: 1px solid black; padding: 0 2px;' width='(100/3)%'><b style='font-size: 12px;'>".$t[$ini]."</b>";
				$result .= "<br>$ ".$ar[$i]['value'].'</td>';	
				$row++;
				$ini++;
				
				if($row == 2){
					$result .= "</tr>";
					$row = 0;
				}	
			}
			$result .= "</table>";
			//$this->datos .= $result;
			$this->anexo1_Estudios($t, $ar, ($donde+1), ($donde + 6), $result);
		}
		// -------------------------------------------------------------
		public function anexo1_Estudios($t, $ar, $i, $f, $result) {
			$result .= "<h3>Donde realizaste tus estudios</h3><table style='border: 1px solid white;' width='100%'>";
			$ini = 37; //Es donde se queda el vector.
			$row = 0;
         for(;$i <= $f; $i++){
         	if($row == 0) $result .= "<tr>";
         	
         	$result .= "<td style='border: 1px solid black; padding: 0 2px;' width='(100/3)%'><b style='font-size: 12px;'>".$t[$ini]."</b>";
				$result .= "<br>".$ar[$i]['value'].'</td>';	
				$row++;
				$ini++;
				
				if($row == 2){
					$result .= "</tr>";
					$row = 0;
				}	
			}
			$result .= "</table>";
			$this->datos .= $result;
		}
}

$obj = new generarPDF();
$obj->anexo1();
?>