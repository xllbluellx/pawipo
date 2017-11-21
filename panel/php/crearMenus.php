<?php
class CrearMenus
{
    //Atributos globales. 
    private $host="";
    private $user="";
    private $pw="";
    private $db="";
    private $conn;
    
	public function __construct() {
		include('../../php/datosServer.php');
		$this->host = $ho;
		$this->user = $us;
		$this->pw = $pw;
		$this->db = $db;	
	}    
    
    //--------------- función para conectar
    public function conectar()
    {
       $this -> conn = new mysqli($this->host, $this->user, $this->pw, $this->db);
       $this->conn->set_charset('utf8');
        if (mysqli_connect_error()) {
            die("Error en conexión: " . mysqli_connect_error());
        }    
    }
    
    // ----------------- Crear Menu y submenus
    public function crearMenu() {
    	$menu = array();
    	$menuFinal = "";
    	$this->conectar();
        $sql = "CALL obtenerMenu('".$_COOKIE['tipo']."');";
        $result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
						array_push($menu, $row['menu']);	
                }
            }
            
         $this->conn->next_result();
         $sql = "";
         //Se crea multiple consulta.
         foreach($menu as $men) {
         		$sql .= "CALL obtenerSubMenu('".$_COOKIE['tipo']."', '".$men."');";
         }  
				// ---- Comienza creación de Menu
				$i = 0;
				if (!$this->conn->multi_query($sql)) {
				    echo "Falló la consulta: (" . $this->conn->errno . ") " . $this->conn->error;
				}
				
				do {
					
					$menuFinal .= '<a href="#box-'.$i.'" class="collapse-toggle button green width-100">
					<i class="fa fa-plus-square fa-lg"></i> '.$menu[$i].'</a>
					<div class="collapse-box" id="box-'.$i.'"><ul>';
				    if ($resultado = $this->conn->store_result()) {
				        			while($row = $resultado->fetch_assoc()) {
										$menuFinal .= '<li>'.$row['submenu'].'</li>';	
				                }
				        $resultado->free();
				   $menuFinal .= '</ul></div>';
				   $i++;
				    }
	
				} while ($this->conn->more_results() && $this->conn->next_result());

				echo $menuFinal;
            $this->conn->close();
    	}
 }