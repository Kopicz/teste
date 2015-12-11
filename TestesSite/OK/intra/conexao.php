<?php 
$host = "localhost";
$user = "root";
$pass = "";
$banco = "techteste";
$conexao = mysql_connect($host, $user, $pass) or die (mysql_error());
mysql_select_db($banco) or die (mysql_error());
?>
<!-- login server site
<?php 
//$host = "cpmy0039.servidorwebfacil.com";
//$user = "techsoft_root";
//$pass = "t123t";
//$banco = "techsoft_login";
//$conexao = mysql_connect($host, $user, $pass) or die (mysql_error());
//mysql_select_db($banco) or die (mysql_error());
?>
-->