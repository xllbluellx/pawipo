<!-- Modal -->
<div class="row centered">
	<div class="col col-11">
		<div id="modal-anexos-form-2" class="animated bounceInRight">
		    <div class="modal" style="border: 1px solid #DDD;">
		        <div class="modal-header gradient">Formato de Entrevista 2<br><span class="label tag error">Todos los campos son obligatorios</span></div>
		        <div class="modal-body">
			        <form class="form" id="modal-anexos-form-2">
			        		<div class="row">
			        			<div class="col col-6 anexosBox">
		    
			        			</div>
			        			<!-- inicia segunda columna -->
			        			<div class="col col-5 offset-1 anexosBox">
			        											      
			        			</div>
						    </div>
						    <!-- Segunda parte -->
						    <hr>
						    <div class="row centered anexosBox" style="text-align: center;">
						    <div class="col col-10">	
						    <p>¿Qué relación tienes con tus hermanos/as? (Con cada uno de ellos)<br>
						    <span class="label outline">En caso de ser hijo/a único/a menciona que relación y actitud tienes de ti mismo/a</span></p>	    	
						    	</div>
						    </div>
						    <div style="margin-top: 2%;" class="row">
						    	<div class="col">
						    	<label>Relación</label>
									<input type="text"  name="rel-herm1">						    	
						    	</div>
						    	<div class="col">
									<label>Actitud</label>
									<input type="text"  name="act-herm1">						    	
						    	</div>
						    </div>
						    <hr id="hermanos">
						    <div class="row">
						    	<div class="col col-1 offset-8">
											<span id="cont-hermanos" style="color: white;">1</span>			    	
						    	</div>
						    	<div class="col col-3">
									<button type="button" class="button primary small" id="agregar">Agregar</button>						    	
						    	</div>
						    </div>
						    <!-- Tercera parte -->
						    <hr>
						    	<div class="row">
			        			<div class="col col-6 anexosBox">
			        			
								    <div  class="form-item">
								        <label>¿Con quien te sientes más ligado afectivamente?</label>
								        <input  type="text" id="lig-afe" placeholder="Madre, Padre, Hermano, Otros..." name="lig-afe" class="width-100" >
								    </div>
								    
								    <div  class="form-item">
								        <label>Especifica por que...</label>
								        <input  type="text" id="lig-por" name="lig-por" class="width-100" >
								    </div>
									
								    <div  class="form-item">
								        <label>¿Quién se ocupa más directamente de tu eduación?</label>
								        <input type="text" id="ocu-dir" name="ocu-dir" class="width-100">
								    </div>
								    
								    <div  class="form-item">
								        <label>¿Quién ha influido más en tu decisión para estudiar esta carrera?</label>
								        <input type="text" id="inf-dir" name="inf-dir" class="width-100">
								    </div>
								    
								    <div  class="form-item">
								        <label>Consideras importante facilitar algún otro dato sobre tu ambiente familiar</label>
								        <input type="text" id="dat-fam" name="dat-fam" class="width-100">
								    </div>
								    <div class="titulos">Área Social</div><br>
								    		<div class="form-item">
										        <label>¿Cómo es tu relación con los compañeros?</label>
										        <select class="select" id="rel-com" name="rel-com">
										        	<option value="Buena">Buena</option>
										        	<option value="Regular">Regular</option>
										        	<option value="Mala">Mala</option>
										        </select>
										    </div>
										
										<div class="form-item">
								        <label>¿Por qué?</label>
								        <input type="text" id="rel-por" name="rel-por" class="width-100">
								    </div>
								    
								    <div  class="form-item">
								        <label>¿Cómo es tu relación con tus amigos?</label>
								        <input  type="text" id="rel-ami" name="rel-ami" class="width-100" >
								    </div>
									
								    <div  class="form-item">
								        <label>¿Cómo es tu relación con tus profesores?</label>
								        <input type="text" id="rel-pro" name="rel-pro" class="width-100">
								    </div>
								    
								    <div  class="form-item">
								        <label>¿Cómo es tu relación con las autoridades académicas?</label>
								        <input type="text" id="rel-aca" name="rel-aca" class="width-100">
								    </div>
								    
								    <div  class="form-item">
								        <label>¿Qué haces en tu tiempo libre?</label>
								        <input type="text" id="tie-lib" name="tie-lib" class="width-100">
								    </div>
								    
								     <div  class="form-item">
								        <label>¿Cuál es tu actividad recreativa?</label>
								        <input type="text" id="act-rec" name="act-rec" class="width-100">
								    </div>
								    
								        <div class="titulos">CARACTERÍSTICAS PERSONALES (MADUREZ Y EQUILIBRIO)</div><br>
								        <div class="row">
								        <div class="col">
								        <div class="form-item">
										        <label>Puntual</label>
										        <select class="select"  name="puntual">
										        	<option value="No">No</option>
										        	<option value="Poco">Poco</option>
										        	<option value="Frecuente" selected>Frecuente</option>
										        	<option value="Mucho">Mucho</option>
										        </select>
										    </div>
										  </div>
										  <div class="col">
										    <div  class="form-item">
									        <label>Observaciones</label>
									        <input type="text" value="Ninguna"  name="pun-obs" class="width-100">
								    		 </div>
								    		 </div>
								    		</div>
								    		
								    		<div class="row">
								        <div class="col">
								    		<div class="form-item">
										        <label>Tímido</label>
										        <select class="select"  name="timido">
										        	<option value="No">No</option>
										        	<option value="Poco">Poco</option>
										        	<option value="Frecuente" selected>Frecuente</option>
										        	<option value="Mucho">Mucho</option>
										        </select>
										    </div>
										    </div>
										    <div class="col">
										    <div  class="form-item">
									        <label>Observaciones</label>
									        <input type="text" value="Ninguna" name="tim-obs" class="width-100">
								    		 </div>
								    		 </div>
								    		</div>
								    		
								    		<div class="row">
								        	<div class="col">
												<div class="form-item">
										        <label>Alegre</label>
										        <select class="select"  name="alegre">
										        	<option value="No">No</option>
										        	<option value="Poco">Poco</option>
										        	<option value="Frecuente" selected>Frecuente</option>
										        	<option value="Mucho">Mucho</option>
										        </select>
										    </div>
										    </div>
										    <div class="col">
										    <div  class="form-item">
									        <label>Observaciones</label>
									        <input type="text" value="Ninguna"  name="ale-obs" class="width-100">
								    		 		</div>
								    		 	</div>
								    		 </div>
								    		 
								    		 <div class="row">
								        		<div class="col">
								    		 <div class="form-item">
										        <label>Agresivo/a</label>
										        <select class="select"  name="agresivo">
										        	<option value="No">No</option>
										        	<option value="Poco">Poco</option>
										        	<option value="Frecuente" selected>Frecuente</option>
										        	<option value="Mucho">Mucho</option>
										        </select>
										    </div>
										    </div>
										    <div class="col">
										    <div  class="form-item">
									        <label>Observaciones</label>
									        <input type="text" value="Ninguna" name="agr-obs" class="width-100">
								    		 </div>
								    		 </div>
								    		 </div>
								    		 
								    		  <div class="row">
								        		<div class="col">
								    		 <div class="form-item">
										        <label>Abierto/a a las ideas de otros</label>
										        <select class="select"  name="ideas">
										        	<option value="No">No</option>
										        	<option value="Poco">Poco</option>
										        	<option value="Frecuente" selected>Frecuente</option>
										        	<option value="Mucho">Mucho</option>
										        </select>
										    </div>
										    </div>
										    <div class="col">
										    <div  class="form-item">
									        <label>Observaciones</label>
									        <input type="text" value="Ninguna" name="ide-obs" class="width-100">
								    		 </div>
								    		 </div>
								    		 </div>
								    		  <div class="row">
								        		<div class="col">
								    		 <div class="form-item">
										        <label>Reflexivo/a</label>
										        <select class="select"  name="reflexivo">
										        	<option value="No">No</option>
										        	<option value="Poco">Poco</option>
										        	<option value="Frecuente" selected>Frecuente</option>
										        	<option value="Mucho">Mucho</option>
										        </select>
										    </div>
										    </div>
										    <div class="col">
										    <div  class="form-item">
									        <label>Observaciones</label>
									        <input type="text" value="Ninguna" name="rel-obs" class="width-100">
								    		 </div>
								    		 </div>
								    		 </div>
								    		  <div class="row">
								        		<div class="col">
								    		 <div class="form-item">
										        <label>Constante</label>
										        <select class="select"  name="constante">
										        	<option value="No">No</option>
										        	<option value="Poco">Poco</option>
										        	<option value="Frecuente" selected>Frecuente</option>
										        	<option value="Mucho">Mucho</option>
										        </select>
										    </div>
										    </div>
										    <div class="col">
										    <div  class="form-item">
									        <label>Observaciones</label>
									        <input type="text" value="Ninguna" name="con-obs" class="width-100">
								    		 </div>
								    		 </div>
								    		 </div>
								    		 
								    		 <div class="row">
								        		<div class="col">
								    		 <div class="form-item">
										        <label>Optimista</label>
										        <select class="select"  name="optimista">
										        	<option value="No">No</option>
										        	<option value="Poco">Poco</option>
										        	<option value="Frecuente" selected>Frecuente</option>
										        	<option value="Mucho">Mucho</option>
										        </select>
										    </div>
										    </div>
										    <div class="col">
										    <div  class="form-item">
									        <label>Observaciones</label>
									        <input type="text" value="Ninguna" name="opt-obs" class="width-100">
								    		 </div>
								    		 </div>
								    		 </div>
								    		 <div class="row">
								        		<div class="col">
								    		 <div class="form-item">
										        <label>Impulsivo/a</label>
										        <select class="select"  name="constante">
										        	<option value="No">No</option>
										        	<option value="Poco">Poco</option>
										        	<option value="Frecuente" selected>Frecuente</option>
										        	<option value="Mucho">Mucho</option>
										        </select>
										    </div>
										    </div>
										    <div class="col">
										    <div  class="form-item">
									        <label>Observaciones</label>
									        <input type="text" value="Ninguna" name="imp-obs" class="width-100">
								    		 </div>
								    		 </div>
								    		 </div>
								    		 <div class="row">
								        		<div class="col">
								    		 <div class="form-item">
										        <label>Silencioso/a</label>
										        <select class="select"  name="silencioso">
										        	<option value="No">No</option>
										        	<option value="Poco">Poco</option>
										        	<option value="Frecuente" selected>Frecuente</option>
										        	<option value="Mucho">Mucho</option>
										        </select>
										    </div>
										    </div>
										    <div class="col">
										    <div  class="form-item">
									        <label>Observaciones</label>
									        <input type="text" value="Ninguna" name="sil-obs" class="width-100">
								    		 </div>
								    		 </div>
								    		 </div>
								    		 <div class="row">
								        		<div class="col">
								    		 <div class="form-item">
										        <label>Generoso/a</label>
										        <select class="select"  name="generoso">
										        	<option value="No">No</option>
										        	<option value="Poco">Poco</option>
										        	<option value="Frecuente" selected>Frecuente</option>
										        	<option value="Mucho">Mucho</option>
										        </select>
										    </div>
										    </div>
										    <div class="col">
										    <div  class="form-item">
									        <label>Observaciones</label>
									        <input type="text" value="Ninguna" name="gen-obs" class="width-100">
								    		 </div>
								    		 </div>
								    		 </div>
								    		 <div class="row">
								        		<div class="col">
								    		 <div class="form-item">
										        <label>Inquieto/a</label>
										        <select class="select"  name="inquieto">
										        	<option value="No">No</option>
										        	<option value="Poco">Poco</option>
										        	<option value="Frecuente" selected>Frecuente</option>
										        	<option value="Mucho">Mucho</option>
										        </select>
										    </div>
										    </div>
										    <div class="col">
										    <div  class="form-item">
									        <label>Observaciones</label>
									        <input type="text" value="Ninguna" name="inq-obs" class="width-100">
								    		 </div>
								    		 </div>
								    		 </div>
								    		 <div class="row">
								        		<div class="col">
								    		 <div class="form-item">
										        <label>Cambios de humor</label>
										        <select class="select"  name="humor">
										        	<option value="No">No</option>
										        	<option value="Poco">Poco</option>
										        	<option value="Frecuente" selected>Frecuente</option>
										        	<option value="Mucho">Mucho</option>
										        </select>
										    </div>
										    </div>
										    <div class="col">
										    <div  class="form-item">
									        <label>Observaciones</label>
									        <input type="text" value="Ninguna" name="cam-obs" class="width-100">
								    		 </div>
								    		 </div>
								    		 </div>
								    		 <div class="row">
								        		<div class="col">
								    		 <div class="form-item">
										        <label>Dominante</label>
										        <select class="select"  name="dominante">
										        	<option value="No">No</option>
										        	<option value="Poco">Poco</option>
										        	<option value="Frecuente" selected>Frecuente</option>
										        	<option value="Mucho">Mucho</option>
										        </select>
										    </div>
										    </div>
										    <div class="col">
										    <div  class="form-item">
									        <label>Observaciones</label>
									        <input type="text" value="Ninguna" name="dom-obs" class="width-100">
								    		 </div>
								    		 </div>
								    		 </div>
								    		 <div class="row">
								        		<div class="col">
								    		 <div class="form-item">
										        <label>Egoísta</label>
										        <select class="select"  name="egoista">
										        	<option value="No">No</option>
										        	<option value="Poco">Poco</option>
										        	<option value="Frecuente" selected>Frecuente</option>
										        	<option value="Mucho">Mucho</option>
										        </select>
										    </div>
										    </div>
										    <div class="col">
										    <div  class="form-item">
									        <label>Observaciones</label>
									        <input type="text" value="Ninguna" name="ego-obs" class="width-100">
								    		 </div>
								    		 </div>
								    		 </div>
								    		 <div class="row">
								        		<div class="col">
								    		 <div class="form-item">
										        <label>Sumiso/a</label>
										        <select class="select"  name="sumiso">
										        	<option value="No">No</option>
										        	<option value="Poco">Poco</option>
										        	<option value="Frecuente" selected>Frecuente</option>
										        	<option value="Mucho">Mucho</option>
										        </select>
										    </div>
										    </div>
										    <div class="col">
										    <div  class="form-item">
									        <label>Observaciones</label>
									        <input type="text" value="Ninguna" name="sum-obs" class="width-100">
								    		 </div>
								    		 </div>
								    		 </div>
								    		 <div class="row">
								        		<div class="col">
								    		 <div class="form-item">
										        <label>Confiado/a en si mismo/a</label>
										        <select class="select"  name="confiado">
										        	<option value="No">No</option>
										        	<option value="Poco">Poco</option>
										        	<option value="Frecuente" selected>Frecuente</option>
										        	<option value="Mucho">Mucho</option>
										        </select>
										    </div>
										    </div>
										    <div class="col">
										    <div  class="form-item">
									        <label>Observaciones</label>
									        <input type="text" value="Ninguna" name="confi-obs" class="width-100">
								    		 </div>
								    		 </div>
								    		 </div>
								    		 <div class="row">
								        		<div class="col">
								    		 <div class="form-item">
										        <label>Imaginativo/a</label>
										        <select class="select"  name="imaginativo">
										        	<option value="No">No</option>
										        	<option value="Poco">Poco</option>
										        	<option value="Frecuente" selected>Frecuente</option>
										        	<option value="Mucho">Mucho</option>
										        </select>
										    </div>
										    </div>
										    <div class="col">
										    <div  class="form-item">
									        <label>Observaciones</label>
									        <input type="text" value="Ninguna" name="imag-obs" class="width-100">
								    		 </div>
								    		 </div>
								    		 </div>
			        			</div>
			        			<!-- inicia segunda columna -->
			        			<div class="col col-5 offset-1 anexosBox">
			        			 	<div class="row">
								        		<div class="col">
								    		 <div class="form-item">
										        <label>Con iniciativa propia</label>
										        <select class="select"  name="iniciativa">
										        	<option value="No">No</option>
										        	<option value="Poco">Poco</option>
										        	<option value="Frecuente" selected>Frecuente</option>
										        	<option value="Mucho">Mucho</option>
										        </select>
										    </div>
										    </div>
										    <div class="col">
										    <div  class="form-item">
									        <label>Observaciones</label>
									        <input type="text" value="Ninguna" name="ini-obs" class="width-100">
								    		 </div>
								    		 </div>
								    		 </div>
								    		 <div class="row">
								        		<div class="col">
								    		 <div class="form-item">
										        <label>Sociable</label>
										        <select class="select"  name="sociable">
										        	<option value="No">No</option>
										        	<option value="Poco">Poco</option>
										        	<option value="Frecuente" selected>Frecuente</option>
										        	<option value="Mucho">Mucho</option>
										        </select>
										    </div>
										    </div>
										    <div class="col">
										    <div  class="form-item">
									        <label>Observaciones</label>
									        <input type="text" value="Ninguna" name="soc-obs" class="width-100">
								    		 </div>
								    		 </div>
								    		 </div>
								    		 <div class="row">
								        		<div class="col">
								    		 <div class="form-item">
										        <label>Responsable</label>
										        <select class="select"  name="responsable">
										        	<option value="No">No</option>
										        	<option value="Poco">Poco</option>
										        	<option value="Frecuente" selected>Frecuente</option>
										        	<option value="Mucho">Mucho</option>
										        </select>
										    </div>
										    </div>
										    <div class="col">
										    <div  class="form-item">
									        <label>Observaciones</label>
									        <input type="text" value="Ninguna" name="resp-obs" class="width-100">
								    		 </div>
								    		 </div>
								    		 </div>
								    		 <div class="row">
								        		<div class="col">
								    		 <div class="form-item">
										        <label>Perseverante</label>
										        <select class="select"  name="perseverante">
										        	<option value="No">No</option>
										        	<option value="Poco">Poco</option>
										        	<option value="Frecuente" selected>Frecuente</option>
										        	<option value="Mucho">Mucho</option>
										        </select>
										    </div>
										    </div>
										    <div class="col">
										    <div  class="form-item">
									        <label>Observaciones</label>
									        <input type="text" value="Ninguna" name="per-obs" class="width-100">
								    		 </div>
								    		 </div>
								    		 </div>
								    		 <div class="row">
								        		<div class="col">
								    		 <div class="form-item">
										        <label>Motivado/a</label>
										        <select class="select"  name="motivado">
										        	<option value="No">No</option>
										        	<option value="Poco">Poco</option>
										        	<option value="Frecuente" selected>Frecuente</option>
										        	<option value="Mucho">Mucho</option>
										        </select>
										    </div>
										    </div>
										    <div class="col">
										    <div  class="form-item">
									        <label>Observaciones</label>
									        <input type="text" value="Ninguna" name="mot-obs" class="width-100">
								    		 </div>
								    		 </div>
								    		 </div>
								    		 <div class="row">
								        		<div class="col">
								    		 <div class="form-item">
										        <label>Activo/a</label>
										        <select class="select"  name="activo">
										        	<option value="No">No</option>
										        	<option value="Poco">Poco</option>
										        	<option value="Frecuente" selected>Frecuente</option>
										        	<option value="Mucho">Mucho</option>
										        </select>
										    </div>
										    </div>
										    <div class="col">
										    <div  class="form-item">
									        <label>Observaciones</label>
									        <input type="text" value="Ninguna" name="act-obs" class="width-100">
								    		 </div>
								    		 </div>
								    		 </div>
								    		 <div class="row">
								        		<div class="col">
								    		 <div class="form-item">
										        <label>Independiente</label>
										        <select class="select"  name="independiente">
										        	<option value="No">No</option>
										        	<option value="Poco">Poco</option>
										        	<option value="Frecuente" selected>Frecuente</option>
										        	<option value="Mucho">Mucho</option>
										        </select>
										    </div>
										    </div>
										    <div class="col">
										    <div  class="form-item">
									        <label>Observaciones</label>
									        <input type="text" value="Ninguna" name="ind-obs" class="width-100">
								    		 </div>
								    		 </div>
								    		 </div>
								    		    
								    <div class="titulos">ÁREA PSICOPEDAGÓGICA</div><br>
								    	<div class="form-item">
										        <label>¿Cómo te gustaría ser?</label>
										        <input type="text" name="com-ser" class="width-100">
										  </div>
										  <div class="form-item">
										        <label>¿Recibes ayuda en tu casa para la realización de tareas escolares?</label>
										        <input type="text" name="ayu-esc" class="width-100">
										  </div>
										  <div class="form-item">
										        <label>¿Qué problemas personales intervienen en tus estudios?</label>
										        <input type="text" name="pro-est" class="width-100">
										  </div>
								    	<div class="form-item">
										        <label>¿Cuál es tu rendimiento escolar?</label>
										        <input type="text" name="ren-esc" class="width-100">
										  </div>
										  <div class="form-item">
										        <label>Menciona las asignaturas que cursas en el semestre actual</label>
										        <input type="text" name="asi-act" class="width-100">
										  </div>
								    	<div class="form-item">
										        <label>¿Cuál es tu asignatura preferida? ¿Por qué?</label>
										        <input type="text" name="asi-pre" class="width-100">
										  </div>
										  <div class="form-item">
										        <label>¿Cuál es la asignatura en la que sobresales? ¿Por qué?</label>
										        <input type="text" name="asi-sob" class="width-100">
										  </div> 
										   <div class="form-item">
										        <label>¿Qué asignatura te desagrada? ¿Por qué?</label>
										        <input type="text" name="asi-des" class="width-100">
										  </div>
								    	<div class="form-item">
										        <label>¿Cuál es tu asignatura con más bajo promedio del semestre anterior? ¿Por qué?</label>
										        <input type="text" name="baj-pro" class="width-100">
										  </div>
										  <div class="form-item">
										        <label>¿Por qué vienes al Tecnológico?</label>
										        <input type="text" name="vie-tec" class="width-100">
										  </div>
								    	<div class="form-item">
										        <label>¿Qué te motiva para venir al Tecnológico?</label>
										        <input type="text" name="mot-tec" class="width-100">
										  </div>
										  <div class="form-item">
										        <label>¿Cuál es tu promedio general del ciclo escolar anterior?</label>
										        <input type="text" name="pro-ant" class="width-100">
										  </div>
										  <div class="form-item">
										        <label>¿Tienes asignaturas reprobadas? ¿Cuáles?</label>
										        <input type="text" name="asi-repr" class="width-100">
										  </div>
										  
										  <div class="titulos">PLAN DE VIDA Y CARRERA</div><br>
										  <div class="form-item">
										        <label>¿Cuáles son tus planes inmediatos?</label>
										        <input type="text" name="pla-inm" class="width-100">
										  </div>
								    	<div class="form-item">
										        <label>¿Cuáles son tus metas en la vida?</label>
										        <input type="text" name="met-vid" class="width-100">
										  </div>
										  <div class="form-item">
										        <label>Nombre del entrevistador (Tutor)</label>
										        <input type="text" name="nom-ent" class="width-100">
										  </div>
										  
										  <div class="titulos">CARACTERÍSTICAS PERSONALES</div><br>
										  <div class="form-item">
										        <label>Yo Soy...</label>
										        <input type="text" name="yo-soy" class="width-100">
										  </div>
								    	<div class="form-item">
										        <label>Mi Carácter es...</label>
										        <input type="text" name="car-es" class="width-100">
										  </div>
										  <div class="form-item">
										        <label>A mí me gusta que...</label>
										        <input type="text" name="gus-que" class="width-100">
										  </div>
										  <div class="form-item">
										        <label>Yo Aspiro en la Vida...</label>
										        <input type="text" name="asp-vid" class="width-100">
										  </div>
								    	<div class="form-item">
										        <label>Yo tengo miedo que...</label>
										        <input type="text" name="mie-que" class="width-100">
										  </div>
										  <div class="form-item">
										        <label>Pero pienso que podré lograr...</label>
										        <input type="text" name="que-log" class="width-100">
										  </div>
										  
										  
										   
								    <div class="row">
								    	<div class="col col-7">
								    		<div class="form-item">
										    <button type="submit" class="button aceptar width-100" name="1-2" id="guardar-anexos">Guardar formato <i class="fa fa-check fa-lg"></i></button>
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
									$('button#agregar').on('click', function () {
										var cuantos = parseInt($('span#cont-hermanos').text()) + 1;
										if (cuantos <= 7) {
											$('span#cont-hermanos').text(cuantos);

											$('hr#hermanos').append('<div style="margin-top: 1%;"  class="row">'+
											    	'<div class="col">'+
														'<input type="text"  name="rel-herm'+cuantos+'">'+						    	
											    	'</div>'+
											    	'<div class="col">'+
														'<input type="text"  name="act-herm'+cuantos+'">'+					    						    	
											    	'</div><span id="eliminar" style="cursor: pointer; margin-top: 1%;" class="label error">Quitar</span>'+
											    '</div>');
													}
											});
										
											$('div#ContenedorPrincipal').on('click','span#eliminar', function () {
												$(this).parent().remove();
												var cuantos = parseInt($('span#cont-hermanos').text()) - 1;
												if(cuantos <= 0) cuantos = 1;
												$('span#cont-hermanos').text(cuantos);
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
		
