<!-- Modal -->
<div class="row centered">
	<div class="col col-11">
		<div id="modal-anexos-res" class="animated bounceInRight">
		    <div class="modal" style="border: 1px solid #DDD;">
		        <div class="modal-header gradient">Análisis FODA: Resumen de Instrospección<br><span class="label tag error">Todos los campos son obligatorios</span></div>
		        <div class="modal-body">
		        <div>
					<button class="button small" id="back-foda"><i class="fa fa-arrow-left fa-lg"></i> Regresar</button>		        
		        </div><br>
		        <div class="fodaDesc">
						<p>
						<b>INSTRUCCIONES:</b><br>
						En los espacios disponibles en la siguiente página haga un resumen de sus respuestas a las
preguntas de introspección.
						</p>		        
		        </div>
		        <br>
			        <form class="form" id="modal-anexos-res">
						<div class="row centered">
							<div class="col">
								<div class="form-item">
						        <label><b>FORTALEZAS</b></label>
						        <textarea  name="res-for" rows="4" cols="50"></textarea>
						    </div>
							</div>
							<div class="col">
							<div class="form-item">
						        <label><b>OPORTUNIDADES</b></label>
						        <textarea  name="res-opo" rows="4" cols="50"></textarea>
						    </div>
							</div>
						</div>
						<hr>
						<div class="row centered">
							<div class="col">
								<div class="form-item">
						        <label><b>DEBILIDADES</b></label>
						        <textarea  name="res-deb" rows="4" cols="50"></textarea>
						    </div>
							</div>
							<div class="col">
							<div class="form-item">
						        <label><b>AMENAZAS</b></label>
						        <textarea  name="res-ame" rows="4" cols="50"></textarea>
						    </div>
							</div>
						</div>
						<!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
					    
					    <div class="row centered">
							    	<div class="col col-5">
							    		<div class="form-item">
									    <button type="submit" class="button aceptar width-100" name="3-5" id="guardar-anexos"><i class="fa fa-check fa-lg"></i> Guardar formato</button>
									    </div>
							    	</div>
									<div class="col col-5">
									    <div class="form-item">
									    <button class="button oscuro width-100" id="cancel"><i class="fa fa-ban fa-lg"></i> Cancelar</button>
									    </div>
							    	</div>
								</div>
						    <script type="text/javascript">
						    	$(document).ready(function () {
										$('button#back-foda').on('click', function () {
										$('div#ContenedorPrincipal').load('menu/anexos-foda.php');
									});
						    	});
						    </script>
					
			        	</form>	
			        	</div>
			        	
		        </div>
		    </div>
		</div>
</div>
		
