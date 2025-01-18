<?php
require_once('../model/userModel.php');
if (isset($_COOKIE['flag'])) {
    $username = $_COOKIE['username'];
    $role = getRole($username);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css"
    rel="stylesheet"
    
    />

    <link rel="stylesheet" href="../CSS/styleTravel.css"/>
    <title>Home</title>
   
</head>
<body>
    <nav>
                <div  class="nav__logo">San Tour</div>
                <ul class="nav__links">
                    <li class="link"><a href="home1.php" > Home</a></li>
                    <li  class="link"><a href="tour.php">Tour</a></li>
                    <li  class="link"><a href="travel.php">Travel</a></li>
                    <li  class="link"><a href="about.php">About Us</a></li>
                    <?php if ($role == 'user') { ?>
                       <li class="link"> <a href="menu.php" >Menu</a></li>
                        <?php } elseif ($role == 'host') { ?>
                            <li class="link"> <a href="hostdashboard.php" >Menu</a></li>
                            <?php } else { ?>
                                <li class="link"><a href="admindashboard.php" >Menu</a></li>
                                <?php } ?> 
                              
                                    <?php
                                    if (!isset($_COOKIE['flag'])) {
                                    ?>
                                        <li class="link"><a href="login.php" >Login</a></li>
                                        <li class="link"><a href="registration.php">Signup</a></li>
                                    <?php } else { ?>
                                        Logged in as <li class="link"><a href="../view/viewprofile.php" > <?php echo $username; ?> </a></li>
                                        <li class="link"><a href="../controller/logoutCheck.php">Logout</a></li>
                                    <?php } ?>

                                
                    </ul>
        
    </nav>
 
                <h1 align="center">Transportation Services</h1>
                <h2>Transportation Options</h2>
                <p><b>Taxis:</b>Available throughout the city. Prices vary depending on the distance and time of travel.</p>
                <p><b>Rental Cars:</b> Available at local airports and car rental companies. Prices vary depending on the type of car and duration of rental.</p>
                <p><b>Public Transportation:</b> Buses, subways, and trains are available in the city. Prices vary depending on the type of transportation and distance traveled.</p>
                <p><b>Ride-Sharing Services:</b> Uber and Lyft are available in the city. Prices vary depending on the distance and time of travel.</p>
                <h2>Tour Itineraries</h2>
                <p><b>Guided Bus Tours:</b> Available daily at 10:00 AM and 2:00 PM. Prices start at $20 per person.</p>
                <p><b>Boat Cruises:</b> Available daily at 11:00 AM and 3:00 PM. Prices start at $30 per person.</p>
                <p><b>Helicopter Rides:</b> Available daily at 10:00 AM and 2:00 PM. Prices start at $100 per person.</p>
                <p><b>Booking Information:</b> Call (123) 456-7890 or visit our website to book a tour.</p>
                <h2>Local Attractions</h2>
                <p><b>Attraction 1:</b> Located at 123 Main Street. <b>Recommended transportation:</b> Bus or taxi.</p>
                <p><b>Attraction 2:</b> Located at 456 Park Avenue. <b>Recommended transportation:</b> Subway or walk.</p>
                <p><b>Attraction 3:</b> Located at 789 Broadway. <b>Recommended transportation:</b> Car or ride-sharing service.</p>
                <h2>Travel Tips</h2>
                <p><b>Local Traffic Regulations:</b> Follow all traffic laws and signs.</p>
                <p><b>Parking Facilities:</b> Parking garages and lots are available throughout the city.</p>
                <p><b>Public Transportation Maps:</b> Available at all subway stations and online.</p>
                <p><b>Navigating Unfamiliar Roads or Transportation Systems:</b> Use a GPS or map to help navigate.</p>

        <div class="footer__bar">
      Copyright © 2024. SAN Tour. All rights reserved
      </div>

</body>

</html>