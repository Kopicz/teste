
<?php
$versao = fopen("E:\\site v2\\versao.txt", "r");
	while (!feof ($versao)) {
	 $linha = fgets($versao,4096);

	echo $linha;}

fclose ($versao);

?>





