<!DOCTYPE html>  
<head>
<style>
    table {
        font-family: Arial, sans-serif;
        border-collapse: collapse;
        width: 80%;
        margin: auto;
        text-align: center;
    }
</style>
</head>
<body>
    <h2><center>Student Records</center></h2>
<?php
$conn = mysqli_connect('localhost','root','','college');
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT rollno, name, age, course FROM students";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {?>
    <table class="table" border='1'>
    <tr>
    <th>Roll No</th>
    <th>Name</th>
    <th>Age</th>
    <th>Course</th>
    </tr>
  <?php
  while($row = mysqli_fetch_assoc($result)) 
  {?>
        <tr>
            <td><?php echo $row['rollno']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['age']; ?></td>
            <td><?php echo $row['course']; ?></td>
        </tr>
      <?php
  }?>
  </table>
<?php
} 
else 
{
  echo "No records found";
}
mysqli_close($conn);
?>
</body>
</html>
