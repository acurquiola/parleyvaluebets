@extends('app-admin')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Usuarios<small> Gestión</small></h3>
			</div>
		</div>

		<div class="col-md-12 col-sm-12 col-xs-12">
				@include('partials.admin.errors')
			<div class="x_panel">
				<div class="x_title">
					<h2>Usuarios Registrados</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a href="{{ action('UserController@create') }}"><i class="fa fa-plus" ></i></a></li>
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						<li><a class="close-link"><i class="fa fa-close"></i></a></li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div class="row">
						<div class="col-sm-12">
							<div class="card-box table-responsive">
								<table id="datatable-keytable" class="table table-striped table-bordered">
									<thead>
										<tr>
											<th>Usuario</th>
											<th>Nombre</th>
											<th>E-mail</th>
											<th>Tipo</th>
											<th>Estado</th>
											<th>Opciones</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Admin</td>
											<td>Administrador</td>
											<td>admin@parleyvaluebets.com</td>
											<td>Activo</td>
											<td>Admin</td>
											<td></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
<!-- /page content -->

@endsection

@section('script')


<!-- Datatables -->
<script>
	$(document).ready(function() {
		$('#datatable').dataTable();
		$('#datatable-keytable').DataTable({
			keys: true
		});
	});
</script>
@endsection