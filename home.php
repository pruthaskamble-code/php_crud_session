<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Home Page</h3>
    <?php
    session_start();
    echo "Hello " . $_SESSION['name'];
    ?>
    <form method="post"> 
    <?php
    include 'db.php';
    $result = $conn -> query('select * from employe'); 
    ?>
    <table border=1 cellspacing=5px cellpadding=5px style="background:linear-gradient(to top left , aqua , beige , yellow)">
        <tr>
            <td>Id</td>
            <td>Name</td>
            <td>Email</td>
            <td>Password</td>
            <td>Update Details</td>
            <td>Delete Details</td>
        </tr>
        <?php
        while($row = $result -> fetch_assoc()){
        ?>
        <tr>
            <td><?php echo $row ['id']?></td>
            <td><?php echo $row ['name'] ?></td>
            <td><?php echo $row ['email'] ?></td>
            <td><?php echo $row['password'] ?></td>
            <td><a href="edit.php?id=<?= $row['id'] ?>"><button type="button">Edit</button></a></td>
            <td><a href="delete.php?id=<?= $row['id'] ?>"><button type="button">Delete</button></a></td>
        </tr>
        <?php } ?>
        <a href="register.php"><button type="button">Add</button></a>
        <a href="logout.php"><button type="button">Logout</button></a>
    </table>   
</form>
</body>
</html>