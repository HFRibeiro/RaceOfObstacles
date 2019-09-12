// JavaScript Document
$(document).on("scroll",function(){
});

var maxima = false;

var idFinal = id.length;

var newTeam = false,idEdit = 0;

$(document).ready(function() {
	
	acertAltura(innerHeight);
	
	$("body").css("display", "none");
            $("body").fadeIn(1500);
			
	
  $("#maxima").click(function(){
	  if(!maxima){
			launchIntoFullscreen(document.documentElement); // the whole page
			document.getElementById("maxima").style.backgroundImage = "url(imagens/nomaxima.png)";
			//$container.isotope({ sortBy: "number" });
			maxima = true;
	  }
	  else {
	  		exitFullscreen();
			document.getElementById("maxima").style.backgroundImage = "url(imagens/maxima.png)";
			//$container.isotope({ sortBy: "original-order" });
			maxima = false;
	  }
   });
   
   $("#saveTeam").click(function(){
	   if(newTeam)
	   {
		   var repetido = false,equipaRep = false;
		  for(var i=0;i<id.length;i++){
			  if(id[i]==document.getElementById("ID").value) repetido = true;
		  }
		  for(var i=0;i<nome.length;i++){
			  if(nome[i]==document.getElementById("NAME").value) equipaRep = true;
		  }
		  if(!repetido && !equipaRep)
		  {
			  document.getElementById("TeamEdit").style.display = "none";
			  id.push(document.getElementById("ID").value);
			  nome.push(document.getElementById("NAME").value);
			  var minuteRand = parseFloat(document.getElementById("MINUTES").value).toFixed(0);
			  var secondRand = parseFloat(document.getElementById("SECONDS").value).toFixed(0);
			  var miliRand = parseFloat(document.getElementById("MILISECONDS").value).toFixed(0);
			  if(minuteRand<10) minuteRand = "0"+minuteRand;
			  if(secondRand<10) secondRand = "0"+secondRand;
			  if(miliRand<10) miliRand = "00"+miliRand;
			  else if(miliRand>10 && miliRand<100) miliRand = "0"+miliRand;
			  tempo.push(minuteRand+":"+secondRand+":"+miliRand);
			  voltas.push(document.getElementById("RACES").value);
			  addTEAM();
		  }
		  else if(repetido) alert("Repeated id, please choose another!");
		  else alert("Repeated team name, please choose another!");
	   }
	   else {
		 var repetido = false,equipaRep = false;
		  for(var i=0;i<id.length;i++){
			  if(id[i]==document.getElementById("ID").value && i!=idEdit) repetido = true;
		  }
		  for(var i=0;i<nome.length;i++){
			  if(nome[i]==document.getElementById("NAME").value && i!=idEdit) equipaRep = true;
		  }
		  if(!repetido && !equipaRep)
		  {
		  id[idEdit] = document.getElementById("ID").value;
		  nome[idEdit] = document.getElementById("NAME").value;
		  var minuteRand = parseFloat(document.getElementById("MINUTES").value).toFixed(0);
		  var secondRand = parseFloat(document.getElementById("SECONDS").value).toFixed(0);
		  var miliRand = parseFloat(document.getElementById("MILISECONDS").value).toFixed(0);
		  if(minuteRand<10) minuteRand = "0"+minuteRand;
		  if(secondRand<10) secondRand = "0"+secondRand;
		  if(miliRand<10) miliRand = "00"+miliRand;
		  else if(miliRand>10 && miliRand<100) miliRand = "0"+miliRand;
		  tempo[idEdit] = minuteRand+":"+secondRand+":"+miliRand;
		  voltas[idEdit] = document.getElementById("RACES").value;
	document.getElementById("number"+idEdit).value = id[idEdit];
	document.getElementById("number"+idEdit).innerHTML = "ID: <span style='color:blue;'>"+id[idEdit]+"</span>";
	document.getElementById("name"+idEdit).innerHTML = "Name: <span style='color:blue;'>"+nome[idEdit]+"</span>";
	var dats = parseFloat((minuteRand+secondRand+miliRand)).toFixed(0);
	document.getElementById("date"+idEdit).innerHTML ="Best Time: <span style='color:blue;'>"+tempo[idEdit]+"</span>";
	document.getElementById("date"+idEdit).value = dats;
	document.getElementById("vlt"+idEdit).innerHTML = "Races: <span style='color:blue;'>"+voltas[idEdit]+"</span>";
	document.getElementById("TeamEdit").style.display = "none";
	 }
		  else if(repetido) alert("Repeated id, please choose another!");
		  else alert("Repeated team name, please choose another!");
	   }
	  
	});
   
    $("#addTeam").click(function(){
	  document.getElementById("TeamEdit").style.display = "inherit";
	  var NID = parseFloat(id[id.length-1])+parseFloat(1);
	  document.getElementById("ID").value = NID;
		document.getElementById("NAME").value = "Team "+NID;
		document.getElementById("MINUTES").value = 59;
		document.getElementById("SECONDS").value = 59;
		document.getElementById("MILISECONDS").value = 999;
		document.getElementById("RACES").value = 0;
		newTeam = true;
   });
   
    $("#cancel").click(function(){
	  document.getElementById("TeamEdit").style.display = "none";
   });
   
   $("#delete").click(function(){
	  if(!newTeam){
		  document.getElementById("TeamsDiv").removeChild(document.getElementById("item"+idEdit));
		  id.pop(idEdit);
		  nome.pop(idEdit);
		  tempo.pop(idEdit);
		  voltas.pop(idEdit);
		  document.getElementById("TeamEdit").style.display = "none";
	  }
   });
   
    $("#startCompetition").click(function(){
	  window.location.href = "obst.php";
   });
   
   $("#saveAll").click(function(){
	  document.getElementById("TotalTeams").value = id.length;
	  var painel = document.getElementById("saveForm");
	  for(var i=0;i<id.length;i++){
		  var a = document.createElement('input');
		  a.type = "hidden";
		  a.name = "equipa"+i;
		  a.value = id[i]+";"+nome[i]+";"+tempo[i]+";"+voltas[i];
		  painel.appendChild(a);
	  }
	  var totalRaces = document.getElementById("NvoltasNewInput").value;
	  totalRaces++;
	  var StringFinal = "";
	  document.getElementById("TotalRaces").value = totalRaces;
	  for(var k=0;k<totalRaces;k++){
		  StringFinal += "#"+document.getElementById("color"+k).value;
		  if(k+1<totalRaces) StringFinal +=";";
	  }
	  document.getElementById("TotalRaces").value = StringFinal;
	  document.getElementById("penaltyRace").value = document.getElementById("penaltyTime").value;
	  
	  document.getElementById("saveForm").submit();
   });
   
	
	function acertAltura(altura) {
	}
	
	window.addEventListener("resize", myResize);
	
	function myResize()
	{
		var delay=200; //1 seconds
		setTimeout(function(){
	 	 acertAltura(innerHeight);
		}, delay); 
	}
	
	
		// Find the right method, call on correct element
	function launchIntoFullscreen(element) {
	  if(element.requestFullscreen) {
		element.requestFullscreen();
	  } else if(element.mozRequestFullScreen) {
		element.mozRequestFullScreen();
	  } else if(element.webkitRequestFullscreen) {
		element.webkitRequestFullscreen();
	  } else if(element.msRequestFullscreen) {
		element.msRequestFullscreen();
	  }
	  
	  	var delay=200; //1 seconds
		setTimeout(function(){
	 	 acertAltura(innerHeight);
		}, delay); 
	}

	function exitFullscreen() {
	  if(document.exitFullscreen) {
		document.exitFullscreen();
	  } else if(document.mozCancelFullScreen) {
		document.mozCancelFullScreen();
	  } else if(document.webkitExitFullscreen) {
		document.webkitExitFullscreen();
	  }
	  var delay=200; //1 seconds
		setTimeout(function(){
	 	 acertAltura(innerHeight);
		}, delay); 
	}
	
	for(var i=0;i<id.length;i++)
			{
						var painel = document.getElementById("TeamsDiv");
						var a = document.createElement('li');
						a.id = "item"+i;
						a.name = voltas[i];
						a.className = "table-like__item hvr-shutter-in-horizontal ";
						a.ondblclick = function() 
						{
							var idN = this.id.replace("item", "");
							document.getElementById("TeamEdit").style.display = "inherit";
							document.getElementById("ID").value = id[idN];
							document.getElementById("NAME").value = nome[idN];
							var partsOfStr = tempo[idN].split(':');
							//year, month, day, hours, minutes, seconds, milliseconds
							var minuteRand = parseFloat(partsOfStr[0]).toFixed(0);
							var secondRand = parseFloat(partsOfStr[1]).toFixed(0);
							var miliRand = parseFloat(partsOfStr[2]).toFixed(0);
							if(minuteRand<10) minuteRand = "0"+minuteRand;
							if(secondRand<10) secondRand = "0"+secondRand;
							if(miliRand<10) miliRand = "00"+miliRand;
							else if(miliRand>10 && miliRand<100) miliRand = "0"+miliRand;
							document.getElementById("MINUTES").value = minuteRand;
							document.getElementById("SECONDS").value = secondRand;
							document.getElementById("MILISECONDS").value = miliRand;
							document.getElementById("RACES").value = voltas[idN];
							newTeam = false;
							idEdit = idN;
						};
						painel.appendChild(a);
						
						var b = document.createElement('div');
						b.id = "number"+i;
						b.className = "number";
						b.innerHTML = "ID: <span style='color:blue;'>"+id[i]+"</span>";
						b.value = id[i];
						b.onclick = function() 
						{
						};
						a.appendChild(b);
						
						var d = document.createElement('div');
						d.id = "name"+i;
						d.className = "name";
						d.innerHTML = "Name: <span style='color:blue;'>"+nome[i]+"</span>";
						d.onclick = function() 
						{
						};
						a.appendChild(d);
						
						var c = document.createElement('div');
						c.id = "date"+i;
						c.className = "date";
						var partsOfStr = tempo[i].split(':');
						//year, month, day, hours, minutes, seconds, milliseconds
						var minuteRand = parseFloat(partsOfStr[0]).toFixed(0);
						var secondRand = parseFloat(partsOfStr[1]).toFixed(0);
						var miliRand = parseFloat(partsOfStr[2]).toFixed(0);
						if(minuteRand<10) minuteRand = "0"+minuteRand;
						if(secondRand<10) secondRand = "0"+secondRand;
						if(miliRand<10) miliRand = "00"+miliRand;
						else if(miliRand>10 && miliRand<100) miliRand = "0"+miliRand;
						//var dats = new Date(2000, 1, 1, 1, minuteRand, secondRand, miliRand);
						var dats = parseFloat((minuteRand+secondRand+miliRand)).toFixed(0);
						c.innerHTML = "Best Time: <span style='color:blue;'>"+tempo[i]+"</span>";
						c.value = dats;
						c.onclick = function() 
						{
							//alert(this.value);
						};
						a.appendChild(c);
						
						var e = document.createElement('div');
						e.id = "vlt"+i;
						e.className = "vlt";
						e.innerHTML = "Races: <span style='color:blue;'>"+voltas[i]+"</span>";
						a.appendChild(e);
						
			}
			
			var painel = document.getElementById("Race16Config");
			
			var a = document.createElement('a');
			a.className = "topB16";
			a.innerHTML = "RaceOfObstacles configuration:<br>";
			painel.appendChild(a);
			//////////////////////////////////////////////////
			
			var a = document.createElement('a');
			a.innerHTML = "Penalty time for crashing in seconds: ";
			painel.appendChild(a);
			
			var a = document.createElement('input');
			a.type = "number";
			a.id = "penaltyTime";
			a.className = "numberinputs";
			a.min = 1;
			a.value = penalty;
			painel.appendChild(a);
			var a = document.createElement('a');
			a.innerHTML = "<br>";
			painel.appendChild(a);
			
			//////////////////////////////////////////////////
			
			var a = document.createElement('a');
			a.innerHTML = "Max. Races per team:";
			painel.appendChild(a);
			
			var a = document.createElement('input');
			a.type = "number";
			a.id = "NvoltasNewInput";
			a.className = "numberinputs";
			a.min = 1;
			a.value = Nvoltas-1;
			a.onchange = function() 
			{
				changeLaps();
			};
			painel.appendChild(a);
			var a = document.createElement('a');
			a.innerHTML = "<br>";
			painel.appendChild(a);
			
			/////////////////////////////////////////////////
			
			var painel = document.getElementById("Race16Config");
			for(var i=0;i<Nvoltas;i++)
			{
				
				var a = document.createElement('a');
				if(i!=0) a.innerHTML = " Color after finish Race "+i+": ";
				else a.innerHTML = "Color default: ";
				painel.appendChild(a);
				
				var a = document.createElement('input');
				a.id = "color"+i;
				a.name = "color"+i;
				a.className = "color colorForm";
				a.value = Colors[i];
				painel.appendChild(a);
				
				var a = document.createElement('a');
				a.innerHTML = "<br>";
				painel.appendChild(a);
			}
		
	
});

function setRaceDiv()
{
	var painel = document.getElementById("Race16Config");
			
			var a = document.createElement('a');
			a.className = "topB16";
			a.innerHTML = "Race to best 16 configuration:<br>";
			painel.appendChild(a);
			
			var a = document.createElement('a');
			a.innerHTML = "Max. Laps per team:";
			painel.appendChild(a);
			
			var a = document.createElement('input');
			a.type = "number";
			a.id = "NvoltasNewInput";
			a.className = "numberinputs";
			a.min = 1;
			a.value = NvoltasNew-1;
			a.onchange = function() 
			{
				changeLaps();
			};
			painel.appendChild(a);
			var a = document.createElement('a');
			a.innerHTML = "<br>";
			painel.appendChild(a);
}

function changeLaps()
{
	NvoltasNew = document.getElementById("NvoltasNewInput").value;
	NvoltasNew++;
	
	$("#Race16Config").empty();
	
	setRaceDiv();
	
	for(var i=0;i<NvoltasNew;i++)
	{
		var painel = document.getElementById("Race16Config");
		var a = document.createElement('a');
		if(i!=0) a.innerHTML = " Color after finish Race "+i+": ";
		else a.innerHTML = "Color default: ";
		painel.appendChild(a);
		
		var a = document.createElement('input');
		a.id = "colorC"+i;
		a.name = "colorC"+i;
		a.value = Colors[i];
		a.className = "color colorForm";
		painel.appendChild(a);
		var a = document.createElement('a');
		a.innerHTML = "<br>";
		painel.appendChild(a);
		
		jscolor.init();
	}
	
}

function addTEAM()
{
	var painel = document.getElementById("TeamsDiv");
	var a = document.createElement('li');
	a.id = "item"+idFinal;
	a.name = voltas[idFinal];
	a.className = "table-like__item hvr-shutter-in-horizontal ";
	a.ondblclick = function() 
	{
		var idN = this.id.replace("item", "");
		document.getElementById("TeamEdit").style.display = "inherit";
		document.getElementById("ID").value = id[idN];
		document.getElementById("NAME").value = nome[idN];
		var partsOfStr = tempo[idN].split(':');
		//year, month, day, hours, minutes, seconds, milliseconds
		var minuteRand = parseFloat(partsOfStr[0]).toFixed(0);
		var secondRand = parseFloat(partsOfStr[1]).toFixed(0);
		var miliRand = parseFloat(partsOfStr[2]).toFixed(0);
		if(minuteRand<10) minuteRand = "0"+minuteRand;
		if(secondRand<10) secondRand = "0"+secondRand;
		if(miliRand<10) miliRand = "00"+miliRand;
		else if(miliRand>10 && miliRand<100) miliRand = "0"+miliRand;
		document.getElementById("MINUTES").value = minuteRand;
		document.getElementById("SECONDS").value = secondRand;
		document.getElementById("MILISECONDS").value = miliRand;
		document.getElementById("RACES").value = voltas[idN];
	};
	painel.appendChild(a);
	
	var b = document.createElement('div');
	b.id = "number"+idFinal;
	b.className = "number";
	b.innerHTML = "ID: <span style='color:blue;'>"+id[idFinal]+"</span>";
	b.value = id[idFinal];
	b.onclick = function() 
	{
	};
	a.appendChild(b);
	
	var d = document.createElement('div');
	d.id = "name"+idFinal;
	d.className = "name";
	d.innerHTML = "Name: <span style='color:blue;'>"+nome[idFinal]+"</span>";
	a.appendChild(d);
	
	var c = document.createElement('div');
	c.id = "date"+idFinal;
	c.className = "date";
	var partsOfStr = tempo[idFinal].split(':');
	//year, month, day, hours, minutes, seconds, milliseconds
	var minuteRand = parseFloat(partsOfStr[0]).toFixed(0);
	var secondRand = parseFloat(partsOfStr[1]).toFixed(0);
	var miliRand = parseFloat(partsOfStr[2]).toFixed(0);
	if(minuteRand<10) minuteRand = "0"+minuteRand;
	if(secondRand<10) secondRand = "0"+secondRand;
	if(miliRand<10) miliRand = "00"+miliRand;
	else if(miliRand>10 && miliRand<100) miliRand = "0"+miliRand;
	//var dats = new Date(2000, 1, 1, 1, minuteRand, secondRand, miliRand);
	var dats = parseFloat((minuteRand+secondRand+miliRand)).toFixed(0);
	c.innerHTML = "Best Time: <span style='color:blue;'>"+tempo[idFinal]+"</span>";
	c.value = dats;
	c.onclick = function() 
	{
		//alert(this.value);
	};
	a.appendChild(c);
	
	var e = document.createElement('div');
	e.id = "vlt"+idFinal;
	e.className = "vlt";
	e.innerHTML = "Races: <span style='color:blue;'>"+voltas[idFinal]+"</span>";
	a.appendChild(e);
	
	idFinal++;
}
 
