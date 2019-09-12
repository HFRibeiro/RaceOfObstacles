<html>
<meta http-equiv=Content-Type content="text/html; charset=windows-1252">
<title>RaceOfObstacles</title>
<link rel="shortcut icon" href="imagens/logo.png">
<?php

ini_set("log_errors", 1);
ini_set("error_log", "/tmp/php-error.log");
error_log( "Php Errors!" );

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
<link rel="stylesheet" type="text/css" href="css/indexCSS.css" />
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
<script src="js/indexJS.js"></script>
<script src="js/isotope.pkgd.js"></script>
<script src="js/jscolor.js"></script>
<form id="saveForm" action="saveAll.php" method="post">
<body class="noselect">
<div id="MainPic" class="noselect">
<div id="TeamsDiv" class="table-like"></div>
<a id="lbTop">RoboParty RaceOfObstacles Configuration</a><div id="TeamsControlDiv"><!--<a></a><a id="lb1"><br>Color Text 1: </a><input id="cor_texto_cabecalho" class="color" value="ff3300" autocomplete="off" onChange="mudou_cor_texto_cabecalho()">-->
<div id="Race16Config"></div>
<div id="TeamEditOptions">
<div id="addTeam" class="bts " style="background-image:url(imagens/add.png);">Add Team</div>
<div id="saveAll" class="bts " style="background-image:url(imagens/saveall.png);">Save All</div>
<div id="startCompetition" class="bts " style="background-image:url(imagens/logo.png);">Start Race</div>
</div>
</div>
</div>
<div id="maxima"></div>
<div id="TeamEdit"><a style="margin-left:14vw;">ID: </a><input id="ID" type="number" placeholder="ID" class="inputsEdit"/>&nbsp;&nbsp;&nbsp;Name: <input id="NAME" type="text" placeholder="NAME" class="inputsEdit" style="width:8vw;"/>&nbsp;&nbsp;&nbsp;Time:<input id="MINUTES" type="number" placeholder="MINUTES" class="inputsEdit"/>:<input id="SECONDS" type="number" placeholder="SECONDS" class="inputsEdit" style="margin-left:0;"/>:<input id="MILISECONDS" type="number" placeholder="MILISECONDS" class="inputsEdit" style="margin-left:0;"/>&nbsp;&nbsp;&nbsp;Races:<input id="RACES" type="number" placeholder="RACES" class="inputsEdit"/><div id="saveTeam" class="bts " style="background-image:url(imagens/add.png); height:4vw; background-size:35%; width:8vw; margin-left:20%; margin-top:1%;">Add</div><div id="delete" class="bts" style="background-image:url(imagens/delete.png); height:4vw; background-size:35%; width:8vw; margin-left:5%; margin-top:1%;">Delete</div><div id="cancel" class="bts" style="background-image:url(imagens/cancel.png); height:4vw; background-size:35%; width:8vw; margin-left:5%; margin-top:1%;">Cancel</div></div>

</body>
<input type="hidden" name="TotalTeams" id="TotalTeams" />
<input type="hidden" name="TotalRaces" id="TotalRaces" />

<input type="hidden" name="penaltyRace" id="penaltyRace" />
</form>
</html>
