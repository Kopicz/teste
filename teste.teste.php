<?php
###########################################################################
## Classe (index.php) Gerenciar Diretorio        	   		            ###
## Autor: Gihovani Demétrio <gihovani@globo.com>                        ###
## Data:  11/01/2007                                                    ###
## Atualizado: 02/09/2009                                               ###
## Descricao: este arquivo serve para gerenciar um diretório via web.   ###
## Com as principais funções de um programa de ftp.                     ###
###########################################################################


#########################################################
## Principais Dúvidas Que você pode encontrar         ###
##                                                    ###
## 1º Verificar as premissoes do seu servidor         ###
## Se o php pode efetuar os comandos:                 ###
## chmod, rmdir, mkdir, unlink, move_uploaded_file    ###
##                                                    ###
## 2º Para intender o funcionamento altere a          ###
## variável diretorio_padrao para a pasta             ###
## que você deseja gerenciar.                         ###
##                                                    ###
## 3º A permissão da pasta (diretorio padrao)         ###
## tem que ser 777 (todas as permissões).             ###
##                                                    ###
## 4º Login: admin | Senha: admin                     ###
##                                                    ###
## Novas dúvidas, críticas ou sugestões desde que     ###
## construtivas são sempre bem vinda.                 ###
##                                                    ###
##                                                    ###
## Qualquer alteração nessa classe não esqueça de     ###
## me referenciar. E VIVA O PHP                       ###
#########################################################


########################################################
## Para a construção deste arquivo foi feita uma     ###
## busca para um melhor intendimento das funções na  ###
## página do PHP <www.php.net>                       ###
########################################################

session_start ();
switch ($_SESSION ['idioma']) {
	case 'en': 
		DEFINE ( 'MSG_TITLE', 'FTP-ONLINE' );
		DEFINE ( 'MSG_LOGIN', 'LOGIN' );
		DEFINE ( 'MSG_LOGIN_ERROR', 'FAILED LOGIN/PASS' );
		DEFINE ( 'MSG_REMOVE_DIR_QUESTION', 'Do you want to remove this dir?' );
		DEFINE ( 'MSG_REMOVE_DIR_SUCESS', 'Dir removed!' );
		DEFINE ( 'MSG_REMOVE_DIR_ERROR', 'Dir not removed!' );
		DEFINE ( 'MSG_CREATE_DIR_SUCESS', 'Dir created!' );
		DEFINE ( 'MSG_CREATE_DIR_ERROR', 'Dir not created!' );
		DEFINE ( 'MSG_REMOVE_FILE_QUESTION', 'Do you want to remove this file?' );
		DEFINE ( 'MSG_REMOVE_FILE_SUCESS', 'File removed!' );
		DEFINE ( 'MSG_REMOVE_FILE_ERROR', 'File not removed!' );
		DEFINE ( 'MSG_CREATE_FILE_SUCESS', 'File created!' );
		DEFINE ( 'MSG_CREATE_FILE_ERROR', 'Error creating file!' );
		DEFINE ( 'MSG_SAVE_FILE_SUCESS', 'File saved successful!' );
		DEFINE ( 'MSG_SAVE_FILE_ERROR', 'Error saving file\\nOr file is empty!' );
		DEFINE ( 'MSG_SEND_FILE_SUCESS', 'File transfered successful!' );
		DEFINE ( 'MSG_SEND_FILE_ERROR', 'Error sending file!' );
		DEFINE ( 'MSG_OPEN_FILE_ERROR', 'Error opening file!' );
		DEFINE ( 'MSG_FOUND_DIR', 'Dir Found' );
		DEFINE ( 'MSG_FOUND_FILE', 'File Found' );
		DEFINE ( 'MSG_NAVIGATION', 'Navigation:' );
		DEFINE ( 'MSG_HOME', 'Home' );
		DEFINE ( 'MSG_LOGOUT', 'Logout[X]' );
		DEFINE ( 'MSG_OTHER_FUNCTIONS', 'OTHER FUNCTIONS' );
		DEFINE ( 'MSG_CREATE_DIR', 'Create Dir' );
		DEFINE ( 'MSG_CREATE_FILE', 'Create File' );
		DEFINE ( 'MSG_SEND_FILE', 'Send File' );
		DEFINE ( 'MSG_LABEL_NEW_DIR', 'New Dir Name:' );
		DEFINE ( 'MSG_LABEL_NEW_FILE', 'New File Name:' );
		DEFINE ( 'MSG_LABEL_SEARCH_FILE', 'File search:' );
		DEFINE ( 'MSG_LABEL_LANGUAGE', 'Language:' );
		DEFINE ( 'MSG_LABEL_LOGIN', 'User:' );
		DEFINE ( 'MSG_LABEL_PASS', 'Pass:' );
		DEFINE ( 'MSG_SOURCE_CODE', 'SOURCE CODE' );
		DEFINE ( 'BUTTON_LOGIN', 'entrar' );
		DEFINE ( 'BUTTON_REMOVE', '[remove]' );
		DEFINE ( 'BUTTON_SOURCE_CODE', '[source_code]' );
		DEFINE ( 'BUTTON_EDIT', '[edit]' );
		DEFINE ( 'BUTTON_CREATE', 'CREATE' );
		DEFINE ( 'BUTTON_SEND', 'SEND' );
		DEFINE ( 'BUTTON_SAVE', 'SAVE' );
		DEFINE ( 'BUTTON_DOWNLOAD_FILE', 'Download file' );
		DEFINE ( 'BUTTON_OPEN_DIR', 'Open dir' );
		break;
	default :
		DEFINE ( 'MSG_TITLE', 'MINI SISTEMA DE FTP-ONLINE' );
		DEFINE ( 'MSG_LOGIN', 'Efetuar Login' );
		DEFINE ( 'MSG_LOGIN_ERROR', 'LOGIN/SENHA INVÁLIDO' );
		DEFINE ( 'MSG_REMOVE_DIR_QUESTION', 'Deseja Remover este diretório?' );
		DEFINE ( 'MSG_REMOVE_DIR_SUCESS', 'Diretório removido com sucesso!' );
		DEFINE ( 'MSG_REMOVE_DIR_ERROR', 'Ocorreu algum problema ao remover o diretório!' );
		DEFINE ( 'MSG_CREATE_DIR_SUCESS', 'Diretório criado com sucesso!' );
		DEFINE ( 'MSG_CREATE_DIR_ERROR', 'Ocorreu algum problema ao criar o diretório!' );
		DEFINE ( 'MSG_REMOVE_FILE_QUESTION', 'Deseja Remover este arquivo?' );
		DEFINE ( 'MSG_REMOVE_FILE_SUCESS', 'Arquivo removido com sucesso!' );
		DEFINE ( 'MSG_REMOVE_FILE_ERROR', 'Ocorreu algum problema ao remover o arquivo!' );
		DEFINE ( 'MSG_CREATE_FILE_SUCESS', 'Arquivo criado com sucesso!' );
		DEFINE ( 'MSG_CREATE_FILE_ERROR', 'Ocorreu algum problema ao criar o arquivo!' );
		DEFINE ( 'MSG_SAVE_FILE_SUCESS', 'Arquivo salvo com sucesso!' );
		DEFINE ( 'MSG_SAVE_FILE_ERROR', 'Ocorreu algum problema para salvar o arquivo\\nOu arquivo em branco!' );
		DEFINE ( 'MSG_SEND_FILE_SUCESS', 'Arquivo enviado com sucesso!' );
		DEFINE ( 'MSG_SEND_FILE_ERROR', 'Ocorreu algum problema para enviar o arquivo!' );
		DEFINE ( 'MSG_OPEN_FILE_ERROR', 'Ocorreu algum problema para abrir o arquivo!' );
		DEFINE ( 'MSG_FOUND_DIR', 'Pasta(s) encontrada(s)' );
		DEFINE ( 'MSG_FOUND_FILE', 'Arquivos(s) encontrado(s)' );
		DEFINE ( 'MSG_NAVIGATION', 'Você está em:' );
		DEFINE ( 'MSG_HOME', 'Página Inicial' );
		DEFINE ( 'MSG_LOGOUT', 'Desconectar[X]' );
		DEFINE ( 'MSG_OTHER_FUNCTIONS', 'OUTRAS FUNÇÕES' );
		DEFINE ( 'MSG_CREATE_DIR', 'Criar Diretório' );
		DEFINE ( 'MSG_CREATE_FILE', 'Criar Arquivo' );
		DEFINE ( 'MSG_SEND_FILE', 'Enviar Arquivo' );
		DEFINE ( 'MSG_LABEL_LOGIN', 'Login:' );
		DEFINE ( 'MSG_LABEL_PASS', 'Senha:' );
		DEFINE ( 'MSG_LABEL_LANGUAGE', 'Idioma:' );
		DEFINE ( 'MSG_LABEL_NEW_DIR', 'Nome do Novo Diretório:' );
		DEFINE ( 'MSG_LABEL_NEW_FILE', 'Nome do Novo Arquivo:' );
		DEFINE ( 'MSG_LABEL_SEARCH_FILE', 'Procurar o Arquivo:' );
		DEFINE ( 'MSG_SOURCE_CODE', 'CODIGO FONTE' );
		DEFINE ( 'BUTTON_LOGIN', 'entrar' );
		DEFINE ( 'BUTTON_REMOVE', '[remover]' );
		DEFINE ( 'BUTTON_SOURCE_CODE', '[codigo_fonte]' );
		DEFINE ( 'BUTTON_EDIT', '[editar]' );
		DEFINE ( 'BUTTON_CREATE', 'CRIAR' );
		DEFINE ( 'BUTTON_SEND', 'ENVIAR' );
		DEFINE ( 'BUTTON_SAVE', 'SALVAR' );
		DEFINE ( 'BUTTON_DOWNLOAD_FILE', 'Download do arquivo' );
		DEFINE ( 'BUTTON_OPEN_DIR', 'Abrir diretorio' );
		break;
}

class GerenciaDiretorio {
	public $conteudo;
	private $diretorio;
	private $pastas;
	private $arquivos;
	private $mostrar_botoes;
	private $diretorio_padrao;
	
	public function __construct() {
		$this->diretorio_padrao = $_SERVER ["DOCUMENT_ROOT"] . "/"; //se preferir insira o caminho aqui.
		$this->diretorio = ! empty ( $_GET ["diretorio"] ) ? $_GET ["diretorio"] : $this->diretorio_padrao;
		$this->mostrar_botoes = true;
		$this->lerDiretorio ();
		if (! empty ( $_SESSION ['logado'] )) {
			if (! empty ( $_GET ['a'] ) && method_exists ( $this, $_GET ['a'] ))
				$this->$_GET ['a'] ();
			else
				$this->principal ();
		} else {
			$this->login ();
		}
	}
	
	private function lerDiretorio() {
		if (is_dir ( $this->diretorio )) {
			$arvore = opendir ( $this->diretorio );
			if ($arvore) {
				$arquivo = readdir ( $arvore );
				while ( $arquivo ) {
					$arquivo_base = basename ( $arquivo );
					if ($arquivo_base != "." && $arquivo_base != "..") {
						if (is_dir ( $this->diretorio . $arquivo )) {
							$this->pastas [] = $this->montaPastas ( $arquivo );
						} else {
							$this->arquivos [] = $this->montaArquivos ( $arquivo );
						}
					}
					$arquivo = readdir ( $arvore );
				}
			}
		} else {
			$this->mostrar_botoes = false;
		}
	}
	
	private function montaPastas($pasta) {
		if ((sizeof ( $this->pastas ) % 2) == 0) {
			$fundo = "cor1";
		} else {
			$fundo = "cor2";
		}
		$pasta_link = str_replace ( " ", "%20", $this->diretorio . $pasta . "/" );
		return "
			<tr class=\"$fundo\">
				<td width=\"60%\"><a href=?diretorio=" . $pasta_link . " title=\"" . BUTTON_OPEN_DIR . " (" . $pasta_link . ")\"><b>/" . $pasta . "/</b></a></td> 
				<td width=\"40%\"><a href=\"#\" onClick=\"javascript:removerDiretorio('$pasta_link');\" title=\"" . BUTTON_REMOVE . "\">" . BUTTON_REMOVE . "</a></td>
			</tr>";
	}
	
	private function montaArquivos($arquivo) {
		if ((sizeof ( $this->arquivos ) % 2) == 0) {
			$fundo = "cor1";
		} else {
			$fundo = "cor2";
		}
		$arquivo_link = str_replace ( " ", "%20", $arquivo );
		return "
			<tr class=\"$fundo\">
				<td width=\"60%\"><a href=\"?a=download&diretorio=" . $this->diretorio . "&arquivo=$arquivo_link\" title=\"" . BUTTON_DOWNLOAD_FILE . " (" . $arquivo_link . ") \">" . $arquivo . "</a></td>
				<td width=\"40%\">
					<a href=\"#\" onClick=\"javascript:removerArquivo('$this->diretorio','$arquivo_link');\" title=\"" . BUTTON_REMOVE . "\">" . BUTTON_REMOVE . "</a> |
					<a href=\"?a=verCodigoFonte&diretorio=" . $this->diretorio . "&arquivo=$arquivo_link\" target=\"_blank\" title=\"" . BUTTON_SOURCE_CODE . "\">" . BUTTON_SOURCE_CODE . "</a> | 
					<a href=\"#\" onClick=\"javascript:abrir('editar','?a=editarCodigoFonte&diretorio=" . $this->diretorio . "&arquivo=$arquivo_link', 770, 500, 0, 0,0);\" title=\"" . BUTTON_EDIT . "\">" . BUTTON_EDIT . "</a> 
				</td> 
			</tr>";
	}
	
	private function montaNavegacao() {
		$dir = explode ( '/', $this->diretorio );
		$navegacao = '';
		$diretorio = '';
		for($i = 0; $i < sizeof ( $dir ) - 1; $i ++) {
			$navegacao .= "<a href=?diretorio=" . str_replace ( " ", "%20", $diretorio . $dir [$i] ) . "/ >" . $dir [$i] . "/</a>\n";
			$diretorio .= $dir [$i] . "/";
		}
		return $navegacao;
	}
	
	private function ultimoDiretorio($dir) {
		if ($dir) {
			$dir = explode ( "/", $dir );
			$numero_pasta = sizeof ( $dir );
			
			for($i = 0; $i < $numero_pasta - 2; $i ++) {
				$diretorio .= $dir [$i] . "/";
			}
			return $diretorio;
		} else {
			return $this->diretorio_padrao;
		}
	}
	// Acoes 
	private function login() {
		$msg = !empty($_GET['erro']) ? "<div style=\"color:red;font-weight:bold;text-align:center\">" . MSG_LOGIN_ERROR . "</div>\n" : "";
		if (! empty ( $_POST )) {
			$_SESSION ['usuario'] = $_POST ["usuario"];
			$_SESSION ['senha'] = $_POST ["senha"];
			$_SESSION ['idioma'] = $_POST ["idioma"];
			if (MD5 ( $_SESSION ["usuario"] ) == "21232f297a57a5a743894a0e4a801fc3" && MD5 ( $_SESSION ["senha"] ) == "21232f297a57a5a743894a0e4a801fc3") {
				$_SESSION ['logado'] = 1;
				header ( "Location: index.php" );
			} else {
				header ( "Location: index.php?erro=1" );
			}
		}
		$this->conteudo = $msg."<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\"> \n <form action=\"index.php\" method=\"post\">\n<caption>".MSG_LOGIN."</caption>\n<tr>\n<td style=\"border:0\">".MSG_LABEL_LOGIN."</td>\n<td style=\"border:0\"><input type=\"text\" name=\"usuario\" style=\"width: 300px;\"></td>\n</tr>\n<tr>\n<td style=\"border:0\">".MSG_LABEL_PASS."</td>\n<td><input type=\"password\" name=\"senha\" style=\"width: 300px;\"></td>\n</tr>\n\n<tr>\n<td style=\"border:0\">".MSG_LABEL_LANGUAGE."</td>\n<td style=\"border:0\"><select name=\"idioma\" style=\"width: 200px;\"><option value=\"pt\">Português</option><option value=\"en\">English</option></select> <input type=\"submit\" name=\"login\" value=\"".BUTTON_LOGIN."\" style=\"width: 95px;\"></td>\n</tr>\n<tr>\n<td>&nbsp;</td><td>&nbsp;</td>\n</tr>\n</table>\n";
	}
	
	private function logout() {
		session_destroy ();
		header ( "Location: index.php" );
	}
	
	private function download() {
		if (! empty ( $_GET ['diretorio'] ) && ! empty ( $_GET ['arquivo'] )) {
			$arquivo = $_GET ["diretorio"] . $_GET ["arquivo"];
			if (is_file ( $arquivo )) {
				header ( "Content-type: application/force-download;" );
				header ( "Content-Disposition: attachment; filename=$_GET[arquivo];" );
				readfile ( $arquivo );
				exit ();
			}
		}
		header ( "Location: index.php" );
	}
	
	private function removerDiretorio($diretorio = '', $recursivo = 0) {
		$diretorio = ! empty ( $diretorio ) ? $diretorio : $this->diretorio;
		$dir = opendir ( $diretorio );
		$arvore = readdir ( $dir );
		while ( $arvore ) {
			if (is_file ( $diretorio . $arvore ) || is_link ( $diretorio . $arvore )) {
				unlink ( $diretorio . $arvore );
			} elseif (is_dir ( $diretorio . $arvore ) && $arvore != '.' && $arvore != '..') {
				$this->removerDiretorio ( $diretorio . $arvore . '/', 1 );
			}
			$arvore = readdir ( $dir );
		}
		closedir ( $dir );
		if (@rmdir ( $diretorio )) {
			$msg = MSG_REMOVE_DIR_SUCESS;
		} else {
			$msg = MSG_REMOVE_DIR_ERROR;
		}
		if ($recursivo == 0) {
			$this->diretorio = $this->ultimoDiretorio ( $diretorio );
			$this->conteudo = "<script>\nalert('$msg');\nwindow.location='index.php?diretorio=$this->diretorio';\n</script>";
		}
	}
	
	private function removerArquivo() {
		$msg = MSG_REMOVE_FILE_ERROR;
		if (! empty ( $_GET ['diretorio'] ) && ! empty ( $_GET ['arquivo'] )) {
			if (@unlink ( $_GET ['diretorio'] . $_GET ['arquivo'] )) {
				$msg = MSG_REMOVE_FILE_SUCESS;
			}
		}
		$this->conteudo = "<script>\nalert('$msg');\nwindow.location='index.php?diretorio=$this->diretorio';\n</script>";
	}
	
	private function criarDiretorio() {
		$msg = MSG_CREATE_DIR_ERROR;
		if (! empty ( $_POST ['novo_diretorio'] )) {
			if (! is_dir ( $this->diretorio . $_POST ["novo_diretorio"] )) {
				if (@mkdir ( $this->diretorio . preg_replace ( '/[^a-z0-9_\-\.]/i', '_', $_POST ["novo_diretorio"] ), 0777 )) {
					$msg = MSG_CREATE_DIR_SUCESS;
				}
			}
		}
		$this->conteudo = "<script>\nalert('$msg');\nwindow.location='index.php?diretorio=$this->diretorio';\n</script>";
	}
	
	private function criarArquivo() {
		$msg = MSG_SAVE_FILE_ERROR;
		if (! empty ( $_POST ['novo_arquivo'] )) {
			if (@file_put_contents ( $this->diretorio . $_POST ["novo_arquivo"], ' ' )) {
				$msg = MSG_SAVE_FILE_SUCESS;
			}
		}
		$this->conteudo = "<script>\nalert('$msg');\nwindow.location='index.php?diretorio=$this->diretorio';\n</script>";
	}
	
	private function verCodigoFonte() {
		if (! empty ( $_GET ['arquivo'] )) {
			show_source ( $_GET ['diretorio'] . $_GET ['arquivo'] );
		}
	}
	
	private function enviarArquivo() {
		$msg = MSG_SEND_FILE_ERROR;
		if (! empty ( $_GET ['diretorio'] ) && ! empty ( $_FILES ["arquivo"] )) {
			if (! is_writable ( $_GET ['diretorio'] ))
				chmod ( $_GET ['diretorio'], 0777 );
			if (@move_uploaded_file ( $_FILES ["arquivo"] ["tmp_name"], $_GET ['diretorio'] . preg_replace ( '/[^a-z0-9_\-\.]/i', '_', $_FILES ["arquivo"] ["name"] ) )) {
				$msg = MSG_SEND_FILE_SUCESS;
			}
		}
		$this->conteudo = "<script>\nalert('$msg');\nwindow.location='index.php?diretorio=$this->diretorio';\n</script>";
	}
	
	private function editarCodigoFonte() {
		$this->conteudo = "<script>\nalert('" . MSG_OPEN_FILE_ERROR . "');\nwindow.close();\n</script>";
		if (! empty ( $_GET ['arquivo'] )) {
			$arquivo = $this->diretorio . $_GET ['arquivo'];
			if (is_file ( $arquivo )) {
				if (empty ( $_POST )) {
					$conteudo = file_get_contents ( $arquivo );
					$conteudo = htmlentities ( $conteudo );
					$this->conteudo = "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\"> \n";
					$this->conteudo .= "<form action=\"?a=editarCodigoFonte&diretorio=" . $this->diretorio . "&arquivo=" . $_GET ['arquivo'] . "\" method=\"post\">\n<caption>" . MSG_SOURCE_CODE . "</caption>\n<tr>\n<td width=\"100%\"><textarea name=\"conteudo\" rows=\"35\" style=\"width: 100%;\">$conteudo</textarea></td>\n</tr>\n<tr>\n<td><input type=\"submit\" name=\"salvar\" value=\"" . BUTTON_SAVE . "\"></td>\n</tr>\n</form>\n</table>\n";
				} else {
					if (is_writable ( $arquivo )) {
						$_POST ["conteudo"] = html_entity_decode ( $_POST ["conteudo"] );
						if (@file_put_contents ( $arquivo, $_POST ["conteudo"] ))
							$this->conteudo = "<script>alert('" . MSG_SAVE_FILE_SUCESS . "'); \n window.close();</script>";
						else
							$this->conteudo = "<script>\nalert('" . MSG_SAVE_FILE_ERROR . "'); \n window.close();\n</script>";
					}
				}
			}
		}
	}
	
	private function principal() {
		$this->conteudo .= "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\"> <tr><td class=\"txtNavegacao\"><strong>" . MSG_NAVIGATION . ":</strong> " . $this->montaNavegacao () . "</td><td class=\"txtNavegacao\" width=\"10%\"><a href=?diretorio=" . str_replace ( " ", "%20", $this->diretorio_padrao ) . " >" . MSG_HOME . "</a></td><td class=\"txtNavegacao\" width=\"10%\"><a href=\"?a=logout\" style=\"color:red\">" . MSG_LOGOUT . "</a></td></tr></table> \n";
		$this->conteudo .= "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\"> <caption><hr width=\"95%\" size=\"1px\"></caption></table> \n";
		$this->conteudo .= "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\"> <caption class=\"txtTitulo\">" . sizeof ( $this->pastas ) . " " . MSG_FOUND_DIR . "</caption>" . @implode ( "\n", $this->pastas ) . "</table> \n";
		$this->conteudo .= "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\"> <caption><hr width=\"95%\" size=\"1px\"></caption></table> \n";
		$this->conteudo .= "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\"> <caption class=\"txtTitulo\">" . sizeof ( $this->arquivos ) . " " . MSG_FOUND_FILE . "</caption>" . @implode ( "\n", $this->arquivos ) . "</table> \n";
		$this->conteudo .= "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\"> <caption><hr width=\"95%\" size=\"1px\"></caption></table> \n";
		$this->conteudo .= "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\"> <caption class=\"txtTitulo\">" . MSG_OTHER_FUNCTIONS . "</caption></table> \n";
		$this->conteudo .= "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\"> <form action=\"?a=criarDiretorio&diretorio=" . $this->diretorio . "\" method=\"post\"><caption class=\"txtTituloPqno\">" . MSG_CREATE_DIR . "</caption><tr><td width=\"180px\">" . MSG_LABEL_NEW_DIR . " </td><td width=\"210px\"><input type=\"text\" name=\"novo_diretorio\" style=\"width: 200px;\"></td><td><input type=\"submit\" name=\"criar\" value=\"" . BUTTON_CREATE . "\"></td></tr></form></table> \n";
		$this->conteudo .= "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\"> <form action=\"?a=criarArquivo&diretorio=" . $this->diretorio . "\" method=\"post\"><caption class=\"txtTituloPqno\">" . MSG_CREATE_FILE . "</caption><tr><td width=\"180px\">" . MSG_LABEL_NEW_FILE . " </td><td width=\"210px\"><input type=\"text\" name=\"novo_arquivo\" style=\"width: 200px;\"></td><td><input type=\"submit\" name=\"criar\" value=\"" . BUTTON_CREATE . "\"></td></tr></form></table> \n";
		$this->conteudo .= "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\"> <form enctype=\"multipart/form-data\" action=\"?a=enviarArquivo&diretorio=" . $this->diretorio . "\" method=\"post\"><caption class=\"txtTituloPqno\">" . MSG_SEND_FILE . "</caption><tr><td width=\"180px\">" . MSG_LABEL_SEARCH_FILE . " </td><td width=\"210px\"><input type=file name=arquivo style='width: 200px;'></td><td><input type=\"submit\" name=\"enviar\" value=\"" . BUTTON_SEND . "\"></td></tr></form></table> \n";
		$this->conteudo .= "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\"> <caption><hr width=\"95%\" size=\"1px\"></caption></table> \n";
		$this->conteudo .= "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\"> <caption class=\"txtRodape\">Mini Sistema de FTP On-line [v. 3.1] <br> Dúvida, criticas ou sugestões: <a href=\"mailto:gihovani@globo.com\">clique aqui.</a></caption></table> \n";
	}

}

$gdir = new GerenciaDiretorio ( );
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title><?php echo MSG_TITLE; ?></title>
<style type="text/css">
<!--
caption {
	font-family: verdana;
	font-size: 9pt;
	color: #000000;
	font-weight: bold;
	padding: 4px;
}

a {
	font-family: verdana;
	font-size: 9pt;
	color: #000000;
	cursor: pointer;
	text-decoration: none;
}

a:HOVER {
	font-family: verdana;
	font-size: 9pt;
	color: #000000;
	cursor: pointer;
	text-decoration: underline;
}

body,th {
	font-family: verdana;
	font-size: 9pt;
	color: #000000;
}
td {
	font-family: verdana;
	font-size: 9pt;
	height:20px;
	border-left: 0;
	border-right: 0;
	border-top: 0;
	border-bottom: 1px solid #000;
	text-align:left;
}
body {
	background-color: #FFFFFF;
	margin-left: 5px;
	margin-top: 5px;
	margin-right: 0px;
	margin-bottom: 0px;
}

input,textarea {
	font-family: verdana;
	font-size: 9px;
	color: #000000;
	background-color: #F5F5F5;
}

button {
	font-family: verdana;
	font-size: 9px;
	color: #000000;
	background-color: #FFFFFF;
}

.cor1 {
	background-color: #FFF;
	color: #666;
}

.cor2 {
	background-color: #F5F5F5;
	color: #000;
}

.txtNavegacao {
	line-height: 40px;
	font-size: 13px;
	font-weight: bold;
	background-color: #A3B2CC;
	color: #FFFFFF;
	border: 1px solid #A3B2CC;
	padding: 2px;
}

.txtTitulo {
	line-height: 25px;
	font-size: 13px;
	text-align: center;
	font-weight: bold;
	background-color: #2473AE;
	color: #FFFFFF;
	border-left: 1px solid #2473AE;
	border-right: 1px solid #2473AE;
	border-top: 1px solid #000;
	border-bottom: 2px solid #666;
	padding: 2px;
}

.txtTituloPqno {
	line-height: 20px;
	font-size: 13px;
	text-align: center;
	font-weight: bold;
	background-color: #E1E1E1;
	color: #000000;
	border-left: 1px solid #E1E1E1;
	border-right: 1px solid #E1E1E1;
	border-top: 1px solid #E1E1E1;
	border-bottom: 1px solid #000;
	padding: 2px;
}

.txtRodape {
	line-height: 20px;
	font-size: 11px;
	text-align: center;
	background-color: #A3B2CC;
	color: #FFFFFF;
	border: 1px solid #A3B2CC;
	padding: 2px;
}

.txtLogout {
	color: #F00;
}
-->
</style>
<script>
    function ehNetscape() {
    	return (navigator.appName.indexOf("Netscape") != -1);
    }

    function abrir(nome, url, largura, altura, scrollbars, posX, posY) {
    	if (!posX) posX = Math.ceil((screen.width - largura) / 2);
    	if (!posY) posY = Math.ceil((screen.height - altura) / 2);
    	if (ehNetscape()) {
    		parametros = "width=" + largura + ",height=" + altura + ",screenX=" + posX + ",screenY=" + posY;
    	} else {
    		parametros = "width=" + largura + ",height=" + altura + ",left=" + posX + ",top=" + posY;
    	}
    	if (scrollbars) parametros += ",scrollbars=yes";
    	janela = window.open(url, nome, parametros);
    	janela.focus();
    }

    function removerDiretorio(diretorio) {
    	if (window.confirm('<?php echo MSG_REMOVE_DIR_QUESTION; ?> ('+diretorio+')')) {
    		window.location="index.php?a=removerDiretorio&diretorio=" +diretorio;
    	}
    }

    function removerArquivo(diretorio,arquivo) {
    	if (window.confirm('<?php echo MSG_REMOVE_FILE_QUESTION; ?> ('+arquivo+')')) {
    		window.location="index.php?a=removerArquivo&diretorio=" +diretorio+"&arquivo=" +arquivo;
    	}
    }
    </script>
</head>
<body>
<table border="1" bordercolor="#000000" cellpadding="2" cellspacing="0" width="100%" align="center">
	<tr>
		<td align="center" sytle="border:0"><?=$gdir->conteudo;?></td>
	</tr>
</table>
</body>
</html>