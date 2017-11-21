$(document).ready(function () {
	$('.sidebar').sticky('.menuDeta');
	// ------- Efectos de seleccion de elemento en menu izquierdo
	$('div#my-collapse').on('click', 'a', function () {
		//setear opcion principal en la cookie
		$.cookie('op', $(this).attr('id'), {path: '/'});			
	});
	
	$('div#dropdown-fixed').on('click', 'a#change-pass', function (e) {
		e.preventDefault();
		
		$('div#ContenedorPrincipal').load('menu/change-pass.php');
	});

	$("div#ContenedorPrincipal").on('click', 'a.tema', function (e) {
		e.preventDefault();
		var dato = $(this).closest('tr').attr('id');

		alert(dato);

		var subop = "ver-tema";
		$.cookie('subop', subop, {path: '/'});
		//llamamos la funcion que regresara los comentarios del tema
		consultarDatos(dato);
	});
	
	$('div#my-collapse').on('click', 'li', function () {
		var subop = $(this).attr('id');
		//setear opcion secundaria, proviene del submenu
		$.cookie('subop', subop, {path: '/'});
		$('div#my-collapse').find('li.seleccion').removeClass();
		$('div#my-collapse').find('span#seleccion').remove();
		var seleccion = '';
		$(this).html(seleccion + $(this).text());
		$(this).addClass('seleccion');
		
		switch($.cookie('op')+"-"+subop) {
			case 'consultar-alum':
				popUpMsj('Ingresa Número de Control.', 0);
			break;
			case 'consultar-prof':
				popUpMsj('Ingresa <b>RFC</b><span class="label tag error"><br>Mínimo 3 o más caracteres</span>', 1);
			break;
			case 'catalogos-care':
				consultarInfo();
			break;
			case 'catalogos-grup':
				consultarInfo();
			break;
			case 'catalogos-tuto':
				consultarInfo();
			break;
			case 'catalogos-coor':
				consultarInfo();
			break;
			case 'catalogos-arch':
				consultarInfo();
			break;
			case 'avisos-vera':
				consultarInfo();
			break;
			case 'foro-vert':
				consultarInfo();
			break;
			case 'catalogos-imag':
				$('div#ContenedorPrincipal').load('../php/catalogos-imag.php');
			break;			
			default:
			cargarOpcion();
			break;
		}
		$.cookie('subop', subop, {path: '/'});	
	});
		// click en boton editar carrare en catalogos
	$("div#ContenedorPrincipal").on('click', 'tbody#resultadoBus span#edit-prof',function (e) {
		var dato = $(this).closest('td').attr('id');
			alertify.okBtn('Continuar').cancelBtn('Cancelar').confirm('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Editarás los datos de un profesor, <br><b style="color: #400101;">¿estás seguro?</b>', function () {
					$.cookie('dato', dato,{path: '/'});
					$('div#ContenedorPrincipal').load('menu/edit-prof.php');
			}, function() {
			    
			});
	});
			// click en boton para seleccionar que imagen nueva se cargara
	$("div#ContenedorPrincipal").on('click', 'form#modal-cargar-imagen button',function (e) {
		e.preventDefault();
		var tipo = $(this).attr('id');
		     alertify.confirm("Se subirá una nueva imagen, <b>¿deseas continuar?</b>", function () {
				$.cookie('img', tipo,{path: '/'});
				$('div#ContenedorPrincipal').find('div#img-box').remove();
				$('div#ContenedorPrincipal').find('form#modal-cargar-imagen').append($('<div>').load('../php/'+tipo+'.php'));
					}, function() {
						$.removeCookie('img', {path: '/'});
						location.reload();
					});		
	});
		// click en boton editar grupos en catalogos
	$("div#ContenedorPrincipal").on('click', 'tbody#resultadoBus span#edit-grup',function (e) {
		var dato = $(this).closest('td').attr('id');
			alertify.okBtn('Continuar').cancelBtn('Cancelar').confirm('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Editarás los datos de un grupo, <br><b style="color: #400101;">¿estás seguro?</b>', function () {
					$.cookie('info', dato,{path: '/'});
					$('div#ContenedorPrincipal').load('menu/edit-grup.php');
			}, function() {
			    
			});
	});
			// click en boton editar alumnos en catalogos
	$("div#ContenedorPrincipal").on('click', 'tbody#resultadoBus span#edit-alum',function (e) {
		var dato = $(this).closest('td').attr('id');
			alertify.okBtn('Continuar').cancelBtn('Cancelar').confirm('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Editarás los datos de un alumno, <br><b style="color: #400101;">¿estás seguro?</b>', function () {
					$.cookie('info', dato,{path: '/'});
					$('div#ContenedorPrincipal').load('menu/edit-alum.php');
			}, function() {
			    
			});
	});
			// click en boton eliminar archivos en catalogos
	$("div#ContenedorPrincipal").on('click', 'tbody#resultadoBus span#edit-arch',function (e) {
		var id = $(this).closest('tr').attr('id');
		var archivo = $(this).closest('td').attr('id');
			alertify.okBtn('Continuar').cancelBtn('Cancelar').confirm('<p style="text-align: center;"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Eliminarás un archivo, <br><b style="color: #400101;">¿estás seguro?</b></p>', function () {
					$.cookie('subop', 'elim-arch',{path: '/'});
					eliminarArch(id, archivo, 'administrador-catalogos');
			}, function() {
			    
			});
	});
	
			// click en boton eliminar archivos en catalogos
	$("div#ContenedorPrincipal").on('click', 'tbody#resultadoBus span#elim-avisos',function (e) {
		var id = $(this).closest('tr').attr('id');
		var archivo = $(this).closest('td').attr('id');
			alertify.okBtn('Continuar').cancelBtn('Cancelar').confirm('<p style="text-align: center;"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Eliminarás un aviso, <br><b style="color: #400101;">¿estás seguro?</b></p>', function () {
					$.cookie('subop', 'elim-arch',{path: '/'});
					eliminarArch(id, archivo, 'administrador-catalogos');
			}, function() {
			    
			});
	});
	// click en boton editar carrare en catalogos
	$("div#ContenedorPrincipal").on('click', 'tbody#resultadoBus span#row-carrera',function (e) {
		  var datos = new Array();
		  var tableData = $(this).closest("tr").children('td').each(function () {
		  datos.push($(this).text());
  				});
			alertify.cancelBtn('Cancelar').confirm('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Editarás la carrera, <b style="color: #400101;">¿estás seguro?</b>', function () {
					var title = '<span class="animated fadeInUp label success">Editar Carrera</span>';
					var id = '<div class="animated fadeInUp form-item"><label>ID Carrera: <b>'+datos[0]+'</b></label><input type="hidden"  id="idCarrera" name="idCarrera" class="width-100" value="'+datos[0]+'"></div>';
					var carrera = '<div class="animated fadeInUp form-item"><label>Carrera</label><input type="text"  id="carrera" name="carrera" class="width-100" value="'+datos[1]+'"></div>';
					var btns = '<div class="row"><div class="col col-7"><div class="form-item"><button type="submit" class="button aceptar width-100" id="edit-">Actualizar <i class="fa fa-check fa-lg"></i></button></div></div><div class="col"><div class="form-item"><button class="button oscuro width-100" id="cancel"><i class="fa fa-ban fa-lg"></i> Cancelar</button></div></div></div>';		  						  				
		  			$("div#ContenedorPrincipal").find("form#editar-carrera").html(title+id+carrera+btns);
			}, function() {
			    
			});
	});
	// click en boton eliminar en bajas cualquier boton
	$("div#ContenedorPrincipal").on('click', 'button#eliminar',function (e) {
		  e.preventDefault();
		  var tipo;
		  $.cookie('subop') == 'alum' ? tipo = 2 : tipo = 1;
		  consultarInfo(tipo);
	});
	// click en boton guardar cualquier boton
	$("div#ContenedorPrincipal").on('click', 'button#guardar',function (e) {
		  e.preventDefault();
		  var form = $(this).closest('form').attr('id');
		  console.log(form);
		  if (evaluarModal(form)) {
		  if(form == 'administrador-administrar') {
		  		changePass($('div#ContenedorPrincipal').find('form#'+form)[0], form); 
		  		}
		  		else{
		  		guardarDatos($('div#ContenedorPrincipal').find('form#'+form)[0]);
		  		} 
		  	}
	});
	// click en boton guardar cualquier boton
	$("div#ContenedorPrincipal").on('click', 'button#edit-alum',function (e) {
		  e.preventDefault();
		  var id = $(this).attr('name');
		  var form = $(this).closest('form').attr('id');
		  if (evaluarModal(form)) {
		  		guardarDatos($('div#ContenedorPrincipal').find('form#'+form)[0], 1, id);
		  	}
	});
	// click en boton guardar archivo cualquier boton
	$("div#ContenedorPrincipal").on('click', 'button#guardar-arch',function (e) {
		  e.preventDefault();
		  var form = $(this).closest('form').attr('id');
		  validarArchivo(form);
	});
	
		// click en boton generar pdf cualquier boton
	$("div#ContenedorPrincipal").on('click', 'button#gen-pdf',function (e) {
		  e.preventDefault();
		  var form = $(this).closest('form').attr('id');
		  if (validarBoxesConstTutor(form)) {
		  		generarPDF();
		  	}
	});
	
	// click en boton actualizar cualquier boton
	$("div#ContenedorPrincipal").on('click', 'button#edit-',function (e) {
		  e.preventDefault();
		  var id = $(this).attr('id');
		  var op = $(this).attr('name'); // Esta variable es unicamente para actualizar info de profe.
		  var form = $(this).closest('form').attr('id');
		  if (evaluarModal(form)) {
		  	if (op == 'edit-prof' || op == 'edit-grup') {
		  		advertenciaAct($('div#ContenedorPrincipal').find('form#'+form)[0], 1, id);
		  		}else{
		  		guardarDatos($('div#ContenedorPrincipal').find('form#'+form)[0], 1, id);
		  		}
		  	}
	});	
	// click en boton cancelar cualquier boton
	$("div#ContenedorPrincipal").on('click', 'button#cancel',function (e) {
		  e.preventDefault();
		  location.reload();
	});
	// -------- Disparador para mostrar tutores en cambio de carrera.
	$('div#ContenedorPrincipal').on('change', 'form#modal-altas-grup select#carrera, form#modal-constancias-tuto select#carrera',function() {
	  var form = $(this).closest('form').attr('id');
	  var carrera = $(this).val();
	  var donde = 'form#'+form+' select#tutor';
	  if(carrera.length != 0) {
	  	obtenerInfo('Tutor', carrera, donde);
	  $('div#ContenedorPrincipal').find('form#'+form+' select#grup').html('<option value="">-- Selecciona --</option>');
	  }
	  else { 
	  			$('div#ContenedorPrincipal').find(donde).html('<option value="">-- Selecciona --</option>');
	  			$('div#ContenedorPrincipal').find('form#'+form+' select#grup').html('<option value="">-- Selecciona --</option>');
				}
	});
		// -------- Disparador para mostrar grupos en cambio de tutor.
	$('div#ContenedorPrincipal').on('change', 'form#modal-constancias-tuto select#tutor',function() {
	  var form = $(this).closest('form').attr('id');
	  var tutor = $(this).val();
	  var donde = 'form#'+form+' select#grup';
	  if(carrera.length != 0) obtenerInfo('obtener-grup', tutor, donde);
	  else $('div#ContenedorPrincipal').find(donde).html('<option value="">-- Selecciona --</option>');
	});
			// -------- Disparador para mostrar grupos en cambio de tutor.
	$('div#ContenedorPrincipal').on('change', 'form#modal-edit-alum select#carrera',function() {
	  var form = $(this).closest('form').attr('id');
	  var tutor = $(this).val();
	  var donde = 'form#'+form+' select#grupo';
	  if(carrera.length != 0) obtenerInfo('obtener-grupos', tutor, donde);
	  else $('div#ContenedorPrincipal').find(donde).html('<option value="">-- Selecciona --</option>');
	});
	// ----------------- Msj advertencia de actualizacion
	function advertenciaAct(form, num, id) {
		var msj = '<div style="text-align: center;"><i class="fa fa-warning fa-2x"></i> Todos los cambios realizados no podrán recuperarse. <br><b style="color: red;">¿Estás seguro en continuar?</b></div>';
		alertify.okBtn('SI').cancelBtn('Cancelar').confirm(msj, function () {
					guardarDatos(form, num, id);
			    }, function() {
			      return false;
			  });
		}
  // ---------------- inician funciones.	
	function popUpMsj(msj, tipo) {
			alertify.okBtn('Buscar').cancelBtn('Cancelar').prompt(msj, function (val, ev) {
			      ev.preventDefault();
			      var dato = val.trim();
			      if (tipo == 1) {
			      if (dato.length >= 3) {
			      	consultarInfo(dato, tipo);
			      	}else {
			      	alertify.error('<i class="fa fa-warning"></i> Escribe una búsqueda correcta.</b>.');
			      	}
			      }else {
			      	if (dato.length == 8 && $.isNumeric(dato)) {
			      	consultarInfo(dato, tipo);
			      	}else {
			      	alertify.error('<i class="fa fa-warning"></i> Escribe un Número de Control correcto.</b>.');
			      	}
			      	}
			    }, function(ev) {
			      ev.preventDefault();
			      alertify.log("Has cancelado consulta... ");
			  });
		}

// ---- Funcion para obtener los tutores mediante AJAX 
	function consultarInfo(dato, btnTipo) {
		
		var archivo = $.cookie('tipo')+"-"+$.cookie('op')+".php";
		$.ajax({ 
					 data: {'dato': dato, 'btnEliminar': btnTipo},
                url: '../php/'+archivo,
                type: 'POST',
					 async: false,
                success: function (infoRegreso) {
                	if ($.isNumeric(infoRegreso)) {
							$('div#ContenedorPrincipal').html('<div class="alert error animated fadeInDown"><i class="fa fa-warning fa-2x"></i> <b>No se han encontrado coincidencias, intenta nuevamente.</b></div>');
                		}
                		else{
                			$('div#ContenedorPrincipal').html(infoRegreso);
                		}
                	}
            });
		}
	// -- Carga la opción seleccionada del menú
	function cargarOpcion() {
			var file = $.cookie('op')+"-"+$.cookie('subop')+".php";
			$('div#ContenedorPrincipal').load('menu/'+file);
			}		
	// ---- Funcion para obtener los tutores mediante AJAX 
	function obtenerInfo(rol, carrera, donde) {
		//$.cookie('accion', $.cookie('op')+"-"+$.cookie('subop'), {path: '/'});
		switch(rol) {
			case 'Tutor':
				$.cookie('accion', 'obtener-prof', {path: '/'});
			break;
			case 'obtener-grup':
				$.cookie('accion', rol, {path: '/'});
			break;
			case 'obtener-grupos':
				$.cookie('accion', rol, {path: '/'});
			break;
			}
		/*if(rol != '') $.cookie('accion', 'obtener-prof', {path: '/'});
		else $.cookie('accion', 'obtener-grup', {path: '/'});*/
		$.ajax({ 
					 data: {'rol': rol, 'carrera': carrera },
                url: '../php/generarCombos.php',
                type: 'POST',
					 async: false,
                success: function (infoRegreso) {
                	$('div#ContenedorPrincipal').find(donde).html(infoRegreso);
                	}
            });
      $.removeCookie('accion', { path: '/' });
		}
//Evalua todos los campos de cualquier modal form.
	function evaluarModal(modal) {
		var ids = new Array();
		var inputs = new Array();  

		$('div#ContenedorPrincipal').find("form#"+modal+" input, select").each(function() {
			inputs.push($(this).val().trim());
			ids.push($(this).attr('id'));
		});
		
		switch($.cookie('subop')) {	
			case 'grup':
				if (!validarGrupo(inputs, ids, modal)) return false; 
				else return true;
			break;
			case 'care':
				if (!validarCarrera(inputs, ids, modal)) return false; 
				else return true;
			break;
			case 'prof':
				if (!validarProfesor(inputs, ids, modal)) return false; 
				else return true;
			break;
			case 'alum':
				if (!validarAlumno(inputs, ids, modal)) return false; 
				else return true;
			break;
			case 'change-pass':
			case 'change-pass-coord':
				if (!validarNewPass(inputs, ids, modal)) return false; 
				else return true;
			break;
			case 'nuev':
				if (!validarAviso(modal)) return false; 
				else return true;
			break;
		}	
	}
	// -------------------------------------------	
	function validarAviso(modal) {
		var ids = new Array();
		var inputs = new Array();  
		var cuantos = $('div#ContenedorPrincipal').find("form#"+modal+" input#aquien:checked").length;
		$('div#ContenedorPrincipal').find("form#"+modal+" textarea").each(function() {
			inputs.push($(this).val().trim());
			ids.push($(this).attr('id'));
		});
		
			if (inputs[0].length == 0) {
				$('div#ContenedorPrincipal').find("form#"+modal+" textarea#"+ids[0]).addClass('error');
				alertify.error('<i class="fa fa-warning"></i> No puedes dejar un aviso vacio.');
				return false;
				}
				
			if (cuantos == 0) {
				alertify.error('<i class="fa fa-warning"></i> Elige al menos uno a quien va dirigido el aviso.');
				return false;
				}

		return true;	
		}
	// ------------ Validaciones de Altas
	function validarGrupo(inputs, ids, modal) {
		var campos = ["Año", "Grupo id", "Nombre del Grupo", "Hora", "Salón", "Periodo", "Carrera", "Tutor"];
		for (var i = 0; i < inputs.length; i++) {
			$('div#ContenedorPrincipal').find("form#"+modal+" input#"+ids[i]).removeClass('error')
			if (inputs[i].length == 0 && i == 2) {
				$('div#ContenedorPrincipal').find("form#"+modal+" input#"+ids[i]).addClass('error');
				alertify.error('<i class="fa fa-warning"></i> El formato de <b>'+campos[i]+'</b> está incorrecto.');
				return false;
				}
			if (inputs[i].length == 0 && i == 3) {
				$('div#ContenedorPrincipal').find("form#"+modal+" input#"+ids[i]).addClass('error');
				alertify.error('<i class="fa fa-warning"></i> El formato de <b>'+campos[i]+'</b> está incorrecto.');
				return false;
				}
			if ((inputs[i].length == 0 || inputs[i].length > 3) && i == 4) {
				$('div#ContenedorPrincipal').find("form#"+modal+" input#"+ids[i]).addClass('error');
				alertify.error('<i class="fa fa-warning"></i> El formato de <b>'+campos[i]+'</b> está incorrecto.');
				return false;
				}
			if (inputs[i].length == 0 && i == 6) {
				$('div#ContenedorPrincipal').find("form#"+modal+" input#"+ids[i]).addClass('error');
				alertify.error('<i class="fa fa-warning"></i> El formato de <b>'+campos[i]+'</b> está incorrecto.');
				return false;
				}
			if (inputs[i].length == 0 && i == 7) {
				$('div#ContenedorPrincipal').find("form#"+modal+" input#"+ids[i]).addClass('error');
				alertify.error('<i class="fa fa-warning"></i> El formato de <b>'+campos[i]+'</b> está incorrecto.');
				return false;
				}
			}
			return true;
		}
	// -------------------------------------------	
	function validarAlumno(inputs, ids, modal) {
		if (modal != 'modal-edit-alum') {
		for (var i = 0; i < inputs.length; i++) {
			if ((inputs[i].length != 8 || !$.isNumeric(inputs[i])) && i == 0) {
				$('div#ContenedorPrincipal').find("form#"+modal+" input#"+ids[i]).addClass('error');
				alertify.error('<i class="fa fa-warning"></i> El formato de Número de control está incorrecto.');
				return false;
				}
			if ((inputs[i].length == 0 || inputs[i].length < 4) && i == 1) {
				$('div#ContenedorPrincipal').find("form#"+modal+" input#"+ids[i]).addClass('error');
				alertify.error('<i class="fa fa-warning"></i> El formato de contraseña está incorrecto.');
				return false;
				}
		}
		return true;
		}else{
		  return validarAlumnoEdit(inputs, ids, modal);
		}	
		}
				// ----------------------------------------------
	function validarNewPass(inputs, ids, modal) {
		for (var i = 0; i < inputs.length; i++) {
			$('div#ContenedorPrincipal').find("form#"+modal+" input#"+ids[i]).removeClass('error');
			
			if ((inputs[i].length == 0) && (i == 0)) {
				$('div#ContenedorPrincipal').find("form#"+modal+" input#"+ids[i]).addClass('error');
				alertify.error('<i class="fa fa-warning"></i> Escribe tu contraseña actual.');
				return false;
				}
			if (i == 1 && (inputs[i].length == 0 || inputs[i].length < 4)){
				$('div#ContenedorPrincipal').find("form#"+modal+" input#"+ids[i]).addClass('error');
				alertify.error('<i class="fa fa-warning"></i> La nueva contraseña debe tener al menos 4 caracteres.');
				return false;
			}
		}
		return true;
		}
			// ----------------------------------------------
	function validarAlumnoEdit(inputs, ids, modal) {
		var regex = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
		
		for (var i = 0; i < inputs.length; i++) {
			$('div#ContenedorPrincipal').find("form#"+modal+" input#"+ids[i]).removeClass('error');
			
			if ((inputs[i].length == 0) && (i != 2)) {
				$('div#ContenedorPrincipal').find("form#"+modal+" input#"+ids[i]).addClass('error');
				alertify.error('<i class="fa fa-warning"></i> Algún campo está vacio.');
				return false;
				}
			if (i == 2 && !regex.test(inputs[i])){
				$('div#ContenedorPrincipal').find("form#"+modal+" input#"+ids[i]).addClass('error');
				alertify.error('<i class="fa fa-warning"></i> El correo es invalido, verifica.');
				return false;
			}
		}
		return true;
		}
		// -------------------------------------------	
	function validarArchivo(modal) {
		var ids = new Array();
		var inputs = new Array(); 
		var arrayExtensions = ["doc" , "docx", "xls", "xlsx", "pdf", "zip", "rar"]; 

		$('div#ContenedorPrincipal').find("form#"+modal+" input").each(function() {
			inputs.push($(this).val().trim());
			ids.push($(this).attr('id'));
		});
		
		for (var i = 0; i < inputs.length; i++) {
			var ext = inputs[i].split(".");
		    ext = ext[ext.length-1].toLowerCase();      

		    if (arrayExtensions.lastIndexOf(ext) == -1) {
		        alertify.error('<i class="fa fa-warning"></i> Archivo no permitido o vacio.');
		        $('div#ContenedorPrincipal').find("form#"+modal+" input#"+ids[i]).val("");
		        var que = $('div#ContenedorPrincipal').find("form#"+modal+" div#"+ids[i]).text();
		        $('div#ContenedorPrincipal').find("form#"+modal+" div#"+ids[i]).html('<b style="color:#f34248;">'+que+'</b>');
		        return false;
		    }
		}
		guardarDatos($('div#ContenedorPrincipal').find('form#'+modal)[0]);
		}
	// -------------------------------------------	
	function validarCarrera(inputs, ids, modal) {
		for (var i = 0; i < inputs.length; i++) {
			if ((inputs[i].length != 4 || $.isNumeric(inputs[i])) && i == 0) {
				$('div#ContenedorPrincipal').find("form#"+modal+" input#"+ids[i]).addClass('error');
				alertify.error('<i class="fa fa-warning"></i> El formato de Id Carrera está incorrecto.');
				return false;
				}
			if ((inputs[i].length == 0 || inputs[i].length > 128) && i == 1) {
				$('div#ContenedorPrincipal').find("form#"+modal+" input#"+ids[i]).addClass('error');
				alertify.error('<i class="fa fa-warning"></i> El formato de Carrera está incorrecto.');
				return false;
				}
		}
		return true;
		}
		
	// ----------------------------------------------
	function validarBoxesConstTutor(modal) {
	   var ids = new Array();
		var inputs = new Array();
		
		$('div#ContenedorPrincipal').find("form#"+modal+" input, select").each(function() {
			inputs.push($(this).val().trim());
			ids.push($(this).attr('id'));
		});	
		
		for (var i = 0; i < inputs.length; i++) {
			if (inputs[i].length == 0) {
				alertify.error('<i class="fa fa-warning"></i> Algún campo está sin seleccionar.');
				return false;
				}
			}
		$.cookie('info', inputs[2]+'_tutor', {path: '/'});
		return true;
		}
	// ----------------------------------------------
	function validarProfesor(inputs, ids, modal) {
		var regex = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
		var rfc = /^[A-Za-zÑñ]{4}[0-9]{6}[A-Za-z0-9]{3}$/;
		//var tutor =	$('div#ContenedorPrincipal').find("form#"+modal+" input#tutor").is(':checked');
		
		for (var i = 0; i < inputs.length; i++) {
			$('div#ContenedorPrincipal').find("form#"+modal+" input#"+ids[i]).removeClass('error');
			
			if ((inputs[i].length != 13 || !rfc.test(inputs[i])) && i == 0) {
				$('div#ContenedorPrincipal').find("form#"+modal+" input#"+ids[i]).addClass('error');
				alertify.error('<i class="fa fa-warning"></i> El formato del RFC es incorrecto.');
				return false;
				}
			if (ids[1] == 'pass' && inputs[1].length < 4 && i == 1) { // Este if es para cambio de pass en profe.
					$('div#ContenedorPrincipal').find("form#"+modal+" input#"+ids[i]).addClass('error');
					alertify.error('<i class="fa fa-warning"></i> La contraseña es muy corta, verifica.');
					return false;
				}
			if ((inputs[i].length == 0 || inputs[i].length > 128) && (i >= 1 && i <= 4)) {
					$('div#ContenedorPrincipal').find("form#"+modal+" input#"+ids[i]).addClass('error');
					alertify.error('<i class="fa fa-warning"></i> Algún campo está vacio o incorrecto, verifica.');
					return false;
				}
			if (i == 5 && !regex.test(inputs[i])){
				$('div#ContenedorPrincipal').find("form#"+modal+" input#"+ids[i]).addClass('error');
				alertify.error('<i class="fa fa-warning"></i> El correo es invalido, verifica.');
				return false;
			}
			if (i == 6 && inputs[i].length < 4){
				$('div#ContenedorPrincipal').find("form#"+modal+" input#"+ids[i]).addClass('error');
				alertify.error('<i class="fa fa-warning"></i> La contraseña es muy corta, verifica.');
				return false;
			}
		}
		return true;
		}
	// ---------- Mediante AJAX se generan PDF
	function generarPDF() {	
		window.open('../reportes/reporte.php', '_blank');
	}
	
	// ---------Se envian los datos serializados para poder cambiar pass admin.
	function changePass(form, file) {
		var formulario = new FormData(form);
		
					$.ajax({
                data: formulario, 
                url: '../php/'+file+'.php',
                type: 'POST',
                async: false,
		          cache: false,
		          contentType: false,
		          processData: false,
                beforeSend: function () {
                //¿que hace antes de enviar?
                },
                success: function (infoRegreso) {
                    switch(parseInt(infoRegreso))
                    {
                  case -1:
                  	alertify.error('<i class="fa fa-warning fa-lg"></i> Tu contraseña actual no es correcta, intenta nuevamente.');
                  	break;
						case 1:
                        alertify.logPosition("bottom right").success('Guardado correctamente. <i class="fa fa-thumbs-o-up fa-lg"></i>');
                        cargarOpcion();
                        break;
                  case 3:
                        alertify.logPosition("bottom right").success('La contraseña se cambió correctamente. <i class="fa fa-thumbs-o-up fa-lg"></i>');
                        $('div#ContenedorPrincipal').load('menu/change-pass.php');
                        break;
               	default:
                        alertify.error('<i class="fa fa-warning fa-lg"></i> '+infoRegreso);
                        break;
               		}
               	},
                  error: function () {
                     alertify.error('<i class="fa fa-warning fa-lg"></i> Ups... ha ocurrido un error, intenta nuevamente.');
                  }
            });
	}
		// ---------Se envian los datos serializados para poder guardar.
	function eliminarArch(id, archivo, file) {
					$.ajax({
                data: {"archivo": archivo, "id": id}, 
                url: '../php/'+file+'.php',
                type: 'POST',
                async: false,
                beforeSend: function () {
                //¿que hace antes de enviar?
                },
                success: function (infoRegreso) {
                    switch(parseInt(infoRegreso))
                    {
                  case -1:
                  	alertify.error('<i class="fa fa-warning fa-lg"></i> No se elimino archivo, intenta nuevamente.');
                  	break;
						case 1:
                        alertify.logPosition("bottom right").success('Eliminado correctamente. <i class="fa fa-thumbs-o-up fa-lg"></i>');
                        $("div#ContenedorPrincipal").find('tbody#resultadoBus tr#'+id).remove();
                        break;
               	default:
                        alertify.error('<i class="fa fa-warning fa-lg"></i> '+infoRegreso);
                        break;
               		}
               	},
                  error: function () {
                     alertify.error('<i class="fa fa-warning fa-lg"></i> Ups... ha ocurrido un error, intenta nuevamente.');
                  }
            });
	}
	// ---------Se envian los datos serializados para poder guardar.
	function guardarDatos(form, edit, id) {
		var cookieTemp = $.cookie('subop');
		var file = $.cookie('tipo')+"-"+$.cookie('op');
		if(edit == 1){
			cookieTemp = $.cookie('subop');
			$.cookie('subop', id+cookieTemp, {path: "/"});
		}

		var formulario = new FormData(form);
					$.ajax({
                data: formulario, 
                url: '../php/'+file+'.php',
                type: 'POST',
                async: false,
		          cache: false,
		          contentType: false,
		          processData: false,
                beforeSend: function () {
                //¿que hace antes de enviar?
                },
                success: function (infoRegreso) {
                    switch(parseInt(infoRegreso))
                    {
                  case -1:
                  	alertify.error('<i class="fa fa-warning fa-lg"></i> No existe ese usuario, verifica nuevamente.');
                  	break;
                  case -2:
                  	alertify.error('<i class="fa fa-warning fa-lg"></i> Error al subir archivos, intenta nuevamente.');
                  	break;
						case 1:
                        alertify.logPosition("bottom right").success('Guardado correctamente. <i class="fa fa-thumbs-o-up fa-lg"></i>');
                        cargarOpcion();
                        break;
                  case 2:
		                  alertify.logPosition("bottom right").success('Actualizado correctamente. <i class="fa fa-thumbs-o-up fa-lg"></i>');
		                  $.cookie('subop', cookieTemp, {path: "/"});
								$('div#ContenedorPrincipal').load('menu/panel.php');
		                  break;
		            case 3:
		            		alertify.logPosition("bottom right").success('Se cambió contraseña correctamente. <i class="fa fa-thumbs-o-up fa-lg"></i>');
		            		cargarOpcion();
		            		break;
               	default:
                        alertify.error('<i class="fa fa-warning fa-lg"></i> '+infoRegreso);
                        break;
               		}
               	},
                  error: function () {
                     alertify.error('<i class="fa fa-warning fa-lg"></i> Ups... ha ocurrido un error, intenta nuevamente.');
                  }
            });
        $.cookie('subop', cookieTemp, {path: "/"});
		}
		
});