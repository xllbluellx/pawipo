<?php
session_start();
ob_start();
include('conexion.php');   

class Temas{
	
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
		
		    	// ----------- Funcion para consultar la lista de temas.
    	public function consultarTemaForo() {
    		$existen = false;
    		$this->conn = new Conexion('../../php/datosServer.php');
			$this->conn = $this->conn->conectar();
			
				   $sql = "CALL consultarTemaForo();"; 
					$info = '<div class="animated fadeInDown BtnShadow" id="resultado-temas">
					<span class="label warning" style="margin: 8px;"><i class="fa fa-list-alt fa-lg"></i> Temas del foro</span><br>
						 <div class="form-item">
					        <input data-tipso="Escribe una palabra clave." type="text" id="resultados" placeholder="Filtrar Resultados" class="filterBoxy">
					    </div>				
					<table class="tableLines">
    	  			<tr class="titleTable">
                        <th>Tema</th>
    	  				<th>Autor</th>
			   		    <th>Fecha</th>
					</tr><tbody id="resultadoBus">';
	
			
			$result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_array(MYSQLI_NUM)) {               	
                	$autor = $row[2];
                    $tema =  $row[1];
                    $fecha = $row[3];                	

                	$info .= '<tr id="'.$row[0].'">
                        <td class="col-2" style="padding-left: 2%; font-size: 12px;">
                        <a class="tema collapse-toggle button" data-tema="'.$tema.'">'.$tema.'</td>';
                    $info .= '<td class="col-2" style="padding-left: 2%; font-size: 12px;">'.$autor.'</td>';
                    $info .= '<td class="col-2" style="padding-left: 2%; font-size: 12px;">'.$fecha.'</td>';
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

    	// ----------- Funcion para consultar un tema en especifico.
    	public function consultarRespuestas() {

    		$this->conn = new Conexion('../../php/datosServer.php');
			$this->conn = $this->conn->conectar();
			
				   $sql = "CALL consultarRespuestasTema(".$_POST['dato'].")";//llamar al procedure que regresara los comentarios del tema seleccionado 

				   //estructura para mostrar el tema o info general del tema al cual despues se concatenara las respuestas
				   //Se utiliza la variable btnEliminar del metodo consultarInfo para guardar el tema y asi no crear otra function
					$info = '<div class="animated fadeInDown BtnShadow" id="resultado-respuestas-tema">
								<span class="label warning" style="margin: 8px;"><i class="fa fa-list-alt fa-lg"></i> Respuestas a tema</span><button id="back-forum" style="float: right;" class="button oscuro">Volver</button><br><div style="clear:both; margin-bottom:10px;"></div>
							<div class="titleTable" style="padding: 8px;">
								<p style="margin-bottom: 0;">'.strtoupper($_POST['btnEliminar']).'</p>
							</div>
							<div style="padding: 8px;">';
	
			
			$result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_array(MYSQLI_NUM)) {               	
                	/*
                	Escribir todo el codigo de como quieres mostrar las respuestas del tema	
                	*/	
                	$info .= '<div class="row gutters" style="margin-bottom:10px;"><div class="col col-4">
                				<p style="margin-bottom: 0;">'.$row[2].' </p><p style="line-height: 0.8"><small>'.$row[3].'</small></p>
                			</div>';

                	$info .= '<div class="col col-8 forum-response">
                				<p style="margin-bottom: 0;">'.$row[4].'</p></div></div>';

            }
            // if($existen == true) {
            // 		echo $info;
            // 	}else echo -1;
    		}else{

            	$info .= '<div class="row" style="margin-bottom:10px;"><div class="col col-12">
                				<p style="margin-bottom: 0;">Sin respuestas aún.</p>
                			</div>';
            }
                $info .= "</div>";

                echo $info;
            
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
    $datos = new Temas();
    switch($_COOKIE["subop"])
    {
        case 'nuevt':
            $datos->guardarTema();
        break;
        case 'vert':
        		$datos->consultarTemaForo();
        break;
        case 'ver-tema':
        		$datos->consultarRespuestas();
        break;
    }
}
?>