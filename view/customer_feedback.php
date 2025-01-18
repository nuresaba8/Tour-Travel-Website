<?php
#require_once('../model/userModel.php');
if (!isset($_COOKIE['flag'])) {
    header('location: login.php');
}
$username = $_COOKIE['username'];
?>

<html>

<head>
    <title>Customer Review</title>
    <link rel="stylesheet" href="../CSS/styleCommon.css">
</head>

<body>
    <table border="0" cellpadding="5" cellspacing="0" width="80%" align="center">
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
                <form action="../controller/customer_feedbackCheck.php" method="post">
                    <fieldset>
                        <legend>Customer Review</legend>
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
                                    Select option:
                                </td>
                                <td>
                                    <input type="radio" name="type" id="type" value="Tour"  required> Tour
                                    <input type="radio" name="type" id="type" value="Travel" required> Travel

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Service Name:
                                </td>
                                <td>
                                    <input type="text" name="sname" size="50px" id="serviceName" required>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Write your Review:
                                </td>
                                <td>
                                    <input type="text" name="review" style="width: 1000px; height: 120px;" id="review" required>
                                </td>
                            </tr>
                            <tr>
                                <th colspan="3" align="left">
                                    <input type="button" name="submit" value="Submit" class="btn" onclick="ajax()" />
                                </th>
                            </tr>
                        </table>
                    </fieldset>
                </form>
                <script>
                    let serviceTypeInputs = "";
                    let serviceNameInput = "";
                    let reviewInput = "";

                    function validateFields() {
                        serviceTypeInputs = document.getElementsByName("type");
                        serviceNameInput = document.getElementById("serviceName");
                        reviewInput = document.getElementById("review");

                        let selectedService = false;
                        for (let i = 0; i < serviceTypeInputs.length; i++) {
                            if (serviceTypeInputs[i].checked) {
                                selectedService = true;
                                break;
                            }
                        }

                        if (!selectedService) {
                            alert("Please select a service.");
                            return false;
                        }

                        if (serviceNameInput.value.trim() === "") {
                            alert("Service Name field cannot be empty.");
                            return false;
                        }

                        if (reviewInput.value.trim() === "") {
                            alert("Review field cannot be empty.");
                            return false;
                        }

                        return true;
                    }

                    function ajax() {
                        let username = "<?php echo $username; ?>";

                        if (validateFields()) {
                            let selectedType;
                            for (let i = 0; i < serviceTypeInputs.length; i++) {
                                if (serviceTypeInputs[i].checked) {
                                    selectedType = serviceTypeInputs[i].value;
                                    break;
                                }
                            }
                            let feedback = {
                                'type': selectedType,
                                'sname': serviceNameInput.value,
                                'username': username,
                                'review': reviewInput.value
                            }


                            let data = JSON.stringify(feedback);
                            //alert(data);
                            let xhttp = new XMLHttpRequest();
                            xhttp.open('POST', '../controller/customer_feedbackCheck.php', true);
                            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                            xhttp.send("feedback=" + data);


                            xhttp.onreadystatechange = function() {
                                if (this.readyState == 4 && this.status == 200) {
                                    alert(this.responseText);
                                    if (this.responseText.trim() === "Success") {
                                        window.location.href = "../view/home.php";
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