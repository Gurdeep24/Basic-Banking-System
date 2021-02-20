<!doctype html>
<html lang="en">
  <head>
    <title>Create User</title>
    <link rel="icon" href="bank.png" type="image/gif" sizes="16x16">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  </head>
  <body>
  <div class="topnav" id="myTopnav">
  <a href="index.php" >Home</a>
  <a href="create_user.php" class="active">Create an User</a>
  <a href="customer.php">View All Customers</a>
  <a href="transfer_money.php">Transfer Money</a>
  <a href="transaction_history.php">Transaction History</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $userid = $_POST['UserId'];
    $usernam = $_POST['Username'];
    $email = $_POST['Email'];
    $amount = $_POST['Amount'];
    
  
  // Connecting to the Database
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "bank";

  // Create a connection
  $conn = mysqli_connect($servername, $username, $password, $database);
  // Die if connection was not successful
  if (!$conn){
      die("Sorry we failed to connect: ". mysqli_connect_error());
  }
  else{ 
    // Submit these to a database
    // Sql query to be executed 
    $sql = "INSERT INTO `user` (`UserId`, `Username`, `Email`, `Amount`) VALUES ($userid, '$usernam', '$email', $amount)";
    $result = mysqli_query($conn, $sql);

if($result){
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!</strong> Your entry has been submitted successfully!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>';
}
else{
        // echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Error!</strong> We are facing some technical issue and your entry was not submitted successfully! We regret the inconvinience caused!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>';
    }
}
}
?>

<div class="container mt-3">
<h1>Fill Out the Details</h1>
<form action="" method="POST">
                    <div class="form-group">
                        <label>Customer Account Number:</label>
                        <input type="text" class="form-control" name="UserId" placeholder="Enter Account number" autofocus>
                    </div>
                    <div class="form-group">
                        <label>Customer Name:</label>
                        <input type="text" class="form-control" name="Username" placeholder="Enter username">
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="email" class="form-control" name="Email" placeholder="Enter user email id.   Note!! Email must be in @.... format">
                    </div>
                    <div class="form-group">
                        <label>Amount:</label>
                        <input type="number" class="form-control" name="Amount" placeholder="Enter amount to deposit">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="submit" onclick="alert('Submitted!')">Submit</button>
                    </div>
                </form>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <?php include "footer.php"?>
    <script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
  </body>
</html>

