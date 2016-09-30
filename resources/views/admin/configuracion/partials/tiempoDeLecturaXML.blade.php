	<h5 style="margin-bottom: 20px">Tiempo entre lecturas de los archivos XML por cada deporte.</h5>
	@foreach($deportes as $deporte)				
		<div class="control-group col-xs-4" style="margin-right: 25px">
			<div class="controls">
				<div class="input-prepend input-group">
				<span class="add-on input-group-addon">{{ $deporte->name }}</span>
					{!! Form::text('minutos', ($deporte->tiempos)?$deporte->tiempos->minutos:'', [ 'id'=>'{{ $deporte->name }}', 'style'=>'width: 100px', 'class'=>"form-control text-right"]) !!}
					<span class="add-on input-group-addon">min</span>
					{!! Form::hidden('clase_id', $deporte->id, null) !!}
				</div>
			</div>
		</div>					
	@endforeach