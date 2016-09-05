@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12" >
			<br>
			<br>

			<ol class="breadcrumb">
				<li><a href="{{ URL::to('deportes/beisbol') }}">Béisbol</a></li>
				<li><a class="active">Ganador de División</a></li>
			</ol>
			<div class="tabbable-panel" style="background-color: #fff">
				<div class="tabbable-line">
					<ul class="nav nav-tabs ">
						<li class="active">
							<a href="#tabCompeticiones" data-toggle="tab">
								<strong>GANADOR DE DIVISIÓN</strong>
							</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tabCompeticiones">
							<div class="table-container">

								<div class="collapse navbar-collapse">
									@if($markets->count()>0)
										@foreach($markets as $market)
										<table class="table table-filter col-md-6">
											<thead>
												<tr>
													<th align="center" colspan="4">{{ $market->name }}</th>
												</tr>
												<tr>
													<th class="text-center" style="width: 20%">Fecha</th>
													<th class="text-center" style="width: 20%">Hora</th>
													<th class="text-center" style="width: 20%">Cuota</th>
													<th class="text-center" style="width: 40%">Nombre</th>
												</tr>
											</thead>
											<tbody>
												@foreach($market->participants as $participant)
													<tr>
														<td  class="text-center" style="width: 20%" >
															{{ $participant->lastUpdateDate }}
														</td>
														<td  class="text-center" style="width: 20%" >
															{{ $participant->lastUpdateTime }}
														</td>
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
													<button class="btn btn-default pull-right" ><span class="glyphicon glyphicon-plus"></span> Apuestas</button>
										@endforeach
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
</div>

<br>
<br>
@endsection

