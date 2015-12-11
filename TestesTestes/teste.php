<html>
 <head>
  <title>PHP Teste</title>
 </head>
 <body>
 <form action="teste.php" method="post">
 <input type="text" name="nome"/><br>
  
<input type="submit" name="Teste"/>
 </form>
 <?php 
 $nome = $_POST['nome'];
 print $nome;
 ?>
 </body>
</html>