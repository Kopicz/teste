<?php session_start();  ?>
<?php
if(!isset($_SESSION['usuario']) && (!isset($_SESSION['senha']))){	
header("Location: ../index1.php");	
	}
?>
<!doctype html>
<html>
<head>
<style type="text/css"> 
#btnProdIntra{
	width: 180px;
}

</style>

<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<meta charset="utf-8">
<title>Sessao ok</title>
<style>
*{margin:0; padding:0;}
#topo{width:100%; height:60px; position:relative; margin:0 auto; background-color:#3385ff; overflow:hidden;}
#topo h1{font-family:"Palatino Linotype", "Book Antiqua", Palatino, serif; font-size:36px; color:#fff; line-height:60px;}
</style>
</head>
<body>
<a href="consultaClient.php?page=1"> <button id="btnProdIntra"type="button" class="btn btn-info" data-toggle="modal" data-target=".bs-example-modal-sm" width="500px">
<span class="glyphicon glyphicon-user" style="font-size:48px" text-align="center";></span><br>CONSULTA CLIENTES</button></a>
<a href="consultaprod.php?page=1"> <button id="btnProdIntra"type="button" class="btn btn-info" data-toggle="modal" data-target=".bs-example-modal-sm" width="500px">
<span class="glyphicon glyphicon-barcode" style="font-size:48px" text-align="center";></span><br>CONSULTA PRODUTOS</button></a>

<a href="?sair">sair</a>
<?php
if(isset($_REQUEST['sair'])){	
	session_destroy();
	header("Location: ../index1.php");	
	}
?>
</body>
</html>