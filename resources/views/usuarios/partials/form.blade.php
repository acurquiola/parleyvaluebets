<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Username <span class="required">*</span></label>
	<div class="col-md-6 col-sm-6 col-xs-12">
	    {!! Form::text('username', null, [ 'id'=>'username', 'class'=>"form-control col-md-7 col-xs-12", $disabled, 'required']) !!}
	</div>
</div>					
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre <span class="required">*</span></label>
	<div class="col-md-6 col-sm-6 col-xs-12">
	    {!! Form::text('name', null, [ 'id'=>'name', 'class'=>"form-control col-md-7 col-xs-12", $disabled, 'required']) !!}
	</div>
</div>
<div class="form-group">
	<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">E-mail <span class="required">*</span></label>
	<div class="col-md-6 col-sm-6 col-xs-12">
	    {!! Form::text('email', null, [ 'id'=>'email', 'class'=>"form-control col-md-7 col-xs-12", $disabled, 'required']) !!}
	</div>
</div>
<div class="form-group">
	<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tipo de Usuario</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		{!! Form::select('tipoUsuario',["usuario"=>"Usuario", "admin"=>"Administrador"], null, [  'id'=>'tipoUsuario', 'class'=>"form-control col-md-7 col-xs-12" , $disabled, 'required']) !!}
	</div>
</div>
{!! Form::hidden('status', $user->status, null, [  'id'=>'status', 'class'=>"form-control col-md-7 col-xs-12" , $disabled, 'required']) !!}
{!! Form::hidden('password', null, null, [  'id'=>'password', 'class'=>"form-control col-md-7 col-xs-12" , $disabled, 'required']) !!}
<div class="ln_solid"></div>
<div class="form-group">
    <div class="box-footer text-right">
	<button class="btn btn-default">Cancelar</button>
	    @if($disabled!="disabled")
	        <button class="btn btn-success"> {{$SubmitBtnText}} </button>
	    @endif
    </div>

</div>