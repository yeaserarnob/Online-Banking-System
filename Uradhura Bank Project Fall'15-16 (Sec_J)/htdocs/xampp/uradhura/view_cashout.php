<?php 
session_start();
        
if(!isset($_SESSION['user'])) 
    header('location:login_page.html');   
?>
<!DOCTYPE html>
<?php
include 'conn_emp.php';
	$sql="SELECT * FROM cash_out inner join customer on cash_out.acc_no=customer.acc_no";
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
        <title>View Customer </title>
    </head>
<body>
	<h2 style="text-align:center"> UrAdHuRa Online Bank </h2>
        
                <div class="displaystaff_content">
            
			<table align="right">
							<form method="POST" action="search_out.php";>
                            <td>	
								<input type="text" name="srch">						
								<input type="submit" id="button" name="submit" value="Search"> &nbsp
								<input type="button" id="button" name="back" value="Back" onclick="history.go(-1);return true;"> &nbsp
								<p>
								<input type="radio" name="search_by" value="name"> Name &nbsp
								<input type="radio" name="search_by" value="acc"> Account No &nbsp
								<p>
								<input type="radio" name="search_by" value="address"> Address &nbsp
								<input type="radio" name="search_by" value="phone"> Phone
								<p>					
							</form>
							
                    </table>
					
                    <table align="center">
         
                       <th>Customer Name</th>	
					   <th>Account No</th>	
						<th>Withdraw Amount</th>	
                        <th>Withdrawn On</th>
						<th>Address</th>	
                        <th>Contact No</th>
                        
                        <?php
                        while($rws=  mysql_fetch_array($result)){
							 echo "<tr>";
					         
					if($rws['amount']!=0)	
					{					
							echo "<td>".$rws[name]."</td>";
							echo "<td>".$rws[acc_no]."</td>";                           
							echo "<td>".$rws[amount]."</td>";
                            echo "<td>".$rws[time]."</td>";                        
							echo "<td>".$rws[address]."</td>";
                            echo "<td>".$rws[phone]."</td>";
							$_SESSION['acc_no']=$rws['acc_no'];
                            echo "</tr>";
					}
                        }
                        ?>
						

						
				      
                    </table>
					
					<table align="center">
						
						
                    </table>
					
                </div>
                
                
                
            
    </body>
</html>

