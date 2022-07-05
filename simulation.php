<!DOCTYPE html>
<?php 
include 'dbconnect.php';
session_start();

$walls_x = [];

$walls_y = [];

$rects_x = [];

$rects_y = [];

$sim_array = [];


if(isset($_POST['submit'])){
$_SESSION['fileid'] = $_POST['fileid'];

$_SESSION['arrival'] = $_POST['date'];

$currentfile = $_SESSION['fileid'];

$currentdate = $_SESSION['arrival'];


$query = "SELECT * FROM `visit`  WHERE fileid = '$currentfile' and LEFT(arrival,10) = left('$currentdate',10) order by arrival ";

$result = mysqli_query($mysqli,$query);

if(isset($result)){
    while($row = mysqli_fetch_array($result)){

        array_push($sim_array,$row['visitors']);
         
    	//echo $row3['exhibits_num']
        $exh_arr = explode (",", $row['exhibit']); 
        //$min_arr = explode (",", $row2['time']); 
		//print_r($exh_arr);
        //print_r($exh_arr);
    }
    //print_r($sim_array);
	
}

}
?>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8" />
	<title>Floor Planner</title>
	<!-- Copyright 1998-2020 by Northwoods Software Corporation -->
	<script src="release/go.js"></script>
	<script src="FloorPlanner-WallBuildingTool.js"></script>
	<script src="FloorPlanner-WallReshapingTool.js"></script>
	<script src="FloorPlanner-Templates-General.js"></script>
	<script src="FloorPlanner-Templates-Furniture.js"></script>
	<script src="FloorPlanner-Templates-Walls.js"></script>
	<script src="Floorplan.js"></script>
	<script src="FloorplanFilesystem.js"></script>
	<script src="FloorplanUI.js"></script>
	<script src="Floorplanner-Constants.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>

	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/themes/smoothness/jquery-ui.css" />

	<link rel="stylesheet" type="text/css" href="FloorPlanner.css" />
	<style>
		.nav-item{
			margin-left:100px;
		}

		#myPaletteWindow{
			position:relative;
			top:-550px;
		}
		
		.visitors{
			margin-left:15px;
		}
		#linkedin{
			width:20px;
			height:20px;
		}
	</style>
</head>
<body id="body" onload="init()">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Floorplanner Tool</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="default.php">Floorplan <span class="sr-only">(current)</span></a>
      </li>
	  <li class="nav-item active">
        <a class="nav-link" href="addvisitors.php">Add Visitors</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="simulation.php">Simulation</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="heatmaps.php">Heatmaps</a>
      </li>
	  <li class="nav-item active">
        <a class="nav-link" href="view.php">Charts</a>
      </li>
      
    </ul>
    
  </div>
</nav>
<?php

		$que = "SELECT * FROM `tracksystem`";
		$res = mysqli_query($mysqli,$que);

?>
<div class="container">
<div class="row">
<div class="col-12 col-lg-7 ">
<form method="POST">
		<div class="form-group">
		<?php   //PREPEI NA VALW IMEROMINIA
				
			echo "<select id='museums' style='width:300px; margin-top:10px;'; class='form-control visitors' name='fileid' > ";
			while($roww = mysqli_fetch_array($res)){
					
			 
			$fileid = $roww['fileid'];

						
				echo "<option value='$fileid'>$fileid</option>";
							

			}  
				echo "</select>";

?>
<br>
<div class="form-group">
	<input type="datetime-local" class="form-control visitors" style="width:300px" name="date" placeholder="Arrival Date">
</div>
<div class="form-group">
<button type="submit" name="submit" style="margin-bottom:15px;" class="btn btn-primary visitors">Submit</button>
</div>
		</div>
</form>
</div>

<div class="col-12 col-lg-5 ">
<br>
	<h2>Simulation for: <?php if(isset($_SESSION['fileid'])){echo $_SESSION['fileid'];}?></h2>
	<h3>Date: <?php  if(isset($_SESSION['arrival'])){echo substr($_SESSION['arrival'],0,10);}?></h3>
</div>
	
</div>
</div>

<?php
		if(isset($_POST['submit'])){
			$fileid = $_POST['fileid'];
					
			$_SESSION['fileid'] = $_POST['fileid'];
			$query3 = "SELECT floorplan from `tracksystem` where fileid='$fileid' ";
	
			$result3 = mysqli_query($mysqli,$query3);
	
		}   
        
		?>

    
	<div id="openDocument" style="visibility: hidden;" class="draggable ui-draggable">
		<div id="openDocumentHandle" class="handle ui-draggable-handle">Open File<button id="openDocumentClose" class="windowButtons clickable" onclick="ui.hideShow('openDocument')">X</button></div>
		<div id="openText" class="elementText">Choose file to open...</div>
		<select id="filesToOpen" class="mySavedFiles"></select>
		<br />
		<button id="openBtn" class="elementBtn" type="button" onclick="filesystem.loadFloorplan()">Open</button>
	</div>

	<div id="selectionInfoWindow" style="visibility: hidden" class="draggable ui-draggable">
		<div id="selectionInfoWindowHandle" class="handle ui-draggable-handle">Selection Info <button id="selectionInfoClose" class="windowButtons clickable" onclick="ui.hideShow('selectionInfoWindow')">X</button></div>
		<div id="selectionInfoTextDiv" class="grid-container">Nothing selected</div>
	</div>

	<div id="optionsWindow" style="visibility: hidden" class="draggable ui-draggable">
		<div id="optionsWindowHandle" class="handle ui-draggable-handle">Options <button id="optionsWindowClose" class="windowButtons clickable" onclick="ui.hideShow('optionsWindow')">X</button></div>
		Units
		<div id="unitsRow" class="row data">
			<form id="unitsForm" onchange="ui.changeUnits()">
				<div class="col-4">
					<input type="radio" name="units" id="centimeters" checked />cm
				</div>
				<div class="col-4">
					<input type="radio" name="units" id="meters" /> m
				</div>
				<div class="col-4">
					<input type="radio" name="units" id="inches" />in
				</div>
				<div class="col-4">
					<input type="radio" name="units" id="feet" />ft
				</div>
			</form>
		</div>
		Grid
		<div id="gridRow" class="row">
			<div class="col-2">
				<input id="gridSizeInput" placeholder="grid size" class="unitsInput" onchange="ui.changeGridSize()" />
				<input id="gridSizeUnitsInput" class="unitsBox" value="cm" disabled  />
				<!--<button id="setGridButton" onclick="ui.changeGridSize()">Set Grid</button>-->
			</div>
			<div class="col-2">
				<input type="checkbox" id="showGridCheckbox" onchange="ui.checkboxChanged('showGridCheckbox', myFloorplan)" checked />Show Grid
			</div>
		</div>
		<div id="gridRow" class="row">
			<div class="col-1">
				<label for="unitsConversionFactorInput">Units/1px (at scale 100%)</label>
				<input id="unitsConversionFactorInput" placeholder="2" onchange="ui.changeUnitsConversionFactor()" />
			</div>
		</div>
		Preferences
		<div id="miscRow" class="row data">
			<div class="col-1">
				<input type="checkbox" id="gridSnapCheckbox" onchange="ui.checkboxChanged('gridSnapCheckbox', myFloorplan)" checked />Grid Snap
			</div>
			<div class="col-1">
				<input type="checkbox" id="wallGuidelinesCheckbox" onchange="ui.checkboxChanged('wallGuidelinesCheckbox', myFloorplan)" checked /> Show Wall Guidelines
			</div>
			<div class="col-1">
				<input type="checkbox" id="wallLengthsCheckbox" onchange="ui.checkboxChanged('wallLengthsCheckbox', myFloorplan)" checked /> Show Wall Lengths
			</div>
			<div class="col-1">
				<input type="checkbox" id="wallAnglesCheckbox" onchange="ui.checkboxChanged('wallAnglesCheckbox', myFloorplan)" checked /> Show Wall Angles
			</div>
			<div class="col-1">
				<input type="checkbox" id="smallWallAnglesCheckbox" onchange="ui.checkboxChanged('smallWallAnglesCheckbox', myFloorplan)" unchecked /> Show Only Small Wall Angles
			</div>
		</div>
	</div>

	<div id="statisticsWindow" style="visibility: hidden" class="draggable ui-draggable">
		<div id="statisticsWindowHandle" class="handle ui-draggable-handle">Floor Plan Statistics <button id="statisticsWindowClose" class="windowButtons clickable" onclick="ui.hideShow('statisticsWindow')">X</button></div>
		Stats
		<div id="statisticsWindowTextDiv" class="grid-container"></div>
	</div>
	<div id="floorplan" style="visibility: hidden" class="draggable ui-draggable">
		
	</div>
	<div id="floorplantext" style="visibility: hidden" class="draggable ui-draggable">
		
	</div>
	<canvas id="canvas" width="1500" height="700">
    
        
    </canvas>
	<div id="diagramHelpDiv" style="visibility: visible">
		<div id="diagramHelpTextDiv">
		<p> &copy; Copyrights | Apostolopoulos Dimitris <a href="https://www.linkedin.com/in/dimitris-apostolopoulos-9847a1172/" target="_blank"> <img src="media/linkedin.png" alt="LinkedIn Profile" id="linkedin"></a> </p>
		</div>
	</div>
	<?php 
	$assoc_array = [];
	$assoc_array2 = [];
		if(isset($result3)){
			if($row3 = mysqli_fetch_array($result3)){
				//print_r($row3);

				$walls = explode('"class":"go.Point", "x":',$row3['floorplan']);
				$walls2 = explode(', "y":',$row3['floorplan']);
				$rects = explode('60, "notes":"", "loc":"',$row3['floorplan']);
				$rects2 = explode('60, "notes":"", "loc":"',$row3['floorplan']);

				for($i = 1;$i<count($walls);$i++){

					$first = substr($walls[$i],0,4);

					$second = str_replace(array(',','"','}'), '',$first);
					//echo $second." ";
					array_push($walls_x,$second+500);
					
				}

				for($i = 1;$i<count($walls2);$i++){

					$first2 = substr($walls2[$i],0,4);
					//echo $first2;
					$second2 = str_replace(array('}','"',','), '',$first2);
					//echo $second2." ";
					array_push($walls_y,$second2+350);
					
				}

				for($i = 1;$i<count($rects);$i++){

					$first3 = substr($rects[$i],0,4	);
					//echo $first3;
					
					$second3 = str_replace(array('}','"','{',','), '',$first3);
					$arr1 = str_split($second3);
					//print_r($arr1);
					if($second3 != $arr1[0].$arr1[1].$arr1[2]){
						$arr1[3]= ' ';
					}
					$rightsecond3 = str_replace(array(' 0',' 1',' 2',' 3',' 4',' 5',' 6',' 7',' 8',' 9','  '), '',$second3);
					//echo $rightsecond3." ";
					array_push($rects_x,$rightsecond3+470);
					
				}

				for($i = 1;$i<count($rects2);$i++){

					$first4 = substr($rects2[$i],4,6);
					//echo $first4;
					$second4 = str_replace(array(' ','}','"','{',',','}'), '',$first4);
					echo $second4." ";
					array_push($rects_y,$second4+320);
					//ΚΡΥΒΕΙ ΤΟ ΠΡΩΤΟ ΝΟΥΜΕΡΟ ΕΠΕΙΔΗ ΤΟ ΡΕΚΤ1 ΕΙΝΑΙ ΔΙΨΗΦΙΟ. ΙΣΩΣ ΑΝ ΚΑΝΩ GLOBAL ΤΗ RIGHTSECOND3 KAI ΠΑΙΞΩ ΕΔΩ ΜΕΣΑ ΜΕ ΑΥΤΗ
				}

			}
		}
		if(isset($walls) && isset($rects)){
			for($i = 0;$i<count($walls)-1;$i = $i+2){
				
				$assoc_array[] = array("sx"=>$walls_x[$i], "sy"=>$walls_y[$i],"tx"=>$walls_x[$i+1],"ty"=>$walls_y[$i+1]);

			}
			

			for($i = 0;$i<count($rects)-1;$i++){

				$assoc_array2[] = array("px"=>$rects_x[$i],"py"=>$rects_y[$i]);
			}
		}
		//for($i=1;$i<count($walls);$i++){
			
		//	array_push($walls_x,$walls[$i]);

		//}
		//print_r($walls_x);
		//print_r($walls_y);
		//print_r($rects_x);
		//print_r($rects_y);
		//print_r($assoc_array);
		//print_r($assoc_array2);
	?>

    

	<script>

        function initCanvas(){
        
        var ctx = document.getElementById("canvas").getContext("2d");
        ctx.fillStyle = "grey";
        ctx.fillRect(0,0,1500,1000);
        
        //JSON object
        var exhibits = <?php echo json_encode($assoc_array2); ?>

		

        var walls = <?php echo json_encode($assoc_array);  ?>;
        

        for(var i = 0; i < exhibits.length ; i++ ){
            var line = exhibits[i];          		
			ctx.font = "15px Arial";
			ctx.fillStyle = "white";	
            ctx.fillRect(line.px,line.py,60,60);
			ctx.fillStyle = "black";
			ctx.fillText("E"+(i+1), line.px+18, line.py+34);
        }
        for(var i = 0; i < walls.length ; i++ ){
            var line2 = walls[i];
            ctx.beginPath();
            ctx.moveTo(line2.sx, line2.sy);
            ctx.lineTo(line2.tx, line2.ty);
            ctx.stroke();
        }
        

        }

        window.addEventListener('load',function(event){
        initCanvas();
        } );
    </script>

	<script>
		// enables draggable windows (jQuery), defining their handles and behavior (most recently dragged window stacks over other windows)
		$(function () {
			$("#palettes").accordion({
				activate: function (event, ui) {
					furniturePalette.requestUpdate();
					wallPartsPalette.requestUpdate();
				}
			});
			$("#openDocument").draggable({ handle: "#openDocumentHandle", stack: ".draggable", containment: 'window', scroll: false });
			$('#optionsWindow').draggable({ handle: "#optionsWindowHandle", stack: ".draggable", containment: 'window', scroll: false });
			$("#removeDocument").draggable({ handle: "#removeDocumentHandle", stack: ".draggable", containment: 'window', scroll: false });
			$("#myOverviewWindow").draggable({ handle: "#myOverviewWindowHandle", stack: ".draggable", containment: 'window', scroll: false });
			$('#statisticsWindow').draggable({ handle: "#statisticsWindowHandle", stack: ".draggable", containment: 'window', scroll: false });
			$("#selectionInfoWindow").draggable({ handle: "#selectionInfoWindowHandle", stack: ".draggable", containment: 'window', scroll: false });
			$("#myPaletteWindow").draggable({ handle: "#myPaletteWindowHandle", stack: ".draggable", containment: 'window', scroll: false });
			$("#myPaletteWindow").resize(function () {
				furniturePalette.requestUpdate();
				wallPartsPalette.requestUpdate();
			});
		});

		function init() {
			
			localStorage.clear();
			//alert('sucess1');
				//alert('sucess1');
				jQuery.ajax({
					
				   url : 'loadFromMySql.php', // your php file
				   type : 'POST', // type of the HTTP request
				   data: 'fileid=123&floorplan=234',
				   success : function(data){
					  
					  json = jQuery.parseJSON(data);
					
					  for (var i in json) {
						
					    window.localStorage.setItem(json[i].fileid, json[i].floorplan);
						
						
					  }
					  //
					  //alert(jQuery.parseJSON(data));
					  return(data);
					 
				   }
				});
			// Floorplan
			myFloorplan = new Floorplan("myFloorplanDiv");

			// 'FILESYSTEM_UI_STATE', 'GUI_STATE' defined in Floorplanner-Constants.js
			filesystem = new FloorplanFilesystem(myFloorplan, FILESYSTEM_UI_STATE);
			ui = new FloorplanUI(myFloorplan, "ui", "myFloorplan", GUI_STATE);

			// Overview
			var $ = go.GraphObject.make;
			myOverview = $(go.Overview, "myOverviewDiv", { observed: myFloorplan, maxScale: 0.5 });

			furniturePalette = $(go.Palette, "furniturePaletteDiv");
			furniturePalette.nodeTemplateMap = myFloorplan.nodeTemplateMap;
			furniturePalette.model = new go.GraphLinksModel(FURNITURE_NODE_DATA_ARRAY);
			wallPartsPalette = $(go.Palette, "wallPartsPaletteDiv");
			wallPartsPalette.nodeTemplateMap = myFloorplan.nodeTemplateMap;
			wallPartsPalette.model = new go.GraphLinksModel(WALLPARTS_NODE_DATA_ARRAY);

			// enable hotkeys
			var body = document.getElementById('body');
			body.addEventListener("keydown", function (e) {
				var keynum = e.which;
				if (e.ctrlKey) {
					e.preventDefault();
					switch (keynum) {
						case 83: filesystem.saveFloorplan(); break; // ctrl + s
						case 79: filesystem.showOpenWindow(); break; // ctrl + o
						case 68: e.preventDefault(); filesystem.newFloorplan(); break; // ctrl + d
						case 82: filesystem.showRemoveWindow(); break; // ctrl + r
						case 49: ui.setBehavior('wallBuilding', myFloorplan); break; // ctrl + 1
						case 50: ui.setBehavior('dragging', myFloorplan); break; // ctrl + 2
						case 72: ui.hideShow('diagramHelpDiv'); break; // ctrl + h
						case 73: ui.hideShow('selectionInfoWindow'); break; // ctrl + i
						case 80: ui.hideShow('myPaletteWindow'); break; // ctrl + p
						case 69: ui.hideShow('myOverviewWindow'); break; // ctrl + e
						case 66: ui.hideShow('optionsWindow'); break; // ctrl + b
						case 71: ui.hideShow('statisticsWindow'); break; // ctrl + g
					}
				}
			});

			
			
			
			var vars = [], hash;
				var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
				for(var i = 0; i < hashes.length; i++)
				{
				  hash = hashes[i].split('=');
				  vars.push(hash[0]);
				  vars[hash[0]] = hash[1];
				}
			//var byName = $.getUrlVar('fileIs');
			document.getElementById("floorplan").innerHTML = vars['fileid'];
			myFloorplan.floorplanFilesystem.loadFloorplanHome();
			document.getElementById("floorplantext").innerHTML=myFloorplan.model; 
			// default model data stored in Floorplanner-Constants.js
			//myFloorplan.floorplanFilesystem.loadFloorplanFromModel(DEFAULT_MODEL_DATA);
			ui.setBehavior("dragging");
			
			
			
			
			
		}
	</script>
	
</body>
</html>
