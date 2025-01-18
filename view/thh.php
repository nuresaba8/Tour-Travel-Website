<?php

require_once "db_connection.php";


session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $transaction_amount = $_POST["transaction_amount"];
    if (!is_numeric($transaction_amount) || $transaction_amount <= 0) {
        $error = "Please enter a valid transaction amount.";
    } else {
       
        $_SESSION['transaction_amount'] = $transaction_amount;
        
       
        setcookie('transaction_amount', $transaction_amount, time() + (86400 * 30), "/"); // 86400 = 1 day
        
      
        header("Location: ST.php");
        exit();
    }
}

?>

<!DOCTYPE HTML>
<html>
<head>
   <title>Transaction History</title>
</head>
<body>
<fieldset style="width: 600px;">
<button name="check">Logo</button>
<hr>
<p>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <table>
      <tr>
        <td><button name="check">Transaction His</button></td> 
        <td colspan="5"><b>Transaction History:1-10 out of 100</b></td>
      </tr>
      
      <tr>
        <td><button name="check">Reservation His</button></td>
        <td><label>1.Cox's Three Days</label></td>       
        <td><label>-Trx 129AW4112</label></td>
        <td><label>-$400</label></td>
      </tr>
      
      <tr>
        <td><button name="check">View Profile</button></td>
        <td><label>2.Sajek's Two Days</label></td>
        <td><label>-Trx 129AW4112</label></td>
        <td><label>-$400</label></td>
      </tr>

      <tr>
        <td><button name="check">Edit Profile</button></td>
        <td><label>3.Chittagong Flight</label></td>
        <td><label>-Trx 129AW4112</label></td>
      </tr>
      
      <tr>
        <td><button name="check">Booking List</button></td>
        <td><label>4.Singapore Tour</label></td>
        <td><label>-Trx 129AW4112<br></label></td>
        <td><label>-$200</label></td>
      </tr>
       
      <tr>
        <td><button name="check">Change Password</button></td>
        <td><label>5.Dhaka-Chittagong Dhaka</label></td>
        <td><label>-Trx 129AW4112</label></td>
        <td><label>-$150</label></td>
      </tr>
    </table>

    <br>
    <label for="transaction_amount">Enter Transaction Amount:</label>
    <input type="text" id="transaction_amount" name="transaction_amount">
    <br>
    <input type="submit" value="Submit">
  </form>
  
  <?php
  // Display validation error if exists
  if (isset($error)) {
      echo $error;
  }
  ?>
  
</fieldset>
</body>
</html>
