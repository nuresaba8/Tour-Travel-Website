<?php
if (!isset($_COOKIE['flag'])) {
    header('location: login.php');
}
$username = $_COOKIE['username'];
?>

<html>

<head>
    <title>Document</title>
    <<link rel="stylesheet" href="../CSS/styleHome1.css">
</head>

<body>
    <table border="0" cellpadding="6" cellspacing="0" width="60%" align="center">
        <tr>
            <td colspan="4">
                <h2 align="left" class="logo"><span>S</span>an <span>To</span>ur</h2>
                <h3>
                    <a href="home1.php" class="btn">Home</a>&nbsp;&nbsp;
                    <a href="tour.php" class="btn">Tour</a>&nbsp;&nbsp;
                    <a href="travel.php" class="btn">Travel</a>&nbsp;&nbsp;
                    <a href="dashboard.php" class="btn">Menu</a>
                    <span style="float: right">
                        Logged in as <a href="../view/viewprofile.php" > <?php echo $username; ?> </a>&nbsp;&nbsp;
                        <a href="../controller/logoutCheck.php" class="btn">Logout</a>
                    </span>
                </h3>
            </td>
        </tr>
        <tr>
            <td align='left' colspan="2">
                <p>Username: <?php echo $username; ?> </p>
            </td>
            <td align='right' colspan="2">

                <p style="color:blue;">Points: 100 Points</p>
            </td>
        </tr>
        <tr align='left'>
            <td colspan="2">
                <a a href=" notification.php" class="btn">Notification</a><br><br>
                <a a href="wishlist.php" class="btn"> Wishlist</a><br><br>
                <a a href="transactionHistory.php" class="btn">Transaction History</a><br><br>
                <a href="bookinglist.php" class="btn">Booking list</a><br><br>
                <a href="viewprofile.php" class="btn">View Profile</a><br>
            </td>
            <td colspan="2">
                <label style="font-weight: bold; color: blue;">Upcoming Tour</label>
                <p>Sajek on 21st April</p>
                <label style="font-weight: bold; color: red;">Pending Payment</label>
                <p>Booking money is due for Sajek tour on 21st April</p>
            </td>

        </tr>
        <div class="ht">
            <h3>Copyright © 2024. SAN Tour. All rights reserved</h3>
        </div>

    </table>

</body>

</html>