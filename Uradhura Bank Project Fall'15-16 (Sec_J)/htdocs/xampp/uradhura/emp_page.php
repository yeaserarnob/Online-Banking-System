<?php 
session_start();
        
if(!isset($_SESSION['user'])) 
    header('location:login_page.html');   
?>
<!DOCTYPE html>
<?php
include 'conn_emp.php';
$sql="SELECT * FROM emp where id='$_SESSION[user]'";
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
        <title>Employee Details</title>
    </head>
<body>
	<h2 style="text-align:center"> UrAdHuRa Online Bank Employee Detail </h2>
        
                <div class="displaystaff_content">
				
				<table align="left">
				<th> Employee Photo </th>
				<?php
					include 'connect_root.php';
					echo "<tr>";
					$query="select photo from emp where id='$_SESSION[user]'";
					$rs=mysql_query($query)  or die(mysql_error());
					while($row=mysql_fetch_array($rs))
					{	echo "<td>";
						echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['photo'] ).'"/>';
					}	echo "</td>";
					echo "</tr>";
				?>
            
                    <table align="center">
         
                        <th>Employee Name</th>
						 <th>ID</th>
						  <th>Post</th>
                        <th>Gender</th>                      
                        <th>Address</th>
						<th>Contact No</th>
                        <th>Email</th>
                        <th>DOJ</th>
                       
                        <?php
                        while($rws=  mysql_fetch_array($result)){
							 echo "<tr>";
                       
                            echo "<td>".$rws[name]."</td>";
                            echo "<td>".$rws[id]."</td>";
							echo "<td>".$rws[post]."</td>";
                            echo "<td>".$rws[gender]."</td>";
							echo "<td>".$rws[address]."</td>";
                            echo "<td>".$rws[phone]."</td>";
                            echo "<td>".$rws[email]."</td>";
							 echo "<td>".$rws[date_of_join]."</td>";

                            echo "</tr>";
                        }
                        ?>
                        
                    </table>
					
					<table align="center">
							<form method="POST" action="view_customer.php";>
                            <td>								
								<input type="submit" name="view_customer" id="button" value="View Customer"  >
                            </td>
						</form>	
							<form method="POST" action="view_loan.php";>
                           	<td>							
								<input type="submit" name="view_loan" id="button"  value="View Loan" alt="submit form" > 
                            </td>
                        </form>
							<form method="POST" action="view_deposit.php";>
                           	<td>							
								<input type="submit" name="view_dep" id="button" value="View Deposit" alt="submit form" >
                            </td>
                        </form>
						<form method="POST" action="view_cashout.php";>
                           	<td>							
								<input type="submit" name="view_out" id="button" value="View Cashout" alt="submit form" >
                            </td>
                        </form>
						<form method="POST" action="wel.html";>
                           	<td>							
								<input type="submit" name="logout" id="button" value="Log Out" alt="submit form" >
                            </td>
                        </form>
                    </table>
					
                </div>
                
                
                
            
    </body>
</html>

