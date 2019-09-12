<?php
	$TotalTeams = $_POST['TotalTeams'];
	for($i=0;$i<$TotalTeams;$i++)
	{
		$EQUIPA[$i] = $_POST['equipa'.$i];
	}
	$TotalRaces = $_POST['TotalRaces'];
	$penaltyRace = $_POST['penaltyRace'];


	require('Dados_BD.php');

	try{
	$pdo = new pdo( 'mysql:host='.$servidor.';dbname='.$banco_dados.'',$user,$senha,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));


	$nome_tabela="teams";

	$query = "DELETE FROM `".$nome_tabela."` WHERE 1;";
	try
	{
		$stmt = $pdo->prepare($query);
		$data = $stmt->execute();
	}
	catch (PDOException $e) {
		echo "Error: " . $e->getMessage() . "<br />\n";
	}

	$query = "ALTER TABLE `".$nome_tabela."` AUTO_INCREMENT=1;";
	try
	{
		$stmt = $pdo->prepare($query);
		$data = $stmt->execute();
	}
	catch (PDOException $e) {
		echo "Error: " . $e->getMessage() . "<br />\n";
	}

	for($i=0;$i<$TotalTeams;$i++)
	{
		$teams = explode(';', $EQUIPA[$i]);
		$sql_select2="INSERT INTO `".$banco_dados."`.`".$nome_tabela."` (`id`, `nome`, `tempo`, `voltas`) VALUES ('".$teams[0]."', '".$teams[1]."', '".$teams[2]."', '".$teams[3]."');";
		try
		{
			$stmt = $pdo->prepare($sql_select2);
			$data = $stmt->execute();
		}
		catch (PDOException $e) {
			echo "Error: " . $e->getMessage() . "<br />\n";
		}
		//echo $sql_select2."<br>";
	}


	//////////////////////CONFIGS//////////////////////////////////////////////////////////////
	//////////////////////CONFIGS//////////////////////////////////////////////////////////////
	$nome_tabela="configs";
	$sql_select="DELETE FROM `".$nome_tabela."` WHERE 1;";
	$sql_select2="ALTER TABLE `".$nome_tabela."` AUTO_INCREMENT=1;";

	try
	{
		$stmt = $pdo->prepare($sql_select);
		$data = $stmt->execute();
	}
	catch (PDOException $e) {
		echo "Error: " . $e->getMessage() . "<br />\n";
	}

	try
	{
		$stmt = $pdo->prepare($sql_select2);
		$data = $stmt->execute();
	}
	catch (PDOException $e) {
		echo "Error: " . $e->getMessage() . "<br />\n";
	}


	$sql_select="INSERT INTO `".$banco_dados."`.`".$nome_tabela."` (`id`, `nome`, `valor`) VALUES (NULL, 'colorsLaps', '".$TotalRaces."');";
	try
	{
		$stmt = $pdo->prepare($sql_select);
		$data = $stmt->execute();
	}
	catch (PDOException $e) {
		echo "Error: " . $e->getMessage() . "<br />\n";
	}

	$sql_select="INSERT INTO `".$banco_dados."`.`".$nome_tabela."` (`id`, `nome`, `valor`) VALUES (NULL, 'penalty', '".$penaltyRace."');";
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
<script>
alert("Saved!");
window.location.href = "index.php";
</script>
