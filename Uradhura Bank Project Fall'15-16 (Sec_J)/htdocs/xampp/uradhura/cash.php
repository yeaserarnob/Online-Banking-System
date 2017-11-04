<?php

session_start();
include 'connect_root.php';


	function cashout()
	{
		session_start();
		
		
			$date = date('Y-m-d H:i:s');
			
				$query_one="update customer set balance=balance-'$_POST[amount]' where acc_no='$_SESSION[acc_no]'";
			$query_two="insert into cash_out(acc_no,amount,time) values('$_SESSION[acc_no]','$_POST[amount]','$date')";
		$result_one=mysql_query($query_one) or die(mysql_error());
		$result_two=mysql_query($query_two) or die(mysql_error());
		
				
		

		
	}
	
	if(isset($_POST['out']))
{
	cashout();
	header('location:cash_page.php');
}
?>
