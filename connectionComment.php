<?php

$conn=mysqli_connect('localhost','root','','letsexplore');

if(!$conn)
{
	die("Connection failed: ".mysqli_connect_error());
}

?>