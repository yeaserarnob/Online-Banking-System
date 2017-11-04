<!DOCTYPE html>
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
?>

<html>
	<head>
	<meta charset='UTF-8'>
	<script src="z/modernizr.custom.80028.js"></script>
	
	<title>msg</title>
	
	<link rel='stylesheet' href='st.css'>
	
	<style>
    #note {
        position: absolute;
        z-index: 6001;
        top: 0;
        left: 0;
        right: 0;
        background: #fde073;
        text-align: center;
        line-height: 2.5;
        overflow: hidden; 
        -webkit-box-shadow: 0 0 5px black;
        -moz-box-shadow:    0 0 5px black;
        box-shadow:         0 0 5px black;
    }
    .cssanimations.csstransforms #note {
        -webkit-transform: translateY(-50px);
        -webkit-animation: slideDown 2.5s 1.0s 1 ease forwards;
        -moz-transform:    translateY(-50px);
        -moz-animation:    slideDown 2.5s 1.0s 1 ease forwards;
    }

    #close {
      position: absolute;
      right: 10px;
      top: 9px;
      text-indent: -9999px;
      background: url(images/close.png);
      height: 16px;
      width: 16px;
      cursor: pointer;
    }
    .cssanimations.csstransforms #close {
      display: none;
    }
    
    @-webkit-keyframes slideDown {
        0%, 100% { -webkit-transform: translateY(-50px); }
        10%, 90% { -webkit-transform: translateY(0px); }
    }
    @-moz-keyframes slideDown {
        0%, 100% { -moz-transform: translateY(-50px); }
        10%, 90% { -moz-transform: translateY(0px); }
    }
	</style>
	
</head>

<body>

	<div id="page-wrap">
		
    <div id="note">
        You smell good. <a id="close">[close]</a>
    </div>
    
    
   
    	
	</div>
		
  <script>
   close = document.getElementById("close");
   close.addEventListener('click', function() {
     note = document.getElementById("note");
     note.style.display = 'none';
   }, false);
  </script>
		
</body>

</html>

<?php
	
	if(isset($_POST['submit']))
{
	cashout();
	header('location:xy.php');
}
?>
