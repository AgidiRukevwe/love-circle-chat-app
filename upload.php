<?php 
require('index.php');
try{
if(isset($_POST['submit'])){
    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $email = $_POST['email'];
    $state = $_POST['state'];
    $password = $_POST['password'];


$query = "INSERT INTO users (`first_name`, `last_name`, `email`, `state`, `password`, `user_id`) VALUES (?,?,?,?,?,?)";
$stmt = $pdo->prepare($query);
$stmt->execute([$first_name, $last_name, $email, $state, $password, uniqid()]);

}

}
catch(PDOException $e){
    die("err creating users" . $e->getMessage());
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action='<?=$_SERVER['PHP_SELF'];?>' method='POST'>
        <input type="text" name="firstname" placeholder="firstname" />
        <input type="text" name="lastname" placeholder="lastname" />
        <input type="text" name="email" placeholder="email" />
        <input type="text" name="state" placeholder="state" />
        <input type="password" name="password" placeholder="password" />
        <input type="submit" id='btn' name="submit" value="sign up" />
</form> 
</body>
</html>