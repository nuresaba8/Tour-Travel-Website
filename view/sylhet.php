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
    <title>Sylhet </title>
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
                <a href="tourCalendar.php" class="st">Tour Calendar</a>&nbsp;&nbsp;
                    <a href="reservation.php" class="st">Reserve Now!</a>&nbsp;&nbsp;
                    <a href="notification.php" class="st">Notification</a>&nbsp;&nbsp;
                    <a href="wishlist.php" class="st">Wish List</a>
                    <a href="about.php" class="st">About</a>&nbsp;&nbsp;&nbsp;&nbsp;
                    Logged in as <span><?php echo $username ?></span>
                </h3><br>
            </th>
        </tr>
        <tr >
            <?php 
                  if($position=='host'){ ?>
                  <td colspan="3" align="center">
                  <a href="../view/edit.php" class="st"><h2> Edit </h2></a> 
                </td>
                <?php }else{?>
                  <td colspan="3" align="center"></td>
                  <?php } ?>
        </tr>
</table>
        
    <main>
        <h1 align="center" >Sylhet</h1>
    <img src="https://i.pinimg.com/564x/c8/8d/85/c88d855dac14bbe33590933e08dd52c7.jpg" alt="" height="200px" width="245px">
    <img src="https://i.pinimg.com/564x/c5/fa/8b/c5fa8b73e716297d09159f80a7cedc80.jpg" alt="" height="200px" width="245px">
    <img src="https://i.pinimg.com/564x/f1/82/bf/f182bff0704593525e34727e52a61b92.jpg" alt="" height="200px" width="245px">
    <img src="https://i.pinimg.com/474x/5d/ba/51/5dba5150b62fada5a6f29c797bb3fc54.jpg" alt="" height="200px" width="245px">
    <img src="https://i.pinimg.com/564x/48/c4/7f/48c47fd80890d87711e3e19fc34b879e.jpg" alt="" height="200px" width="245px">
    <br>
        <h1>General Information</h1>
        <p>Sylhet is a picturesque city located in northeastern Bangladesh, known for its lush green landscapes, tea gardens, and vibrant culture. It is a popular tourist destination attracting visitors from all over the world.</p>

        <h1>Location</h1>
        <p>Sylhet is located in the Sylhet Division of Bangladesh, on the banks of the Surma River.</p>

        <h1>How to Reach</h1>
        <p>To reach Sylhet, you can take a flight from Dhaka to Osmani International Airport, or travel by bus or car to Sylhet from different parts of the country.</p>
    </main>
    <footer>
        <p>© 2022 Sylhet Information</p>
        <table border="0" align="center">
        <tr>
        <td>
                <a href="reservation.php" class="st">Reserve Now!</a>
                </td>
                <td>
                <a href="../controller/logoutCheck.php" class="st">Log out</a>
                </td>
            </tr>
        <tr>
            <td colspan="2" align="center" height="50px">Copyright © 2024. SAN Tour. All rights reserved</td>
            </tr>
        </table>
    </footer>
</body>
</html>
