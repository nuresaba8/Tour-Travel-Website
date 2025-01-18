<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAN TOUR</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            text-align: left;
        }

        header h2 {
            margin: 0;
            padding: 0;
        }

        nav {
            background-color: #f4f4f4;
            padding: 10px 20px;
        }

        nav a {
            text-decoration: none;
            color: #333;
            padding: 0 10px;
        }

        nav a:hover {
            color: #000;
        }

        section {
            padding: 20px;
        }

        button {
            margin: 5px 0;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        button:hover {
            background-color: #45a049;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }
    </style>
</head>

<body>
    <header>
        <h2>SAN TOUR</h2>
    </header>
    <nav>
        <a href="home.php">Home</a>
        <a href="tour.php">Tour</a>
        <a href="travel.php">Travel</a>
        <a href="menu.php">Menu</a>
        <span style="float: right;">
            <a href="login.php">Log Out</a>
        </span>
    </nav>
    <section>
        <button><a href="dashboard.php">Dashboard</a></button>
        <button><a href="bookinglist.php" class="btn">Booking list</a></button>
        <button><a href="transactionHistory.php" class="btn">Transaction History</a></button>
        <button><a href="viewprofile.php" class="btn">View Profile</a></button>
        <button><a href=" notification.php" class="btn">Notification</a></button>
        <button><a href=" tourplan.php" class="btn">Tour Planner</a></button>
    </section>
    <footer>
        Copyright © 2024. SAN Tour. All rights reserved
    </footer>
</body>

</html>