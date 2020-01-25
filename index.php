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
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>To Do List</title>

  <!--Font Awesome Link-->
  <link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet" />

  <!-- Bootstrap CDN -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <!-- Style Sheet -->
  <link rel="stylesheet" href="../css/style" />
</head>

<body>
  <div class="container">
<?php
    if(isset($_POST['submit'])){
      //getting the text data from the fields
      $use_name = $_POST['username'];
      $use_email = $_POST['useremail'];
    
      $insert_user = "INSERT INTO users(user_name,user_email) VALUES(' $use_name','$use_email')";
      $insert_user = mysqli_query($con, $insert_user);

      if($insert_user)
			{
				echo "<script>alert('User Has been inserted!')</script>";
			}
			if (mysqli_connect_errno())
			{
				echo "The Connection was not established: " . mysqli_connect_error();
			}
    }
?>

    <h2>Add Users</h2>
    <form action="index.php" class="py-4" method="POST">
      <div class="row">
        <div class="col">
          <input type="text" name="username" class="form-control" placeholder="Username" require />
        </div>
        <div class="col">
          <input type="text" name="useremail" class="form-control" placeholder="Email" require />
        </div>
        <div class="col">
          <input type="Submit" name="submit" class="form-control btn btn-secondary" />
        </div>
      </div>
    </form>
  </div>
  <div class="container">
    <h2>All Users</h2>
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">UserName</th>
          <th scope="col">Email</th>
          <th scope="col">Edit</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>


<?php
      global $con; 
      $get_user = "SELECT * FROM users";
      $run_user = mysqli_query($con, $get_user);
      
      while ($row_user = mysqli_fetch_array($run_user))
      {
        $use_id = $row_user['user_id']; 
        $user_name = $row_user['user_name'];
        $user_email = $row_user['user_email'];
  
        echo"<tr>
        <th> $use_id</th>
        <th> $user_name</th>
        <th> $user_email</th>
        <th>
          <a href='edit.php?mark_user=$use_id' class='btn btn-success text-light'><i class='fas fa-edit'></i> Edit</a>
        </th>
        <th>
          <a  href='index.php?delete_user=$use_id' class='btn btn-danger text-light'><i class='fas fa-trash-alt'></i> Delete </a>
        </th>
        </tr>";
      }
?>

<?php 
					if(isset($_GET['delete_user']))
					{
              $remove_id = $_GET['delete_user'];
							$delete_user = "DELETE FROM users WHERE user_id = $remove_id";
							$run_delete = mysqli_query($con, $delete_user); 
							
							if($run_delete)
							{
								echo "<script>alert('User has been deleted!')</script>";
								echo "<script>window.open('index.php','_self')</script>";
							}
					}			
?>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
</body>

</html>