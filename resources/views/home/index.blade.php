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
										<strong>PÁGINA PRINCIPAL</strong>
									</a>
								</li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane active" id="tab1">
									<div class="pull-right">
										<div class="btn-group">
											<button type="button" class="btn btn-primary btn-filter" data-target="Baseball" >Béisbol</button>
										{{-- <button type="button" class="btn btn-warning btn-filter" data-target="futbol" >Fútbol</button>
										     <button type="button" class="btn btn-default btn-filter" data-target="all" >Todos</button> --}}
										</div>
									</div>
									<div class="table-container">
										<table class="table table-filter">
							                <thead>
							                    <tr>
							                        <th class="text-center" style="width: 100px">Fecha</th>
							                        <th class="text-center" style="width: 100px">Hora</th>
							                        <th class="text-center" style="width: 200px">Partido</th>
							                        <th class="text-center" style="width: 100px">Money Line</th>
							                        <th class="text-center" style="width: 100px"colspan="2">Hándicap</th>
							                        <th class="text-center" style="width: 100px"colspan="2">Totales</th>
							                        <th class="text-center">Opciones</th>
							                    </tr>
							                </thead>
											<tbody>
												@if(count($logros) == 0)
													<tr>
														<td colspan="7">
															No hay registros disponibles
														</td>
													</tr>
												@else
													@foreach($logros as $index => $logro)
														<tr data-status="{{ $logro['deporte'] }}">
															<td class="text-center" rowspan="2" style="width: 100px" >
																{{ $logro['fecha'] }}
															</td>
															<td class="text-center" rowspan="2" style="width: 100px">
																{{ $logro['hora'] }}
															</td>
															<td class="text-left"  style="width: 200px">
																{{ $logro['equipo1'] }}
															</td>
															<td class="text-center" style="width: 100px">
																{{ ($logro['moneyLine1'] == 0)?'':$logro['moneyLine1'] }}
															</td>
															<td class="text-center"  style="width: 100px">
															</td>
															<td class="text-center"  style="width: 100px">
															</td>
															<td class="text-center"  style="width: 100px">
																{{ ($logro['totalCarreras'] == 0)?'':'o'.$logro['totalCarreras'] }}
															</td>
															<td class="text-center"  style="width: 100px">
																{{ ($logro['totalCarrerasCuotaO'] == 0)?'':$logro['totalCarrerasCuotaO'] }}
															</td>
															<td rowspan="2">
																<a href="{{ action('DeportesController@getMoreMarkets',[$logro['nombre']]) }}" class="pull-right moreMarkets-btn"><span class="glyphicon glyphicon-plus"></span> APUESTAS</a>
															</td>
														</tr>
														<tr data-status="{{ $logro['deporte'] }}">
															<td class="text-left" style="width: 200px">
																{{ $logro['equipo2'] }}
															</td>
															<td class="text-center" style="width: 100px">
																{{ ($logro['moneyLine2'] == 0)?'':$logro['moneyLine2'] }}
															</td>
															<td class="text-center"  style="width: 100px">
															</td>
															<td class="text-center"  style="width: 100px">
															</td>
															<td class="text-center"  style="width: 100px">
																{{ ($logro['totalCarreras'] == 0)?'':'u'.$logro['totalCarreras'] }}
															</td>
															<td class="text-center"  style="width: 100px">
																{{ ($logro['totalCarrerasCuotaU'] == 0)?'':$logro['totalCarrerasCuotaU'] }}
															</td>
														</tr>
													@endforeach
												@endif
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

	<br>
	<br>
	@endsection

	@section('script')
		
	@endsection

                   