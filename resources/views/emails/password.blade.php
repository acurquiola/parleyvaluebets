<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>

	<p>¡Hola!</p>

	<p>Hemos recibido una solicitud de recuperación de contraseña de tu parte</p>

	<p>Por favor haz clic en el siguiente enlace y completa tu solicitud: 
		<a href="{{ url('password/reset/'.$token) }}">Recuperar Contraseña</a>
	</p>

	<p>¡Hasta pronto!</p>
</body>
</html>