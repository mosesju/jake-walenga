<!DOCTYPE html>
<html>
<head>
        <meta charset="UTF-8">
        <title> Register new test </title>
  </head>
  <body>
    <p>
      <?php
        
        $playerID = $_POST['playerID'];
        $testNum = $_POST['testNum'];
        $blockTouch = $_POST['blockTouch'];
        $approach = $_POST['approach'];

        
        /*if(!$jNum||!$dob||!$fName||!$lName||!$reach||!$height||!$pos||!$class){
          echo "Fill out each field";
          exit;
        }*/
        
        // $playerID = addslashes($playerID);
        // $testNum = addslashes($testNum);
        // $fName = addslashes($fName);
        // $lName = addslashes($lName);
        // $class = addslashes($class);
        // $pos = addslashes($pos);
        // $height = addslashes($height);
        // $reach = addslashes($reach);
        
        @$db = new mysqli('localhost', 'mosesju', '', 'team');
        
        if($db->connect_error){
             die('Connect Error ' . $dbconnect_errno . ': ' . $dbconnect_error);
        }
        //$searchterm = "%".$searchterm/"%";
      
        $query = "INSERT INTO phys (playerID, testNum, blockTouch, approach) 
                  VALUES (?, ?, ?, ?)";
        
         //if($stmt = $db->prepare($query)){
          $stmt = $db->prepare($query);
        	$stmt->bind_param("ddii", $playerID, $testNum,$blockTouch,$approach);
          $stmt->execute();
          echo $stmt->affected_rows."player inserted into database";
    
          /* close statement */
          $stmt->close();
        // }else{
        //   echo "prepared statement issue";
        // }
        #need where clause for update or delete
      $db->close
      ?>
    </p>
    <a href="home.html">Return to homepage</a>
  </body>
</html>