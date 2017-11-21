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
	// -------------------------------
	$('.sidebar').sticky('.menuDeta');

	//tooltip menu
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

	$('div#dropdown-fixed').on('click', 'a#change-pass-alum', function (e) {
		e.preventDefault();
		$.cookie('subop', 'change-pass-alum', {path: '/'});
		$('div#ContenedorPrincipal').load('menu/change-pass.php');
	});	
	
	$('div#dropdown-fixed').on('click', 'a#bandeja-citas', function (e) {
		e.preventDefault();
		$.cookie('subop', 'bandeja-citas', {path: '/'});
		$('div#ContenedorPrincipal').load('menu/bandeja.php');
	});
	
	// ------- Efectos de seleccion de elemento en menu izquierdo
	$('div#my-collapse').on('click', 'a', function () {
		$.cookie('op', $(this).attr('id'), {path: '/'});	
	});
	
	$('div#my-collapse').on('click', 'li', function () {
		var subop = $(this).attr('id');
		if (subop != 'checked') {
		$.cookie('subop', subop, {path: '/'});
		$('div#my-collapse').find('li.seleccion').removeClass();
		$('div#my-collapse').find('span#seleccion').remove();
		var seleccion = '';
		$(this).html(seleccion + $(this).text());
		$(this).addClass('seleccion');
		
		switch($.cookie('op')+"-"+subop) {
			case 'consultar-form-1':
			consultarAnexo('Anexo_Formato_Entrevista');
			break;
			case 'consultar-line':
			consultarAnexo('Anexo_Linea_Vida');
			break;
			case 'consultar-foda':
			consultarAnexo('Anexo_FODA');
			break;
			case 'consultar-habi':
			consultarAnexo('Anexo_Hab_Estudio');
			break;
			case 'consultar-esti':
			consultarAnexo('Anexo_Est_Aprendizaje');
			break;
			case 'consultar-auto':
			consultarAnexo('Anexo_Test_Autoestima');
			break;
			case 'consultar-aser':
			consultarAnexo('Anexo_Test_Asertividad');
			break;
			case 'documentos-docu':
			consultarInfo();
			break;
			case 'evaluaciones-regi':
			consultarMaterias();
			break;
			case 'evaluaciones-impr':
			consultarAnexo('Anexo_Evaluacion');
			break;			
			default:
			cargarOpcion();
			break;
		}
		$.cookie('subop', subop, {path: '/'});
	}	
	});

	$("div#opciones").on('click', 'p',function (e) {
		  var op = $(this).parent('div').attr('id');
		  $.cookie('subop', op, {path: '/'});
		$('div#ContenedorPrincipal').load('menu/'+op+'.php');
	});

	$("div#ContenedorPrincipal").on('click', 'button#guardar-arch',function (e) {
		  e.preventDefault();
		  var form = $(this).closest('form').attr('id');
		  validarArchivo(form);
	});
	
	$("div#ContenedorPrincipal").on('click', 'button#guardar-calif',function (e) {
		  e.preventDefault();
		  var form = $(this).closest('form').attr('id');
		  if (validacionCalif(form)) {
		  guardarKardex($('div#ContenedorPrincipal').find('form#'+form)[0]);
		  }
	});
	
	$("div#ContenedorPrincipal").on('click', 'button#guardar-mater',function (e) {
		  e.preventDefault();
		  var form = $(this).closest('form').attr('id');
		if (validacion(form)) {
				guardarMaterias($('div#ContenedorPrincipal').find('form#'+form)[0]);			
			}
	});
	
	function validacion(form) {
		var ids = new Array();
		var inputs = new Array();  

		$('div#ContenedorPrincipal').find("form#"+form+" input").each(function() {
			inputs.push($(this).val().trim());
			ids.push($(this).attr('name'));
		});
		
		for (var i = 0; i < inputs.length; i++) {
			$('div#ContenedorPrincipal').find("form#"+form+" input[name="+ids[i]+"]").removeClass('error');
			if (inputs[i].length == 0) {
				$('div#ContenedorPrincipal').find("form#"+form+" input[name="+ids[i]+"]").addClass('error');
				$('div#ContenedorPrincipal').find("form#"+form+" input[name="+ids[i]+"]").focus();
				alertify.error('<i class="fa fa-warning"></i> Algún campo está vacio.');
				return false;
				}
			}
			
			return true;
		}
		
	function validacionCalif(form) {
		var ids = new Array();
		var inputs = new Array();  

		$('div#ContenedorPrincipal').find("form#"+form+" input").each(function() {
			inputs.push($(this).val().trim());
			ids.push($(this).attr('name'));
		});
		
		for (var i = 0; i < inputs.length; i++) {
			$('div#ContenedorPrincipal').find("form#"+form+" input[name="+ids[i]+"]").removeClass('error');
			if ((parseInt(inputs[i]) < 0 || parseInt(inputs[i]) > 100 || inputs[i].length > 3) && $.isNumeric(inputs[i])) {
				$('div#ContenedorPrincipal').find("form#"+form+" input[name="+ids[i]+"]").addClass('error');
				$('div#ContenedorPrincipal').find("form#"+form+" input[name="+ids[i]+"]").focus();
				alertify.error('<i class="fa fa-warning"></i> Algún campo es incorrecto.');
				return false;
				}
			}
			
			return true;
		}
// ------------------------------------------------------------
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
		
	// click en boton guardar cualquier boton
	$("div#ContenedorPrincipal").on('click', 'button#guardar-anexos',function (e) {
		  e.preventDefault();
		  var cual = $(this).attr('name');
		  var form = $(this).closest('form').attr('id');
		  	if(evaluarModal(form)){
		  		switch(cual) {
				case '1-1':	  		
		  		guardarAnex1();
		  		break;
		  		case '1-2':	  		
		  		guardarAnex1_2();
		  		break;
		  		case '1-1':	  		
		  		guardarAnex1();
		  		break;
		  		case '2-1':
		  		guardarAnex2();
		  		break;
		  		case '3-1':
		  		case '3-2':
		  		case '3-3':
		  		case '3-4':
		  		case '3-5':
		  		guardarFODA(form);
		  		break;
		  		case '4-1':
		  		guardarAnex4();
		  		break;
		  		case '5-1':
		  		guardarAnex5();
		  		break;
		  		case '6-1':
		  		guardarAnex6();
		  		break;
		  		case '7-1':
		  		guardarAnex7();
		  		break;
		  		case '8-1':
		  		guardarAnex8();
		  		break;
		  		}
		  	}
	});
	
	function llenarForm(form, datos) {
	$.each(datos, function(key, value){
		$("div#ContenedorPrincipal").find('form#'+form+' [name='+value['name']+']').val(value['value']);
		$("div#ContenedorPrincipal").find('form#'+form+' [name='+value['name']+']').prop('disabled', true);
		console.log(value['name']);
	});
}

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
	// click en boton cancelar cualquier boton
	$("div#ContenedorPrincipal").on('click', 'button#cancel',function (e) {
		  e.preventDefault();
		  location.reload();
		  $.removeCookie('eliminar', { path: '/' });
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
  // ---------------- inician funciones.	
	function popUpMsj(msj, tipo) {
			alertify.okBtn('Buscar').cancelBtn('Cancelar').prompt(msj, function (val, ev) {
			      ev.preventDefault();
					var dato = val.trim();
			      if (dato.length >= 3) {
			      	consultarInfo(dato, tipo);
			      	}else {
			      	alertify.error('<i class="fa fa-warning"></i> Escribe una búsqueda correcta.</b>.');
			      	}
			    }, function(ev) {
			      ev.preventDefault();
			      alertify.log("Has cancelado consulta... ");
			  });
		}
		
		function consultarMaterias(dato, btnTipo) {
		
		$.ajax({ 
					 data: {'dato': dato, 'btnEliminar': btnTipo},
                url: '../php/tutorados-evaluaciones.php',
                type: 'POST',
					 async: false,
                success: function (infoRegreso) {
                	if ($.isNumeric(infoRegreso)) {
                			switch(parseInt(infoRegreso)) {
                				case 1:
                				$('div#ContenedorPrincipal').load('menu/evaluaciones-regi.php');
                				break;
                				case -1:
                				$('div#ContenedorPrincipal').load('menu/registra-materias.php');
                				break;
                				}
							}
                		else{
                			$('div#ContenedorPrincipal').html('<div class="alert error animated fadeInDown"><i class="fa fa-warning fa-2x"></i> <b>Ocurrió un error, intenta nuevamente.</b></div>');
                		}
                	}
            });
		}
		
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

// ---- Funcion para obtener los anexos mediante AJAX 
	function consultarAnexo() {
		
		var archivo = $.cookie('tipo')+"-"+$.cookie('op')+".php";
		$.ajax({ 
					 data: {'dato': 1},
                url: '../php/'+archivo,
                type: 'POST',
					 async: false,
                success: function (infoRegreso) {
                	if (!$.isNumeric(infoRegreso)) {
							//$('div#ContenedorPrincipal').html('<div class="alert error animated fadeInDown"><i class="fa fa-warning fa-2x"></i> <b>No se han encontrado coincidencias, intenta nuevamente.</b></div>');
                		llenarForm('modal-'+$.cookie('subop'), $.parseJSON(infoRegreso));
                		}
                		else{
                			$('div#ContenedorPrincipal').html(infoRegreso+1);
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
		$.cookie('accion', $.cookie('op')+"-"+$.cookie('subop'), {path: '/'});
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
		$.removeCookie('eliminar', { path: '/' });
		}
//Evalua todos los campos de cualquier modal form.
	function evaluarModal(modal) {
		var ids = new Array();
		var inputs = new Array();  

		$('div#ContenedorPrincipal').find("form#"+modal+" input, select, textarea").each(function() {
			if ($(this).attr('name') != 'sel-img') {			
			var res = $(this).val().replace(/\"/gi, "");
			$(this).val(res);
			}
			inputs.push($(this).val().trim());
			ids.push($(this).attr('name'));
		});
		
		switch($.cookie('subop')) {	
			case 'form-1':
				if (!validarAnex1(inputs, ids, modal)) return false; 
				else return true;
			break;
			case 'form-2':
				if (!validarAnex1_2(inputs, ids, modal)) return false; 
				else return true;
			break;
			case 'line':
				if (!validarAnex2(inputs, ids, modal)) return false; 
				else return true;
			break;
			case 'for':
			case 'opo':
			case 'deb':
			case 'ame':
			case 'res':
				if (!validarFODA(inputs, ids, modal)) return false; 
				else return true;
			break;
			case 'habi':
				if (!validarAnex4(inputs, ids, modal)) return false; 
				else return true;
			break;
			case 'esti':
				if (!validarAnex5(inputs, ids, modal)) return false; 
				else return true;
			break;
			case 'auto':
				if (!validarAnex6(inputs, ids, modal)) return false; 
				else return true;
			break;
			case 'aser':
				if (!validarAnex6(inputs, ids, modal)) return false; 
				else return true;
			break;
			case 'real':
				if (!validarAnex5(inputs, ids, modal)) return false; 
				else return true;
			break;
			case 'change-pass-alum':
				if (!validarNewPass(inputs, ids, modal)) return false; 
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
	// ------------ Validaciones de Anexo 1
	function validarAnex1(inputs, ids, modal) {
		for (var i = 0; i < inputs.length; i++) {
			if (inputs[i].length == 0) {
				$('div#ContenedorPrincipal').find("form#"+modal+" input#"+ids[i]).removeClass('error');
				$('div#ContenedorPrincipal').find("form#"+modal+" input#"+ids[i]).addClass('error');
				$('div#ContenedorPrincipal').find("form#"+modal+" input#"+ids[i]).focus();
				alertify.error('<i class="fa fa-warning"></i> Algún campo está vacio.');
				return false;
				}
			}
			return true;
		}
	// ------------ Validaciones de Anexo 1-2
	function validarAnex1_2(inputs, ids, modal) {
		for (var i = 0; i < inputs.length; i++) {
			$('div#ContenedorPrincipal').find("form#"+modal+" input[name="+ids[i]+"]").removeClass('error');
			if (inputs[i].length == 0) {
				$('div#ContenedorPrincipal').find("form#"+modal+" input[name="+ids[i]+"]").addClass('error');
				$('div#ContenedorPrincipal').find("form#"+modal+" input[name="+ids[i]+"]").focus();
				alertify.error('<i class="fa fa-warning"></i> Algún campo está vacio.');
				return false;
				}
			}
			return true;
		}
	// ------------ Validaciones de Anexo 2
	function validarAnex2(inputs, ids, modal) {
		for (var i = 0; i < inputs.length; i++) {
			
			if (inputs[i].length == 0) {
				$('div#ContenedorPrincipal').find("form#"+modal+" textarea#"+ids[i]).removeClass('error');
				$('div#ContenedorPrincipal').find("form#"+modal+" textarea#"+ids[i]).addClass('error');
				$('div#ContenedorPrincipal').find("form#"+modal+" textarea#"+ids[i]).focus();
				alertify.error('<i class="fa fa-warning"></i> Algún campo está vacio.');
				return false;
				}
			}
			return true;
		}
	// ------------ Validaciones de Anexo 1
	function validarFODA(inputs, ids, modal) {
		for (var i = 0; i < inputs.length; i++) {
			$('div#ContenedorPrincipal').find("form#"+modal+" textarea[name="+ids[i]+"]").removeClass('error');
			if (inputs[i].length == 0) {
				$('div#ContenedorPrincipal').find("form#"+modal+" textarea[name="+ids[i]+"]").addClass('error');
				$('div#ContenedorPrincipal').find("form#"+modal+" textarea[name="+ids[i]+"]").focus();
				alertify.error('<i class="fa fa-warning"></i> Algún campo está vacio.');
				return false;
				}
			}
			return true;
		}	
					// ------------ Validaciones de Anexo 4
	function validarAnex4(inputs, ids, modal) {
		for (var i = 0; i < inputs.length; i++) {
			var inp = $('div#ContenedorPrincipal').find("form#"+modal+" input[name="+ids[i]+"]").is(":checked");
			if (inp == false) {
				$('div#ContenedorPrincipal').find("form#"+modal+" input[name="+ids[i]+"]").focus();
				alertify.error('<i class="fa fa-warning"></i> Algún campo está vacio.');
				return false;
				}
			}
			return true;
		}
		
		function validarAnex5(inputs, ids, modal) {
		for (var i = 0; i < inputs.length; i++) {
			var inp = $('div#ContenedorPrincipal').find("form#"+modal+" input[name="+ids[i]+"]").is(":checked");
			if (inp == false) {
				$('div#ContenedorPrincipal').find("form#"+modal+" input[name="+ids[i]+"]").focus();
				alertify.error('<i class="fa fa-warning"></i> Algún campo está vacio.');
				return false;
				}
			}
			return true;
		}
		
		function validarAnex6(inputs, ids, modal) {
		for (var i = 0; i < inputs.length; i++) {
			var inp = $('div#ContenedorPrincipal').find("form#"+modal+" input[name="+ids[i]+"]").is(":checked");
			if (inp == false) {
				$('div#ContenedorPrincipal').find("form#"+modal+" input[name="+ids[i]+"]").focus();
				alertify.error('<i class="fa fa-warning"></i> Algún campo está vacio.');
				return false;
				}
			}
			return true;
		}
		
		function guardarAnex1(){
			var datos = new FormData();
		  	datos.append('imagen', $("div#ContenedorPrincipal").find('form#modal-anexos-form-1 input#sel-img')[0].files[0]);
		  	
			var array = JSON.stringify($("div#ContenedorPrincipal").find('form#modal-anexos-form-1').serializeArray());
			datos.append('datos', array);
			
			$.ajax({ 
                url: '../php/tutorados-anexos.php',
                type: 'post',
                data: datos,
                async: false,
		          cache: false,
		          contentType: false,
		          processData: false,
                success: function (infoRegreso) {
                	alert("Anexo Formato de Entrevista 1 guardado correctamente.");
                	location.reload();
                	},
                  error: function () {
                     alertify.error('<i class="fa fa-warning fa-lg"></i> Ups... ha ocurrido un error, intenta nuevamente.');
                  }
            });		
		}
		
		function guardarAnex1_2(){
			var datos = new FormData();
		  	
			var array = JSON.stringify($("div#ContenedorPrincipal").find('form#modal-anexos-form-2').serializeArray());
			datos.append('datos', array);
			
			$.ajax({ 
                url: '../php/tutorados-anexos.php',
                type: 'post',
                data: datos,
                async: false,
		          cache: false,
		          contentType: false,
		          processData: false,
                success: function (infoRegreso) {
                	alert("Anexo Formato de Entrevista 2 guardado correctamente.");
                	location.reload();
                	},
                  error: function () {
                     alertify.error('<i class="fa fa-warning fa-lg"></i> Ups... ha ocurrido un error, intenta nuevamente.');
                  }
            });		
		}

	function guardarAnex2(){
			var datos = new FormData();

			var array = JSON.stringify($("div#ContenedorPrincipal").find('form#modal-anexos-line').serializeArray());
			datos.append('datos', array);
			
			$.ajax({ 
                url: '../php/tutorados-anexos.php',
                type: 'post',
                data: datos,
                async: false,
		          cache: false,
		          contentType: false,
		          processData: false,
                success: function (infoRegreso) {
						alert("Anexo de Linea de Vida guardado correctamente.");
						location.reload();
                	},
                  error: function () {
                     alertify.error('<i class="fa fa-warning fa-lg"></i> Ups... ha ocurrido un error, intenta nuevamente.');
                  }
            });		
		}
		
	function guardarFODA(modal){
			var datos = new FormData();

			var array = JSON.stringify($("div#ContenedorPrincipal").find('form#'+modal).serializeArray());
			datos.append('datos', array);
			
			$.ajax({ 
                url: '../php/tutorados-anexos.php',
                type: 'post',
                data: datos,
                async: false,
		          cache: false,
		          contentType: false,
		          processData: false,
                success: function (infoRegreso) {
                	switch(parseInt(infoRegreso)) {
                		case 1: alert("Anexo FODA: Fortalezas guardado correctamente."); break;
                		case 2: alert("Anexo FODA: Oportunidades guardado correctamente."); break;
                		case 3: alert("Anexo FODA: Debilidades guardado correctamente."); break;
                		case 4: alert("Anexo FODA: Amenazas guardado correctamente."); break;
                		case 5: alert("Anexo FODA: Resumen guardado correctamente."); break;
                		}
						
						location.reload();
                	},
                  error: function () {
                     alertify.error('<i class="fa fa-warning fa-lg"></i> Ups... ha ocurrido un error, intenta nuevamente.');
                  }
            });		
		}
		
		function guardarAnex4(){
			var datos = new FormData();

			var array = JSON.stringify($("div#ContenedorPrincipal").find('form#modal-anexos-habi').serializeArray());
			datos.append('datos', array);
			$.ajax({ 
                url: '../php/tutorados-anexos.php',
                type: 'post',
                data: datos,
                async: false,
		          cache: false,
		          contentType: false,
		          processData: false,
                success: function (infoRegreso) {
						alert("Anexo Habilidades de Estudio guardado correctamente.");
						location.reload();
                	},
                  error: function () {
                     alertify.error('<i class="fa fa-warning fa-lg"></i> Ups... ha ocurrido un error, intenta nuevamente.');
                  }
            });		
		}
		
		function guardarAnex5(){
			var datos = new FormData();

			var array = JSON.stringify($("div#ContenedorPrincipal").find('form#modal-anexos-esti').serializeArray());
			datos.append('datos', array);
			$.ajax({ 
                url: '../php/tutorados-anexos.php',
                type: 'post',
                data: datos,
                async: false,
		          cache: false,
		          contentType: false,
		          processData: false,
                success: function (infoRegreso) {
						alert("Anexo Estilos de Aprendizaje guardado correctamente.");
						location.reload();
                	},
                  error: function () {
                     alertify.error('<i class="fa fa-warning fa-lg"></i> Ups... ha ocurrido un error, intenta nuevamente.');
                  }
            });		
		}
		
		function guardarAnex6(){
			var datos = new FormData();

			var array = JSON.stringify($("div#ContenedorPrincipal").find('form#modal-anexos-auto').serializeArray());
			datos.append('datos', array);
			$.ajax({ 
                url: '../php/tutorados-anexos.php',
                type: 'post',
                data: datos,
                async: false,
		          cache: false,
		          contentType: false,
		          processData: false,
                success: function (infoRegreso) {
						alert("Anexo Test de Autoestima guardado correctamente.");
						location.reload();
                	},
                  error: function () {
                     alertify.error('<i class="fa fa-warning fa-lg"></i> Ups... ha ocurrido un error, intenta nuevamente.');
                  }
            });		
		}
		
	function guardarAnex7(){
			var datos = new FormData();

			var array = JSON.stringify($("div#ContenedorPrincipal").find('form#modal-anexos-aser').serializeArray());
			datos.append('datos', array);
			$.ajax({ 
                url: '../php/tutorados-anexos.php',
                type: 'post',
                data: datos,
                async: false,
		          cache: false,
		          contentType: false,
		          processData: false,
                success: function (infoRegreso) {
						alert("Anexo Test de Asertividad guardado correctamente.");
						location.reload();
                	},
                  error: function () {
                     alertify.error('<i class="fa fa-warning fa-lg"></i> Ups... ha ocurrido un error, intenta nuevamente.');
                  }
            });		
		}
		
	function guardarAnex8(){
			var datos = new FormData();

			var array = JSON.stringify($("div#ContenedorPrincipal").find('form#modal-evaluaciones-real').serializeArray());
			datos.append('datos', array);
			$.ajax({ 
                url: '../php/tutorados-anexos.php',
                type: 'post',
                data: datos,
                async: false,
		          cache: false,
		          contentType: false,
		          processData: false,
                success: function (infoRegreso) {
						alert("Anexo Evaluacion del Tutor guardado correctamente.");
						location.reload();
                	},
                  error: function () {
                     alertify.error('<i class="fa fa-warning fa-lg"></i> Ups... ha ocurrido un error, intenta nuevamente.');
                  }
            });		
		}

	// ---------Se envian los datos serializados para poder guardar.
	function guardarDatos(form) {
		var file = $.cookie('tipo')+"-"+$.cookie('op');
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
                	console.log(infoRegreso);
                    switch(parseInt(infoRegreso))
                    {
						case 1:
                        alertify.logPosition("bottom right").success('Guardado correctamente. <i class="fa fa-thumbs-o-up fa-lg"></i>');
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
	
	function consultarAnexo(dato) {
		var archivo = $.cookie('tipo')+"-"+$.cookie('op')+".php";
		$.ajax({ 
				 data: {'dato': 1},
             url: '../php/'+archivo,
             type: 'POST',
				 async: false,
             success: function (infoRegreso) {
             	if(parseInt(infoRegreso) != -1) {
             		$.cookie('anexo', dato, {path: '/'});
						window.open('../reportes/anexos.php', '_blank');
						}
						else {
						$('div#ContenedorPrincipal').html('<div class="alert error animated fadeInDown"><i class="fa fa-warning fa-2x"></i> <b>No has realizado o completado el Formato del Anexo selecionado, realizalo antes de consultar.</b></div>');
             		}
             	}
         });
		}
		
		function guardarMaterias(form){
			var datos = new FormData(form);
			$.cookie('subop','mate',{path: '/'});
			$.ajax({ 
                url: '../php/tutorados-evaluaciones.php',
                type: 'post',
                data: datos,
                async: false,
		          cache: false,
		          contentType: false,
		          processData: false,
                success: function (infoRegreso) {
                	switch(parseInt(infoRegreso)) {
                		case 1:
                		$.cookie('subop','regi',{path: '/'});
                		//cargarOpcion();
                		alert("Anexo Materias guardadas correctamente.");
                		location.reload();
                		break;
                		default: alertify.error('<i class="fa fa-warning fa-lg"></i> Ha ocurrido un error, intenta nuevamente.');
                		}
                	},
                  error: function () {
                     alertify.error('<i class="fa fa-warning fa-lg"></i> Ups... ha ocurrido un error, intenta nuevamente.');
                  }
            });		
		}
		
		function guardarKardex(form){
			var datos = new FormData(form);
			$.cookie('subop','kard',{path: '/'});
			$.ajax({ 
                url: '../php/tutorados-evaluaciones.php',
                type: 'post',
                data: datos,
                async: false,
		          cache: false,
		          contentType: false,
		          processData: false,
                success: function (infoRegreso) {
                	$.cookie('subop','regi',{path: '/'});
                	switch(parseInt(infoRegreso)) {
                		case 1:
                		alertify.okBtn("Si").cancelBtn("No").confirm("<p style='text-align: center;'>Calificaciones <b>guardadas correctamente</b><br>¿Deseas registrar más calificaciones?</p>", function () {
								  $.cookie('subop','regi',{path: '/'});
                				cargarOpcion();  
								}, function() {
								    location.reload();
								});
                		break;
                		default: alertify.error('<i class="fa fa-warning fa-lg"></i> Ha ocurrido un error, intenta nuevamente.');
                		}
                	},
                  error: function () {
                     alertify.error('<i class="fa fa-warning fa-lg"></i> Ups... ha ocurrido un error, intenta nuevamente.');
                  }
            });		
		}
		
});