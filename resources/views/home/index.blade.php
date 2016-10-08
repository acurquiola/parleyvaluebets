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
										<button type="button" class="btn btn-default btn-filter" data-target="all" >Todos</button>
										@if($deporte['beisbol'] > 0)<button type="button" class="btn btn-primary btn-filter" data-target="Baseball" >Béisbol</button>@endif
										@if($deporte['futbolAmericano'] > 0)<button type="button" class="btn btn-warning btn-filter" data-target="American Football" >Fútbol Americano</button>@endif
										@if($deporte['hockey'] > 0)<button type="button" class="btn btn-success btn-filter" data-target="NHL" >Hockey</button>@endif
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
													<td colspan="9" class="text-center">
														No hay registros disponibles
													</td>
												</tr>
											@else
												@foreach($logros as $index => $logro)
													<tr data-deporte="{{ $logro['deporte'] }}">
														<td class="text-center" rowspan="2" style="width: 100px" >
															{{ $logro['fecha'] }}
														</td>
														<td class="text-center" rowspan="2" style="width: 100px">
															{{ $logro['hora'] }}
														</td>
														<td class="text-left"  style="width: 250px">
															{{ $logro['equipo1'] }}
														</td>
														<td class="text-center" style="width: 100px">
															{{ ($logro['moneyLine1'] == 0)?'':$logro['moneyLine1'] }}
														</td>
														<td class="text-center"  style="width: 100px">
															{{ ($logro['totalHandicap1'] == 0)?'':$logro['totalHandicap1'] }}
														</td>
														<td class="text-center"  style="width: 100px">
															{{ ($logro['handicapCuota1'] == 0)?'':$logro['handicapCuota1'] }}
														</td>
														<td class="text-center"  style="width: 100px">
															{{ ($logro['totalPuntos'] == 0)?'':'o'.$logro['totalPuntos'] }}
														</td>
														<td class="text-center"  style="width: 100px">
															{{ ($logro['totalPuntosCuotaO'] == 0)?'':$logro['totalPuntosCuotaO'] }}
														</td>
														<td rowspan="2" style="width: 50px">
															<a href="{{ action('DeportesController@getMasCompetencias',['type'=>'NFL', 'name'=>$index]) }}" class="btn btn-circle pull-right moreMarkets-btn"><span class="glyphicon glyphicon-plus"></span></a>
														</td>
													</tr>
													<tr data-deporte="{{ $logro['deporte'] }}">
														<td class="text-left" style="width: 250px">
															{{ $logro['equipo2'] }}
														</td>
														<td class="text-center" style="width: 100px">
															{{ ($logro['moneyLine2'] == 0)?'':$logro['moneyLine2'] }}
														</td>
														<td class="text-center"  style="width: 100px">
															{{ ($logro['totalHandicap2'] == 0)?'':$logro['totalHandicap2'] }}
														</td>
														<td class="text-center"  style="width: 100px">
															{{ ($logro['handicapCuota2'] == 0)?'':$logro['handicapCuota2'] }}
														</td>
														<td class="text-center"  style="width: 100px">
															{{ ($logro['totalPuntos'] == 0)?'':'u'.$logro['totalPuntos'] }}
														</td>
														<td class="text-center"  style="width: 100px">
															{{ ($logro['totalPuntosCuotaU'] == 0)?'':$logro['totalPuntosCuotaU'] }}
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

	<script>
		$(document).ready(function () {


			$('.btn-filter').on('click', function () {
				var $target = $(this).data('target');
				if ($target != 'all') {
					$('.table tbody tr').css('display', 'none');
					$('.table tbody tr[data-deporte="' + $target + '"]').fadeIn('slow');
				} else {
					$('.table tr').css('display', 'none').fadeIn('slow');
				}
			});

		});
	</script>

	@endsection

