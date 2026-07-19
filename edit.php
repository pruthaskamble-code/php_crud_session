<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Update details</h2>
    <form method="post">
<?php
include 'db.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = $conn -> prepare('select * from employe where id=?');
    $sql -> bind_param('i',$id);
    $sql -> execute();
    $user = $sql -> get_result() -> fetch_assoc();
?>
Name : 
<input type="text" name="name" value=<?= $user['name'] ?>><br>
Email :
<input type="text" name="email" value=<?= $user['email'] ?>><br>
<button type="submit">Update Details</button>
<?php
if ($_SERVER['REQUEST_METHOD']==="POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $sql = $conn -> prepare('update employe set name=? , email=? where id=?');
    $sql -> bind_param('sssi',$name,$email,$id);
    if ($sql -> execute()) {
        header('Location:home.php');
    }
}
}
?>
</form>
</body>
</html>