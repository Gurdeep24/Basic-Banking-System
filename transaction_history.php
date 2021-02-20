<html>
	<head>
		<title>Transaction History</title>
    <link rel="icon" href="bank.png" type="image/gif" sizes="16x16">
        <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

		<link rel="stylesheet" type="text/css" href="style.css">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	</head>
  
   <body>
  
   <div class="topnav" id="myTopnav">
  <a href="index.php" >Home</a>
  <a href="create_user.php">Create an User</a>
  <a href="customer.php">View All Customers</a>
  <a href="transfer_money.php">Transfer Money</a>
  <a href="transaction_history.php" class="active">Transaction History</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>

	<?php
        // compares values entered in login page form with mySQL database, and then directs either to protected page or to a failure page
$link = mysqli_connect ('localhost', 'root','', 'bank');
        $query="SELECT * from transaction";
	    $run=mysqli_query($link,$query);
	    echo "<div class='container'>";
            echo "<div class='thumbnail'>";
                echo "<table class='table table-dark'>";
                    echo "<tr>";
                    echo "<th>Sender</th>";
                    echo "<th>Receiver</th>";
                    echo "<th>Amount</th>";
                    echo "<th>Time</th>";

                    if($run==true){
                        while($data=mysqli_fetch_array($run)){
                            echo "<tr>";
                            echo "<td>" . $data['Sender'] . "</td>";
                            echo "<td>" . $data['Receiver'] . "</td>";
                            echo "<td>" . $data['Amount'] . "</td>";
                            echo "<td>" . $data['Time'] . "</td>";

                            echo "</tr>";

                        }
                    }
                echo "</table>";
            echo "</div>";
	    echo "</div>";
    session_write_close();
    ?>
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