<?php
require_once('../model/userModel.php');
if (!isset($_COOKIE['flag'])) {
    header('location: login.php');
}
$username = $_COOKIE['username'];
$role = getRole($username);

$user = getByUser($username);
?>

<html>

<head>
    <title>Booking List</title>
    <link rel="stylesheet" href="../CSS/styleHome1.css">
</head>

<body>
    <table border="1" cellpadding="0" cellspacing="0" width="80%" height="60%" align="center">
        <tr>
            <th colspan="4">
                <h2 align="left">SAN TOUR</h2>
                <h3>
                    <a href="home.php" class="btn">Home</a>&nbsp;&nbsp;
                    <a href="tour.php" class="btn">Tour</a>&nbsp;&nbsp;
                    <a href="travel.php" class="btn">Travel</a>&nbsp;&nbsp;
                    <?php if ($role == 'user') { ?>
                        <a href="dashboard.php" class="btn">
                        <?php } elseif ($role == 'host') { ?>
                            <a href="hostdashboard.php" class="btn">
                            <?php } else { ?>
                                <a href="admindashboard.php" class="btn">
                                <?php } ?> Menu</a>
                                <span style="float: right">
                                    Logged in as <a href="../view/viewprofile.php"> <?php echo $username; ?> </a>&nbsp;&nbsp;
                                    <a href="../controller/logoutCheck.php" class="btn">Logout</a>
                                </span>
                </h3>
            </th>
        </tr>
        <tr>
            <th colspan="4" align="center">Booking History</th><br><br>
        </tr>


        <tr>
            <td align="center">Session date & time</td>
            <td align="center">Service</td>
            <td align="center">Payment Status</td>
            <td align="center">Booking Status</td>
        </tr>
        <tr>
            <td align="center">12-02-24 3:00PM</td>
            <td align="center">Cox's Bazar</td>
            <td align="center">Paid</td>
            <td align="center">Confirmed <a href="cancellation.php"><button class="btn">Cancel</button></a></td>
        </tr>
        <tr>
            <td align="center">22-03-24 11:30PM</td>
            <td align="center">Sylhet</td>
            <td align="center">Redeem Session</td>
            <td align="center">Confirmed <a href="customer_feedback.php"> <button class="btn">Review</button></a></td>
        </tr>
        <tr>
            <td align="center">02-11-24 3:00PM</td>
            <td align="center">Rangamati</td>
            <td align="center">Pending <a href="payment.php"> <button class="btn">Pay</button></a></td>
            <td align="center">Pending </td>
        </tr>
        <tr>
            <td align="center">17-10-24 9:30PM</td>
            <td align="center">Sajek</td>
            <td align="center">Failed</td>
            <td align="center">Failed</td>
        </tr>
        <tr>
            <td colspan="4" align="center" height="50px">Copyright © 2024. SAN Tour. All rights reserved</td>
        </tr>
    </table>
</body>

</html>