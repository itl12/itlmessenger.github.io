<?php session_start();
     require_once('functions.php');

     if(user_logged_in()){
          header('location: chat.php');
     }

?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <link rel="stylesheet" href="style.css">
     <script src="js/jquery.js"></script>
     <script src="js/script.js"></script>
</head>
<body>
     <div class="container">
          <div class="box">
               Don't have any account? Please <a  class='register' href="register.php">register.</a><br>
               Already have an account? Please <a class='login' href="login.php">login.</a>
          </div>
     </div>
</body>
</html>