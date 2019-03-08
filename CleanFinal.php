<?php
	$check = $_POST['check'];
	require('Dados_BD.php');
	
						
	$nome_tabela="finalsteams";
	$conexao= mysql_connect($servidor,$user,$senha);
	$colecta_banco = mysql_select_db($banco_dados,$conexao);
	if($conexao && $colecta_banco)
	
	$sql_select="DELETE FROM `".$nome_tabela."` WHERE 1;"; 
	$sql_select2="ALTER TABLE `".$nome_tabela."` AUTO_INCREMENT=1;"; 
	
	if ($resultado= mysql_query($sql_select) && $resultado2 = mysql_query($sql_select2));
	
	else die('Error: ' . mysql_error());
?>