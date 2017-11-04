<?php

include 'connect.php';

if(!empty($_POST['user']))
	
	{
		$querry="select * from emp_view where id=$_POST['user']";
	
	$result=mysql_query($query) or die();
	
	$row=mysql_fetch_row($result);
	
	echo "Phone: .$row ";
	}
	
	else
	{
		echo "error";
	}
	
?>