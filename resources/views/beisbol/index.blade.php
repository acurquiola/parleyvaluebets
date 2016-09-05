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

		    									<h5><strong>MLB</strong></h5>
		                                            <ul class="nav navbar-nav col-sm-3" >
		                                                <li class=" col-sm-12"><a href="#">Ganador de Serie Mundial</a></li>
		                                                <li class=" col-sm-12"><a href="#">Ganador de Liga Nacional</a></li>
		                                                <li class=" col-sm-12"><a href="#">Ganador de Liga Americana</a></li>                                               
		                                                <li class=" col-sm-12"><a href="{{ action('BeisbolController@getDivisionWinner') }}">Ganador de División</a></li>
		                                            </ul>
		                                            <ul class="nav navbar-nav col-sm-3" >
		                                                <li class=" col-sm-12"><a href="#">Liga Ganadora</a></li>
		                                                <li class=" col-sm-12"><a href="#">División Ganadora</a></li>
		                                                <li class=" col-sm-12"><a href="#">Ganador del Partido</a></li>
		                                                <li class=" col-sm-12"><a href="#">Cuota Oro</a></li>
		                                            </ul>
		                                            <ul class="nav navbar-nav col-sm-3" >
		                                                <li class=" col-sm-12"><a href="#">Hándicap de Carreras</a></li>
		                                                <li class=" col-sm-12"><a href="#">Total de Carreras</a></li>
		                                                <li class=" col-sm-12"><a href="#">Primer Jugador en dar Home Run</a></li>
		                                                <li class=" col-sm-12"><a href="#">Jugador que conseguirá un Home Run</a></li>
		                                            </ul>
		                                            <ul class="nav navbar-nav col-sm-3" >
		                                                <li class=" col-sm-12"><a href="#">Apuestas en la 1era entrada</a></li>
		                                                <li class=" col-sm-12"><a href="#">Total Carreras en la 1era entrada</a></li>
		                                            </ul>
		                                        </li>
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

	