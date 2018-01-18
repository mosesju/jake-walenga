<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<title> Player Search Results</title>
</head>

<body>
	<h1> Player search Results </h1>
<?php
	$searchtype=$_POST["searchtype"];
	$searchterm=trim($_POST["searchterm"]);

	if(!$searchtype || !$searchterm) {
		echo "You have not entered search details.  Please go back and try again.";
		exit;
	}

	@$db = new mysqli('localhost', 'mosesju', '', 'team');


	if ($db->connect_error) {
		die('Connect Error ' . $db->connect_errno . ': ' . $db->connect_error);
	}

	$searchterm = "%".$searchterm."%";
	$query = "select * from pInfo where $searchtype like ?";

	if ($stmt = $db->prepare($query)){
		$stmt->bind_param("s", $searchterm);
		$stmt->execute();
		$result =$stmt->store_result();
	  $num_results =  $stmt->num_rows;
	  echo "<p> Number of results found: $num_results";
	  $stmt->bind_result($playerID,$jNum, $fName, $lName, $dob, $class, $pos, $height, $reach);

	    /* fetch values */
	    while ($stmt->fetch()) {
	        echo "<p><strong>PlayerID: ";
			echo stripslashes($playerID);
			echo "</strong>";
			echo "<br />";
			echo "Jersey Number: ".stripslashes($jNum);
			echo "<br />";
			echo "First Name: ".stripslashes($fName);
			echo "<br />";
			echo "Last Name: ".stripslashes($lName);
			echo "<br />";
			echo "Date of Birth: ".stripslashes($dob);
			echo "<br />";
			echo "Class: ".stripslashes($class);
			echo "<br />";
			echo "Position: ".stripslashes($pos);
			echo "<br />";
			echo "Height: $". number_format($height,2);
			echo "<br />";
			echo "Reach: $". number_format($reach,2);
			echo" </p>";
	    }
		/* close statement */
    	$stmt->close();
	}else{
	    echo("Nothing Found");
	}

	$db->close();
?>
<a href="roster.php">Return to roster</a>
</body>

</html>
