<?php
require_once('../model/userModel.php');
if (!isset($_COOKIE['flag'])) {
    header('location: ../view/login.php');
}

$username = $_COOKIE['username'];

$role = getRole($username);
$users = getUser('user');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>User Management</title>
    <link rel="stylesheet" href="../css/styleHome1.css">
</head>

<body>

    <form method="post" action="" enctype="">

        <table border="1" align="center" cellpadding="5" cellspacing="0" width="80%">

            <tr>
                <th colspan="6">
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
                                    <?php } ?> Menu</a>
                                    <span style="float: right">
                                        <?php
                                        if (!isset($_COOKIE['flag'])) {
                                        ?>
                                            <a href="login.php" class="btn">Login</a>&nbsp;&nbsp;
                                            <a href="registration.php" class="btn">Signup</a>
                                        <?php } else { ?>
                                            Logged in as <a href="../view/viewprofile.php" class="btn"> <?php echo $username; ?> </a>&nbsp;&nbsp;
                                            <a href="../controller/logoutCheck.php" class="btn">Logout</a>
                                        <?php } ?>
                                    </span>
                    </h3>
                </th>
            </tr>
            <tr>
                <td colspan="8" align="center">
                    <h1>Users</h1>
                </td>
            </tr>


            <tr>

                <td>User Name</td>
                <td>Name</td>
                <td>Email</td>
                <td>Gender</td>
                <td>Date Of Birth</td>
                <td></td>
            </tr>
            <?php for ($i = 0; $i < count($users); $i++) { ?>
                <tr>
                    <td><?php echo $users[$i]['username']; ?></td>
                    <td><?php echo $users[$i]['Name']; ?></td>
                    <td><?php echo $users[$i]['Email']; ?></td>
                    <td><?php echo $users[$i]['Gender']; ?></td>
                    <td><?php echo $users[$i]['DOB']; ?></td>
                    <td>
                        <a href="../controller/deleteuser.php?deleteusername=<?php echo $users[$i]['username']; ?>" class="btn">
                            Delete
                        </a>
                    </td>
                <?php } ?>

                </tr>

                <div class="ht">
                    Copyright © 2024. SAN Tour. All rights reserved
                </div>
        </table>
    </form>
</body>

</html>

<?php

if (isset($_REQUEST['logout'])) {
    setcookie('flag', 'abc', time() - 10, '/');
    header('location: ../view/login.php');
}

?>