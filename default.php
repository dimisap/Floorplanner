<!DOCTYPE html>
<?php 
include 'dbconnect.php';
session_start();
?>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8" />
	<title>Floor Planner</title>
	<style>
		#linkedin{
			width:20px;
			height:20px;
		}
	</style>
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
        <a class="nav-link" href="heatmaps.php">Heatmaps</a>
      </li>
	  <li class="nav-item active">
        <a class="nav-link" href="view.php">Charts</a>
      </li>
      
    </ul>
    
  </div>
</nav>




	<div id="currentFile">(Unsaved File)</div>
	<!-- File menus-->
	<!-- The Nav Bar / Windows are specific to a certain floorplan and its classes -- unlike most of the Floorplanner code, which is generic -->
	<nav>
		<ul id="fileMenus">
			<li>
				<a href="#">File</a>
				<ul>
					<li><a href="#" onclick="filesystem.newFloorplan()">New <p class="shortcut">(Ctrl + D)</p></a></li>
					<li><a href="#" onclick="filesystem.showOpenWindow()">Open... <p class="shortcut">(Ctrl + O)</p></a></li>
					<li><a href="#" onclick="filesystem.saveFloorplan()">Save <p class="shortcut">(Ctrl + S)</p></a></li>
					<li><a href="#" onclick="filesystem.saveFloorplanAs()">Save As...</a></li>
					<li><a href="#" onclick="filesystem.showRemoveWindow()">Remove... <p class="shortcut">(Ctrl + R)</p></a></li>
				</ul>
			</li>
			<li>
				<a href="#">Edit</a>
				<ul>
					<li><a href="#" onclick="myFloorplan.commandHandler.undo()">Undo <p class="shortcut">(Ctrl + Z)</p></a></li>
					<li><a href="#" onclick="myFloorplan.commandHandler.redo()">Redo <p class="shortcut">(Ctrl + Y)</p></a></li>
					<li><a href="#" onclick="myFloorplan.commandHandler.copySelection()">Copy <p class="shortcut">(Ctrl + C)</p></a></li>
					<li><a href="#" onclick="myFloorplan.commandHandler.cutSelection()">Cut <p class="shortcut">(Ctrl + X)</p></a></li>
					<li><a href="#" onclick="myFloorplan.commandHandler.pasteSelection()">Paste <p class="shortcut">(Ctrl + V)</p></a></li>
					<li><a href="#" onclick="myFloorplan.commandHandler.deleteSelection()">Delete <p class="shortcut">(Del)</p></a></li>
					<li><a href="#" onclick="myFloorplan.commandHandler.selectAll()">Select All <p class="shortcut">(Ctrl + A)</p></a></li>
				</ul>
			</li>
			<li>
				<a href="#">View</a>
				<ul>
					<li><a href="#" onclick="ui.hideShow('diagramHelpDiv')" id="diagramHelpDivButton">Hide Diagram Help <p class="shortcut"> (Ctrl + H)</p></a></li>
					<li><a href="#" onclick="ui.hideShow('selectionInfoWindow')" id="selectionInfoWindowButton">Show Selection Help <p class="shortcut"> (Ctrl + I)</p></a></li>
					<li><a href="#" onclick="ui.hideShow('myPaletteWindow')" id="myPaletteWindowButton">Hide Palettes <p class="shortcut"> (Ctrl + P)</p></a></li>
					<li><a href="#" onclick="ui.hideShow('myOverviewWindow')" id="myOverviewWindowButton">Show Overview <p class="shortcut"> (Ctrl + E)</p></a></li>
					<li><a href="#" onclick="ui.hideShow('statisticsWindow')" id="statisticsWindowButton">Show Statistics <p class="shortcut"> (Ctrl + G)</p></a></li>
					<li>
						<a href="#" id="optionsWindowButton" onclick="ui.hideShow('optionsWindow')">Show Options <p class="shortcut"> (Ctrl + B)</p> </a>
					</li>
					<li>
						<a href="#" class="scaleItems" onclick="ui.adjustScale('-')">-</a>
						<a href="#" class="scaleItems" id="scaleDisplay">Scale: 100%</a>
						<a href="#" class="scaleItems" onclick="ui.adjustScale('+')">+</a>
					</li>
				</ul>
			</li>
			<li><button class="setBehavior toolIcons" id="wallBuildingButton" title="Wall Building Tool (Ctrl + 1)" onclick="ui.setBehavior('wallBuilding')">&nbsp;</button></li>
			<li><button class="setBehavior toolIcons" id="draggingButton" title="Select/Move Tool (Ctrl + 2)" onclick="ui.setBehavior('dragging')">&nbsp;</button></li>
			<p id="wallThicknessBox">
				<label for="wallThicknessInput" id="wallThicknessInputLabel">Wall Thickness:</label>
				<input id="wallThicknessInput" class="unitsInput" placeholder="width" />
				<input id="wallThicknessUnitsInput" class="unitsBox" value="cm" disabled="disabled" />
			</p>
		</ul>
	</nav>

	<!-- Floorplan / Help bar -->
	<div id="myFloorplanDiv"></div>
	<div id="diagramHelpDiv" style="visibility: visible">
		<div id="diagramHelpTextDiv">
		<p> &copy; Copyrights | Apostolopoulos Dimitris <a href="https://www.linkedin.com/in/dimitris-apostolopoulos-9847a1172/" target="_blank"> <img src="media/linkedin.png" alt="LinkedIn Profile" id="linkedin"></a> </p>
		</div>
	</div>

	<!-- Floating windows-->
	<div id="myPaletteWindow" style="visibility: visible" class="draggable ui-draggable">
		<div id="myPaletteWindowHandle" class="handle ui-draggable-handle">Palettes<button id="myPaletteClose" class="windowButtons clickable" onclick="ui.hideShow('myPaletteWindow')">X</button></div>
		<div id="palettes">
			<!-- jQuery accordion -->
			<h3 class="paletteLabel">Furniture</h3>
			<div>
				<input id="furnitureSearchBar" placeholder="Search Furniture" oninput="ui.searchFurniture()" />
				<div id="furniturePaletteDiv" class="paletteClass"></div>
			</div>
			<h3 class="paletteLabel">Wall Parts</h3>
			<div id="wallPartsPaletteDiv" class="paletteClass"></div>
		</div>
	</div>

	<div id="openDocument" style="visibility: hidden;" class="draggable ui-draggable">
		<div id="openDocumentHandle" class="handle ui-draggable-handle">Open File<button id="openDocumentClose" class="windowButtons clickable" onclick="ui.hideShow('openDocument')">X</button></div>
		<div id="openText" class="elementText">Choose file to open...</div>
		<select id="filesToOpen" class="mySavedFiles"></select>
		<br />
		<button id="openBtn" class="elementBtn" type="button" onclick="filesystem.loadFloorplan()">Open</button>
	</div>

	<div id="removeDocument" style="visibility: hidden;" class="draggable ui-draggable">
		<div id="removeDocumentHandle" class="handle">Delete File <button id="removeDocumentClose" class="windowButtons clickable" onclick="ui.hideShow('removeDocument')">X</button></div>
		<div id="removeText" class="elementText">Choose file to remove...</div>
		<select id="filesToRemove" class="mySavedFiles"></select>
		<br />
		<button id="removeBtn" class="elementBtn" type="button" onclick="filesystem.removeFloorplan();alert('hello');" style="margin-left:70px">Remove</button>
	</div>

	<div id="myOverviewWindow" style="visibility: hidden;" class="draggable ui-draggable">
		<div id="myOverviewWindowHandle" class="handle ui-draggable-handle">Overview<button id="myOverviewClose" title="Close" class="windowButtons clickable" onclick="ui.hideShow('myOverviewWindow')">X</button></div>
		<div id="myOverviewDiv" style="height:187px; width: 300px;"></div>
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
