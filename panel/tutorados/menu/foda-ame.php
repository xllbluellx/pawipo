<!-- Modal -->
<div class="row centered">
	<div class="col col-11">
		<div id="modal-anexos-ame" class="animated bounceInRight">
		    <div class="modal" style="border: 1px solid #DDD;">
		        <div class="modal-header gradient">Análisis FODA: Amenazas<br><span class="label tag error">Todos los campos son obligatorios</span></div>
		        <div class="modal-body">
		        <div>
					<button class="button small" id="back-foda"><i class="fa fa-arrow-left fa-lg"></i> Regresar</button>		        
		        </div><br>
		        <div class="fodaDesc">
						<p>
						<b>OBJETIVO:</b><br>
						Identifique los riesgos implicados en el próximo capítulo de tu vida. Ser consciente de los retos
a futuro.
						</p>
						<p>
							<b>INSTRUCCIONES:</b><br>
							<ol>
							<li>Conviértete en “observador desapegado” y revisa tu línea de vida.</li>
							<li>Contesta las siguientes preguntas y escribe tus respuestas en los espacios
							destinados para ello.</li>
							</ol>				
						</p>		        
		        </div>
		        <br>
			        <form class="form" id="modal-anexos-ame">
						<div class="row centered">
							<div class="col">
								<div class="form-item">
						        <label>Cuando mire hacia el horizonte, en el próximo capítulo de su vida, ¿cuál cree que sea el
reto más grande que tendrá que afrontar?</label>
						        <textarea  name="ame-1" rows="4" cols="50"></textarea>
						    </div>
							</div>
							<div class="col">
							<div class="form-item">
						        <label>¿Cuál es el riesgo personal más gran de que tiene que tomar en el futuro?</label><br>
						        <textarea  name="ame-2" rows="4" cols="50"></textarea>
						    </div>
							</div>
						</div>
						<hr>
						
						<div class="row centered">
							<div class="col">
								<div class="form-item">
						        <label>¿Qué es lo que con mayor frecuencia evita, que eventualmente tendrá que afrontar?</label>
						        <textarea  name="ame-3" rows="4" cols="50"></textarea>
						    </div>
							</div>
							<div class="col">
							<div class="form-item">
						        <label>¿A qué le tiene más miedo?</label><br>
						        <textarea  name="ame-4" rows="4" cols="50"></textarea>
						    </div>
							</div>
						</div>
						
						<div class="row centered">
							<div class="col">
								<div class="form-item">
						        <label>Revise sus respuestas anteriores.<br><b>ANOTE LAS CUATRO “AMENAZAS” MÁS
IMPORTANTES, DE LAS CUALES NECESITA ESTAR CONSCIENTE:</b></label>
						        <textarea  name="ame-5" rows="4" cols="50"></textarea>
						    </div>
							</div>
							<div class="col">
							</div>
						</div>
						<!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
					    
					    <div class="row centered">
							    	<div class="col col-5">
							    		<div class="form-item">
									    <button type="submit" class="button aceptar width-100" name="3-4" id="guardar-anexos"><i class="fa fa-check fa-lg"></i> Guardar formato</button>
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
		
