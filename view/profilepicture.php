<?php
require_once('../model/userModel.php');
if (!isset($_COOKIE['flag'])) {
    header('location: login.php');
}
$username = $_COOKIE['username'];
$role = getRole($username);
?>

<html>

<head>
    <title>HTML form</title>
    <link rel="stylesheet" href="../CSS/styleHome1.css">
</head>

<body>
    <table border="1" cellpadding="5" cellspacing="0" width="80%" align="center">
        <tr>
            <th colspan="3">
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
            <td>
                <h3>
                    Account
                </h3>
                <hr>
                <ul>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="viewprofile.php">View Profile</a></li>
                    <li><a href="editprofile.php">Edit Profile</a></li>
                    <li><a href="profilepicture.php">Change Profile Picture</a></li>
                    <li><a href="changepassword.php">Change Password</a></li>
                    <li><a href="logoutCheck.php">Logout</a></li>
                </ul>
            </td>
            <td colspan="2">
                <fieldset>
                    <legend>
                        PROFILE PICTURE
                    </legend>
                    <table border="0">
                        <tr>
                            <td>
                                <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" alt="" height="160px" width="150px">
                            </td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                <form method="POST" action="../controller/ppUpload.php" enctype="multipart/form-data">
                                    <input type="file" name="myfile" value="" />
                                    <hr>
                                    <input type="submit" name="Submit" value="Submit" />
                                </form>
                            </td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                </fieldset>
            </td>
        </tr>
        <tr>
            <td colspan="3" align="center" height="50px">Copyright © 2024. SAN Tour. All rights reserved</td>
        </tr>
    </table>
</body>

</html>