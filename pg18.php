<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Book Database</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background: #f4f7fa;
        margin: 0;
        padding: 20px;
    }
    h2 {
        text-align: center;
        color: #333;
    }
    .container {
        width: 50%;
        margin: auto;
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        margin-bottom: 30px;
    }
    label {
        font-weight: bold;
    }
    input[type="text"],
    input[type="number"] {
        width: 95%;
        padding: 10px;
        margin: 8px 0 15px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    input[type="submit"] {
        background: #007bff;
        border: none;
        padding: 10px 20px;
        color: white;
        border-radius: 5px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background: #0056b3;
    }
    table {
        width: 80%;
        margin: auto;
        border-collapse: collapse;
        background: white;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    table, th, td {
        border: 1px solid #ccc;
        padding: 12px;
        text-align: center;
    }

    th {
        background: #007bff;
        color: white;
    }
</style>
</head>
<body>
<h2>Add Book Details</h2>
<div class="container">
<form action="program18.php" method="post">
    <label>Book ID:</label>
    <input type="text" name="id" required="">
    <label>Title:</label>
    <input type="text" name="name"required="">
    <label>Authors:</label>
    <input type="text" name="auth"required="">
    <label>Edition:</label>
    <input type="number" name="edition"required="">
    <label>Publisher:</label>
    <input type="text" name="publisher"required="">
    <input type="submit" name="submit" value="Submit">
</form>
</div>
<h2>Search Book</h2>
<div class="container">
<form action="program18.php" method="post">
    <label>Book ID:</label>
    <input type="text" name="bookid"required="">
    <input type="submit" name="search" value="Search">
</form>
</div>
<?php
$conn = mysqli_connect('localhost','root','', 'college');
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
if (isset($_POST['submit']))
{
	$id=$_POST['id'];
	$name=$_POST['name'];
	$auth=$_POST['auth'];
	$edition=$_POST['edition'];
	$publisher=$_POST['publisher'];

$sql = "INSERT INTO books VALUES ('$id', '$name', '$auth', '$edition', '$publisher')";
mysqli_query($conn, $sql);
}
if (isset($_POST['search']))
{
    $id=$_POST['bookid'];
$sql = "SELECT * FROM books where book_id='$id'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    ?>
    <table class="table" border='1'>
    <tr>
    <th>Book ID</th>
    <th>Title</th>
    <th>Authors</th>
    <th>Edition</th>
    <th>Publisher</th>
    </tr>
  <?php
  while(  $row = mysqli_fetch_assoc($result)) 
  {?>
    <tr>
        <td><?php echo $row['book_id']; ?></td>
        <td><?php echo $row['book_title']; ?></td>
        <td><?php echo $row['book_author']; ?></td>
        <td><?php echo $row['book_edition']; ?></td>
        <td><?php echo $row['publisher']; ?></td>
    </tr>
    <?php
  }
} 
else 
{
  echo "No records found";
}
}
?>
</body>
</html>
