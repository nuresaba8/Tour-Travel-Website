<?php
require_once('../model/userModel.php');
if (!isset($_COOKIE['flag'])) {
    header('location: login.php');
}
$username = $_COOKIE['username'];
?>


<!DOCTYPE html>
<html>

<head>
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        table {
            width: 80%;
            margin: 20px auto;
            background-color: #ffffff;
            border-collapse: collapse;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        th {
            padding: 10px;
            background-color: #f2f2f2;
            text-align: left;
        }

        th h2 {
            margin: 0;
        }

        th h3 {
            margin: 5px 0;
        }

        th a {
            text-decoration: none;
            color: #333333;
            margin-right: 20px;
        }

        th a:hover {
            color: #007bff;
        }

        th p {
            margin: 10px 0;
            line-height: 1.6;
        }

        input[type="text"] {
            padding: 8px;
            border: 1px solid #cccccc;
            border-radius: 5px;
        }

        input[type="submit"],
        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        input[type="submit"]:hover,
        button:hover {
            background-color: #0056b3;
        }

        img {
            display: block;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <table border="1" cellpadding="6" cellspacing="0">
        <tr>
            <td colspan="4">
                <h2 align="left" class="logo"><span>S</span>an <span>To</span>ur</h2>
                <h3>
                    <a href="home1.php" class="btn">Home</a>&nbsp;&nbsp;
                    <a href="tour.php" class="btn">Tour</a>&nbsp;&nbsp;
                    <a href="travel.php" class="btn">Travel</a>&nbsp;&nbsp;
                    <a href="dashboard.php" class="btn">Menu</a>
                    <span style="float: right">
                        Logged in as <a href="../view/viewprofile.php"> <?php echo $username; ?> </a>&nbsp;&nbsp;
                        <a href="../controller/logoutCheck.php" class="btn">Logout</a>
                    </span>
                </h3>
            </td>
        </tr>
        <tr>
            <th>
                <form action="../controller/promo.php" method="post">
                    <p>Use Promo Code: <input type='text' name="promo"></p>
                    <div style="text-align: center;">
                        <input type="submit" name="submit" value="Submit">
                        <button>Cancel</button>
                    </div>
                </form>
            </th>
            <th>
                <img src='https://cdn.pixabay.com/photo/2016/06/06/06/14/deal-of-the-day-1438910_1280.png' alt="" height="160px" width="150px">
                <br>
                <button>Redeem Points</button>
            </th>
        </tr>
        <tr>
            <td colspan="4" align="center" height="50px">Copyright © 2024. SAN Tour. All rights reserved</td>
        </tr>
    </table>
</body>

</html>