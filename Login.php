<?php
session_start();
include 'db.php';
if ($_SERVER['REQUEST_METHOD']==="POST") {
    $name = $_POST['name'];
    $pass = ($_POST['pass']);
    $sql = $conn -> prepare('select password from employe where name=?');
    $sql -> bind_param('s',$name);   
    $sql -> execute();
    $sql -> bind_result($password);
    if ($sql -> fetch()) {
    if (password_verify($pass,$password)) {
    $_SESSION['name'] = $name;
    header('Location:home.php'); 
    exit();  
    }
    else {
        echo "Inavlaid username or password !";
    }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Login</h3>
    <form method="post">
        User name :
        <input type="text" name="name"><br>
        Password :
        <input type="password" name="pass"><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>