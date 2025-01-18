<?php

    if(!isset($_COOKIE['flag'])){
        header('location: ../view/login.php');
    }
    session_start();
    $username=$_COOKIE['username'];

?>
<html>
    <title>About</title>
     
    <link rel="stylesheet" href="../css/styleAbout.css">
    <style>
        span{
    color: #fabd02;
}
</style>
   <body>
            <table border="1" align="center" width="50%" height="90%">
              <tr><td>
              <table border="0">
              <tr >
            <th colspan="2">
                <h2 align="left">SAN <span>TOUR</span></h2>
                <h3>
                    <a href="availabilityCalendar.php" class="bt">Availability Calendar</a>&nbsp;&nbsp;
                    <a href="hostdashboard.php" class="bt">Host Dashboard</a>&nbsp;&nbsp;
                    Logged in as <span> <?php echo $username ?> </span>
                </h3><br>
            </th>
        </tr>
            <tr> <th align="center" style="vertical-align: top;">
            <h1>About</h1></th></tr><br>

            <tr><td align="center" ><img src="https://cdn.pixabay.com/photo/2017/09/04/16/58/passport-2714675_1280.jpg" alt="" height="300px" width="480px"><br>
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
                <a href="../controller/logoutCheck.php" class="bt">Log out</a>
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


