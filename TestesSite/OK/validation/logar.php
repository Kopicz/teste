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
<?php 
$host = "localhost";
$user = "root";
$pass = "";
$banco = "techteste";
$conexao = mysql_connect($host, $user, $pass) or die (mysql_error());
mysql_select_db($banco) or die (mysql_error());
?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>teste login 2</title>
 	<script type="text/javascript">
 	function loginsuccessfully () {
 		setTimeout("window.location='../intra/indexlog.php'",500);
 	}
 	function  loginfailed() {
 		setTimeout("window.location='../index1.php'",500);	
 	}

 	</script>
 </head>
 <body>
 	<?php 
$usuario	=	$_POST['usuario'];
$senha	=	$_POST['senha'];
$sql	= 	mysql_query("SELECT * FROM login WHERE usuario = '$usuario' and senha = '$senha'") or die (mysql_error());
$row = mysql_num_rows($sql); 
if($row > 0){
	session_start();
	$_SESSION['usuario']=$_POST['usuario'];
	$_SESSION['senha']=$_POST['senha'];
	echo "<center>aguarde a autenticação final</center>";
	echo "<script>loginsuccessfully();</script>";
}else{
	echo "<center>aguarde e tente novamente login fail</center>";
	echo "<script>loginfailed();</script>";
}

  ?>
 </body>
 </html>
 