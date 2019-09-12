<?php
	$pos = $_POST['pos'];
	$name = $_POST['name'];
	require('Dados_BD.php');
						
	$nome_tabela="finalsteams";
	$conexao= mysql_connect($servidor,$user,$senha);
	$colecta_banco = mysql_select_db($banco_dados,$conexao);
	if($conexao && $colecta_banco)
	
	
	$nome_tabela="finalsteams";
	$sql_select="SELECT * FROM `".$nome_tabela."` WHERE `finalsteams`.`nomeTeam` = '".$name."';"; 
	
	if ($resultado= mysql_query($sql_select))
	{
		$n_dados=mysql_num_rows($resultado);
		while($registos=mysql_fetch_array($resultado))
		{
			$oldPos = $registos['positions'];
		}
	}
	
	else
	die('Error: ' . mysql_error());
	
	$oldPos.= ":".$pos;
	
	////////////////////////////////////////////
	
	$sql_select="UPDATE `".$banco_dados."`.`finalsteams` SET `positions` = '".$oldPos."' WHERE `finalsteams`.`nomeTeam` = '".$name."';"; 
	
	if ($resultado= mysql_query($sql_select))
	{
		//echo "sucess";
	}
	
	else
	die('Error: ' . mysql_error());
	
	////////////////////////////////////////////
	
	$sql_select="UPDATE `".$banco_dados."`.`resultados_final` SET `valor` = '0' WHERE `resultados_final`.`pos` = '".$pos."L';"; 
	
	if ($resultado= mysql_query($sql_select))
	{
		echo "sucess";
	}
	
	else
	die('Error: ' . mysql_error());
?>