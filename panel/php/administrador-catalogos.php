<?php
include('conexion.php');

// ------------ Clase que edita los catalogos
class editCatalogo{
	private $conn;
	
	// ------------------- Editar carr
	public function editarCar() {
		$this->conn = new Conexion('../../php/datosServer.php');
		$this->conn = $this->conn->conectar();
		
		if ($this->conn->query("CALL actualizarCar('".$_POST['idCarrera']."', '".$_POST['carrera']."');") === TRUE) {
		    echo 2;
		} else {
		    echo -1;
		}		
		
		$this->conn->close();
		}
		
		// ------------------- eliminar archivo
	public function eliminarArch() {
		$this->conn = new Conexion('../../php/datosServer.php');
		$this->conn = $this->conn->conectar();
		
		if ($this->conn->query("DELETE FROM documentos WHERE documentos.id = ".$_POST['id']) === TRUE) {
			 unlink('../docs/'.$_POST['archivo']);
		    echo 1;
		} else {
		    echo "Error";
		}		
		
		$this->conn->close();
		}
				// ------------------- eliminar archivo
	public function eliminarAviso() {
		$this->conn = new Conexion('../../php/datosServer.php');
		$this->conn = $this->conn->conectar();
		
		if ($this->conn->query("DELETE FROM avisos WHERE avisos.idAviso = ".$_POST['id']) === TRUE) {
		    echo 1;
		} else {
		    echo "Error";
		}		
		
		$this->conn->close();
		}
		
					// ------------------- Se edita grupo
		public function editarGrup() {
		$this->conn = new Conexion('../../php/datosServer.php');
		$this->conn = $this->conn->conectar();
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
		
		$sql = "CALL actualizarGrupo('".$idCarrera."', '".trim($_POST['nom-gru'])."',
    		 '".strtoupper(trim($_POST['salon']))."', '".$_POST['hora']."', '".$_POST['carrera']."',
    		 '".$_POST['periodo']."', '".$_POST['tutor']."', '".$_COOKIE['info']."');";
		if ($this->conn->query($sql) === TRUE) {
		    echo 2;
		} else {
		    echo -1;
		}		
		
		$this->conn->close();
		}

}
// ------------------------------------------
class AdminCatalogos extends editCatalogo
{
    //Atributos globales. 
    private $conn;
 
    	// ----------- Funcion para consultar catalogo carreras.
    	public function consultarCatalogCar() {
    		$existen = false;
    		$this->conn = new Conexion('../../php/datosServer.php');
			$this->conn = $this->conn->conectar();
			
				   $sql = "CALL consultarCatalog('carreras');"; 
					$info = '<div class="animated fadeInDown BtnShadow" id="resultados">
					<span class="label warning" style="margin: 8px;"><i class="fa fa-list-alt fa-lg"></i> Catálogo de Carreras</span><br>
						 <div class="form-item">
					        <input data-tipso="Escribe una palabra clave." type="text" id="resultados" placeholder="Filtrar Resultados" class="filterBoxy">
					    </div>				
					<table class="flat tableLines">
    	  				
    	  				<tr class="titleTable"><th>Cve-Carrera</th>
			   	<th>Carrera</th><th>Editar</th></tr><tbody id="resultadoBus">';
	
			
			$result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_array(MYSQLI_NUM)) {
                	$info .= '<tr><td style="color: #400101;">'.$row[0].'</td>'.'<td>'.$row[1].'</td><td><span id="row-carrera" style="cursor: pointer;" class="label badge success"><i class="fa fa-pencil fa-lg"></i></span></td></tr>';
                	}
                	$info .= '</tbody></table></div>
                	<div  class="row centered">
						    <div  class="col col-5">
								<form id="editar-carrera" class="form">
								
								</div>						    
						    </div>
						</div>';
                	
                	$info .= '
							<script type="text/javascript" src="../js/table-filter.js"></script>                	
                	';
                $existen = true;
            }
            
            if($existen == true) {
            		echo $info;
            	}else echo -1;
            $this->conn->close();
    		}
    			// ----------- Funcion para consultar catalogo grupos.
    	public function consultarCatalogGru() {
    		$existen = false;
    		$this->conn = new Conexion('../../php/datosServer.php');
			$this->conn = $this->conn->conectar();
			
				   $sql = "CALL consultarCatalog('grupos');"; 
					$info = '<div class="animated fadeInDown BtnShadow" id="resultados">
					<span class="label warning" style="margin: 8px;"><i class="fa fa-list-alt fa-lg"></i> Catálogo de Grupos</span><br>
						 <div class="form-item">
					        <input data-tipso="Escribe una palabra clave." type="text" id="resultados" placeholder="Filtrar Resultados" class="filterBoxy">
					    </div>				
					<table class="flat tableLines">
    	  				<tr class="titleTable"><th>ID Grupo</th>
			   		<th>Nombre</th>
			   		<th>Salón</th>
						<th>Hora</th>
						<th>Periodo</th>
						<th>Carrera</th>
						<th>Tutor</th>
						<th>Editar</th></tr><tbody id="resultadoBus">';
	
			
			$result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_array(MYSQLI_NUM)) {
                	$info .= '<tr><td style="color: #400101;">'.$row[0].'</td>'.
                	'<td>'.$row[1].'</td>'.
                	'<td>'.$row[2].'</td>'.
                	'<td>'.$row[3].'</td>'.
                	'<td>'.$row[4].'</td>'.
                	'<td>'.$row[5].'</td>';
                	
                	if(empty($row[6])) {
                		$info .= '<td><span class="label error">Sin Tutor</span></td>';
                		}else{
							$info .= '<td><b>'.$row[6].' '.$row[7].' '.$row[8].'</b></td>';
						}
						$info .= '<td id="'.$row[0].'"><span id="edit-grup" style="cursor: pointer;" class="label  warning"><i class="fa fa-gear fa-lg"></i></span></td></tr>';
                	}
                	$info .= '</tbody></table></div>';
                	
                	$info .= '
							<script type="text/javascript" src="../js/table-filter.js"></script>                	
                	';
                $existen = true;
            }
            
            if($existen == true) {
            		echo $info;
            	}else echo -1;
            $this->conn->close();
    		}

					// ----------- Funcion para consultar catalogo tutores.
    	public function consultarCatalogTut() {
    		$existen = false;
    		$this->conn = new Conexion('../../php/datosServer.php');
			$this->conn = $this->conn->conectar();
			
				   $sql = "CALL consultarCatalog('tutores');"; 
					$info = '<div class="animated fadeInDown BtnShadow" id="resultados">
					<span class="label warning" style="margin: 8px;"><i class="fa fa-list-alt fa-lg"></i> Catálogo de Tutores</span><br>
						 <div class="form-item">
					        <input data-tipso="Escribe una palabra clave." type="text" id="resultados" placeholder="Filtrar Resultados" class="filterBoxy">
					    </div>				
					<table class="flat tableLines">
    	  				<tr class="titleTable"><th>RFC</th>
			   		<th>Nombre</th>
			   		<th>Activo</th>
						<th>Correo</th>
						<th>Carrera</th></tr><tbody id="resultadoBus">';
	
			
			$result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_array(MYSQLI_NUM)) {
                	$info .= '<tr><td style="color: #400101;">'.$row[0].'</td>'.
                		'<td><b>'.$row[1].' '.$row[2].' '.$row[3].'</b></td>';
                	$info .= ($row[4] == 1 ? '<td><span class="label success">SI</span></td>' : '<td><span class="label error">NO</span></td>');
                	$info .= '<td>'.$row[5].'</td>'.'<td>'.$row[6].'</td></tr>';
                	}
                	$info .= '</tbody></table></div>';
                	
                	$info .= '
							<script type="text/javascript" src="../js/table-filter.js"></script>                	
                	';
                $existen = true;
            }
            
            if($existen == true) {
            		echo $info;
            	}else echo -1;
            $this->conn->close();
    		}
    							// ----------- Funcion para consultar catalogo coordinadores.
    	public function consultarCatalogCor() {
    		$existen = false;
    		$this->conn = new Conexion('../../php/datosServer.php');
			$this->conn = $this->conn->conectar();
			
				   $sql = "CALL consultarCatalog('coordinadores');"; 
					$info = '<div class="animated fadeInDown BtnShadow" id="resultados">
					<span class="label warning" style="margin: 8px;"><i class="fa fa-list-alt fa-lg"></i> Catálogo de Coordinadores</span><br>
						 <div class="form-item">
					        <input data-tipso="Escribe una palabra clave." type="text" id="resultados" placeholder="Filtrar Resultados" class="filterBoxy">
					    </div>				
					<table class="flat tableLines">
    	  				<tr class="titleTable"><th>RFC</th>
			   		<th>Nombre</th>
			   		<th>Activo</th>
						<th>Correo</th>
						<th>Carrera</th></tr><tbody id="resultadoBus">';
	
			
			$result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_array(MYSQLI_NUM)) {
                	$info .= '<tr><td style="color: #400101;">'.$row[0].'</td>'.
                		'<td><b>'.$row[1].' '.$row[2].' '.$row[3].'</b></td>';
                	$info .= ($row[4] == 1 ? '<td><span class="label success">SI</span></td>' : '<td><span class="label error">NO</span></td>');
                	$info .= '<td>'.$row[5].'</td>'.'<td>'.$row[6].'</td></tr>';
                	}
                	$info .= '</tbody></table></div>';
                	
                	$info .= '
							<script type="text/javascript" src="../js/table-filter.js"></script>                	
                	';
                $existen = true;
            }
            
            if($existen == true) {
            		echo $info;
            	}else echo -1;
            $this->conn->close();
    		}
    	// ----------- Funcion para consultar catalogo archivos.
    	public function consultarCatalogArc() {
    		$existen = false;
    		$this->conn = new Conexion('../../php/datosServer.php');
			$this->conn = $this->conn->conectar();
			
				   $sql = "CALL consultarCatalog('archivos');"; 
					$info = '<div class="animated fadeInDown BtnShadow" id="resultados">
					<span class="label warning" style="margin: 8px;"><i class="fa fa-list-alt fa-lg"></i> Catálogo de Archivos</span><br>
						 <div class="form-item">
					        <input data-tipso="Escribe una palabra clave." type="text" id="resultados" placeholder="Filtrar Resultados" class="filterBoxy">
					    </div>				
					<table class="flat tableLines">
    	  				<tr class="titleTable"><th>Archivo</th>
    	  				<th>Fecha</th>
			   		<th>Eliminar</th>
						</tr><tbody id="resultadoBus">';
	
			
			$result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_array(MYSQLI_NUM)) {
						if (preg_match('/.doc/',$row[0]) || preg_match('/.docx/',$row[0])) $arch = '<i class="fa fa-file-word-o fa-lg"></i> '.$row[0];
						if (preg_match('/.xls/',$row[0]) || preg_match('/.xlsx/',$row[0])) $arch = '<i class="fa fa-file-excel-o fa-lg"></i> '.$row[0]; 
						if (preg_match('/.pdf/',$row[0]) || preg_match('/.PDF/',$row[0])) $arch = '<i class="fa fa-file-pdf-o fa-lg"></i> '.$row[0];                 	
                	
                	$info .= '<tr id="'.$row[2].'"><td><a class="enlaces" href="../docs/'.$row[0].'" target="_blank">'.$arch.'</a></td>';
                	$info .= '<td>'.$row[1].'</td><td id="'.$row[0].'"><span id="edit-arch" style="cursor: pointer;" class="label badge error"><i class="fa fa-remove fa-lg"></i></span></td></tr>';
                	}
                	$info .= '</tbody></table></div>';
                	
                	$info .= '
							<script type="text/javascript" src="../js/table-filter.js"></script>                	
                	';
                $existen = true;
            }
            
            if($existen == true) {
            		echo $info;
            	}else echo -1;
            $this->conn->close();
    		}
    		
    		public function consultarEvaluaciones() {
    			$existen = false;
	    		$this->conn = new Conexion('../../php/datosServer.php');
				$this->conn = $this->conn->conectar();
				
				$listado = '<table class="tableLines-tutor anexosBox animated fadeIn"><tr class="titleTable"><td>Grupo</td><td>Tutor</td><td width="10%">Evaluación</td></tr>';
				$sql = "CALL evalTutores('".$_POST['dato1']."','%".$_POST['dato2']."%');";	
				
				$result = $this->conn->query($sql);
				if ($result->num_rows > 0) {
					$existen = true;
					    while($row = $result->fetch_assoc()) {
					    	  $listado .= '<tr>';
					        $listado .= '<td><b style="color: #400101;">'.$row['idGrupo'].'</b></td>'.'<td>'.$row['nom'].'</td>'.'<td id="'.$row['idGrupo'].'"><span id="msj" data-tipso="Generar PDF" class="success" style="cursor: pointer;"><i class="fa fa-bar-chart fa-2x"></i></span></td>';
					        $listado .= '</tr>';
					    }
					}
				$listado .= "</table><script type='text/javascript'>
							$('div#tablas').find('span#msj').tipso({
								  showArrow: true,
								  position: 'right',
								  background: 'rgba(0, 0, 0, 0.5)',
								  color: '#eee',
								  useTitle: false,
								  animationIn: 'bounceIn',
								  animationOut: 'bounceOut',
								  size: 'small'
							});</script>";
				if($existen) {
					echo $listado;
				}else echo -1;
    			$this->conn->close();
    			}
    		/**********************************************************
    			La funcion para mostrar catologo de imagenes se ha preferido crear un archivo
    			especial para mostrar las imágenes nombrado: catalogos-imag.php
    		*/
}



/* ---------------------------------------
------- Aquí se crea switcheo para tipo de combo mediante cookie.
------- El nombre de la cookie: subop
------------------------------------------ */ 
 if(isset($_COOKIE["subop"]))
{
	// Se crea objeto de la clase
    $datos = new AdminCatalogos();
    switch($_COOKIE["subop"])
    {
        case 'care':
            $datos->consultarCatalogCar();
        break;
        case 'grup':
            $datos->consultarCatalogGru();
        break;
        case 'tuto':
            $datos->consultarCatalogTut();
        break;
        case 'eval':
            $datos->consultarEvaluaciones();
        break;
		  case 'coor':
            $datos->consultarCatalogCor();
        break;
        case 'arch':
            $datos->consultarCatalogArc();
        break;
        case 'edit-care':
        		$datos->editarCar();
        break;
        case 'edit-grup':
			$datos->editarGrup();
		  break;
		  case 'elim-arch':
			$datos->eliminarArch();
		  break;
		  case 'elim-avis':
			$datos->eliminarAviso();
		  break;
    }
}
?>