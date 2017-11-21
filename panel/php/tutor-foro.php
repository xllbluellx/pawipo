<?php
session_start();
ob_start();
include('conexion.php');   

class Temas{
	
	public function guardarTema() {
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
		
			public function guardarRespuesta() {
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
                        <a class=" tema collapse-toggle button">'.$tema.'</td>';
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
    	public function consultarTema() {
    		$existen = false;
    		$this->conn = new Conexion('../../php/datosServer.php');
			$this->conn = $this->conn->conectar();
			
				   $sql = "CALL consultarRespuestasTema('".$_POST['dato1']."')";
					$info = '<div class="animated fadeInDown BtnShadow" id="resultado-temas">
                    <span class="label warning" style="margin: 8px;"><i class="fa fa-list-alt fa-lg"></i> Temas del foro</span><br>
                         <div class="form-item">
                            <input data-tipso="Escribe una palabra clave." type="text" id="resultados" placeholder="Filtrar Resultados" class="filterBoxy">
                        </div>              
                    <table class="tableLines">
                    <tr class="titleTable">
                        <th>Comentario</th>
                        <th>Autor</th>
                        <th>Fecha</th>
                    </tr><tbody id="resultadoBus">';
				
			$result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_array(MYSQLI_NUM)) {                
                    $autor = $row[2];
                    $coment =  $row[1];
                    $fecha = $row[3];                   

                    $info .= '<tr id="'.$row[0].'">
                        <td class="col-2" style="padding-left: 2%; font-size: 12px;">
                        <a class=" tema collapse-toggle button">'.$coment.'</td>';
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
        		$datos->consultarTema();
        break;
    }
}
?>