<?php
session_start();
// echo $_SESSION['user_id'];
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];

// echo $user_name . '<BR>'. $user_id . '<br>';
require('index.php');
try{

$sql = "SELECT * FROM `rooms`, `users` WHERE rooms.users LIKE '%$user_id%' AND users.user_id != '$user_id' AND rooms.users LIKE CONCAT ('%', users.user_id, '%')";
  
$data = $pdo->query($sql);
  $result = $data->fetchAll(PDO::FETCH_ASSOC);

if(!empty($result)){
 $resultJSON = json_encode($result);
 echo $resultJSON;
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
