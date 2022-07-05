<!DOCTYPE html>
<?php 
include 'dbconnect.php';
session_start();

$counter = 1;
$error = '';
$query5 = "SELECT * from tracksystem";
$result5 = mysqli_query($mysqli,$query5);
//$currentdate = date("Y-m-d");
if(isset($_POST['submit'])){


	$_SESSION['fileid'] = $_POST['fileid'];

	$_SESSION['arrival'] = $_POST['date'];

	$currentfile = $_SESSION['fileid'];

	$currentdate = $_SESSION['arrival'];
    
    $fileid = $_POST['fileid'];

    $visitors=$_POST['visitors'];

    $exhibit=$_POST['exhibit'];

    $duration=$_POST['duration'];

    $date = $_POST['date'];


	$comma1 = substr_count($_POST['exhibit'], ',');
	$comma2 = substr_count($_POST['duration'], ',');

	$point1 = substr_count($_POST['exhibit'], '.');
	$point2 = substr_count($_POST['duration'], '.');

	if($point1>0){		
		$error .= "Wrong format on exhibit field: '".$_POST['exhibit']. "'.<br>";
		if($point2>0){
			$error .= "Wrong format on duration field: '".$_POST['duration']. "'.<br>";
		}
	}elseif($point2>0){
		$error .= "Wrong format on duration field: ' ".$_POST['duration']. " '<br>";
	}elseif($comma1 > $comma2){
		$error .= "You have put more exhibits than durations. <br>";

	}elseif($comma1 < $comma2){
		$error .= "You have put more durations than exhibits. <br>";
	}	

	if($visitors<1 ){
		$error .= "You cannot put 0 or a negative number or an empty field as the number of visitors. <br>";
	}
	

	


	if($error != ""){
        $error = "<p>There were error(s) in your form:</p>".$error;
    }else{	
	
    $query = "INSERT INTO `visit` (`fileid`,`visitors`,`time`,`exhibit`,`arrival`) VALUES ('$fileid','$visitors','$duration','$exhibit','$date')";

    $result = mysqli_query($mysqli,$query);

	
	$query2 = "SELECT * FROM `visit` WHERE fileid = '$currentfile' and LEFT(arrival,10) = left('$currentdate',10) order by exhibit";

	$result2 = mysqli_query($mysqli,$query2);

	$query3 = "SELECT floorplan from `visit` as v inner join `tracksystem` as t on t.fileid = v.fileid where v.fileid='$fileid' ";

	$result3 = mysqli_query($mysqli,$query3);


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
		small{
			color:#ed6865;
		}
		#error{
			margin:7px;
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
<div class="container">
	<div class="row">
		<div class=" col-12 col-lg-4">
			<?php

					$query = "SELECT fileid from `tracksystem` ";

					$result = mysqli_query($mysqli,$query);

			?>

<?php  if($error != ""):  ?>
    <div class="alert alert-danger" id='error' role="alert"> <?php echo $error; ?> <br> </div>
<?php endif; ?>
			<form method="POST">
				<div class="form-group">
				<?php   
				
					echo "<select id='museums' style='width:300px; margin-top:10px;'; class='form-control visitors' name='fileid' > ";
					while($row = mysqli_fetch_array($result)){
					
					$fileid = $row['fileid'];
						
						echo "<option value='$fileid'>$fileid</option>";
							

					}  
						echo "</select>";
				
					?> 
					
						
					
					
				</div>
				<div class="form-group">
					<input type="number" class="form-control visitors" style="width:300px" name="visitors" placeholder="How many visitors">
				</div>
				<div class="form-group">
					<input type="text" class="form-control visitors" style="width:300px" name="exhibit" placeholder="Exhibit">
					<small>&nbsp;&nbsp;&nbsp;&nbsp;*Separate the exhibits with a comma(,)</small>
				</div>
				<div class="form-group">
					<input type="text" class="form-control visitors" style="width:300px" name="duration" placeholder="Duration(minutes)">
					<small>&nbsp;&nbsp;&nbsp;&nbsp; *Separate the minutes per exhibit with a comma(,)</small>
				</div>
				<div class="form-group">
					<input type="datetime-local" class="form-control visitors" style="width:300px" name="date" placeholder="Arrival Date">
				</div>
				<button type="submit" name="submit" style="margin-bottom:15px;" class="btn btn-primary visitors">Submit</button>
			</form>
</div>

<div class=" col-12 col-lg-8">
<table class="table">
	<thead>
		<tr>
		<th scope="col">#</th>
		<th scope="col">Fileid</th>
		<th scope="col">Visitors</th>
		<th scope="col">Exhibit</th>
		<th scope="col">Time spent(minutes)</th>
		<th scope="col">Arrival</th>		
		<th scope="col">Delete</th>
		</tr>
  	</thead>
	<?php
		if(isset($result2)):
		while($row2 = mysqli_fetch_array($result2)){ 
		
		//echo $row2['exhibit']?>
			
			<tbody>
				<tr>

				<th scope="row"><?php echo $counter++;   ?></th>
				<td><?php echo $row2['fileid'];  ?></td>
				<td><?php echo $row2['visitors']; ?></td>
				<td><?php echo $row2['exhibit'];  ?></td>
				<td><?php echo $row2['time']; ?></td>	
				<td><?php echo $row2['arrival'];  ?></td>	
				<td><button type="submit" name = "delete" onClick = "deleteme(<?php echo $row2['id']?>)" class="btn btn-danger">Διαγραφή</button></td>		
				</tr>
				
			</tbody>
			
	<?php }?>
	<?php endif; ?>
</table>

</div>

</div><hr>
<br>
<div class="row">

<div class="col-12 col-lg-7">
	<h4>
		Choose the number of the total exhibits in the museum!
	</h4>
	<?php

		$query = "SELECT fileid from `tracksystem` ";

		$result = mysqli_query($mysqli,$query);

	?>
	<form method="POST">
		<div class="form-group">
		<?php   
				
			echo "<select id='museums' style='width:300px; margin-top:10px;'; class='form-control visitors' name='fileid2' > ";
			while($roww = mysqli_fetch_array($result)){
					
				$fileid = $roww['fileid'];
						
				echo "<option value='$fileid'>$fileid</option>";
							

			}  
				echo "</select>";
				
			?> 
					
		</div>

		<div class="form-group">
			<input type="number" class="form-control visitors" style="width:300px" name="exhibits_num" placeholder="Add the number of total exhibits">
		</div>
		<button type="submit" name="submit2" style="margin-bottom:15px;" class="btn btn-dark visitors">Submit</button>
	</div>

<div class="col-12 col-lg-5">
	<table class="table table-hover">
	<thead class="thead-dark">
		<tr>
		
		<th style="text-align:center;" scope="col">Fileid</th>
		<th style="text-align:center;" scope="col">Exhibit number</th>
		<th style="text-align:center;" scope="col">Delete</th>
		</tr>
  	</thead>
	<?php
		
		while($row5 = mysqli_fetch_array($result5)){ 
		
		//echo $row5['exhibit']?>
			
			<tbody>
				<tr>

				
				<td style="text-align:center;"><?php echo $row5['fileid'];  ?></td>
				<td style="text-align:center;"><?php echo $row5['exhibits_num'];  ?></td>
				<td style="text-align:center;"><button type="submit" name = "delete2" onClick = "deleteme2(<?php echo $row5['id']?>)" class="btn btn-danger">Διαγραφή</button></td>	
				
			</tbody>
			
	<?php }?>
	
</table>
</div>
</div>
</div>	
<?php

	if(isset($_POST['submit2'])){

		$number = $_POST['exhibits_num'];	
		$fileid2 = $_POST['fileid2'];
		$que = "UPDATE `tracksystem` SET exhibits_num = $number WHERE `fileid` = '$fileid2'";
		$res = mysqli_query($mysqli,$que);

	}

?>
<?php
		if(isset($result3)){
			if($row3 = mysqli_fetch_array($result3)){
			//print_r($row3);
			
			}
		}
			
?>
	<div id="diagramHelpDiv" style="visibility: visible">
		<div id="diagramHelpTextDiv">
		<p> &copy; Copyrights | Apostolopoulos Dimitris <a href="https://www.linkedin.com/in/dimitris-apostolopoulos-9847a1172/" target="_blank"> <img src="media/linkedin.png" alt="LinkedIn Profile" id="linkedin"></a> </p>
	</div>
</div>
<script type="text/javascript">

function deleteme(id){

	if(confirm("Are you sure you want to delete this entry?")){
		window.location.href = 'delete_entry.php?id='+id;
	}

}

</script>

<script type="text/javascript">

function deleteme2(id){

	if(confirm("Are you sure you want to delete this museum?")){
		window.location.href = 'delete_museum.php?id='+id;
	}

}

</script>
	
</body>
</html>
