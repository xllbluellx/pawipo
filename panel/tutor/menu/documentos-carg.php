<!-- Modal -->
<div class="row centered">
	<div class="col col-6">
		<div id="modal-altas-care" class="animated bounceInRight">
		    <div class="modal" style="border: 1px solid #DDD;">
		        <div class="modal-header gradient">Subir Documentos<br><span class="label tag error">Archivos permitidos: Word, Excel, PDF, ZIP o RAR</span></div>
		        <div class="modal-body">
		        	  <div class="row">
							<div class="col">Archivos: <span id="cuantos">1</span><br><span class="label tag error">Máximo 6 mb</span></div>
							<div class="col"></div>	
							<div class="col"><button id="add-file" type="button" class="width-100"><i class="fa fa-plus-square fa-lg"></i></button></div>				        
			        </div><br>
			        <form class="form" id="modal-altas-care">
			        <div class="form-item">
								    <label>Grupo</label>
								        <select class="select" id="grupo" name="grupo">
								            <?php
								            session_start();
													include('../../php/generarCombos.php');
													$combo = new GenerarCombos('../../../php/datosServer.php');
													$combo->generarComboGruposTutor($_SESSION['tutor']);
												?>	
								        </select>
						</div>
						    <div class="form-item" id="botones">
						        <label id="arch1" class="archivo width-50"><i class="fa fa-cloud-upload fa-lg"></i> Cargar archivo</label>
						        <input  type="file" class="inputArchivo" id="arch1" name="arch1" class="width-100">
						        <div class="nomArch" id="arch1"></div>
						    </div>
						    
						    <div class="row" >
								    	<div class="col col-7">
								    		<div class="form-item">
										    <button type="submit" class="button aceptar width-100" id="guardar-arch">Guardar <i class="fa fa-check fa-lg"></i></button>
										    </div>
								    	</div>
										<div class="col">
										    <div class="form-item">
										    <button class="button oscuro width-100" id="cancel"><i class="fa fa-ban fa-lg"></i> Cancelar</button>
										    </div>
								    	</div>
							</div>
						    <script type="text/javascript">
						    	$(document).ready(function () {
										$('form#modal-altas-care').on("click", 'span#elimina' , function () {
											$(this).closest('div').remove();
											var cuantos = parseInt($('div#modal-altas-care').find('span#cuantos').text()) - 1;
											$('div#modal-altas-care').find('span#cuantos').text(cuantos);
									    });						    		
						    		
										$('form#modal-altas-care').on("click", 'label.archivo' , function () {
											var cual = $(this).attr('id');
									        $('form#modal-altas-care').find('input#'+cual).click();
									    });
									   
										$('button#add-file').on('click', function () {;
											var cuantos = parseInt($('div#modal-altas-care').find('span#cuantos').text()) + 1;
											if (cuantos <= 5) {
												$('div#modal-altas-care').find('span#cuantos').text(cuantos);
												var nvoarch = '<div class="form-item animated fadeIn"><span id="elimina" style="float: right; cursor: pointer;" class="label badge error">Eliminar</span><label id="arch'+cuantos+'" class="archivo width-50"><i class="fa fa-cloud-upload fa-lg"></i> Cargar archivo</label><input  type="file" class="inputArchivo" id="arch'+cuantos+'" name="arch'+cuantos+'"><div class="nomArch" id="arch'+cuantos+'"></div></div>';
												$('form#modal-altas-care').find('div#botones').after(nvoarch);
											}
											else {
												alertify.error('Máximo 5 archivos...');
											}
										});									   
									   
									   $('form#modal-altas-care').on('change', 'input', function () {
									   	var cual = $(this).attr('id');
									   	if(this.files[0].size > 6291456){
									   		$(this).val('');
												alertify.error('<i class="fa fa-warning"></i> El archivo sobrepasa los 6 Mb.');									   	
									   	}else{
												$('form#modal-altas-care').find('div#'+cual).text("Nombre: "+$(this).val().split('\\').pop());
												}
									   });
						    	});
						    </script>
						</form>
		        </div>
		    </div>
		</div>
</div>
</div>