<?php
session_start();
ob_start();
include('conexion.php');   

class Avisos{
	
	public function guardarAviso() {
		if(isset($_POST['aviso']) && !empty($_POST['aviso'])) {
		$this->conn = new Conexion('../../php/datosServer.php');
		$this->conn = $this->conn->conectar();
		error_reporting(E_ERROR | E_WARNING | E_PARSE);
		$aquien = $_POST['Tutorado'].','.$_POST['Tutor'].','.$_POST['Coordinador'];
		
		$sql = "CALL guardarAviso('".$_POST['aviso']."', '".$aquien."', '');";
			if ($this->conn->query($sql) === TRUE) {
			    echo 1;
			} else {
			    echo 'Error al guardar el aviso, intenta nuevamente..';
			}
			
		$this->conn->close();
		}
		}
		
			public function guardarAvisoTutor() {
		if(isset($_POST['aviso']) && !empty($_POST['aviso'])) {
		$this->conn = new Conexion('../../php/datosServer.php');
		$this->conn = $this->conn->conectar();
		
		$sql = "CALL guardarAvisoTutor('".$_POST['aviso']."', 'Tutorado,,', '".$_POST['grupo']."');";
			if ($this->conn->query($sql) === TRUE) {
			    echo 1;
			} else {
			    echo 'Error al guardar el aviso, intenta nuevamente.';
			}
			
		$this->conn->close();
		}
		}
		
		    	// ----------- Funcion para consultar avisos admin.
    	public function consultarAvisos() {
    		$existen = false;
    		$this->conn = new Conexion('../../php/datosServer.php');
			$this->conn = $this->conn->conectar();
			
				   $sql = "CALL consultarCatalog('avisos');"; 
					$info = '<div class="animated fadeInDown BtnShadow" id="resultados">
					<span class="label warning" style="margin: 8px;"><i class="fa fa-list-alt fa-lg"></i> Avisos</span><br>
						 <div class="form-item">
					        <input data-tipso="Escribe una palabra clave." type="text" id="resultados" placeholder="Filtrar Resultados" class="filterBoxy">
					    </div>				
					<table class="tableLines">
    	  				<tr class="titleTable"><th>Detalles</th>
    	  				<th>Aviso</th>
			   		<th>Eliminar</th>
						</tr><tbody id="resultadoBus">';
	
			
			$result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_array(MYSQLI_NUM)) {               	
                	$quienes = explode(",", $row[2]);
                	$detalles = 'Públicado: '.$row[3].'<br><b>Aviso para: </b><i class="fa fa-volume-up fa-lg"></i><br>';
                	for($i = 0; $i < 3; $i++) if(!empty($quienes[$i])) $detalles .= $quienes[$i].'<br>';
                	if(strcmp($row[4], 'Todos') !== 0) $detalles .= 'Grupo:<br>'.$row[4];

                	$info .= '<tr id="'.$row[0].'"><td class="col-2" style="padding-left: 2%; font-size: 12px;">'.$detalles.'</td>';
                	$info .= '<td class="col-9">'.$row[1].'</td><td class="col-1" id="'.$row[0].'"><span id="elim-aviso" style="cursor: pointer;" class="label badge error"><i class="fa fa-remove fa-lg"></i></span></td></tr>';
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
    		
    				    	// ----------- Funcion para consultar avisos admin.
    	public function consultarAvisosTutor() {
    		$existen = false;
    		$this->conn = new Conexion('../../php/datosServer.php');
			$this->conn = $this->conn->conectar();
			
				   $sql = "CALL consultarAvisosTutor('".$_SESSION['tutor']."');"; 
					$info = '<div class="animated fadeInDown BtnShadow" id="resultados">
					<span class="label warning" style="margin: 8px;"><i class="fa fa-list-alt fa-lg"></i> Avisos</span><br>
						 <div class="form-item">
					        <input data-tipso="Escribe una palabra clave." type="text" id="resultados" placeholder="Filtrar Resultados" class="filterBoxy">
					    </div>				
					<table class="tableLines">
    	  				<tr class="titleTable"><th>Detalles</th>
    	  				<th>Aviso</th>
			   		<th>Eliminar</th>
						</tr><tbody id="resultadoBus">';
	
			
			$result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_array(MYSQLI_NUM)) {               	
                	$quienes = explode(",", $row[2]);
                	$detalles = 'Públicado: '.$row[3].'<br><b>Aviso para: </b><i class="fa fa-volume-up fa-lg"></i><br>';
                	for($i = 0; $i < 3; $i++) if(!empty($quienes[$i])) $detalles .= $quienes[$i].'<br>';
                	if(strcmp($row[4], 'Todos') !== 0) $detalles .= 'Grupo:<br>'.$row[4];

                	$info .= '<tr id="'.$row[0].'"><td class="col-2" style="padding-left: 2%; font-size: 12px;">'.$detalles.'</td>';
                	$info .= '<td class="col-9">'.$row[1].'</td>';
                	if(strcmp($row[5], $_SESSION['tutor']) === 0) $info .= '<td class="col-1" id="'.$row[0].'"><span id="elim-aviso" style="cursor: pointer;" class="label badge error"><i class="fa fa-remove fa-lg"></i></span></td></tr>';
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
    
}

 if(isset($_COOKIE["subop"]))
{
	// Se crea objeto de la clase
    $datos = new Avisos();
    switch($_COOKIE["subop"])
    {
        case 'nuev':
            $datos->guardarAviso();
        break;
        case 'nuev-tuto':
            $datos->guardarAvisoTutor();
        break;
        case 'vera':
        		$datos->consultarAvisos();
        break;
        case 'vera-tuto':
        		$datos->consultarAvisosTutor();
        break;
    }
}
?>