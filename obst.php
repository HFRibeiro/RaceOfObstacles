<html>
<meta http-equiv=Content-Type content="text/html; charset=windows-1252">
<title>RaceOfObstacles</title>
<link rel="shortcut icon" href="imagens/logo.png">
<?php
	require('Dados_BD.php');

	require('Dados_BD.php');

	try{
	$pdo = new pdo( 'mysql:host='.$servidor.';dbname='.$banco_dados.'',$user,$senha,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));


	$query = "SELECT * FROM `teams`";
	try
	{
		$stmt = $pdo->prepare($query);
		$data = $stmt->execute();
		$primary_search = $stmt->fetchAll();

		$k=0;
		Foreach($primary_search as $match)
		{
				$id[$k] = $match['id'];
				$nome[$k] = $match['nome'];
				$tempo[$k] = $match['tempo'];
				$voltas[$k] = $match['voltas'];
				$k++;
		}

	}
	catch (PDOException $e) {
		echo "Error: " . $e->getMessage() . "<br />\n";
	}


	$query = "SELECT * FROM `configs`";
	try
	{
		$stmt = $pdo->prepare($query);
		$data = $stmt->execute();
		$primary_search = $stmt->fetchAll();

		Foreach($primary_search as $match)
		{
			if($match['nome']=="colorsLaps"){
			$colorsLaps = $match['valor'];
			}
			else if($match['nome']=="penalty"){
			$penalty = $match['valor'];
			}
		}

	}
	catch (PDOException $e) {
		echo "Error: " . $e->getMessage() . "<br />\n";
	}


	}
	catch(PDOException $ex){
		die(json_encode(array('outcome' => false, 'message' => 'Unable to connect')));
	}


	$Colors = explode(';', $colorsLaps);


?>
<link rel="stylesheet" type="text/css" href="css/hover.css" />
<link rel="stylesheet" type="text/css" href="css/obstCSS.css" />
<script src="js/jquery-1.10.2.js"></script>
<script>
	var id = new Array("<?php echo implode('","', $id);?>");
	var nome = new Array("<?php echo implode('","', $nome);?>");
	var tempo = new Array("<?php echo implode('","', $tempo);?>");
	var voltas = new Array("<?php echo implode('","', $voltas);?>");
	var Colors = new Array("<?php echo implode('","', $Colors);?>");
	var penalty = <?php echo $penalty;?>;
	var Nvoltas = Colors.length;
</script>
<script src="js/obstJS.js"></script>
<script src="js/isotope.pkgd.js"></script>

<body class="noselect">
<div id="MainPic" class="noselect">
<div id="TeamsDiv" class="table-like"></div>
</div>
<div id="RigthSquareDiv">
<div id="team1ID" class=""></div>
<div id="team1" class=""></div>
<div id="Disqlteam1" class="hvr-float-shadow"><div id="endTime1" class="bts">End1</div><div id="Disqualify1"  class="bts">Disqualify1</div></div>
<div id="Timeteam1">00:00:000</div>
<div id="buttons"><div id="setup" class="btsM hvr-float-shadow">Setup</div><div id="validate" class="btsM hvr-float-shadow">Validate</div></div>
</div>
<div id="topPub">
<div id="ordenacao">Sort by:<select id="selc" onChange="changeOrdem()"><option>Time</option><option>Name</option><option>Races</option><option>ID</option></select></div>
<div id="brcode">BarCode:<input id="barcodeBlue" ></input><div id="bt_accept_blue" class="bt_accept bts hvr-float-shadow" >Accept</div></div>
</div>
<div id="scrollHide"></div>
<div id="bottomPub"><textarea id="debugTextArea"></textarea></div>
<div id="maxima"></div>
<div id="configs" class="masterTooltip" title="Back to configure"></div>
<div id="raceOfChamps">&nbsp;&nbsp;&nbsp;&nbsp;RoboParty RaceOfObstacles&nbsp;&nbsp;&nbsp;&nbsp;</div>
<div id="penalidadesDiv"><a id="lablePen">Select the number of penalitys: </a><input id="penalitysInput" type="number" min="0" value="0"/><div id="savePen" class="btsM">Save</div></div>
<div id="connection" title="Disconnected" ></div>
<div id="ruminho"></div>
</body>

</html>
