$(document).ready(function () {
	$('#card-proceso-etl').hide();
	
	function sleep(ms) {
		return new Promise(resolve => setTimeout(resolve, ms));
	}
	
	var anterior = -1;
	function obtener_proceso_etl()
	{
		$.post( '/sig/index.php/carterainiciaretl/etl', 
				{ 
				}, 
				function(resultado) 
				{
					console.log("Procesando");
					if (resultado.id_bitacora_etl != -1)
					{
						$('#card-proceso-etl').show();
						$('#btn-etl').hide();
						$('#pbetl').css('width', resultado.progreso + '%').attr('aria-valuenow', resultado.progreso).text(resultado.progreso + "%");
					}
					else
					{
						if (anterior != -1)
						{
							$('#pbetl').css('width', 100 + '%').attr('aria-valuenow', 100).text(100 + "%");
							$('#titulo_etl').html("Proceso ETL terminado con éxito");
							$('#texto_etl').html("Proceso ETL terminado con éxito. Ahora puede iniciar otro proceso ETL");
						}
						$('#btn-etl').show();
					}
					
					anterior = resultado.id_bitacora_etl;
				}
				, 'json'
		);
	}
	
	
	
	setInterval(obtener_proceso_etl, 1000);
	
});