<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
	session_start();
	if(isset($SESSION['complete']))
	{
		if($SESSION['complete'] == False)
		{
			echo "Please fill the form below";
		}
	}
	?>
	<form method="POST" action="/ress/post/register_post.php">
		Email : <input type="text" name="email"><br>
		Pseudo : <input type="text" name="pseudo"><br>
		Password : <input type="password" name="pass"><br>
		<input type="submit">
	</form>
</body>
</html>