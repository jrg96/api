$(document).ready(function () {
    $("#id_estado_disponible").change( function(){
		var base_url = window.location.origin;
		var seleccionado = $(this).find('option:selected').val();
		var urL = base_url + '/rygoservin/index.php/carteradeudorinformacion/post';
		var id_cartera_val = $("#id_cartera").val();
		
		// alert("valor de id cartera: " + urL);
		
		if (seleccionado != -1)
		{
			var postParams = {
				id_cartera : id_cartera_val,
				id_estado_disponible: seleccionado
			};
			
			$.ajax({
				async: true,
				type: 'POST',
				data: postParams,
				url: urL,
				success: function(response) {
					var obj = jQuery.parseJSON(response);
					
					if (obj.resultado_peticion == 1)
					{
						// agregando datos
						var str_html = '<option value="-1">------ Seleccione una opcion ------</option>';
						
						var i = 0;
						for (i = 0; i < obj.sub_estados.length; i++)
						{
							str_html += '<option value="' + obj.sub_estados[i].id_estado_sub_disponible + '">' + obj.sub_estados[i].nombre_estado_sub_disponible + '</option>';
						}
						
						$("#id_estado_sub_disponible").html(str_html);
					}
					else
					{
						alert("Error al obtener sub estados");
					}
				},
				error: function(jqXHR, textStatus, errorThrown) {
					alert(errorThrown);
				}
			});
		}
		else
		{
			var str_html = '<option value="-1">------ Seleccione una opcion ------</option>';
			$("#id_estado_sub_disponible").html(str_html);
		}
	});
});