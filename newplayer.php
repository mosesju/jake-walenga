<!DOCTYPE html>
<html>
<head>
        <meta charset="UTF-8">
        <title> Register new player</title>
  </head>
  <body>
    <p>
      <?php
        
        $jNum = $_POST['jNum'];
        $dob = $_POST['date'];
        $fName = $_POST['fName'];
        $lName = $_POST['lName'];
        $class= $_POST['class'];
        $pos = $_POST['pos'];
        $height = $_POST['height'];
        $reach = $_POST['reach'];
        
        
        if(!$jNum||!$dob||!$fName||!$lName||!$reach||!$height||!$pos||!$class){
          echo "Fill out each field </br>";
          echo ("<a href=roster.php>Return to roster</a>");
          exit;
        }
        
        $jNum = addslashes($jNum);
        $dob = addslashes($dob);
        $fName = addslashes($fName);
        $lName = addslashes($lName);
        $class = addslashes($class);
        $pos = addslashes($pos);
        $height = addslashes($height);
        $reach = addslashes($reach);
        
        @$db = new mysqli('localhost', 'mosesju', '', 'team');
        
        if($db->connect_error){
             die('Connect Error ' . $dbconnect_errno . ': ' . $dbconnect_error);
        }
        //$searchterm = "%".$searchterm/"%";
      
        $query = "INSERT INTO pInfo (jNum, fName, lName, dob, class, pos, height, reach) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        
         //if($stmt = $db->prepare($query)){
          $stmt = $db->prepare($query);
        	$stmt->bind_param("dsssssdd", $jNum, $fName, $lName, $dob, $class, $pos, $height, $reach);
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
    <a href="roster.php">Return to Roster</a>
  </body>
</html>