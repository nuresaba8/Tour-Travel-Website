<?php

    if( !isset($_COOKIE['flag'])){
        header('location: ../view/login.php');
    }
    session_start();
    $username=$_COOKIE['username'];

?>
<!DOCTYPE html>
<html>
<head>
    <title>Notification</title>
        <link rel="stylesheet" href="../CSS/styleNotification.css">
</head>
<body>
<div class="center">
       <h1>Noti<span>fication</span><img src="../img/icon.jpg" ></h1>
       <form method="post" action="../controller/notiCheck.php">
       <div class="mid">
            <div class="logo">
                <?php
                        if (isset($_COOKIE['reservation_message'])) {
                        $reservation_message = $_COOKIE['reservation_message'];
                        echo "<p>$reservation_message</p>";
                        }
                        ?>
            </div>    
            </div>
            <input type="submit" name="submit" value="Clear">
            
      </form>
</div>
</body>
</html>


