<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<title>Update Player</title>
</head>

<body>
	<h1> Update Player </h1>
<?php

if(isset($_GET["playerID"]) && !empty(trim($_GET["playerID"]))){
       $playerID = trim($_GET["playerID"]);
	     @$db = new mysqli('localhost', 'mosesju', '', 'team');

    	if ($db->connect_error) {
    		die('Connect Error ' . $db->connect_errno . ': ' . $db->connect_error);
    	}

      $sql = "SELECT * FROM books WHERE playerID = ?";

      if($stmt = $db->prepare($sql)){
        $stmt->bind_param("d", $playerID);
        $stmt->execute();
        $result =$stmt->store_result();
  	    $stmt->bind_result("ddsssssdd", $playerID,$jNum, $fName, $lName, $dob, $class, $pos, $height, $reach);
  	    $stmt->fetch();
        $stmt->close();
      }
  }



$db->close();

?>

<form action="editPlayerAction.php" method="post">
		<input type="hidden" name="playerID" value="<?php echo $playerID?>"/>
		<p>First Name <input type="text" name="fName" maxlength="30" size="30"value="<?php echo $fName?>"/></p>
		<p>Last Name <input type="text" name="lName" maxlength="60" size="30"value="<?php echo $lName?>"/></p>
		<p>Jersey Number <input type="number" name="jNum" maxlength="60" size="30"value="<?php echo $jNum?>"/></p>
		<p>Class<input type="text" name="class" maxlength="60" size="30"value="<?php echo $class?>"/></p>
		<p>Position <input type="text" name="pos" maxlength="60" size="30"value="<?php echo $pos?>"/></p>
		<p>Height<input type="text" name="height" maxlength="7" size="7"value="<?php echo number_format($height,1)?>"/></p>
        <p>Reach <input type="text" name="reach" maxlength="60" size="30"value="<?php echo number_format($height,1)?>"/></p>

		<input type="submit" name="submit" value="Update" />
</form>

<a href="roster.php">Return to Roster</a>
</body>

</html>
