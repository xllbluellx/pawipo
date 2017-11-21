<?php
session_start();
ob_start();

class Login
{
    //Atributos globales. 
    private $host="";
    private $user="";
    private $pw="";
    private $db="";
    private $conn;
    
	public function __construct() {
		include('datosServer.php');
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
    
 //--------------- Verificar y crear sesión de Administrador
    public function crearSesionAdmin($usuario, $pass)
    {
        $encontrado = false;
        $this->conectar();
        $sql = "CALL loginAdmin('".$usuario."')";
        $result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    if (hash_equals($row["pass"], crypt($pass, $row["pass"])) && strcmp($row["nick"], $usuario) == 0)
                    {
                        $_SESSION['admin'] = $row["nick"];
                        $encontrado = true;
                        break;
                    }
                }
            } else {
                echo -1;
            }
            
            $this->conn->close();
            if($encontrado)
            {
                echo 1;
            }else echo -1;
    
    }
     //--------------- Verificar y crear sesión de tutor
    public function crearSesionTutor($usuario, $pass)
    {
        $encontrado = false;
        $this->conectar();
        $sql = "CALL loginTutor('".$usuario."')";
        $result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    if (hash_equals($row["pass"], crypt($pass, $row["pass"])) && strcmp($row["rfc"], $usuario) == 0)
                    {                    		
                    		setcookie('quien', $row['nombre'], 0, "/");
                        $_SESSION['tutor'] = $row["rfc"];
                        $encontrado = true;
                        break;
                    }
                }
            } else {
                echo -1;
            }
            
            $this->conn->close();
            if($encontrado)
            {
                echo 1;
            }else echo -1;
    
    }
    
         //--------------- Verificar y crear sesión de coordonador
    public function crearSesionCoord($usuario, $pass)
    {
        $encontrado = false;
        $this->conectar();
        $sql = "CALL loginCoordinador('".$usuario."')";
        $result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    if (hash_equals($row["pass"], crypt($pass, $row["pass"])) && strcmp($row["rfc"], $usuario) == 0)
                    {
                    		setcookie('quien', $row['nombre'], 0, "/");
                        $_SESSION['coordinador'] = $row["rfc"];
                        $encontrado = true;
                        break;
                    }
                }
            } else {
                echo -1;
            }
            
            $this->conn->close();
            if($encontrado)
            {
                echo 1;
            }else echo -1;
    
    }
     //--------------- Verificar y crear sesión de Tutorados
    public function crearSesionTutorados($usuario, $pass)
    {
        $encontrado = false;
        $activo = 0;
        $this->conectar();
        $sql = "CALL loginTutorados('".$usuario."')";
        $result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    if (hash_equals($row["pass"], crypt($pass, $row["pass"])) && strcmp($row["idAlumno"], $usuario) == 0)
                    {
                    		setcookie('quien', $row['nombre'], 0, "/");
                    		setcookie('info', $row['nombre'], 0, "/");
                        $_SESSION['alumno'] = $row["idAlumno"];
                        $encontrado = true;
                        $activo = $row['activo'];
                        break;
                    }
                }
            } else {
                echo -1;
            }
            
            $this->conn->close();
            if($encontrado)
            {
            	//Es -2 en caso de existir en la BD, pero no esté activo.
            	if($activo == 0) echo -2;
                else echo 1;
            }else echo -1;
    
    }
    
    public function registrarAlum() {
    		$this->conectar();
			if($this->verificaAlum()) {
				echo -3;
			}else{
				$this->conn->next_result();
				error_reporting(E_ERROR | E_WARNING | E_PARSE);
				$pass = crypt($_POST['pass1']);
				
				$sql = "CALL guardarNvoAlum(".$_POST['noc'].",'".$pass."','".$_POST['email']."','".$_POST['nombre']."','".$_POST['apep']."','".$_POST['apem']."','".$_POST['grupo']."','".$_POST['carrera']."');";
				if ($this->conn->query($sql) === TRUE) {
					setcookie('info', $_POST['nombre'], 0, "/");
					setcookie('tipo', 'tutorados', 0, "/");
					$_SESSION['alumno'] = $_POST['noc'];
					echo 2;
				} else {
				    echo -1;
			}
			}    		
    		$this->conn->close();
    	}
    	
    public function verificaAlum() {
					$result = $this->conn->query('CALL verificaAlum('.$_POST['noc'].');');
            	return ($result->num_rows > 0 ? true : false);
				}
				
	 public function getRealIP()
		{
		    if (isset($_SERVER["HTTP_CLIENT_IP"]))
		    {
		        return $_SERVER["HTTP_CLIENT_IP"];
		    }
		    elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
		    {
		        return $_SERVER["HTTP_X_FORWARDED_FOR"];
		    }
		    elseif (isset($_SERVER["HTTP_X_FORWARDED"]))
		    {
		        return $_SERVER["HTTP_X_FORWARDED"];
		    }
		    elseif (isset($_SERVER["HTTP_FORWARDED_FOR"]))
		    {
		        return $_SERVER["HTTP_FORWARDED_FOR"];
		    }
		    elseif (isset($_SERVER["HTTP_FORWARDED"]))
		    {
		        return $_SERVER["HTTP_FORWARDED"];
		    }
		    else
		    {
		        return $_SERVER["REMOTE_ADDR"];
		    }
		}
 }

/* ---------------------------------------
------- Aquí se crea switcheo para tipo de logeo mediante cookie.
------- El nombre de la cookie: tipo / se crea en js/scripts.js
------------------------------------------ */ 
 if(isset($_COOKIE["tipo"]))
{
	// Se crea objeto de la clase Login
    $usuario = new Login();
    switch($_COOKIE["tipo"])
    {
        case 'administrador':
            $usuario->crearSesionAdmin($_POST["user"], $_POST["pass"]);
        break;
        case 'tutorados':
            $usuario->crearSesionTutorados($_POST["user"], $_POST["pass"]);
        break;
        case 'tutor':
            $usuario->crearSesionTutor($_POST["user"], $_POST["pass"]);
        break;
        case 'coordinadores':
            $usuario->crearSesionCoord($_POST["user"], $_POST["pass"]);
        break;
		  case 'registro':
            $usuario->registrarAlum();
        break;
    }
}
 ?>