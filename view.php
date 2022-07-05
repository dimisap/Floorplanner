<!DOCTYPE html>
<?php 
include 'dbconnect.php';
session_start();
$currentdate = date("Y-m-d");
$totalsum = 0;
$counter = 1;
$count = 0;
$counter1 = 0;
$counter2 = 0;
$counter3 = 0;
$counter4 = 0;
$counter5 = 0;
$counter6 = 0;
$counter7 = 0;
$counter8 = 0;
$counter9 = 0;
$counter10 = 0;
$counter11 = 0;
$counter12 = 0;
$counter13 = 0;
$counter14 = 0;
$counter15 = 0;
$counter16 = 0;
$counter17 = 0;
$counter18 = 0;
$counter19 = 0;
$counter20 = 0;

$sumvisitors1 = 0;
$sumvisitors2 = 0;
$sumvisitors3 = 0;
$sumvisitors4 = 0;
$sumvisitors5 = 0;
$sumvisitors6 = 0;
$sumvisitors7 = 0;
$sumvisitors8 = 0;
$sumvisitors9 = 0;
$sumvisitors10 = 0;
$sumvisitors11 = 0;
$sumvisitors12 = 0;
$sumvisitors13 = 0;
$sumvisitors14 = 0;
$sumvisitors15 = 0;
$sumvisitors16 = 0;
$sumvisitors17 = 0;
$sumvisitors18 = 0;
$sumvisitors19 = 0;
$sumvisitors20 = 0;

$revisit1 = 0;
$revisit2 = 0;
$revisit3 = 0;
$revisit4 = 0;
$revisit5 = 0;
$revisit6 = 0;
$revisit7 = 0;
$revisit8 = 0;
$revisit9 = 0;
$revisit10 = 0;
$revisit11 = 0;
$revisit12 = 0;
$revisit13 = 0;
$revisit14 = 0;
$revisit15 = 0;
$revisit16 = 0;
$revisit17 = 0;
$revisit18 = 0;
$revisit19 = 0;
$revisit20 = 0;

$sum_mins1 = 0;
$sum_mins2 = 0;
$sum_mins3 = 0;
$sum_mins4 = 0;
$sum_mins5 = 0;
$sum_mins6 = 0;
$sum_mins7 = 0;
$sum_mins8 = 0;
$sum_mins9 = 0;
$sum_mins10 = 0;
$sum_mins11 = 0;
$sum_mins12 = 0;
$sum_mins13 = 0;
$sum_mins14 = 0;
$sum_mins15 = 0;
$sum_mins16 = 0;
$sum_mins17 = 0;
$sum_mins18 = 0;
$sum_mins19 = 0;
$sum_mins20 = 0;

$mo1 = 0;
$mo2 = 0;
$mo3 = 0;
$mo4 = 0;
$mo5 = 0;
$mo6 = 0;
$mo7 = 0;
$mo8 = 0;
$mo9 = 0;
$mo10 = 0;
$mo11 = 0;
$mo12 = 0;
$mo13 = 0;
$mo14 = 0;
$mo15 = 0;
$mo16 = 0;
$mo17 = 0;
$mo18 = 0;
$mo19 = 0;
$mo20 = 0;

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

$total_visits = 0;
if(isset($_POST['submit'])){

	$_SESSION['fileid'] = $_POST['fileid'];

	$_SESSION['arrival'] = $_POST['date'];

	$currentfile = $_SESSION['fileid'];

	$currentdate = $_SESSION['arrival'];
    
    $fileid = $_POST['fileid'];

    //$visitors=$_POST['visitors'];

    //$exhibit=$_POST['exhibit'];

    //$duration=$_POST['duration'];

    $date = $_POST['date'];

    //$query = "INSERT INTO `visit` (`fileid`,`visitors`,`time`,`exhibit`,`arrival`) VALUES ('$fileid','$visitors','$duration','$exhibit','$date')";

    //$result = mysqli_query($mysqli,$query);

	
	$query2 = "SELECT * FROM `visit`  WHERE fileid = '$currentfile' and LEFT(arrival,10) = left('$currentdate',10) order by arrival ";

	$result2 = mysqli_query($mysqli,$query2);

	$query3 = "SELECT floorplan from `visit` as v inner join `tracksystem` as t on t.fileid = v.fileid where v.fileid='$fileid' ";

	$result3 = mysqli_query($mysqli,$query3);

    $query4 = "SELECT * FROM `tracksystem` where fileid = '$fileid'";

    $result4 = mysqli_query($mysqli,$query4);

    if(isset($result4)){
        while($row4 = mysqli_fetch_array($result4)){
            $max = $row4['exhibits_num'];
        
        }
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

        #arrowup{
            width:35px;
            height:35px;
            margin-left:15px;
            margin-bottom:15px;
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
        .chartbox{
            height:50vh;
            width:80vw;
            
        }

        #gotop{
            margin-left:15px;
            margin-bottom:15px;
        }

        html{
            scroll-behavior: smooth;
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
  <ul class="navbar-nav mr-auto" id="myTopnav">
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
      <tbody>
	<?php
        $json = [];
        $json2 = [];
        
		if(isset($result2)):
        for($i=1; $i<=$max; $i++){
            array_push($json,$i);
        }    
		while($row2 = mysqli_fetch_array($result2)){ 
         
            //echo $row3['exhibits_num']
            $exh_arr = explode (",", $row2['exhibit']); 
            $min_arr = explode (",", $row2['time']); 
            //print_r($exh_arr);
            //print_r($min_arr);
            //for($i=1;$i<=6;$i++){
            $totalsum = $totalsum + $row2['visitors'];
                //${'count'.$i} = 0;
               // echo ${'count'.$i};
            //for($j=1;$j<=count($json);$j++){

                //if($json[$j] == $j){



                //}

           // }

            for($i=1;$i<=count($json);$i++){
                ${'count'.$i} = 0;
                //echo ${'count'.$i};
                //echo "$counter2";
            }
            $max_key = 1;
            $max_key2 = 1;
            $max_key3 = 1;
            $max_key4 = 1;
            $max_key5 = 1;
            $max_key6 = 1;
            $max_key7 = 1;
            $max_key8 = 1;
            $max_key9 = 1;
            $max_key10 = 1;
            $max_key11 = 1;
            $max_key12 = 1;
            $max_key13 = 1;
            $max_key14 = 1;
            $max_key15 = 1;
            $max_key16 = 1;
            $max_key17 = 1;
            $max_key18 = 1;
            $max_key19 = 1;
            $max_key20 = 1;
            
                foreach ($exh_arr as $key => $value) {
                    
                    //if($value == $i){
                     //   ${'count'.$i}++;
                    //}
                    
                    if($value == 1){
                        $counter1++;
                        $visit1 = $visit1 + $row2['visitors'];
                        $sum_mins1 = $sum_mins1 + ($min_arr[$key] * $row2['visitors']);
                        if($max_key == 1){
                            $max_key=20;
                            $sumvisitors1 = $sumvisitors1 + $row2['visitors'];                    
                        }else{
                            $revisit1++;
                        }
                        if($counter1 == 0){
                            $mo1 = 0;
                        }else{
                        $mo1 = round($sum_mins1 / $visit1,1);
                        }
                    }
                    if($value == 2){
                        $counter2++;
                        $visit2 = $visit2 + $row2['visitors'];
                        $sum_mins2 = $sum_mins2 + ($min_arr[$key] * $row2['visitors']);
                        if($max_key2 == 1){
                            $max_key2=20;
                            $sumvisitors2 = $sumvisitors2 + $row2['visitors'];                
                        }else{
                            $revisit2++;
                        }
                        if($counter2 == 0){
                            $mo2 = 0;
                        }else{
                        $mo2 = round($sum_mins2 / $visit2,1);
                        }
                    }
                    if($value == 3){
                        $counter3++;
                        $visit3 = $visit3 + $row2['visitors'];
                        $sum_mins3 = $sum_mins3 + ($min_arr[$key] * $row2['visitors']);
                        if($max_key3 == 1){
                            $max_key3=20;
                            $sumvisitors3 = $sumvisitors3 + $row2['visitors'];
                            
                        }else{
                            $revisit3++;
                        }
                        if($counter3 == 0){
                            $mo3 = 0;
                        }else{
                        $mo3 = round($sum_mins3 / $visit3,1);
                        }
                    }
                    if($value == 4){
                        $counter4++;
                        $visit4 = $visit4 + $row2['visitors'];
                        $sum_mins4 = $sum_mins4 + ($min_arr[$key] * $row2['visitors']);
                        if($max_key4 == 1){
                            $max_key4=20;
                            $sumvisitors4 = $sumvisitors4+ $row2['visitors'];          
                        }else{
                            $revisit4++;
                        }
                        if($counter4 == 0){
                            $mo4 = 0;
                        }else{
                        $mo4 = round($sum_mins4 / $visit4,1);
                        }
                    }
                    if($value == 5){
                        $counter5++;
                        $visit5 = $visit5 + $row2['visitors'];
                        $sum_mins5 = $sum_mins5 + ($min_arr[$key] * $row2['visitors']);
                        if($max_key5 == 1){
                            $max_key5=20;
                            $sumvisitors5 = $sumvisitors5 + $row2['visitors'];                 
                        }else{
                            $revisit5++;
                        }
                        if($counter5 == 0){
                            $mo5 = 0;
                        }else{
                        $mo5 = round($sum_mins5 / $visit5,1);
                        }
                    }
                    if($value == 6){
                        $counter6++;
                        $visit6 = $visit6 + $row2['visitors'];
                        $sum_mins6 = $sum_mins6 + ($min_arr[$key] * $row2['visitors']);
                        if($max_key6 == 1){
                            $max_key6=20;
                            $sumvisitors6 = $sumvisitors6 + $row2['visitors'];
                        }else{
                            $revisit6++;
                        }
                        if($counter6 == 0){
                            $mo6 = 0;
                        }else{
                        $mo6 = round($sum_mins6 / $visit6,1);
                        }
                    }
                    if($value == 7){
                        $counter7++;
                        $visit7 = $visit7 + $row2['visitors'];
                        $sum_mins7 = $sum_mins7 + ($min_arr[$key] * $row2['visitors']);
                        if($max_key7 == 1){
                            $max_key7=20;
                            $sumvisitors7 = $sumvisitors7 + $row2['visitors'];   
                        }else{
                            $revisit7++;
                        }
                        if($counter7 == 0){
                            $mo7 = 0;
                        }else{
                            $mo7 = round($sum_mins7 / $visit7,1);
                        }
                    }
                    if($value == 8){
                        $counter8++;
                        $visit8 = $visit8 + $row2['visitors'];
                        $sum_mins8 = $sum_mins8 + ($min_arr[$key] * $row2['visitors']);
                        if($max_key8 == 1){
                            $max_key8=20;
                            $sumvisitors8 = $sumvisitors8 + $row2['visitors'];
                        }else{
                            $revisit8++;
                        }
                        if($counter8 == 0){
                            $mo8 = 0;
                        }else{
                        $mo8 = round($sum_mins8 / $visit8,1);
                        }
                    }
                    if($value == 9){
                        $counter9++;
                        $visit9 = $visit9 + $row2['visitors'];
                        $sum_mins9 = $sum_mins9 + ($min_arr[$key] * $row2['visitors']);
                        if($max_key9 == 1){
                            $max_key9=20;
                            $sumvisitors9 = $sumvisitors9 + $row2['visitors'];
                        }else{
                            $revisit9++;
                        }
                        if($counter9 == 0){
                            $mo9 = 0;
                        }else{
                        $mo9 = round($sum_mins9 / $visit9,1);
                        }
                    }
                    if($value == 10){
                        $counter1++;
                        $visit10 = $visit10 + $row2['visitors'];
                        $sum_mins10 = $sum_mins10 + ($min_arr[$key] * $row2['visitors']);
                        if($max_key10 == 1){
                            $max_key10=20;
                            $sumvisitors10 = $sumvisitors10 + $row2['visitors'];
                        }else{
                            $revisit10++;
                        }
                        if($counter10 == 0){
                            $mo10 = 0;
                        }else{
                        $mo10 = round($sum_mins10 / $visit10,1);
                        }
                    }
                    if($value == 11){
                        $counter11++;
                        $visit11 = $visit11 + $row2['visitors'];
                        $sum_mins11 = $sum_mins11 + ($min_arr[$key] * $row2['visitors']);
                        if($max_key11 == 1){
                            $max_key11=20;
                            $sumvisitors11 = $sumvisitors11 + $row2['visitors'];
                        }else{
                            $revisit11++;
                        }
                        if($counter11 == 0){
                            $mo11 = 0;
                        }else{
                        $mo11 = round($sum_mins11 / $visit11,1);
                        }
                    }
                    if($value == 12){
                        $counter12++;
                        $visit12 = $visit12 + $row2['visitors'];
                        $sum_mins12 = $sum_mins12 + ($min_arr[$key] * $row2['visitors']);
                        if($max_key12 == 1){
                            $max_key12=20;
                            $sumvisitors12 = $sumvisitors12 + $row2['visitors'];
                        }else{
                            $revisit12++;
                        }
                        if($counter12 == 0){
                            $mo12 = 0;
                        }else{
                        $mo12 = round($sum_mins12 / $visit12,1);
                        }
                    }
                    if($value == 13){
                        $counter13++;
                        $visit13 = $visit13 + $row2['visitors'];
                        $sum_mins13= $sum_mins13+ ($min_arr[$key] * $row2['visitors']);
                        if($max_key13 == 1){
                            $max_key13=20;
                            $sumvisitors13 = $sumvisitors13 + $row2['visitors'];
                        }else{
                            $revisit13++;
                        }
                        if($counter13 == 0){
                            $mo13 = 0;
                        }else{
                        $mo13 = round($sum_mins13 / $visit13,1);
                        }
                    }
                    if($value == 14){
                        $counter14++;
                        $visit14 = $visit14 + $row2['visitors'];
                        $sum_mins14 = $sum_mins14 + ($min_arr[$key] * $row2['visitors']);
                        if($max_key14 == 1){
                            $max_key14=20;
                            $sumvisitors14 = $sumvisitors14 + $row2['visitors'];
                        }else{
                            $revisit14++;
                        }
                        if($counter14 == 0){
                            $mo14 = 0;
                        }else{
                        $mo14 = round( $sum_mins14 / $visit14,1);
                        }
                    }
                    if($value == 15){
                        $counter15++;
                        $visit15 = $visit15 + $row2['visitors'];
                        $sum_mins15 = $sum_mins15 + ($min_arr[$key] * $row2['visitors']);
                        if($max_key15 == 1){
                            $max_key15=20;
                            $sumvisitors15 = $sumvisitors15 + $row2['visitors'];
                        }else{
                            $revisit15++;
                        }
                        if($counter15 == 0){
                            $mo15 = 0;
                        }else{
                        $mo15 = round($sum_mins15 / $visit15,1);
                        }
                    }
                    if($value == 16){
                        $visit16 = $visit16 + $row2['visitors'];
                        $sum_mins16 = $sum_mins16 + ($min_arr[$key] * $row2['visitors']);
                        if($max_key16 <= $key){
                            $max_key16=20;
                            $sumvisitors16 = $sumvisitors16 + $row2['visitors'];                    
                        }else{
                            $revisit16++;
                        }
                        if($counter16 == 0){
                            $mo16 = 0;
                        }else{
                        $mo16 = round($sum_mins16 / $visit16,1);
                        }
                    }
                    if($value == 17){
                        $visit17 = $visit17 + $row2['visitors'];
                        $sum_mins17 = $sum_mins17 + ($min_arr[$key] * $row2['visitors']);
                        if($max_key17 <= $key){
                            $max_key17=20;
                            $sumvisitors17 = $sumvisitors17 + $row2['visitors'];                    
                        }else{
                            $revisit17++;
                        }
                        if($counter17 == 0){
                            $mo17 = 0;
                        }else{
                            $mo17 = round($sum_mins17 / $visit17,1);
                        }
                    }
                    if($value == 18){
                        $visit18 = $visit18 + $row2['visitors'];
                        $sum_mins18 = $sum_mins18 + ($min_arr[$key] * $row2['visitors']);
                        if($max_key18 <= $key){
                            $max_key18=20;
                            $sumvisitors18 = $sumvisitors18 + $row2['visitors'];                    
                        }else{
                            $revisit18++;
                        }
                        if($counter18 == 0){
                            $mo18 = 0;
                        }else{
                            $mo18 = round($sum_mins18 / $visit18,1);
                        }
                    }
                    if($value == 19){
                        $visit19 = $visit19 + $row2['visitors'];
                        $sum_mins19 = $sum_mins19 + ($min_arr[$key] * $row2['visitors']);
                        if($max_key19 <= $key){
                            $max_key19=20;
                            $sumvisitors19 = $sumvisitors19 + $row2['visitors'];                    
                        }else{
                            $revisit19++;
                        }
                        if($counter19 == 0){
                            $mo19 = 0;
                        }else{
                        $mo19 = round($sum_mins19 / $visit1,1);
                        }
                    }
                    if($value == 20){
                        $visit20 = $visit20 + $row2['visitors'];
                        $sum_mins20 = $sum_mins20 + ($min_arr[$key] * $row2['visitors']);
                        if($max_key20 <= $key){
                            $max_key20=20;
                            $sumvisitors20 = $sumvisitors20 + $row2['visitors'];                    
                        }else{
                            $revisit20++;
                        }
                        if($counter20 == 0){
                            $mo20 = 0;
                        }else{
                        $mo20 = round($sum_mins20 / $visit20,1);
                        }
                    }
                //}
                //array_push($json2,${'count'.$i});
            }
            $total_visits = $visit1 + $visit2 + $visit3 + $visit4 + $visit5 + $visit6 + $visit7 + $visit8 + $visit9 + $visit10 + $visit11 + $visit12 + $visit13 + $visit14 + $visit15 + $visit16 + $visit17 + $visit18 + $visit19 + $visit20; 
            
            //print_r($exh_arr);
            //echo $sum_mins1;
            ?>
			
			
				<tr>

				<th scope="row"><?php echo $counter++;   ?></th>
				<td><?php echo $row2['fileid'];  ?></td>
                <td><?php echo $row2['visitors']; ?></td>
				<td><?php echo $row2['exhibit'];  ?></td>
                <td><?php echo $row2['time']; ?></td>	
				<td><?php echo $row2['arrival'];  ?></td>
                <td><button type="submit" name = "delete" onClick = "deleteme(<?php echo $row2['id']?>)" class="btn btn-danger">Διαγραφή</button></td>		
				</tr>
				
			
			
	<?php }?>
	<?php endif; ?>
 

    </tbody>
</table>

</div>

</div>
<hr>

<h2 style="text-align:center;">Total unique visitors the date <?php if(isset($currentdate)){echo substr($currentdate,0,10);} ?>: &nbsp;<?php if(isset($currentdate)){echo $totalsum; }?></h2>
<br>
<hr>
<h2 style="text-align:center;">Total visits the date on exhibits <?php if(isset($currentdate)){echo substr($currentdate,0,10);} ?>: &nbsp;<?php if(isset($currentdate)){echo $total_visits; }?></h2>
<br>
<hr>
<h2 style="text-align:center;">Visits per exhibit</h2>

<canvas id="myChart" style="height:50vh; width:80vw"></canvas>
<hr>
<h2 style="text-align:center;">Total unique visitors per exhibit</h2>

<canvas id="myChart2" style="height:50vh; width:80vw"></canvas>
<hr>
<h2 style="text-align:center;">Revisitability per exhibit</h2>

<canvas id="myChart3" style="height:50vh; width:80vw"></canvas>
<hr>
<h2 style="text-align:center;">Total minutes spent per exhibit</h2>

<canvas id="myChart4" style="height:50vh; width:80vw"></canvas>
<hr>
<h2 style="text-align:center;">Average Time (Total Time/Visits) per exhibit</h2>

<canvas id="myChart5" style="height:50vh; width:80vw"></canvas>
<hr>
<br>
<br>

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


<script>
const ctx2 = document.getElementById('myChart2').getContext('2d');
const myChart2 = new Chart(ctx2, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($json);?>,
        datasets: [{
            label: 'Total unique visitors',
            data: [<?php echo $sumvisitors1?>,<?php echo $sumvisitors2?>,<?php echo $sumvisitors3?>,<?php echo $sumvisitors4?>,<?php echo $sumvisitors5?>,<?php echo $sumvisitors6?>,<?php echo $sumvisitors7;?>,<?php echo $sumvisitors8?>,<?php echo $sumvisitors9?>,<?php echo $sumvisitors10?>,<?php echo $sumvisitors11?>,<?php echo $sumvisitors12?>,<?php echo $sumvisitors13?>,<?php echo $sumvisitors14?>,<?php echo $sumvisitors15?>,<?php echo $sumvisitors16?>,<?php echo $sumvisitors17?>,<?php echo $sumvisitors18?>,<?php echo $sumvisitors19?>,<?php echo $sumvisitors20?>],
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
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>

<script>
const ctx3 = document.getElementById('myChart3').getContext('2d');
const myChart3 = new Chart(ctx3, {
    type: 'doughnut',
    data: {
        labels: <?php echo json_encode($json);?>,
        datasets: [{
            label: 'Revisitability ',
            data: [<?php echo $revisit1?>,<?php echo $revisit2?>,<?php echo $revisit3?>,<?php echo $revisit4?>,<?php echo $revisit5?>,<?php echo $revisit6?>,<?php echo $revisit7;?>,<?php echo $revisit8?>,<?php echo $revisit9?>,<?php echo $revisit10?>,<?php echo $revisit11?>,<?php echo $revisit12?>,<?php echo $revisit13?>,<?php echo $revisit14?>,<?php echo $revisit15?>,<?php echo $revisit16?>,<?php echo $revisit17?>,<?php echo $revisit18?>,<?php echo $revisit19?>,<?php echo $revisit20?>],
            backgroundColor: [
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
        responsive: false,
        //maintainAspectRatio: false
        scales: {
            
        }
    }
});



</script>


<script>
const ctx4 = document.getElementById('myChart4').getContext('2d');
const myChart4 = new Chart(ctx4, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($json);?>,
        datasets: [{
            label: 'Total minutes : ',
            data: [<?php echo $sum_mins1?>,<?php echo $sum_mins2?>,<?php echo $sum_mins3?>,<?php echo $sum_mins4?>,<?php echo $sum_mins5?>,<?php echo $sum_mins6?>,<?php echo $sum_mins7?>,<?php echo $sum_mins8?>,<?php echo $sum_mins9?>,<?php echo $sum_mins10?>,<?php echo $sum_mins11?>,<?php echo $sum_mins12?>,<?php echo $sum_mins13?>,<?php echo $sum_mins14?>,<?php echo $sum_mins15?>,<?php echo $sum_mins16?>,<?php echo $sum_mins17?>,<?php echo $sum_mins18?>,<?php echo $sum_mins19?>,<?php echo $sum_mins20?>],
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
<script>
const ctx5 = document.getElementById('myChart5').getContext('2d');
const myChart5 = new Chart(ctx5, {
    type: 'line',
    data: {
        labels: <?php echo json_encode($json);?>,
        datasets: [{
            label: 'Average Time on Total time spent per Visits ',
            data: [<?php echo $mo1; ?>,<?php echo $mo2; ?>,<?php echo $mo3; ?>,<?php echo $mo4; ?>,<?php echo $mo5; ?>,<?php echo $mo6; ?>,<?php echo $mo7; ?>,<?php echo $mo8; ?>,<?php echo $mo9; ?>,<?php echo $mo10; ?>,<?php echo $mo11; ?>,<?php echo $mo12 ?>,<?php echo $mo13; ?>,<?php echo $mo14; ?>,<?php echo $mo15; ?>,<?php echo $mo16; ?>,<?php echo $mo17; ?>,<?php echo $mo18; ?>,<?php echo $mo19; ?>,<?php echo $mo20; ?>],
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

</div>	
<p id="gotop">Back to top</p>
<a href="#myTopnav"><img id="arrowup" src="media/arrowup.svg" alt="arrowup"></a>
<?php
		/*if(isset($result3)){
			if($row3 = mysqli_fetch_array($result3)){
			print_r($row3);
			
			}
		}
			*/
?>
	<div id="diagramHelpDiv" style="visibility: visible">
		<div id="diagramHelpTextDiv">
		<p> &copy; Copyrights | Apostolopoulos Dimitris <a href="https://www.linkedin.com/in/dimitris-apostolopoulos-9847a1172/" target="_blank"> <img src="media/linkedin.png" alt="LinkedIn Profile" id="linkedin"></a> </p>
	</div>
</div>
	
<script type="text/javascript">

function deleteme(id){

	if(confirm("Are you sure you want to delete this entry?")){
		window.location.href = 'delete_entry2.php?id='+id;
	}

}

</script>
</body>
</html>
