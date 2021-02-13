<?php session_start();
     require_once('functions.php');

     if(user_logged_in()){
          header('location: chat.php');
     }

     if(isset($_POST['register'])){
          $fname = $_POST['fname'];
          $lname = $_POST['lname'];
          $email = $_POST['email'];
          $password = $_POST['password'];
          $error = array();



          if($fname == null){
               $error['fname'] = 'First name is blank';
          }

          if($lname == null){
               $error['lname'] = 'Last name is blank';
          }

          if($email == null){
               $error['email'] = 'Email address is blank';
          }


          if(!$email == null && !filter_var($email, FILTER_VALIDATE_EMAIL)){
               $error['email'] = "Email is invalid";
          }
          if(email_exits()){
               $error['email'] = 'This email is already taken. Please try another.';
          }

          if($password == null){
               $error['password'] = 'Password is blank';
          }


          if($password != null && strlen($password) <= 5){
               $error['password'] = 'Your password should be at least 5 character long!';
          }


          if(count($error) == 0){
               $query = mysqli_query($connection, "INSERT INTO users (fname, lname, email, password) VALUES('$fname', '$lname', '$email', '$password')");

               if($query){
                    echo $success = "Your registration is successfully done!";
               }

          }else{
                    
               if(isset($error['fname'])){ echo "<p class='error'>".$error['fname'].'</p>';}
               if(isset($error['lname'])){ echo "<p class='error'>".$error['lname'].'</p>';}
               if(isset($error['email'])){ echo "<p class='error'>".$error['email'].'</p>';}
               if(isset($error['password'])){ echo "<p class='error'>".$error['password'].'</p>';}
          };
          die();

     }




     // if(isset($_POST['register'])){
     //      $fname = $_POST['fname'];
     //      $lname = $_POST['lname'];
     //      $email = $_POST['email'];
     //      $password = $_POST['password'];

     //      $query = $connection->query("INSERT INTO users (fname, lname, email, password) VALUES ('$fname', '$lname', '$email', '$password')");

     //      if($query){
     //           echo 'Your registation is succesfull!';
     //      };
     //      die();
     // };


     // $fname = $_POST['fname'];
     // $lname = $_POST['lname'];
     // $email = $_POST['email'];
     // $password = $_POST['password'];
     // $connection->query("INSERT INTO users (fname, lname, email, password) VALUES ('$fname', '$lname', '$email', '$password')");
     #if(isset($_POST['register'])){
          ?>
          <!-- <h1 style='text-align:center;'>Please register</h1>
               <form action="" method='post' class='userregistation' >
                    <input class='input'  type="text" name=" fname" placeholder = 'First name'>
                    <input class='input'  type="text" name="lname" placeholder = 'Last name'>
                    <input class='input'  type="email" name="email" placeholder = 'Your email'>
                    <input class='input'  type="password" name="password" placeholder = 'Password'>
                    <input type="submit" value="Register" name='register' ><br>
                    Already have an account? Please <a class='login' href="login.php">login.</a>
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
     <title>Registation</title>
     <link rel="stylesheet" href="style.css">
     <script src="js/jquery.js"></script>
     <script src="js/script.js"></script>
</head>
<body>
     <div class="container">
          <div class="box">
               <h1 style='text-align:center;'>Please register</h1>
               <form action="" method='post' class='userregistation' >
                    <input class='input'  type="text" name="fname" placeholder = 'First name'>
                    <input class='input'  type="text" name="lname" placeholder = 'Last name'>
                    <input class='input'  type="email" name="email" placeholder = 'Your email'>
                    <input class='input'  type="password" name="password" placeholder = 'Password'>
                    <input type="submit" value="Register" name='register' ><br>
                    Already have an account? Please <a class='login' href="login.php">login.</a>
               </form>
               <p class="success"></p>
          </div>
     </div>
</body>
</html>