<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<title>Edit Player</title>
</head>

<body>
	<h1> Player Updated </h1>
<?php
	   $jNum = $_POST['jNum'];
        //$dob = $_POST['date'];
        $fName = $_POST['fName'];
        $lName = $_POST['lName'];
        $class= $_POST['class'];
        $pos = $_POST['pos'];
        $height = $_POST['height'];
        $reach = $_POST['reach'];
        $playerID=$_POST['playerID'];


	if(!$jNum || !$fName || !$lName ||!$class||!$pos||!$height||!$reach) {
		echo "You have not entered all required details.  Please go back and try again.";
		exit;
	}

	//format input
        $jNum = addslashes($jNum);
        $fName = addslashes($fName);
        $lName = addslashes($lName);
        $class = addslashes($class);
        $pos = addslashes($pos);
        $height = addslashes($height);
        $reach = addslashes($reach);
	//connect to the database
	@$db = new mysqli('localhost', 'mosesju', '', 'team');


	if ($db->connect_error) {
		die('Connect Error ' . $db->connect_errno . ': ' . $db->connect_error);
	}

	$query = "update pInfo SET jNum = ?,fName= ?,lName= ?,class=?,pos=?,height=?,reach=? WHERE playerID =?";
	$stmt = $db->prepare($query);
	    $stmt->bind_param("dssssddd", $jNum, $fName, $lName, $class, $pos, $height, $reach,$playerID);
	    $stmt->execute();
    if ($stmt->affected_rows == 1){
    	echo "<h2>New Values:</h2>";
    	echo "<strong>Jersey Number: </strong>". $jNum . "<br/>";
    	echo "<strong>First Name: </strong>". $fName . "<br/>";
    	echo "<strong>Last Name: </strong>". $lName. "<br/>";
    	echo "<strong>Class: </strong>". $class . "<br/>";
    	echo "<strong>Position: </strong>". $pos . "<br/>";
    	echo "<strong>Height: </strong>". $height . "<br/>";
    	echo "<strong>Reach: </strong>". $reach . "<br/>";
    //}
}else{
 	 echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
}

$db->close();

?>
<a href="roster.php">Return to Roster</a>
</body>

</html>
