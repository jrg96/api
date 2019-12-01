$(document).ready(function () {
    $('#fecha_inicio').datepicker({
		locale: 'es-es',
		uiLibrary: 'bootstrap4',
		format: 'dd/mm/yyyy'
	});
	
	$('#fecha_fin').datepicker({
		locale: 'es-es',
		uiLibrary: 'bootstrap4',
		format: 'dd/mm/yyyy'
	});
});