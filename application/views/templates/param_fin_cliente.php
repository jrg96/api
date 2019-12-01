<div class="row">
	<div class="col-sm-12 col-md-6 center-column">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 center-column">
				<div class="form-group">
					<label>Fecha final:</label>
					<input readonly name="fecha_fin" id="fecha_fin" class="form-control form-control-md" type="text" required>
				</div>
			</div>
			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 center-column">
				<div class="form-group">
					<label>Cliente</label>
					<select name="id_datos_cliente" id="id_datos_cliente" class="form-control form-control-md">
						<option selected value="-1">---TODOS----</option>
						{foreach item=cliente from=$clientes}
						<option value="{$cliente.id_datos_cliente}">{$cliente.apellidos}, {$cliente.nombres} ID: {$cliente.id_datos_cliente}</option>
						{/foreach}
					</select>
				</div>
			</div>
		</div>
	</div>
</div>