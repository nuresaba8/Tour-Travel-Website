<?php
 require_once('../model/userModel.php');
    if(!isset($_COOKIE['flag'])){
        header('location: ../view/login.php');
    }
$username = $_COOKIE['username'];
    $position= getRole($username);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Rangamati</title>
    <link rel="stylesheet" href="../css/styleAbout.css">
    <style>
        span{
    color: #11ddda;
}
</style>
</head>
<body>
<table border="0" align="center">
        <tr >
            <th colspan="2">
                <h2 align="left">SAN <span>TOUR</span></h2>
                <h3>
                <a href="tourCalendar.php" class="rm">Tour Calendar</a>&nbsp;&nbsp;
                    <a href="reservation.php" class="rm">Reserve Now!</a>&nbsp;&nbsp;
                    <a href="notification.php" class="rm">Notification</a>&nbsp;&nbsp;
                    <a href="wishlist.php" class="rm">Wish List</a>
                    <a href="about.php" class="rm">About</a>
                    Logged in as <span><?php echo $username ?> </span>
                </h3>
            </th>
            <tr >
            <?php 
                  if($position=='host'){ ?>
                  <td colspan="3" align="center">
                  <a href="../view/edit.php" class="rm"><h2> Edit </h2></a> 
                </td>
                <?php }else{?>
                  <td colspan="3" align="center"></td>
                  <?php } ?>
        </tr>
        </tr>
</table>
        

    <main>
        <h1 align="center">Rangamati</h1>
    <img src="https://i.pinimg.com/564x/c4/a6/b6/c4a6b601fb78d180e020111a2f3445aa.jpg" alt="" height="200px" width="245px">
    <img src="https://i.pinimg.com/564x/b1/8b/68/b18b687a062753a29a7f882c080d81f9.jpg" alt="" height="200px" width="245px">
    <img src="https://i.pinimg.com/474x/91/a8/ec/91a8ece2c3f4755ec4885bdfa4a3194e.jpg" alt="" height="200px" width="245px">
    <img src="https://i.pinimg.com/474x/21/fb/dd/21fbdd65715e848c9dd62b0608a286d7.jpg" alt="" height="200px" width="245px">
    <img src="https://i.pinimg.com/474x/7d/52/f7/7d52f7d8d5225b3a7d6833d1b3ec822a.jpg" alt="" height="200px" width="245px">
    <br>
        <h1>General Information</h1>
        <p>Rangamati is a district in the Chittagong Division of Bangladesh. It is known for its scenic beauty, lush green hills, and the Kaptai Lake.</p>

        <h1>Location</h1>
        <p>Rangamati is located in the Chittagong Hill Tracts region of Bangladesh, in the southeastern part of the country.</p>

        <h1>How to Reach</h1>
        <p>To reach Rangamati, you can take a bus from Dhaka or Chittagong to Rangamati Bus Terminal, or travel by car to Rangamati from different parts of the country.</p>
    </main>
    <footer>
        <p>© 2022 Rangamati Information</p>
        <table border="0" align="center">
        <tr>
        <td>
                <a href="reservation.php" class="rm">Reserve Now!</a>
                </td>
                <td>
                <a href="../controller/logoutCheck.php" class="rm">Log out</a>
                </td>
            </tr>
        <tr>
            <td colspan="2" align="center" height="50px">Copyright © 2024. SAN Tour. All rights reserved</td>
            </tr>
        </table>
    </footer>
</body>
</html>
