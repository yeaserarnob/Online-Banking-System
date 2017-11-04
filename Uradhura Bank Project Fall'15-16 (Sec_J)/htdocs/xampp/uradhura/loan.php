<?php

session_start();
include 'connect_root.php';



	function loan()
	{
		session_start();
		
			$date = date('Y-m-d H:i:s');
			$query_one="update customer set balance=balance+'$_POST[lamount]', loan_amount=loan_amount+'$_POST[lamount]' where acc_no='$_SESSION[acc_no]'";
			$query_two="insert into loan (acc_no,amount,time) values('$_SESSION[acc_no]','$_POST[lamount]','$date')";
		$result_two=mysql_query($query_two) or die("You have Already Taken Loan on, Please Pay Your Dues");	
		$result_one=mysql_query($query_one) or die(mysql_error());
		
	}
	
	function pay_loan()
	{
		session_start();
		
		$date = date('Y-m-d H:i:s');
		$query_one="update customer set balance=balance-'$_POST[damount]', loan_amount=loan_amount-'$_POST[damount]' where acc_no='$_SESSION[acc_no]'";
		$query_two="delete from loan where acc_no='$_SESSION[acc_no]'";
		
		$result_one=mysql_query($query_one) or die(mysql_error());
		$result_two=mysql_query($query_two) or die(mysql_error());
		
	}


	if(isset($_POST['applyloan']))
{
	loan();
	header('location:loan_page.php');
}

if(isset($_POST['payloan']))
{
	pay_loan();
	header('location:loan_page.php');
}
?>
