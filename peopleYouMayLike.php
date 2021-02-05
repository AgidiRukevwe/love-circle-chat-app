<?php 
session_start();

require('index.php');
// echo $_SESSION['user_id'];
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];

echo $user_name . $user_id;

try{

     //select all people that current user may like   
    $sql = "SELECT * FROM users WHERE `user_id` != '$user_id' ";
    $data = $pdo->query($sql);
    $people = $data->fetchAll(PDO::FETCH_ASSOC);
    // print_r($people);

            $unique_id = uniqid();
            echo $unique_id . '<br>';
            echo $unique_id;
   
        foreach( $people as $person){



        if(isset($_POST[$person['user_id']])){
          
        // $sql = "INSERT INTO chatrooms (`room_id`, `first_user_id`, `second_user_id`) VALUE(?,?,?)";
        // $sql = "INSERT INTO user_chats (`room_id`, `user_id`) VALUE(?,?)";
        $sql = "INSERT INTO rooms (`room_id`, `users`) VALUE(?,?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$unique_id, $user_id . ' '. $person['user_id'] ]);
        // $stmt->execute([$unique_id, $person['user_id']]);
        // $stmt->execute([
        //     [$unique_id, $user_id ],
        //     [$unique_id, $person['user_id']],
        //     ]);
        }
    
        }
        


}catch(PDOException $e){
    die("error getting people you may like" . $e->getMessage());
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
    <div class="friends">
        <?php foreach($people as $person):?>
            <div class="friends_info">
                <h4 id ="info_name"><?php echo $person['first_name']. ' ' . $person['last_name'];?></h4>
            </div>
            <div class="friends_actions">
                <form action='<?php $_SERVER['PHP_SELF'];?>' method='POST' class="actions_form">
                    <input type="hidden" name="friends_id" value="<?php echo $person['user_id'] ;?>"/>
                    <input type="submit" name="<?php echo $person['user_id'] ?>"/>
                </form>
                
            </div>
      
        <?php endforeach; ?>
    </div>
    
</body>
</html>