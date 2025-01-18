<?php

    if(!isset($_COOKIE['flag'])){
        header('location: ../view/login.php');
    }
    session_start();
    $username=$_SESSION['username'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <title>Availability Calendar </title>
   <link rel="stylesheet" href="../css/styleAbout.css">
    <style>
        span{
    color: #fabd02;
}
        </style>
</head>
<body>
    <table border="1" align="center"><tr><td>
    <table border="0" align="center">
    <tr >
            <th colspan="5">
                <h2 align="left">SAN <span>TOUR</span></h2>
                <h3>
                <a href="aboutus.php" class="bt">About Us</a>&nbsp;&nbsp;
                <a href="hostdashboard.php" class="bt">Host Dashboard</a>&nbsp;&nbsp;
                Logged in as <span><?php echo $username ?> </span>
                </h3><br>
            </th>
        </tr>
        <tr>
        <td colspan="6" align="center" ><h1>Calendar</h1></td></tr>
        <tr>
        <td></td>
        <td align="center">1-6</td>
        <td align="center">7-14</td>
        <td align="center">15-21</td>
        <td align="center">22-28</td>
        <td align="center">29-..</td>
        </tr>
        <tr><td colspan="6"><hr width="900px"></td></tr>
        <tr>
            <td><h3>January:</h3></td>
            <td align="center"><p><h3>January 4-6 <br>Rangamati</h3></p></td><td></td><td></td><td></td><td align="center"><p><h3>January 29-31 <br>Cox's Bazar</h3></p></td>
        </tr>
        <tr><td colspan="6"><hr width="900px"></td></tr>
        <tr>
            <td><h3>February:</h3></td>
            <td align="center"><p><h3>February 2-4 <br>Sajek</h3></p></td><td></td><td align="center"><p><h3>February 18-20 <br>Sylhet</h3></p></td><td></td><td></td>
        </tr>
        <tr><td colspan="6"><hr width="900px"></td></tr>
        <tr>
            <td><h3>March:</h3></td>
            <td></td><td></td><td align="center"><p><h3>March 18-20 <br>Rangamati</h3></p></td><td></td><td align="center"><p><h3>March 29-31 <br>Cox's Bazar</h3></p></td>
        </tr>
        <tr><td colspan="6"><hr width="900px"></td></tr>
        <tr>
            <td><h3>April:</h3></td>
            <td></td><td align="center"><p><h3>April 8-10 <br>Sajek</h3></p></td><td align="center"><p><h3>April 19-21 <br>Sajek</h3></p></td><td></td><td></td>
        </tr>
        <tr><td colspan="6"><hr width="900px"></td></tr>
        <tr>
            <td><h3>May:</h3></td>
            <td></td><td align="center"><p><h3>May 10-13 <br>Rangamati</h3></p></td><td></td><td></td><td align="center"><p><h3>May 29-31 <br>Sylhet</h3></p></td>
        </tr>
        <tr><td colspan="6"><hr width="900px"></td></tr>
        <tr>
            <td><h3>June:</h3></td>
            <td></td><td align="center"><p><h3>June 12-14 <br>Rangamati</h3></p></td><td></td><td></td><td align="center"><p><h3>June 29-31 <br>Sylhet</h3></p></td>
        </tr>
        <tr><td colspan="6"><hr width="900px"></td></tr>
        <tr>
            <td><h3>July:</h3></td>
            <td></td><td></td><td></td><td align="center"><p><h3>July 22-25 <br>Sylhet</h3></p></td><td align="center"><p><h3>July 29-31 <br>Sylhet</h3></p></td>
        </tr>
        <tr><td colspan="6"><hr width="900px"></td></tr>
        <tr>
            <td><h3>Augest:</h3></td>
        </tr>
        <tr><td colspan="6"><hr width="900px"></td></tr>
        <tr>
            <td><h3>September:</h3></td>
        </tr>
        <tr><td colspan="6"><hr width="900px"></td></tr>
        <tr>
            <td><h3>October:</h3></td>
            <td></td><td></td><td></td><td align="center"><p><h3>October 24-28 <br>Cox's Bazar</h3></p></td><td></td>
        </tr>
        <tr><td colspan="6"><hr width="900px"></td></tr>
        <tr>
            <td><h3>November:</h3></td>
        </tr>
        <tr><td colspan="6"><hr width="900px"></td></tr>
        <tr>
            <td><h3>December:</h3></td>
        </tr>
        <tr>
                <td>
                <a href="../controller/logoutCheck.php" class="bt">Log out</a>
                </td>
            </tr>
        <tr>
            <td colspan="5" align="center" height="50px">Copyright © 2024. SAN Tour. All rights reserved</td>
        </tr>
    </table>
        </td></tr></table>
</body>
</html>
