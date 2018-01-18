<!DOCTYPE html>
<html>
    <body>
        <meta charset="UTF-8">
	    <title>Delete Player</title>
    </body>
    <body>
        <?php
        if(isset($_GET["playerID"]) && !empty(trim($_GET["playerID"]))){
       $playerID = trim($_GET["playerID"]);
	     @$db = new mysqli('localhost', 'mosesju', '', 'team');
        
    	if ($db->connect_error) {
    		die('Connect Error ' . $db->connect_errno . ': ' . $db->connect_error);
    	}
        
        $sql = "DELETE FROM pInfo WHERE playerID = ?";
        
        if($stmt = $db->prepare($sql)){
          $stmt->bind_param("s", $playerID);
          if ($stmt->execute()){
              echo "<h2>Player Deleted</h2>";
          }else{
              echo "<h2>Something went wrong. Please try again later.</h2";
          }
      }
}
        ?>
        <a href="roster.php">Return to Roster</a>
    </body>
</html>