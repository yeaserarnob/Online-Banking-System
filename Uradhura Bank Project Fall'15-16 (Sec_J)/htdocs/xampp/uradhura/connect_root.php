<?php

define("db_host","localhost");
define("db_user","root");
define("db_pass","");
define("db_name","uradhura");

$con=mysql_connect(db_host,db_user,db_pass);
$db=mysql_select_db(db_name,$con);

?>