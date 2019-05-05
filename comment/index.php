<?php
	
	date_default_timezone_set('Asia/Karachi');
	include 'connectionComment.php';
	include 'commentsin.php';
	session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="commentstyle.css">
</head>
<body>
	<?php
	echo "<form method='POST' action='".getLogin($conn)."'>
		<input type='text' name='uid'>
		<input type='password' name='pwd'>
		<button type='submit' name='loginSubmit'>Login</button>
	</form>";

	if(isset($_SESSION['id']))
	{
		echo "You are Logged in!";
	}
	else
	{
		echo "You are not logged out";
	}

	echo "<form method='POST' action='".userLogout()."'>
		<button type='submit' name='logoutSubmit'>Logout</button>
	</form>";

	?>
	<br><br>
<?php
if(isset($_SESSION['id']))
	{
		echo "<form method='POST' action='".setComments($conn)."'>
		<input type='hidden' name='uid' value='".$_SESSION['id']."'>
		<input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>	
		<textarea name='message'></textarea><br>
		<button type='submit' name='commentSubmit'>Comment</button>
	</form> ";

}	else
	{
		echo "You need to be logged in to comment!<br><br>";
	}

	getComments($conn);
?>
</body>
</html>