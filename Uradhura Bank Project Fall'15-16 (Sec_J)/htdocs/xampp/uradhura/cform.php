<?php

include 'connect_root.php';
session_start();

	function cform()
	{
		if(isset($_POST['submit']))
		{
			session_start();
			$myfile=fopen("tmp\comment.txt","w")  or die(mysql_error());
			$date = date('Y-m-d H:i:s');
			$sql_one="insert into faq_tab (name,email,comment,time) values ('$_POST[name]','$_POST[email]','$_POST[comment]','$date')";

			$result_one=mysql_query($sql_one) or die(mysql_error());

			$name=mysql_real_escape_string($_POST['name']);
				$email=mysql_real_escape_string($_POST['email']);
				$comment=mysql_real_escape_string($_POST['comment']);
				$str="$name--$email--$comment";
				fwrite($myfile,$str);
			
			fclose($myfile);
		}
	}
	
if(isset($_POST['submit']))
{
	cform();
	header('location:wel.html');
}

?>