<?php
session_start();
include 'connect_root.php';

			function signup()
			{
			
			if(isset($_POST['submit']))
			{
				
			$name= mysql_real_escape_string($_POST['name']);
			$address= mysql_real_escape_string($_POST['address']);
			$gender= mysql_real_escape_string($_POST['gender']);
			$phone= mysql_real_escape_string($_POST['phone']);
			$id= mysql_real_escape_string($_POST['id']);
			$pass= mysql_real_escape_string($_POST['pass']);
			$accno=strrev($_POST['phone']);
			$acctype= mysql_real_escape_string($_POST['acctype']);

			if($acctype=="savings")
			{
				$str="111";
				$accno="$str-$accno";
			}
			else if($acctype=="current")
			{
				$str="122";
				$accno="$str-$accno";
			}
			$balance=mysql_real_escape_string($_POST['deposit']);
			$loan=0;
			$date = date('Y-m-d H:i:s');
			
			$query_one="insert into customer (name,gender,address,phone,acc_no,acc_type,login_id,login_pass,balance,loan_amount) values('$name','$gender','$address','$phone','$accno','$acctype','$id','$pass','$balance','$loan')";
			$query_two="insert into deposit (acc_no,amount,time) values('$accno','$balance','$date')";
			$result_one=mysql_query($query_one) or die(mysql_error());
			$result_two=mysql_query($query_two) or die(mysql_error());
			
			
			}
			
			else
			{
				echo "Error2";
			}
				
			
			}
			

if(isset($_POST['submit']))
{
	signup();
	header('location:login_page.html');
}


?>