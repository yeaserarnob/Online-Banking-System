<?php

session_start();
include 'connect_root.php';


	function search()
	{
		session_start();
		
			$query_one="select * from customer where acc_no='$_POST[srch]'";
		$result_one=mysql_query($query_one) or die(mysql_error());
		
	}
	
	if(isset($_POST['submit']))
{
	search();
	header('location:customer_page.php');
}
?>
