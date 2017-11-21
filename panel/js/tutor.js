$(document).ready(function () {
	// --------------------------- Chat

	$('.chat_head, div#chatear').click(function(){
		$('.chat_body').slideToggle('slow');
	});
	$('.msg_head').click(function(){
		$('.msg_wrap').slideToggle('slow');
	});
	
	$('.closes').click(function(){
		$('.msg_box').hide();
	});
	
	$('.user').click(function(){

		$('.msg_wrap').show();
		$('.msg_box').show();
	});
	
	$('textarea').keypress(
    function(e){
        if (e.keyCode == 13) {
            e.preventDefault();
            var msg = $(this).val();
			$(this).val('');
			if(msg!='')
			$('<div class="msg_b">'+msg+'</div>').insertBefore('.msg_push');
			$('.msg_body').scrollTop($('.msg_body')[0].scrollHeight);
        }
    });
    // ------------------------------------------
 	 $("p#tooltip").tipso({
		  showArrow: true,
		  position: 'bottom',
		  background: 'rgba(0, 0, 0, 0.5)',
		  color: '#eee',
		  useTitle: false,
		  animationIn: 'bounceIn',
		  animationOut: 'bounceOut',
		  size: 'small'
	});
	
	$('.sidebar').sticky('.menuDeta');
	// ------- Efectos de seleccion de elemento en menu izquierdo
	$('div#my-collapse').on('click', 'a', function () {
		$.cookie('op', $(this).attr('id'), {path: '/'});	
	});
	
	$('div#dropdown-fixed').on('click', 'a#change-pass-prof', function (e) {
		e.preventDefault();
		$.cookie('subop', 'change-pass-prof', {path: '/'});
		$('div#ContenedorPrincipal').load('menu/change-pass.php');
	});
	
	$('div#dropdown-fixed').on('click', 'a#bandeja-citas', function (e) {
		e.preventDefault();
		$.cookie('subop', 'bandeja-citas', {path: '/'});
		$('div#ContenedorPrincipal').load('menu/bandeja.php');
	});
	
	$("div#opciones").on('click', 'p',function (e) {
		  var op = $(this).parent('div').attr('id');
		  $.cookie('subop', op, {path: '/'});
		$('div#ContenedorPrincipal').load('menu/'+op+'.php');
	});	
	
	$('div#my-collapse').on('click', 'li', function () {
		var subop = $(this).attr('id');
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
			case 'documentos-arch':
				consultarInfo();
			break;
			case 'avisos-vera-tuto':
				consultarInfo();
			break;
			case 'evaluacion-impr':
			//window.open('../php/grafico_reporte.php', '_blank');
			$('div#ContenedorPrincipal').load('../reportes/grafico_reporte.php');
			break;		
			case 'foro-vert':
				consultarInfo();
			break;			
			default:
			cargarOpcion();
			break;
		}
		$.cookie('subop', subop, {path: '/'});	
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

	// click en boton eliminar en bajas cualquier boton
	$("div#ContenedorPrincipal").on('click', 'button#eliminar',function (e) {
		  e.preventDefault();
		  var tipo;
		  $.cookie('subop') == 'alum' ? tipo = 2 : tipo = 1;
		  consultarInfo(tipo);
	});
	// click en boton eliminar en bajas cualquier boton
	$("div#ContenedorPrincipal").on('click', 'button#impre-graf',function (e) {
		  e.preventDefault();
		  window.open('../reportes/evaluacion.php', '_blank');
	});
// click en boton guardar cualquier boton
	$("div#ContenedorPrincipal").on('click', 'button#guardar',function (e) {
		  e.preventDefault();
		  var form = $(this).closest('form').attr('id');
		  if (evaluarModal(form)) {
		  	if (form == 'administrador-administrar') {
		  			changePass($('div#ContenedorPrincipal').find('form#'+form)[0], form);
		  		}
		  		else guardarDatos($('div#ContenedorPrincipal').find('form#'+form)[0]);
		  	}
	});
	
		$("div#ContenedorPrincipal").on('click', 'button#consultar',function (e) {
		  e.preventDefault();
		  var form = $(this).closest('form').attr('id');
		  var donde = 'form#'+form+' div#informacion';
		  if (evaluarModal(form)) {
		  			var id = $("div#ContenedorPrincipal").find('form#modal-consultas-expe input#id').val();
		  			obtenerInfo(id, donde);
		  	}
	});
	
				// click en boton eliminar archivos en catalogos
	$("div#ContenedorPrincipal").on('click', 'tbody#resultadoBus span#elim-aviso',function (e) {
		var id = $(this).closest('tr').attr('id');
		var archivo = $(this).closest('td').attr('id');
			alertify.okBtn('Continuar').cancelBtn('Cancelar').confirm('<p style="text-align: center;"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Eliminarás un aviso, <br><b style="color: #400101;">¿estás seguro?</b></p>', function () {
					$.cookie('subop', 'elim-avis',{path: '/'});
					eliminarArch(id, archivo, 'administrador-catalogos');
			}, function() {
			    
			});
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
	
	
	// click en boton cancelar cualquier boton
	$("div#ContenedorPrincipal").on('click', 'button#cancel',function (e) {
		  e.preventDefault();
		  location.reload();
	});

		// -------- Disparador para mostrar grupos en cambio de grupo en encuestas
	$('div#ContenedorPrincipal').on('change', 'form#modal-consultas-encu select#grupo',function() {
	  var form = $(this).closest('form').attr('id');
	  var grupo = $(this).val();
	  var donde = 'form#'+form+' div#informacion';
	  if(grupo.length != 0) {
	  	obtenerInfo(grupo, donde);
	  	$("div#ContenedorPrincipal").find('form#modal-consultas-encu button#genpdf').removeAttr("disabled");
	  } 
	  else {
	  	$('div#ContenedorPrincipal').find(donde).html('');
	  	$("div#ContenedorPrincipal").find('form#modal-consultas-encu button#genpdf').attr("disabled", true);
	  }
	});
	
	// --------- genera pdf de la encuestas
	$('div#ContenedorPrincipal').on('click', 'form#modal-consultas-encu button#genpdf',function() {
	  var grupo = $("div#ContenedorPrincipal").find('form#modal-consultas-encu select#grupo').val();
	  if(grupo.length != 0) {
		$.cookie('info', grupo+'_encu', {path: '/'});
		generarPDF();
	  }
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
	function obtenerInfo(grupo, donde) {
		$.ajax({ 
					 data: {'grupo': grupo},
                url: '../php/tutor-consultas.php',
                type: 'POST',
					 async: false,
                success: function (infoRegreso) {
                	switch(parseInt(infoRegreso)){
                		case -1: alertify.alert('No se encontraron resultados...'); break;
                		case -2: alertify.alert('El alumno(a) aún no ha registrado materias ni calificaciones.'); break;
                		default: $('div#ContenedorPrincipal').find(donde).html(infoRegreso);
                	}
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
			case 'alta':
			case 'baja':
				if (!validarAlta(inputs, ids, modal)) return false; 
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
			case 'expe':
			case 'kard':
				if (!validarAlumno(inputs, ids, modal)) return false; 
				else return true;
			break;
			case 'alum':
			case 'camb':
				if (!validarAlumno(inputs, ids, modal)) return false; 
				else return true;
			break;
			case 'change-pass-prof':
				if (!validarNewPass(inputs, ids, modal)) return false; 
				else return true;
			break;
			case 'nuev-tuto':
				if (!validarAviso(modal)) return false; 
				else return true;
			break;
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
		// -------------------------------------------	
	function validarAviso(modal) {
		var ids = new Array();
		var inputs = new Array();  
		$('div#ContenedorPrincipal').find("form#"+modal+" textarea, select").each(function() {
			inputs.push($(this).val().trim());
			ids.push($(this).attr('id'));
		});
		
			if (inputs[0].length == 0) {
				$('div#ContenedorPrincipal').find("form#"+modal+" textarea#"+ids[0]).addClass('error');
				alertify.error('<i class="fa fa-warning"></i> No puedes dejar un aviso vacio.');
				return false;
				}
			if (inputs[1].length == 0) {
				$('div#ContenedorPrincipal').find("form#"+modal+" textarea#"+ids[1]).addClass('error');
				alertify.error('<i class="fa fa-warning"></i> No has seleccionado al grupo que se enviará el aviso.');
				return false;
				}

		return true;	
		}
	// ------------ Validaciones de Altas
	function validarAlta(inputs, ids, modal) {
		for (var i = 0; i < inputs.length; i++) {
			$('div#ContenedorPrincipal').find("form#"+modal+" input#"+ids[i]).removeClass('error')
			if (inputs[i].length == 0 || inputs[i].length < 8 || parseInt(inputs[i]) < 0) {
				$('div#ContenedorPrincipal').find("form#"+modal+" input#"+ids[i]).addClass('error');
				alertify.error('<i class="fa fa-warning"></i> El formato del <b>No. de Control</b> está incorrecto.');
				return false;
				}
			}
			return true;
		}
	// -------------------------------------------	
	function validarAlumno(inputs, ids, modal) {
		for (var i = 0; i < inputs.length; i++) {
			if ((inputs[i].length != 8 || !$.isNumeric(inputs[i])) && i == 0) {
				$('div#ContenedorPrincipal').find("form#"+modal+" input#"+ids[i]).addClass('error');
				alertify.error('<i class="fa fa-warning"></i> El formato de Número de control está incorrecto.');
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

		if ($('div#ContenedorPrincipal').find("form#"+modal+" select").val() == '') {
				alertify.error('<i class="fa fa-warning"></i> Debes elegir un grupo a quien va dirigido el archivo.');
				return false;
				}		
		
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
		$.cookie('info', inputs[0]+'_tutor', {path: '/'});
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
                  	alertify.error('<i class="fa fa-warning fa-lg"></i> No existe ese No. de Control, intenta nuevamente.');
                  	break;
                  case -2:
                  	alertify.error('<i class="fa fa-warning fa-lg"></i> Error al subir archivos, intenta nuevamente.');
                  	break;
						case 1:
                        alertify.logPosition("bottom right").success('Guardado correctamente. <i class="fa fa-thumbs-o-up fa-lg"></i>');
                        $('div#ContenedorPrincipal').load('menu/panel.php');;
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
		
					// ---------Se envian los datos serializados para poder cambiar pass tutor.
	function changePass(form, file) {
		var formulario = new FormData(form);
		console.log(file);
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
});