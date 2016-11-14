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

		    									<h5><strong>NBA</strong></h5>
		    									<h6 style="margin-left: 15px" class="col-sm-12"><strong>Apuestas de Ganador Final</strong></h6>

	                                            <ul class="nav navbar-nav col-sm-4" >
	                                                <li class=" col-sm-12" ><a href="{{ action('BaloncestoController@getCompetencias', ['type' => 'NBA', 'name' => '- Championship Winner']) }}">Ganador del Campeonato</a></li>
	                                            </ul>
	                                            <ul class="nav navbar-nav col-sm-4" >
	                                                <li class=" col-sm-12" ><a href="{{ action('BaloncestoController@getCompetencias', ['type' => 'NBA', 'name' => '- Conference Winner']) }}">Ganador de Conferencia</a></li>
	                                            </ul>
	                                            <ul class="nav navbar-nav col-sm-4" >
	                                                <li class=" col-sm-12" ><a href="{{ action('BaloncestoController@getCompetencias', ['type' => 'NBA', 'name' => '- Division Winner']) }}">Ganador de División</a></li>
	                                            </ul>

		    									<h6 style="margin-left: 15px" class="col-sm-12"><strong>Apuestas por Encuentros</strong></h6>
	                                            <ul class="nav navbar-nav col-sm-4" >
	                                                <li class=" col-sm-12" ><a href="{{ action('BaloncestoController@getCompetencias', ['type' => 'NBA', 'name' => '- Money Line']) }}">Ganador del Partido</a></li>
	                                                <li class=" col-sm-12" ><a href="{{ action('BaloncestoController@getCompetencias', ['type' => 'NBA', 'name' => '- Double Result']) }}">Doble Resultado (Descanso/Final)</a></li>
	                                                <li class=" col-sm-12" ><a href="{{ action('BaloncestoController@getCompetencias', ['type' => 'NBA', 'name' => '- Total Points Odd/Even']) }}">Total de Puntos (Par/Impar)</a></li>
	                                                <li class=" col-sm-12" ><a href="{{ action('BaloncestoController@getCompetencias', ['type' => 'NBA', 'name' => '- Spread']) }}">Hándicap del Partido</a></li>
	                                            </ul>
	                                            <ul class="nav navbar-nav col-sm-4" >
	                                                <li class=" col-sm-12" ><a href="{{ action('BaloncestoController@getCompetencias', ['type' => 'NBA', 'name' => '- Will There Be Overtime?']) }}">¿Habrá Prórroga?</a></li>
	                                                <li class=" col-sm-12" ><a href="{{ action('BaloncestoController@getCompetencias', ['type' => 'NBA', 'name' => '- Winning Margin']) }}">Márgen de Victoria</a></li>
	                                                <li class=" col-sm-12" ><a href="{{ action('BaloncestoController@getCompetencias', ['type' => 'NBA', 'name' => '- 1st Half Spread']) }}">Hándicap del 1er Tiempo</a></li>
	                                                <li class=" col-sm-12" ><a href="{{ action('BaloncestoController@getCompetencias', ['type' => 'NBA', 'name' => '- Regular Season Wins']) }}">Victorias en Temporada Regular</a></li>
	                                            </ul>
	                                            <ul class="nav navbar-nav col-sm-4" >
	                                                <li class=" col-sm-12" ><a href="{{ action('BaloncestoController@getCompetencias', ['type' => 'NBA', 'name' => '- 1st Half Money Line']) }}">Ganador - Primera mitad</a></li>
	                                                <li class=" col-sm-12" ><a href="{{ action('BaloncestoController@getCompetencias', ['type' => 'NBA', 'name' => 'Quarter Betting']) }}">Apuestas por Periodos</a></li>
	                                                <li class=" col-sm-12" ><a href="{{ action('BaloncestoController@getCompetencias', ['type' => 'NBA', 'name' => 'Total Points']) }}">Total de Puntos</a></li>
	                                                <li class=" col-sm-12" ><a href="{{ action('BaloncestoController@getCompetencias', ['type' => 'NBA', 'name' => ' Last Team To Score']) }}">Último Equipo en Anotar por Cuartos</a></li>
	                                            </ul>

		    									<h6 style="margin-left: 15px" class="col-sm-12"><strong>Hándicaps</strong></h6>
	                                            <ul class="nav navbar-nav col-sm-4" >
	                                                <li class=" col-sm-12" ><a href="{{ action('BaloncestoController@getCompetencias', ['type' => 'NBA', 'name' => '- Quarter Spread']) }}">Periodos - Hándicap</a></li>
	                                            </ul>
	                                            <ul class="nav navbar-nav col-sm-4" >
	                                            </ul>
	                                            <ul class="nav navbar-nav col-sm-4" >
	                                            </ul>

		    									<h6 style="margin-left: 15px" class="col-sm-12"><strong>Hándicaps Alternativos</strong></h6>
	                                            <ul class="nav navbar-nav col-sm-4" >
	                                                <li class=" col-sm-12" ><a href="{{ action('BaloncestoController@getCompetencias', ['type' => 'NBA', 'name' => '- Alternative Quarter Spread']) }}">Periodos - Hándicap</a></li>
	                                            </ul>
	                                            <ul class="nav navbar-nav col-sm-4" >
	                                            </ul>
	                                            <ul class="nav navbar-nav col-sm-4" >
	                                            </ul>

		    									<h6 style="margin-left: 15px" class="col-sm-12"><strong>Margen de Victoria</strong></h6>
	                                            <ul class="nav navbar-nav col-sm-4" >
	                                                <li class=" col-sm-12" ><a href="{{ action('BaloncestoController@getCompetencias', ['type' => 'NBA', 'name' => '- 1st Half Winning Margin']) }}">Margen de Victoria - 1er Tiempo</a></li>
	                                            </ul>
	                                            <ul class="nav navbar-nav col-sm-4" >
	                                            </ul>
	                                            <ul class="nav navbar-nav col-sm-4" >
	                                            </ul>

		    									<h6 style="margin-left: 15px" class="col-sm-12"><strong>Total de Puntos</strong></h6>
	                                            <ul class="nav navbar-nav col-sm-4" >
	                                                <li class=" col-sm-12" ><a href="{{ action('BaloncestoController@getCompetencias', ['type' => 'NBA', 'name' => 'Quarter - Total Points']) }}">Total de Puntos - Periodos</a></li>
	                                            </ul>
	                                            <ul class="nav navbar-nav col-sm-4" >
	                                            </ul>
	                                            <ul class="nav navbar-nav col-sm-4" >
	                                            </ul>

		    									<h6 style="margin-left: 15px" class="col-sm-12"><strong>Cuartos</strong></h6>
	                                            <ul class="nav navbar-nav col-sm-4" >
	                                                <li class=" col-sm-12" ><a href="{{ action('BaloncestoController@getCompetencias', ['type' => 'NBA', 'name' => '1st Quarter Money Line']) }}">Ganador del Primer Cuarto</a></li>
	                                            </ul>
	                                            <ul class="nav navbar-nav col-sm-4" >
	                                                <li class=" col-sm-12" ><a href="{{ action('BaloncestoController@getCompetencias', ['type' => 'NBA', 'name' => '2nd Quarter Money Line']) }}">Ganador del Segundo Cuarto</a></li>
	                                            </ul>
	                                            <ul class="nav navbar-nav col-sm-4" >
	                                                <li class=" col-sm-12" ><a href="{{ action('BaloncestoController@getCompetencias', ['type' => 'NBA', 'name' => 'Quarter - Total Points']) }}">Total de Puntos - Periodos</a></li>
	                                            </ul>

		    									<h6 style="margin-left: 15px" class="col-sm-12"><strong>Otras Apuestas</strong></h6>
	                                            <ul class="nav navbar-nav col-sm-4" >
	                                                <li class=" col-sm-12" ><a href="{{ action('BaloncestoController@getCompetencias', ['type' => 'NBA', 'name' => 'Team To Score']) }}">Equipo que marcará</a></li>
	                                            </ul>
	                                            <ul class="nav navbar-nav col-sm-4" >
	                                                <li class=" col-sm-12" ><a href="{{ action('BaloncestoController@getCompetencias', ['type' => 'NBA', 'name' => 'Race To']) }}">Carrera a X Puntos</a></li>
	                                            </ul>
	                                            <ul class="nav navbar-nav col-sm-4" >
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

	