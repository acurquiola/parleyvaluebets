@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12" >
			<br>
			<br>

			<ol class="breadcrumb">
				<li><a href="{{ URL::to('deportes/hockey') }}">Hockey</a></li>
				@if($nombre != 'Más Apuestas')
					<li><a href="{{ URL::to('deportes/hockey') }}">{{ $type }}</a></li>
					<li><a class="active"><strong>{{ $nombre }}</strong></a></li>
				@else
					<li><a href="{{ redirect()->back()->getTargetUrl() }}">{{ $type }}</a></li>
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
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tabCompeticiones">
							@include('hockey.partials.table')
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

