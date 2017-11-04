<?php 
session_start();
        
if(!isset($_SESSION['user'])) 
    header('location:login_page.html');   
?>
<!DOCTYPE html>

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
         
                        <th>Customer Name</th>                                           
                        <th>Account No</th>	
						<th>Loan</th>	
                        <th>Address</th>
                        <th>Contact No.</th>
                       
                        <?php
						include 'conn_emp.php';


switch($_POST['search_by'])
{	
	case "name":	$sql="SELECT * FROM customer where name='$_POST[srch]'";
					$result=mysql_query($sql) or die(mysql_error());
					 while($rws=  mysql_fetch_array($result)){
							 echo "<tr>";
                       if($rws['loan_amount']>0)
					   {
						   $loan="Yes";
					   }
					   
					   else
					   {
						   $loan="No";
					   }
                            echo "<td>".$rws[name]."</td>";                           
							echo "<td>".$rws[acc_no]."</td>";                           
							echo "<td>".$loan."</td>";
                            echo "<td>".$rws[address]."</td>";
                            echo "<td>".$rws[phone]."</td>";
							$_SESSION['acc_no']=$rws['acc_no'];
                            echo "</tr>";
                        }
					break;
					
	case "acc":		$sql="SELECT * FROM customer where acc_no='$_POST[srch]'";
					$result=mysql_query($sql) or die(mysql_error());
					 while($rws=  mysql_fetch_array($result)){
							 echo "<tr>";
                       if($rws['loan_amount']>0)
					   {
						   $loan="Yes";
					   }
					   
					   else
					   {
						   $loan="No";
					   }
                            echo "<td>".$rws[name]."</td>";                           
							echo "<td>".$rws[acc_no]."</td>";                           
							echo "<td>".$loan."</td>";
                            echo "<td>".$rws[address]."</td>";
                            echo "<td>".$rws[phone]."</td>";
							$_SESSION['acc_no']=$rws['acc_no'];
                            echo "</tr>";
                        }
					break;
					
	case "address":	$sql="SELECT * FROM customer where address='$_POST[srch]'";
					$result=mysql_query($sql) or die(mysql_error());
					 while($rws=  mysql_fetch_array($result)){
							 echo "<tr>";
                       if($rws['loan_amount']>0)
					   {
						   $loan="Yes";
					   }
					   
					   else
					   {
						   $loan="No";
					   }
                            echo "<td>".$rws[name]."</td>";                           
							echo "<td>".$rws[acc_no]."</td>";                           
							echo "<td>".$loan."</td>";
                            echo "<td>".$rws[address]."</td>";
                            echo "<td>".$rws[phone]."</td>";
							$_SESSION['acc_no']=$rws['acc_no'];
                            echo "</tr>";
                        }
					break;
	
	case "phone":	$sql="SELECT * FROM customer where phone='$_POST[srch]'";
					$result=mysql_query($sql) or die(mysql_error());
					 while($rws=  mysql_fetch_array($result)){
							 echo "<tr>";
                       if($rws['loan_amount']>0)
					   {
						   $loan="Yes";
					   }
					   
					   else
					   {
						   $loan="No";
					   }
                            echo "<td>".$rws[name]."</td>";                           
							echo "<td>".$rws[acc_no]."</td>";                           
							echo "<td>".$loan."</td>";
                            echo "<td>".$rws[address]."</td>";
                            echo "<td>".$rws[phone]."</td>";
							$_SESSION['acc_no']=$rws['acc_no'];
                            echo "</tr>";
                        }
					break;
						
}					
                       
                        ?>
						
				      
                    </table>
					<table align="center">
						
						<form method="POST" action="emp_page.php";>
                            <td>													
								<input type="submit" id="button" name="submit" value="Back"> 
								
                            </td>
                        </form>
                    </table>
					
                </div>
                
                
                
            
    </body>
</html>

