<html>

<head>
    <title>HTML form</title>
</head>

<body>
    <table border="1" cellpadding="5" cellspacing="0" width="80%" align="center">
        <tr>
            <th colspan="3">
                <h2 align="left">SAN TOUR</h2>
                <h3>
                    <a href="home.php">Home</a>&nbsp;&nbsp;
                    <a href="tour.php">Tour</a>&nbsp;&nbsp;
                    <a href="travel.php">Travel</a>&nbsp;&nbsp;
                    <a href="menu.php">Menu</a>
                    <span style="float: right">
                        <a href="login.php">Login</a>
                        <a href="registration.php">Signup</a>
                    </span>
                </h3>
            </th>
        </tr>
        <tr>
            <td colspan="2">
                <form action="../controller/passCheck.php" method="post" enctype="">
                    <fieldset>
                        <legend>
                            CHANGE PASSWORD
                        </legend>
                        <table border="0">
                            <tr>
                                <td>
                                    <p>New Password:</p>
                                </td>
                                <td>
                                    <input type="password" name="newpassword" required>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Retype New Password:</p>
                                </td>
                                <td>
                                    <input type="password" name="rnewpassword" required>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="submit" name="Submit" value="Submit" />
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                </form>
            </td>
        </tr>
        <tr>
            <td colspan="6" align="center" height="50px">Copyright © 2024. SAN Tour. All rights reserved</td>
        </tr>
    </table>
</body>

</html>