<?php 
session_start();
        
if(!isset($_SESSION['user'])) 
    header('location:login_page.html');   
?>
<!DOCTYPE html>
<?php
include 'conn_emp.php';
	$sql_pay="SELECT * FROM fund_transfer inner join customer on fund_transfer.payee_acc_no=customer.acc_no";
	$sql_rec="SELECT * FROM fund_transfer inner join customer on fund_transfer.rev_acc_no=customer.acc_no";
	$sql_count="select * from fund_transfer";
$result_pay=  mysql_query($sql_pay) or die(mysql_error());
$result_rec=mysql_query($sql_rec) or die(mysql_error());
$result_count=mysql_query($sql_count) or die(mysql_error());
$rws=  mysql_fetch_array($result_pay);
$rows=  mysql_fetch_array($result_rec);


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
        <title>View Customer </title>
    </head>
<body>
	<h2 style="text-align:center"> UrAdHuRa Online Bank </h2>
        
                <div class="displaystaff_content">
            
			<table align="center">
							<form method="POST" action="search_dep.php";>
                            <td>								
								Account No <input type="text" name="srch">						
								<input type="submit" id="button" name="submit" value="Search"> &nbsp
							</form>
							<p>
								<form method="POST" action="emp_page.php"; align="center">
													
								<input type="submit" id="button" name="back" value="Back"> 
								
                            </td>
      
                    </table>
                 &nbsp <table align="center">
         
                       <th>Payee Name</th>	
					   <th>Payee Acc No</th>	
					   <th>Receiver Name</th>
					   <th>Rec Acc No</th>	
						<th>Transfered Amount</th>	
                        <th>Transfered On</th>
                        <th>Payee Contact No</th>
                        <th>Receiver Contact No</th>
                        
                        <?php
						
						$count=mysql_num_rows($result_count);
					        while($count!=0)
							{						
					{		echo "<tr>";			
							echo "<td>".$rws[name]."</td>";
							echo "<td>".$rws[payee_acc_no]."</td>"; 
							echo "<td>".$rows[name]."</td>";
							echo "<td>".$rows[rev_acc_no]."</td>";    
							echo "<td>".$rws[amount]."</td>";
                            echo "<td>".$rws[time]."</td>";                        
                            echo "<td>".$rws[phone]."</td>";
                            echo "<td>".$rows[phone]."</td>";
							$_SESSION['acc_no_pay']=$rws['acc_no'];
                            echo "</tr>";
								$count=$count-1;
					}
							}
                       
                        ?>
	
						
				      
                    </table>
					
					
                </div>
                
                
                
            
    </body>
</html>

