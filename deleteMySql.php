<?php
		$mysqli = new mysqli("localhost","root","","tracksystem");
		
	

		// Check connection
		if ($mysqli -> connect_errno) {
		  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
		  exit();
		}

		if (isset($_POST["fileid"])){
			
			$fileid = $_POST["fileid"];
			$floorplan =  $_POST["floorplan"];
			
			//echo $floorplan;
			
			$result = $mysqli->query("select * from tracksystem where fileid = '$fileid'");
			
			if ($result->num_rows > 0) 
			{
				
				$sql = "delete from tracksystem where fileid = '$fileid'";
				echo $sql;
				
				if ($mysqli->query($sql) === TRUE) {
					
				}
				else
				{
					echo("Error description: " . $mysqli -> error);
				}
				echo 'update ' . $_POST["floorplan"];
			}
			else
			{				
						
				
				
				$sql = "INSERT INTO tracksystem (fileid, floorplan)
				VALUES ('$fileid', '$floorplan')";
				//echo $sql;
						
				if ($mysqli->query($sql) === TRUE) {
							
				}
				else
				{
					echo("Error description: " . $mysqli -> error);
				}
				echo 'insert ' . $_POST["floorplan"];
			}
		}
		else
		{
			echo 'no save ' . $_POST["floorplan"];
		}
					
		$mysqli -> close();
	

?>