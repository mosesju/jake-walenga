<!DOCTYPE html>
<html>
<head>
        <meta charset="UTF-8">
        <title> Insert Statistics </title>
  </head>
  <body>
    <p>
      <?php
        $date = $_POST['date'];
        $pID = $_POST['pID'];
        $kill = $_POST['kill'];
        $err = $_POST['err'];
        $att = $_POST['att'];
        $ace = $_POST['ace'];
        $blk = $_POST['blk'];
        $pRate = $_POST['pRate'];
        $ass = $_POST['ass'];
        
        if(!$pID){
          echo("Need a player to enter stats");
          echo("<a href='statCheck.php'>Look at stats</a>");
          exit;
        }
        @$db = new mysqli('localhost', 'mosesju', '', 'team');
        
        if($db->connect_error){
          die("Connect Error ".$db->connect_errno.": ".$db->connect_error);
        }
        $query="INSERT INTO stats VALUES(?,?,?,?,?,?,?,?,?);";
        $stmt=$db->prepare($query);
        $stmt->bind_param("dsddddddd",$pID,$date,$kill,$err,$att,$blk,$ace,$pRate,$ass);
        $stmt->execute();
        echo $stmt->affected_rows."stats inserted into database";
        $stmt->close();
        $db->close();
        
     ?>
     <a href="statCheck.php">Look at stats</a>
     <a href="home.html">Back to homepage</a>
    </p>
  </body>
</html>