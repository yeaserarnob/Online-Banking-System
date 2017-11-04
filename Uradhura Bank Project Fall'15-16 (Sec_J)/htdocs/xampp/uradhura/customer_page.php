<?php 
session_start();
        
if(!isset($_SESSION['user'])) 
    header('location:login_page.html');   
?>
<!DOCTYPE html>
<?php
include 'conn_customer.php';
$sql="SELECT * FROM customer where login_id='$_SESSION[user]'";
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
        <title>Customer Details</title>
    </head>
<body>
	<h2 style="text-align:center"> UrAdHuRa Online Bank Customer Detail </h2>
        
                <div class="displaystaff_content">
				
				</table>
                    <table align="center">
         
                        <th>Customer Name</th>
                        <th>Gender</th>                      
                        <th>Account No</th>
						<th>Account Type</th>
						<th>Balance</th>
                        <th>Address</th>
                        <th>Contact No.</th>
                       
                        <?php
                        while($rws=  mysql_fetch_array($result)){
							 echo "<tr>";
                       
                            echo "<td>".$rws[name]."</td>";
                            echo "<td>".$rws[gender]."</td>";
							echo "<td>".$rws[acc_no]."</td>";
                            echo "<td>".$rws[acc_type]."</td>";
							echo "<td>".$rws[balance]."</td>";
                            echo "<td>".$rws[address]."</td>";
                            echo "<td>".$rws[phone]."</td>";
							$_SESSION['acc_no']=$rws['acc_no'];
                            echo "</tr>";
                        }
                        ?>
						
				      
                    </table>
					<table align="center">
							<form method="POST" action="cash_page.php";>
                            <td>								
								<input type="submit" name="cashout" id="button" value="Cash Out" alt="submit form" >
                            </td>
						</form>	
							<form method="POST" action="deposit_page.php";>
								<td>								
									<input type="submit" name="deposit" id="button" value="Deposit" alt="submit form" >
								</td>
							</form>
							<form method="POST" action="transfer_page.php";>
                           	<td>							
								<input type="submit" name="transfer" id="button" value="Transfer Balance" alt="submit form" > 
                            </td>
                        </form>
							<form method="POST" action="loan_page.php";>
                           	<td>							
								<input type="submit" name="loan" id="button" value="Loan" alt="submit form" >
                            </td>
                        </form>
						<form method="POST" action="wel.html";>
                            <td>								
								<input type="submit" name="cashout" id="button" value="Log Out" alt="submit form" >
                            </td>
						</form>	
                    </table>
                </div>
                
                
                
            
    </body>
</html>

