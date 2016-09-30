
@extends('app-admin')

@section('content')
<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="col-md-12 col-sm-6 col-xs-12">
				@include('partials.admin.errors')
			<div class="x_panel">
				<div class="x_title">
					<h2><i class="fa fa-gears"></i> Configuración General </h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">

					<div class="col-xs-3">
						<!-- required for floating -->
						<!-- Nav tabs -->
						<ul class="nav nav-tabs tabs-left">
							<li class="active"><a href="#tiempoDeLecturaXML" data-toggle="tab"><strong>XML</strong></a>
							</li>
						{{-- 	<li><a href="#profile" data-toggle="tab">Configuración 2</a>
							</li>
							<li><a href="#messages" data-toggle="tab">Configuración 3</a>
							</li>
							<li><a href="#settings" data-toggle="tab">Configuración 4</a>
							</li> --}}
						</ul>
					</div>

					<div class="col-xs-9">
						<!-- Tab panes -->
						<div class="tab-content">	                    	
							{!! Form::model(["url" => action('AdministradorController@postConfiguracion'), "method" => "POST", 'data-parsley-validate',  'class'=>"form-horizontal form-label-left"]) !!}

								<div class="tab-pane active" id="tiempoDeLecturaXML"><form class="form-horizontal form-label-left">
									@include('admin.configuracion.partials.tiempoDeLecturaXML')
								</div>
								{{--<div class="tab-pane" id="profile">Configuración 2</div>
									<div class="tab-pane" id="messages">Configuración 3</div>
									<div class="tab-pane" id="settings">Configuración 4</div> --}}

							</div>
						</div>
						<div class="clearfix"></div>
						<div class="form-group">
							<div class="col-md-9 col-sm-9 col-xs-10 col-md-offset-9">
								<a href="{{ URL::to('/admin') }}" type="button" class="btn btn-default">Cancelar</a>
								<button type="submit" class="btn btn-success">Aplicar</button>
							</div>
						</div>
					{!! Form::close() !!}



				</div>
			</div>
		</div>
	</div>
</div>
<!-- /page content -->

@endsection

@section('script')

@endsection
