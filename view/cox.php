<?php
 require_once('../model/userModel.php');
    if(!isset($_COOKIE['flag'])){
        header('location: ../view/login.php');
    }
$username = $_COOKIE['username'];
    $position=getRole($username);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cox's Bazar </title>
    <link rel="stylesheet" href="../css/styleAbout.css">
    <style>
        span{
    color: blue;
}
</style>
</head>
<body>
<table border="0" align="center">
        <tr >
            <th colspan="2">
                <h2 align="left">SAN <span>TOUR</span></h2>
                <h3>
                <a href="tourCalendar.php" class="cz">Tour Calendar</a>&nbsp;&nbsp;
                <a href="reservation.php" class="cz">Reserve Now!</a>&nbsp;&nbsp;
                    <a href="about.php" class="cz">About</a>&nbsp;&nbsp;
                    <a href="wishlist.php" class="cz">Wish List</a>&nbsp;&nbsp;
                    <a href="notification.php" class="cz">Notification</a>
                    Logged in as <span><?php echo $username ?> </span>
                </h3><br>
            </th>
        </tr>
        <tr >
            <?php 
                  if($position=='host'){ ?>
                  <td colspan="3" align="center">
                  <a href="../view/edit.php" class="cz"><h2> Edit </h2></a> 
                </td>
                <?php }else{?>
                  <td colspan="3" align="center"></td>
                  <?php } ?>
        </tr>
</table>
        

    <main>
    <h1 align="center">Cox's Bazar</h1>
    <img src="https://i.pinimg.com/564x/7a/45/2f/7a452f636942fcdc61c777357174dbc7.jpg" alt="" height="200px" width="245px">
    <img src="https://i.pinimg.com/564x/58/61/bf/5861bfc9e8c6135e829d1107882c7255.jpg" alt="" height="200px" width="245px">
    <img src="https://i.pinimg.com/564x/07/17/19/0717198bc54a06cfad0ea0b5d778db6e.jpg" alt="" height="200px" width="245px">
    <img src="https://i.pinimg.com/564x/f6/7b/87/f67b870ee960026e2c031ce7c44cd906.jpg" alt="" height="200px" width="245px">
    <img src="https://i.pinimg.com/564x/64/9d/53/649d53f4f54c314fe64df441af159ad9.jpg" alt="" height="200px" width="245px">
    <br>
        <h1>General Information</h1>
        <p>Cox's Bazar is a city, fishing port, tourism center and district headquarters in Bangladesh. It is known for its wide sandy beach.</p>

        <h1>Location</h1>
        <p>Cox's Bazar is located in the Chittagong Division of Bangladesh, on the coast of the Bay of Bengal.</p>

        <h1>How to Reach</h1>
        <p>To reach Cox's Bazar, you can take a flight from Dhaka to Cox's Bazar Airport, or travel by bus or car to Cox's Bazar from different parts of the country.</p>
    </main>
    <footer>
        <p>© 2022 Cox's Bazar Information</p>
        <table border="0" align="center">x
        <tr>
                <td>
                <a href="reservation.php" class="cz">Reserve Now!</a>
                </td>
                <td>
                <a href="../controller/logoutCheck.php" class="cz">Log out</a>
                </td>
            </tr>
        <tr>
            <td colspan="2" align="center" height="50px">Copyright © 2024. SAN Tour. All rights reserved</td>
            </tr>
        </table>
    </footer>
</body>
</html>
