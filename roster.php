<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<title>Roster</title>
</head>
<body>
<h1></h1>
<h1> Roster Search </h1>

	<form action="searchPlayer.php" method="post">
		Choose Search Type: <br />
		<select name="searchtype">
			<option value="playerID">Player ID</option>
			<option value = "fName">First Name</option>
			<option value="lName">Last Name</option>
		</select>
		<br />

		Enter Search Term:<br />
		<input name="searchterm" type="text" size="40" />
		<br />

		<input type="submit" name="submit" value="Search" />
	</form>
<?php
	$db = new mysqli('localhost', 'mosesju', '', 'team');


	if ($db->connect_error) {
    	die('Connect Error ' . $db->connect_errno . ': ' . $db->connect_error);
	}

	

$query = ("SELECT * FROM pInfo");
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
			echo "<td>";
			echo "<a href='editPlayer.php?playerID=". $row[0] ."'>Edit</a>";
            echo "</td>";
            echo "<td>";
            echo "<a href='deletePlayer.php?playerID=".$row[0]."'>Delete</a>";
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