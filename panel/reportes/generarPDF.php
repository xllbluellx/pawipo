<?php

include('../php/conexion.php');
class generarPDF{
	private $conn;
	
	public function genPdfTutor($dato) {
		$this->conn = new Conexion('../../php/datosServer.php');
		$this->conn = $this->conn->conectar();
 	      	
 	     $encontrado = false;	 	
    	  $info = '<p>Reporte</p><br><br><table style="border: 1px solid lightgray;">';

		   	$sql = 'CALL generarPDF("'.$dato.'", 0);';
		   	$datos = '';
		   	$info .= '<tr style="background-color: #2E2E2E; color: #f2f2f2;">
		   	<th>No. Control</th>
		   	<th colspan="2">Nombre</th>
		   	<th>Activo</th>
		   	<th>Tutoria Grupal</th>
				<th>Tutoria Individual</th>
		   	</tr><tbody id="resultadoBus">';
    
		  $rfc = "";
        $result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                	$datos = 'Profesor: '.$row['profe'].'<br>Carrera: '.$row['carrera'].'<br>Grupo: '.$row['idGrupo'].'<hr><br>';
						$info .= '<tr><td style="text-align: center; color: #400101; border: 1px solid lightgray;">'.$row['idAlumno'].'</td>'.
									'<td colspan="2" style=" border: 1px solid lightgray;">'.$row['alum'].'</td>';
						if(intval($row['activo']) == 1) {
							$info .= '<td   style="border: 1px solid lightgray;"><span >SI</span></td>';
							}
						else {
							$info .= '<td  style="border: 1px solid lightgray;"><span>NO</span></td>';
							}
						 $info .= '<td style="color: #400101; border: 1px solid lightgray;"></td><td  style="color: #400101; border: 1px solid lightgray;"></td></tr>';
                }
                
                $encontrado = true;
            }

            $result2 = $this->conn->query($sql);
            if ($result2->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                	$datos = 'Profesor: '.$row['profe'].'<br>Carrera: '.$row['carrera'].'<br>Grupo: '.$row['idGrupo'].'<hr><br>';
						$info .= '<tr><td style="text-align: center; color: #400101; border: 1px solid lightgray;">'.$row['idAlumno'].'</td>'.
									'<td colspan="2" style=" border: 1px solid lightgray;">'.$row['alum'].'</td>';
						if(intval($row['activo']) == 1) {
							$info .= '<td   style="border: 1px solid lightgray;"><span >SI</span></td>';
							}
						else {
							$info .= '<td  style="border: 1px solid lightgray;"><span>NO</span></td>';
							}
						 $info .= '<td style="color: #400101; border: 1px solid lightgray;"></td><td  style="color: #400101; border: 1px solid lightgray;"></td></tr>';
                }
                
                $encontrado = true;
            }

				$this->conn->close();
            $info .= '</tbody></table></div>';
            return $datos.$info;
				
		}
		
			public function genPdfGrupo($dato) {
		$this->conn = new Conexion('../../php/datosServer.php');
		$this->conn = $this->conn->conectar();
 	      	
 	     $encontrado = false;	 	
    	  $info = '<p>Reporte</p><br><br><table style="border: 1px solid lightgray;">';

		   	$sql = 'CALL generarPDF("'.$dato.'", 0);';
		   	$datos = '';
		   	$info .= '<tr style="background-color: #2E2E2E; color: #f2f2f2;">
		   	<th>No. Control</th>
		   	<th colspan="2">Nombre</th>
		   	<th>Activo</th>
		   	<th>Tutoria Grupal</th>
				<th>Tutoria Individual</th>
		   	</tr><tbody id="resultadoBus">';
    
		  $rfc = "";
        $result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                	$datos = 'Profesor: '.$row['profe'].'<br>Carrera: '.$row['carrera'].'<br>Grupo: '.$row['idGrupo'].'<hr><br>';
						$info .= '<tr><td style="text-align: center; color: #400101; border: 1px solid lightgray;">'.$row['idAlumno'].'</td>'.
									'<td colspan="2" style=" border: 1px solid lightgray;">'.$row['alum'].'</td>';
						if(intval($row['activo']) == 1) {
							$info .= '<td   style="border: 1px solid lightgray;"><span >SI</span></td>';
							}
						else {
							$info .= '<td  style="border: 1px solid lightgray;"><span>NO</span></td>';
							}
						 $info .= '<td style="color: #400101; border: 1px solid lightgray;"></td><td  style="color: #400101; border: 1px solid lightgray;"></td></tr>';
                }
                
                $encontrado = true;
            }
				$this->conn->close();
            $info .= '</tbody></table></div>';
            return $datos.$info;
				
		}
		
			public function genPdfGrupoF($dato) {
		$this->conn = new Conexion('../../php/datosServer.php');
		$this->conn = $this->conn->conectar();
 	      	
 	     $encontrado = false;	 	
    	  $css = '<style>
						th, td{
							border: 1px solid #000;
						}
						.title{
							background-color: #D9BA60;
							text-align: center;						
						}
						
						.subtitle{
							background-color: #D9BA60;					
						}
						
						.noBor td{
							text-align: center;	
							border: 1px solid #fff;
						}

						.sinborde: focus, input:focus {
							 outline: none;
						}
					</style>';

		   	$sql = 'CALL generarPDF("'.$dato.'", 0);';
		   	$info = '';
		   	$d0 = '<br /><br /><table>
							<tr class="title"><th colspan="8"><b>REPORTE SEMESTRAL DEL TUTOR</b></th></tr>
							<tr class="subtitle"><td colspan="8">Instituto Tecnológico de Morelia</td></tr>';
    
		  $cont = 1;
		  
        $result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                	$grupal='<input type="text" class="sinborde" name="grupal'.$cont.'" value="" size="19" maxlength="30" />';
                	$individual='<input type="text" class="sinborde" name="individual'.$cont.'" value="" size="19" maxlength="30" />';
                	$estcanalizados='<input type="text" class="sinborde" name="estudiantes'.$cont.'" value="" size="19" maxlength="30" />';
                	$observaciones='<input type="text" class="sinborde" name="observaciones'.$cont.'" value="" size="19" maxlength="30" />';
                	$asistencia='<input type="text" class="sinborde" name="asistencia'.$cont.'" value="" size="19" maxlength="30" />';
                	$d1 = '<tr class="subtitle"><td colspan="6">Nombre del Tutor: '.$row['profe'].'</td><td colspan="2">Fecha: '.date("d/m/Y").'</td></tr>';
                	$d2 = '<tr class="subtitle"><td colspan="3">Programa Educativo: '.$row['carrera'].'</td><td colspan="3">Grupo: '.$row['idGrupo'].'</td><td colspan="2">Hora: '.date("H:i:s").'</td></tr>';
                	$d3 = '<tr class="title"><td rowspan="2" width="3%"></td><td rowspan="2" width="7%"><br /><br /># Control</td><td rowspan="2" width="27.5%"><br /><br />Lista de estudiantes</td><td colspan="2">Estudiantes atendidos en el semestre</td><td rowspan="2">Estudiantes canalizados en el semestre</td><td colspan="2">Área Canalizada</td></tr>
                			<tr class="title"><td>Tutoría grupal</td><td>Tutoría individual</td><td>Observaciones</td><td>% Asistencia</td></tr>';
                	
						$info .= '<tr><td>'.$cont.'</td><td>'.$row['idAlumno'].'</td><td>'.strtoupper($row['alum']).'</td><td>'.$grupal.'</td><td>'.$individual.'</td><td>'.$estcanalizados.'</td><td>'.$observaciones.'</td><td>'.$asistencia.'</td></tr>';
						$cont++;
						}
            }
				$this->conn->close();

            $d4 = '<tr><td colspan="8"><b>Instructivo de llenado:</b><br />Anote los datos correspondientes en los apartados del encabezado<br />
				En el apartado de Observaciones anotar:
				<ul><li>Anote las 10 actividades adicionales más importantes realizadas en el semestre</li>
				<li>Anotar las acciones de mayor impacto para alcanzar la competencia de la asignatura</li>
				<li>Este reporte deberá ser llenado por el Tutor</li>
				<li>Deberá ser entregada al Coordinador de Tutoría del Departamento Académico con copia para el  Tutor</li>
				</ul></td></tr>
				<tr><td colspan="8"> Observaciones: <br><textarea rows="5" cols="151" name="comment" form="usrform">
						</textarea><br /><br /><br /><br /></td></tr>';
		
				$firmas = '<br /><br /><table class="noBor"><tr><td>Fecha de entrega de este reporte: <input type="text" style="text-decoration: underline; " name="fechareporte" value="" size="30" maxlength="30" /></td><td></td></tr>
				<tr><td><br /><br /><br /><br /><br />_____________________________________________________<br /><input type="text" class="sinborde" name="firmacoordinador" value="Nombre y firma del Coordinador de Tutoría del Departamento Académico" size="50" maxlength="70" /></td><td><br /><br /><br /><br /><br />____________________________________________<br /><input type="text" class="sinborde" name="firmajefe" value="Nombre y firma del Jefe de Departamento Académico" size="50" maxlength="70" /></td></tr>				
				<tr><td colspan="2"><br /><br /><br /><br />____________________________________________<br /><input type="text" class="sinborde" name="firmatutor" value="Nombre y firma del tutor" size="50" maxlength="70" /></td></tr>
				</table>';				
				
            return $css.$d0.$d1.$d2.$d3.$info.$d4.'</table>'.$firmas;
				
		}
		
		public function Encuestas($grupo) {	
		$this->conn = new Conexion('../../php/datosServer.php');
		$this->conn = $this->conn->conectar();
		$datosProfe = $this->infoProfe($grupo);	
		$this->conn->next_result();
		
		$css = '<style>
						th, td{
							border: 1px solid #000;
						}
						.title{
							background-color: #9BB0A9;
							text-align: center;						
						}
						
						.subtitle{
							background-color: #D9BA60;					
						}
						
						.noBor td{
							text-align: center;	
							border: 1px solid #fff;
						}
					</style>';
					
		$listado = '<table ><tr class="title" ><td width="15%">No. Control</td><td width="58%">Nombre</td><td width="3%">E. 1</td><td width="3%">E. 2</td><td width="3%">E. 3</td><td width="3%">E. 4</td><td width="3%">E. 5</td><td width="3%">E. 6</td><td width="3%">E. 7</td><td width="3%">E. 8</td><td width="3%">E. 9</td></tr>';
		
		$sql = "CALL obtenerAlum('".$grupo."');";
		$result = $this->conn->query($sql);
		if ($result->num_rows > 0) {
			    while($row = $result->fetch_assoc()) {
			    	  $listado .= '<tr>';
			        $listado .= $this->listarAlumnos($row['idAlumno'], $row['nom']);
			        $listado .= '</tr>';
			    }
			} 	
		
		$listado .= '</table>';
		return $css.$datosProfe.$listado;
		$this->conn->close();
		}

		public function infoProfe($grupo) {
			$datos = '<table><tr><th colspan="2" class="title"><b>ENCUESTAS REALIZADAS</b></th></tr>';
			$sql = 'CALL generarPDF("'.$grupo.'", 1);';
			$result = $this->conn->query($sql);
		if ($result->num_rows > 0) {
			    while($row = $result->fetch_assoc()) {
			    	  $datos .= '<tr><td><b>Carrera:</b> '.$row['carrera'].'</td><td><b>Grupo:</b> '.$row['idGrupo'].'</td></tr><tr><td colspan="2"><b>Profesor:</b> '.strtoupper($row['profe']).'</td></tr>';
			    }
			} 	 
		
		$datos .= '</table><br />';

		$title = '<table style="font-size: 10px; text-align: center;">
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
		        </table><br /><br />';		
		
		return $datos.$title;
			}		
		
		public function listarAlumnos($alu, $nom) {
		$this->conn->next_result();
		$list = '';
		$sql = "CALL obtenerAnexos(".$alu.");";
		$result = $this->conn->query($sql);
		if ($result->num_rows > 0) {
			$list .= '<td style="color: #400101; text-align: center;">'.$alu.'</td><td>'.strtoupper($nom).'</td>';
			    while($row = $result->fetch_assoc()) {
			    	  if(empty($row['idAnexo'])) $list .= '<td></td>';
			    	  else $list .= '<td><b style="text-align: center;">X</b></td>';
			        
			    }
			} 
		
		return $list; 
		}
}

?>