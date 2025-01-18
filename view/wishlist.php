<?php
require_once('../model/userModel.php');
if (!isset($_COOKIE['flag'])) {
  header('location: ../view/login.php');
}
$username = $_COOKIE['username'];
$position = getRole($username);

?>

<html>

<head>
  <title>Wish List Page</title>
  <link rel="stylesheet" href="../css/styleAbout.css">
  <style>
    span {
      color: #789fee;
    }
  </style>
</head>

<body>
  <table border="0" align="center" width="65%" height="100%">
    <tr>
      <?php
      if ($position == 'host') { ?>
        <th colspan="6">
          <h2 align="left">SAN <span>TOUR</span></h2>
          <h3>
            Logged in as <span><?php echo $username ?> </span>
          </h3>
        </th>
      <?php } else { ?>
        <th colspan="6">
          <h2 align="left">SAN <span>TOUR</span></h2>
          <h3>
            <a href="tourCalendar.php" class="b">Tour Calendar</a>&nbsp;&nbsp;
            <a href="reservation.php" class="b">Reserve Now!</a>&nbsp;&nbsp;
            <a href="notification.php" class="b">Notification</a>&nbsp;&nbsp;
            <a href="about.php" class="b">About</a>&nbsp;&nbsp;
            Logged in as <span><?php echo $username ?> <span>
          </h3>
        </th>
      <?php } ?>
    </tr>
    <tr>
      <td colspan="4" align="center">
        <a href="../view/flight.php" class="b">
          <h2> Flight </h2>
        </a>
        <a href="../view/hotel.php" class="b">
          <h2> Hotel </h2>
        </a>
        <a href="../view/ride.php" class="b">
          <h2> Ride </h2>
        </a>
      </td>
      <td align="center">
        <img src="https://i.pinimg.com/564x/32/5b/ef/325bef0b4836250859ff3627f062ea98.jpg" alt="" height="200px" width="260px">
        <p>
        <h5>Sajek Valley is a picturesque valley located <br>in the Chittagong Hill Tracts of Bangladesh</h5>
        </p>
        <a href="../view/sajek.php">
          <h3> View more.. </h3>
        </a>
      </td>
      <td align="center">
        <img src="https://i.pinimg.com/564x/a0/57/c6/a057c616618c71bdeaeaafa0836d9b29.jpg" alt="" height="210px" width="265px">
        <p>
        <h5>This is Cox's Bazar, a beautiful tourist destination</h5>
        </p>
        <a href="../view/cox.php">
          <h3> View more.. </h3>
        </a>
      </td>
    </tr>
    <tr>
      <td colspan="4" align="center"></td>

      <td align="center">
        <img src="https://i.pinimg.com/474x/10/66/2c/10662c31e2fad40ce366fb900505d3ea.jpg" alt="" height="300px" width="260px">
        <p>
        <h5>Sylhet is a picturesque city located <br>in northeastern Bangladesh</h5>
        </p>
        <a href="../view/sylhet.php">
          <h3> View more.. </h3>
        </a>
      </td>
      <td align="center">
        <img src="https://i.pinimg.com/474x/99/64/2a/99642a7cc9d41648324be0d6392630df.jpg" alt="" height="300px" width="260px">
        <p>
        <h5>Rangamati is a beautiful hill district located <br>in the southeastern part of Bangladesh.</h5>
        </p>
        <a href="../view/rangamati.php">
          <h3> View more.. </h3>
        </a>
      </td>
    </tr>
    <tr>
      <td>
        <a href="../controller/logoutCheck.php" class="b">Log out</a>
      </td>
    </tr>
    <tr>
      <td colspan="6" align="center" height="50px">Copyright © 2024. SAN Tour. All rights reserved</td>
    </tr>
  </table>
</body>

</html>