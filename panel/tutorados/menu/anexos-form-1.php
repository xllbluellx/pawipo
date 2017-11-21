<!-- Modal -->
<div class="row centered">
	<div class="col col-11">
		<div id="modal-anexos-form-1" class="animated bounceInRight">
		    <div class="modal" style="border: 1px solid #DDD;">
		        <div class="modal-header gradient">Formato de Entrevista 1<br><span class="label tag error">Todos los campos son obligatorios</span></div>
		        <div class="modal-body">
			        <form class="form" id="modal-anexos-form-1">
			        		<div class="row">
			        			<div class="col col-6 anexosBox">
			        			<div class="titulos">Datos Personales</div><br>
			        				<div class="row centered" style="margin-bottom: 2%;">
			        					<div class="col col-6">
			        					<label>Selecciona una imagen</label>
			        					</div>
			        				</div>
			        				<div class="row centered">
			        					<div class="col col-6 hoverBtn">
											<div class="divbutton">
								        		<label for="sel-img">
								        		<div class="button  small width-100 animated zoomIn">Cargar imagen</div>
								        		</label>
								        		<input  type="file" id="sel-img" name="sel-img">
											</div>
											<img id="preview" src="../img/user.png" style='height: 100%; width: 100%; object-fit: contain' class="animated" alt="Imagen de  Perfil" />
			        					</div>
			        				</div>
								    
								        <label>Nombre</label>
								        <input  type="text" id="nombre" name="nombre" class="width-100" required>
								    
								    
								    <div class="form-item">
								    <label>Carrera</label>
								        <select class="select" id="carrera" name="carrera">
								            <option value="">-- Selecciona --</option>
								            <?php
													include("../../php/generarCombos.php");
													$combo = new GenerarCombos("../../../php/datosServer.php");
													$combo->generarComboCarreras();
												?>	
								        </select>
								    </div>

								    <div id="msj" class="form-item">
								        <label>Correo</label>
								        <input data-tipso="Ingresa un correo donde se pueda contactar"  type="email" id="email" name="email" class="width-100">
								    </div>
								    
								    <div class="row">
										<div class="col">							    
										    <div id="msj" class="form-item">
										        <label>Estatura</label>
										        <input data-tipso="Ejemplo: 170 o 1.70" type="number" id="estatura" name="estatura" class="width-100">
										    </div>
										</div>
										<div class="col">
											 <div id="msj" class="form-item">
										        <label>Peso</label>
										        <input data-tipso="Números enteros, ejemplo: 60" type="number" id="peso" name="peso" class="width-100">
										    </div>
										</div>								    
								    </div>
								    
								    <div class="row">
										<div class="col">							    
										    <div id="msj" class="form-item">
										        <label>Fecha de nacimiento</label>
										        <input data-tipso="Ejemplo: 24/02/2002" placeholder="00/00/0000" type="date" id="fechanac" name="fechanac" class="width-100">
										    </div>
										</div>
										<div class="col">
											 <div class="form-item">
										        <label>Género</label>
										        <select class="select" id="sexo" name="sexo">
										        	<option value="">-- Selecciona --</option>
										        	<option value="Femenino">Femenino</option>
										        	<option value="Masculino">Masculino</option>
										        </select>
										    </div>
										</div>								    
								    </div>
								    
								    <div class="row">
										<div class="col">							    
										    <div class="form-item">
										        <label>Estado civil</label>
										        <select class="select" id="estadociv" name="estadociv">
										        	<option value="">-- Selecciona --</option>
										        	<option value="Soltero">Soltera(o)</option>
										        	<option value="Casado">Casada(o)</option>
										        	<option value="Otro">Otro</option>
										        </select>
										    </div>
										</div>
										<div class="col">
											 <div class="form-item">
										        <label>Trabaja</label>
										        <select class="select" id="tra-alum" name="tra-alum">
										        	<option value="">-- Selecciona --</option>
										        	<option value="Si">Si</option>
										        	<option value="No">No</option>
										        </select>
										    </div>
										</div>								    
								    </div>
								    
								    <div class="row">
										<div class="col col-4">							    
										    <div id="msj" class="form-item">
										        <label>Lada</label>
										        <input data-tipso="Ingresar lada en caso de ser teléfono fijo" type="number" id="lad-alum" name="lad-alum">
										    </div>
										</div>
										<div class="col col-8">
											 <div id="msj" class="form-item">
										        <label>Teléfono</label>
										        <input data-tipso="Ingresa número telefónico sin espacios" type="number" id="tel-alum" name="tel-alum">
										    </div>
										</div>								    
								    </div>
								    
								    <div class="form-item">
								        <label>Lugar de nacimiento</label>
								        <input type="text" id="lug-nac" name="lug-nac" class="width-100">
								    </div>
								    
								    <div class="form-item">
								        <label>Domicilio actual</label>
								        <input type="text" id="dom-act" name="dom-act" class="width-100">
								    </div>
								    
								    <div class="form-item">
								        <label>Código postal</label>
								        <input type="number" id="cod-pos" name="cod-pos" class="width-50">
								    </div>
								    
								    <div class="form-item">
								    <label>Tipo de vivienda</label>
								        <select class="select" id="tip-viv" name="tip-viv">
								            <option value="">-- Selecciona --</option>
								            <option value="Casa">Casa</option>
								            <option value="Departamento">Departamento</option>
								        </select>
								    </div>		    
			        			</div>
			        			<!-- inicia segunda columna -->
			        			<div class="col col-5 offset-1 anexosBox">
			        			 <div class="form-item">
								    <label>La Casa/Departamento donde vives es</label>
								        <select class="select" id="des-viv" name="des-viv">
								            <option value="">-- Selecciona --</option>
								            <option value="Propia">Propia</option>
								            <option value="Rentada">Rentada</option>
								            <option value="Prestada">Prestada</option>
								            <option value="Otro">Otro</option>
								        </select>
								    </div>
								    
								    <div class="form-item">
								        <label>Número de personas con quien vives</label>
								        <input  type="number" id="num-per" name="num-per" class="width-50">
								    </div>
			        			<div class="titulos">Datos Familiares</div><br>
								    <div class="form-item">
								        <label>Nombre padre</label>
								        <input  type="text" id="nom-pap" name="nom-pap" class="width-100">
								    </div>
								    
								    <div class="form-item">
								        <label>Profesión</label>
								        <input  type="text" id="profe-pap" name="profe-pap" class="width-100">
								    </div>
								    
								    <div class="form-item">
								    <label>Parentesco</label>
								        <select class="select width-50" id="par-pap" name="par-pap">
								            <option value="">-- Selecciona --</option>
								            <option value="Tutor">Tutor</option>
								            <option value="Familiar">Familiar</option>
								            <option value="Padres">Padres</option>
								            <option value="Otro">Otro</option>
								        </select>
								    </div>
								    
								    <div class="row">
										<div class="col">							    
										    <div class="form-item">
										        <label>Edad</label>
										        <input type="number" id="edad-pap" name="edad-pap">
										    </div>
										</div>
										<div class="col">
											 <div class="form-item">
										        <label>Trabaja</label>
										        <select class="select" id="tra-pap" name="tra-pap">
										        	<option value="">-- Selecciona --</option>
										        	<option value="Si">Si</option>
										        	<option value="No">No</option>
										        </select>
										    </div>
										</div>								    
								    </div>
								    
								    <div class="form-item">
								        <label>Domicilio</label>
								        <input type="text" id="dom-pap" name="dom-pap">
									 </div>
									 <div class="form-item">
								        <label>Teléfono</label>
								        <input type="number" id="tel-pap" name="tel-pap">
									 </div>
									 <hr style="border:1px solid #ddd;">
									 <div class="form-item">
								        <label>Nombre madre</label>
								        <input  type="text" id="nom-mam" name="nom-mam" class="width-100">
								    </div>
								    
								    <div class="form-item">
								        <label>Profesión</label>
								        <input  type="text" id="profe-mam" name="profe-mam" class="width-100">
								    </div>
								    
								    <div class="form-item">
								    <label>Parentesco</label>
								        <select class="select width-50" id="par-mam" name="par-mam">
								            <option value="">-- Selecciona --</option>
								            <option value="Tutor">Tutor</option>
								            <option value="Familiar">Familiar</option>
								            <option value="Padres">Padres</option>
								            <option value="Otro">Otro</option>
								        </select>
								    </div>
								    
								    <div class="row">
										<div class="col">							    
										    <div class="form-item">
										        <label>Edad</label>
										        <input type="number" id="edad-mam" name="edad-mam">
										    </div>
										</div>
										<div class="col">
											 <div class="form-item">
										        <label>Trabaja</label>
										        <select class="select" id="tra-mam" name="tra-mam">
										        	<option value="">-- Selecciona --</option>
										        	<option value="Si">Si</option>
										        	<option value="No">No</option>
										        </select>
										    </div>
										</div>								    
								    </div>
								    
								    <div class="form-item">
								        <label>Domicilio</label>
								        <input type="text" id="dom-mam" name="dom-mam">
									 </div>
									 <div class="form-item">
								        <label>Teléfono</label>
								        <input type="number" id="tel-mam" name="tel-mam">
									 </div>								      
			        			</div>
						    </div>
						    <!-- Segunda parte -->
						    <hr>
						    <div class="row centered anexosBox" style="text-align: center;">
						    <p>Nombre de tus hermanos por edad (del mayor al menor incluyéndote tú)</p>
						    	<div class="col col-5">
									Nombre						    	
						    	</div>
						    	<div class="col col-2">
									Fecha de Nacimiento						    	
						    	</div>
						    	<div class="col col-2">
									Sexo						    	
						    	</div>
						    	<div class="col col-3">
									Estudios						    	
						    	</div>
						    </div>
						    <div style="margin-top: 2%;" class="row">
						    	<div class="col col-4">
									<input type="text"  name="nom-herm1">						    	
						    	</div>
						    	<div class="col col-3">
									<input type="date"  name="fec-herm1">						    	
						    	</div>
						    	<div class="col col-2">
									<input type="text"  name="sex-herm1">						    	
						    	</div>
						    	<div class="col col-3">
									<input type="text"  name="est-herm1">						    	
						    	</div>
						    </div>
						    <hr id="hermanos">
						    <div class="row">
						    	<div class="col col-1 offset-8">
											<span id="cont-hermanos">1</span>			    	
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
								        <label>Ingresos mensuales de tu familia</label>
								        <input  type="number" id="ing-men" name="ing-men" class="width-100" >
								    </div>
								    
								    <div  class="form-item">
								        <label>En caso de ser económicamente independiente a cuanto asciente tu ingreso</label>
								        <input  type="number" id="ing-per" name="ing-per" class="width-100" >
								    </div>
									<div class="titulos">Donde realizaste tus estudios de</div><br>
								    <div  class="form-item">
								        <label>Primaria</label>
								        <input type="text" id="primaria" name="primaria" class="width-100">
								    </div>
								    
								    <div  class="form-item">
								        <label>Secundaria</label>
								        <input type="text" id="secundaria" name="secundaria" class="width-100">
								    </div>
								    
								    <div  class="form-item">
								        <label>Bachillerato</label>
								        <input type="text" id="bachiller" name="bachiller" class="width-100">
								    </div>
								    
								    <div class="form-item">
								        <label>Estudios superiores</label>
								        <input type="text" id="est-sup" name="est-sup" class="width-100">
								    </div>
								    
								    		<div class="form-item">
										        <label>¿Cuenta con prescripción médica de alguna deficiencia sensorial o funcionalidad que
										        le obligue a llevar aparatos o controlar tu actividad física?</label>
										        <select class="select" id="pro-med" name="pro-med">
										        	<option value="">-- Selecciona --</option>
										        	<option value="Si">Si</option>
										        	<option value="No">No</option>
										        </select>
										    </div>
										
										<div class="form-item">
								        <label>Indica cuales</label>
								        <input type="text" id="cua-med" name="cua-med" class="width-100">
								    </div>
								        <div class="titulos">Estado Psicofisiologicos</div><br>
								        <div class="form-item">
										        <label>Manos y/o pies hinchados</label>
										        <select class="select"  name="mapi-hin">
										        	<option value="Frecuente">Frecuente</option>
										        	<option value="Muy Frecuente">Muy Frecuente</option>
										        	<option value="Nunca" selected>Nunca</option>
										        	<option value="Antes">Antes</option>
										        	<option value="A veces">A veces</option>
										        </select>
										    </div>
										 <div class="form-item">
										        <label>Dolores en el vientre</label>
										        <select class="select"  name="dol-vie">
										        	<option value="Frecuente">Frecuente</option>
										        	<option value="Muy Frecuente">Muy Frecuente</option>
										        	<option value="Nunca" selected>Nunca</option>
										        	<option value="Antes">Antes</option>
										        	<option value="A veces">A veces</option>
										        </select>
										    </div>
										    <div class="form-item">
										        <label>Dolores de cabeza y/o vómitos</label>
										        <select class="select"  name="dol-cab">
										        	<option value="Frecuente">Frecuente</option>
										        	<option value="Muy Frecuente">Muy Frecuente</option>
										        	<option value="Nunca" selected>Nunca</option>
										        	<option value="Antes">Antes</option>
										        	<option value="A veces">A veces</option>
										        </select>
										    </div>
										 <div class="form-item">
										        <label>Pérdida de equilibrio</label>
										        <select class="select"  name="per-equ">
										        	<option value="Frecuente">Frecuente</option>
										        	<option value="Muy Frecuente">Muy Frecuente</option>
										        	<option value="Nunca" selected>Nunca</option>
										        	<option value="Antes">Antes</option>
										        	<option value="A veces">A veces</option>
										        </select>
										    </div>
										    <div class="form-item">
										        <label>Fatiga y agotamiento</label>
										        <select class="select"  name="fat-ago">
										        	<option value="Frecuente">Frecuente</option>
										        	<option value="Muy Frecuente">Muy Frecuente</option>
										        	<option value="Nunca" selected>Nunca</option>
										        	<option value="Antes">Antes</option>
										        	<option value="A veces">A veces</option>
										        </select>
										    </div>
										 <div class="form-item">
										        <label>Pérdida de vista u oído</label>
										        <select class="select"  name="vis-oid">
										        	<option value="Frecuente">Frecuente</option>
										        	<option value="Muy Frecuente">Muy Frecuente</option>
										        	<option value="Nunca" selected>Nunca</option>
										        	<option value="Antes">Antes</option>
										        	<option value="A veces">A veces</option>
										        </select>
										    </div>
			        			</div>
			        			<!-- inicia segunda columna -->
			        			<div class="col col-5 offset-1 anexosBox">
			        			 <div class="form-item">
										        <label>Dificultades para dormir</label>
										        <select class="select"  name="dif-dor">
										        	<option value="Frecuente">Frecuente</option>
										        	<option value="Muy Frecuente">Muy Frecuente</option>
										        	<option value="Nunca" selected>Nunca</option>
										        	<option value="Antes">Antes</option>
										        	<option value="A veces">A veces</option>
										        </select>
										    </div>
										    <div class="form-item">
										        <label>Pesadillas o terrores nocturnos</label>
										        <select class="select"  name="pes-ter">
										        	<option value="Frecuente">Frecuente</option>
										        	<option value="Muy Frecuente">Muy Frecuente</option>
										        	<option value="Nunca" selected>Nunca</option>
										        	<option value="Antes">Antes</option>
										        	<option value="A veces">A veces</option>
										        </select>
										    </div>
										    <div class="form-item">
										        <label>¿A qué?</label>
										        <input type="text" id="pes-ter-que" name="pes-ter-que" class="width-100">
										    </div>
										 <div class="form-item">
										        <label>Incontinencia (orina, heces)</label>
										        <select class="select"  name="incon">
										        	<option value="Frecuente">Frecuente</option>
										        	<option value="Muy Frecuente">Muy Frecuente</option>
										        	<option value="Nunca" selected>Nunca</option>
										        	<option value="Antes">Antes</option>
										        	<option value="A veces">A veces</option>
										        </select>
										    </div>
										    <div class="form-item">
										        <label>Tartamudeos al explicarse</label>
										        <select class="select"  name="tarta">
										        	<option value="Frecuente">Frecuente</option>
										        	<option value="Muy Frecuente">Muy Frecuente</option>
										        	<option value="Nunca" selected>Nunca</option>
										        	<option value="Antes">Antes</option>
										        	<option value="A veces">A veces</option>
										        </select>
										    </div>
										 <div class="form-item">
										        <label>Miedos intensos ante cosas</label>
										        <select class="select"  name="mie-cos">
										        	<option value="Frecuente">Frecuente</option>
										        	<option value="Muy Frecuente">Muy Frecuente</option>
										        	<option value="Nunca" selected>Nunca</option>
										        	<option value="Antes">Antes</option>
										        	<option value="A veces">A veces</option>
										        </select>
										    </div>
										 <div class="form-item">
										        <label>Observaciones de higiene</label>
										        <input type="text" name="obs-hig" class="width-100">
										  </div>   
								    <div class="titulos">Áreas de Integración</div><br>
								    Área familiar<br>
								    	<div class="form-item">
										        <label>¿Cómo es la relación con tu familia?</label>
										        <input type="text" name="rel-fam" class="width-100">
										  </div>
										  <div class="form-item">
										        <label>¿Existen dificultades, de qué tipo?</label>
										        <input type="text" name="dif-fam" class="width-100">
										  </div>
										  <div class="form-item">
										        <label>¿Qué actitud tienes con tu familia?</label>
										        <input type="text" name="act-fam" class="width-100">
										  </div>
									El Padre<br>
								    	<div class="form-item">
										        <label>¿Cómo te relacionas con tu padre?</label>
										        <input type="text" name="rel-pap" class="width-100">
										  </div>
										  <div class="form-item">
										        <label>¿Qué actitud tienes hacia tu padre?</label>
										        <input type="text" name="act-pap" class="width-100">
										  </div>
									La madre<br>
								    	<div class="form-item">
										        <label>¿Cómo te relacionas con tu madre?</label>
										        <input type="text" name="rel-mam" class="width-100">
										  </div>
										  <div class="form-item">
										        <label>¿Qué actitud tienes hacia tu madre?</label>
										        <input type="text" name="act-mam" class="width-100">
										  </div> 
								    <div class="row">
								    	<div class="col col-7">
								    		<div class="form-item">
										    <button type="submit" class="button aceptar width-100" name="1-1" id="guardar-anexos">Guardar formato <i class="fa fa-check fa-lg"></i></button>
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
										if (cuantos <= 10) {
											$('span#cont-hermanos').text(cuantos);

											$('hr#hermanos').append('<div style="margin-top: 1%;"  class="row">'+
											    	'<div class="col col-4">'+
														'<input type="text"  name="nom-herm'+cuantos+'">'+						    	
											    	'</div>'+
											    	'<div class="col col-3">'+
														'<input type="date"  name="fec-herm'+cuantos+'">'+					    	
											    	'</div>'+
											    	'<div class="col col-2">'+
														'<input type="text"  name="sex-herm'+cuantos+'">'+						    	
											    	'</div>'+
											    	'<div class="col col-3">'+
														'<input type="text"  name="est-herm'+cuantos+'">'+						    	
											    	'</div><span id="eliminar" style="cursor: pointer; margin-top: 1%; float: right;" class="label error">Quitar</span>'+
											    '</div>');
													}
											});
										
											$('div#ContenedorPrincipal').on('click','span#eliminar', function () {
												$(this).parent().remove();
												var cuantos = parseInt($('span#cont-hermanos').text()) - 1;
												$('span#cont-hermanos').text(cuantos);
											});					    		
						    		
						    			$("div#msj input").tipso({
											  showArrow: true,
											  position: "top",
											  background: "rgba(0, 0, 0, 0.5)",
											  color: "#eee",
											  useTitle: false,
											  animationIn: "bounceIn",
											  animationOut: "bounceOut",
											  size: "small"
										});
										
    
										    $("#sel-img").change(function(){
										        readURL(this);
										    });
										    
    									 function readURL(input) {
								        if (input.files && input.files[0]) {
								            var reader = new FileReader();
								            
								            reader.onload = function (e) {
								                $('#preview').attr('src', e.target.result).addClass('fadeIn');
								            }
								            
								            reader.readAsDataURL(input.files[0]);
								        }
								    }
						    	});
						    </script>
						<!-- </form> -->						
			        	</form>
			        	</div>
			        	
		        </div>
		    </div>
		</div>
</div>
		
