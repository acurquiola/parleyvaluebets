@extends('app-admin')
@section('content')


<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>
		<br>
		<ol class="breadcrumb">
			<li><a href="{{ action('AdministradorController@index')}}">Inicio</a></li>
			<li><a href="{{ action('UserController@index') }}">Usuarios</a></li>
			<li><a class="active">Registro</a></li>
		</ol>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				@include('partials.admin.errors')
				<div class="x_panel">
					<div class="x_title">
						<h2>Registro de Usuario </h2>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<br />
	                    {!! Form::model($user, ["url" => action('UserController@store'), "method" => "POST", 'data-parsley-validate',  'class'=>"form-horizontal form-label-left"]) !!}
		                        @include('usuarios.partials.form', ["SubmitBtnText"=>"Registrar", "disabled" =>""])
	                    {!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /page content -->

@endsection
