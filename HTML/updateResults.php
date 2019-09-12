<?php
	$pos = $_POST['pos'];
	$valor = $_POST['valor'];
	require('Dados_BD.php');

	try{
	$pdo = new pdo( 'mysql:host='.$servidor.';dbname='.$banco_dados.'',$user,$senha,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

	$query = "UPDATE `".$banco_dados."`.`resultados_final` SET `valor` = '".$valor."' WHERE `resultados_final`.`pos` = '".$pos."';";
	try
	{
		$stmt = $pdo->prepare($query);
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
