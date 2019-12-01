<style>
body {
	font-family: arial; 
}

#inline
{
	height:auto;
	display:flex;
}
	
.one,.two
{
	width:50%;
	height:auto;
}


</style>

<body>
	<h2 style="text-align: center;">Ciber Abogados</h2>
	<h2 style="text-align: center;">Unidad de casos legales</h2>
	<br />
	<h3 style="text-align: center;"><?php echo $nombre_informe;?></h3>
	<h3>Fecha generación: <u><?php echo $fecha_generacion;?></u></h3>




<p><?php echo $tabla;?></p>

</body>