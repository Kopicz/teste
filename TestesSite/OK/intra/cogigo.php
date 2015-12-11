
<?php session_start();  ?>
<?php
if(!isset($_SESSION['usuario']) && (!isset($_SESSION['senha']))){ 
header("Location: ../index1.php");  
  }
?>
<html lang="">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Techsoft | Gerenciamento Comercial</title>
    <style>
        .corFundo{
          background: url(../img/corFundo.png);
          background-repeat: no-repeat;
        }
        .headLogo{
          margin-bottom: 18px;
         
        }
        #btnLogin{
          margin-top: 8px;

        }
        #imgModel{
          margin-top: 7px;
          margin-bottom: 7px;
          margin-left: 15px;
          height: 180px;
          width: 540px

        }
        #lblLembrar{
          margin-left: 80%;
        }
        #logar{
          margin-left: 27%;
        }
        #divPrincipal{
          width: 80%;
          float: left;
        }
        .panelPrincipal{
          margin-left: 10%;
          width: 80%;
        }
        #divbotao{
          float: left;
        }
        .btn-info{
          width: 200px;

        }

        .endereco{
            float: right;
            text-align: right;
        }
       .img-rounded{
          float: right;
        }
    </style>
 <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

  </head>
  <body>
      <!--/COMEÇO panel principal-->
        <div class="panel panel-primary">
        <div class="panel-body corFundo">
      <!--COMEÇO panel principal-->
      <!--Começo navbar-->
      <div class="headLogo">
        <img src="../img/logo.png" class="img-responsive center-block" alt="Cinque Terre" width="650" height="125">
      </div>

    <nav class="navbar navbar-default">
  <div class="container-fluid">
    
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="http://techsoft.net.br/">Home</a>
    </div>

    
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="empresa.php">Empresa<span class="sr-only">(current)</span></a></li>
        <li><a href="sistema.php">Sistema</a></li>
        <li class="dropdown">
          <a href="sac.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Fale Conosco<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="contato.php">Contato</a></li>
            
            <li><a href="cases.php">Casos de Sucesso</a></li>
            <li class="divider"></li>
            <li><a href="representantes.php">Nossos Representantes</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-left">
        <li><a href="parceiros.php">Parceiros</a></li>
        <li class="dropdown">
          <a href="suporte.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Suporte<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="utilitarios.php">Utilitarios</a></li>
            <li class="disabled"><a tabindex="-1" href="perguntas.php">Perguntas Frequentes</a></li>
            <li class="divider"></li>
            <li><a href="tutoriais.php">Tutorias</a></li>              
            <li class="divider"></li>
            <li><a href="donwloads.php">Downloads</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
              <a href="?sair"><button  id="btnLogin"type="button" class="btn btn-defaut" ><span class="glyphicon glyphicon-log-out"></span> Logout</button></a>
              <?php
              if(isset($_REQUEST['sair'])){ 
                session_destroy();
                header("Location: ../index1.php");  
                }

              ?>

                              
            <div tabindex="-1">
              </div>
      </ul> 

    </div>
  </div>
</nav>
<!--Fechamento navbar-->





<div class="container-fluid" id="divBotao">
  <div class="row-fluid">
    <div class="span2">
      <div id="divBotoes">
            <a href="consultaClient.php?page=1"> <button  type="button" class="btn btn-info" data-toggle="modal" data-target=".bs-example-modal-sm" width="500px">
            <span class="glyphicon glyphicon-user" style="font-size:48px" text-align="center";></span><br>CONSULTA CLIENTES</button></a>
      </div>
            <br>
      <div id="divBotoes">
          <a href="consultaprod.php?page=1"> <button id="btnMenuIntra" type="button" class="btn btn-info" data-toggle="modal" data-target=".bs-example-modal-sm" width="500px">
          <span class="glyphicon glyphicon-barcode" style="font-size:48px" text-align="center";></span><br>CONSULTA PRODUTOS</button></a>
      </div>
    </div>    
  </div>    
</div>    






<!-- panel "novidades"-->
      <div class="panel panel-primary span10" id="divPrincipal">
        <div class="panel-heading">Teste Intranet</div>
        <div class="panel-body">
                <div class="panelPrincipal">               
                  <div>
            

<!---------------------------------------------------------------------------------------------------------------------------------------------------------->
                    <div>
                    <?php include 'conexao.php' ?>
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
        $consulta = "SELECT * FROM clientes";
        $clientes = mysql_query($consulta);
   
    //conta o total de itens
        $total = mysql_num_rows($clientes);
   
    //seta a quantidade de itens por página, neste caso, 2 itens
        $registros = 10;
        $max_links = 3;
    // Exibe o primeiro link "primeira página", que não entra na contagem acima(3)
   
    //calcula o número de páginas arredondando o resultado para cima
        $numPaginas = ceil($total/$registros);
   
    //variavel para calcular o início da visualização com base na página atual
        $inicio = ($registros*$page)-$registros;
 
    //seleciona os itens por página
        
        $consulta = "SELECT * FROM clientes order by CODIGO LIMIT $inicio , $registros";
        $clientes = mysql_query($consulta);
        $total = mysql_num_rows($clientes);
 
    echo '<table class="table table-hover">';  // opening table tag
echo '<thead>
      <tr>
        <th class="info">Codigo</th>
        <th class="info">CPF/CNPJ</th>
        <th class="info">Razao</th>
        <th class="info">Nome</th>
        <th class="info">Endereço</th>
        <th class="info">Numero</th>
    </tr>
    </thead>';
while ($produto = mysql_fetch_array($clientes)) {
echo '<tr>

      <td>'.$produto['CODIGO'].'</td>
      <td>'.$produto['CPFCNPJ'].'</td>
      <td>'.$produto['RAZAO'].'</td>
      <td>'.$produto['NOME'].'</td>
      <td>'.$produto['ENDERECO'].'</td>
      <td>'.$produto['NUMERO'].'</td>';
echo '</tr>'; 
}
echo '</table>';
;
         
echo '
<center>
<nav>
  <ul class="pagination">
    <li>';
      echo "<a href='consultaClient.php?page=1'>primeira pagina</a> ";
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
echo "<li><a href='consultaClient.php?page=$i'>$i</a></li>";
}
}
// Exibe a página atual, sem link, apenas o número
echo "<li class='disabled'><a href='consultaClient.php?page=$i'>$i</a></li>";
// Cria outro for(), desta vez para exibir 3 links após a página atual
for($i = $page+1; $i <= $page+$max_links; $i++) {
// Verifica se a página atual é maior do que a última página. Se for, não faz nada.
if($i > $numPaginas)
{

}
// Se tiver tudo Ok gera os links.
else
{
echo "<li><a href='consultaClient.php?page=$i'>$i</a></li>";
}
}
// Exibe o link "última página"
    echo '<li>';
    echo "<a href='consultaClient.php?page=$numPaginas'>ultima pagina</a> ";
    echo '</li>
  </ul>
</nav>';
?>
<!---------------------------------------------------------------------------------------------------------------------------------------------------------->
                  </div>    

<!-- /panel "novidades"-->

<!--JQuery / Bootstrap-->  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<!--javascript / Bootstrap-->
    <script src="bootstrap/js/bootstrap.min.js"></script>
      </div>
      </div>
         <div id="footer">
        <div class="container">
            <p>&copy; Copyright <a href="empresa.php">Techsoft </a>Sistema de Gerenciamento Comerciais</p>
            <p><a href="http://techsoft.net.br/">Home | </a><a href="empresa.php">Empresa | </a><a href="contato.php"> Contato</a>
            <B class="endereco">Av. Pedro Taques, 399, Lj 01 - Zona Sete - Maringá - PR - Fone/Fax:(44) 3024-9963</B></p>
        </div>
    </div>

<!--/ fechamento panel principal-->
      </div>
      </div>
<!--/ fechamento panel principal-->


    </div>
  </body>
</html>