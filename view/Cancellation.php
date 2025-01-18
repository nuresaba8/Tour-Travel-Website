<?php
#require_once('../model/userModel.php');
if (!isset($_COOKIE['flag'])) {
    header('location: login.php');
}
$username = $_COOKIE['username'];
?>
<html>

<head>
    <title>Cancellation</title>
    <link rel="stylesheet" href="../CSS/styleHome1.css">
</head>

<body>
    <table border="1" cellpadding="5" cellspacing="0" width="80%" align="center">
        <tr>
            <th>
                <h2 align="left">SAN TOUR</h2>
                <h3>
                    <a href="home.php" class="btn">Home</a>&nbsp;&nbsp;
                    <a href="tour.php" class="btn">Tour</a>&nbsp;&nbsp;
                    <a href="travel.php" class="btn">Travel</a>&nbsp;&nbsp;
                    <a href="dashboard.php" class="btn">Menu</a>
                    <span style="float: right">
                        Logged in as <?php echo $username; ?> &nbsp;&nbsp;
                        <a href="../controller/logoutCheck.php" class="btn">Logout</a>
                    </span>
                </h3>
            </th>
        </tr>

        <tr>
            <td>
                <form action="../controller/CancellationCheck.php" method="post">
                    <fieldset>
                        <table border="0">
                            <tr>
                                <td>
                                    Username:
                                </td>
                                <td>
                                    <b> <?php echo $username; ?> </b>

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
                                    <input type="text" name="email" id="email">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Contact Number:
                                </td>
                                <td>
                                    <input type="number" name="cnumber" id="cnumber">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Select Refund option:
                                </td>
                                <td>
                                    <input type="radio" name="refund" required> Visa
                                    <input type="radio" name="refund" required> Master Card
                                    <input type="radio" name="refund" required> American Express
                                    <input type="radio" name="refund" required> Paypal
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Refund Details:
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" name="rdetails" id="rdetails">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Reason of cancellation:
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" name="rCancellation" id="rCancellation">
                                </td>
                            </tr>


                            <tr>
                                <td>
                                    <hr>
                                </td>
                            </tr>
                            <tr>
                                <th colspan="3" align="left">
                                    <input type="button" name="submit" value="Submit" class="btn" onclick="ajax()" />
                                    &nbsp;
                                    <input type="reset" name="reset" value="Reset" class="btn" />
                                </th>
                            </tr>
                        </table>
                    </fieldset>
                </form>
                <script>
                    let name = "";
                    let email = "";
                    let refund = "";
                    let details = "";
                    let cancel = "";

                    function validateFields() {

                        name = document.getElementById("name").value;
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

                        email = document.getElementById("email").value;

                        if (email === "") {
                            alert("Email cannot be empty");
                            return false;
                        } else if (!isValidEmail(email)) {
                            alert("Invalid email format");
                            return false;
                        }


                        contact = document.getElementById("cnumber").value;
                        if (contact === "") {
                            alert("Contact number cannot be empty.");
                            return false;
                        } else if (!isNumeric(contact) || contact.length !== 11) {
                            alert("Invalid contact number format.");
                            return false;
                        }

                        refund = document.getElementsByName("refund");
                        details = document.getElementById("rdetails");
                        cancel = document.getElementById("rCancellation");

                        let selectedType = false;
                        for (let i = 0; i < refund.length; i++) {
                            if (refund[i].checked) {
                                selectedType = true;
                                break;
                            }
                        }

                        if (!selectedType) {
                            alert("Please select a return type.");
                            return false;
                        }

                        if (details.value == "") {
                            alert("Return details cannot be empty.");
                            return false;
                        }

                        if (cancel.value == "") {
                            alert("Reason of cancellation cannot be empty.");
                            return false;
                        }
                        alert("Successful");
                        return true;
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

                    function ajax() {
                        let username = "<?php echo $username; ?>";

                        if (validateFields()) {
                            let rtrn = {
                                'name': name,
                                'username': username,
                                'email': email,
                                'details': details,
                                'refund': refund,
                                'cancel': cancel,
                                'contact': contact
                            }
                            /*if (user.hasOwnProperty('name')) {
                                alert("User name: " + user.username);
                            } else {
                                console.error("User name is not defined.");
                            }*/

                            let data = JSON.stringify(rtrn);
                            alert(data);
                            let xhttp = new XMLHttpRequest();
                            xhttp.open('POST', '../controller/CancellationCheck.php', true);
                            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                            xhttp.send("rtrn=" + data);


                            xhttp.onreadystatechange = function() {
                                if (this.readyState == 4 && this.status == 200) {
                                    alert(this.responseText);
                                    if (this.responseText.trim() === "Success") {
                                        window.location.href = "../view/login.php";
                                    }
                                }
                            }

                        }
                    }
                </script>

            </td>
        </tr>



        <tr>
            <td align="center" height="50px">Copyright © 2024. SAN Tour. All rights reserved</td>
        </tr>
    </table>
</body>


</html>