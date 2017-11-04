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
        <title>Customer Cash Out</title>
    </head>
<body>
	<h2 style="text-align:center"> UrAdHuRa Online Cash Out Portal </h2>
        
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
							<form method="POST" action="cash.php";>
              
                            <td>								
								 Enter The Amount  <input type="text" name="amount" id="button"> &nbsp
								<input type="submit" name="out" id="button" value="Cash Out"> &nbsp
							</form>
					</table>		
						<table align="center">	
							<td>
							<form method="POST" action="customer_page.php";>  
								
								<input type="submit" name="back" id="button" value="Back">						
								
							</form>
							
                            </td>
                        </tr>
                    </table>
					
                </div>
                
                
                
            
    </body>
</html>

