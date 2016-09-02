	<div class="collapse navbar-collapse">
		@if($markets->count()>0)
			@foreach($markets as $market)
				<table class="table table-filter col-md-6">
					<thead>
						<tr>
							<th align="center" colspan="4">{{ $market->name }}</th>
						</tr>
						<tr class="bg-info">
							<th class="text-center" style="width: 20%">Fecha</th>
							<th class="text-center" style="width: 20%">Hora</th>
							<th class="text-center" style="width: 20%">Cuota</th>
							<th class="text-center" style="width: 40%">Nombre</th>
						</tr>
					</thead>
					<tbody>
						<tr>													
							<td  rowspan="{{ $market->participants->count()+1 }}" class="text-center" style="width: 20%;" >
								{{ $market->betTillDate }}
							</td>
							<td  rowspan="{{ $market->participants->count()+1 }}"  class="text-center" style="width: 20%" >
								{{ $market->betTillTime }}
							</td>
						</tr>
						@foreach($market->participants as $participant)
						<tr>
							<td  class="text-center" style="width: 20%" >
								{{ $participant->oddsDecimal }}
							</td>
							<td  class="text-center" style="width: 40%" >
								{{ $participant->name }}
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				@if($button == 1)
					<a href="#" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-plus"></span> Apuestas</a>
				@endif
			@endforeach
		@else
			No hay registros disponibles
		@endif	
	</div>
