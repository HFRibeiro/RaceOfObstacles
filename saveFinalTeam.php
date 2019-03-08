<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<?php
	$nomeTeam = utf8_encode($_POST['nomeTeam']);
	$idTeam = $_POST['idTeam'];
	$number = $_POST['number'];
	require('Dados_BD.php');

	try{
	$pdo = new pdo( 'mysql:host='.$servidor.';dbname='.$banco_dados.'',$user,$senha,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));



	$nome_tabela="finalsteams";
	$sql_select="INSERT INTO `".$banco_dados."`.`".$nome_tabela."` (`id`, `idTeam`, `nomeTeam`,`positions`) VALUES ('".$number."', '".$idTeam."', '".$nomeTeam."', '".$number."');";
	try
	{
		$stmt = $pdo->prepare($sql_select);
		$data = $stmt->execute();
	}
	catch (PDOException $e) {
		echo "Error: " . $e->getMessage() . "<br />\n";
	}

}
catch(PDOException $ex){
	die(json_encode(array('outcome' => false, 'message' => 'Unable to connect')));
}
?>
