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
       #map-container{
             height: 600px
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
        <div class="panel-heading">Fale Conosco</div>
        <div class="panel-body">
                <div class="panelPrincipal">               
                  <div>
                    
                
                  <form class="form-horizontal" role="form" method="post" action="send.php">
    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">Nome</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Ex: João" value="">
        </div>
    </div>
    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">Assunto</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="assunto" name="assunto" value="">
        </div>
    </div>
    <div class="form-group">
        <label for="email" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" id="email" name="email" placeholder="example@techsoft.net" value="">
        </div>
    </div>
    <div class="form-group">
        <label for="message" class="col-sm-2 control-label">Messagem</label>
        <div class="col-sm-10">
            <textarea class="form-control" rows="4" name="msg"></textarea>
        </div>
    </div>
    
    <div class="form-group">
        <div class="col-sm-10 col-sm-offset-2">
            <input id="submit" name="submit" type="submit" value="Enviar" class="btn btn-primary">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-10 col-sm-offset-2">
        </div>
    </div>
</form></div>
                                  
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
            <p><a href="ihttp://techsoft.net.br/">Home | </a><a href="empresa.html">Empresa | </a><a href="contato.html"> Contato</a>
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