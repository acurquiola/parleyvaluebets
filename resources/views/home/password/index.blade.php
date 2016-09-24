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
								<h3 class="box-title">Establecer Contraseña</h3>
							</div>
							{!! Form::model($user, ["url" => action('UserController@postPassword'), "method" => "post", 'class'=>"form-horizontal form-label-left"]) !!}
							@include('home.password.partials.form', ["SubmitBtnText"=>"Guardar", "disabled" =>""])
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

