@extends('app-no-login')

	@section('content')
		<div class="container">
			<div class="row">
				<br>
				<br>
				<div class="col-md-12" >
					@include('partials.errors')
					<div class="col-md-12">
						<!-- Horizontal Form -->
						<div class="box box-info">
							<div class="box-header with-border">
								<h3 class="box-title">Reiniciar Contraseña</h3>
							</div>
							{!! Form::open(["url" => action('Auth\PasswordController@postReset'), "method" => "post", 'class'=>"form-horizontal form-label-left"]) !!}
								<div class="box-body">
									{!! Form::hidden('token', $token, null) !!}
									<div class="form-group">
										<label for="password" class="col-sm-3 control-label">Email</label>
										<div class="col-sm-7">
											{!! Form::text('email', null, ['value' => "{{ old('email') }}", 'placeholder'=>'Introduzca dirección de correo electrónico', 'class'=>'form-control  col-md-7 col-xs-12', 'id'=>'email',  'required' ] ) !!}
										</div>
									</div>
									<div class="form-group">
										<label for="password" class="col-sm-3 control-label">Contraseña</label>
										<div class="col-sm-7">
											{!! Form::password('password',  array('placeholder'=>'Ingrese Contraseña', 'class'=>'form-control  col-md-7 col-xs-12', 'id'=>'password-2',  'required'  )) !!}
										</div>
									</div>
									<div class="form-group">
										<label for="password_confirmation" class="col-sm-3 control-label">Repetir Contraseña</label>

										<div class="col-sm-7">
											{!! Form::password('password_confirmation',  array('placeholder'=>'Ingrese Contraseña Nuevamente', 'class'=>'form-control  col-md-7 col-xs-12', 'id'=>'password-2',  'required'  )) !!}
										</div>
									</div>  
									<div class="ln_solid"></div>
									<div class="box-footer">
										<a href="{{ route('login') }}" type="button" class="btn btn-default">Cancelar</a>
										<button class="btn btn-primary pull-right"> Guardar </button>
									</div>
								</div>							
								{!! Form::close() !!}
						</div>
					</div>
				</div>
			</div>
		</div>

		<br>
		<br>
	@endsection

@section('script')

@endsection

