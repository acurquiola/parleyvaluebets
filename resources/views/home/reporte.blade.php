@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12" >
			<br>
			<br>
			<div class="tabbable-panel" style="background-color: #fff">
				<div class="tabbable-line">
					<ul class="nav nav-tabs ">
						<li class="active">
							<a href="#tab1" data-toggle="tab" id="logros-tab">
							<strong>REPORTE HISTÓRICO</strong>
							</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tab1">
							<div class="table-container">
								@if ($markets->count()>0)
								@foreach ($markets as $market)
								<table class="table table-striped" >
									<thead>
										<tr>
											<th class="text-center bg-primary" colspan="6" >MARKET</th>
										</tr>
										<tr>
											<th class="text-center" >ID</th>
											<th class="text-center">Nombre</th>
											<th class="text-center">BetTillDate</th>
											<th class="text-center">BetTillTime</th>
											<th class="text-center">LastUpdateDate</th>
											<th class="text-center">LastUpdateTime</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="text-center">{{$market->marketID}}</td>
											<td class="text-left">{{$market->name}}</td>
											<td class="text-center">{{$market->betTillDate}}</td>
											<td class="text-center">{{$market->betTillTime}}</td>
											<td class="text-center">{{$market->lastUpdateDate}}</td>
											<td class="text-center">{{$market->lastUpdateTime}}</td>
										</tr>
										<table class="table">
											<thead>
												<tr>
													<th class="text-center bg-info" colspan="6" >PARTICIPANT</th>
												</tr>
												<tr>
													<th class="text-center">ID</th>
													<th class="text-center">Nombre</th>
													<th class="text-center">OddsDecimal</th>
													<th class="text-center">LastUpdateDate</th>
													<th class="text-center">LastUpdateTime</th>
												</tr>
											</thead>
											<tbody>
												@foreach ($market->participants as $participant)
												<tr>
													<td class="text-center">{{$participant->participantID}}</td>
													<td class="text-left">{{$participant->name}}</td>
													<td class="text-center">{{$participant->oddsDecimal}}</td>
													<td class="text-center">{{$participant->lastUpdateDate}}</td>
													<td class="text-center">{{$participant->lastUpdateTime}}</td>
												</tr>
												@if($participant->historico->count() > 0)
												@foreach ($participant->historico as $historico)
												<tr>
													<td class="text-center">{{$historico->participantID}}</td>
													<td class="text-left">{{$historico->name}}</td>
													<td class="text-center">{{$historico->oddsDecimal}}</td>
													<td class="text-center">{{$historico->lastUpdateDate}}</td>
													<td class="text-center">{{$historico->lastUpdateTime}}</td>
													<td class="text-center">HISTÓRICO</td>
												</tr>
												@endforeach
												@endif
												@endforeach
											</tbody>
										</table>
										@endforeach
									</tbody>
								</table>
								@else
								No hay registros disponibles
								@endif
							</div>
						</div>
					</div>
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

