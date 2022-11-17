$(document).ready(function () {
	getUser();
	$("#edit").click(function () {
		formPerfil();
	});
});
function formPerfil() {
	$("#guardarCambios").attr('disabled', 'disabled');
	$("input:password").off('keyup').on('keyup', function (event) {
		$("#messageModal").hide();
		var erLetraMayus = /[A-Z]/;
		var erLetraMinus = /[a-z]/;
		var erNumero = /[0-9]/;
		var _user = $("#pass1").val();
		var habilitar;
		var c1 = c2 = c3 = c4 = c5 = false;

		c1 = erLetraMayus.test(_user);
		c2 = erLetraMinus.test(_user);
		c3 = erNumero.test(_user);
		c1 ? $("#mayusculas").removeClass('text-danger').addClass('text-success') : $("#mayusculas").removeClass('text-success').addClass('text-danger');
		c2 ? $("#letras").removeClass('text-danger').addClass('text-success') : $("#letras").removeClass('text-success').addClass('text-danger');
		c3 ? $("#numero").removeClass('text-danger').addClass('text-success') : $("#numero").removeClass('text-success').addClass('text-danger');
		c4 = (_user.length >= 8);
		c4 ? $("#longitud").removeClass('text-danger').addClass('text-success') : $("#longitud").removeClass('text-success').addClass('text-danger');
		c5 = ($("#pass1").val() == $("#pass2").val() && c4);
		c5 ? $("#confirmacion").removeClass('text-danger').addClass('text-success') : $("#confirmacion").removeClass('text-success').addClass('text-danger');

		habilitar = c1 + c2 + c3 + c4 + c5;
		(habilitar == 5) ? $("#guardarCambios").removeAttr('disabled') : $("#guardarCambios").attr('disabled', 'disabled');
	});
	$("#guardarCambios").off('click').on('click', function (e) {
		e.preventDefault();
		// var msg = document.getElementById("msg").value;

		swal({
			title: "¿Estas seguro de editar tu informacion?",
			text: "Tu nombre de usuario y contraseña seran actualizadas.",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		}).then((willDelete) => {
			if (willDelete) {
				actualizar();
			}
			else {
				swal("No ocurrieron cambios.");
			}
		});

	});

}
function getUser() {
	$.post("php/refrescarSesion.php", { key: keySeguridad }, function (data, status) {
		
		if (data.id_tipo == 22 || data.id_tipo == 31 || data.id_tipo == 40) {
			$('#catalogoClaseDrop').hide();
			$('#catalogoSubclaseDrop').hide();
			$('#moduloReportes').hide();
		}
	
		// console.log(data);
		$('.name').text(data.firstName);
		$('#disLink').text(data.tipo);
		$("#exampleModalLabel").html("Actualizar Perfil de Usuario " + data.rpe);
		$("#nombre").val(data.nombre);
		$("#rpe").val(data.rpe);
		// console.log($('#Panelrpe').val());
	});

	$.post("php/obtenerPermisos.php", { key: keySeguridad }, function (data, status) {
		// Se usó esta consulta para posteriores validaciones
		// console.log(data[0]);

		if (data[0].tipo == 22 || data[0].tipo == 31) {
			// Este es opcional ya que el cliente hace la consulta y el servidor retorna solo la Zona y departamento del usuario logueado
			$('#areaR').attr('disabled', 'disabled');
			$('#deptoR').attr('disabled', 'disabled');
			// $("#btnOpcionesResguardos").hide();

		}
		if (data[0].tipo == 40) {
			// Este es opcional ya que el cliente hace la consulta y el servidor retorna solo la Zona y departamento del usuario logueado
			$('#areaR').attr('disabled', 'disabled');
			$('#deptoR').attr('disabled', 'disabled');
			// $('#Panelrpe').attr('disabled', 'disabled');

		}
		if (data[0].modifica == 0) {
			$('#btnEditarResguardo').hide();
			$('#btnTraspasar').hide();
			$('#btnDarBaja').hide();
		}
		if (data[0].elimina == 0) {
			$('#btnEliminarResguardo').hide();
		}
	});
}

function actualizar() {
	parametros = formToObject($("form#formPerfil"));
	parametros.key = keySeguridad
	// console.log(parametros);
	$.ajax({
		type: 'POST',
		url: 'php/editarPerfil.php',
		data: parametros,
		success: function (data) {
			console.log(data);
			if (data.success) {
				swal(
					"Tus datos fueron actualizados.", {
					icon: "success",
				}
				)
					.then(function () {
						getUser();
						$('#formPerfil')[0].reset();
						$('#modalModUsuario').modal('hide');

					});
			}
			else {
				swal(
					'Falla en registro',
					'Hubo un error al actualizar tus datos.' + data.message,
					'error'
				)
			}
		}
	});
}

// function formToObject(form) {
// 	var arrayForm = $(form).serializeArray();
// 	var objectForm = {};
// 	arrayForm.forEach(function (obj, index) {
// 		objectForm[obj.name] = obj.value;
// 	});
// 	return objectForm;
// }
