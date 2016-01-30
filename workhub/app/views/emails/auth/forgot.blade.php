<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Password Reset</h2>

		<div>
			
			Hello {{$fullname}}<br /><br />
			We have received your request for a password reset Please 
			Click <a href="{{$passlink}}">here</a> to reset your password 
			or copy this link on your browser:<br /><br />
			{{$passlink}}<br /><br />
			
			This link expires in 24 hours.<br />
			
			Ignore this email if you did not.<br />
			
			Best regards from the Squeeber team.
			
		</div>
	</body>
</html>