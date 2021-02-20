<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>  
    <link rel="icon" href="bank.png" type="image/gif" sizes="16x16">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    
    <style>
  img {
    max-width: 100%;
    height: auto;
  }
</style>
</head>

<body>

<div class="topnav" id="myTopnav">
  <a href="index.php" class="active">Home</a>
  <a href="create_user.php">Create an User</a>
  <a href="customer.php">View All Customers</a>
  <a href="transfer_money.php">Transfer Money</a>
  <a href="transaction_history.php">Transaction History</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
  
</div>
<marquee width="70%" direction="left" height="60px" scrollamount="12" >
<h1>Welcome to the Basic Banking System...</h1>
</marquee>
    <img src="image.jpg"  width="1500px">
    
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