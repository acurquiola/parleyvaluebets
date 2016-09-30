<body class="nav-md">
	<div class="container body">
		<div class="main_container">
			<div class="col-md-3 left_col menu_fixed">
				<div class="left_col scroll-view">
					<div class="navbar nav_title" style="border: 0;">
						<a href='{{ URL::to('/admin') }}' class="site_title"><b>ParleyValue</b>Bets!</a>

					</div>

					<div class="clearfix"></div>

					<!-- menu profile quick info -->
					<div class="profile">
						<div class="profile_pic">
							<img src=" {{ asset('/assets/img/user.png') }}"  alt="..." class="img-circle profile_img">
						</div>
						<div class="profile_info">
							<span>Bienvenido,</span>
							<h2>{{ session('username') }} </h2>
						</div>
					</div>
					<!-- /menu profile quick info -->

					<br />

					<!-- sidebar menu -->
					<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
						<div class="menu_section">
							<ul class="nav side-menu">
								<li class="divider">Usuarios</li>
								<li><a href="{{ action('UserController@index') }}"><i class="fa fa-user"></i> Gestión de Usuarios</a></li>
								<li><a href="{{ action('AccesoUsuarioController@index') }}"><i class="fa fa-list"></i> Historial de Acceso</a></li>
								<li class="divider">General</li>
    							<li><a href="{{ action('AdministradorController@getConfiguracion') }}"><i class="fa fa-gears"></i>Configuración General</li>
							</ul>
						</div>

						</div>
						<!-- /sidebar menu -->
					</div>
				</div>