<?php
require_once('../model/userModel.php');
if (!isset($_COOKIE['flag'])) {
    header('location: ../view/login.php');
}

$username = $_COOKIE['username'];

$role = getRole($username);
$users = getUser('host');

?>

<html>

<head>
    <title>Add Hospitaliy Partnar</title>
    <link rel="stylesheet" href="../css/styleHome1.css">
</head>

<body>
    <table border="1" cellpadding="5" cellspacing="0" width="80%" align="center">
        <tr>
            <th colspan="3">
                <h2 align="left">SAN TOUR</h2>
                <h3>
                    <a href="home1.php" class="btn">Home</a>&nbsp;&nbsp;
                    <a href="tour.php" class="btn">Tour</a>&nbsp;&nbsp;
                    <a href="travel.php" class="btn">Travel</a>&nbsp;&nbsp;
                    <?php if ($role == 'user') { ?>
                        <a href="dashboard.php" class="btn">
                        <?php } elseif ($role == 'host') { ?>
                            <a href="hostdashboard.php" class="btn">
                            <?php } else { ?>
                                <a href="admindashboard.php" class="btn">
                                <?php } ?> Menu</a>
                                <span style="float: right">
                                    Logged in as <a href="../view/viewprofile.php"> <?php echo $username; ?> </a>&nbsp;&nbsp;
                                    <a href="../controller/logoutCheck.php">Logout</a>
                                </span>
                </h3>
            </th>
        </tr>
        <tr rowspan="10">
            <td>
                <form action="../controller/addHostCheck.php" method="post">
                    <fieldset>
                        <legend>
                            Registration
                        </legend>
                        <table border="0">
                            <tr>
                                <td>
                                    <label id="label">This form is to create host Account only!</label>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Name:
                                </td>
                                <td>
                                    <input type="text" name="name" id="name">

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Email:
                                </td>
                                <td>
                                    <input type="email" name="email" placeholder="example@gmail.com" id="email">


                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Username:
                                </td>
                                <td>
                                    <input type="text" name="username" id="username">
                                </td>
                            </tr>
                            <tr>
                                <th align="left">
                                    <input type="button" name="submit" value="Submit" class="btn" onclick="ajax()" />
                                    &nbsp;

                                </th>
                            </tr>
                        </table>
                    </fieldset>
                    <script>
                        let name = "";
                        let username = "";
                        let email = "";

                        function validateFields() {
                            name = document.getElementById('name').value;
                            username = document.getElementById("username").value.trim();
                            email = document.getElementById("email").value;

                            if (email === "") {
                                alert("Email cannot be empty");
                                return false;
                            } else if (!isValidEmail(email)) {
                                alert("Invalid email format");
                                return false;
                            }

                            if (name == "") {
                                alert("Name cannot be empty");
                                return false;
                            } else if (name.split(" ").length < 2) {
                                alert("Name has to contain at least two words");
                                return false;
                            } else if (!checkFirstChr(name[0])) {
                                alert("Name must start with a letter");
                                return false;
                            } else if (!checkChr(name)) {
                                alert(
                                    "Name can only contain letters (a-z or A-Z), dot, dash, or space"
                                );
                                return false;
                            }

                            if (username === "") {
                                alert("Username cannot be empty.");
                                return false;
                            }
                            return true;
                        }

                        function ajax() {

                            if (validateFields()) {
                                let user = {
                                    'name': name,
                                    'username': username,
                                    'email': email,
                                }


                                let data = JSON.stringify(user);
                                alert(data);
                                let xhttp = new XMLHttpRequest();
                                xhttp.open('POST', '../controller/addHostCheck.php', true);
                                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                xhttp.send("user=" + data);


                                xhttp.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        alert(this.responseText);

                                        if (this.responseText.trim() === "Success") {
                                            var count = 30; 
                                            var countdown = setInterval(function() {
                                                document.getElementById('label').innerHTML = "Host Account created successfully with default password Demo@123. Redirecting to Login in " + count + " seconds...";
                                                count--;
                                                if (count === 0) {
                                                    clearInterval(countdown);
                                                    window.location.href = "../view/login.php";
                                                }
                                            }, 1000); 
                                        }
                                    }
                                }

                            }
                        }
                        let isValidEmail = (email) => {
                            for (let i = 0; i < email.length; i++) {
                                if (email[i] == "@") {
                                    return true;
                                }
                            }
                            return false;
                        }
                        let checkFirstChr = (chr) => {
                            return (chr >= "A" && chr <= "Z") || (chr >= "a" && chr <= "z");
                        }

                        let checkChr = (name) => {
                            for (let i = 0; i < name.length; i++) {
                                let chr = name[i];
                                if (
                                    !(
                                        (chr >= "A" && chr <= "Z") ||
                                        (chr >= "a" && chr <= "z") ||
                                        chr === "." ||
                                        chr === "-" ||
                                        chr === " "
                                    )
                                ) {
                                    return false;
                                }
                            }
                            return true;
                        }
                    </script>
                </form>
            </td>
        </tr>
        <tr>
            <td colspan="3" align="center" height="50px"> Copyright© 2024. SAN Tour.All rights reserved </td>
        </tr>
    </table>
</body>

</html>