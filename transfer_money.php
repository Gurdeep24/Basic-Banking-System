<html>
    <head>
        <title>Transfer Money</title>
        <link rel="icon" href="bank.png" type="image/gif" sizes="16x16">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
   
			
	<body>	 
    <div class="topnav" id="myTopnav">
  <a href="index.php" >Home</a>
  <a href="create_user.php">Create an User</a>
  <a href="customer.php">View All Customers</a>
  <a href="transfer_money.php" class="active">Transfer Money</a>
  <a href="transaction_history.php">Transaction History</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>  
<script>
    function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
    x.className += " responsive";
    }
    else {
    x.className = "topnav";
  }
}
</script>
            <div class="container mt-3">
            <h1>Fill Out the Details</h1>
            <h4>If You are not a User, First Create Your Account</h4>
                <form action="" method="POST">
                    <div class="form-group">
                        <label>Sender's Account Number:</label>
                        <input type="int" class="form-control" name="Sender" placeholder="Enter Sender's Account number" autofocus>
                    </div>
                    <div class="form-group">
                        <label>Receiver's Account Number:</label>
                        <input type="int" class="form-control" name="Receiver" placeholder="Enter Receiver's Account number">
                    </div>
                    <div class="form-group">
                        <label>Amount</label>
                        <input type="int" class="form-control" name="Amount" placeholder="Enter Amount">
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="transfer" onclick="alert('Submitted!')">Transfer</button>
                    </div>
                </form>
            </div>
        
    </body>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</html>
<?php
$link = mysqli_connect ('localhost', 'root','', 'bank');
if(isset($_POST['transfer']))
{
    $from = $_POST['Sender'];
    $to = $_POST['Receiver'];
    $amount = $_POST['Amount'];
    if (($from == NULL)){
        echo '<script type="text/javascript">';
        echo ' alert("Transaction not Done!!!!You Have Not Enter the Sender Account Number")';
        echo '</script>';
        exit;
    }
    if (($to == NULL)){
        echo '<script type="text/javascript">';
        echo ' alert("Transaction not Done!!!!You Have Not Enter the Receiver Account Number")';
        echo '</script>';
        exit;
    }
    
    if(($amount==NULL)){
        echo '<script type="text/javascript">';
        echo 'alert("Oops! Please Enter the Amount")';
        echo '</script>';
        exit;
        
    }
    $sql = "SELECT * from user where UserId=$from";        
    $query = mysqli_query($link,$sql);
    // returns output of user from which the amount is to be transferred.
    $sql1 = mysqli_fetch_array($query);
    

    $sql = "SELECT * from user where UserId=$to";
    $query = mysqli_query($link,$sql);        
    $sql2 = mysqli_fetch_array($query);
    
    
   
     // check input of negative value by user
    if (($amount)<0)
    {
        echo '<script type="text/javascript">';
        echo 'alert("Oops! Negative values cannot be transferred")';
        echo '</script>';
    }

    // constraint to check zero values
    else if($amount == 0)
    {
        echo "<script type='text/javascript'>";
        echo "alert('Zero value cannot be transferred, Amount will be remained same!')";
        echo "</script>";
    }
    
    // check insufficient balance.
    else if($amount > $sql1['Amount'])
    {
        echo '<script type="text/javascript">';
        echo 'alert("Insufficient Balance")';  // showing an alert box.
        echo '</script>';
    }
    
    else 
    {
       
        
        // subtract amount from sender's account
        $newbalance = $sql1['Amount'] - $amount;
        $sql = "UPDATE user set Amount=$newbalance where UserId=$from";
        mysqli_query($link,$sql);


        // adding amount to reciever's account
        $newbalance = $sql2['Amount'] + $amount;
        $sql = "UPDATE users set Amount=$newbalance where UserId=$to";
        mysqli_query($link,$sql);

        $sender = $sql1['Username'];
        $receiver = $sql2['Username'];
        $sql = "INSERT INTO transaction(`Sender`, `Receiver`, `Amount`) VALUES ('$sender','$receiver','$amount')";
        $query=mysqli_query($link,$sql);

        if($query)
        {
        echo "<script> alert('Transaction Successful');
        </script>";                    
        }

        $newbalance= 0;
        $amount =0;
    }

}
?>
<?php include "footer.php"?>