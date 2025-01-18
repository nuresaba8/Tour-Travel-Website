<html>

<head>
    <title>Forgot Password</title>
    <link rel="stylesheet" href="../CSS/styleHome1.css">
</head>

<body>
    <table border="1" cellpadding="5" cellspacing="0" width="80%" align="center">
        <tr>
            <th colspan="3">
                <h2 align="left">SAN TOUR</h2>
                <h3>
                    <a href="home.php" class="btn">Home</a>&nbsp;&nbsp;
                    <a href="tour.php" class="btn">Tour</a>&nbsp;&nbsp;
                    <a href="travel.php" class="btn">Travel</a>&nbsp;&nbsp;
                    <a href="menu.php" class="btn">Menu</a>
                    <span style="float: right">
                        <a href="login.php" class="btn">Login</a>
                        <a href="registration.php" class="btn">Signup</a>
                    </span>
                </h3>
            </th>
        </tr>
        <tr rowspan="5">
            <td colspan="3">
                <form action="../controller/forgetpassCheck.php" method="post" enctype="">
                    <fieldset>
                        <legend>
                            <h3>FORGOT PASSWORD</h3>
                        </legend>
                        Enter Email:
                        <input type="email" name="email" placeholder="i.e. anything@example.com" size="50px" required><br />
                        <hr />
                        <input type="submit" name="submit" value="Send OTP" class="btn">
                    </fieldset>
                    <script>
                        function validateFields() {
                            let email = document.getElementById("email").value;

                            if (email === "") {
                                alert("Email cannot be empty");
                                return false;
                            } else if (!isValidEmail(email)) {
                                alert("Invalid email format");
                                return false;
                            }

                            let isValidEmail = (email) => {
                                for (let i = 0; i < email.length; i++) {
                                    if (email[i] == "@") {
                                        return true;
                                    }
                                }
                                return false;
                            };
                        };
                    </script>
                </form>
            </td>
        </tr>
        <div class="ht">
            <h3>Copyright © 2024. SAN Tour. All rights reserved</h3>
        </div>
    </table>
</body>

</html>