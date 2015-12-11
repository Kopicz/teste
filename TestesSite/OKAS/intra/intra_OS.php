<?php include conexao.php ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
$consulta = mysql_query("SELECT * FROM cademp order by codigo");
echo   '<table border=1px>';  // opening table tag
echo   '<th><strong>Codigo</strong></th>
		<th><strong>CNPJ</strong></th>
		<th><strong>Razao</strong></th>
		<th><strong>Nome</strong></th>
<th>data versao</th>';
while($dado = mysql_fetch_array($consulta)){
echo'<tr>'; // printing table row
echo '<td>'.$dado['codigo'].'</td>
	  <td>'.$dado['cnpj'].'</td>
	  <td>'.$dado['razao'].'</td>
	  <td>'.$dado['nome'].'</td>
	  <td>'.$dado['dtversao'].'</td>';
echo'</tr>'; }
echo '</table>'; 
?>
</body>
</html>