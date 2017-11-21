<?php
include('conexion.php');
      $conn = new Conexion('../../php/datosServer.php');
		$conn = $conn->conectar();
		
		$sql = "SELECT idImg, uso FROM imagenes";
		$result = $conn->query($sql);
		$catalog = "";
		$imagenes = 0;
		if ($result->num_rows > 0) {
		    
		    while($row = $result->fetch_assoc()) {
		    	if (preg_match('/img-tad-/',$row['idImg'])) $msj = '<span class="desc"><b>Tipo:</b> Logo TADDI</span>';
		    	if (preg_match('/img-tec-/',$row['idImg'])) $msj = '<span class="desc"><b>Tipo:</b> Logo Tecnológico</span>';
		    	if (preg_match('/img-sep-/',$row['idImg'])) $msj = '<span class="desc"><b>Tipo:</b> Logo SEP</span>';
		        if($imagenes == 0) {
		        	$catalog .= '<div class="row blocks imgRow">
		        	<div id="imagen" class="col col-3 imgBorder show-image"><img  id="'.$row['idImg'].'" src="../../img/'.$row['idImg'].'" />'.$msj.'
		        	<span class="label success button1 animated fadeInUp"><a id="elegir"><i class="fa fa-check" aria-hidden="true"></i> Elegir</a></span>
					<span class="label error button2 animated fadeInUp"><a id="eliminar"><i class="fa fa-remove" aria-hidden="true"></i> Eliminar</a></span>  
		        	</div>';
			        $imagenes++;
			        continue;
		        }
		        if($imagenes == 1 || $imagenes == 2) {
		        	$catalog .= '<div id="imagen" class="col col-3 imgBorder show-image"><img  id="'.$row['idImg'].'" src="../../img/'.$row['idImg'].'" />'.$msj.'
					<span class="label success button1 animated fadeInUp"><a id="elegir"><i class="fa fa-check" aria-hidden="true"></i> Elegir</a></span>
					<span class="label error button2 animated fadeInUp"><a id="eliminar"><i class="fa fa-remove" aria-hidden="true"></i> Eliminar</a></span>        	
		        	</div>';
			        	$imagenes++;
			         continue;
		        }
		        if($imagenes == 3) {
		        	$imagenes = 0;
		        	$catalog .= '
		        	<div id="imagen" class="col col-3 imgBorder show-image"><img  id="'.$row['idImg'].'" src="../../img/'.$row['idImg'].'" />'.$msj.'
		        	<span class="label success button1 animated fadeInUp"><a id="elegir"><i class="fa fa-check" aria-hidden="true"></i> Elegir</a></span>
					<span class="label error button2 animated fadeInUp"><a id="eliminar"><i class="fa fa-remove" aria-hidden="true"></i> Eliminar</a></span>  
		        	</div></div>';
		        }
		    }
		    if($imagenes != 0) { $catalog .= '</div>';}
		} else {
		    echo "No existen imágenes aún...";
		}
$conn->close();
?>
<div id="catalogos-imag" class="animated fadeInDown">
<div class="titulos">Catálogo de imágenes disponibles. <span class="desc" style="color: #f34248;">Selecciona o elimina imágenes</span></div>
	<?php echo $catalog; ?>
</div>
