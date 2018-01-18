<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<title>Roster</title>
</head>
<body>
<h1></h1>
<?php
	$db = new mysqli('localhost', 'mosesju', '', 'team');


	if ($db->connect_error) {
    	die('Connect Error ' . $db->connect_errno . ': ' . $db->connect_error);
	}

	

$query = ("SELECT * FROM phys");
if ($result = $db->query($query)) {

	    //find size of result set
		$num_results = $result->num_rows;
		$num_fields = $result->field_count;

		echo "<table border='2'>";
		echo "<tr>";

		//get and display field names
		$dbinfo = $result->fetch_fields();


		foreach ($dbinfo as $val) {
			echo "<th>".$val->name."</th>";
		}

		echo "</tr>";

		while($row = $result->fetch_row())	{
			echo "<tr>";
			for($i=0; $i<$num_fields; $i++){
				echo "<td>". stripslashes($row[$i])."</td>";
			}
      //add this for edit and delete functions
			#creates link that has isbn in it
			echo "</tr>";
		}

		$result->close();
		echo "</table>";
}

	
	$db->close();
?>

<a href="home.html">Return to homepage</a>
</body>
</html>