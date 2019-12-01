$(document).ready(function () {
	$('#cuerpo_informe').hide();
	$('#botones_imprimir_informe').hide();
	
	 $('#boton_regresar_param').click(function(){
		$('#formulario_generar_informe').show();
		$('#cuerpo_informe').hide();
		$('#botones_imprimir_informe').hide();
	 });
	
    $('#generar_informe').click(function(){
		$('#formulario_generar_informe').hide();
		$('#cuerpo_informe').show();
		$('#botones_imprimir_informe').show();
		
		$.post( '/api/index.php/operativo2/post_informe', 
				{ 
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
						html += '<th colspan="5" style="border: 1px solid black;">' + clientes[i].nombre_cliente + '</th>';
						html += "</tr>";
							
						html += "<tr>";
						html += '<th style="width: 20%; border: 1px solid black; text-align: center;">Nombre</th>';
						html += '<th style="width: 20%; border: 1px solid black; text-align: center;">Fecha inicio</th>';
						html += '<th style="width: 20%; border: 1px solid black; text-align: center;">Fecha fin</th>';
						html += '<th style="width: 20%; border: 1px solid black; text-align: center;">Estado</th>';
						html += '<th style="width: 20%; border: 1px solid black; text-align: center;">Atendido por</th>';
						html += "</tr>";
						
						for (var j = 0; j < clientes[i].nombre_caso.length; j++)
						{
							html += '<tr>';
							html += '<td style="width: 20%; border: 1px solid black;">' + clientes[i].nombre_caso[j] + '</td>';
							html += '<td style="width: 20%; border: 1px solid black; text-align: center;">' + clientes[i].fecha_inicio_caso[j] + '</td>';
							html += '<td style="width: 20%; border: 1px solid black; text-align: center;">' + clientes[i].fecha_fin_caso[j] + '</td>';
							html += '<td style="width: 20%; border: 1px solid black; text-align: center;">' + clientes[i].estado_caso[j] + '</td>';
							html += '<td style="width: 20%; border: 1px solid black; text-align: center;">' + clientes[i].nombre_abogado[j] + '</td>';
							html += '</tr>'
						}
						
						html += "<tr>";
						html += '<td style="width: 80%; border: 1px solid black;" colspan="4">Total de casos en proceso</td>';
						html += '<td style="width: 20%; border: 1px solid black; text-align: center;">' + clientes[i].total_proceso + '</td>';
						html += '</tr>';
						
						html += "<tr>";
						html += '<td style="width: 80%; border: 1px solid black;" colspan="4">Total de casos terminados</td>';
						html += '<td style="width: 20%; border: 1px solid black; text-align: center;">' + clientes[i].total_terminado + '</td>';
						html += '</tr>';
						html += '</table><br />';
					}
					
					$('#datos_informe').html(html);
				}
				, 'json'
		);
	});
});