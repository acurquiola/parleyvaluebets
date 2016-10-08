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
									<a href="#tabCompeticiones" data-toggle="tab">
										<strong>COMPETICIONES</strong>
									</a>
								</li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane active" id="tabCompeticiones">
									<div class="table-container">
										
    									<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    										<ul class="treeview-menu">

		    									<h5><strong>NHL</strong></h5>
		    									{{-- <h6 style="margin-left: 15px" class="col-sm-12"><strong>Apuestas de Ganador Final</strong></h6> --}}

	                                            <ul class="nav navbar-nav col-sm-4" >
	                                                <li class=" col-sm-12" ><a href="{{ action('HockeyController@getCompetencias', ['type' => 'NHL', 'name' => '- Stanley Cup Winner']) }}">Ganador de Stanley Cup</a></li>
	                                                <li class=" col-sm-12" ><a href="{{ action('HockeyController@getCompetencias', ['type' => 'NHL', 'name' => '- Original Six Stanley Cup Winner']) }}">Ganador de Original Six Stanley Cup</a></li>
	                                                <li class=" col-sm-12" ><a href="{{ action('HockeyController@getCompetencias', ['type' => 'NHL', 'name' => '- Regular Season Points']) }}">Total de puntos en temporada regular</a></li>
	                                            </ul>
	                                            <ul class="nav navbar-nav col-sm-4" >
	                                                <li class=" col-sm-12" ><a href="{{ action('HockeyController@getCompetencias', ['type' => 'NHL', 'name' => '- Conference Winner']) }}">Ganador de Conferencia</a></li>
	                                                <li class=" col-sm-12" ><a href="{{ action('HockeyController@getCompetencias', ['type' => 'NHL', 'name' => '- Division Winner']) }}">Ganador de División</a></li>
	                                                <li class=" col-sm-12" ><a href="{{ action('HockeyController@getCompetencias', ['type' => 'NHL', 'name' => '- Winning State/Province']) }}">Estado/Provincia Ganadora</a></li>
	                                            </ul>
	                                            <ul class="nav navbar-nav col-sm-4" >
	                                                <li class=" col-sm-12" ><a href="{{ action('HockeyController@getCompetencias', ['type' => 'NHL', 'name' => '- Winning Conference']) }}">Conferencia Ganadora</a></li>
	                                            </ul>
		                                    </ul>
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

	