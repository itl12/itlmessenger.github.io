<?php session_start();
     require_once('functions.php');

     if(user_logged_in()){
          header('location: chat.php');
     }

     if(isset($_POST['login'])){
          $email = $_POST['email'];
          $password = $_POST['password'];

          if(email_exits()){
               if(password_exits()){
                    $_SESSION['fname'] = $row->fname;
                    $_SESSION['lname'] = $row->lname;
                    $_SESSION['email'] = $row->email;
                    $_SESSION['success'] = '';

                    header('location: chat.php');
               }else{
                    $wrongemail = "<p>".'Password does not match! Please try another.'."<p>";
               }
          }else{
               $wrongpass = "<p>".'Email does not exits! Please try another.'."<p>";
          }
          
     
          //die();
     }









     #if(isset($_POST['login'])){
          ?>
          <!-- <h1 style='text-align:center;'>Login</h1>
               <form action="" method='post' >
                    <input class='input'  type="email" name="email" placeholder = 'Your email'>
                    <input class='input'  type="password" name="password" placeholder = 'Password'>
                    <input type="submit" value="Login" name='login' ><br>
                    Don't have any account? Please <a class='register' href="register.php">register.</a>
               </form> -->
          <?php #die();
     #}
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Login</title>
     <link rel="stylesheet" href="style.css">
     <script src="js/jquery.js"></script>
     <script src="js/script.js"></script>
</head>
<body>
     <div class="container">
          <div class="box">
          <p>sycloneboyimran12@gmail.com</p><p>12345678</p>
               <h1 style='text-align:center;'>Login</h1>
               <form action="" method='post' class='userlogin' >
                    <input class='input' value='<?php if(isset($email)){echo $email;}  ?>'  type="email" name="email" placeholder = 'Your email'>
                    <input class='input' value='<?php if(isset($password)){echo $password;}  ?>' type="password" name="password" placeholder = 'Password'>
                    <input type="submit" value="Login" name='login' ><br>
                    Don't have any account? Please <a class='register' href="register.php">register.</a>
                    <div class="error">
                         <?php if(isset($wrongemail)){echo $wrongemail;} ?>
                         <?php if(isset($wrongpass)){echo $wrongpass;} ?>
                    </div>
               </form>
          </div>
     </div>
</body>
</html>