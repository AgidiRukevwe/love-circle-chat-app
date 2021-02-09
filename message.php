<?php
session_start();

$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];
require('index.php');

if(isset($_POST['room'])){

    $room = $_POST['room'];

    try{
    if(isset($_POST['message_body'])){
        if(!empty($_POST['message_body'])){
            $message_body = $_POST['message_body'];
            $friend_id = $_POST['friend'];
            $room_id = $_POST['room'];

            $sql = "INSERT INTO `message_content` (`sender_id`, `receiver_id`, `message_body`, `room_id`) VALUES (?,?,?,?)  ";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$user_id, $friend_id, $message_body, $room_id]);
          }

    };

    //get all the messages for a particular room in the server
    $sql = "SELECT * FROM message_content WHERE room_id = '$room'";
    $data= $pdo->query($sql);
    $result = $data->fetchAll(PDO::FETCH_ASSOC);
    
   if(!empty($result)){
       
    $resultJSON = json_encode($result);
    echo $resultJSON;
}else{
    echo 'results is empty';
}   
    }
catch(PDOException $e){
    die("couldn't insert" . $e->getMessage());
};
}





 


?>

