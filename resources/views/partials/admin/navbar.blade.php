
<!-- top navigation -->
<div class="top_nav">
	<div class="nav_menu">
		<nav>
			<div class="nav toggle">
				<a id="menu_toggle"><i class="fa fa-bars"></i></a>
			</div>

			<ul class="nav navbar-nav navbar-right">
				<li class="">
					<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
					<img src=" {{ asset('/assets/img/user.png') }}" alt="">{{ session('username') }} 
						<span class=" fa fa-angle-down"></span>
					</a>
					<ul class="dropdown-menu dropdown-usermenu pull-right">
						<li><a href="{{ URL::to('/') }}"><i class="fa fa-sign-in pull-right"></i> Zona de Usuario</a></li>
						<li><a href="{{ URL::to('auth/logout') }}"><i class="fa fa-sign-out pull-right"></i> Cerrar Sesión</a></li>
					</ul>
				</li>
			</ul>
		</nav>
	</div>
</div>
        <!-- /top navigation -->