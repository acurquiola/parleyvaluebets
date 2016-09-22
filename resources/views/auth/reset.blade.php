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
							@include('auth.partials.form', ["SubmitBtnText"=>"Guardar", "disabled" =>""])
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

