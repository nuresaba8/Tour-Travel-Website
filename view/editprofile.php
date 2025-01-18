<?php
require_once('../model/userModel.php');
if (!isset($_COOKIE['flag'])) {
    header('location: login.php');
}
$username = $_COOKIE['username'];
$role = getRole($username);

?>
<html>

<head>
    <title>HTML form</title>
    <link rel="stylesheet" href="../CSS/styleHome1.css">
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
                                    <a href="../controller/logoutCheck.php" class="btn">Logout</a>
                                </span>
                </h3>
            </th>
        </tr>
        <tr>
            <td>
                <h3>
                    Account
                </h3>
                <hr>
                <ul>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="viewprofile.php">View Profile</a></li>
                    <li><a href="editprofile.php">Edit Profile</a></li>
                    <li><a href="profilepicture.php">Change Profile Picture</a></li>
                    <li><a href="changepassword.php">Change Password</a></li>
                    <li><a href="../controller/logoutCheck.php">Logout</a></li>
                </ul>
            </td>
            <td colspan="2">
                <form action="../controller/editProfileCheck.php" method="post">
                    <fieldset>
                        <legend>
                            EDIT PROFILE
                        </legend>
                        <table border="0">
                            <tr>
                                <td>
                                    Name:
                                </td>
                                <td>
                                    <input type="text" name="name" required>
                                </td>
                                <td rowspan="5">
                                    <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" alt="" height="160px" width="150px">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <hr>
                                </td>
                                <td>
                                    <hr>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>
                                    Email:
                                </td>
                                <td>
                                    <input type="text" name="email" required>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>
                                    <hr>
                                </td>
                                <td>
                                    <hr>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>
                                    Gender:
                                </td>
                                <td>
                                    <input type="radio" name="gender" value="Male"> Male
                                    <input type="radio" name="gender" value="Female"> Female
                                    <input type="radio" name="gender" value="Other"> Other
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>
                                    <hr>
                                </td>
                                <td>
                                    <hr>
                                </td>
                                <td></td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <hr>
                                </td>
                                <td>
                                    <hr>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="submit" name="submit" value="Submit" />
                                </td>
                                <td>
                                </td>
                                <td></td>
                            </tr>
                        </table>
                    </fieldset>
                </form>
                <script>
                    function validateFields() {
                        let name = document.getElementById('name').value;
                        let username = document.getElementById("username").value.trim();
                        let email = document.getElementById("email").value;

                        if (email === "") {
                            alert("Email cannot be empty");
                            return false;
                        } else if (!isValidEmail(email)) {
                            alert("Invalid email format");
                            return false;
                        }

                        let genders = document.getElementsByName("gender");
                        let isChecked = false;

                        for (let i = 0; i < genders.length; i++) {
                            if (genders[i].checked) {
                                isChecked = true;
                                break;
                            }
                        }

                        if (!isChecked) {
                            alert("At least one gender must be selected");
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
                        if (password === "" || password.length < 8) {
                            alert("Password must be at least 8 characters long.");
                            return false;
                        }
                        if (password !== cpassword) {
                            alert("Password must match.");
                            return false;
                        }

                        if (!isValidPassword(password)) {
                            alert("Password must contain at least one letter, one number, and one special character.");
                            return false;
                        }



                        return true;
                    }

                    function isValidPassword(password) {
                        let hasLetter = false;
                        let hasNumber = false;
                        let hasSpecialChar = false;

                        for (let i = 0; i < password.length; i++) {
                            let char = password[i];

                            if ((char >= 'a' && char <= 'z') || (char >= 'A' && char <= 'Z')) {
                                hasLetter = true;
                            } else if (char >= '0' && char <= '9') {
                                hasNumber = true;
                            } else if (!(char >= 'a' && char <= 'z') && !(char >= 'A' && char <= 'Z') && !(char >= '0' && char <= '9')) {
                                hasSpecialChar = true;
                            }
                        }

                        return hasLetter && hasNumber && hasSpecialChar;
                    }
                    let checkFirstChr = (chr) => {
                        return (chr >= "A" && chr <= "Z") || (chr >= "a" && chr <= "z");
                    };

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
                    };
                    let isValidEmail = (email) => {
                        for (let i = 0; i < email.length; i++) {
                            if (email[i] == "@") {
                                return true;
                            }
                        }
                        return false;
                    };
                    let isNumeric = (str) => {
                        for (let i = 0; i < str.length; i++) {
                            if (str[i] < '0' || str[i] > '9') {
                                return false;
                            }
                        }
                        return true;
                    };
                </script>
            </td>
        </tr>
        <tr>
            <td colspan="3" align="center" height="50px">Copyright © 2024. SAN Tour. All rights reserved</td>
        </tr>
    </table>
</body>

</html>