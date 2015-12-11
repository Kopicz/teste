<?php session_start();  ?>
<?php
if(!isset($_SESSION['usuario']) && (!isset($_SESSION['senha']))){ 
header("Location: ../index1.php");  
  }
?>
<?php include 'conexao.php' ?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
<?php
$page = $_GET["page"];
if(isset($page)) {
$page = $page;
} else {
$page = 1;
}
    //verifica a página atual caso seja informada na URL, senão atribui como 1ª página
      //  $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
 
    //seleciona todos os itens da tabela
        $consulta = "SELECT * FROM produtos";
        $produtos = mysql_query($consulta);
   
    //conta o total de itens
        $total = mysql_num_rows($produtos);
   
    //seta a quantidade de itens por página, neste caso, 2 itens
        $registros = 10;
        $max_links = 3;
    // Exibe o primeiro link "primeira página", que não entra na contagem acima(3)
   
    //calcula o número de páginas arredondando o resultado para cima
        $numPaginas = ceil($total/$registros);
   
    //variavel para calcular o início da visualização com base na página atual
        $inicio = ($registros*$page)-$registros;
 
    //seleciona os itens por página
        
        $consulta = "SELECT * FROM produtos order by CODIGO LIMIT $inicio , $registros";
        $produtos = mysql_query($consulta);
        $total = mysql_num_rows($produtos);
 
    echo '<table class="table table-hover">';  // opening table tag
echo '<thead>
     <tr>
        <th class="info">Codigo</th>
        <th class="info">Descrição</th>
        <th class="info">Estoque</th>
        <th class="info">Estoque Pendadente</th>
        <th class="info">Preco de Venda</th>
      </tr>
    </thead>';
   
while ($produto = mysql_fetch_array($produtos)) {
  $num = (int) $produto['PRECOVENDA'];
echo '<tr>
        <td>'.$produto['CODIGO'].'</td>
        <td>'.$produto['DESCRICAO'].'</td>
        <td>'.$produto['ESTOQUE'].'</td>
        <td>'.$produto['ESTOQUEPEN'].'</td>
        <td>'.'R$ '.number_format($num, 5).'</td>                 
      </tr>';
echo '</tr>'; 
    //    <td>'.'R$ '.$produto['PRECOVENDA'].'</td>
}
echo '</table>';
;
         

echo '
<center>
<nav>
  <ul class="pagination">
    <li>';
      echo "<a href='consultaprod.php?page=1'>primeira pagina</a> ";
      echo '</a>
    </li>';


// Cria um for() para exibir os 3 links antes da página atual
for($i = $page-$max_links; $i <= $page-1; $i++) {
// Se o número da página for menor ou igual a zero, não faz nada
// (afinal, não existe página 0, -1, -2..)
if($i <=0) {
//faz nada
// Se estiver tudo OK, cria o link para outra página
} else {
echo "<li><a href='consultaprod.php?page=$i'>$i</a></li>";
}
}
// Exibe a página atual, sem link, apenas o número
echo "<li class='disabled'><a href='consultaprod.php?page=$i'>$i</a></li>";
// Cria outro for(), desta vez para exibir 3 links após a página atual
for($i = $page+1; $i <= $page+$max_links; $i++) {
// Verifica se a página atual é maior do que a última página. Se for, não faz nada.
if($i > $numPaginas)
{

}
// Se tiver tudo Ok gera os links.
else
{
echo "<li><a href='consultaprod.php?page=$i'>$i</a></li>";
}
}
// Exibe o link "última página"
    echo '<li>';
    echo "<a href='consultaprod.php?page=$numPaginas'>ultima pagina</a> ";
    echo '</li>
  </ul>
</nav>
<center>';
      
        ?>
                <a href="?sair">logout</a>
<?php
if(isset($_REQUEST['sair'])){ 
  session_destroy();
  header("Location: ../index1.php");  
  }
?>

</div>
</body>
</html>
