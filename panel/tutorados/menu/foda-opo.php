<!-- Modal -->
<div class="row centered">
	<div class="col col-11">
		<div id="modal-anexos-opo" class="animated bounceInRight">
		    <div class="modal" style="border: 1px solid #DDD;">
		        <div class="modal-header gradient">Análisis FODA: Oportunidades<br><span class="label tag error">Todos los campos son obligatorios</span></div>
		        <div class="modal-body">
		        <div>
					<button class="button small" id="back-foda"><i class="fa fa-arrow-left fa-lg"></i> Regresar</button>		        
		        </div><br>
		        <div class="fodaDesc">
						<p>
						<b>OBJETIVO:</b><br>
						Identifique las oportunidades en el próximo capítulo de tu vida. Ser consciente de las nuevas
						oportunidades y posibilidades que se te presentan.
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
			        <form class="form" id="modal-anexos-opo">
						<div class="row centered">
							<div class="col">
								<div class="form-item">
						        <label>¿Qué nuevas oportunidades y posibilidades parecen presentársele ahora? Estas pueden
ser nuevas amistades, eventos o sucesos inesperados que se le están presentando.
<b>Escríbalos:</b></label>
						        <textarea  name="opo-1" rows="4" cols="50"></textarea>
						    </div>
							</div>
							<div class="col">
							<div class="form-item">
						        <label>Cuando piensa en el próximo capítulo de tu vida,<br>¿Cuáles son las posibilidades que más le
entusiasman?</label><br><br>
						        <textarea  name="opo-2" rows="4" cols="50"></textarea>
						    </div>
							</div>
						</div>
						<hr>
						<div class="row centered">
							<div class="col">
								<div class="form-item">
						        <label>¿Qué haría en el próximo capítulo de su vida si no tuviera miedo?</label><br>
						        <textarea  name="opo-3" rows="4" cols="50"></textarea>
						    </div>
							</div>
							<div class="col">
							<div class="form-item">
						        <label>Revisa sus respuestas anteriores. ANOTE LAS CUATRO “OPORTUNIDADES” QUE
PUEDEN LLEVARSE A CABO EN EL PRÓXIMO CAPÍTULO DE TU VIDA:</label>
						        <textarea  name="opo-4" rows="4" cols="50"></textarea>
						    </div>
							</div>
						</div>
						<!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
					    
					    <div class="row centered">
							    	<div class="col col-5">
							    		<div class="form-item">
									    <button type="submit" class="button aceptar width-100" name="3-2" id="guardar-anexos"><i class="fa fa-check fa-lg"></i> Guardar formato</button>
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
		
