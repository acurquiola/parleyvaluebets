@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12" >
			<br>
			<br>

			<ol class="breadcrumb">
				<li><a href="{{ URL::to('deportes/beisbol') }}">Béisbol</a></li>
				@if($nombre != 'Más Apuestas')
					<li><a class="active"><strong>{{ $nombre }}</strong></a></li>
				@else
					<li><a href="{{ redirect()->back()->getTargetUrl() }}">{{ $market }}</a></li>
					<li><a class="active"><strong>{{ $nombre }}</strong></a></li>
				@endif
			</ol>
			<div class="tabbable-panel" style="background-color: #fff">
				<div class="tabbable-line">
					<ul class="nav nav-tabs ">
						<li class="active">
							<a href="#tabCompeticiones" data-toggle="tab" style="text-transform: uppercase">
								<strong>{{ $nombre }}</strong>
							</a>
						</li>
						@if($button == 0)
							<li >
								<a href="#tabMasApuestas" data-toggle="tab">
									<span class="glyphicon glyphicon-plus"></span> <strong> APUESTAS</strong>
								</a>
							</li>
						@endif
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tabCompeticiones">
							@include('beisbol.partials.table')
						</div>
						<div class="tab-pane" id="tabMasApuestas">
							@if(isset($moreMarkets))
								@include('beisbol.partials.moreMarkets')
							@endif
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

