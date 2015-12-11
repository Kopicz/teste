<?php
//DADOS PARA CONEXÃO
$server = "ftp.techsoft.net.br";
$usuario = "techsite@techsoft.net.br";
$senha = "webdevTechsoft";
 
//CONECTA AO FTP
$conn = ftp_connect($server)
       or die ("ERRO AO CONECTAR AO SERVIDOR DE FTP ".$server);
        echo " Você esta Conectado :  $usuario  !!!!";
         
//TENTA EFETUAR O LOGIN COM USUÁRIO E SENHA DE ACESSO
if(@!ftp_login (
              $conn
            , $usuario
            , $senha
               ) ) {
      echo "Não foi possível efetuar a conexão. Verifique o usuário e a senha de acesso.";
}//FECHA ELSE
 
 
//VERIFICA SE O FORM FOI ENVIADO PARA CONECTAR E FAZER O DOWNLOAD DO ARQUIVO
if($_POST) {
 
  //RECEBE OS DADOS DO FORM
  $aArquivo = $_POST[arquivo];
  $pEndereco = $_POST[endereco];
 
  //FAZ O DOWNLOAD DO(S) ARQUIVO(S)
  for($i=0; $i<sizeof($aArquivo); $i++)
  {
 
    //CAMINHO ONDE O ARQUIVO SERÁ SALVO
    $local = $pEndereco.$aArquivo[$i];
 
    //FTP_PWD - DIRETÓRIO ATUAL DO SERVIDOR FTP
    $server = ftp_pwd($conn).$aArquivo[$i];
 
    //FTP_GET() - DOWNLOAD DO ARQUIVO
    $status = ftp_get (
                     $conn
                   , $local
                   , $server
                   , FTP_ASCII
                     );
 
    //VERIFICA
    if($status) {
      //MENSAGEM
      echo "PARABÉNS! O arquivo $aArquivo[$i] foi baixado com Sucesso!<br>";
    } else {
      //MENSAGEM
      echo "ERRO! O arquivo $aArquivo[$i] NÃO FOI BAIXADO.<br>";
    }//FECHA ELSE
  }//FECHA FOR
 
  //FECHA A CONEXÃO COM O FTP
  ftp_close($conn);
 
  //TERMINA A EXECUÇÃO
  die;
}//FECHA IF ( POST ) ?>
 
<html>
<head>
<title> pagina para baixar os arquivos</title>
</head>
 
<body bgcolor="#FFFFFF">
<h1>Download de arquivo - FTP</h1>
<form name="frmFtp" method="post">
<table border="0" cellpading="0" cellspacing="0" width="50%">
<tr>
<td height="20" colspan="2" width="50%">Arquivos disponíveis na pasta :</td>
</tr>
 
<tr>
<td height="30" colspan="2" width="50%"><b>Marque com o X os arquivos desejados</b></td>
</tr>
 
<?
//EXIBE OS ARQUIVOS DA RAIZ USANDO A FUNÇÃO FTP_NLIST()
$arr_arq = ftp_nlist($conn, "");      //  bom a minha duvida ta aqui eu acho ne , eu não consigo listar os arquivos
for($i=0; $i<sizeof($arr_arq); $i++) { 

?>

<tr>
<td height="30" width="5%" bgcolor="#EBEBEB">
<input type="checkbox" name="arquivo[]" value="<? echo $arr_arq[$i]; ?>"></td>
<td height="30" width="45%" bgcolor="#EBEBEB"> <? echo $arr_arq[$i]; ?></td>
</tr>
<?
}//FECHA FOR ?>
</table>
 
<br>
<table border="0" cellpading="0" cellspacing="0" width="60%">
<tr>
<td height="30" width="25%">Pasta onde o arquivo será salvo:</td>
<td height="30"width="35%">
<input name="endereco" type="text" size="35" value="C:\temp\"></td>
</tr>
 
<tr>
<td height="30" width="60%" colspan="2">
<input type="submit" name="btnEnviar" value="Enviar"></td>
</tr>
</table>
</form>
</body>
</html>