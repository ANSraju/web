<!DOCTYPE html>
<html>
<body>
<?php
$name = $meter = $units = "";
$result = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $meter = trim($_POST["meter"]);
    $units = trim($_POST["units"]);
    if (empty($name) || empty($meter) || empty($units)) {
        $result = "<span style='color:red;'>All fields are required.</span>";
    }
    elseif (!is_numeric($units) || $units < 0) {
        $result = "<span style='color:red;'>Units must be a valid positive number.</span>";
    }
    else {
        if ($units <= 100) {
            $bill = $units * 5;
        } 
        elseif ($units <= 200) {
            $bill = (100 * 5) + (($units - 100) * 7.5);
        } 
        else {
            $bill = (100 * 5) + (100 * 7.5) + (($units - 200) * 10);
        }
        $result = "
        <h2 style='color:green;'>Bill Details</h2>
        <p><b>Consumer Name:</b> $name</p>
        <p><b>Meter Number:</b> $meter</p>
        <p><b>Total Units Used:</b> $units</p>
        <p><b>Total Bill Amount:</b> ₹$bill</p>";
    }
}
?>
<center>
<h1>Electricity Bill Calculator</h1>
<div style="margin:20px; font-size:18px;">
    <?php echo $result; ?>
</div>
<form method="POST" action="">
    <input type="text" name="name" placeholder="Enter Consumer Name"
           value="<?php echo htmlspecialchars($name); ?>" 
           style="width:300px; height:35px;"><br><br>
    <input type="text" name="meter" placeholder="Enter Meter Number"
           value="<?php echo htmlspecialchars($meter); ?>" 
           style="width:300px; height:35px;"><br><br>
    <input type="number" name="units" placeholder="Enter Units Used"
           value="<?php echo htmlspecialchars($units); ?>" 
           style="width:300px; height:35px;"><br><br>
    <input type="submit" value="Calculate Bill" 
           style="width:300px; height:35px;">
</form>
</center>
</body>
</html>
