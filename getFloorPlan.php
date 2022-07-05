<?php
$mysqli = new mysqli("localhost","root","","tracksystem");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
$fileid = $_GET['fileName'];
$result = $mysqli->query("select floorplan from tracksystem where fileid = '$fileid'" );
			
if ($result->num_rows > 0) 
{
	$data = null;
	while($enr = mysqli_fetch_assoc($result)){
		$data = $enr['floorplan'];
		
		print_r($enr);
	}
}
	//echo json_encode($data);
    echo $data;
	$mysqli -> close();

?>