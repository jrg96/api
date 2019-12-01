<nav class="navbar navbar-light navbar-expand-md" style="background-color:#ffffff;">
    <div class="container-fluid"><a class="navbar-brand" href="#"><strong>Bufete Ciber Abogados</strong></a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div
            class="collapse navbar-collapse" id="navcol-1">
            <ul class="nav navbar-nav ml-auto">
				{if $usuario_tipo eq 'admin'}
				<li class="nav-item" role="presentation"><a class="nav-link active" href="/api/index.php/adminpanel/index">Inicio</a></li>
				{/if}
				
				{if $usuario_tipo eq 'tactico'}
				<li class="nav-item" role="presentation"><a class="nav-link active" href="/api/index.php/tacticopanel/index">Inicio</a></li>
				{/if}
				
				{if $usuario_tipo eq 'estrategico'}
				<li class="nav-item" role="presentation"><a class="nav-link active" href="/api/index.php/estrategicopanel/index">Inicio</a></li>
				{/if}
                <li class="nav-item" role="presentation"><a class="nav-link" href="/api/index.php/logout">Cerrar sesión</a></li>
            </ul>
        </div>
    </div>
</nav>