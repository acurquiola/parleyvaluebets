    <body class="layout-top-nav skin-blue-light">
    	<div class="wrapper">

    		<header class="main-header">
    			<div class="container">
    				<div class="navbar-header">
    					<a href='{{ URL::to('/') }}' class="navbar-brand"><b>ParleyValue</b>Bets!</a>
    					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
    						<i class="fa fa-bars"></i>
    					</button>
    				</div>

    				<div class="panel with-nav-tabs panel-primary">
    					<div class="panel-heading">
    						<ul class="nav nav-tabs">
    							<li class="active" ><a href="#tabDeportes" data-toggle="tab">DEPORTES</a></li>
    							<li><a href="{{ action('XmlReaderController@getXml') }}">REFRESCAR</a></li>
    							<li><a href="{{ action('XmlReaderController@index') }}">REPORTE</a></li>
    							<li class="dropdown pull-right">
    								<a href="#" class="dropdown-toggle " data-toggle="dropdown">{{ session('username') }}  <b class="caret"></b></a>
    								<ul class="dropdown-menu dropdown-usermenu pull-right">
    									@if(getTipoUsuario(session('username'))== 'admin') <li><a href="{{ action('AdministradorController@index') }}">Administrador</a></li> @endif
    									<li><a href="#">Perfil</a></li>
    									<li class="divider"></li>
    									<li><a href="{{ URL::to('auth/logout') }}">Cerrar Sesión</a></li>
    								</ul>
    							</li>
    						</ul>
    					</div>
    					<div class="panel-body">
    						<div class="tab-content">
    							<div class="tab-pane fade in active" id="tabDeportes">

    								<!-- Menu DEPORTES -->

    								<div class="container-fluid">
    									<div class="navbar-header">
    										<a class="navbar-brand" href="#"></a>
    									</div>
    									<div class="collapse navbar-collapse">
    										<ul class="nav navbar-nav">
                                                <li {{ (\Request::is('deportes/beisbol*'))?"class=active":"" }}><a href="{{ action('BeisbolController@index') }}">Béisbol</a></li>
    											<li {{ (\Request::is('deportes/hockey*'))?"class=active":"" }}><a href="{{ action('HockeyController@index') }}">Hockey</a></li>
    											<li><a href="#">Fútbol</a></li>
    											<li><a href="#">Tenis</a></li>
    											<li><a href="#">Baloncesto</a></li>
    										</ul>
    										<ul class="nav navbar-nav">
    											<li><a href="#">Fútbol Americano</a></li>
    											<li><a href="#">Voleibol</a></li>
    											<li><a href="#">Boxeo</a></li>
    											<li><a href="#">Ciclismo</a></li>
    										</ul>
    									</div>
    								</div>

    								<!-- Fin menu Demandes -->

    							</div>

    						</div>
    					</div>
    				</div>
    				<!-- /.navbar-custom-menu -->
    				<!-- /.container-fluid -->
    			</nav>
    		</header>