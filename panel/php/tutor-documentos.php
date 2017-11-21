<?php
session_start();
ob_start();
include('conexion.php');

// ------------
class subirDocs{
	private $conn;
		
		public function subirArchivo($dequien) {
	 $arch = array();
	 $target_dir = "../docs/";
	 $correctos = false;
	 $tipos = array("pdf", "doc", "docx", "xls", "xlsx", "zip", "rar");
	     
    // Menos de 6 Mb
    for($i = 1; $i <= 5; $i++) {
    		if(isset($_FILES["arch".$i])){
    			$extension = end(explode(".", $_FILES["arch".$i]["name"]));
    			    if (($_FILES["arch".$i]["size"] < 6291456) && in_array($extension, $tipos)){
					      if ($_FILES["arch".$i]["error"] > 0){
					         echo -2;
					         break;
					      }
					      else
					      {
					        $azar = rand(1,999)."_";
					        $target_file = $target_dir . $azar . basename($_FILES["arch".$i]["name"]);
					        array_push($arch, $azar . basename($_FILES["arch".$i]["name"]));
					        move_uploaded_file($_FILES["arch".$i]["tmp_name"], $target_file);
					        chmod($target_file , 0777);
					        $correctos = true;
					      }
					  }
					  else {
					  		echo -2; 
					  		break;
					  }
    		}
    			
		}
		
		if($correctos) {
			switch($dequien) {
				case 'tutor':
				$this->guardarArchivoTutor($arch, $_POST['grupo']);
				break;
			}
			}
}

		public function guardarArchivoTutor($arch, $aquien) {
			$this->conn = new Conexion('../../php/datosServer.php');
			$this->conn = $this->conn->conectar();
			$sql = "";
			foreach($arch as $a){
				$sql .= "CALL guardarArchivo('".$a."', 'tutor', '".$aquien."', '".$_SESSION['tutor']."');";
			}			
						
				if ($this->conn->multi_query($sql) === TRUE) {
				    echo 1;
				} else {
				    echo -2;
				}
			
			$this->conn->close();
		}
}
// ------------------------------------------
class TutorCatalogos extends subirDocs
{
    //Atributos globales. 
    private $conn;

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


    	// ----------- Funcion para consultar catalogo archivos.
    	public function consultarCatalogArc() {
    		$existen = false;
    		$this->conn = new Conexion('../../php/datosServer.php');
			$this->conn = $this->conn->conectar();
			
				   $sql = "CALL verArchTutor('".$_SESSION['tutor']."');"; 
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
                	$info .= '<td>'.$row[1].'</td>';
                	
                		if(strcmp($row[3], 'admin') !== 0) $info .= '<td id="'.$row[0].'"><span id="edit-arch" style="cursor: pointer;" class="label badge error"><i class="fa fa-remove fa-lg"></i></span></td></tr>';
                		else $info .= '<td></td></tr>';
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
    $datos = new TutorCatalogos();
    switch($_COOKIE["subop"])
    {
        case 'care':
            $datos->consultarCatalogCar();
        break;
        case 'grup':
            $datos->consultarCatalogGru();
        break;
        case 'arch':
            $datos->consultarCatalogArc();
        break;
        case 'carg':
            $datos->subirArchivo('tutor');
        break;
    }
}
?>