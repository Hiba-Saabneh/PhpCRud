<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Data</title>

 <!-- bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
</head>
<body>
  <div class="container mt-5">
  <?php
		// retrieve the message from the URL query string
		$msg = isset($_GET['msg']) ? $_GET['msg'] : '';

		// display the message as an alert
		if (!empty($msg)) {
			echo "<script>alert('".htmlspecialchars($msg)."');</script>";
		}
	?>
<div class="d-flex justify-content-between">
<a href='AdminInsert.php' class=' py-1 d-flex align-items-center  ' > + creat new user account</a> 
  <a href="index.php" >return to Home page > </a>
</div>
    <div class="row pt-5">
      <?php
      include 'config.php';
      
      $sql = "SELECT * FROM data";
      $result = mysqli_query($conn, $sql);

      if(mysqli_num_rows($result) > 0){
          while($row = mysqli_fetch_assoc($result)){
              ?>
              <div class="col-3 mb-4">
                <div class="card">
                  <img class="card-img-top rounded-circle mx-auto mt-4" src="images/<?php echo $row['image']; ?>" alt="Profile Image" style="width: 120px; height: 120px;">
                  <div class="card-body m-auto">
                    <h5 class="card-title "><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></h5>
                    <p class="card-text"><?php echo $row['email']; ?></p>
                    <a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Update</a>
                    <a href="delet.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delet</a>
                  </div>
                </div>
              </div>
      
          
              <?php
          }
      } else {
          echo "<p style='font-size:30px;' class='ps-5'>No records found.</p>";
        
      }
      ?>
    </div>
  </div>

 <!-- bootsrtrap -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>