<?php
include 'connect_root.php';

$query="select * from customer where acc_no=3069281171";
$result=mysql_query($query);
while($row=mysql_fetch_array($result))
{
	echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['photo'] ).'"/>';
}
?>