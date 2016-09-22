<div class="box-body">
	{!! Form::hidden('token', $token, null) !!}
	<div class="form-group">
		<label for="password" class="col-sm-3 control-label">Email</label>
		<div class="col-sm-7">
			{!! Form::text('email', null, ['value' => "{{ old('email') }}", 'class'=>'form-control  col-md-7 col-xs-12', 'id'=>'email',  'required' ] ) !!}
		</div>
	</div>
	<div class="form-group">
		<label for="password" class="col-sm-3 control-label">Contraseña</label>
		<div class="col-sm-7">
			{!! Form::password('password',  array('placeholder'=>'Ingrese Contraseña', 'class'=>'form-control  col-md-7 col-xs-12', 'id'=>'password-2',  'required'  )) !!}
		</div>
	</div>
	<div class="form-group">
		<label for="password_confirmation" class="col-sm-3 control-label">Repetir Contraseña</label>

		<div class="col-sm-7">
			{!! Form::password('password_confirmation',  array('placeholder'=>'Ingrese Contraseña Nuevamente', 'class'=>'form-control  col-md-7 col-xs-12', 'id'=>'password-2',  'required'  )) !!}
		</div>
	</div>  
	<div class="ln_solid"></div>
	<div class="box-footer">
		@if($disabled!="disabled")
		<a href="{{ action('UserController@index') }}" type="button" class="btn btn-default">Cancelar</a>
		<button class="btn btn-primary pull-right"> {{$SubmitBtnText}} </button>
		@endif
	</div>
</div>