@extends('app-admin')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Historial de acceso</h3>
			</div>
		</div>

		<div class="col-md-12 col-sm-12 col-xs-12">
			@include('partials.admin.errors')
			<div class="x_panel">
				<div class="x_title">
					<h2>Accesos Registrados</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a href="{{ action('UserController@create') }}"><i class="fa fa-plus" title="Agregar un nuevo registro"></i></a></li>
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						<li><a class="close-link"><i class="fa fa-close"></i></a></li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div class="row">
						<div class="col-sm-12">
							@include('usuarios.historialAcceso.partials.table')
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
			language: {
				search: "Buscar:",
				paginate: {
					first:      "Primero",
					previous:   "Ant",
					next:       "Sig",
					last:       "Último"
				},
				info: "Mostrando _PAGE_ de _PAGES_",
				sInfo: "Mostrando _START_ a _END_ de _TOTAL_ registros",
				sInfoFiltered: "(Filtrando de _MAX_ registros)",
				sLengthMenu: "Mostrando _MENU_ registros",
			},
			keys: true
		});




	});
</script>
@endsection