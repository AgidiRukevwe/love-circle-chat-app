<?php
session_start();
// echo $_SESSION['user_id'];
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];

// echo $user_name . '<BR>'. $user_id . '<br>';
require('index.php');
try{

 // $sql = "SELECT email FROM love_country WHERE id > 1";
// $sql = "SELECT DISTINCT users.*, chatrooms.* FROM `users`, `chatrooms` WHERE users.user_id = chatrooms.first_user_id OR users.user_id = chatrooms.second_user_id";
//$sql = "SELECT * FROM `users` INNER JOIN chatrooms ON  users.user_id = chatrooms.first_user_id AND users.user_id = chatrooms.second_user_id";
// $sql = "SELECT * FROM `users` INNER JOIN user_chats ON  users.user_id = user_chats.user_id WHERE user_chats.user_id != '6019488501997'";

// $sql = "SELECT * FROM users, user_chats WHERE (users.user_id AND user_chats.user_id = '$user_id' ) ";

// $sql = "SELECT DISTINCT users.* FROM users, user_chats WHERE user_chats.user_id = '$user_id' AND users.user_id != '$user_id'";
$sql = "SELECT * FROM `rooms`, `users` WHERE rooms.users LIKE '%6019483dbb209%' AND users.user_id != '6019483dbb209' AND rooms.users NOT LIKE CONCAT ('%', users.user_id, '%')";
  
$data = $pdo->query($sql);
  $result = $data->fetchAll(PDO::FETCH_ASSOC);

if(!empty($result)){
 $resultJSON = json_encode($result);
 echo $resultJSON;
// print_r($result);
}else{
    echo 'results is empty';
}




// if(isset($_POST['message'])){
//   echo $_POST['message'];
// };

}
catch(PDOException $e){
    die("couldn't insert" . $e->getMessage());
};

// SELECT * FROM `users` INNER JOIN user_chats ON  users.user_id = user_chats.user_id WHERE user_chats.user_id != '601bf45c92985';

// SELECT users.*, user_chats.room_id
// FROM users, user_chats
// WHERE users.user_id AND user_chats.user_id IN (1, 2, 3)
// GROUP BY userid
// HAVING COUNT(DISTINCT roleid) = 3

// SELECT users.*, user_chats.room_id
// FROM users, user_chats
// WHERE user_chats.user_id IN ('601bf45c92985')
// GROUP BY users.user_id
// HAVING COUNT(DISTINCT users.user_id) = '601bf45c92985'

// SELECT * FROM `users` INNER JOIN user_chats ON  users.user_id = user_chats.user_id WHERE user_chats.user_id != '601bf45c92985' GROUP BY users.user_id HAVING COUNT(DISTINCT user_chats.room_id) = ;

// SELECT * FROM `users` INNER JOIN user_chats ON  users.user_id = user_chats.user_id WHERE user_chats.user_id != '601bf45c92985' GROUP BY users.user_id HAVING COUNT(DISTINCT user_chats.room_id)