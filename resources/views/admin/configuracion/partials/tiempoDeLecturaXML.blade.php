	<h5 style="margin-bottom: 20px">Tiempo entre lecturas de los archivos XML por cada deporte.</h5>
	@foreach($deportes as $deporte)				
		<div class="control-group" >
			<div class="controls">
				<div class="input-prepend input-group  col-md-5">
				<h6 class="add-on input-group-addon">{{ $deporte->name }}</h6> 
					{!! Form::text('minutos', ($deporte->tiempos)?$deporte->tiempos->minutos:'', [ 'id'=>'{{ $deporte->name }}', 'class'=>"form-control text-right"]) !!}
					<span class="add-on input-group-addon">min</span>
					{!! Form::hidden('clase_id', $deporte->id, null) !!}
				</div>
			</div>
		</div>					
	@endforeach