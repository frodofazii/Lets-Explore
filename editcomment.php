<?php
	
	date_default_timezone_set('Asia/Karachi');
	include 'connectionComment.php';
	include 'commentsin.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="commentstyle.css">
</head>
<body>
<?php
$cid=$_POST['cid'];
$uid=$_POST['uid'];
$date=$_POST['date'];
$message=$_POST['message'];
echo "<form method='POST' action='".editComments($conn)."'>
		<input type='hidden' name='cid' value='".$cid."'>
		<input type='hidden' name='uid' value='".$uid."'>
		<input type='hidden' name='date' value='".$date."'>	
		<textarea name='message'>".$message."</textarea><br>
		<button type='submit' name='commentSubmit'>Edit</button>
	</form> ";
	
?>
</body>
</html>