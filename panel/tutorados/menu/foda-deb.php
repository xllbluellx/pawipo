<!-- Modal -->
<div class="row centered">
	<div class="col col-11">
		<div id="modal-anexos-deb" class="animated bounceInRight">
		    <div class="modal" style="border: 1px solid #DDD;">
		        <div class="modal-header gradient">Análisis FODA: Debilidades<br><span class="label tag error">Todos los campos son obligatorios</span></div>
		        <div class="modal-body">
		        <div>
					<button class="button small" id="back-foda"><i class="fa fa-arrow-left fa-lg"></i> Regresar</button>		        
		        </div><br>
		        <div class="fodaDesc">
						<p>
						<b>OBJETIVO:</b><br>
						Identifica qué es lo que le está frenando e imponiendo límites en el siguiente capítulo de su
vida. Tener claridad sobre los recursos, capacidades y cualidades de su fuerza interna.
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
			        <form class="form" id="modal-anexos-deb">
						<div class="row centered">
							<div class="col">
								<div class="form-item">
						        <label>Observe los momentos en los que experimentaste el fracaso. Preste especial atención a
los “patrones” recurrentes de fracaso en tu vida. ¿Cuál es la debilidad o deficiencia más
común que consideras tener y que piensas que está relacionada con estos fracasos?</label>
						        <textarea  name="deb-1" rows="4" cols="50"></textarea>
						    </div>
							</div>
							<div class="col">
							<div class="form-item">
						        <label>¿Cuáles son las tendencias negativas o destructivas de su comportamiento que pueden
seguir causando sufrimiento a los demás y a usted mismo en el futuro si no son atendidas?
<br><b>Escríbalas:</b></label>
						        <textarea  name="deb-2" rows="4" cols="50"></textarea>
						    </div>
							</div>
						</div>
						<hr>
						<div class="row centered">
							<div class="col">
								<div class="form-item">
						        <label>¿Qué es lo que más le gustaría cambiar de usted mismo en el próximo capítulo de tu vida?</label><br>
						        <textarea  name="deb-3" rows="4" cols="50"></textarea>
						    </div>
							</div>
							<div class="col">
							<div class="form-item">
						        <label>Revise sus respuestas a las preguntas anteriores. ESCRIBA LAS CUATRO
“DEBILIDADES” MAS SIGNIFICATIVAS QUE LO LIMITAN EN EL PRÓXIMO CAPÍTULO
DE TU VIDA.</label>
						        <textarea  name="deb-4" rows="4" cols="50"></textarea>
						    </div>
							</div>
						</div>
						<!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
					    
					    <div class="row centered">
							    	<div class="col col-5">
							    		<div class="form-item">
									    <button type="submit" class="button aceptar width-100" name="3-3" id="guardar-anexos"><i class="fa fa-check fa-lg"></i> Guardar formato</button>
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
		
