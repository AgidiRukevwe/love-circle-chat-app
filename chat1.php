<?php 
session_start();
require('index.php');

$user_id = $_SESSION['user_id'];


// try{
// if(isset($_POST['submit'])){
//   $message = $_POST['message'];
//   $friend_id = $_POST['friend_id'];
//   $room_id = $_POST['room_id'];

//   // $query = 'SELECT users.* FROM users, user_chats WHERE users. ';

//   $sql = "INSERT INTO `message_content` (`sender_id`, `receiver_id`, `message_body`, `room_id`) VALUES (?,?,?,?)  ";
//   $stmt = $pdo->prepare($sql);
//   $stmt->execute([$user_id, $friend_id, $message, $room_id]);


// };
//  if(!empty($_POST['test'])){
//     echo $_POST['test'];
//     echo $room_id = $_POST['room_id'];

//   }
// }
// catch(PDOException $e){
//     die("couldn't insert" . $e->getMessage());
// };

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
               <form id='sidebar_form' action='message.php' method='POST'>
             <ul class="list"></ul>
             <input type='hidden' id='form_contact' name='form_contact' value=''/>
        </form>
           </div>
        </div>
      </div>
      <div class="main">
        <div class="header">  </div>
        <div>
          <div id="message__text">
            <ul class="message_list"></ul>   
          </div>
      
        </div>
        <div class="input">
         <form class="input__form" action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
            <input
              class="input__message"
              type="text"
              placeholder="   message"
              name="message"
              id="message_input"
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
