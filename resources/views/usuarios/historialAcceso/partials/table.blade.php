
<div class="card-box table-responsive">
	<table id="datatable-keytable" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Username</th>
				<th>Tipo de Usuario</th>
				<th>Dirección IP</th>
				<th>Fecha de Entrada</th>
				<th>Hora de Entrada</th>
				<th>Fecha de Salida</th>
				<th>Hora de Salida </th>
			</tr>
		</thead>
		<tbody>
		@if($historial->count() > 0)
			@foreach($historial as $hist)
				<tr>
					<td>{{ $hist->usuario->username }}</td>
					<td>{{ $hist->usuario->tipoUsuario }}</td>
					<td>{{ $hist->ip }}</td>
					<td>{{ $hist->fecha_entrada }}</td>
					<td>{{ $hist->hora_entrada }}</td>
					<td>{{ $hist->fecha_salida }}</td>
					<td>{{ $hist->hora_salida }}</td>
				</tr>
			@endforeach
		@else
			<tr>
				<td colspan="6" class="text-center">No hay registros disponibles</td>
			</tr>
		@endif
		</tbody>
	</table>
</div>