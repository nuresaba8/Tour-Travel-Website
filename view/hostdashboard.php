<?php
require_once('../model/userModel.php');
if (!isset($_COOKIE['flag'])) {
    header('location: login.php');
}
$username = $_COOKIE['username'];
$role = getRole($username);
$user = getByUser($username);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Host Dashboard</title>
    <link rel="stylesheet" href="../css/styleHome1.css">
</head>

<body>
    <table border="1" cellpadding="6" cellspacing="0" width="80%" align="center">
        <tr>
            <th colspan="3">
                <h2 align="left">SAN <span> TOUR</span> </h2>
                <h3>
                    <a href="home1.php" class="btn">Home</a>&nbsp;&nbsp;
                    <a href="tour.php" class="btn">Tour</a>&nbsp;&nbsp;
                    <a href="travel.php" class="btn">Travel</a>&nbsp;&nbsp;
                    <?php if ($role == 'user') { ?>
                        <a href="dashboard.php" class="btn">
                        <?php } elseif ($role == 'host') { ?>
                            <a href="hostdashboard.php" class="btn">
                            <?php } else { ?>
                                <a href="admindashboard.php" class="btn">
                                <?php } ?> Menu</a>&nbsp;&nbsp;
                                <span style="float: right">
                                    Logged in as <a href="../view/viewprofile.php" class="btn"> <?php echo $username; ?> </a>&nbsp;&nbsp;
                                    <a href="../controller/logoutCheck.php" class="btn">Logout</a>
                                </span>
                </h3>
            </th>
        </tr>
        <tr>
            <td>
                <a href="availabilityCalendar.php" class="btn">Available Calender</a><br><br><br>
                <a href="bookinglistadmin.php" class="btn">Booking List History</a><br><br><br>
                <a href="../view/about.php" class="btn">About Us</a>
            </td>
        </tr>
        <div class="ht">
            Copyright © 2024. SAN Tour. All rights reserved
        </div>
    </table>
</body>

</html>