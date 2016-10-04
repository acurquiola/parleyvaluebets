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
	                                            <ul class="nav navbar-nav col-sm-3" >
	                                                <li class=" col-sm-12" ><a href="{{ action('FutbolAmericanoController@getCompetencias', ['type' => 'NFL', 'name' => 'Division Winner']) }}">Ganador de División</a></li>
	                                            </ul>
	                                            <ul class="nav navbar-nav col-sm-3" >
	                                                <li class=" col-sm-12" ><a href="{{ action('FutbolAmericanoController@getCompetencias', ['type' => 'NFL', 'name' => 'Conference Winner']) }}">Ganador de Conferencia</a></li>
	                                            </ul>

		    									<h6 style="margin-left: 15px" class="col-sm-12"><strong>Apuestas por Encuentros</strong></h6>
	                                            <ul class="nav navbar-nav col-sm-3" >
	                                                <li class=" col-sm-12" ><a href="{{ action('FutbolAmericanoController@getCompetencias', ['type' => 'NFL', 'name' => 'Money Line']) }}">Ganador del Partido</a></li>
	                                            </ul>
	                                            <ul class="nav navbar-nav col-sm-3" >
	                                                <li class=" col-sm-12" ><a href="{{ action('FutbolAmericanoController@getCompetencias', ['type' => 'NFL', 'name' => 'Total Points']) }}">Total de Puntos</a></li>
	                                            </ul>
	                                            <ul class="nav navbar-nav col-sm-3" >
	                                                <li class=" col-sm-12" ><a href="{{ action('FutbolAmericanoController@getCompetencias', ['type' => 'NFL', 'name' => 'Spread']) }}">Ganador con Hándicap</a></li>
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

	