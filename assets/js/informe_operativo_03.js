$(document).ready(function () {
	$('#cuerpo_informe').hide();
	$('#botones_imprimir_informe').hide();
	
	 $('#boton_regresar_param').click(function(){
		$('#formulario_generar_informe').show();
		$('#cuerpo_informe').hide();
		$('#botones_imprimir_informe').hide();
	 });
	
    $('#generar_informe').click(function(){
		if ($.trim($('#fecha_fin').val()) == "")
		{
			alert('Rellene la fecha de fin, por favor');
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
				function(clientes) 
				{
					console.log(clientes);
					html = '';
					
					for (var i = 0; i < clientes.length; i++)
					{
						html += "<table style='font-family: arial, sans-serif; font-size: 12pt; border-collapse: collapse; border: 1px solid black; width:100%'>";
							
						html += "<tr>";
						html += '<th colspan="4" style="border: 1px solid black;">' + clientes[i].nombre_cliente + '</th>';
						html += "</tr>";
							
						html += "<tr>";
						html += '<th style="width: 25%; border: 1px solid black; text-align: center;">Nombre caso</th>';
						html += '<th style="width: 25%; border: 1px solid black; text-align: center;">Fecha pago</th>';
						html += '<th style="width: 25%; border: 1px solid black; text-align: center;">Monto pago</th>';
						html += '<th style="width: 25%; border: 1px solid black; text-align: center;">Estado pago</th>';
						html += "</tr>";
						
						for (var j = 0; j < clientes[i].nombre_caso.length; j++)
						{
							html += '<tr>';
							html += '<td style="width: 25%; border: 1px solid black;">' + clientes[i].nombre_caso[j] + '</td>';
							html += '<td style="width: 25%; border: 1px solid black; text-align: center;">' + clientes[i].fecha_pago[j] + '</td>';
							html += '<td style="width: 25%; border: 1px solid black; text-align: center;">$' + clientes[i].monto_pago[j] + '</td>';
							html += '<td style="width: 25%; border: 1px solid black; text-align: center;">' + clientes[i].estado_pago[j] + '</td>';
							html += '</tr>'
						}
						
						html += "<tr>";
						html += '<td style="width: 80%; border: 1px solid black;" colspan="3">Total de pagos pendientes</td>';
						html += '<td style="width: 20%; border: 1px solid black; text-align: center;">$' + clientes[i].total_deuda + '</td>';
						html += '</tr>';
						
						html += "<tr>";
						html += '<td style="width: 80%; border: 1px solid black;" colspan="3">Total de pagos terminados</td>';
						html += '<td style="width: 20%; border: 1px solid black; text-align: center;">$' + clientes[i].total_pagado + '</td>';
						html += '</tr>';
						html += '</table><br />';
					}
					
					$('#datos_informe').html(html);
				}
				, 'json'
		);
	});
});