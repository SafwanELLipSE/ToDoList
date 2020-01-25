<?php 
// After uploading to online server, change this connection accordingly
$con = mysqli_connect("localhost","root","","project1");

if (mysqli_connect_errno())
  {
	echo "The Connection was not established: " . mysqli_connect_error();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To Dd List | Edit User</title>

        <!--Font Awesome Link-->
    <link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- Style Sheet -->
    <link rel="stylesheet" href="./css/style" />
</head>
<body>
    <div class="container">
        <form action="" class="py-4" method="POST">
            <h2 class="mt-5">Edit User</h2>
            <div class="row pt-5">
                <div class=" col form-group">
                  <label >User Name</label>
                  <input type="text" name="use_name" class="form-control" placeholder="New User Name" required>
                </div>
                <div class="col form-group">
                  <label>User Email</label>
                  <input type="text" name="use_email" class="form-control" placeholder="New User Email" required>
                </div>
            </div>
            <?php
                if(isset($_GET['mark_user'])){  
                  $get_id = $_GET['mark_user'];
            ?>
            <div class="row float-right mr-4">
              <button type="submit" name="edit_user" class="btn btn-success text-light mr-3"><i class="fas fa-check"></i> Submit</button>
              <a href="index.php" class="btn btn-danger text-light mr-5"><i class="fas fa-times"></i> Back</a>
            </div>
            <?php
                }
            ?>
        </form>
    </div>
    
    <?php 
  
  
	if(isset($_POST['edit_user'])){
	
		$update_id = $get_id;
		
    $user_name = $_POST['use_name'];
    $user_email = $_POST['use_email'];

		$update_user = "UPDATE users SET user_name='$user_name', user_email='$user_email', user_id='$update_id' WHERE user_id=$update_id";
		$run_user = mysqli_query($con, $update_user);
		
		if($run_user)
		{
      echo "<script>alert('User has been updated!')</script>";
      echo "<script>window.open('index.php','_self')</script>";
		}
	}
?>	
</body>
</html>