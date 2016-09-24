<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>

	<p>¡Hola <strong>{{ $data['name'] }}</strong>! Bienvenido a ParleyValueBets.</p>

	<p>Necesitamos confirmar tu cuenta de correo electrónico para darte acceso a nuestra web.</p>

	<p>Por favor haz clic en el siguiente enlace y completa el registro: 
		<a href="{{ action('UserController@getPassword', ['email' => $data['email'], 'token' => $data['confirm_token']]) }}">Confirmar correo</a>
	</p>

	<p>¡Gracias!</p>
</body>
</html>