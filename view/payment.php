<?php
require_once('../model/userModel.php');
if (!isset($_COOKIE['flag'])) {
    header('location: login.php');
}
$username = $_COOKIE['username'];
?>

<html>

<head>
    <title>Payment</title>
    <link rel="stylesheet" href="../CSS/styleHome1.css">
</head>

<body>
    <table border="0" cellpadding="5" cellspacing="0" width="80%" align="center">
        <tr>
            <th>
                <h2 align="left" class="logo"><span>S</span>an <span>To</span>ur</h2>
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
                <form action="../controller/paymentCheck.php" method="post" enctype="">
                    <table border="0" cellspacing="0" cellpadding="0">
                        <fieldset>
                            <tr>
                                <th>
                                    Select Payment option:
                                </th>
                                <th>
                                    <input type="radio" name="payment" required> Visa
                                    <input type="radio" name="payment" required> Master Card
                                    <input type="radio" name="payment" required> American Express
                                    <input type="radio" name="payment" required> Paypal
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    Payment ID:
                                </th>
                                <th>
                                    <b><?php $paymentid = getpaymentid();
                                        $paymentid++;
                                        echo $paymentid; ?></b>

                                </th>
                            </tr>
                            <tr>
                                <th>
                                    Card Number:
                                </th>
                                <th>
                                    <input type="number" name="card_number" id="cardNumber">

                                </th>
                            </tr>
                            <tr>
                                <th>
                                    CVV Number:
                                </th>
                                <th>
                                    <input type="number" name="CVV_number" id="cvv">
                                </th>
                            </tr>

                            <tr>
                                <th>
                                    Expiry Date:
                                </th>
                                <td>
                                    <input type="number" name="month" size="1px" id="month" required> / <input type="number" name="year" size="1px" id="year" required>
                                    <i>(mm/yyyy)</i>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <th>
                                    Amount:
                                </th>
                                <th>
                                    <input type="text" name="Amount" id="amount" required>
                                </th>
                            </tr>
                            <tr>
                                <th colspan="3" align="right">
                                    <input type="button" name="submit" value="Pay" class="btn" onclick="ajax()" />
                                </th>
                            </tr>
                            <script>
                                let cvvInput;
                                let cvv;
                                let cardNumberInput;
                                let cardNumber;
                                let amountInput;
                                let amount;
                                let monthInput;
                                let month;
                                let yearInput;
                                let year;

                                let isNumeric = (str) => {
                                    for (let i = 0; i < str.length; i++) {
                                        if (str[i] < '0' || str[i] > '9') {
                                            return false;
                                        }
                                    }
                                    return true;
                                };

                                let validate = () => {
                                    cvvInput = document.getElementById("cvv");
                                    cvv = cvvInput.value.trim();
                                    cardNumberInput = document.getElementById("cardNumber");
                                    cardNumber = cardNumberInput.value.trim();
                                    amountInput = document.getElementById("amount");
                                    amount = amountInput.value.trim();
                                    monthInput = document.getElementById("month");
                                    month = monthInput.value.trim();
                                    yearInput = document.getElementById("year");
                                    year = yearInput.value.trim();

                                    if (year === "" || !isNumeric(year) || parseInt(year) <= 0) {
                                        alert("Year must be a positive numeric value.");
                                        return false;
                                    }

                                    if (month === "" || !isNumeric(month) || parseInt(month) <= 0 || parseInt(month) > 12) {
                                        alert("Month must be a positive numeric value between 1 and 12.");
                                        return false;
                                    }

                                    if (cardNumber === "" || !isNumeric(cardNumber) || cardNumber.length !== 16 || parseInt(cardNumber) <= 0) {
                                        alert("Card number must be a 16-digit positive numeric value.");
                                        return false;
                                    }
                                    if (cvv === "" || !isNumeric(cvv) || cvv.length !== 3 || parseInt(cvvInput) <= 0) {
                                        alert("CVV must be a three-digit numeric value.");
                                        return false;
                                    }
                                    if (amount === "" || !isNumeric(amount) || parseInt(amount) <= 0) {
                                        alert("Amount must be a positive numeric value.");
                                        return false;
                                    }
                                    return true;
                                };

                                function ajax() {
                                    let username = "<?php echo $username; ?>";
                                    let paymentid = "<?php echo $paymentid; ?>";
                                    let date = getCurrentDate();
                                    if (validate()) {
                                        let payment = {
                                            'paymentid': paymentid,
                                            'CVV_number': cvv,
                                            'cardNumber': cardNumber,
                                            'username': username,
                                            'amount': amount,
                                            'year': year,
                                            'month': month,
                                            'date': date
                                        }


                                        let data = JSON.stringify(payment);
                                        alert(data);
                                        let xhttp = new XMLHttpRequest();
                                        xhttp.open('POST', '../controller/paymentCheck.php', true);
                                        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                        xhttp.send("payment=" + data);


                                        xhttp.onreadystatechange = function() {
                                            if (this.readyState == 4 && this.status == 200) {
                                                alert(this.responseText);
                                                if (this.responseText.trim() === "Success") {
                                                    window.location.href = "../view/bookinglist.php";
                                                }
                                            }
                                        }
                                    }
                                };
                                let getCurrentDate = () => {
                                    let today = new Date();
                                    let dd = String(today.getDate()).padStart(2, '0');
                                    let mm = String(today.getMonth() + 1).padStart(2, '0'); // January is 0!
                                    let yyyy = today.getFullYear();

                                    return yyyy + '-' + mm + '-' + dd;
                                };
                            </script>
                        </fieldset>
                    </table>
                </form>
            </td>
        </tr>
        <div class="ht">
            <h3>Copyright © 2024. SAN Tour. All rights reserved</h3>
        </div>
    </table>
</body>


</html>