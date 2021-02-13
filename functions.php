<?php 
     require('config.php');

     function email_exits(){
          global $connection;
          global $email;
          global $query;

          $query = $connection->query("SELECT * FROM users where email = '$email'");
          
          if(mysqli_num_rows($query) == 1){
               return true;
          }
     }

     function password_exits(){
          global $password;
          global $query;
          global $row;

          $row = mysqli_fetch_object($query);
          if($row->password == $password){
               return true;
          }
     }

     function user_logged_in(){
          if(isset($_SESSION['success'])){
               return true;
          }
     }
