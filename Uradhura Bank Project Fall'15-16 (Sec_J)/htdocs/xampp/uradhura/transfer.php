<?php

session_start();
include 'connect_root.php';


	function transfer()
	{
		session_start();
		
			$date = date('Y-m-d H:i:s');
			$query_one="update customer set balance=balance-'$_POST[tamount]' where acc_no='$_SESSION[acc_no]'";
			$query_two="update customer set balance=balance+'$_POST[tamount]' where acc_no='$_POST[t_acc]'";
			$query_three="insert into fund_transfer(payee_acc_no,rev_acc_no,amount,time) values('$_SESSION[acc_no]','$_POST[t_acc]','$_POST[tamount]','$date')";
		$result_one=mysql_query($query_one) or die(mysql_error());
		$result_two=mysql_query($query_two) or die(mysql_error());	
		$result_three=mysql_query($query_three) or die(mysql_error());
	}
	
	if(isset($_POST['submit']))
{
	transfer();
	header('location:customer_page.php');
}
?>
