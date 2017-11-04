<?php

session_start();

include 'connect_root.php';
	function login()
	{
		session_start();
		
		switch($_POST['type'])
		{
			case "customer":	$cus_query="select * from customer where login_id='$_POST[user]' and login_pass='$_POST[pass]'";
								
								$cus_result=mysql_query($cus_query) or die(mysql_error());
								
								if (mysql_num_rows($cus_result)==0)
								{
									$_SESSION['user']=" ";
									header('location:login_page.html');
									
								}
								
								$cus_row=mysql_fetch_array($cus_result) or die(mysql_error());
								
								
								if(!empty($cus_row['login_id']) and !empty($cus_row['login_pass']))
								{
									$_SESSION['user']=$cus_row['login_id'];
									header('location:customer_page.php');
							
								}
								
								else
								{
									echo "Login as customer error";
								}
								
								break;
								
			case "employee": $emp_query="select * from emp where id='$_POST[user]' and pass='$_POST[pass]'";
								
								$emp_result=mysql_query($emp_query) or die(mysql_error());
								
								$emp_row=mysql_fetch_array($emp_result) or die(mysql_error());
								
								if(!empty($emp_row['id']) and !empty($emp_row['pass']))
								{
									$_SESSION['user']=$emp_row['id'];
									header('location:emp_page.php');
								}
								
								else
								{
									echo "Login as employee error";
								}
								
								break;
								
								
			default : echo "Login failed Please Select Login Type";
						
		}
		
	}
	
if(isset($_POST['submit']))
{
	login();
}

?>