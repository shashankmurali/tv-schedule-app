<!DOCTYPE html>
<html lang="en-US">
	<head>
		<title> User Registration </title>
	</head>
	<body>
		<h2> User Registration </h2>
		{{ Form::open('url' => 'user/register'); }}
		<ul>
			<li>
			{{ Form::label('email', 'Email'); }}
			{{ Form::email('email', Input::old('email')); }}
			</li>
			<li>
			{{ Form::label('password', 'Password'); }}
			{{ Form::password('password'); }}
			</li>
		</ul>
		{{ Form::close(); }}

	</body>

</html>
        
