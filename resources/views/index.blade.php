@include('partials.header')

<body class="login">
	<div>
		<div class="login_wrapper">
			<div class="animate form login_form">
				<h1 align="center" style="color: #337AB7; margin-top: 50px; margin-bottom: -10px"><strong>PARLEYVALUE</strong><u>Bets!</u></h1>
				<section class="login_content">
                    @include('partials.errors')
				    {!! Form::open( ["url" => "auth/login", "method" => "POST", "class"=>"form-horizontal"]) !!}
					<form>
						<h1>Iniciar Sesión</h1>
						<div>
							<input type="text" class="form-control" name="username" placeholder="username" required="" />
						</div>
						<div>
							<input type="password" class="form-control" name="password" placeholder="password" required="" />
						</div>
						<div>
                            <button type="submit" class="btn btn-primary"> INGRESA </button>
							<a class="reset_pass" href="#">OLVIDÉ MI CONTRASEÑA</a>
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
