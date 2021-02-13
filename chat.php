<?php session_start();
     require_once('functions.php');

     if(!user_logged_in()){
          header('location: login.php');
     }

     if(isset($_POST['submit'])){
          $text = $_POST['text'];
          $email = $_SESSION['email'];
          if($text != null){
               $query = $connection->query("INSERT INTO conversation (message, email) VALUES ('$text', '$email')");
          }
          die();
     }

     if(isset($_POST['update'])){
          $query = $connection->query("SELECT * FROM conversation");

          while($row = mysqli_fetch_assoc($query)){
               $em = $row['email'];
               $msg = $row['message'];
               $query2 = $connection->query("SELECT * FROM users WHERE email = '$em'");
               $row2 = mysqli_fetch_object($query2);
               echo '<p>'.  $row2->fname." ". $row2->lname." : "."<span>$msg</span>"   .'</p>';
          }
          die();
     }

?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Chatroom</title>
     <link rel="stylesheet" href="style.css">
     <script src="js/jquery.js"></script>
     <script src="js/script.js"></script>
</head>
<body>
     <div class="container">
     <a href="logout.php">Log out from your account!</a>
          <div class="box">
               <div class="all"></div>
               <form action="" class='chatform' method='post' >
                    <input type="text" name='message' class='input message' placeholder='Write something!' >
                    <input type="submit" value="Send message" >
               </form>
          </div>
     </div>
</body>
</html> 