<html lang="">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Techsoft | Gerenciamento Comercial</title>
    <style>
        .corFundo{
          background: url(img/corFundo.png);
          background-repeat: no-repeat;
        }
        .headLogo{
          margin-bottom: 18px;
         
        }
        .panelPrincipal{
          margin-left: 10%;
          width: 80%;
        }
        .endereco{
            float: right;
            text-align: right;
        }
       .img-rounded{
          float: right;
        }
    </style>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

  </head>
  <body>
      <!--/COMEÇO panel principal-->
        <div class="panel panel-primary">
        <div class="panel-body corFundo">
      <!--COMEÇO panel principal-->
      <!--Começo navbar-->
      <div class="headLogo">
        <img src="img/logo.png" class="img-responsive center-block" alt="Cinque Terre" width="650" height="125">
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
        <li class="active"><a href="empresa.html">Empresa<span class="sr-only">(current)</span></a></li>
        <li><a href="sistema.html">Sistema</a></li>
        <li class="dropdown">
          <a href="sac.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Fale Conosco<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="contato.html">Contato</a></li>
            
            <li><a href="cases.html">Casos de Sucesso</a></li>
            <li class="divider"></li>
            <li><a href="representantes.html">Nossos Representantes</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-left">
        <li><a href="parceiros.html">Parceiros</a></li>
        <li class="dropdown">
          <a href="suporte.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Suporte<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="utilitarios.html">Utilitarios</a></li>
            <li class="disabled"><a tabindex="-1" href="perguntas.html">Perguntas Frequentes</a></li>
            <li class="divider"></li>
            <li><a href="tutoriais.html">Tutorias</a></li>              
            <li class="divider"></li>
            <li><a href="donwloads.html">Downloads</a></li>
          </ul>
        </li>
      </ul>
     
          <ul class="nav navbar-nav navbar-right">
            <li><a href="cadastro.html"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li><a href="login.html"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          </ul>      
      

    </div>
  </div>
</nav>
<!--Fechamento navbar-->

<!-- panel "novidades"-->
      <div class="panel panel-primary">
        <div class="panel-heading">arquivos</div>
        <div class="panel-body">
                <div class="panelPrincipal">               
                  <div>
                    <h2><b>Versao</b></h2>
                      <p>
                      <p>
                      <form method="get" action="ferramentas.php">

                      <?php 
                      $dados = arry(
                        )


                      ?>


                      <!-- 
                        <?php
                        ftp://Techsoft@177.72.160.78/atualiza/
                          $link1 = "ftp://Techsoft:";
                          $link2 = "istema2014";
                          $link3= "@177.72.160.78/atualiza";
                          $linha = file($link1."$".$link2."".$link3."/".'versao.txt',FILE_IGNORE_NEW_LINES);
                              echo "<a href=".$link1."$".$link2."".$link3."/".$linha[0].">Versões</a>"; 
                          ?>
                                <?php
                                 /*
                                  link de Download
                                    $link1 = "ftp://Techsoft:";
                                  $link2 = "istema2014";
                                  $link3= "@177.72.160.78/atualiza";
                                     $versao = fopen($link1."$".$link2."".$link3."/"."versao.txt", "r");
                                     feof ($versao);
                                       $linha = fgets($versao,4096);
                                        echo "<a href=".$link1."$".$link2."".$link3."/".$linha.">Versões</a>"; 
                                   fclose ($versao);
                              */?>
                          -->
                      </form>
                      </p>
                          <h2><b>Utilitarios</b></h2>
                        <p>
                     <script>
                          document.write(unescape("%20%20%20%20%20%20%20%3Ca%20href%3D%22ftp%3A//Techsoft%3A%24istema2014@177.72.160.78/downloads/AA.rar%22%3EAssistencia%20Remota%3C/a%3E%0A"));
                      </script>
                        </p>
                        <script>
                            document.write(unescape("%3Ca%20href%3D%22ftp%3A//Techsoft%3A%24istema2014@177.72.160.78/downloads/dbu.rar%22%3EDBU%3C/a%3E"));
                        </script>
                      </p>
                      
                      <p>
                        <script>
                            document.write(unescape("%3Ca%20href%3D%22ftp%3A//Techsoft%3A%24istema2014@177.72.160.78/downloads/DOSPrint.zip%22%3EDos-Print%3C/a%3E"));
                        </script>
                      </p>
                      
                      <p>
                        <script>
                            document.write(unescape("%3Ca%20href%3D%22ftp%3A//Techsoft%3A%24istema2014@177.72.160.78/downloads/impressora%2520PDF.zip%22%3EImpressora%20PDF%3C/a%3E"));
                        </script>
                      </p>
                      
                      <p>
                        <script>
                            document.write(unescape("%3Ca%20href%3D%22ftp%3A//Techsoft%3A%24istema2014@177.72.160.78/downloads/list.rar%22%3EList%3C/a%3E"));
                        </script>
                      </p>
                      
                      <p>
                        <script>
                            document.write(unescape("%3Ca%20href%3D%22ftp%3A//Techsoft%3A%24istema2014@177.72.160.78/downloads/ourXdbu.rar%22%3EourXdbu%3C/a%3E"));
                        </script>
                      </p>

                      <p>
                        <script>
                            document.write(unescape("%3Ca%20href%3D%22ftp%3A//Techsoft%3A%24istema2014@177.72.160.78/downloads/ValidSetup.rar%22%3EInstalador%20Valid%3C/a%3E"));
                        </script>
                      </p>
                      
                  </div>
                </div>
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
            <p>&copy; Copyright <a href="empresa.html">Techsoft </a>Sistema de Gerenciamento Comerciais</p>
            <p><a href="http://techsoft.net.br/">Home | </a><a href="empresa.html">Empresa | </a><a href="contato.html"> Contato</a>
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