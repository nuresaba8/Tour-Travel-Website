<?php
require_once('../model/userModel.php');
if (!isset($_COOKIE['flag'])) {
    header('location: ../view/login.php');
}

$username = $_COOKIE['username'];

$role = getRole($username);
$users = getUser('host');

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

        th form {
            width: 100%;
            padding: 20px;
        }

        th p {
            margin: 10px 0;
            line-height: 1.6;
        }

        input[type="text"],
        input[type="email"],
        input[type="date"],
        input[type="number"],
        select {
            width: calc(100% - 300px);
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #cccccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            width: calc(100% - 20px);
            padding: 10px;
            background-color: #007bff;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th colspan="4">
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
        <tr>
            <th>
                <form action="../controller/validate.php" method="post">
                    <p>Name: <input type="text" name="fname" required></p>
                    <p>Date & Time: <input type="date" id="start" name="trip-start" value="2018-07-22" min="2018-01-01" max="2018-12-31"></p>
                    <p>Email: <input type="text" name="email"></p>
                    <label for="booking">Booking Type:</label>
                    <select id="booking" name="booking">
                        <option value="AC">AC</option>
                        <option value="Non AC">Non AC</option>
                    </select>
                    <p>Starting Point: <input type="text" name="sname"></p>
                    <p>Number Of People: <input type="number" name="pnumber"></p>
                    <input type="submit" name="submit" value="Submit">
                </form>
            </th>
        </tr>
        <tr>
            <td colspan="4" align="center" height="50px">Copyright © 2024. SAN Tour. All rights reserved</td>
        </tr>
    </table>



    <script>
        let validateForm = () => {
            let name = document.getElementsByName("fname")[0].value;
            if (name == "") {
                alert("Name cannot be empty");
            } else if (name.split(" ").length < 2) {
                alert("Name has to contain at least two words");
            } else if (!checkFirstChr(name[0])) {
                alert("Name must start with a letter");
            } else if (!checkChr(name)) {
                alert("Name can only contain letters (a-z or A-Z), dot, dash, or space");
            }

            let email = document.getElementsByName("email")[0].value;
            let test = "Successful";

            if (email === "") {
                test = "Email cannot be empty";
            } else if (!isValidEmail(email)) {
                test = "Invalid email format";
            }

            alert(test);



        };

        let checkFirstChr = (chr) => {
            return (chr >= "A" && chr <= "Z") || (chr >= "a" && chr <= "z");
        };

        let checkChr = (name) => {
            for (let i = 0; i < name.length; i++) {
                let chr = name[i];
                if (!((chr >= "A" && chr <= "Z") || (chr >= "a" && chr <= "z") || chr === "." || chr === "-" || chr === " ")) {
                    return false;
                }
            }
            return true;
        };

        let isValidEmail = (email) => {
            return email.includes("@");
        };
    </script>

</body>

</html>