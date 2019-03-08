<?php
	$id = $_POST['id'];
	$tempo = $_POST['tempo'];
	$voltas = $_POST['voltas'];
	require('Dados_BD.php');


	try{
	$pdo = new pdo( 'mysql:host='.$servidor.';dbname='.$banco_dados.'',$user,$senha,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

	$query = "UPDATE `".$banco_dados."`.`teams` SET `tempo` = '".$tempo."',`voltas` = '".$voltas."' WHERE `teams`.`id` = ".$id.";";
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
