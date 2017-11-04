<?php 
session_start();
        
if(!isset($_SESSION['user'])) 
    header('location:login_page.html');   
?>
<!DOCTYPE html>
<?php
include 'conn_customer.php';
$sql="SELECT * FROM customer where acc_no='$_SESSION[acc_no]'";
$result=  mysql_query($sql) or die(mysql_error());
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="newcss.css"/>
        <style>
            .displaystaff_content table,th,td {
    padding:10px;
    border: 1px solid #2E4372;
   border-collapse: collapse;
}

        </style>
        <title>Customer Transfer</title>
    </head>
<body>
	<h2 style="text-align:center"> UrAdHuRa Online Transfer Portal </h2>
        
                <div class="displaystaff_content">
            
                    <table align="center">
         
                        <th>Account No</th>
						<th>Account Type</th>
						<th>Available Balance</th>
                       
                        <?php
                        while($rws=  mysql_fetch_array($result)){
							 echo "<tr>";
                       
                            echo "<td>".$rws[acc_no]."</td>";
							echo "<td>".$rws[acc_type]."</td>";
                            echo "<td>".$rws[balance]."</td>";
							

                            echo "</tr>";
                        }
                        ?>
                        
                    </table>
					
					<table align="center">
						<td>	
							<form method="POST" action="transfer.php";>
             					
								 Enter The Amount: <input type="text" name="tamount" id="button"> &nbsp
								
								 Enter Account No: <input type="text" name="t_acc" id="button"> &nbsp								
								<input type="submit" name="submit" id="button" value="Transfer"> &nbsp
							
							<form method="POST" action="customer_page.php";>  
								<input type="submit" name="submit" id="button" value="Back"> &nbsp														
							
						</td>
                    </table>
					
                </div>
              
                
                
            
    </body>
</html>

