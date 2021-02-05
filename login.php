<?php 
session_start();
require('index.php');
try{
  if(isset($_POST['submit'])){
    
      $email = $_POST['email'];
      $password = $_POST['password'];


  $sql = "SELECT * FROM users WHERE `password` = '$password' AND `email`= '$email'";
  $data = $pdo->query($sql);
  $user = $data->fetch(PDO::FETCH_ASSOC);

    if(!empty($user)){ 
      $_SESSION['user_id'] = $user['user_id'];
      $_SESSION['user_name'] = $user['first_name'];
      header('Location: peopleYouMayLike.php'); exit;
  
    }else{
      echo 'user doesn\'t exist';
    }

  }

}
catch(PDOException $e){
    die("error getting user:  " . $e->getMessage());
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
        <input type="email" name="email" placeholder="email" />
        <input type="password" name="password" placeholder="password" />
        <input type="submit" id='btn' name="submit" value="login" />
</form> 
</body>
</html>