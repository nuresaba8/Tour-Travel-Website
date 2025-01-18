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
    <title>HTML form</title>
    <link rel="stylesheet" href="../CSS/styleProfile.css">
</head>

<body>
    <table border="0" cellpadding="5" cellspacing="0" width="80%" align="center">
    <nav>
                <div  class="nav__logo">San Tour</div>
                <ul class="nav__links">
                    <li class="link"><a href="home1.php" > Home</a></li>
                    <li  class="link"><a href="tour.php">Tour</a></li>
                    <li  class="link"><a href="travel.php">Travel</a></li>
                    <li  class="link"><a href="about.php">About Us</a></li>
                    <?php if ($role == 'user') { ?>
                       <li class="link"> <a href="menu.php" >Menu</a></li>
                        <?php } elseif ($role == 'host') { ?>
                            <li class="link"> <a href="hostdashboard.php" >Menu</a></li>
                            <?php } else { ?>
                                <li class="link"><a href="admindashboard.php" >Menu</a></li>
                                <?php } ?> 
                              
                                    <?php
                                    if (!isset($_COOKIE['flag'])) {
                                    ?>
                                        <li class="link"><a href="login.php" >Login</a></li>
                                        <li class="link"><a href="registration.php">Signup</a></li>
                                    <?php } else { ?>
                                        <li class="link">Logged in as <a href="../view/viewprofile.php" > <?php echo $username; ?> </a></li>
                                        <li class="link"><a href="../controller/logoutCheck.php">Logout</a></li>
                                    <?php } ?>
                                
                    </ul>
        
    </nav>
        <tr>
            <td colspan="1">
                <h3>
                    Account
                </h3>
                <hr>
                <ul>
                    <li><a href="dashboard.php" class="btn">Dashboard</a></li><br><br>
                    <li><a href="viewprofile.php" class="btn">View Profile</a></li><br><br>
                    <li><a href="editprofile.php" class="btn">Edit Profile</a></li><br><br>
                    <li><a href="profilepicture.php" class="btn">Change Profile Picture</a></li><br><br>
                    <li><a href="changepassword.php" class="btn">Change Password</a></li><br><br>
                </ul>
            </td>
            <td colspan="2">
                <fieldset>
                    <legend>
                        PROFILE
                    </legend>
                    <table border="0">
                        <tr>
                            <td>
                                Name:
                            </td>
                            <td>
                                <?php echo $user['Name'] ?>
                            </td>
                            <td rowspan="5">
                                <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" alt="" height="160px" width="150px">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <hr>
                            </td>
                            <td>
                                <hr>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                Email:
                            </td>
                            <td>
                                <?php echo $user['Email'] ?>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                <hr>
                            </td>
                            <td>
                                <hr>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                Gender:
                            </td>
                            <td>
                                <?php echo $user['Gender'] ?>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                <hr>
                            </td>
                            <td>
                                <hr>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                <hr>
                            </td>
                            <td>
                                <hr>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><br>
                                <a href="editprofile.php" class="btn">Edit Profile</a><br><br><br>
                            </td>
                            <td>
                            </td>
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