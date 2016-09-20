<div class="box-body">
    <div class="form-group">
      <label for="password" class="col-sm-3 control-label">Contraseña</label>

      <div class="col-sm-7">
		    {!! Form::password('password',  array('placeholder'=>'Ingrese Contraseña', 'class'=>'form-control  col-md-7 col-xs-12', 'id'=>'password-2',  'required'  )) !!}
      </div>
    </div>
    <div class="form-group">
      <label for="password_confirm" class="col-sm-3 control-label">Repetir Contraseña</label>

      <div class="col-sm-7">
		    {!! Form::password('password_confirm',  array('placeholder'=>'Ingrese Contraseña Nuevamente', 'class'=>'form-control  col-md-7 col-xs-12', 'id'=>'password-2',  'required'  )) !!}
      </div>
    </div>	
    {!! Form::hidden('username', $user->username, [  'id'=>'username', 'class'=>"form-control" , $disabled, 'required']) !!}
    {!! Form::hidden('confirm_token', $user->confirm_token, [  'id'=>'confirm_token', 'class'=>"form-control" , $disabled, 'required']) !!}
	<div class="ln_solid"></div>
    <div class="box-footer">
	    @if($disabled!="disabled")
    		<a href="{{ action('UserController@index') }}" type="button" class="btn btn-default">Cancelar</a>
	        <button class="btn btn-primary pull-right"> {{$SubmitBtnText}} </button>
	    @endif
    </div>

</div>