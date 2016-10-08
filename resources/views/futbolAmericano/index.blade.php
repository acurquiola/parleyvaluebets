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

		    									<h5><strong>NFL</strong></h5>
		    									<h6 style="margin-left: 15px" class="col-sm-12"><strong>Apuestas de Ganador Final</strong></h6>

	                                            <ul class="nav navbar-nav col-sm-4" >
	                                                <li class=" col-sm-12" ><a href="{{ action('FutbolAmericanoController@getCompetencias', ['type' => 'NFL', 'name' => '- Super Bowl Outright']) }}">Ganador de Super Bowl</a></li>
	                                            </ul>
	                                            <ul class="nav navbar-nav col-sm-4" >
	                                                <li class=" col-sm-12" ><a href="{{ action('FutbolAmericanoController@getCompetencias', ['type' => 'NFL', 'name' => '- Division Winner']) }}">Ganador de División</a></li>
	                                            </ul>
	                                            <ul class="nav navbar-nav col-sm-4" >
	                                                <li class=" col-sm-12" ><a href="{{ action('FutbolAmericanoController@getCompetencias', ['type' => 'NFL', 'name' => '- Conference Winner']) }}">Ganador de Conferencia</a></li>
	                                            </ul>

		    									<h6 style="margin-left: 15px" class="col-sm-12"><strong>Apuestas por Encuentros</strong></h6>
	                                            <ul class="nav navbar-nav col-sm-4" >
	                                                <li class=" col-sm-12" ><a href="{{ action('FutbolAmericanoController@getCompetencias', ['type' => 'NFL', 'name' => '- Money Line']) }}">Ganador del Partido</a></li>
	                                                <li class=" col-sm-12" ><a href="{{ action('FutbolAmericanoController@getCompetencias', ['type' => 'NFL', 'name' => '- Total Points']) }}">Total de Puntos</a></li>
	                                                <li class=" col-sm-12" ><a href="{{ action('FutbolAmericanoController@getCompetencias', ['type' => 'NFL', 'name' => '- Spread']) }}">Ganador con Hándicap</a></li>
	                                                <li class=" col-sm-12" ><a href="{{ action('FutbolAmericanoController@getCompetencias', ['type' => 'NFL', 'name' => '- To Win + Total Points Double']) }}">Doble al ganador + Total de Puntos</a></li>
	                                            </ul>
	                                            <ul class="nav navbar-nav col-sm-4" >
	                                                <li class=" col-sm-12" ><a href="{{ action('FutbolAmericanoController@getCompetencias', ['type' => 'NFL', 'name' => '- Winning Margins']) }}">Márgen de Victoria</a></li>
	                                                <li class=" col-sm-12" ><a href="{{ action('FutbolAmericanoController@getCompetencias', ['type' => 'NFL', 'name' => '- Double Result']) }}">Doble Resultado (Descanso / Final)</a></li>
	                                                <li class=" col-sm-12" ><a href="{{ action('FutbolAmericanoController@getCompetencias', ['type' => 'NFL', 'name' => '- Will There Be Overtime?']) }}">¿Habrá Prórroga?</a></li>
	                                                <li class=" col-sm-12" ><a href="{{ action('FutbolAmericanoController@getCompetencias', ['type' => 'NFL', 'name' => '- Match Spread + Total Points Double']) }}">Doble al Hándicap + Total de Puntos</a></li>
	                                            </ul>
	                                            <ul class="nav navbar-nav col-sm-4" >
	                                                <li class=" col-sm-12" ><a href="{{ action('FutbolAmericanoController@getCompetencias', ['type' => 'NFL', 'name' => '- First Touchdown Scorer']) }}">Primer Jugador en anotar TD</a></li>
	                                                <li class=" col-sm-12" ><a href="{{ action('FutbolAmericanoController@getCompetencias', ['type' => 'NFL', 'name' => '- Anytime Touchdown Score']) }}">Jugador que anota un TD en cualquier momento</a></li>
	                                                <li class=" col-sm-12" ><a href="{{ action('FutbolAmericanoController@getCompetencias', ['type' => 'NFL', 'name' => '- Last Touchdown Scorer']) }}">Último jugador en anotar TD</a></li>
	                                            </ul>

		    									<h6 style="margin-left: 15px" class="col-sm-12"><strong>Apuestas por Mitades</strong></h6>
	                                            <ul class="nav navbar-nav col-sm-4" >
	                                                <li class=" col-sm-12" ><a href="{{ action('FutbolAmericanoController@getCompetencias', ['type' => 'NFL', 'name' => '- 1st Half Money Line']) }}">Ganador - Primera mitad</a></li>
	                                                <li class=" col-sm-12" ><a href="{{ action('FutbolAmericanoController@getCompetencias', ['type' => 'NFL', 'name' => '- 1st Half Winning Margins']) }}">Margen de Victoria - Primera mitad</a></li>
	                                                <li class=" col-sm-12" ><a href="{{ action('FutbolAmericanoController@getCompetencias', ['type' => 'NFL', 'name' => '- 2nd Half - 1st Team Touchdown']) }}">Primer Equipo en anotar TD - Segunda mitad</a></li>
	                                            </ul>
	                                            <ul class="nav navbar-nav col-sm-4" >
	                                                <li class=" col-sm-12" ><a href="{{ action('FutbolAmericanoController@getCompetencias', ['type' => 'NFL', 'name' => '- 1st Half Total Points']) }}">Total de Puntos - Primera mitad</a></li>
	                                                <li class=" col-sm-12" ><a href="{{ action('FutbolAmericanoController@getCompetencias', ['type' => 'NFL', 'name' => '- 2nd Half Winning Margins']) }}">Margen de Victoria - Segunda Mitad</a></li>
	                                                <li class=" col-sm-12" ><a href="{{ action('FutbolAmericanoController@getCompetencias', ['type' => 'NFL', 'name' => '- Total 2nd Half Touchdowns']) }}">Total de TD - Segunda Mitad</a></li>
	                                            </ul>
	                                            <ul class="nav navbar-nav col-sm-4" >
	                                                <li class=" col-sm-12" ><a href="{{ action('FutbolAmericanoController@getCompetencias', ['type' => 'NFL', 'name' => '- 1st Half Money Line']) }}">Ganador con Hándicap - Primera mitad</a></li>
	                                                <li class=" col-sm-12" ><a href="{{ action('FutbolAmericanoController@getCompetencias', ['type' => 'NFL', 'name' => '- Total 1st Half Touchdowns']) }}">Total de TD - Primera mitad</a></li>
	                                                <li class=" col-sm-12" ><a href="{{ action('FutbolAmericanoController@getCompetencias', ['type' => 'NFL', 'name' => '- 1st Half Result/2nd Half Result']) }}">Resultado 1er Tiempo / 2do Tiempo</a></li>
	                                            </ul>

		    									<h6 style="margin-left: 15px" class="col-sm-12"><strong>Apuestas por cuartos</strong></h6>
	                                            <ul class="nav navbar-nav col-sm-4" >
	                                                <li class=" col-sm-12" ><a href="{{ action('FutbolAmericanoController@getCompetencias', ['type' => 'NFL', 'name' => '- Home Team Quarters Won']) }}">Cuartos ganados por el equipo local</a></li>
	                                            </ul>
	                                            <ul class="nav navbar-nav col-sm-4" >
	                                                <li class=" col-sm-12" ><a href="{{ action('FutbolAmericanoController@getCompetencias', ['type' => 'NFL', 'name' => '- Away Team Quarters Won']) }}">Cuartos ganados por el equipo visitante</a></li>
	                                            </ul>
	                                            <ul class="nav navbar-nav col-sm-4" >
	                                                <li class=" col-sm-12" ><a href="{{ action('FutbolAmericanoController@getCompetencias', ['type' => 'NFL', 'name' => '- Highest Scoring Quarter']) }}">Cuarto con más puntos</a></li>
	                                            </ul>
	                                            <ul class="nav navbar-nav col-sm-4" >
	                                            </ul>

		    									<h6 style="margin-left: 15px" class="col-sm-12"><strong>Totales</strong></h6>
	                                            <ul class="nav navbar-nav col-sm-4" >
	                                                <li class=" col-sm-12" ><a href="{{ action('FutbolAmericanoController@getCompetencias', ['type' => 'NFL', 'name' => '- Alternative Total Points']) }}">Total de Puntos Alternativo</a></li>
	                                                <li class=" col-sm-12" ><a href="{{ action('FutbolAmericanoController@getCompetencias', ['type' => 'NFL', 'name' => '- Total Match Points Odd/Even']) }}">Total Par/Impar</a></li>

	                                            </ul>
	                                            <ul class="nav navbar-nav col-sm-4" >
	                                                <li class=" col-sm-12" ><a href="{{ action('FutbolAmericanoController@getCompetencias', ['type' => 'NFL', 'name' => '- 1st Half Total Points']) }}">Total de Puntos - Primera mitad</a></li>
	                                            </ul>
	                                            <ul class="nav navbar-nav col-sm-4" >
	                                                <li class=" col-sm-12" ><a href="{{ action('FutbolAmericanoController@getCompetencias', ['type' => 'NFL', 'name' => '- 2nd Half Total Points']) }}">Total de Puntos - Segunda mitad</a></li>
	                                            </ul>

		    									<h6 style="margin-left: 15px" class="col-sm-12"><strong>Hándicaps</strong></h6>
	                                            <ul class="nav navbar-nav col-sm-4" >
	                                                <li class=" col-sm-12" ><a href="{{ action('FutbolAmericanoController@getCompetencias', ['type' => 'NFL', 'name' => '- Alternative Handicaps']) }}">Hándicap Alternativo</a></li>
	                                            </ul>
	                                            <ul class="nav navbar-nav col-sm-4" >
	                                            </ul>
	                                            <ul class="nav navbar-nav col-sm-4" >
	                                            </ul>

		    									<h6 style="margin-left: 15px" class="col-sm-12"><strong>Anotación</strong></h6>
	                                            <ul class="nav navbar-nav col-sm-4" >
	                                                <li class=" col-sm-12" ><a href="{{ action('FutbolAmericanoController@getCompetencias', ['type' => 'NFL', 'name' => '- 1st Team Touchdown']) }}">Primer equipo en conseguir TD</a></li>
	                                            </ul>
	                                            <ul class="nav navbar-nav col-sm-4" >
	                                                <li class=" col-sm-12" ><a href="{{ action('FutbolAmericanoController@getCompetencias', ['type' => 'NFL', 'name' => '- Total Away Touchdowns']) }}">Total de TD por el equipo visitante</a></li>
	                                            </ul>
	                                            <ul class="nav navbar-nav col-sm-4" >
	                                                <li class=" col-sm-12" ><a href="{{ action('FutbolAmericanoController@getCompetencias', ['type' => 'NFL', 'name' => '- Total Away Touchdowns']) }}">Total de TD por el equipo visitante</a></li>
	                                            </ul>

		    									<h6 style="margin-left: 15px" class="col-sm-12"><strong>Estadísticas</strong></h6>
	                                            <ul class="nav navbar-nav col-sm-4" >
	                                                <li class=" col-sm-12" ><a href="{{ action('FutbolAmericanoController@getCompetencias', ['type' => 'NFL', 'name' => '- Will There Be A Safety?']) }}">¿Habrá Safety?</a></li>
	                                                <li class=" col-sm-12" ><a href="{{ action('FutbolAmericanoController@getCompetencias', ['type' => 'NFL', 'name' => '- 1st Team To Turnover']) }}">Primer equipo en conseguir Turnover</a></li>
	                                            </ul>
	                                            <ul class="nav navbar-nav col-sm-4" >
	                                                <li class=" col-sm-12" ><a href="{{ action('FutbolAmericanoController@getCompetencias', ['type' => 'NFL', 'name' => '- Total Match Turnovers']) }}">Total de Turnovers del partido</a></li>
	                                                <li class=" col-sm-12" ><a href="{{ action('FutbolAmericanoController@getCompetencias', ['type' => 'NFL', 'name' => '- Team With Most Punts']) }}">Equipo con más punts</a></li>
	                                            </ul>
	                                            <ul class="nav navbar-nav col-sm-4" >
	                                                <li class=" col-sm-12" ><a href="{{ action('FutbolAmericanoController@getCompetencias', ['type' => 'NFL', 'name' => '- Team With Most Turnovers']) }}">Equipo con más Turnovers</a></li>
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

	