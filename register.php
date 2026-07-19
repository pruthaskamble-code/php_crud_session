<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Register with us !</h3><br>
    <form method="post">
        Name :
        <input type="text" name="name"><br>
        Email :
        <input type="text" name="email"><br>
        Password :
        <input type="password" name="pass"><br>
        Confirm password :
        <input type="password" name="cpass"><br>
        <button type="submit">Register</button>
    </form>
</body>
</html>
<?php
include 'db.php';
if ($_SERVER['REQUEST_METHOD']==="POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];
    $sql = $conn -> prepare('insert into employe(name,email,password,cpassword) values(?,?,?,?)');
    $sql -> bind_param('ssss',$name,$email,$pass,$cpass);
    if (empty($name)) {
        echo "<script>alert('Name cannot be empty !');</script>";
        exit();
    }
    if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid Email format !');</script>";
        exit();
    }
    if ($pass != $cpass) {
        echo "<script>alert('Incorrect password !');</script>";
        exit();
    }
    $pass = password_hash($_POST['pass'],PASSWORD_DEFAULT);
    if ($sql -> execute()) {
        echo "Registered Successfully.";
        header('Location:Login.php');
    }
}
?>