<?php

@include 'config.php';
require_once 'user_class.php';

session_start();

if(isset($_POST['submit'])){
   $email = $_POST['email'];
   $password = md5($_POST['password']);

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$password' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
      $row = mysqli_fetch_array($result);

      $user = new UserForm($row['name'], $row['email']);
      $user->setpassword($row['password']);

      $user->login($email, $password);

      if($row['user_type'] == 'admin'){
         $_SESSION['admin_name'] = $row['name'];
         header('location:admin_page.php');
      }elseif($row['user_type'] == 'user'){
         $_SESSION['user_name'] = $row['name'];
         header('location:user_page.php');
      }
   }else{
      $error[] = 'Incorrect email or password!';
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login form</title>
   <style> 
footer {
  color: #333;
  padding: 20px;
  text-align: center;
}

</style>

   <!-- Custom CSS file link -->
   <link rel="stylesheet" href="css/style.css">
   <style>
      header {
         padding: 20px;
         display: flex;
         justify-content: center;
         align-items: center;
      }
   </style>
</head>
<body>
   <header>
      <h1>Login</h1>
   </header>

   <div class="form-container">
      <form action="" method="post">
         <?php
         if(isset($error)){
            foreach($error as $error){
               echo '<span class="error-msg">'.$error.'</span>';
            }
         }
         ?>
         <input type="email" name="email" required placeholder="Enter your email">
         <input type="password" name="password" required placeholder="Enter your password">
         <input type="submit" name="submit" value="Login" class="form-btn">
         <p>Don't have an account? <a href="register_form.php">Register</a></p>
      </form>
   </div>

   <div>
    <footer>
    <p>حقوق الطبع والنشر &copy; <?php echo date('Y'); ?> </p>
    </footer>
</div>
</body>
</html>
