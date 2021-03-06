/**
 * * @author gex
 */
$(document).ready(function() {
	var reg_email = /^[^0-9][a-zA-Z0-9_.]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/;
	var email = $("#email");
	var passwd = $("#password");
	var registro = false;
	var url = "http://kiosco/";
	var url_ecommerce = "http://ecommerce/";
	
	$('input').bind("click keypress", function() {
		$(".error").remove();
		$(".error2").remove();
		$(".validation_message").remove();
	});
	
	/*tipo inicio*/
	$("#divtipo_inicio2").click(function() {
		$(".error").remove();
		$(".error2").remove();
		$("#divtipo_inicio2").removeClass('radio_no_selected').addClass('radio_selected');
		$("#divtipo_inicio").removeClass('radio_selected').addClass('radio_no_selected');
		document.getElementById('tipo_inicio2').checked = 'checked';
		document.getElementById('tipo_inicio').checked = '';
		passwd.removeAttr("disabled");
		registro = false;
	});

	$("#divtipo_inicio").click(function() {
		$("#divtipo_inicio").removeClass('radio_no_selected').addClass('radio_selected');
		$("#divtipo_inicio2").removeClass('radio_selected').addClass('radio_no_selected');
		document.getElementById('tipo_inicio2').checked = '';
		document.getElementById('tipo_inicio').checked = 'checked';
		passwd.attr("disabled", true);
		registro = true;
		consulta_mail($('#email').val());
	});
	
	/*Inicio de sesión*/
	$("#enviar").click(function(e) {
		e.preventDefault();
		
		$(".error").remove();	//limpiar mensajes de error
		
		if (!registro) {
			//email
			if (!reg_email.test(email.val())) {
				email.focus().after("<div class='error2'>Por favor ingresa una dirección de correo válida. Ejemplo: nombre@dominio.mx</div>");
				return false;
			} else if (passwd.val() == "" ) {
				passwd.focus().after("<div class='error2'>Por favor escribe tu contraseña o elige iniciar sesión como cliente nuevo</div>");
				return false;
			} else {
				//alert("registro "  + registro + " action: " + $("#login_tienda").attr("action")); //return false;
				$("#login_tienda").submit();
			}
		}
		else {
			$("#login_tienda").attr("action", url + "registro")
			$("#login_tienda").submit();
		}
	});
	
	//Recuperar contrasena	
	$("#olvido_contrasena").click(function(e) {
		e.preventDefault();
		//alert("tipo " + tipo_inicio.val());
		$(".error").remove();	//limpiar mensajes de error	
		$("#login_tienda").attr("action", url + "password")
		$("#login_tienda").submit();
	});
	
	//fade out error messsage
	email.change(function() {
		if (reg_email.test(email.val())) {
			$(this).siblings(".error").fadeOut();
		}
	});
	
	passwd.change(function() {
		if ($.trim(passwd.val()) != "") {
			$(this).siblings(".error").fadeOut();
		}
	});

	email.keyup(function() {
		consulta_mail(this.value);
	});
});

function consulta_mail(mail) {
	var url_ecommerce = "http://kiosco/";
	$(".error2").remove();
	$.ajax({
		type: "GET",
		data: {'mail' : mail, 'accion': 'consulta_mail'},
		url: url_ecommerce + "administrador_usuario.php",
		dataType: "json",
		async: true,
		success: function(data) {			
			if (data.mail) {
				cte_reg=document.getElementById('tipo_inicio2').checked;
				if (!cte_reg && data.mail > 1) {
					$('#email').focus().after("<div class='error2'>Esta dirección de correo ya se encuentra registrada</div>");
				}
			}
			
		},
		error: function(data) {
			alert("error: " + data);
		},
		complete: function(data) {
		},
		//async: false,
		cache: false
	});
}