<!DOCTYPE html>
<html lang="en">
<body>
<?php
$cricket_players = array("Sachin Tendulkar", "Virat Kohli", "MS Dhoni", "Rohit Sharma");
$count = 1;?>
  <table border="1">
    <tr> <th> SI_NO </th> <th> PLAYERS NAME </th> </tr>
    <?php foreach ($cricket_players as $player) {?>
    <tr> <td> <?php echo $count; ?> </td> <td> <?php echo $player; ?> </td> </tr> <?php
    $count++;
}
?>    
</body>
</html>
