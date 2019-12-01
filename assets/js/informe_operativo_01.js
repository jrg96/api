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
		if ($.trim($('#fecha_fin').val()) == "")
		{
			alert('Rellene la fecha fin, por favor');
			return;
		}
		
		$('#formulario_generar_informe').hide();
		$('#cuerpo_informe').show();
		$('#botones_imprimir_informe').show();
		
		$.post( '/api/index.php/operativo3/post_informe', 
				{ 
					fecha_fin: $('#fecha_fin').val(),
					id_datos_cliente: $('#id_datos_cliente').val()
				}, 
				function(resultados) 
				{
					console.log(resultados);
					
					var html = '';
					html += "<table style='font-family: arial, sans-serif; font-size: 12pt; border-collapse: collapse; border: 1px solid black; width:100%'>";
					html += "<tr><th style='border: 1px solid black; text-align: center;'>Nombre del cliente</th><th style='border: 1px solid black; text-align: center;'>Estado</th><th style='border: 1px solid black; text-align: center;'>Monto ($$$)</th></tr>";
					for (var i = 0; i < resultados.clientes.length; i++)
					{
						html += "<tr>";
						html += '<td style="width: 50%; border: 1px solid black;">' + resultados.clientes[i].nombre_cliente + "</td>";
						html += '<td style="width: 25%; border: 1px solid black; text-align: center;">' + resultados.clientes[i].estado + '</td>';
						html += '<td style="width: 25%; border: 1px solid black; text-align: center;">$'+ resultados.clientes[i].deuda + '</td>';
						html += '</tr>';
					}
					html += "<tr>";
					html += '<td style="width: 75%; border: 1px solid black;" colspan="2">Total</td>';
					html += '<td style="width: 25%; border: 1px solid black; text-align: center;">$' + resultados.total + '</td>';
					html += '</tr>';
					html += '</table>';
					
					$('#datos_informe').html(html);
				}
				, 'json'
		);
	});
});