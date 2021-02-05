<?php
echo 'hi';



try{
if(isset($_POST['message'])){
  echo $_POST['message'];
};

}
catch(PDOException $e){
    die("couldn't insert" . $e->getMessage());
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
            
            <input type="submit" id='button' name="submit" value="send" />
          </form>

        
        </div>
      </div>
    </div>
  <script src="./chat.js"></script>

  </body>
</body>
</html>