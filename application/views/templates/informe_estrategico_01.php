<!DOCTYPE html>
<html>

<head>
{include file='header.php'}
</head>

<body class="basic-container">
    {include file='navbar.php'}
	
    <div class="container">
		<br />
		<div class="row">
			<div class="col">
				<div class="card">
					<div class="card-body">
						<ul class="nav nav-pills">
							{include file='navegacion_estrategico.php'}
							<li class="nav-item">
								<a class="nav-link active" href="/api/index.php/estrategico1/index">Informe de ganancias de casos jurídicos</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	

        <div class="row insert-row-padding">
            <div class="col-lg-12 col-xl-12 center-column">
                <div class="card box-shadow">
                    <div class="card-body">
						{include file='header_generar_informe.php'}
						<br />
						

						<center><h4>Informe de ganancias de casos juridicos</h4></center>
						<br />
						
						<div id="formulario_generar_informe" name="formulario_generar_informe">
							<center><h5>Parámetros</h5></center>
							{include file='param_inicio_fin.php'}
							
							
							<div class="row" id="botones_generar_reporte" name="botones_generar_reporte">
								<div class="col-sm-12 col-md-6 center-column">
									<a id="generar_informe" name="generar_informe" class="btn btn-primary btn-block btn-lg" href="#">Generar informe</a>
								</div>
								<div class="col-sm-12 col-md-6 center-column">
									<a class="btn btn-success btn-block btn-lg" href="#">Regresar</a>
								</div>
							</div>
						</div>
						
						
						<div id="cuerpo_informe" name="cuerpo_informe" class="row">
							<div class="col-sm-12 col-md-6 center-column">
							<center>
								<div id="datos_informe" name="datos_informe">
									<table style='font-family: arial, sans-serif; font-size: 12pt; border-collapse: collapse; border: 1px solid black; width:100%'>
										<tr>
											<th style="border: 1px solid black; text-align: center;">Nombre del cliente</th>
											<th style="border: 1px solid black; text-align: center;">Estado</th>
											<th style="border: 1px solid black; text-align: center;">Monto ($$$)</th>
										</tr>
										<tr>
											<td style="width: 50%; border: 1px solid black;">Cliente 1</td>
											<td style="width: 25%; border: 1px solid black; text-align: center;">Insolvente</td>
											<td style="width: 25%; border: 1px solid black; text-align: center;">Monto ($$$)</td>
										</tr>
										<tr>
											<td style="width: 75%; border: 1px solid black;" colspan="2">Total</td>
											<td style="width: 25%; border: 1px solid black; text-align: center;">$800</td>
										</tr>
									</table>
								</div>
							</center>
							</div>
						</div>
						
						<br />
						<div class="row" id="botones_imprimir_informe" name="botones_imprimir_reporte">
							<div class="col-sm-12 col-md-6 center-column">
								<a class="btn btn-primary btn-block btn-lg" href="/api/index.php/estrategico1/imprimir_informe" target="_blank">Imprimir informe</a>
							</div>
							<div class="col-sm-12 col-md-6 center-column">
								<a  id="boton_regresar_param" name="boton_regresar_param" class="btn btn-success btn-block btn-lg" href="#">Regresar</a>
							</div>
						</div>
						
						
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{$base_url}assets/js/jquery.min.js"></script>
    <script src="{$base_url}assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="{$base_url}assets/js/gijgo.min.js"></script>
	<script src="{$base_url}assets/js/messages.es-es.js"></script>
	<script src="{$base_url}assets/js/progreso_usuario.js"></script>
	<script src="{$base_url}assets/js/informe_estrategico_01.js"></script>
	
</body>

</html>