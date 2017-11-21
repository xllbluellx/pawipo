<!-- Modal -->
<div class="row centered">
	<div class="col col-11">
		<div id="modal-line" class="animated bounceInRight">
		    <div class="modal" style="border: 1px solid #DDD;">
		        <div class="modal-header gradient">Línea de la Vida<br><span class="label tag error">Todos los campos son obligatorios</span></div>
		        <div class="modal-body">
			        <form class="form" id="modal-line">
			        		<div class="row">
			        			<!-- inicia segunda columna -->
			        			<div class="col">
			        			<h5>Éxitos, logros, alcances, etc.</h5>
			        			<div class="desc" style="color: #f34248;">A la edad de 6 años</div>
								        <textarea id="vid-6a" name="vid-6a" rows="6" class="anexosBox textarea" ></textarea>
								<div class="desc" style="color: #f34248;">A la edad de 12 años</div>
								        <textarea id="vid-12a" name="vid-12a" rows="6" class="anexosBox textarea"></textarea>
								<div class="desc" style="color: #f34248;">A la edad de 15 años</div>
								        <textarea id="vid-15a" name="vid-15a" rows="6" class="anexosBox textarea"></textarea>
								<div class="desc" style="color: #f34248;">A la edad de 18 años</div>
								        <textarea id="vid-18a" name="vid-18a" rows="6" class="anexosBox textarea"></textarea>
								<div class="desc" style="color: #f34248;">A la edad de 21 años</div>
								        <textarea id="vid-21a" name="vid-21a" rows="6" class="anexosBox textarea"></textarea>
			        			</div>
			        			
			        			<!-- inicia tercer columna -->
			        			<div class="col">
									<h5>Fracasos, tropiezos, limitaciones, etc.</h5>
								<div class="desc" style="color: #f34248;">A la edad de 6 años</div>
								        <textarea id="vid-6b" name="vid-6b" rows="6" class="anexosBox textarea" ></textarea>
								<div class="desc" style="color: #f34248;">A la edad de 12 años</div>
								        <textarea id="vid-12b" name="vid-12b" rows="6" class="anexosBox textarea"></textarea>
								<div class="desc" style="color: #f34248;">A la edad de 15 años</div>
								        <textarea id="vid-15b" name="vid-15b" rows="6" class="anexosBox textarea"></textarea>
								<div class="desc" style="color: #f34248;">A la edad de 18 años</div>
								        <textarea id="vid-18b" name="vid-18b" rows="6" class="anexosBox textarea"></textarea>
								<div class="desc" style="color: #f34248;">A la edad de 21 años</div>
								        <textarea id="vid-21b" name="vid-21b" rows="6" class="anexosBox textarea"></textarea>
								        
			        			</div>
						    </div>
						    <script type="text/javascript">
						    	$(document).ready(function () {
										
										
												function llenarForm(form, datos) {
													$.each(datos, function(key, value){
														$("div#ContenedorPrincipal").find('form#'+form+' [name='+value['name']+']').val(value['value']);
														$("div#ContenedorPrincipal").find('form#'+form+' [name='+value['name']+']').prop('disabled', true);
													});
												}				    		
						    		
										var archivo = $.cookie('tipo')+"-"+$.cookie('op')+".php";
										$.ajax({ 
													 data: {'dato': 1},
								                url: '../php/'+archivo,
								                type: 'POST',
													 async: false,
								                success: function (infoRegreso) {
								                	if (!$.isNumeric(infoRegreso)) {
								                		llenarForm('modal-'+$.cookie('subop'), $.parseJSON(infoRegreso));
								                		}
								                		else{
								                			$('div#ContenedorPrincipal').html('<div class="alert error animated fadeInDown"><i class="fa fa-warning fa-2x"></i> <b>No has realizado el Formato de Línea de vida, realizalo antes de consultar.</b></div>');
								                		}
								                	}
								            });
						    	});
						    </script>
						<!-- </form> -->						
			        	</form>
			        	</div>
			        	
		        </div>
		    </div>
		</div>
</div>
		
