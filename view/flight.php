<?php

if (!isset($_COOKIE['flag'])) {
    header('location: ../view/login.php');
    
}
else{
    $username = $_COOKIE['username'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Flight Website</title>
    <link rel="stylesheet" href="../css/styleAbout.css">
    <style>
        span {
            color: #fabd02;
        }
    </style>
</head>

<body>
    <form method="post" action="../controller/flightCheck.php">
        <table border="0" align="center">
            <tr>
                <th>
                    <h2 align="left">SAN <span> TOUR</span></h2>
                    <h3>
                        <a href="tourCalendar.php" class="bt">Tour Calendar</a>&nbsp;&nbsp;
                        <a href="reservation.php" class="bt">Reserve Now!</a>&nbsp;&nbsp;
                        <a href="about.php" class="bt">About</a>&nbsp;&nbsp;
                        <a href="notification.php" class="bt">Notification</a>&nbsp;&nbsp;
                        <a href="wishlist.php" class="bt">Wish List</a>&nbsp;&nbsp;
                        Logged in as <span><?php echo $username ?> </span>
                    </h3><br>
                </th>
            </tr>
            <tr>
                <td>
                    <h1 align="center">Flight</h1>
                    <form method="post" action="../controller/flightCheck.php" enctype="multipart/form-data">
                        <table border="0" align="center">
                            <tr>
                                <td>Departure City:</td>
                                <td><input type="text" name="departure_city" id="departure_city"></td>
                            </tr>
                            <tr>
                                <td>Destination:</td>
                                <td><input type="text" name="destination" id="destination"></td>
                            </tr>
                            <tr>
                                <td>Travel Dates:</td>
                                <td><input type="date" name="departure_date" id="departure_date"> to <input type="date" name="return_date" id="return_date"></td>
                            </tr>
                            <tr>
                                <td>Number of Passengers:</td>
                                <td><input type="number" name="num_passengers" id="num_passengers" min="1" max="50"></td>
                            </tr>


                            <tr>
                                <td align="center" colspan="2"><input type="button" name="submit" value="Search Flights" onclick="validateForm()" class="bt"></td>
                            </tr>

                        </table>
                    </form>

                    <h1 style="font-size: 24px; color: #333;">Flight Deals and Offers</h1>
                    <ul style="list-style-type: disc;">
                        <li>Discounted fares to popular destinations</li>
                        <li>Package deals for flights and hotels</li>
                        <li>Promotions for specific airlines and routes</li>
                    </ul>

                    <h1 style="font-size: 24px; color: #333;">Destination Guides</h1>
                    <ul style="list-style-type: disc;">
                        <li>Recommended flights to popular destinations</li>
                        <li>Travel tips and advice</li>
                        <li>Attractions and things to do</li>
                    </ul>

                    <h1 style="font-size: 24px; color: #333;">Flight Booking Platform</h1>
                    <p style="font-size: 16px; color: #333;">Search for and book flights directly on our website using our flight booking platform or API integration.</p>

                    <h1 style="font-size: 24px; color: #333;">Travel Resources</h1>
                    <ul style="list-style-type: disc;">
                        <li>Flight comparison tools</li>
                        <li>Airline reviews and ratings</li>
                        <li>Travel guides and itineraries</li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="../controller/logoutCheck.php" class="bt">Log out</a>
                </td>
            </tr>
            <tr>
                <td align="center" height="50px">Copyright © 2024. SAN Tour. All rights reserved</td>
            </tr>
        </table>
    </form>

    <script>
        let validateForm = () => {
            let departure_city = document.getElementById('departure_city').value;
            let destination = document.getElementById('destination').value;
            let departure_date = document.getElementById('departure_date').value;
            let return_date = document.getElementById('return_date').value;
            let num_passengers = document.getElementById('num_passengers').value;
            if (departure_city == "" || destination == "" || departure_date == "" || return_date == "" || num_passengers == "") {
                alert("Fields cannot be empty");
            } else if (!checkFirstChr(departure_city[0])) {
                alert("departure_city must start with a letter");
            } else if (!checkChr(departure_city)) {
                alert("departure_city can only contain letters (a-z or A-Z), dot, dash, or space");
            } else if (!checkFirstChr(destination[0])) {
                alert("destination must start with a letter");
            } else if (!checkChr(destination)) {
                alert("destination can only contain letters (a-z or A-Z), dot, dash, or space");
            } else if (!validateDate(departure_date)) {
                alert("Enter a valid date");
            } else if (!validateDate(return_date)) {
                alert("Enter a valid date");
            } else if (!validateNumPassengers(num_passengers)) {
                alert("Enter a valid number");
            } else {


                let flight = {
                    'departure_city': departure_city,
                    'destination': destination,
                    'departure_date': departure_date,
                    'return_date': return_date,
                    'num_passengers': num_passengers
                }

                let data = JSON.stringify(flight);
                let xhttp = new XMLHttpRequest();
                xhttp.open('POST', "../controller/flightCheck.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send('flight=' + data);

                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        alert(this.responseText);
                        if (this.responseText.trim() === "Success") {
                            window.location.href = "../view/search.php";
                        }
                    }
                }


            }

        }

        function validateDate(departure_date) {
            var inputDate = departure_date;
            var currentDate = new Date();
            var enteredDate = new Date(inputDate);
            if (inputDate.trim() === "" || isNaN(enteredDate.getTime())) {
                alert("Please enter a valid date.");
                return false;
            }
            if (enteredDate < currentDate) {
                alert("Please enter a future date.");
                return false;
            }
            return true;
        }

        function validateNumPassengers(num_passengers) {
            var numPassengers = num_passengers;
            if (numPassengers < 1 || numPassengers > 50) {
                alert("Number of passengers must be between 1 and 50.");
                return false;
            }
            return true;
        }


        let checkFirstChr = (chr) => {
            return (chr >= 'A' && chr <= 'Z') || (chr >= 'a' && chr <= 'z');
        }

        let checkChr = (name) => {
            for (let i = 0; i < name.length; i++) {
                let chr = name[i];
                if (!((chr >= 'A' && chr <= 'Z') || (chr >= 'a' && chr <= 'z') || chr === '.' || chr === '-' || chr === ' ')) {
                    return false;
                }
            }
            return true;
        }
    </script>
</body>

</html>