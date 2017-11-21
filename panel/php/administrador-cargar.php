<?php
include('conexion.php');

class GuardarArchivo{
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
				case 'admin':
				$this->guardarArchivoAdmin($arch, 'x');
				break;
				}
			}
}

	public function guardarArchivoAdmin($arch, $aquien) {
			$this->conn = new Conexion('../../php/datosServer.php');
			$this->conn = $this->conn->conectar();
			$sql = "";
			foreach($arch as $a){
				$sql .= "CALL guardarArchivo('".$a."', 'admin', 'x', 'y');";
			}			
						
				if ($this->conn->multi_query($sql) === TRUE) {
				    echo 1;
				} else {
				    echo -2;
				}
			
			$this->conn->close();
		}
		


}

 if(isset($_COOKIE["subop"]))
{
	// Se crea objeto de la clase GenerarCombo
    $datos = new GuardarArchivo();
    switch($_COOKIE["subop"])
    {
    	  case 'arch':
            $datos->subirArchivo('admin');
        break;
    }
}
?>