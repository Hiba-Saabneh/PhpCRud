
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
    <!-- sweet alert  css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
</head>


<body class='body2'>
<div class='content d-flex  align-items-center  justify-content-center p-5 '>   
<div class=' reg  d-flex   rounded-3'>
<div class='fir-sec w-75 h-100  rounded-start'>
 <h2 class='w p-4 ms-4 '>INFOMATION</h2>
 <p class='w-75 ms-5 fs-6'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Et molestie ac feugiat sed. Diam volutpat commodo.</p>
 <p class='w-75 ms-5 fs-6 pt-3 mb-5'> <span class='fw-bolder'> Eu ultrices:</span>  Vitae auctor eu augue ut. Malesuada nunc vel risus commodo viverra. Praesent elementum facilisis leo vel.</p>
 <a href='index.php' class="btn2 rounded-2  border-0 py-2 px-2 bg-white ms-5 ">Have an Account</a>

</div>

<div class='sec-sec w-100 h-100  rounded-end '>
<h2 class='h p-4 ms-4  '>REGISTER FORM</h2>
<form action='' method='POST' class='ms-5'  enctype="multipart/form-data" >
    <label for="f-name" class="form-label ">First name</label>
    <input type="text"  name="first_name"  class="form-control w-75 my-2" id="f-name" ">
    <label for="l-name" class="form-label ">last name</label>
    <input type="text" name="last_name" class="form-control  w-75 my-2" id="l-name" >
    <label for="email" class="form-label ">Email</label>
    <input type="email" name="email" class="form-control  w-75 my-2" id="email" >
    <label for="pass" class="form-label ">password</label>
    <input type="password" name="password" class="form-control  w-75 mt-2 mb-4" id="pass" >
    <label for="myfile">Select image:</label>
  <input type="file" id="myfile" name="img" ><br><br>

    <button type="submit" name='submit' class="btn rounded-2  text-white">Submit</button>
</form>

</div> 
</div>
</div>
<!-- bootstrap script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

<!-- Link to jQuery and SweetAlert JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

<!-- php user insert code -->
<?php
    include 'config.php';

    if(isset($_POST['submit'])){

        //the path to store images
        $target_path = "images/";

        //get the form data
        $firstname = $_POST['first_name'];
        $lastname = $_POST['last_name'];
        $email = $_POST['email'];
        $pasword = $_POST['password'];
        $image = $_FILES['img']['name'];
    
        // Check for empty inputs
        if(empty($firstname) || empty($lastname) || empty($email) || empty($pasword) || empty($image)){
            echo "<script>swal('Error!', 'Please fill in all fields.', 'error');</script>";
        } elseif(!preg_match('/^(?=.*\d)(?=.*[a-zA-Z]).{8}$/', $pasword)){
            echo "<script>swal('Error!', 'Password must contain 8 characters of both numbers and letters.', 'error');</script>";
        } else {
            // Check for duplicate email
            $sql_check_email = "SELECT * FROM data WHERE email = '$email'";
            $result_check_email = mysqli_query($conn, $sql_check_email);
            if(mysqli_num_rows($result_check_email) > 0){
                echo "<script>swal('Error!', 'Email already exists.', 'error');</script>";
            } else {
                $enc_password=md5($pasword);
                $sql = "INSERT INTO `data` (`id`, `first_name`, `last_name`, `email`, `password`, `image`) 
                VALUES (NULL, '$firstname', '$lastname', '$email', '$enc_password', '$image')";

                move_uploaded_file($_FILES['img']['tmp_name'], $target_path . $_FILES['img']['name']);

                $result = mysqli_query($conn, $sql);
                if($result){
                    echo "<script>swal('Success!', 'Data has been saved successfully.', 'success');</script>";
                } else {
                    echo "<script>swal('Error!', 'There was a problem in saving the data.', 'error');</script>";
                }
            }
        }
    }
?>
</body>

</html>
