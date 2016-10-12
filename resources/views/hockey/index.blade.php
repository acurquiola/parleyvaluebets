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
		    									<h6 style="margin-left: 15px" class="col-sm-12"><strong>Apuestas de Ganador Final</strong></h6> 

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

		    									<h6 style="margin-left: 15px" class="col-sm-12"><strong>Apuestas por Encuentros</strong></h6> 
	                                            <ul class="nav navbar-nav col-sm-4" >
	                                                <li class=" col-sm-12" ><a href="{{ action('HockeyController@getCompetencias', ['type' => 'NHL', 'name' => '- Money Line']) }}">Ganador del Partido</a></li>
	                                                <li class=" col-sm-12" ><a href="{{ action('HockeyController@getCompetencias', ['type' => 'NHL', 'name' => '- Puck Line Handicap']) }}">Hándicap de Goles</a></li>
	                                                <li class=" col-sm-12" ><a href="{{ action('HockeyController@getCompetencias', ['type' => 'NHL', 'name' => '- Total Match Goals']) }}">Total de Goles</a></li>
	                                                <li class=" col-sm-12" ><a href="{{ action('HockeyController@getCompetencias', ['type' => 'NHL', 'name' => '- Will There Be A Shootout?']) }}">¿Habrá tanda de Penales?</a></li>
	                                            </ul>
	                                            <ul class="nav navbar-nav col-sm-4" >
	                                                <li class=" col-sm-12" ><a href="{{ action('HockeyController@getCompetencias', ['type' => 'NHL', 'name' => '- Draw No Bet']) }}">Victoria sin Empate</a></li>
	                                                <li class=" col-sm-12" ><a href="{{ action('HockeyController@getCompetencias', ['type' => 'NHL', 'name' => '- Highest Scoring Period']) }}">Periodo con más Goles</a></li>
	                                                <li class=" col-sm-12" ><a href="{{ action('HockeyController@getCompetencias', ['type' => 'NHL', 'name' => '- Method Of Victory']) }}">Método de Victoria</a></li>
	                                                <li class=" col-sm-12" ><a href="{{ action('HockeyController@getCompetencias', ['type' => 'NHL', 'name' => '- Margen Of Victory']) }}">Margen de Victoria</a></li>
	                                            </ul>
	                                            <ul class="nav navbar-nav col-sm-4" >
	                                                <li class=" col-sm-12" ><a href="{{ action('HockeyController@getCompetencias', ['type' => 'NHL', 'name' => '- Teams To Score']) }}">¿Qué Equipos Marcarán?</a></li>
	                                                <li class=" col-sm-12" ><a href="{{ action('HockeyController@getCompetencias', ['type' => 'NHL', 'name' => '- 60 Minutes Betting']) }}">Apuestas en 60 minutos</a></li>
	                                                <li class=" col-sm-12" ><a href="{{ action('HockeyController@getCompetencias', ['type' => 'NHL', 'name' => '- Double Chance']) }}">Doble Oportunidad</a></li>
	                                                <li class=" col-sm-12" ><a href="{{ action('HockeyController@getCompetencias', ['type' => 'NHL', 'name' => '- 1st Goal']) }}">Equipo que marcará el 1er Gol</a></li>
	                                            </ul>

		    									<h6 style="margin-left: 15px" class="col-sm-12"><strong>Goles</strong></h6> 
	                                            <ul class="nav navbar-nav col-sm-4" >
	                                                <li class=" col-sm-12" ><a href="{{ action('HockeyController@getCompetencias', ['type' => 'NHL', 'name' => '- ']) }}">Goles del Partido</a></li>
	                                                <li class=" col-sm-12" ><a href="{{ action('HockeyController@getCompetencias', ['type' => 'NHL', 'name' => '- Total Goals']) }}">Total de Goles por Equipo</a></li>
	                                                <li class=" col-sm-12" ><a href="{{ action('HockeyController@getCompetencias', ['type' => 'NHL', 'name' => '- Time Of 1st Goal']) }}">Tiempo del 1er Gol</a></li>
	                                                <li class=" col-sm-12" ><a href="{{ action('HockeyController@getCompetencias', ['type' => 'NHL', 'name' => '- Easy As 1-2-3']) }}">1, 2 o 3 Goles en cada Tiempo</a></li>
	                                                <li class=" col-sm-12" ><a href="{{ action('HockeyController@getCompetencias', ['type' => 'NHL', 'name' => '- Alternative Total Goals 1']) }}">Total de Goles por Equipo - Alternativo 1</a></li>
	                                            </ul>
	                                            <ul class="nav navbar-nav col-sm-4" >
	                                                <li class=" col-sm-12" ><a href="{{ action('HockeyController@getCompetencias', ['type' => 'NHL', 'name' => '- Race to 2 Goals']) }}">Carrera a 2 Goles</a></li>
	                                                <li class=" col-sm-12" ><a href="{{ action('HockeyController@getCompetencias', ['type' => 'NHL', 'name' => '- Race to 3 Goals']) }}">Carrera a 3 Goles</a></li>
	                                                <li class=" col-sm-12" ><a href="{{ action('HockeyController@getCompetencias', ['type' => 'NHL', 'name' => '- Race to 4 Goals']) }}">Carrera a 4 Goles</a></li>
	                                                <li class=" col-sm-12" ><a href="{{ action('HockeyController@getCompetencias', ['type' => 'NHL', 'name' => '- Race to 5 Goals']) }}">Carrera a 5 Goles</a></li>
	                                            </ul>
	                                            <ul class="nav navbar-nav col-sm-4" >
	                                                <li class=" col-sm-12" ><a href="{{ action('HockeyController@getCompetencias', ['type' => 'NHL', 'name' => '- Total Match Goals Odd/Even']) }}">Total de Goles (Par/Impar)</a></li>
	                                                <li class=" col-sm-12" ><a href="{{ action('HockeyController@getCompetencias', ['type' => 'NHL', 'name' => '- ']) }}">Total de Goles de Equipo Local (Par/Impar)</a></li>
	                                                <li class=" col-sm-12" ><a href="{{ action('HockeyController@getCompetencias', ['type' => 'NHL', 'name' => '- ']) }}">Total de Goles de Equipo Visitante (Par/Impar)</a></li>
	                                                <li class=" col-sm-12" ><a href="{{ action('HockeyController@getCompetencias', ['type' => 'NHL', 'name' => '- 2nd Period Goals Odd/Even']) }}">Total de Goles en el 2do Periodo (Par/Impar)</a></li>
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

	