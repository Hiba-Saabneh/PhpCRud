<?php
session_start();
include 'config.php';


// Login form submission
if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    // Check if user is a regular user
    $user_query = "SELECT * FROM data WHERE email='$email' AND password='$password'";
    $user_result = mysqli_query($conn, $user_query);
    
    if(mysqli_num_rows($user_result) == 1) {
        $user_row = mysqli_fetch_assoc($user_result);
        $_SESSION['user_id'] = $user_row['id'];
        $_SESSION['user_type'] = 'user';
        echo'is found';
        header('Location: userProf.php');
        exit;
    }

    // Check if user is an admin
    $admin_query = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
    $admin_result = mysqli_query($conn, $admin_query);

    if(mysqli_num_rows($admin_result) == 1) {
        $admin_row = mysqli_fetch_assoc($admin_result);
        $_SESSION['admin_id'] = $admin_row['id'];
        $_SESSION['user_type'] = 'admin';
        header('Location: view.php');
        exit;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebProject</title>

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- css -->
    <link rel="stylesheet" href="style.css">
</head>
<body class='body1'>
<div class='container d-flex '>
    <div class='img1 d-flex  align-items-center  w-50 justify-content-center'>
        <img src="img/user.webp" alt="">

    </div>


 <div class='d-flex  align-items-center  w-50 justify-content-center  h-75 ms-5  '>
    <div class='w-75'>
 <h1 class='ms-2 fs-2'> Member Login</h1>

 <form action="" method='POST' enctype="multipart/form-data">
  <input type='email' name='email' placeholder='Email' class='in1 form-control w-100 mt-5 p-2 border border-light rounded-pill'/>
  <input type='password' name='password' placeholder='PassWord' class='in1 form-control w-100 mt-2 p-2 border border-light rounded-pill' />
  <input type='submit' name='submit' value='login' class='s1 w-100 mt-4 p-2 border border-light rounded-pill' />
  </form>

  <h3 class='forget ms-2  mt-3 mb-5'>Forgot Username / Password?</h3>
<a href="register.php" class='ps-2 ' >Create your Account Now :D </a>
  </div>
  </div>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</body>
</html>