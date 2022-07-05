<!DOCTYPE html>
<?php 
include 'dbconnect.php';
session_start();

$walls_x = [];

$walls_y = [];

$rects_x = [];

$rects_y = [];

$sim_array = [];
$visit1 = 0;
$visit2 = 0;
$visit3 = 0;
$visit4 = 0;
$visit5  = 0;
$visit6 = 0;
$visit7 = 0;
$visit8 = 0;
$visit9 = 0;
$visit10 = 0;
$visit11 = 0;
$visit12 = 0;
$visit13 = 0;
$visit14 = 0;
$visit15 = 0;
$visit16 = 0;
$visit17 = 0;
$visit18 = 0;
$visit19 = 0;
$visit20 = 0;
$json = [];
if(isset($_POST['submit'])){
$_SESSION['fileid'] = $_POST['fileid'];

$_SESSION['arrival'] = $_POST['date'];

$currentfile = $_SESSION['fileid'];

$currentdate = $_SESSION['arrival'];

$quer = "SELECT * FROM `tracksystem` where fileid = '$currentfile'";
$resu = mysqli_query($mysqli,$quer);
$r = mysqli_fetch_array($resu);
$max = $r['exhibits_num'];
for($i=1;$i<=$max;$i++){
	array_push($json,$i);

}
//print_r($json);
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
        foreach ($exh_arr as $key => $value) {
                    
            //if($value == $i){
             //   ${'count'.$i}++;
            //}
            
            if($value == 1){
                $visit1 = $visit1 + $row['visitors'];               
            }
            if($value == 2){
                $visit2 = $visit2 + $row['visitors'];               
            }
            if($value == 3){
                $visit3 = $visit3 + $row['visitors'];               
            }
            if($value == 4){
                $visit4 = $visit4 + $row['visitors'];               
            }
            if($value == 5){
                $visit5 = $visit5 + $row['visitors'];               
            }
            if($value == 6){
                $visit6 = $visit6 + $row['visitors'];               
            }
            if($value == 7){
                $visit7 = $visit7 + $row['visitors'];               
            }
            if($value == 8){
                $visit8 = $visit8 + $row['visitors'];               
            }
            if($value == 9){
                $visit9 = $visit9 + $row['visitors'];               
            }
            if($value == 10){
                $visit10 = $visit10 + $row['visitors'];               
            }
            if($value == 11){
                $visit11 = $visit11 + $row['visitors'];               
            }
            if($value == 12){
                $visit12 = $visit12 + $row['visitors'];               
            }
            if($value == 13){
                $visit13 = $visit13 + $row['visitors'];               
            }
            if($value == 14){
                $visit14 = $visit14 + $row['visitors'];               
            }
            if($value == 15){
                $visit15 = $visit15 + $row['visitors'];               
            }
            if($value == 16){
                $visit16 = $visit16 + $row['visitors'];               
            }
            if($value == 17){
                $visit17 = $visit17 + $row['visitors'];               
            }
            if($value == 18){
                $visit18 = $visit18 + $row['visitors'];               
            }
            if($value == 19){
                $visit19 = $visit19 + $row['visitors'];               
            }
            if($value == 20){
                $visit20 = $visit20 + $row['visitors'];               
            }
        }
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
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
    	<style>
	body, html { margin:0; padding:0; height:100%;}
      body { 
		  -webkit-background-size: cover;
		  -moz-background-size: cover;
		  -o-background-size: cover;
		  background-size: 100% 100%;
		  width: 100%;
		  height:100%;}
      body * { font-weight:200;}
      #heatmapContainerWrapper { width:100%; height:100%; position:absolute; }
      #heatmapContainer { width:100%; height:100%; position:absolute;}
	  
      h1 { position:absolute; background:black; color:white; padding:10px; font-weight:200; z-index:10000;}
      #all-examples-info { position:absolute; background:white; font-size:16px; padding:20px; top:100px; width:350px; line-height:150%; border:1px solid rgba(0,0,0,.2);}

	</style>
</head>
<body id="body" onload="init()">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="default.php">Floorplanner Tool</a>
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
	


		//echo $r['exhibits_num'];

?>

<div class="container">
<div class="row">
<div class="col-12 col-lg-5 ">

<h4>Select a floorplan and a date</h4>
<form method="POST">
		<div class="form-group">
		<?php   
				
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

<div class="col-12 col-lg-7">
<br>
	<h2>Heatmap for: <?php if(isset($_SESSION['fileid'])){echo $_SESSION['fileid'];}?></h2>
	<h3>Date: <?php  if(isset($_SESSION['arrival'])){echo substr($_SESSION['arrival'],0,10);}?></h3>
<br>
<canvas id="myChart" style="height:50vh; width:80vw"></canvas>
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
<div id="heatmapContainerWrapper" >
      <div id="heatmapContainer"  >
			
			
      </div>

    </div>
    
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
	<canvas id="canvas" width="1350" height="700">
    
        
    </canvas>
	<div id="diagramHelpDiv" style="visibility: visible">
		<div id="diagramHelpTextDiv">
		<p> &copy; Copyrights | Apostolopoulos Dimitris <a href="https://www.linkedin.com/in/dimitris-apostolopoulos-9847a1172/" target="_blank"> <img src="media/linkedin.png" alt="LinkedIn Profile" id="linkedin"></a> </p>
		</div>
	</div>
	<?php 
	$assoc_array = [];
	$assoc_array2 = [];
	$ekth_arr = [];
	
		if(isset($result3)){
			if($row3 = mysqli_fetch_array($result3)){
				//print_r($row3);

				$walls = explode('"class":"go.Point", "x":',$row3['floorplan']);
				$walls2 = explode(', "y":',$row3['floorplan']);
				$rects = explode('60, "notes":"", "loc":"',$row3['floorplan']);
				$rects2 = explode('60, "notes":"", "loc":"',$row3['floorplan']);


				for($i = 1;$i<count($rects);$i++){
					$rects2num = substr($rects2[$i],0,9);			
					$rects2cor = str_replace(array(',','"','}','{'), '',$rects2num);
					$rects2final = explode(" ",$rects2cor);
					array_push($rects_x,$rects2final[0]+470);
					array_push($rects_y,$rects2final[1]+320);
				}
				

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

				/*for($i = 1;$i<count($rects);$i++){

					$first3 = substr($rects[$i],0,4	);
					//echo $first3;
					
					$second3 = str_replace(array('}','"','{',','), '',$first3);
					$arr1 = str_split($second3);
					//print_r($arr1);
					if($second3 != $arr1[0].$arr1[1].$arr1[2]){
						$arr1[3]= ' ';
					}
					$rightsecond3 = str_replace(array(' 0',' 1',' 2',' 3',' 4',' 5',' 6',' 7',' 8',' 9','  ',' -'), '',$second3);
					//echo $rightsecond3." ";
					
					array_push($rects_x,$rightsecond3+470);
					
				}

				for($i = 1;$i<count($rects2);$i++){

					$temp = substr($rects2[$i],0,4);
					$temp2 = str_replace(array('}','"','{',','), '',$temp);
					$temp_arr = str_split($temp2);
					//print_r($temp_arr);
					$first4 = substr($rects2[$i],4,6);
					//echo $first4;
					$second4 = str_replace(array(' ','}','"','{',',','}'), '',$first4);
					if(isset($temp_arr[3]) && $temp_arr[3] == '-'){
						$second4 = $temp_arr[3].$second4;
					}
					//echo $second4." ";
					
					array_push($rects_y,$second4+320);
					//ΚΡΥΒΕΙ ΤΟ ΠΡΩΤΟ ΝΟΥΜΕΡΟ ΕΠΕΙΔΗ ΤΟ ΡΕΚΤ1 ΕΙΝΑΙ ΔΙΨΗΦΙΟ. ΙΣΩΣ ΑΝ ΚΑΝΩ GLOBAL ΤΗ RIGHTSECOND3 KAI ΠΑΙΞΩ ΕΔΩ ΜΕΣΑ ΜΕ ΑΥΤΗ
				}*/

			}
		}
		if(isset($walls) && isset($rects)){
			for($i = 0;$i<count($walls)-1;$i = $i+2){
				
				$assoc_array[] = array("sx"=>$walls_x[$i], "sy"=>$walls_y[$i],"tx"=>$walls_x[$i+1],"ty"=>$walls_y[$i+1]);
				
			}
			

			for($i = 0;$i<count($rects)-1;$i++){

				$assoc_array2[] = array("px"=>$rects_x[$i],"py"=>$rects_y[$i]);
				array_push($ekth_arr,$rects_x[$i]);
				array_push($ekth_arr,$rects_y[$i]);
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
        
		//print_r($ekth_arr);
		//print_r($rects_x);
		//print_r($rects_y);
		
	?>

    

	<script>

        function initCanvas(){
        
        var ctx = document.getElementById("canvas").getContext("2d");
        ctx.fillStyle = "#F6F8E3";
        ctx.fillRect(0,0,1300,1000);
        
        //JSON object
        var exhibits = <?php echo json_encode($assoc_array2); ?>

		

        var walls = <?php echo json_encode($assoc_array);  ?>;
        

        for(var i = 0; i < exhibits.length ; i++ ){
            var line = exhibits[i];          		
			ctx.font = "15px Arial";
			//ctx.fillStyle = "grey";	
            ctx.rect(line.px,line.py,60,60);
			ctx.fillStyle = "black";
			ctx.fillText("E"+(i+1), line.px+18, line.py+34);
			ctx.stroke();
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
	<script src="heatmap.js"></script>
	<script>
	  
	  var exhibits2 = <?php echo json_encode($assoc_array2); ?>

      var exh = <?php echo json_encode($ekth_arr); ?>


      window.onload = function() {
        // create a heatmap instance
        var heatmap = h337.create({
          container: document.getElementById('heatmapContainer'),
          maxOpacity: .6,
          radius: 50,
          // backgroundColor with alpha so you can see through it
          //backgroundColor: 'rgba(0, 0, 58, 0.96)'
        });
        var heatmapContainer = document.getElementById('heatmapContainerWrapper');

        heatmapContainer.onmousemove = heatmapContainer.ontouchmove = function(e) {
          // we need preventDefault for the touchmove
          e.preventDefault();
          var x = e.layerX;
          var y = e.layerY;
          if (e.touches) {
            x = e.touches[0].pageX;
            y = e.touches[0].pageY;
          }
          
          //heatmap.addData({ x: x, y: y, value: 100,radius: 50,
          //blur: .90 });

        };

        heatmapContainer.onclick = function(e) {
          var x = e.layerX;
          var y = e.layerY;
          //heatmap.addData({ x: x, y: y, value: 100,radius: 30 });
        };
		// randomly generate extremas
        var extremas = [(Math.random() * 100) >> 0,(Math.random() * 100) >> 0];
        var max = Math.max.apply(Math, extremas);
        var min = Math.min.apply(Math,extremas);
	


		<?php if(isset($result)):?>
		heatmap.addData({ x: exh[0]+30, y: exh[1]+30, value: <?php echo $visit1*5?>,radius: 50});
		heatmap.addData({ x: exh[2]+30, y: exh[3]+30, value:  <?php echo $visit2*5?>,radius: 50});
		heatmap.addData({ x: exh[4]+30, y: exh[5]+30, value:  <?php echo $visit3*5?>,radius: 50});
		heatmap.addData({ x: exh[6]+30, y: exh[7]+30, value:  <?php echo $visit4*5?>,radius: 50});
		
		
		heatmap.addData({ x: exh[8]+30, y: exh[9]+30, value: <?php echo $visit5*5?>,radius: 50});
		heatmap.addData({ x: exh[10]+30, y: exh[11]+30, value: <?php echo $visit6*5?>,radius: 50});
		heatmap.addData({ x: exh[12]+30, y: exh[13]+30, value: <?php echo $visit7*5?>,radius: 50});
		heatmap.addData({ x: exh[14]+30, y: exh[15]+30, value: <?php echo $visit8*5?>,radius: 50});
		
		heatmap.addData({ x: exh[16]+30, y: exh[17]+30, value: <?php echo $visit9*5?>,radius: 50});
		heatmap.addData({ x: exh[18]+30, y: exh[19]+30, value: <?php echo $visit10*5?>,radius: 50});
		
		heatmap.addData({ x: exh[20]+30, y: exh[21]+30, value: <?php echo $visit11*5?>,radius: 50});
		heatmap.addData({ x: exh[22]+30, y: exh[23]+30, value: <?php echo $visit12*5?>,radius: 50});
		
		heatmap.addData({ x: exh[24]+30, y: exh[25]+30, value: <?php echo $visit13*5?>,radius: 50});
		heatmap.addData({ x: exh[26]+30, y: exh[27]+30, value: <?php echo $visit14*5?>,radius: 50});
		heatmap.addData({ x: exh[28]+30, y: exh[29]+30, value: <?php echo $visit15*5?>,radius: 50});
		heatmap.addData({ x: exh[30]+30, y: exh[31]+30, value: <?php echo $visit16*5?>,radius: 50});
		heatmap.addData({ x: exh[32]+30, y: exh[33]+30, value: <?php echo $visit17*5?>,radius: 50});
		heatmap.addData({ x: exh[34]+30, y: exh[35]+30, value: <?php echo $visit18*5?>,radius: 50});
		heatmap.addData({ x: exh[36]+30, y: exh[37]+30, value: <?php echo $visit19*5?>,radius: 50});
		heatmap.addData({ x: exh[38]+30, y: exh[39]+30, value: <?php echo $visit20*5?>,radius: 50});
		heatmap.addData({ x: exh[40]+30, y: exh[41]+30, value: <?php echo 1;?>,radius: 50});
		heatmap.addData({ x: exh[42]+30, y: exh[43]+30, value: <?php echo 1;?>,radius: 50});
		//heatmap.addData({ x: 1000, y: 1000, value: 1,radius: 50});
		
		<?php endif; ?>
      };
	  

</script>	
<script>
const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($json);?>,
        datasets: [{
            label: 'Visited ',
            data: [<?php echo $visit1?>,<?php echo $visit2?>,<?php echo $visit3?>,<?php echo $visit4?>,<?php echo $visit5?>,<?php echo $visit6?>,<?php echo $visit7;?>,<?php echo $visit8?>,<?php echo $visit9?>,<?php echo $visit10?>,<?php echo $visit11?>,<?php echo $visit12?>,<?php echo $visit13?>,<?php echo $visit14?>,<?php echo $visit15?>,<?php echo $visit16?>,<?php echo $visit17?>,<?php echo $visit18?>,<?php echo $visit19?>,<?php echo $visit20?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64,0.2)',
                'rgba(255, 255, 102,0.2)',
                'rgba(140, 255, 102,0.2)',
                'rgba(102, 255, 255,0.2)',
                'rgba(217, 102, 255,0.2)',
                'rgba(179, 179, 179,0.2)',
                'rgba(230, 0, 0,0.2)',
                'rgba(0, 0, 230,0.2)',
                'rgb(255, 0, 255,0.2)',
                'rgb(0, 153, 204,0.2)'
            ],
            hoverBackgroundColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 255, 102,1)',
                'rgba(140, 255, 102,1)',
                'rgba(102, 255, 255,1)',
                'rgba(217, 102, 255,1)',
                'rgba(179, 179, 179,1)',
                'rgba(230, 0, 0,1)',
                'rgba(0, 0, 230,1)',
                'rgb(255, 0, 255,1)',
                'rgb(0, 153, 204,1)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 255, 102,1)',
                'rgba(140, 255, 102,1)',
                'rgba(102, 255, 255,1)',
                'rgba(217, 102, 255,1)',
                'rgba(179, 179, 179,1)',
                'rgba(230, 0, 0,1)',
                'rgba(0, 0, 230,1)',
                'rgb(255, 0, 255,1)',
                'rgb(0, 153, 204,1)'
            ],
            borderWidth: 3
        }]
    },
    options: {
        //responsive: true,
        //maintainAspectRatio: false
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
</body>
</html>
