
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
		@if($users->count() > 0)
			@foreach($users as $user)
				<tr>
					<td>{{ $user->username }}</td>
					<td>{{ $user->name }}</td>
					<td>{{ $user->email }}</td>
					<td>{{ $user->tipoUsuario }}</td>
					<td>{{ ($user->status == 1)?'Confirmado':'No Confirmado' }}</td>
					<td>						
                        <div class='btn-group  btn-group-xs' role='group' aria-label='...'>
		                    {!! Form::model($user, ["url" => action('UserController@destroy', $user->id), "method" => "DELETE"]) !!}
							<button type="button" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-link" title="Reenviar correo de confirmación"></i></button>
							<a href='{{action('UserController@edit', ["id"=>$user->id])}}'  type="button" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit" title="Editar"></i></a>
								<button class='btn btn-danger btn-xs' type="submit"><i class="glyphicon glyphicon-remove" title="Eliminar"></i></button>
							{!! Form::close() !!}
						</div>
					</td>
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