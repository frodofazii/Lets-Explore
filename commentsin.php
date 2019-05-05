<?php


function setComments($conn)
{
	if(isset($_POST['commentSubmit']))
	{
		$uid=$_POST['uid'];
		$date=$_POST['date'];
		$message=$_POST['message'];
			$sql= "INSERT INTO comments (uid,date,message) VALUES('$uid','$date','$message')";
			$result =$conn->query($sql);
	}
}
function getComments($conn)
{
		$sql = "SELECT * FROM comments";
		$result =$conn->query($sql);
		while($row =$result->fetch_assoc()){

				$id=$row['uid'];
				$sql2 = "SELECT * FROM usermanagement WHERE id='$id' ";
				$result2 =$conn->query($sql2);

				if($row2 = $result2->fetch_assoc())
				{
					echo"<div class='comment-box'><p>";
		echo $row2['username']."<br>";
		echo $row['date']."<br>";
		echo nl2br($row['message']);
		echo "</p>";

		if(isset($_SESSION['id']))
		{
			if($_SESSION['id']== $row2['id'])
			{
				echo "<form class='delete-form' method='POST' action='".deleteComments($conn)."'>
						<input type='hidden' name='cid' value='".$row['cid']."'>
						<button name='commentDelete' type='submit' >Delete</button> 
						</form>


						<form class='edit-form' method='POST' action='editcomment.php'>
						<input type='hidden' name='cid' value='".$row['cid']."'>
						<input type='hidden' name='uid' value='".$row['uid']."'>
						<input type='hidden' name='date' value='".$row['date']."'>
						<input type='hidden' name='message' value='".$row['message']."'>
						
						<button>Edit</button> 

						</form>";
							}
							else
							{
								echo "<form class='edit-form' method='POST' action='".deleteComments($conn)."'>
						<input type='hidden' name='cid' value='".$row['cid']."'>
						<button name='commentDelete' type='submit' >Reply</button> 
						</form> ";

							}
		}
		else{
			echo "<p class='commentmessage' >You Need to be Logged in to reply!</p>";
		}
		
	echo "</div>";			
				}


		
}
}
function editComments($conn)
{
	if(isset($_POST['commentSubmit']))
	{
		$cid=$_POST['cid'];
		$uid=$_POST['uid'];
		$date=$_POST['date'];
		$message=$_POST['message'];
			$sql= "UPDATE comments SET message='$message' WHERE cid='$cid' ";
			$result =$conn->query($sql);
			header("Location:index.php");
	}
}

function deleteComments($conn)
{
if(isset($_POST['commentDelete']))
	{
		$cid=$_POST['cid'];

			$sql= "DELETE FROM comments WHERE cid='$cid' ";
			$result =$conn->query($sql);
			header("Location:index.php");
	}

}

function getLogin($conn)
{
		if(isset($_POST['loginSubmit'])){
			$uid= $_POST['uid'];
			$pwd= $_POST['pwd'];


			$sql = "SELECT * FROM usermanagement WHERE email='$uid' AND password='$pwd' ";
			$result =$conn->query($sql);
			if (mysqli_num_rows($result)>0) {
				
				if($row =$result->fetch_assoc()){
					$_SESSION['id'] = $row['id'];
					$_SESSION['uid'] = $row['email'];
					
					header("Location:index.php?loginsuccess");	
					exit();
			
			}
				 
			}
			else
			{
				header("Location:index.php?loginfailed");	
					exit();
			}

	}
}



function userLogout()
{
	
if(isset($_POST['logoutSubmit'])){
	session_start();
	session_destroy();
	header("Location:index.php");
	exit();

}
	
}

?>