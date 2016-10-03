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
		    									@foreach($competiciones as $competicion)
		    										<h5 class="col-sm-12"><strong>{{ $competicion->name }}</strong></h5>
		    										@foreach($nombres as $nombre => $comp)
		    											@if($comp == $competicion->id)
				                                            <ul class="nav navbar-nav col-sm-3" >
				                                                <li class=" col-sm-12" ><a href="{{ action('HockeyController@getCompeticiones', ['type'=>$comp, 'competicion'=>$nombre]) }}">{{ $nombre }}</a></li>
					                                    	</ul>
					                                    @endif
			                                    	@endforeach
			                                    @endforeach
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

	