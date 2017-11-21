<!-- Modal -->
<div class="row centered">
	<div class="col col-10">
		<div id="modal-administrar-prof" class="animated bounceInRight">
		    <div class="modal" style="border: 1px solid #DDD;">
		        <div class="modal-header gradient">Cambiar contraseña de profesor<br><span class="label tag error">Todos los campos son obligatorios</span></div>
		        <div class="modal-body">
			        <form class="form" id="modal-administrar-prof">
			        		<div class="row centered">
			        			<div class="col col-7">
			        				 <div class="form-item">
								        <label>RFC</label>
								        <input data-tipso="Escribe el RFC" type="text" id="rfc" name="rfc">
								    </div>
								    <div class="form-item">
								    <label>Nueva contraseña</label>
								       <input data-tipso="Al menos 4 caracteres" type="password" id="pass" name="pass" value="">
								    </div>
								    <div class="form-item checkboxes">
								        <label><input type="checkbox" value="ABCD123" id="show-pass"> Mostrar contraseña</label>
								    </div>
								    <br>

								    <div class="row">
								    	<div class="col col-7">
								    		<div class="form-item">
										    <button type="submit" class="button aceptar width-100" id="guardar">Guardar <i class="fa fa-check fa-lg"></i></button>
										    </div>
								    	</div>
										<div class="col">
										    <div class="form-item">
										    <button class="button oscuro width-100" id="cancel"><i class="fa fa-ban fa-lg"></i> Cancelar</button>
										    </div>
								    	</div>
								    </div>
			        			</div>
						    </div>
						    <script type="text/javascript">
						    	$(document).ready(function () {
						    			$("input#pass").tipso({
											  showArrow: true,
											  position: 'top',
											  background: 'rgba(0, 0, 0, 0.5)',
											  color: '#eee',
											  useTitle: false,
											  animationIn: 'bounceIn',
											  animationOut: 'bounceOut',
											  size: 'small'
										});
										
										 $.toggleShowPassword = function (options) {
								        var settings = $.extend({
								            field: "#pass",
								            control: "#show-pass",
								        }, options);
								
								        var control = $(settings.control);
								        var field = $(settings.field)
								
								        control.bind('click', function () {
								            if (control.is(':checked')) {
								                field.attr('type', 'text');
								            } else {
								                field.attr('type', 'password');
								            }
								        })
								    };
								    
								    $.toggleShowPassword({
										    field: '#pass',
										    control: '#show-pass'
										});
						    	});
						    </script>
						</form>
		        </div>
		    </div>
		</div>
</div>
</div>		
