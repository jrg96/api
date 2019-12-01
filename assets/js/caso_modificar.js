$(document).ready(function () {
    $('#fecha_creacion').datepicker({
		locale: 'es-es',
		uiLibrary: 'bootstrap4',
		format: 'dd/mm/yyyy'
	});
	
	$('#fecha_terminacion').datepicker({
		locale: 'es-es',
		uiLibrary: 'bootstrap4',
		format: 'dd/mm/yyyy'
	});
});