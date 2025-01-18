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
    <title>Cancellation</title>
    <link rel="stylesheet" href="../CSS/styleHome1.css">
</head>

<body>
    <table border="1" cellpadding="0" cellspacing="0" width="80%" height="50%%" align="center">
        <tr>
            <th colspan="4">
                <h2 align="left">SAN TOUR</h2>
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
                                <?php } ?> Menu</a>
                                <span style="float: right">
                                    Logged in as <a href="../view/viewprofile.php"> <?php echo $username; ?> </a>&nbsp;&nbsp;
                                    <a href="../controller/logoutCheck.php" class="btn">Logout</a>
                                </span>
                </h3>
            </th>
        </tr>
        <tr>
            <td align="center">Service</td>
            <td align="center">Session date & time</td>
            <td align="center">Payment Id</td>
            <td align="center">Amount</td>
        </tr>
        <tr>
            <td align="center"><label>1.Cox's Three Days</label></td>
            <td align="center">12-02-24 3:00PM</td>
            <td align="center"><label>Trx 129AW4112</label></td>
            <td align="center"><label>$400</label></td>
        </tr>

        <tr>
            <td align="center"><label>2.Sajek's Two Days</label></td>
            <td align="center">12-02-24 3:00PM</td>
            <td align="center"><label>Trx 129AW4112</label></td>
            <td align="center"><label>$400</label></td>
        </tr>

        <tr>
            <td align="center"><label>3.Chittagong Flight</label></td>
            <td align="center">12-02-24 3:00PM</td>
            <td align="center"><label>Trx 129AW4112</label></td>
            <td align="center"><label>$200</label></td>
        </tr>

        <tr>
            <td align="center"><label>4.Singapore Tour</label></td>
            <td align="center">12-02-24 3:00PM</td>
            <td align="center"><label>Trx 129AW4112<br></label></td>
            <td align="center"><label>$200</label></td>
        </tr>

        <tr>
            <td align="center"><label>5.Dhaka-Chittagong Dhaka</label></td>
            <td align="center">12-02-24 3:00PM</td>
            <td align="center"><label>Trx 129AW4112</label></td>
            <td align="center"><label>$150</label></td>
        </tr>
        <tr>
            <td colspan="4" align="center" height="50px">Copyright © 2024. SAN Tour. All rights reserved</td>
        </tr>
    </table>

</body>

</html>