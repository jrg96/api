$(document).ready(function () {
	$('#cuerpo_informe').hide();
	$('#botones_imprimir_informe').hide();
	
	 $('#boton_regresar_param').click(function(){
		$('#formulario_generar_informe').show();
		$('#cuerpo_informe').hide();
		$('#botones_imprimir_informe').hide();
	 });
	
    $('#generar_informe').click(function(){
		// Validaciones:
		if ($.trim($('#fecha_inicio').val()) == "" || $.trim($('#fecha_fin').val()) == "")
		{
			alert('Rellene los campos de fecha inicio y fecha fin, por favor');
			return;
		}
		
		var fecha1_p = ($.trim($('#fecha_inicio').val())).split("/");
		var fecha2_p = ($.trim($('#fecha_fin').val())).split("/");
		
		var fecha1 = new Date(fecha1_p[2], fecha1_p[1] - 1, fecha1_p[0]);
		var fecha2 = new Date(fecha2_p[2], fecha2_p[1] - 1, fecha2_p[0]);
		
		if (fecha1 > fecha2)
		{
			alert('Fecha de inicio no puede ser mayor a fecha final');
			return;
		}
		
		$('#formulario_generar_informe').hide();
		$('#cuerpo_informe').show();
		$('#botones_imprimir_informe').show();
		
		$.post( '/api/index.php/tactico1/post_informe', 
				{
					fecha_inicio: $('#fecha_inicio').val(),
					fecha_fin: $('#fecha_fin').val(),
					id_tipo_caso_juridico: $('#id_tipo_caso_juridico').val()
				}, 
				function(resultados) 
				{
					console.log(resultados);
					
					var html = '';
					html += "<table style='font-family: arial, sans-serif; font-size: 12pt; border-collapse: collapse; border: 1px solid black; width:100%'>";
					html += "<tr><th style='border: 1px solid black; text-align: center;'>Tipo de caso</th><th style='border: 1px solid black; text-align: center;'>ganancia ($$$)</th></tr>";
					for (var i = 0; i < resultados.tipos.length; i++)
					{
						html += "<tr>";
						html += '<td style="width: 75%; border: 1px solid black;">' + resultados.tipos[i].nombre_tipo + "</td>";
						html += '<td style="width: 25%; border: 1px solid black; text-align: center;">$' + resultados.tipos[i].saldo + '</td>';
						html += '</tr>';
					}
					html += "<tr>";
					html += '<td style="width: 75%; border: 1px solid black;" colspan="1">Total</td>';
					html += '<td style="width: 25%; border: 1px solid black; text-align: center;">$' + resultados.total + '</td>';
					html += '</tr>';
					html += '</table>';
					
					$('#datos_informe').html(html);
				}
				, 'json'
		);
	});
});