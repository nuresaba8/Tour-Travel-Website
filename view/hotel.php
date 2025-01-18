<?php

    if(!isset($_COOKIE['flag'])){
        header('location: ../view/login.php');
    }
    else{
        $username=$_COOKIE['username']; 
    }
   

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hotel Listings</title>
    <link rel="stylesheet" href="../css/styleAbout.css">
    <style>
        span{
    color: #fabd02;
}
        </style>
</head>
<body>
<table border="1" align="center">
<tr >
            <th >
                <h2 align="left">SAN TOUR</h2>
                <h3>
                    <a href="tourCalendar.php">Tour Calendar</a>&nbsp;&nbsp;
                    <a href="reservation.php">Reserve Now!</a>&nbsp;&nbsp;
                    <a href="about.php">About</a>&nbsp;&nbsp;
                    <a href="notification.php">Notification</a>&nbsp;&nbsp;
                    <a href="wishlist.php">Wish List</a>
                    Logged in as <?php echo $username ?> 
                </h3><br>
            </th>
        </tr>
        <tr>
            <td>
    <h1 align="center">Hotel Listings</h1>
    <h2>Hotel 1</h2>
    <p>Location: Downtown</p>
    <p>Amenities: Free Wi-Fi, fitness center, pool, restaurant</p>
    <p>Room Types: Standard, Deluxe, Suite</p>
    <p>Prices: Starting at $100 per night</p>
    <p>User Ratings: 4.5/5 stars</p>
    <h2>Hotel 2</h2>
    <p>Location: Uptown</p>
    <p>Amenities: Free Wi-Fi, fitness center, restaurant</p>
    <p>Room Types: Standard, Deluxe</p>
    <p>Prices: Starting at $150 per night</p>
    <p>User Ratings: 4.2/5 stars</p>
    <h2>Hotel 3</h2>
    <p>Location: Beachfront</p>
    <p>Amenities: Free Wi-Fi, pool, restaurant, beach access</p>
    <p>Room Types: Standard, Deluxe, Suite</p>
    <p>Prices: Starting at $200 per night</p>
    <p>User Ratings: 4.7/5 stars</p>
    <h2>Booking Options</h2>
    <p>Book directly through our website or via third-party booking platforms. Click <a href="booking.php">here</a> to access our booking form.</p>
    <h2>Hotel Reviews</h2>
    <p>Hotel 1: "Great location, clean rooms, and friendly staff."</p>
    <p>Hotel 2: "Comfortable beds and a convenient location."</p>
    <p>Hotel 3: "Beautiful views and excellent service."</p>
    <h2>Special Offers</h2>
    <p>Book a week-long stay and receive a 10% discount.</p>
    <h2>Travel Tips</h2>
    <p>Consider your budget, location, and desired amenities when choosing accommodations.</p>
    <p>Look for budget-friendly options such as hostels or vacation rentals.</p>
    <p>Make reservations early to ensure availability and the best rates.</p>
    </td>
        </tr>
        <tr>
                <td>
                <a href="../controller/logoutCheck.php"><button>Log out</button></a>
                </td>
            </tr>
        <tr>
            <td align="center" height="50px">Copyright © 2024. SAN Tour. All rights reserved</td>
            </tr>
    </table>
</body>
</html>
