<?php
$mysqli = new mysqli("localhost","root","","tracksystem");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

		
			
			$fileid = $_POST["fileid"];
			$floorplan =  $_POST["floorplan"];
			
			//echo $floorplan;
			
			$result = $mysqli->query("select * from tracksystem");
			
			$rows = array();
			while($r = mysqli_fetch_assoc($result)) {
			    $rows[] = [
					'fileid' => $r['fileid'],
					'floorplan' => $r['floorplan'],
				];
			}

			echo json_encode($rows);
			
			//while($row = mysqli_fetch_array($result))
			//{
			   // This will loop through each row, now use your loop here
			//	echo 'result : ' . $row[0] . $row[1];
			//}
				
				
				
			
			
		
					
		$mysqli -> close();
	

?>