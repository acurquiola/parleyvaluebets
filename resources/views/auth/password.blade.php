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
								<h3 class="box-title">Recuperar Contraseña</h3>
							</div>
							{!! Form::open(["url" => action('Auth\PasswordController@postEmail'), "method" => "post", 'class'=>"form-horizontal form-label-left"]) !!}
							<div class="box-body">
							    <div class="form-group">
							      <label for="email" class="col-sm-3 control-label">Email</label>
							      <div class="col-sm-7">
									    {!! Form::text('email', null, ['class'=>'form-control  col-md-7 col-xs-12', 'id'=>'email', 'placeholder' => 'Ingresa tu dirección de correo electrónico', 'required']) !!}
							      </div>
							    </div>
								<div class="ln_solid"></div>
							    <div class="box-footer">
						    		<a href="{{ action('Auth\AuthController@getLogin') }}" type="button" class="btn btn-default">Cancelar</a>
							        <button class="btn btn-primary pull-right"> Recuperar </button>
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

