<?php
	$check = $_POST['check'];
	
	require('Dados_BD.php');
	$nome_tabela="finalsteams";
	$conexao= mysql_connect($servidor,$user,$senha);
	$colecta_banco = mysql_select_db($banco_dados,$conexao);
	if($conexao && $colecta_banco)
	
	$sql_select="DELETE FROM `".$nome_tabela."` WHERE 1;"; 
	$sql_select2="ALTER TABLE `".$nome_tabela."` AUTO_INCREMENT = 1;"; 
	
	if ($resultado= mysql_query($sql_select) && $resultado2 = mysql_query($sql_select2));
	
	else die('Error: ' . mysql_error());
	
	$nome_tabela="resultados_final";
	for($i=1;$i<9;$i++)
	{
		$sql_select="UPDATE `".$banco_dados."`.`".$nome_tabela."` SET `valor` = '0' WHERE `resultados_final`.`pos` = 'O".$i."T1L';"; 
		if ($resultado= mysql_query($sql_select));
		else die('Error: ' . mysql_error());
		$sql_select="UPDATE `".$banco_dados."`.`".$nome_tabela."` SET `valor` = '0' WHERE `resultados_final`.`pos` = 'O".$i."T2L';"; 
		if ($resultado= mysql_query($sql_select));
		else die('Error: ' . mysql_error());
	}
	
	for($i=1;$i<5;$i++)
	{
		$sql_select="UPDATE `".$banco_dados."`.`".$nome_tabela."` SET `valor` = '' WHERE `resultados_final`.`pos` = 'Q".$i."T1L';"; 
		if ($resultado= mysql_query($sql_select));
		else die('Error: ' . mysql_error());
		$sql_select="UPDATE `".$banco_dados."`.`".$nome_tabela."` SET `valor` = '' WHERE `resultados_final`.`pos` = 'Q".$i."T2L';"; 
		if ($resultado= mysql_query($sql_select));
		else die('Error: ' . mysql_error());
	}
	
	for($i=1;$i<3;$i++)
	{
		$sql_select="UPDATE `".$banco_dados."`.`".$nome_tabela."` SET `valor` = '' WHERE `resultados_final`.`pos` = 'M".$i."T1L';"; 
		if ($resultado= mysql_query($sql_select));
		else die('Error: ' . mysql_error());
		$sql_select="UPDATE `".$banco_dados."`.`".$nome_tabela."` SET `valor` = '' WHERE `resultados_final`.`pos` = 'M".$i."T2L';"; 
		if ($resultado= mysql_query($sql_select));
		else die('Error: ' . mysql_error());
	}
	
	$sql_select="UPDATE `".$banco_dados."`.`".$nome_tabela."` SET `valor` = '' WHERE `resultados_final`.`pos` = 'T1T1L';"; 
		if ($resultado= mysql_query($sql_select));
		else die('Error: ' . mysql_error());
		$sql_select="UPDATE `".$banco_dados."`.`".$nome_tabela."` SET `valor` = '' WHERE `resultados_final`.`pos` = 'T1T2L';"; 
		if ($resultado= mysql_query($sql_select));
		else die('Error: ' . mysql_error());
		
		$sql_select="UPDATE `".$banco_dados."`.`".$nome_tabela."` SET `valor` = '' WHERE `resultados_final`.`pos` = 'F1T1L';"; 
		if ($resultado= mysql_query($sql_select));
		else die('Error: ' . mysql_error());
		$sql_select="UPDATE `".$banco_dados."`.`".$nome_tabela."` SET `valor` = '' WHERE `resultados_final`.`pos` = 'F1T2L';"; 
		if ($resultado= mysql_query($sql_select));
		else die('Error: ' . mysql_error());
?>