<html>
<meta http-equiv=Content-Type content="text/html; charset=windows-1252">
<title>RaceOfChampions</title>
<link rel="shortcut icon" href="imagens/logo.png">
<?php
	require('Dados_BD.php');
						
	$nome_tabela="teams";
	$conexao= mysql_connect($servidor,$user,$senha);
	$colecta_banco = mysql_select_db($banco_dados,$conexao);
	if($conexao && $colecta_banco)
	
	$sql_select="select * from ".$nome_tabela; 
	
	$k=0;
	if ($resultado= mysql_query($sql_select))
	{
		$n_dados=mysql_num_rows($resultado);
		while($registos=mysql_fetch_array($resultado))
		{
			$id[$k] = $registos['id'];
			$nome[$k] = $registos['nome'];
			$tempo[$k] = $registos['tempo'];
			$voltas[$k] = $registos['voltas'];
			$k++;
		}
	}
	
	else
	die('Error: ' . mysql_error());
	
	$nome_tabela="configs";
	$sql_select="select * from ".$nome_tabela; 
	
	if ($resultado= mysql_query($sql_select))
	{
		$n_dados=mysql_num_rows($resultado);
		while($registos=mysql_fetch_array($resultado))
		{
			if($registos['nome']=="colorsLaps"){
			$colorsLaps = $registos['valor'];
			}
		}
	}
	
	else
	die('Error: ' . mysql_error());
	
	$Colors = split(';', $colorsLaps);
	
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
	var Nvoltas = Colors.length;
</script>
<script src="js/indexJS.js"></script>


<body class="noselect">
<div id="MainPic" class="noselect">
</div>
<div id="maxima"></div>
</body>

</html>