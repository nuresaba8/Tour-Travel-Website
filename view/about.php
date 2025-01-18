<?php
   if (isset($_COOKIE['flag'])) {
    $username = $_COOKIE['username'];
}
?>
<html>
    <head>
    <title>About</title>
    
    <link rel="stylesheet" href="../css/styleAbout.css">
    <style>
        span{
    color: #fabd02;
}
        </style>
    </head>
   <body>
            <table border="1" align="center" width="75%" height="90%">
              <tr><td>

              <table border="0">
              <tr >
            <th colspan="2">
                <h2 align="left">SAN <span>TOUR</span></h2>
                <h3>
                    <a href="tourCalendar.php" class="bt">Tour Calendar</a>&nbsp;&nbsp;
                    <a href="reservation.php" class="bt">Reserve Now!</a>&nbsp;&nbsp;
                    <a href="notification.php" class="bt">Notification</a>&nbsp;&nbsp;
                    <a href="wishlist.php" class="bt">Wish List</a>
                    <?php
                                    if (!isset($_COOKIE['flag'])) {
                                    ?>
                                    <a href="../view/registration.php" class="btn">Signup</a>
                                    <a href="../view/login.php" class="btn">Login</a>
                                       
                                    <?php } else { ?>
                                        Logged in as <span><?php echo $username ?> </span>
                                    <?php } ?>
                    
                </h3><br>
            </th>
        </tr>
            <tr> <th align="center" style="vertical-align: top;">
            <h1>About</h1></th></tr><br>

            <tr><td align="center" ><img src="https://cdn.pixabay.com/photo/2017/09/04/16/58/passport-2714675_1280.jpg" alt="" height="300px" width="500px"><br>
            </td>
</tr>
<tr>
                        <td>
                <table cellpadding="0" cellspacing="0" border="1" align="center"><tr><td align="center">
                                <p> Explore the majestic beauties of Cox's Bazar, Sylhet, <br>
                                    Bandarban, Sajek Valley, Rangamati and many more<br>
                                    Plan yout trip now!</p></td></tr>
                </table>
                </td>
                    </tr>
                <tr>
                <td>
                <?php
                                    if (isset($_COOKIE['flag'])) {
                                    ?>
                                       <a href="../controller/logoutCheck.php" class="bt">Log out</a>
                                    <?php } ?>
                                        
              
                </td>
            </tr>
            <tr>
            <td colspan="2" align="center" height="50px">Copyright © 2024. SAN Tour. All rights reserved</td>
            </tr>
           
  </table>

  </td></tr>
            </table>
  </body>
</html>


