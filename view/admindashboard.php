<?php
#require_once('../model/userModel.php');
if (!isset($_COOKIE['flag'])) {
    header('location: login.php');
}
$username = $_COOKIE['username'];
?>

<html>

<head>
    <title>Admin Dashdoard</title>
    <link rel="stylesheet" href="../css/styleHome1.css">
</head>

<body>
    <table border="1" cellpadding="6" cellspacing="0" width="80%" align="center">
        <tr>
            <th colspan="3">
                <h2 align="left">SAN <span> TOUR</span> Admin</h2>
                <h3 align="left">
                    <a href="home1.php" class="btn">Home</a>&nbsp;&nbsp;
                    <a href="tour.php" class="btn">Tour</a>&nbsp;&nbsp;
                    <a href="travel.php" class="btn">Travel Information</a>&nbsp;&nbsp;
                    <a href="admindashboard.php" class="btn">Menu</a>&nbsp;&nbsp;

                    Logged in as <a href="../view/viewprofile.php" class="btn"> <?php echo $username; ?> </a>&nbsp;&nbsp;
                    <a href="../controller/logoutCheck.php" class="btn">Logout</a>

                </h3>
            </th>
        </tr>
        <tr>
            <td><br>
                <a href="usermanagement.php" class="btn">Userlist</a><br><br><br><br>
                <a href="hostmanagement.php" class="btn">Hostlist</a><br><br><br><br>
                <a href="transactionHistory.php" class="btn">Transaction History</a><br><br><br><br>
                <a href="bookinglistadmin.php" class="btn">Booking List History</a><br><br><br><br>
            </td>
        </tr>
        <div class="ht">
            Copyright © 2024. SAN Tour. All rights reserved
        </div>
    </table>

</body>

</html>