<!-- Modal -->
<div class="row centered" >
	<div class="col col-10">
		<div id="modal-cargar-imagen" class="animated bounceInRight">
		    <div class="modal"  style="border: 1px solid #DDD;">
		        <div class="modal-header gradient">Cargar Imágenes<br><span class="label tag error">En esta sección se cargan únicamente imágenes</span></div>
		        <div class="modal-body">
			        <form class="form" id="modal-cargar-imagen">
						    
						    <div class="row">
								    	<div class="col">
								    		<div id="msj" data-tipso="Cargar una nueva imagen del logo SEP" class="form-item">
										    <button  type="submit" class="button oscuro outline width-100" id="img-sep-"><i class="fa fa-file-image-o fa-lg"></i> Logo SEP</button>
										    </div>
								    	</div>
										<div class="col">
										    <div id="msj" data-tipso="Cargar una nueva imagen para usar como logo de TADII" class="form-item">
										    <button  class="button oscuro outline width-100" id="img-tad-"><i class="fa fa-image fa-lg"></i> Logo TADII</button>
										    </div>
								    	</div>
								    	<div class="col">
										    <div id="msj" data-tipso="Cargar una nueva imagen del logo Tecnológico" class="form-item">
										    <button  class="button oscuro outline width-100" id="img-tec-"><i class="fa fa-university fa-lg"></i> Logo Tecnológico</button>
										    </div>
								    	</div>
							</div>
						    <script type="text/javascript">
						    	$(document).ready(function () {
						    			$("div#msj").tipso({
											  showArrow: true,
											  position: 'bottom',
											  background: 'rgba(0, 0, 0, 0.5)',
											  color: '#eee',
											  useTitle: false,
											  animationIn: 'bounceIn',
											  animationOut: 'bounceOut',
											  size: 'small'
										});
						    	});
						    </script>
						</form>
		        </div>
		    </div>
		</div>
</div>
</div>