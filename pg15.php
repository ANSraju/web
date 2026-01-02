<!DOCTYPE html>
<html>
<body>
<?php
$name = $email = $password = $mob = "";
$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $mob = trim($_POST["mob"]);
    if (empty($name) || empty($email) || empty($password) || empty($mob)) {
        $error = "All fields must be filled out";
    } 
    elseif (!preg_match("/^[a-zA-Z ]+$/", $name)) {
        $error = "Name must contain only letters";
    } 
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Please enter a valid e-mail address";
    } 
    elseif (strlen($password) < 6) {
        $error = "Password must be at least 6 characters long";
    } 
    elseif (!preg_match("/^[0-9]{10}$/", $mob)) {
        $error = "Please enter a valid 10-digit mobile number";
    } 
    else {
        $error = "Registration successfully submitted";
    }
}
?>
<center>
    <?php if (!empty($error)){?>
        <div style="color:red; font-size:20px; margin-bottom:20px;">
            <?php echo $error; ?>
        </div>
    <?php }?>
    <form style="padding: 250px;" method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>">
        <input type="text" name="name" placeholder="Name" 
               value="<?php echo htmlspecialchars($name); ?>" 
               style="width:300px; height:35px;"><br><br>
        <input type="email" name="email" placeholder="Email"
               value="<?php echo htmlspecialchars($email); ?>"
               style="width:300px; height:35px;"><br><br>

        <input type="password" name="password" placeholder="Password"
               value="<?php echo htmlspecialchars($password); ?>"
               style="width:300px; height:35px;"><br><br>

        <input type="text" name="mob" placeholder="Mob.No"
               value="<?php echo htmlspecialchars($mob); ?>"
               style="width:300px; height:35px;"><br><br>

        <input type="submit" value="Register" style="width:300px; height:35px;">
    </form>
</center>
</body>
</html>
