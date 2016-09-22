
<div class="card-box table-responsive">
	<table id="datatable-keytable" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th style="width: 100px; vertical-align: middle" class="text-center"  >Username</th>
				<th style="width: 100px; vertical-align: middle" class="text-center"  >Tipo de Usuario</th>
				<th style="width: 100px; vertical-align: middle" class="text-center"  >País</th>
				<th style="width: 100px; vertical-align: middle" class="text-center"  >Dirección IP</th>
				<th style="width: 70px; vertical-align: middle" class="text-center"  >Fecha de Entrada</th>
				<th style="width: 70px; vertical-align: middle" class="text-center"  >Hora de Entrada</th>
				<th style="width: 70px; vertical-align: middle" class="text-center"  >Fecha de Salida</th>
				<th style="width: 70px; vertical-align: middle" class="text-center"  >Hora de Salida </th>
			</tr>
		</thead>
		<tbody>
		@if($historial->count() > 0)
			@foreach($historial as $hist)
				<tr>
					<td style="width: 100px;" class="text-center"  >{{ $hist->usuario->username }}</td>
					<td style="width: 100px;" class="text-center"  >{{ $hist->usuario->tipoUsuario }}</td>
					<td style="width: 100px;" class="text-center"  >{{ $hist->pais }}</td>
					<td style="width: 100px;" class="text-center"  >{{ $hist->ip }}</td>
					<td style="width: 70px;" class="text-center"  >{{ $hist->fecha_entrada }}</td>
					<td style="width: 70px;" class="text-center"  >{{ $hist->hora_entrada }}</td>
					<td style="width: 70px;" class="text-center"  >{{ ($hist->fecha_salida == '0000-00-00')?'':$hist->fecha_salida }}</td>
					<td style="width: 70px;" class="text-center"  >{{ ($hist->hora_salida == '00:00:00')?'':$hist->hora_salida }}</td>
				</tr>
			@endforeach
		@else
			<tr>
				<td colspan="7" class="text-center">No hay registros disponibles</td>
			</tr>
		@endif
		</tbody>
	</table>
</div>