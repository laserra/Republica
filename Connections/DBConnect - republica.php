<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_DBConnect = "localhost";
$database_DBConnect = "";
$username_DBConnect = "";
$password_DBConnect = "";
$DBConnect = mysql_pconnect($hostname_DBConnect, $username_DBConnect, $password_DBConnect) or trigger_error(mysql_error(),E_USER_ERROR); 
?>