<?php
// start the session
session_start();
include 'config.php';

// check if the user is logged in
if(isset($_SESSION['user_id'])) {
    // get the user id from the session
    $user_id = $_SESSION['user_id'];
    
    // use the user id to retrieve the user's information from the database
    $user_query = "SELECT * FROM data WHERE id = $user_id";
    $user_result = mysqli_query($conn, $user_query);
    $user_row = mysqli_fetch_assoc($user_result);
}else{
    echo 'no found';
}
    // display the user's information in HTML and CSS
    ?>
    <html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>userProfile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />

        <style>
            .content{
                display: flex;
                align-items:center;
        
             height:80%;
            }
            .profile {
                display: flex;
                flex-direction: column;
                align-items: center;
                background-color:  #57b846;;
                padding:15px;
                height: 60vh;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                width:50%;
                margin:auto;
            }
            .profile img {
                width: 200px;
                height: 200px;
                border-radius: 50%;
                margin-bottom: 20px;
            }
            .profile h1 {
                margin-top: 0;
                margin-bottom: 10px;
            }
            .profile p {
                margin: 10px;
               
            }
            a{
                text-decoration:none;
               color:black;
               margin-top:30px;
               margin-left:85%;
            }
          
           
        </style>
    </head>
    <body>
        <div class="content">
        <div class="profile">
            <img src="images/<?php echo $user_row['image']; ?>" alt="Profile Picture"/>
            <h1><?php echo $user_row['first_name'] . ' ' . $user_row['last_name']; ?></h1>
            <p><?php echo $user_row['email']; ?></p>
           <a href="index.php">Home <i class="fas fa-home"></i></a>
        </div>
        </div>
    </body>
    </html>

