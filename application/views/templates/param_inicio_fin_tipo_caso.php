<div class="row">
	<div class="col-sm-12 col-md-6 center-column">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 center-column">
				<div class="form-group">
					<label>Fecha de inicio</label>
					<input readonly name="fecha_inicio" id="fecha_inicio" class="form-control form-control-md" type="text" required>
				</div>
			</div>
			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 center-column">
				<div class="form-group">
					<label>Fecha final:</label>
					<input readonly name="fecha_fin" id="fecha_fin" class="form-control form-control-md" type="text" required>
				</div>
			</div>
			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 center-column">
				<div class="form-group">
					<label>Tipo de caso</label>
					<select name="id_tipo_caso_juridico" id="id_tipo_caso_juridico" class="form-control form-control-md">
						<option selected value="-1">---TODOS----</option>
						{foreach foreach item=tipo from=$tipos}
						<option value="{$tipo.id_tipo_caso_juridico}"> {$tipo.nombre_tipo}</option>
						{/foreach}
					</select>
				</div>
			</div>
		</div>
	</div>
</div>