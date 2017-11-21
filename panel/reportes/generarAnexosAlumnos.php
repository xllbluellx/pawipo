<?php
include('../php/conexion.php');
// ------------------- Anexo 1: Formato de Entrevista
class Anexo_1{
	private $conn;
	public $donde;
	public $datos2;
	public $d1, $d2, $d3, $d4;
	
	public function anexo1($alumno){
		$img = '';
		foreach(glob("../img/img_".$alumno.".*") as $file){
			$img = '<img id="preview" src="'.$file.'" style="height: 600%; width: 600%;" />';
			break;
			}
		$header = '<table><tr><td>'.$img.'</td><td><h2>Formato de Entrevista</h2></td><td></td></tr></table>';		
	
		
		$titles = array('Nombre', 'Carrera','Correo','Estatura','Peso',
		'Fecha de Nacimiento', 'Género', 'Estado Civil', 'Trabaja','Lada', 'Teléfono',
		'Lugar de Nacimiento', 'Domicilio actual', 'Código Postal', 'Tipo de vivienda',
		'La Casa/Departamento donde vives es','Número de personas con quien vives', 'Nombre del Padre',
		'Profesión','Parentezco', 'Edad', 'Trabaja','Domicilio','Teléfono','Nombre de la Madre',
		'Profesión','Parentezco', 'Edad', 'Trabaja','Domicilio','Teléfono', 'Nombre', 'Fecha de Nacimiento', 'Genero','Estudios',
		'Ingresos mensuales de tu familia', 'En caso de ser económicamente independiente a cuanto asciende tu ingreso',
		'Primaria', 'Secundaria','Bachillerato','Estudios Superiores', '¿Cuenta con prescripción médica de alguna deficiencia sensorial o funcionalidad que le obligue a llevar aparatos o controlar tu actividad física?',
		'Indica Cuales', 'Manos y/o pies hinchados', 'Dolores en el vientre', 'Dolores de cabeza y/o vómitos', 'Pérdida de equilibrio',
		 'Fatiga y agotamiento', 'Pérdida de vista u oído', 'Dificultades para dormi', 'Pesadillas o terrores nocturnos', '¿A qué?',
		 'Incontinencia (orina, heces)', 'Tartamudeos al explicarse', 'Miedos intensos ante cosas', 'Observaciones de higiene', 
		 '¿Cómo es la relación con tu familia?', '¿Existen dificultades, de qué tipo?', '¿Qué actitud tienes con tu familia?',
		 '¿Cómo te relacionas con tu padre?', '¿Qué actitud tienes hacia tu padre?', '¿Cómo te relacionas con tu madre?', 
		 '¿Qué actitud tienes hacia tu madre?');
		 
		$titles2 = array('¿Con quien te sientes más ligado afectivamente?', 'Especifica por que...', '¿Quién se ocupa más directamente de tu eduación?',
		'¿Quién ha influido más en tu decisión para estudiar esta carrera?','Consideras importante facilitar algún otro dato sobre tu ambiente familiar',
		'¿Cómo es tu relación con los compañeros?','¿Por qué?', '¿Cómo es tu relación con tus amigos?', '¿Cómo es tu relación con tus profesores?',
		'¿Cómo es tu relación con las autoridades académicas?','¿Qué haces en tu tiempo libre?','¿Cuál es tu actividad recreativa?',
		'Puntual','Observaciones','Tímido','Observaciones','Alegre','Observaciones','Agresivo/a','Observaciones','Abierto/a a las ideas de otros','Observaciones',
		'Reflexivo/a','Observaciones','Constante','Observaciones','Optimista','Observaciones','Impulsivo/a','Observaciones',
		'Silencioso/a','Observaciones','Generoso/a','Observaciones','Inquieto/a','Observaciones','Cambios de humor','Observaciones','Dominante','Observaciones',
		'Egoísta','Observaciones','Sumiso/a','Observaciones','Confiado/a en si mismo/a','Observaciones','Imaginativo/a','Observaciones','Con iniciativa propia','Observaciones',
		'Sociable','Observaciones','Responsable','Observaciones','Perseverante','Observaciones','Motivado/a','Observaciones','Activo/a','Observaciones','Independiente','Observaciones',
		'¿Cómo te gustaría ser?','¿Recibes ayuda en tu casa para la realización de tareas escolares?','¿Qué problemas personales intervienen en tus estudios?',
		'¿Cuál es tu rendimiento escolar?','Menciona las asignaturas que cursas en el semestre actual','¿Cuál es tu asignatura preferida? ¿Por qué?',
		'¿Cuál es la asignatura en la que sobresales? ¿Por qué?','¿Qué asignatura te desagrada? ¿Por qué?','¿Cuál es tu asignatura con más bajo promedio del semestre anterior? ¿Por qué?',
		'¿Por qué vienes al Tecnológico?','¿Qué te motiva para venir al Tecnológico?','¿Cuál es tu promedio general del ciclo escolar anterior?',
		'¿Tienes asignaturas reprobadas? ¿Cuáles?','¿Cuáles son tus planes inmediatos?','¿Cuáles son tus metas en la vida?','Nombre del entrevistador (Tutor)',
		'Yo soy...','Mi Carácter es...','A mí me gusta que...','Yo Aspiro en la Vida...','Yo tengo miedo que...','Pero pienso que podré lograr...');
		
		$array;
		$this->conn = new Conexion('../../php/datosServer.php');
		$this->conn = $this->conn->conectar();	
		$sql = "SELECT respuestas.respuestas FROM respuestas WHERE respuestas.idAnexo = 1 AND respuestas.subAnexo = 1 AND respuestas.idAlumno = ".$alumno;
		$result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_array(MYSQLI_NUM)) {  
                   $array = json_decode($row[0], true);
                   break;        	
                	}
            }
      $this->conn->next_result();
      $array2;
      $sql = "SELECT respuestas.respuestas FROM respuestas WHERE respuestas.idAnexo = 1 AND respuestas.subAnexo = 2 AND respuestas.idAlumno = ".$alumno;
		$result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_array(MYSQLI_NUM)) {  
                   $array2 = json_decode($row[0], true);
                   break;        	
                	}
            }
      
         $this->conn->close();
         
         // Inicia formato de primera parte
			$this->anexo1_DatosPersonales($titles, $array, 0, 16);
			$this->anexo1_DatosFamiliares($titles, $array, 17, 30);
			$this->anexo1_Hermanos($titles, $array, 31, 41);
			$this->anexo1_Ingresos($titles, $array, $this->donde, ($this->donde + 1), '');
			//Inicia formato segunda parte
			$this->anexo1_2_RelSociales($array2, $titles2);
			
			return $header.$this->d1.$this->d2.$this->d3.$this->d4.$this->datos2;       
	}
	// -------------------------------------------------------------
	public function anexo1_DatosPersonales($t, $ar, $i, $f) {
			$result = '<h3>Datos Personales</h3><br><table style="border: 1px solid #000;">';
			$row = 0;
         for(;$i <= $f; $i++){
         	if($row == 0) $result .= "<tr>";
         	
         	$result .= '<td style="border: 1px solid #000000;"><b style="font-size: 10px;">'.$t[$i]."</b>";
				$result .= "<br>".$ar[$i]['value'].'</td>';	
				$row++;
				
				if($row == 3){
					$result .= "</tr>";
					$row = 0;
				}	
					
			}
			$result .= "</tr></table>";
			$this->d1 = $result;
			
		}
		// -------------------------------------------------------------
		public function anexo1_DatosFamiliares($t, $ar, $i, $f) {
			$result = "<h3>Datos Familiares</h3><table>";
			$row = 0;
         for(;$i <= $f; $i++){
         	if($row == 0) $result .= "<tr>";
         	
         	$result .= '<td style="border: 1px solid black;"><b style="font-size: 10px;">'.$t[$i]."</b>";
				$result .= "<br>".$ar[$i]['value'].'</td>';	
				$row++;
				
				if($row == 3){
					$result .= "</tr>";
					$row = 0;
				}	
					
			}
			$result .= "</tr></table>";
			$this->d2 = $result;
		}
		
		// -------------------------------------------------------------
		public function anexo1_Hermanos($t, $ar, $i, $f) {
			$result = "<h3>Hermanos/as</h3><table>";
			$h = array('Nombre', 'Fecha de Nacimiento', 'Genero','Estudios');
			$row = 0;
			$donde = 0;
			
			while(strcmp($ar[$i]['name'], 'ing-men') !== 0) {
				if($row == 0) $result .= "<tr>";
         	
         	$result .= '<td style="border: 1px solid black;"><b style="font-size: 10px;">'.$h[$row]."</b>";
				$result .= "<br>".$ar[$i]['value'].'</td>';	
				$row++;
				
				if($row == 4){
					$result .= "</tr>";
					$row = 0;
				}	
				$i++;
			}			
			
			$result .= "</table>";
			$this->donde = $i;
			$this->d3 = $result;
		}
		
		// -------------------------------------------------------------
		public function anexo1_Ingresos($t, $ar, $i, $f, $result) {
			$result .= "<h3>Ingresos</h3><table>";
			$ini = 35; //Es donde se queda el vector.
			$row = 0;
			$donde = 0;
         for(;$i <= $f; $i++){
         	if($row == 0) $result .= "<tr>";
         	$donde = $i;
         	$result .= '<td style="border: 1px solid black;"><b style="font-size: 10px;">'.$t[$ini]."</b>";
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
			$result .= "<h3>Donde realizaste tus estudios</h3><table>";
			$ini = 37; //Es donde se queda el vector.
			$row = 0;
			$donde = 0;
         for(;$i <= $f; $i++){
         	if($row == 0) $result .= "<tr>";
         	
         	$result .= '<td style="border: 1px solid black;"><b style="font-size: 10px;">'.$t[$ini]."</b>";
				$result .= "<br>".$ar[$i]['value'].'</td>';	
				$row++;
				$ini++;
				$donde = $i;
				if($row == 2){
					$result .= "</tr>";
					$row = 0;
				}	
			}
			$result .= "</table>";
			$this->anexo1_EstadoPsico($t, $ar, ($donde+1), ($donde + 13), $result);;
		}
		
		// -------------------------------------------------------------
		public function anexo1_EstadoPsico($t, $ar, $i, $f, $result) {
			$result .= "<h3>Estado Psicofisiologicos</h3><table>";
			$ini = 43; //Es donde se queda el vector.
			$row = 0;
			$donde = 0;
         for(;$i <= $f; $i++){
         	if($row == 0) $result .= "<tr>";
         	$donde = $i;
         	$result .= '<td style="border: 1px solid black;"><b style="font-size: 10px;">'.$t[$ini]."</b>";
				$result .= "<br>".$ar[$i]['value'].'</td>';	
				$row++;
				$ini++;
				
				if($row == 3){
					$result .= "</tr>";
					$row = 0;
				}	
			}
			$result .= "</tr></table>";
			$this->anexo1_AreaIntegracion($t, $ar, ($donde+1), ($donde + 7), $result);
		}
		
		// -------------------------------------------------------------
		public function anexo1_AreaIntegracion($t, $ar, $i, $f, $result) {
			$result .= "<h3>Áreas de Integración</h3><table>";
			$ini = 56; //Es donde se queda el vector.
			$row = 0;
			$donde = 0;
         for(;$i <= $f; $i++){
         	if($row == 0) $result .= "<tr>";
         	$donde = $i;
         	$result .= '<td style="border: 1px solid black;"><b style="font-size: 10px;">'.$t[$ini]."</b>";
				$result .= "<br>".$ar[$i]['value'].'</td>';	
				$row++;
				$ini++;
				
				if($row == 3){
					$result .= "</tr>";
					$row = 0;
				}	
			}
			$result .= "</tr></table>";
			$this->d4 = $result;
		}
		
		/************************************************
		*** Inician funciones de la segunda parte
		************************************************/
		
		public function anexo1_2_RelSociales($ar, $tit) {
			$t = array('Relación','Actitud');
			$result = '<h3>¿Qué relación tienes con tus hermanos/as? (Con cada uno de ellos)</h3><br><table style="border: 1px solid #000;">';
			$row = 0;
			$donde = 0;
         for($i = 0;$i <= 14; $i++){
         	if(strcmp($ar[$i]['name'], 'lig-afe') !== 0) {
         	$donde = $i;
         	if($row == 0) $result .= "<tr>";
         	
         	$result .= '<td style="border: 1px solid #000000;"><b style="font-size: 10px;">'.$t[$row]."</b>";
				$result .= "<br>".$ar[$i]['value'].'</td>';	
				$row++;
				
				if($row == 2){
					$result .= "</tr>";
					$row = 0;
				}	
				}	
				else{
					break;				
				}
			}
			$result .= "</table><br />";
			$this->anexo1_2_RelSocialesCon($ar, $tit, ($donde + 1), ($donde + 5), $result);
		}
		
		// -------------------------------------------------------------
		public function anexo1_2_RelSocialesCon($ar, $tit, $i, $f, $result) {
			$result .= '<table style="border: 1px solid #000;">';
			$row = 0;
			$donde = 0;
         for(;$i <= $f; $i++){
         	if($row == 0) $result .= "<tr>";
         	
         	$result .= '<td style="border: 1px solid #000000;"><b style="font-size: 10px;">'.$tit[$donde]."</b>";
				$result .= "<br>".$ar[$i]['value'].'</td>';	
				$row++;
				$donde++;
				if($row == 2){
					$result .= "</tr>";
					$row = 0;
				}	
					
			}
			$result .= "</tr></table>";
			$this->anexo1_2_AreaSocial($tit, $ar, ($i), ($i + 6), $donde, $result);
		}
		
		// -------------------------------------------------------------
		public function anexo1_2_AreaSocial($t, $ar, $i, $f, $vec, $result) {
			$result .= "<h3>Área Social</h3><table>";
			// $ini = $vec; //Es donde se queda el vector.
			$row = 0;
         for(;$i <= $f; $i++){
         	if($row == 0) $result .= "<tr>";
         	$result .= '<td style="border: 1px solid black;"><b style="font-size: 10px;">'.$t[$vec]."</b>";
				$result .= "<br>".$ar[$i]['value'].'</td>';	
				$row++;
				$vec++;
				
				if($row == 3){
					$result .= "</tr>";
					$row = 0;
				}	
			}
			$result .= "</tr></table>";
			$this->anexo1_2_CarPer($t, $ar, ($i), ($i + 49), $vec, $result);
		}
		// -------------------------------------------------------------
		public function anexo1_2_CarPer($t, $ar, $i, $f, $vec, $result) {
			$result .= "<h3>CARACTERÍSTICAS PERSONALES (MADUREZ Y EQUILIBRIO)</h3><table>";
			$ini = $vec; //Es donde se queda el vector.
			$row = 0;
         for(;$i <= $f; $i++){
         	if($row == 0) $result .= "<tr>";
         	$donde = $i;
         	$result .= '<td style="border: 1px solid black;"><b style="font-size: 10px;">'.$t[$vec]."</b>";
				$result .= "<br>".$ar[$i]['value'].'</td>';	
				$row++;
				$vec++;
				
				if($row == 4){
					$result .= "</tr>";
					$row = 0;
				}	
			}
			$result .= "</tr></table>";
			$this->anexo1_2_ArePsi($t, $ar, ($i), ($i + 12), $vec, $result);
		}
		// -------------------------------------------------------------
		public function anexo1_2_ArePsi($t, $ar, $i, $f, $vec, $result) {
			$result .= "<h3>ÁREA PSICOPEDAGÓGICA</h3><table>";
			$ini = $vec; //Es donde se queda el vector.
			$row = 0;
         for(;$i <= $f; $i++){
         	if($row == 0) $result .= "<tr>";
         	$donde = $i;
         	$result .= '<td style="border: 1px solid black;"><b style="font-size: 10px;">'.$t[$vec].'</b>';
				$result .= "<br>".$ar[$i]['value'].'</td>';	
				$row++;
				$vec++;
				
				if($row == 2){
					$result .= "</tr>";
					$row = 0;
				}	
			}
			$result .= "</tr></table>";
			$this->anexo1_2_Plan($t, $ar, ($i), ($i + 2), $vec, $result);
		}
		// -------------------------------------------------------------
		public function anexo1_2_Plan($t, $ar, $i, $f, $vec, $result) {
			$result .= "<h3>PLAN DE VIDA Y CARRERA</h3><table>";
			$ini = $vec; //Es donde se queda el vector.
			$row = 0;
         for(;$i <= $f; $i++){
         	if($row == 0) $result .= "<tr>";
         	$donde = $i;
         	$result .= '<td style="border: 1px solid black;"><b style="font-size: 10px;">'.$t[$vec].'</b>';
				$result .= "<br>".$ar[$i]['value'].'</td>';	
				$row++;
				$vec++;
				
				if($row == 2){
					$result .= "</tr>";
					$row = 0;
				}	
			}
			$result .= "</tr></table>";
			$this->anexo1_2_Personales($t, $ar, ($i), ($i + 5), $vec, $result);
		}
		// -------------------------------------------------------------
		public function anexo1_2_Personales($t, $ar, $i, $f, $vec, $result) {
			$result .= "<h3>CARACTERÍSTICAS PERSONALES</h3><table>";
			$ini = $vec; //Es donde se queda el vector.
			$row = 0;
         for(;$i <= $f; $i++){
         	if($row == 0) $result .= "<tr>";
         	$donde = $i;
         	$result .= '<td style="border: 1px solid black;"><b style="font-size: 10px;">'.$t[$vec].'</b>';
				$result .= "<br>".$ar[$i]['value'].'</td>';	
				$row++;
				$vec++;
				
				if($row == 2){
					$result .= "</tr>";
					$row = 0;
				}	
			}
			$result .= "</table>";
			$this->datos2 .= $result;
		}
}
// ----------------- Anexo 2: Línea de vida
class Anexo_2{
	private $conn;
	public $datos;
	
	public function anexo2() {

		$header = '<table><tr><td></td><td><h2>Línea de Vida</h2></td><td></td></tr></table><br /><br />';		
		
		$titles = array('A la edad de 6 años', 'A la edad de 12 años', 'A la edad de 15 años', 'A la edad de 18 años', 'A la edad de 21 años');
		 
		$array;
		$this->conn = new Conexion('../../php/datosServer.php');
		$this->conn = $this->conn->conectar();	
		$sql = "SELECT respuestas.respuestas FROM respuestas WHERE respuestas.idAnexo = 2 AND respuestas.subAnexo = 1 AND respuestas.idAlumno = ".$_SESSION['alumno'];
		$result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_array(MYSQLI_NUM)) {  
                   $array = json_decode($row[0], true);
                   break;        	
                	}
            }
      
         $this->conn->close();
         
         // Inicia llenado de Formato
			$this->anexo2_Datos($titles, $array);
			
			return $header.$this->datos;       
	}
	
	public function anexo2_Datos($tit, $ar){
			$result = '<table><tr><td style="color: blue;">Éxitos, logros, alcances, etc.</td><td style="color: red;">Fracasos, tropiezos, limitaciones, etc.</td></tr></table><br /><table>';
			for($i = 0; $i < 5; $i++) {
         	$result .= '<tr><td style="border: 1px solid black;"><b style="font-size: 10px;">'.$tit[$i].'</b>';
				$result .= "<br>".$ar[$i]['value'].'</td>';
				
				$result .= '<td style="border: 1px solid black;"><b style="font-size: 10px;">'.$tit[$i].'</b>';
				$result .= "<br>".$ar[$i + 5]['value'].'</td></tr>';
				}
				
				$result .= "</table>";
				$this->datos .= $result;
	}
}

// ----------------- Anexo 3: FODA
class Anexo_3{
	private $conn;
	public $d1;
	public $d2;
	public $d3;
	public $d4;
	public $d5;
	
	public function anexo3() {

		$header = '<table><tr><td></td><td><h2>Analisis FODA</h2></td><td></td></tr></table><br /><br />';		
		
		$p1 = array('Revisa la línea de vida y observa aquellos momentos en los cuales experimentaste los mayores éxitos o victorias.<br>¿Qué talentos especiales sacaste a relucir en dichos momentos? Identifica cuáles son tus mayores talentos.<br>Estos pueden ser habilidades o competencias.',
		'¿Qué es lo que la gente más admira de usted? Éstas son las cualidades y virtudes personales particulares que aportas a las relaciones.',
		'¿Cuáles son sus activos más valiosos? Éstos pueden ser cosas intangibles, como experiencias de la vida y relaciones,<br>o también activos tangibles como bienes naturales.',
		'Revisa sus respuestas a las preguntas anteriores. ESCRIBA LAS CUATRO "FORTALEZAS" MAS IMPORTANTES QUE DEBE CONSTRUIR PARA LOS SIGUIENTES CAPÍTULOS DE TU VIDA.');
		$p2 = array('¿Qué nuevas oportunidades y posibilidades parecen presentársele ahora? Estas pueden ser nuevas amistades,<br>eventos o sucesos inesperados que se le están presentando.',
		'Cuando piensa en el próximo capítulo de tu vida, ¿Cuáles son las posibilidades que más le entusiasman?',
		'¿Qué haría en el próximo capítulo de su vida si no tuviera miedo?',
		'Revisa sus respuestas anteriores. ANOTE LAS CUATRO “OPORTUNIDADES” QUE PUEDEN LLEVARSE A CABO EN EL PRÓXIMO CAPÍTULO DE TU VIDA:');		
		$p3 = array('Observe los momentos en los que experimentaste el fracaso. Preste especial atención a los "patrones"<br>recurrentes de fracaso en tu vida. ¿Cuál es la debilidad o deficiencia más común que<br>consideras tener yque piensas que está relacionada con estos fracasos?',
		'¿Cuáles son las tendencias negativas o destructivas de su comportamiento que pueden seguir causando sufrimiento a los<br>demás y a usted mismo en el futuro si no son atendidas?',
		'¿Qué es lo que más le gustaría cambiar de usted mismo en el próximo capítulo de tu vida?',
		'Revise sus respuestas a las preguntas anteriores. ESCRIBA LAS CUATRO "DEBILIDADES" MAS SIGNIFICATIVAS QUE<br>LO LIMITAN EN EL PRÓXIMO CAPÍTULO DE TU VIDA.');		 
		$p4 = array('Cuando mire hacia el horizonte, en el próximo capítulo de su vida, ¿cuál cree que sea el reto más grande que tendrá<br>que afrontar?',
		'¿Cuál es el riesgo personal más gran de que tiene que tomar en el futuro?',
		'¿Qué es lo que con mayor frecuencia evita, que eventualmente tendrá que afrontar?',
		'¿A qué le tiene más miedo?',
		'Revise sus respuestas anteriores. ANOTE LAS CUATRO “AMENAZAS” MÁS IMPORTANTES, DE LAS CUALES NECESITA ESTAR CONSCIENTE:');
		$p5 = array('Fortalezas','Oportunidades','Debilidades','Amenazas');		 
		 
		$array;
		$this->conn = new Conexion('../../php/datosServer.php');
		$this->conn = $this->conn->conectar();	
		$sql = "SELECT respuestas.respuestas, respuestas.subAnexo FROM respuestas WHERE respuestas.idAnexo = 3 AND respuestas.idAlumno = ".$_SESSION['alumno']." ORDER BY respuestas.subAnexo ASC";
		$result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_array(MYSQLI_NUM)) {  
                   $array = json_decode($row[0], true);
                   switch(intval($row[1])) {
                   	case 1: $this->anexo3_For($p1, $array); break;
                   	case 2: $this->anexo3_Opo($p2, $array); break;
                   	case 3: $this->anexo3_Deb($p3, $array); break;
                   	case 4: $this->anexo3_Ame($p4, $array); break;
                   	case 5: $this->anexo3_Res($p5, $array); break;
                   	}      	
                	}
            }
      
         $this->conn->close();
         
			return $header.$this->d1.$this->d2.$this->d3.$this->d4.$this->d5;       
	}
	
	public function anexo3_For($tit, $ar){
			$result = '<table><tr><td style="color: blue;">Fortalezas</td></tr></table><br /><table>';
			for($i = 0; $i < 4; $i++) {
         	$result .= '<tr><td style="border: 1px solid black;"><b style="font-size: 10px;">'.$tit[$i].'</b>';
				$result .= '<br><b style="color: blue;">R:</b> '.$ar[$i]['value'].'</td></tr>';
				
				}
				
				$result .= "</table><br><br>";
				$this->d1 .= $result;
	}
	
	public function anexo3_Opo($tit, $ar){
			$result = '<table><tr><td style="color: blue;">Oportunidades</td></tr></table><br /><table>';
			for($i = 0; $i < 4; $i++) {
         	$result .= '<tr><td style="border: 1px solid black;"><b style="font-size: 10px;">'.$tit[$i].'</b>';
				$result .= '<br><b style="color: blue;">R:</b> '.$ar[$i]['value'].'</td></tr>';
				
				}
				
				$result .= "</table><br><br>";
				$this->d2 .= $result;
	}
	
	public function anexo3_Deb($tit, $ar){
			$result = '<table><tr><td style="color: blue;">Debilidades</td></tr></table><br /><table>';
			for($i = 0; $i < 4; $i++) {
         	$result .= '<tr><td style="border: 1px solid black;"><b style="font-size: 10px;">'.$tit[$i].'</b>';
				$result .= '<br><b style="color: blue;">R:</b> '.$ar[$i]['value'].'</td></tr>';
				
				}
				
				$result .= "</table><br><br>";
				$this->d3 .= $result;
	}
	
	public function anexo3_Ame($tit, $ar){
			$result = '<table><tr><td style="color: blue;">Amenazas</td></tr></table><br /><table>';
			for($i = 0; $i < 4; $i++) {
         	$result .= '<tr><td style="border: 1px solid black;"><b style="font-size: 10px;">'.$tit[$i].'</b>';
				$result .= '<br><b style="color: blue;">R:</b> '.$ar[$i]['value'].'</td></tr>';
				
				}
				
				$result .= "</table><br><br>";
				$this->d4 .= $result;
	}
	
	public function anexo3_Res($tit, $ar){
			$result = '<table><tr><td style="color: blue;"><b>Resumen de Instrospección</b></td></tr></table><br /><table>';
			for($i = 0; $i < 4; $i++) {
         	$result .= '<tr><td style="border: 1px solid black;"><b style="font-size: 10px;">'.$tit[$i].'</b>';
				$result .= '<br><b style="color: blue;">R:</b> '.$ar[$i]['value'].'</td></tr>';
				
				}
				
				$result .= "</table>";
				$this->d5 .= $result;
	}
}

// ----------------- Anexo 4: Habilidades de estudio
class Anexo_4{
	private $conn;
	public $datos;
	
	public function anexo4() {

		$header = '<table><tr><td></td><td><h2>Habilidades de Estudio</h2></td><td></td></tr></table><br /><br />';		
		
		$titles = array('A.- ¿SUELES DEJAR PARA EL ÚLTIMO LA PREPARACIÓN DE TUS TRABAJOS?', 'B.- ¿CREES QUE EL SUEÑO O EL CANSANCIO TE IMPIDAN ESTUDIAR EFICAZMENTE EN MUCHAS OCASIONES?',
		'C.- ¿ES FRECUENTE QUE NO TERMINES TU TAREA A TIEMPO?', 'D.- ¿TIENDES A EMPLEAR TIEMPO EN LEER REVISTAS, VER TELEVISIÓN O CHARLAR CUANDO DEBIERAS DEDICARLOS A ESTUDIAR?',
		'E.- TUS ACTIVIDADES SOCIALES O DEPORTIVAS. ¿TE LLEVAN A DESCUIDAR, A MENUDO, TUS TAREAS ESCOLARES?','F.- ¿SUELES DEJAR PASAR UN DÍA O MÁS ANTES DE REPASARLOS APUNTES TOMADOS EN CLASE?',
		'G.- ¿SUELES DEDICAR TU TIEMPO LIBRE ENTRE LAS 4:00 DE LA TARDE Y LAS 9:00 DE LA NOCHE A OTRAS ACTIVIDADES QUE NO SEAN ESTUDIAR?','H.- ¿DESCUBRES ALGUNAS VECES DE PRONTO, QUE DEBES ENTREGAR UNA TAREA ANTES DE LO QUE CREÍAS?',
		'I.- ¿TE RETRASAS, CON FRECUENCIA, EN UNA ASIGNATURA DEBIDO A QUE TIENES QUE ESTUDIAR OTRA?','J.- ¿TE PARECE QUE TU RENDIMIENTO ES MUY BAJO, EN RELACIÓN CON EL TIEMPO QUE DEDICAS AL ESTUDIO?',
		'K.- ¿ESTÁ SITUADO TU ESCRITORIO DIRECTAMENTE FRENTE A UNA VENTANA, PUERTA U OTRA FUENTE DE DISTRACCIÓN?','L.- ¿SUELES TENER FOTOGRAFÍAS, TROFEOS O RECUERDOS SOBRE TU MESA DE ESCRITORIO?',
		'M.- ¿SUELES ESTUDIAR RECOSTADO EN LA CAMA O ARRELLANADO EN UN ASIENTO CÓMODO?','N.- ¿PRODUCE RESPLANDOR LA LÁMPARA QUE UTILIZAS AL ESTUDIAR?',
		'O.- TU MESA DE ESTUDIO ¿ESTÁ TAN DESORDENADA Y LLENA DE OBJETOS, QUE NO DISPONES DE SITIO SUFICIENTE PARA ESTUDIAR CON EFICACIA?','P.- ¿SUELES INTERRUMPIR TU ESTUDIO, POR PERSONAS QUE VIENEN A VISITARTE?',
		'Q.- ¿ESTUDIAS, CON FRECUENCIA, MIENTRAS TIENES PUESTA LA TELEVISIÓN Y/O LA RADIO?','R.- EN EL LUGAR DONDE ESTUDIAS, ¿SE PUEDEN VER CON FACILIDAD REVISTAS, FOTOS DE JÓVENES O MATERIALES PERTENECIENTES A TU AFICIÓN?',
		'S.- ¿CON FRECUENCIA, INTERRUMPEN TU ESTUDIO, ACTIVIDADES O RUIDOS QUE PROVIENEN DEL EXTERIOR?', 'T.- ¿SUELE HACERSE LENTO TU ESTUDIO DEBIDO A QUE NO TIENES A LA MANO LOS LIBROS Y LOS MATERIALES NECESARIOS?',
		'A.- ¿TIENDES A COMENZAR LA LECTURA DE UN LIBRO DE TEXTO SIN HOJEAR PREVIAMENTE LOS SUBTÍTULOS Y LAS ILUSTRACIONES?', 'B.- ¿TE SALTAS POR LO GENERAL LAS FIGURAS, GRÁFICAS Y TABLAS CUANDO ESTUDIAS UN TEMA?',
		'C.- ¿SUELE SERTE DIFÍCIL SELECCIONAR LOS PUNTOS DE LOS TEMAS DE ESTUDIO?', 'D.- ¿TE SORPRENDES CON CIERTA FRECUENCIA, PENSANDO EN ALGO QUE NO TIENE NADA QUE VER CON LO QUE ESTUDIAS?',
		'E.- ¿SUELES TENER DIFICULTAD EN ENTENDER TUS APUNTES DE CLASE CUANDO TRATAS DE REPASARLOS, DESPUÉS DE CIERTO TIEMPO?', 'F.- AL TOMAR NOTAS, ¿TE SUELES QUEDAR ATRÁS CON FRECUENCIA DEBIDO A QUE NO PUEDES ESCRIBIR CON SUFICIENTE RAPIDEZ?',
		'G.- POCO DESPUÉS DE COMENZAR UN CURSO, ¿SUELES ENCONTRARTE CON TUS APUNTESFORMANDO UN “REVOLTIJO"?', 'H.- ¿TOMAS NORMALMENTE TUS APUNTES TRATANDO DE ESCRIBIR LAS PALABRAS EXACTAS DEL DOCENTE?',
		'I.- CUANDO TOMAS NOTAS DE UN LIBRO, ¿TIENES LA COSTUMBRE DE COPIAR EL MATERIAL NECESARIO, PALABRA POR PALABRA?', 'J.- ¿TE ES DIFÍCIL PREPARAR UN TEMARIO APROPIADO PARA UNA EVALUACIÓN?',
		'K.- ¿TIENES PROBLEMAS PARA ORGANIZAR LOS DATOS O EL CONTENIDO DE UNA EVALUACIÓN?', 'L.- ¿AL REPASAR EL TEMARIO DE UNA EVALUACIÓN FORMULAS UN RESUMEN DE ESTE?',
		'M.- ¿TE PREPARAS A VECES PARA UN EVALUACIÓN MEMORIZANDO FÓRMULAS, DEFINICIONES O REGLAS QUE NO ENTIENDES CON CLARIDAD?', 'N.- ¿TE RESULTA DIFÍCIL DECIDIR QUÉ ESTUDIAR Y CÓMO ESTUDIARLO CUANDO PREPARAS UNA EVALUACIÓN?',
		'O.- ¿SUELES TENER DIFICULTADES PARA ORGANIZAR, EN UN ORDEN LÓGICO, LAS ASIGNATURAS QUE DEBES ESTUDIAR POR TEMAS?', 'P.- AL PREPARAR EVALUACIÓN, ¿SUELES ESTUDIAR TODA LA ASIGNATURA, EN EL ÚLTIMO MOMENTO?',
		'Q.- ¿SUELES ENTREGAR TUS EXÁMENES SIN REVISARLOS DETENIDAMENTE, PARA VER SI TIENEN ALGÚN ERROR COMETIDO POR DESCUIDO?', 'R.- ¿TE ES POSIBLE CON FRECUENCIA TERMINAR UNA EVALUACIÓN DE EXPOSICIÓN DE UN TEMA EN EL TIEMPO PRESCRITO?',
		'S.- ¿SUELES PERDER PUNTOS EN EXÁMENES CON PREGUNTAS DE “VERDADERO - FALSO", DEBIDO A QUE NO LEES DETENIDAMENTE?', 'T.- ¿EMPLEAS NORMALMENTE MUCHO TIEMPO EN CONTESTAR LA PRIMERA MITAD DE LA PRUEBA Y TIENES QUE APRESURARTE EN LA SEGUNDA?',
		'A.- DESPUÉS DE LOS PRIMEROS DÍAS O SEMANAS DEL CURSO, ¿TIENDES A PERDER INTERÉS POR EL ESTUDIO?','B.- ¿CREES QUE EN GENERAL, BASTA ESTUDIAR LO NECESARIO PARA OBTENER UN "APROBADO” EN LAS ASIGNATURAS.',
		'C.- ¿TE SIENTES FRECUENTEMENTE CONFUSO O INDECISO SOBRE CUÁLES DEBEN SER TUS METAS FORMATIVAS Y PROFESIONALES?','D.- ¿SUELES PENSAR QUE NO VALE LA PENA EL TIEMPO Y EL ESFUERZO QUE SON -NECESARIOS PARA LOGRAR UNA EDUCACIÓN UNIVERSITARIA?',
		'E.- ¿CREES QUE ES MÁS IMPORTANTE DIVERTIRTE Y DISFRUTAR DE LA VIDA, QUE ESTUDIAR?','F.- ¿SUELES PASAR EL TIEMPO DE CLASE EN DIVAGACIONES O SOÑANDO DESPIERTO EN LUGAR DE ATENDER AL DOCENTE?',
		'G.- ¿TE SIENTES HABITUALMENTE INCAPAZ DE CONCENTRARTE EN TUS ESTUDIOS DEBIDO A QUE ESTAS INQUIETO, ABURRIDO O DE MAL HUMOR?','H.- ¿PIENSAS CON FRECUENCIA QUE LAS ASIGNATURAS QUE ESTUDIAS TIENEN POCO VALOR PRACTICO PARA TI?',
		'I.- ¿SIENTES, FRECUENTES DESEOS DE ABANDONAR LA ESCUELA Y CONSEGUIR UN TRABAJO?','J.- ¿SUELES TENER LA SENSACIÓN DE LO QUE SE ENSEÑA EN LOS CENTROS DOCENTES NO TE PREPARA PARA AFRONTAR LOS PROBLEMAS DE LA VIDA ADULTA?',
		'K.- ¿SUELES DEDICARTE DE MODO CASUAL, SEGÚN EL ESTADO DE ÁNIMO EN QUE TE ENCUENTRES?','L.- ¿TE HORRORIZA ESTUDIAR LIBROS DE TEXTOS PORQUE SON INSÍPIDOS Y ABURRIDOS?',
		'M.- ¿ESPERAS NORMALMENTE A QUE TE FIJEN LA FECHA DE UN EVALUACIÓN PARA COMENZAR A ESTUDIAR LOS TEXTOS O REPASAR TUS APUNTES DE CLASES?','N - ¿SUELES PENSAR QUE LOS EXÁMENES SON PRUEBAS PENOSAS DE LAS QUE NO SE PUEDE ESCAPAR Y RESPECTO A LAS CUALES LO QUE DEBE HACERSE ES SOBREVIVIR, DEL MODO QUE SEA?',
		'O.- ¿SIENTES CON FRECUENCIA QUE TUS DOCENTES NO COMPRENDEN LAS NECESIDADES DE LOS ESTUDIANTES?','P.- ¿TIENES NORMALMENTE LA SENSACIÓN DE QUE TUS DOCENTES EXIGEN DEMASIADAS HORAS DE ESTUDIO FUERA DE CLASE?',
		'Q.- ¿DUDAS POR LO GENERAL, EN PEDIR AYUDA A TUS DOCENTES EN TAREAS QUE TE SON DIFÍCILES?','R.- ¿SUELES PENSAR QUE TUS DOCENTES NO TIENEN CONTACTO CON LOS TEMAS Y SUCESOS DE ACTUALIDAD?',
		'S.- ¿TE SIENTES REACIO, POR LO GENERAL, A HABLAR CON TUS DOCENTES DE TUS PROYECTOS FUTUROS, DE ESTUDIO O PROFESIONALES?','T.- ¿CRITICAS CON FRECUENCIA A TUS DOCENTES CUANDO CHARLAS CON TUS COMPAÑEROS?');
		 
		$array;
		$this->conn = new Conexion('../../php/datosServer.php');
		$this->conn = $this->conn->conectar();	
		$sql = "SELECT respuestas.respuestas FROM respuestas WHERE respuestas.idAnexo = 4 AND respuestas.subAnexo = 1 AND respuestas.idAlumno = ".$_SESSION['alumno'];
		$result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_array(MYSQLI_NUM)) {  
                   $array = json_decode($row[0], true);
                   break;        	
                	}
            }
      
         $this->conn->close();
         
         // Inicia llenado de Formato
			$this->anexo4_Organizacion($titles, $array);
			
			return $header.$this->datos;       
	}
	
	public function anexo4_Organizacion($tit, $ar){
			$result = '<h3>ORGANIZACIÓN DEL ESTUDIO</h3><table>';
			for($i = 0; $i < 20; $i++) {
         	$result .= '<tr><td style="border: 1px solid black;"><b style="font-size: 10px;">'.$tit[$i].'</b>';
				$result .= '<br> <b style="color: blue;">R:</b> '.$ar[$i]['value'].'</td></tr>';
				}
				
				$result .= "</table><br /><br /><br /><br />";
				$this->anexo4_Tecnicas($tit, $ar, $result);
	}
	
	public function anexo4_Tecnicas($tit, $ar, $result){
			$result .= '<h3>TÉCNICAS DE ESTUDIO</h3><table>';
			for($i = 20; $i < 40; $i++) {
         	$result .= '<tr><td style="border: 1px solid black;"><b style="font-size: 10px;">'.$tit[$i].'</b>';
				$result .= '<br> <b style="color: blue;">R:</b> '.$ar[$i]['value'].'</td></tr>';
				}
				
				$result .= "</table><br /><br /><br /><br />";
				$this->anexo4_Motivacion($tit, $ar, $result);
	}
	
	public function anexo4_Motivacion($tit, $ar, $result){
			$result .= '<h3>MOTIVACIÓN PARA EL ESTUDIO</h3><table>';
			for($i = 40; $i < 60; $i++) {
         	$result .= '<tr><td style="border: 1px solid black;"><b style="font-size: 10px;">'.$tit[$i].'</b>';
				$result .= '<br> <b style="color: blue;">R:</b> '.$ar[$i]['value'].'</td></tr>';
				}
				
				$result .= "</table>";
				$this->datos .= $result;
	}
}
	// --------------- Anexo 5: Estilos de Aprendizaje
class Anexo_5{
		private $conn;
	public $datos;
	
	public function anexo5() {

		$header = '<table><tr><td></td><td><h2>Estilos de Aprendizaje</h2></td><td></td></tr></table><br /><br />';		
		
		$titles = array('1.- ME AYUDA TRAZAR O ESCRIBIR A MANO LAS PALABRAS CUANDO TENGO QUE APRENDERLAS DE MEMORIA','2.- RECUERDO MEJOR UN TEMA AL ESCUCHAR UNA CONFERENCIA EN VEZ DE LEER UN LIBRO DE TEXTO',
		'3.- PREFIERO LAS CLASES QUE REQUIEREN UNA PRUEBA SOBRE LO QUE SE LEE EN EL LIBRO DE TEXTO','4.- ME GUSTA COMER BOCADOS Y MASCAR CHICLE, CUANDO ESTUDIO',
		'5.- AL PRESTAR ATENCIÓN A UNA CONFERENCIA, PUEDO RECORDAR LAS IDEAS PRINCIPALES SIN ANOTARLAS','6.- PREFIERO LAS INSTRUCCIONES ESCRITAS SOBRE LAS ORALES',
		'7.- YO RESUELVO BIEN LOS ROMPECABEZAS Y LOS LABERINTOS','8.- PREFIERO LAS CLASES QUE REQUIERAN UNA PRUEBA SOBRE LO QUE SE PRESENTA DURANTE UNA CONFERENCIA',
		'9.- ME AYUDA VER DIAPOSITIVAS Y VIDEOS PARA COMPRENDER UN TEMA','10.- RECUERDO MÁS CUANDO LEO UN LIBRO QUE CUANDO ESCUCHO UNA CONFERENCIA',
		'11.- POR LO GENERAL, TENGO QUE ESCRIBIR LOS NÚMEROS DEL TELÉFONO PARA RECORDARLOS BIEN','12. PREFIERO RECIBIR LAS NOTICIAS ESCUCHANDO LA RADIO EN VEZ DE LEERLAS EN UN PERIÓDICO',
		'13.- ME GUSTA TENER ALGO COMO UN BOLÍGRAFO O UN LÁPIZ EN LA MANO CUANDO ESTUDIO','14.- NECESITO COPIAR LOS EJEMPLOS DE LA PIZARRA DEL MAESTRO PARA EXAMINARLOS MÁS TARDE',
		'15.- PREFIERO LAS INSTRUCCIONES ORALES DEL MAESTRO A AQUELLAS ESCRITAS EN UN EXAMEN O EN LA PIZARRA','16.- PREFIERO QUE UN LIBRO DE TEXTO TENGA DIAGRAMAS GRÁFICOS Y CUADROS PORQUE ME AYUDAN MEJOR A ENTENDER EL MATERIAL',
		'17.- ME GUSTA ESCUCHAR MÚSICA AL ESTUDIAR UNA OBRA, NOVELA, ETC.','18.- TENGO QUE APUNTAR LISTAS DE COSAS QUE QUIERO HACER PARA RECORDARLAS',
		'19.- PUEDO CORREGIR MI TAREA EXAMINÁNDOLA Y ENCONTRANDO LA MAYORÍA DE LOS ERRORES','20.- PREFIERO LEER EL PERIÓDICO EN VEZ DE ESCUCHAR LAS NOTICIAS',
		'21.- PUEDO RECORDAR LOS NÚMEROS DE TELÉFONO CUANDO LOS OIGO','22.- GOZO EL TRABAJO QUE ME EXIGE USAR LA MANO O HERRAMIENTAS',
		'23.- CUANDO ESCRIBO ALGO, NECESITO LEERLO EN VOZ ALTA PARA OÍR COMO SUENA','24.- PUEDO RECORDAR MEJOR LAS COSAS CUANDO PUEDO MOVERME MIENTRAS ESTOY APRENDIÉNDOLAS, POR EJ. CAMINAR AL ESTUDIAR, O PARTICIPAR EN UNA ACTIVIDAD QUE ME PERMITA MOVERME, ETC.');
		 
		$array;
		$this->conn = new Conexion('../../php/datosServer.php');
		$this->conn = $this->conn->conectar();	
		$sql = "SELECT respuestas.respuestas FROM respuestas WHERE respuestas.idAnexo = 5 AND respuestas.subAnexo = 1 AND respuestas.idAlumno = ".$_SESSION['alumno'];
		$result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_array(MYSQLI_NUM)) {  
                   $array = json_decode($row[0], true);
                   break;        	
                	}
            }
      
         $this->conn->close();
         
         // Inicia llenado de Formato
			$this->anexo5_Cuestionario($titles, $array);
			
			return $header.$this->datos;       
	}
	
	public function anexo5_Cuestionario($tit, $ar){
			$result .= 'Parametros:<h5>1. Nunca, 2. Raramente, 3. Ocacionalmete, 4. Usualmente, 5. Siempre</h5><table>';
			for($i = 0; $i < 24; $i++) {
				$resp = '';
         	$result .= '<tr><td style="border: 1px solid black;"><b style="font-size: 10px;">'.$tit[$i].'</b>';
         	switch(intval($ar[$i]['value'])) {
					case 1: $resp = "Nunca"; break;
					case 2: $resp = "Raramente"; break;
					case 3: $resp = "Ocacionalmente"; break;
					case 4: $resp = "Usualmente"; break;
					case 5: $resp = "Siempre"; break;        	
         	}
				$result .= '<br> <b style="color: blue;">R:</b> '.$ar[$i]['value'].' - '.$resp.'</td></tr>';
				}
				
				$result .= "</table>";
				$this->datos .= $result;
	}
}

	// --------------- Anexo 6: Estilos de Aprendizaje
class Anexo_6{
		private $conn;
	public $datos;
	
	public function anexo6() {

		$header = '<table><tr><td></td><td><h2>Test de Autoestima</h2></td><td></td></tr></table><br /><br />';		
		
		$titles = array('1.A la hora de tomar decisiones en tu vida, como proponer cosas nuevas en el trabajo, iniciar alguna actividad de ocio,<br /> o elegir un color nuevo para pintar tu casa, ¿sueles buscar la aprobación o el apoyo de las personas que te rodean?',
		'2. Imagina que estás en una reunión social o familiar importante; adviertes que 110 vas vestido para la ocasión y<br /> que desentonas con los demás, ¿cómo te comportas?',
		'3. Tienes muchas ganas de irte a comprar ropa y le pides a algún amigo que te acompañe. Esta persona es más alta y<br /> más atractiva que tú, y todo lo que se prueba le queda mucho mejor que a ti',
		'4. Un día conoces a alguien nuevo y muy interesante, estáis charlando animadamente y llega el momento de hablar de ti,<br /> ¿cuál de las siguientes opciones mejor se ajusta a lo que cuentas?',
		'5. En tu lugar de trabajo o de estudios, se está explicando algo que es completamente nuevo para ti.<br /> Llega un momento en que te das cuenta que no has entendido casi nada ¿qué haces?',
		'6. Tener un trabajo bien remunerado y que nos guste es algo difícil de conseguir, si tuvieras que valorar tu empleo o<br /> tu situación laboral, ¿cómo la definirías?',
		'7. Has tenido un día duro, has trabajado con más ahínco para finalizar una tarea en la oficina, has hecho todas<br /> las gestiones que tenías pendientes, has resuelto un par de problemas domésticos y encima le has hecho un favor<br /> a un amigo. ¿Qué haces al llegar a casa?',
		'8. En tu trabajo están buscando a una persona que represente a la empresa en un concurso del ramo. Piden una persona<br /> que cumpla unos requisitos, entre ellos, explicar bien vuestro trabajo y que haga una demostración práctica del mismo',
		'9. ¿Con cuál de las siguientes frases sobre la buena fortuna estás más de acuerdo?',
		'10. En una fiesta en La que no conoces a nadie excepto a Los anfitriones, te presentan a un grupo de personas de aspecto interesante. ¿Cuál es tu actitud?');
		
		$respuestas = array('A. . NO, CONSIDERAS QUE TU OPINIÓN SEA BUENA Y QUE LA DE LOS DEMÁS NO TENGA POR QUÉ SERLO SIEMPRE.','B.SÍ, PERO SÓLO ANTE LAS DECISIONES QUE CONSIDERAS DEMASIADO IMPORTANTES COMO PARA ACTUAR PRECIPITADAMENTE.',
		'C. SÍ, SIEMPRE QUE PUEDES CONSULTAS CON LOS DEMÁS. TE EQUIVOCAS CON FRECUENCIA Y QUIERES HACER LAS COSAS BIEN.','D. DEPENDE DE LA DECISIÓN. SUELES TENER CLARO LO QUE VAS A HACER, PERO CONSIDERAS LAS POSIBILIDADES QUE TE OFRECEN LOS DEMÁS.',
		'A. NO LE DAS IMPORTANCIA, TE COMPORTAS CON NATURALIDAD Y SI ALGUIEN TE LO COMENTA HACES ALGUNA BROMA AL RESPECTO','B. TE DA MUCHA VERGÜENZA. PROCURAS SITUARTE EN ALGÚN LUGAR DISCRETO Y PASAR DESAPERCIBIDO',
		'C. TE SIENTES INCÓMODO PERO TRATAS DE NO PENSAR EN ELLO, TE INTEGRAS EN LA REUNIÓN Y DAS ALGUNA EXCUSA POR TU ERROR.','D. NO TE IMPORTA NADA EN ABSOLUTO, AUNQUE NO LLEVES LA ROPA ADECUADA TIENES ESTILO Y SABES LLEVAR BIEN CUALQUIER COSA.',
		'A. ADMIRAS EL ESTILO DE TU ACOMPAÑANTE, AL FINAL COMPRAS UN PAR DE PRENDAS NECESARIAS PERO MUY SIMPLES EN CUANTO A FORMA Y COLOR.','B. NO ESTÁS DISPUESTO A QUE TE GANE, DECIDES COMPRAR VARIAS PRENDAS MUY MODERNAS Y BASTANTE CARAS.',
		'C. ADMIRAS SU ESTILO PERO ERES MUY CONSCIENTE DEL TUYO, COMPRAS LA ROPA QUE MEJOR TE SIENTA Y QUE NECESITAS, Y PASÁIS UN RATO AMENO PROBÁNDOOS COSAS DIFERENTES.','D. A SU LADO TE SIENTES BASTANTE POCA COSA, TE QUITA LAS GANAS DE PROBARTE NADA Y MUCHO MENOS DE COMPRAR. PONES UNA EXCUSA Y TE MARCHAS.',
		'A. NO CREES QUE TENGAS MUCHO QUE CONTAR, TU TRABAJO ES MUY CORRIENTE, TUS AMIGOS SON NORMALES Y TUS AFICIONES TAMBIÉN. PREFIERES QUE ESTA PERSONA TE CUENTE SU VIDA.',
		'B. TU TRABAJO TE GUSTA Y AUNQUE SEA CORRIENTE, SIEMPRE LO ENFOCAS DESDE UNA PERSPECTIVA INTERESANTE, TUS AFICIONES SON TU PASIÓN Y DISFRUTAS HABLANDO DE ELLAS, TAMBIÉN HABLAS DE TUS PROYECTOS FUTUROS.',
		'C. HABLAS EN LÍNEAS GENERALES DE TU TRABAJO Y DE TUS AFICIONES, SOBRE TODO HABLAS DE TUS AMIGOS Y DE LO MÁS INTERESANTE DE SUS VIDAS.',
		'D. MÁS QUE DE TU TRABAJO ACTUAL, HABLAS DE TUS PROYECTOS Y DE TUS OBJETIVOS, Y DE LO QUE VAS A HACER PARA LOGRADOS, DE LO BUENAS QUE SON TUS AMISTADES Y LO POCO USUAL DE TUS AFICIONES. TE GUSTA HABLAR DE TI.',
		'A. PARAS LA EXPLICACIÓN Y REQUIERES QUE SE EMPIECE DE NUEVO, SI TU NO LO ENTIENDES HABRÁ MUCHA GENTE QUE TAMPOCO LO HAGA.',
		'B. SI HAY MÁS GENTE QUE PREGUNTE TU TAMBIÉN LO HACES, SI NO, BUSCAS EN UN APARTE AL PONENTE PARA QUE TE ACLARE LAS DUDAS',
		'C. TE DA MUCHA VERGÜENZA PREGUNTAR Y DEMOSTRAR ASÍ QUE NO ENTIENDES. MÁS TARDE PREGUNTARÁS A ALGÚN AMIGO O INTENTARÁS INFORMARTE POR TU CUENTA.',
		'D. TOMAS NOTA DE LO QUE NO ENTIENDES PARA PREGUNTARLO AL FINALIZAR LA CHARLA, SI SIGUES CON DUDAS PEDIRÁS INFORMACIÓN COMPLEMENTARIA PARA PREPARARTE MEJOR.',
		'A. RESPUESTASATISFACTORIA, TRATAS DE BUSCAR EL LADO POSITIVO DE LAS COSAS Y NUNCA TE FALTAN PROYECTOS Y OBJETIVOS QUE PERSEGUIR.','B. HORRIBLE, NO OBSTANTE, SABES QUE LAS COSAS ESTÁN MAL Y QUE TIENES QUE AGUANTAR LO QUE SEA. ESTÁS MUY AGRADECIDO POR TENER TRABAJO.',
		'C. NO TE PREOCUPA ESPECIALMENTE EL TEMA, TIENES UN MONTÓN DE PROYECTOS MÁS IMPORTANTES Y CON TU VALÍA LOS ALCANZARÁS.','D. HAS LOGRADO QUE NO TE AFECTE, CONSIDERAS MÁS IMPORTANTE TU VIDA PERSONAL Y PRIVADA Y ESO ES POR LO QUE LUCHAS.',
		'A. PREFIERES NO PENSARLO, EL DÍA HA SIDO DURO PERO PARA TI NO ES ALGO NUEVO, SOLO PIDES PODER DORMIR BIEN Y QUE MAÑANA SEA UN DÍA MÁS TRANQUILO.','B. SE LO CUENTAS A TODO EL MUNDO, TE GUSTA QUE SE TE RECONOZCA CUANDO HACES LAS COSAS BIEN Y EXIGES EN CASA QUE TE MIMEN POR HABERTE ESFORZADO TANTO.',
		'C. ESTÁS MUY SATISFECHO Y DECIDES DARTE UN CAPRICHO, DARTE UN BAÑO DE ESPUMA Y VER UNA BUENA PELÍCULA, O COMPRARTE UN REGALITO QUE HACE TIEMPO QUERÍAS','D. TE PREOCUPA QUE SE TE HAYA OLVIDADO ALGO O HABER HECHO ALGO MAL POR LA PRISA, REPASAS MENTALMENTE LAS ACTIVIDADES Y AL DÍA SIGUIENTE ESPERAS NO TENER QUEJA DE NADIE.',
		'A. NO TE PLANTEAS SER VOLUNTARIO, HAY MIL PERSONAS MÁS CAPACITADAS QUE TÚ PARA LA DEMOSTRACIÓN Y NO SE TE DA BIEN HABLAR EN PÚBLICO.','B. TE PRESENTAS VOLUNTARIO, PUEDE SER UNA EXPERIENCIA INTERESANTE Y SI SALES ELEGIDO PUEDES HACER UNA PRESENTACIÓN INNOVADORA.',
		'C. NO TE PRESENTAS, SERÍAS CAPAZ DE HACERLA BIEN PERO CREES QUE HAY GENTE MEJOR PREPARADA Y MÁS ORIGINAL QUE TÚ.','D. TE PRESENTAS Y ESTÁS CASI SEGURO DE QUE TE ELEGIRÁN, HACES BUENOS PROYECTOS Y DARÁS UNA BUENA IMAGEN DE LA EMPRESA.',
		'A. LA BUENA SUERTE PUEDE TOCARLE A TODO EL MUNDO, YO ME CONSIDERO UNA PERSONA AFORTUNADA A LA QUE LA VIDA LE SONRÍE.','B. PARA TENER BUENA SUERTE HAY QUE TRABAJAR DURO, SÓLO LOS MUY AFORTUNADOS LA TIENEN SIN APENAS ESFUERZO.',
		'C. YO NO TENGO SUERTE, TANTO LOS PREMIOS COMO LAS COSAS ESPECIA LES SÓLO LES PASAN A LOS DEMÁS.','D. LA SUERTE RESPECTO A LOS PREMIOS ES UNA CUESTIÓN DE PROBABILIDAD, Y RESPECTO A LAS COSAS DE LA VIDA, SIEMPRE DEPENDE DE CÓMO SE PERCIBAN.',
		'A. TE INTERESA CONOCERLOS NO SÓLO PARA PASAR UN BUEN RATO EN LA REUNIÓN SINO PORQUE PUEDE SER UNA FORMA DE INICIAR UNA AMISTAD.','B. ESPERAS CAUSARLES UNA BUENA IMPRESIÓN Y DECIR COSAS QUE LES PUEDAN INTERESAR.',
		'C. TE GUSTARÍA LLEVARLES A TU TERRENO EN LA CONVERSACIÓN PARA ASÍ PODER HABLAR DE LOS TEMAS QUE MÁS TE INTERESAN.','D. ANTES DE INICIAR UNA CONVERSACIÓN ESCUCHAS LO QUE DICEN, Y ES PERAS PARA HABLAR A QUE LO HAGAN DE TEMAS QUE TÚ CONOZCAS.');
		 
		$array;
		$this->conn = new Conexion('../../php/datosServer.php');
		$this->conn = $this->conn->conectar();	
		$sql = "SELECT respuestas.respuestas FROM respuestas WHERE respuestas.idAnexo = 6 AND respuestas.subAnexo = 1 AND respuestas.idAlumno = ".$_SESSION['alumno'];
		$result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_array(MYSQLI_NUM)) {  
                   $array = json_decode($row[0], true);
                   break;        	
                	}
            }
      
         $this->conn->close();
         
         // Inicia llenado de Formato
			$this->anexo6_Cuestionario($titles, $array, $respuestas);
			
			return $header.$this->datos;       
	}
	
	public function anexo6_Cuestionario($tit, $ar, $resp){
			$result = '<br /><br /><br /><table>';
			for($i = 0; $i < 10; $i++) {
         	$result .= '<tr><td style="border: 1px solid black;"><b style="font-size: 10px;">'.$tit[$i].'</b>';
				$result .= '<br> <b style="color: blue;">R:</b> '.$resp[intval($ar[$i]['value'])].'</td></tr>';
				}
				
				$result .= "</table>";
				$this->datos .= $result;
	}
}

	// --------------- Anexo 7: Test de asertividad
class Anexo_7{
		private $conn;
	public $datos;
	
	public function anexo7() {

		$header = '<table><tr><td></td><td><h2>Test de Asertividad</h2></td><td></td></tr></table><br /><br />';		
		
		$titles = array('1.- EN UNA REUNIÓN DIFÍCIL, CON UN AMBIENTE CALDEADO, SOY CAPAZ DE HABLAR CON CONFIANZA','2.- SI NO ESTOY SEGURA DE UNA COSA, PUEDO PEDIR AYUDA FÁCILMENTE.',
		'3.- SI ALGUNA PERSONA ES INJUSTA Y AGRESIVA, PUEDO CONTROLAR LA SITUACIÓN CON CONFIANZA.','4.- SI ALGUNA PERSONA SE MUESTRA IRÓNICA CONMIGO O CON OTRAS, PUEDO RESPONDER SIN AGRESIVIDAD.',
		'5.- SI CREO QUE SE ESTÁ ABUSANDO DE MÍ, SOY CAPAZ DE DENUNCIARLO SIN ALTERARME.','6.- SI ALGUNA PERSONA ME PIDE PERMISO PARA HACER ALGO QUE NO ME GUSTA, POR EJEMPLO, FUMAR, PUEDO DECIRLE QUE NO SIN SENTIRME CULPABLE.',
		'7.- SI ALGUNA PERSONA PIDE MI OPINIÓN SOBRE ALGUNA COSA ME SIENTO BIEN DÁNDOSELA, AUNQUE NO CONCUERDE CON LA DE LOS DEMÁS.','8.- PUEDO CONECTAR FÁCIL Y EFECTIVAMENTE CON PERSONAS QUE CONSIDERO IMPORTANTES.',
		'9.- CUANDO ENCUENTRO DEFECTOS EN UNA TIENDA O RESTAURANTE, SOY CAPAZ DE EXPONERLOS SIN ATACAR A LAS OTRAS PERSONAS Y SIN SENTIRME MAL.');
		 
		$array;
		$this->conn = new Conexion('../../php/datosServer.php');
		$this->conn = $this->conn->conectar();	
		$sql = "SELECT respuestas.respuestas FROM respuestas WHERE respuestas.idAnexo = 7 AND respuestas.subAnexo = 1 AND respuestas.idAlumno = ".$_SESSION['alumno'];
		$result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_array(MYSQLI_NUM)) {  
                   $array = json_decode($row[0], true);
                   break;        	
                	}
            }
      
         $this->conn->close();
         
         // Inicia llenado de Formato
			$this->anexo7_Cuestionario($titles, $array);
			
			return $header.$this->datos;       
	}
	
		public function anexo7_Cuestionario($tit, $ar){
			$result .= 'Parametros:<h5>1 = Con frecuencia, 2 = De vez en cuando, 3 = Casi nunca y 4 = Nunca</h5><table>';
			for($i = 0; $i < 9; $i++) {
				$resp = '';
         	$result .= '<tr><td style="border: 1px solid black;"><b style="font-size: 10px;">'.$tit[$i].'</b>';
         	switch(intval($ar[$i]['value'])) {
					case 1: $resp = "Con frecuencia"; break;
					case 2: $resp = "De vez en cuando"; break;
					case 3: $resp = "Casi nunca"; break;
					case 4: $resp = "Nunca"; break;       	
         	}
				$result .= '<br> <b style="color: blue;">R:</b> '.$ar[$i]['value'].' - '.$resp.'</td></tr>';
				}
				
				$result .= "</table>";
				$this->datos .= $result;
	}
}

	// --------------- Anexo 8: Desempeño del tutor
class Anexo_8{
		private $conn;
	public $t1;
	public $t2;
	public $t3;
	public $t4;
	
	public function anexo8() {

		$header = '<table><tr><td></td><td><h3>Rúbrica para evaluar desempeño del tutor</h3></td><td></td></tr></table><br /><br />';		
		
		 
		$array;
		$this->conn = new Conexion('../../php/datosServer.php');
		$this->conn = $this->conn->conectar();	
		$sql = "SELECT respuestas.respuestas FROM respuestas WHERE respuestas.idAnexo = 8 AND respuestas.subAnexo = 1 AND respuestas.idAlumno = ".$_SESSION['alumno'];
		$result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_array(MYSQLI_NUM)) {  
                   $array = json_decode($row[0], true);
                   break;        	
                	}
            }
      
         $this->conn->close();
         
         // Inicia llenado de Formato
			$this->anexo8_T1($array[0]['value']);
			$this->anexo8_T2($array[1]['value']);
			$this->anexo8_T3($array[2]['value']);
			$this->anexo8_T4($array[3]['value']);
			
			return $header.$this->t1.$this->t2.$this->t3.$this->t4;       
	}
	
		public function anexo8_T1($v){
			$result = '<table>
							<tr class="titleTable" style="border: 1px solid black;">
								<td colspan="3" style="border: 1px solid black;"><b>Genera un clima de confianza que permite el logro de los propósitos de la tutoría.</b></td>
							</tr>';


				$result .= '<tr>
								<td style="border: 1px solid black;">- Genera confianza y buena comunicación con todo el grupo.<br>- Hace agradable la sesión de Tutoría.<br>- Escucha con atención todo lo que se le solicita.<br>- Se muestra empático con las consultas que se le hacen.</td><td style="border: 1px solid black;" align="center"><br><br>Valor: 5</td><td style="border: 1px solid black;" align="center"><br><br>'.(intval($v) == 5 ? '<b>X</b>': '').'</td>
							</tr>
							<tr>
								<td style="border: 1px solid black;">- Genera confianza y buena comunicación con todo el grupo.<br>- Hace agradable la sesión de Tutoría.<br>- Escucha con atención todo lo que se le solicita.</td><td style="border: 1px solid black;" align="center"><br><br>Valor: 4</td><td style="border: 1px solid black;" align="center"><br><br>'.(intval($v) == 4 ? '<b>X</b>': '').'</td>
							</tr>
							<tr>								
								<td style="border: 1px solid black;">- Genera confianza y buena comunicación con todo el grupo.<br>- Hace agradable la sesión de Tutoría.<br></td><td style="border: 1px solid black;" align="center"><br><br>Valor: 3</td><td style="border: 1px solid black;" align="center"><br><br>'.(intval($v) == 3 ? '<b>X</b>': '').'</td>
							</tr>
							<tr>								
								<td style="border: 1px solid black;">- Genera confianza y buena comunicación con todo el grupo.<br></td><td style="border: 1px solid black;" align="center"><br><br>Valor: 2</td><td style="border: 1px solid black;" align="center"><br><br>'.(intval($v) == 2 ? '<b>X</b>': '').'</td>
							</tr>
							<tr>
								<td style="border: 1px solid black;">- Se comunica con todo el grupo.</td><td style="border: 1px solid black;" align="center"><br><br>Valor: 1</td><td style="border: 1px solid black;" align="center"><br><br>'.(intval($v) == 1 ? '<b>X</b>': '').'</td>
							</tr>';
				
				$result .= "</table><br><br>";
				$this->t1 .= $result;
	}
	
	public function anexo8_T2($v){
			$result = '<table>
							<tr>
								<td colspan="3" style="border: 1px solid black;"><b>Calidad de la información proporcionada al tutorado.</b></td>
							</tr>';


				$result .= '<tr>
								<td style="border: 1px solid black;">- Da información necesaria sobre el programa de tutoría.<br>- Provee de la información adecuada para realizar trámites escolares.<br>- Proporciona información suficiente sobre los apoyos que requiere el estudiante.<br>- Da información y orientación importante que apoye el área personal del tutorado.<br>- Informa con presición sobre las asesorías académicas que ofrecen los docentes de su carrera.</td><td style="border: 1px solid black;" align="center"><br><br>Valor: 5</td><td style="border: 1px solid black;" align="center"><br><br>'.(intval($v) == 5 ? '<b>X</b>': '').'</td>
							</tr>
							<tr>
								<td style="border: 1px solid black;">- Da información necesaria sobre el programa de tutoría.<br>- Provee de la información adecuada para realizar trámites escolares.<br>- Proporciona información suficiente sobre los apoyos que requiere el estudiante.<br>- Da información y orientación importante que apoye el área personal del tutorado.<br></td><td style="border: 1px solid black;" align="center"><br><br>Valor: 4</td><td style="border: 1px solid black;" align="center"><br><br>'.(intval($v) == 4 ? '<b>X</b>': '').'</td>
							</tr>
							<tr>								
								<td style="border: 1px solid black;">- Da información necesaria sobre el programa de tutoría.<br>- Provee de la información adecuada para realizar trámites escolares.<br>- Proporciona información suficiente sobre los apoyos que requiere el estudiante.<br></td><td style="border: 1px solid black;" align="center"><br><br>Valor: 3</td><td style="border: 1px solid black;" align="center"><br><br>'.(intval($v) == 3 ? '<b>X</b>': '').'</td>
							</tr>
							<tr>								
								<td style="border: 1px solid black;">- Da información necesaria sobre el programa de tutoría.<br>- Provee de la información adecuada para realizar trámites escolares.<br></td><td style="border: 1px solid black;" align="center"><br><br>Valor: 2</td><td style="border: 1px solid black;" align="center"><br><br>'.(intval($v) == 2 ? '<b>X</b>': '').'</td>
							</tr>
							<tr>
								<td style="border: 1px solid black;">- Da información necesaria sobre el programa de tutoría.<br></td><td style="border: 1px solid black;" align="center"><br><br>Valor: 1</td><td style="border: 1px solid black;" align="center"><br><br>'.(intval($v) == 1 ? '<b>X</b>': '').'</td>
							</tr>	';
				
				$result .= "</table><br><br>";
				$this->t2 .= $result;
	}
	
		public function anexo8_T3($v){
			$result = '<table>
							<tr>
								<td colspan="3" style="border: 1px solid black;"><b>Disponibilidad y calidad en la atención tutorial.</b></td>
							</tr>';


				$result .= '<tr>
								<td style="border: 1px solid black;">- Se le puede localizar en cualquier momento.<br>- Entregó su horario y localización desde el inicio del semestre.<br>- Atiende con amabilidad cada que se le necesita.<br>- Canaliza adecuadamente a los tutorados siempre que tienen algún problema y que él no pueda resolver.<br>- Realiza su función tutorial con disponibilidad y calidad.<br>- Le da seguimiento a los tutorados que ha canalizado.</td><td style="border: 1px solid black;" align="center"><br><br>Valor: 5</td><td style="border: 1px solid black;" align="center"><br><br>'.(intval($v) == 5 ? '<b>X</b>': '').'</td>
							</tr>
							<tr>
								<td style="border: 1px solid black;">- Se le puede localizar en cualquier momento.<br>- Entregó su horario y localización desde el inicio del semestre.<br>- Atiende con amabilidad cada que se le necesita.<br>- Canaliza adecuadamente a los tutorados siempre que tienen algún problema y que él no pueda resolver.<br></td><td style="border: 1px solid black;" align="center"><br><br>Valor: 4</td><td style="border: 1px solid black;" align="center"><br><br>'.(intval($v) == 4 ? '<b>X</b>': '').'</td>
							</tr>
							<tr>								
								<td style="border: 1px solid black;">- Entregó su horario y localización desde el inicio del semestre.<br>- Atiende con amabilidad cada que se le necesita.<br>- Canaliza adecuadamente a los tutorados siempre que tienen algún problema y que él no pueda resolver.<br></td><td style="border: 1px solid black;" align="center"><br><br>Valor: 3</td><td style="border: 1px solid black;" align="center"><br><br>'.(intval($v) == 3 ? '<b>X</b>': '').'</td>
							</tr>
							<tr>								
								<td style="border: 1px solid black;">- Atiende con amabilidad cada que se le necesita.<br>- Canaliza adecuadamente a los tutorados siempre que tienen algún problema y que él no pueda resolver.<br></td><td style="border: 1px solid black;" align="center"><br><br>Valor: 2</td><td style="border: 1px solid black;" align="center"><br><br>'.(intval($v) == 2 ? '<b>X</b>': '').'</td>
							</tr>
							<tr>
								<td style="border: 1px solid black;">- Atiende con amabilidad cada que se le necesita.<br></td><td style="border: 1px solid black;" align="center"><br><br>Valor: 1</td><td style="border: 1px solid black;" align="center"><br><br>'.(intval($v) == 1 ? '<b>X</b>': '').'</td>
							</tr>	';
				
				$result .= "</table><br><br>";
				$this->t3 .= $result;
	}
	
		public function anexo8_T4($v){
			$result = '<table>
							<tr>
								<td colspan="3" style="border: 1px solid black;"><b>Planeación y preparación en los procesos de la Tutoría.</b></td>
							</tr>';


				$result .= '<tr>
								<td style="border: 1px solid black;">- Muestra tener las herramientas necesarias para atender el grupo y/o individualmente.<br>- Realiza la programación de las sesiones considerando los tiempos disponibles de los estudiantes<br>- Muestra evidencia de que planeó las sesiones individuales y grupales con sus tutorados pues lleva un orden en sus actividades.<br>- Realiza sus actividades como tutor respetando los tiempos disponibles para ello evitando interrupciones que coarten el hilo de la sesión.<br>- Planea, ejecuta y evalúa su actividad tutorial continuamente con fines de realimentación.<br></td><td style="border: 1px solid black;" align="center"><br><br>Valor: 5</td><td style="border: 1px solid black;" align="center"><br><br>'.(intval($v) == 5 ? '<b>X</b>': '').'</td>
							</tr>
							<tr>
								<td style="border: 1px solid black;">- Muestra tener las herramientas necesarias para atender el grupo y/o individualmente.<br>- Realiza la programación de las sesiones considerando los tiempos disponibles de los estudiantes<br>- Muestra evidencia de que planeó las sesiones individuales y grupales con sus tutorados pues lleva un orden en sus actividades.<br>- Realiza sus actividades como tutor respetando los tiempos disponibles para ello evitando interrupciones que coarten el hilo de la sesión.<br></td><td style="border: 1px solid black;" align="center"><br><br>Valor: 4</td><td style="border: 1px solid black;" align="center"><br><br>'.(intval($v) == 4 ? '<b>X</b>': '').'</td>
							</tr>
							<tr>								
								<td style="border: 1px solid black;">- Muestra tener las herramientas necesarias para atender el grupo y/o individualmente.<br>- Realiza la programación de las sesiones considerando los tiempos disponibles de los estudiantes<br>- Muestra evidencia de que planeó las sesiones individuales y grupales con sus tutorados pues lleva un orden en sus actividades.<br></td><td style="border: 1px solid black;" align="center"><br><br>Valor: 3</td><td style="border: 1px solid black;" align="center"><br><br>'.(intval($v) == 3 ? '<b>X</b>': '').'</td>
							</tr>
							<tr>								
								<td style="border: 1px solid black;">- Muestra tener las herramientas necesarias para atender el grupo y/o individualmente.<br>- Realiza la programación de las sesiones considerando los tiempos disponibles de los estudiantes<br></td><td style="border: 1px solid black;" align="center"><br><br>Valor: 2</td><td style="border: 1px solid black;" align="center"><br><br>'.(intval($v) == 2 ? '<b>X</b>': '').'</td>
							</tr>
							<tr>
								<td style="border: 1px solid black;">- Muestra tener las herramientas necesarias para atender el grupo y/o individualmente.<br></td><td style="border: 1px solid black;" align="center"><br><br>Valor: 1</td><td style="border: 1px solid black;" align="center"><br><br>'.(intval($v) == 1 ? '<b>X</b>': '').'</td>
							</tr>';
				
				$result .= "</table>";
				$this->t4 .= $result;
	}
}
?>