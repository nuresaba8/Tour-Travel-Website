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
    <title>Sajek Valley</title>
     
    <link rel="stylesheet" href="../css/styleAbout.css">
    <style>
        span{
    color: #186514;
}
</style>
</head>
<body>
<table border="0" align="center">
        <tr >
            <th colspan="2">
                <h2 align="left">SAN <span>TOUR</span></h2>
                <h3>
                <a href="tourCalendar.php" class="sk">Tour Calendar</a>&nbsp;&nbsp;
                    <a href="about.php" class="sk">About</a>&nbsp;&nbsp;
                    <a href="reservation.php" class="sk">Reserve Now!</a>
                    <a href="notification.php" class="sk">Notification</a>&nbsp;&nbsp;
                    <a href="wishlist.php" class="sk">Wish List</a>&nbsp;&nbsp;&nbsp;&nbsp;
                    Logged in as <span><?php echo $username ?></span>
                </h3><br>
            </th></tr>
            <tr >
            <?php 
                  if($position=='host'){ ?>
                  <td colspan="3" align="center">
                  <a href="../view/edit.php" class="sk"><h2> Edit </h2></a> 
                </td>
                <?php }else{?>
                  <td colspan="3" align="center"></td>
                  <?php } ?>
        </tr>
</table>
    <main>
    <h1 align="center">Sajek Valley </h1>
    <marquee>
    <img src="https://i.pinimg.com/564x/e5/99/fc/e599fc20288a2ea3d96c398fad9a3081.jpg" alt="" height="200px" width="245px">
    <img src="https://i.pinimg.com/564x/2f/e9/fe/2fe9fe0d2115b441dba0a2b610cd1795.jpg" alt="" height="200px" width="245px">
    <img src="https://i.pinimg.com/564x/32/5b/ef/325bef0b4836250859ff3627f062ea98.jpg" alt="" height="200px" width="245px">
    <img src="https://i.pinimg.com/564x/81/54/59/8154598577e433851b55c230fb446066.jpg" alt="" height="200px" width="245px">
    <img src="https://i.pinimg.com/564x/4d/eb/d5/4debd5b34f41030ffde37f21b488df8b.jpg" alt="" height="200px" width="245px">
                </marquee>
    <br>
        <h1>General Information</h1>
        <p>Sajek Valley is a tourist spot in the Rangamati District of Bangladesh. It's known for its natural beauty and scenic views.</p>

        <h1>Location</h1>
        <p>Sajek Valley is located in the Kasalong range of mountains near the India-Bangladesh border.</p>

        <h1>How to Reach</h1>
        <p>To reach Sajek Valley, you need to take a bus or car to Khagrachhari, then hire a jeep to take you to Sajek.</p>
    </main>
    <footer>
        <p>© 2022 Sajek Valley Information</p>
        <table border="0" align="center">
        <tr>
        <td>
                <a href="reservation.php" class="sk">Reserve Now!</a>
                </td>
                <td>
                <a href="../controller/logoutCheck.php" class="sk">Log out</a>
                </td>
            </tr>
        <tr>
            <td colspan="2" align="center" height="50px">Copyright © 2024. SAN Tour. All rights reserved</td>
            </tr>
        </table>
    </footer>
</body>
</html>
