<!-- Modal -->
<div class="row centered">
	<div class="col col-11">
		<div id="modal-anexos-for" class="animated bounceInRight">
		    <div class="modal" style="border: 1px solid #DDD;">
		        <div class="modal-header gradient">Análisis FODA: Fortalezas<br><span class="label tag error">Todos los campos son obligatorios</span></div>
		        <div class="modal-body">
		        <div>
					<button class="button small" id="back-foda"><i class="fa fa-arrow-left fa-lg"></i> Regresar</button>		        
		        </div><br>
		        <div class="fodaDesc">
						<p>
						<b>OBJETIVO:</b><br>
						Identifique lo que tiene que construir en el siguiente capítulo de tu vida. Tome conciencia de
						qué recursos, capacidades y cualidades conforman tus fortalezas principales.
						</p>
						<p>
							<b>INSTRUCCIONES:</b><br>
							<ol>
							<li>Conviértete en “observador desapegado” y revisa tu línea de vida.</li>
							<li>Contesta las siguientes preguntas y escribe tus respuestas en los espacios
							destinados para ello.</li>
							</ol>
							Revisa la línea de vida y observa aquellos momentos en los cuales experimentaste los
							mayores éxitos o victorias.				
						</p>		        
		        </div>
		        <br>
			        <form class="form" id="modal-anexos-for">
						<div class="row centered">
							<div class="col">
								<div class="form-item">
						        <label>¿Qué talentos especiales sacaste a relucir en dichos
							momentos? Identifica cuáles son tus mayores talentos. Estos pueden ser habilidades o
							competencias.<br><b>Escríbelos aquí:</b>	</label>
						        <textarea  name="for-1" rows="4" cols="50"></textarea>
						    </div>
							</div>
							<div class="col">
							<div class="form-item">
						        <label>¿Qué es lo que la gente más admira de usted? Éstas son las cualidades y virtudes
personales particulares que aportas a las relaciones.<br><b>Escríbalas:</b></label>
						        <textarea  name="for-2" rows="4" cols="50"></textarea>
						    </div>
							</div>
						</div>
						<hr>
						<div class="row centered">
							<div class="col">
								<div class="form-item">
						        <label>¿Cuáles son sus activos más valiosos? Éstos pueden ser cosas intangibles, como
experiencias de la vida y relaciones, o también activos tangibles como bienes naturales.</label>
						        <textarea  name="for-3" rows="4" cols="50"></textarea>
						    </div>
							</div>
							<div class="col">
							<div class="form-item">
						        <label>Revisa sus respuestas a las preguntas anteriores.<br>ESCRIBA LAS CUATRO
“FORTALEZAS” MAS IMPORTANTES QUE DEBE CONSTRUIR PARA LOS SIGUIENTES
CAPÍTULOS DE TU VIDA.</label>
						        <textarea  name="for-4" rows="4" cols="50"></textarea>
						    </div>
							</div>
						</div>
						
						<!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
					    
					    <div class="row centered">
							    	<div class="col col-5">
							    		<div class="form-item">
									    <button type="submit" class="button aceptar width-100" name="3-1" id="guardar-anexos"><i class="fa fa-check fa-lg"></i> Guardar formato</button>
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
		
