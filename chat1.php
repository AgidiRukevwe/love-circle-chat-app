<?php 
session_start();
require('index.php');

$user_id = $_SESSION['user_id'];


try{
if(isset($_POST['submit'])){
  $message = $_POST['message'];
  $friend_id = $_POST['friend_id'];
  $room_id = $_POST['room_id'];

  // $query = 'SELECT users.* FROM users, user_chats WHERE users. ';

  $sql = "INSERT INTO `message_content` (`sender_id`, `receiver_id`, `message_body`, `room_id`) VALUES (?,?,?,?)  ";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$user_id, $friend_id, $message, $room_id]);

};
// if(!empty($_GET['roomid'])){
  echo $_GET['roomid'];
  // $sql = "SELECT * FROM message WHERE room_id = $_GET['roomid']";
// }

}
catch(PDOException $e){
    die("couldn't insert" . $e->getMessage());
};

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="chat.css" />
    <title>Document</title>
  </head>
  <body>
    
    <div class="container">
      <div class="sidebar">
        <div class="sidebar__header"></div>
        <div class="sidebar_main">
           <div class="sidebar_list_container">
             <ul class="list"></ul>
           </div>
        </div>
      </div>
      <div class="main">
        <div class="header">  </div>
        <div>
          <p id="message__text"> 
            
          </p>
        </div>
        <div class="input">
         <form class="input__form" action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
            <input
              class="input__message"
              type="text"
              placeholder="   message"
              name="message"
            />
            
            <input type="hidden" id='friend_id'  name="friend_id" value="hi" />
            <input type="hidden" id="room_id" name="room_id" value="" />
            <input type="submit" id='button' name="submit" value="send" />
          </form>

        
        </div>
      </div>
    </div>
  <script src="./chat.js"></script>

  </body>
</html>
