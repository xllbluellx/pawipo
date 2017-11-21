<?php
if(!isset($_SESSION['alumno'])) include('conexion.php');
class MostrarAvisos{
			    	// ----------- Funcion para consultar avisos admin.
    	public function consultarAvisosTutor() {
    		$existen = false;
    		$this->conn = new Conexion('../../php/datosServer.php');
			$this->conn = $this->conn->conectar();
			
				   $sql = "CALL consultarCatalog('avisos-tutor');"; 
					$info = '<div class="animated fadeInDown BtnShadow" id="resultados">
						 <div class="form-item">
					       <!-- <input data-tipso="Escribe una palabra clave." type="text" id="resultados" placeholder="Filtrar Resultados" class="filterBoxy"> -->
					    </div>				
					<table class="tableLines">
    	  				<tr class="titleTable">
    	  				<th style="text-align: center;"><i class="fa fa-warning fa-lg"></i> Avisos <i class="fa fa-warning fa-lg"></i></th>
						</tr><tbody id="resultadoBus">';
	
			
			$result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_array(MYSQLI_NUM)) {               	
                	$quienes = explode(",", $row[2]);
                	$detalles = '<span" style="text-align: left; font-size: 12px; color: #3c74d9;">Públicado: '.$row[3].' | <b>Aviso para: </b>Tutores</span>';
                	$info .= '<td style="padding-left: 2%;" class="col-10"><span class="label warning"><i class="fa fa-volume-up fa-lg"></i></span><br>'.$row[1].'<br>'.$detalles.'</td></tr>';
                	}
                	$info .= '</tbody></table></div>';
                	
                	$info .= '
							<script type="text/javascript" src="../js/table-filter.js"></script>                	
                	';
                $existen = true;
            }
            
            if($existen == true) {
            		echo $info;
            	}else echo "";
            $this->conn->close();
    		}
    		
    		public function consultarAvisosTutorados() {
    		$existen = false;
    		$this->conn = new Conexion('../../php/datosServer.php');
			$this->conn = $this->conn->conectar();
			
				   $sql = "CALL consultarAvisosTutorado(".$_SESSION['alumno'].");"; 
					$info = '<div class="animated fadeInDown BtnShadow" id="resultados">
						 <div class="form-item">
					       <!-- <input data-tipso="Escribe una palabra clave." type="text" id="resultados" placeholder="Filtrar Resultados" class="filterBoxy"> -->
					    </div>				
					<table class="tableLines">
    	  				<tr class="titleTable">
    	  				<th style="text-align: center;"><i class="fa fa-warning fa-lg"></i> Avisos <i class="fa fa-warning fa-lg"></i></th>
						</tr><tbody id="resultadoBus">';
	
			
			$result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_array(MYSQLI_NUM)) {               	
                	$quienes = explode(",", $row[2]);
                	$detalles = '<span" style="text-align: left; font-size: 12px; color: #3c74d9;">Públicado: '.$row[3].' | <b>Aviso para: </b>Tutorados</span>';
                	$info .= '<td style="padding-left: 2%;" class="col-10"><span class="label warning"><i class="fa fa-volume-up fa-lg"></i></span><br>'.$row[1].'<br>'.$detalles.'</td></tr>';
                	}
                	$info .= '</tbody></table></div>';
                	
                	$info .= '
							<script type="text/javascript" src="../js/table-filter.js"></script>                	
                	';
                $existen = true;
            }
            
            if($existen == true) {
            		echo $info;
            	}else echo "";
            $this->conn->close();
    		}
}
?>