$(document).ready(function () {
	$(window).load(function () {
		if (!!$.cookie('info') == false) {
		if (navigator.cookieEnabled) {
			alertify.closeLogOnClick(true).delay(15000).log('Este sitio utiliza cookies <button class="button inverted">Aceptar</button>');
			$.cookie('info', 'info', {path: '/' });
			}else {
			alertify.delay(15000).log('<div class="alert error">Debes tener habilitadas las cookies.</div>');
			}
		}	
	});
	
	//tooltip menu
	$("button#tipso, li#tipso").tipso({
		  showArrow: true,
		  position: 'left',
		  background: 'rgba(0, 0, 0, 0.5)',
		  color: '#eee',
		  useTitle: false,
		  animationIn: 'bounceIn',
		  animationOut: 'bounceOut',
		  size: 'small'
	});
// click en boton cancelar login
	$("div#LoginBox").on('click', 'button#cancel',function (e) {
		  e.preventDefault();
		  location.reload();
	});
	
// Clicks que setean cookies en el menu derecho.
	$('div#offcanvas-right').on("click", "a", function (e){
		var form = $(this).attr('id');
		$.cookie('tipo', form, {path: '/' });
		$('div#LoginBox').load('logins/'+form+'.php');
	});
// Clicks que setean cookies en nuevo registro alumno.
	$('div#LoginBox').on("click", "a#registro", function (e){
		var form = $(this).attr('id');
		$.cookie('tipo', form, {path: '/' });
		$('div#LoginBox').load('logins/'+form+'.php');
	});	
//Click en cualquier boton de cualquier form del index.
	$('div#LoginBox').on("click",'button#login', function (e){
		e.preventDefault();
		var form = $(this).closest('form').attr('id');
		if(evaluarModal(form)){
			loginCheck($('div#LoginBox').find('form#'+form)[0]);
		}
	});
//Click en cualquier boton de cualquier form del index.
	$('div#LoginBox').on("click",'button#signin', function (e){
		e.preventDefault();
		var form = $(this).closest('form').attr('id');
		if(evaluarNvoRegistro(form)){
			var suma = parseInt($('div#LoginBox').find('div#num1').text()) + parseInt($('div#LoginBox').find('div#num2').text());
			var resul = parseInt($('div#LoginBox').find('input#seguridad').val());

			if (suma != resul) {
				alertify.error('<i class="fa fa-exclamation fa-lg"></i> La pregunta de seguridad es incorrecta.');
				}
				else{
					loginCheck($('div#LoginBox').find('form#'+form)[0]);
				}
		}
	});
//Evalua el formulario de nuevo registro
	function evaluarNvoRegistro(form) {
		//Regex para email.
				var regex = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
				var inputVal = new Array();
				var inputId = new Array();

				$('div#LoginBox').find("form#"+form+" input, select").each(function() {
					inputVal.push($(this).val().trim());
					inputId.push($(this).attr('id'));
				});
				
				for (var i = 0; i < inputVal.length - 1; i++) {
					if ((i == 0 || i == 1 || i >= 6) && inputVal[i].length == 0) {
						var texto = $('div#LoginBox').find("form#"+form+" input#"+inputId[i]+", select#"+inputId[i]).prev('label').text();
						alertify.error('Falta el Campo: <b>'+texto+"</b>");
						return false;
						}
					if (i == 2 && !regex.test(inputVal[i])) {
						alertify.error('Ingresa un E-mail valido.');
						return false;					
						}
					if ((i == 3 || i == 4) && (inputVal[i].length < 4 || inputVal[i].length > 13)){
						if(i == 3) alertify.error('Ingresa una contraseña de 4 a 13 caracteres.');
						else alertify.error('Repite la contraseña.');
						return false;
						}
					if (i == 4 && (inputVal[i - 1] != inputVal[i])) {
						alertify.error('Las contraseñas no son iguales, verifica nuevamente.');
						return false;
						}
					if (i == 5 && (inputVal[i].length != 8 || isNaN(inputVal[i]))){
						alertify.error('Ingresa un No. de Control valido.');
						return false;
						}
					}
				return true;
		}
//Evalua todos los campos de cualquier modal form.
	function evaluarModal(modal) {
		var inputs = new Array();  

		$('div#LoginBox').find("form#"+modal+" input, select").each(function() {
			inputs.push($(this).val());
		});
		
		for (var i = 0; i < inputs.length; i++) {
			switch(modal) {
					case 'modal-tutorado':
						if (inputs[0] == '' || inputs[0].length != 8 || isNaN(inputs[0])) {
								alertify.error('El número de control debe ser numérico o está incompleto.');
								return false;	
						}
						if (inputs[i].length < 4){
								alertify.error('Algún campo está vacio o incompleto.');
								return false;
						}
					break;				
					
					default:
					if (inputs[i].length == 0){
								alertify.error('Algún campo está vacio o incompleto.');
								return false;
						}		
			}
		}
		return true;	
	}
// ---------Chequea el formulario indicado para poder logearse o registrarse.
	function loginCheck(form) {
		var formulario = new FormData(form);
					$.ajax({
                data: formulario, 
                url: 'php/login-session.php',
                type: 'post',
                async: false,
		          cache: false,
		          contentType: false,
		          processData: false,
                beforeSend: function () {
                //¿que hace antes de enviar?
                },
                success: function (infoRegreso) {
                	console.log('llega: '+infoRegreso);
                    switch(parseInt(infoRegreso))
                    {
						case 1:
                        entrarPanel();
                        break;
                  case 2:
                  	location.replace('panel/tutorados/');
                        break;
               	case -1:
                        alertify.error("Algún campo es incorrecto, verifica nuevamente.");
                        break;
               		
						case -2:
                        alertify.error("Estás dado de baja, contacta a tu tutor.");
                        break;
                  case -3:
                  		alertify.error('<i class="fa fa-exclamation-circle fa-lg"></i> Ya estás registrado, contacta a tu coordinador de carrera<br>para recuperar tu cuenta.');
                  	break;
               		}
               	},
                  error: function () {
                     alertify.error("Ups... ha ocurrido un error, intenta nuevamente.");
                  }
            });
		}
// -------- Disparador para cambio de carrera en login Registro.
	$('div#LoginBox').on('change', 'form#modal-registro select#carrera',function() {
		var tempCookie = $.cookie('tipo');
	  $.cookie('tipo', $(this).val(), {path: '/'});
	  obtenerGrupos();
	  $.cookie('tipo', tempCookie, {path: '/'})
	});		
// -------------- Si se logea correctamente, cambia de página indicada.
	function entrarPanel() {
		var file = $.cookie('tipo');
		location.replace('panel/'+file+'/')
		}	
// ---- Funcion para obtener los grupos mediante AJAX 
	function obtenerGrupos() {
		$.ajax({ 
                url: 'php/generarCombos.php',
                type: 'post',
                async: false,
		          cache: false,
		          contentType: false,
		          processData: false,
                success: function (infoRegreso) {
                	$('div#LoginBox').find('form#modal-registro select#grupo').html(infoRegreso);
                	}
            });
		}
});

