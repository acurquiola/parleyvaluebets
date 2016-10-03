@include('partials.header')

<body class="login">
	<div>
		<div class="errors">
            @include('partials.errors')
		</div>
		<div class="login_wrapper">
			<div class="animate form login_form">
				<h1 align="center" style="color: #337AB7; margin-bottom: -10px"><strong>PARLEYVALUE</strong><u>Bets!</u></h1>
				<section class="login_content">
				    {!! Form::open( ["url" => "auth/login", "method" => "POST", "class"=>"form-horizontal"]) !!}
					<form>
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<h1>Iniciar Sesión</h1>
						<div>
							<input type="text" class="form-control" name="username" placeholder="Username" required="" />
						</div>
						<div>
							<input type="password" class="form-control" name="password" placeholder="Contraseña" required="" />
						</div>
						<div>
                            <button type="submit" class="btn btn-primary"> INGRESA </button>
							<a class="reset_pass" href="{{ action('Auth\PasswordController@getEmail') }}">OLVIDÉ MI CONTRASEÑA</a>
						</div>
						<div style="margin-top: 25px" class="separator">
						</div>
					</form>
                    {!! Form::close() !!}
				</section>
			</div>
		</div>
	</div>
</body>
</html>
