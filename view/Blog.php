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
        th button {
            padding: 8px 15px;
            border: none;
            background-color: #007bff;
            color: #ffffff;
            cursor: pointer;
            border-radius: 5px;
        }
        th button:hover {
            background-color: #0056b3;
        }
        th p {
            margin: 10px 0;
            line-height: 1.6;
        }
        td {
            padding: 10px;
            border-bottom: 1px solid #dddddd;
        }
        input[type="text"] {
            padding: 8px;
            border: 1px solid #dddddd;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <table border="0" cellpadding="6" cellspacing="0">
        <tr>
            <th colspan="4">
                <h2>SAN TOUR</h2>
                <h3>
                    <a href="home.php">Home</a>
                    <a href="tour.php">Tour</a>
                    <a href="travel.php">Travel</a>
                    <a href="menu.php">Menu</a>
                    <span style="float: right">
                        <a href="login.php">Login</a>
                        <a href="registration.php">Signup</a>
                    </span>
                </h3>
            </th>
        </tr>
        <tr>
            <th align="right" colspan="4">
                <button>Search</button>
            </th>
        </tr>
        <tr>
            <th>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Architecto commodi,
                dolorum animi mollitia nihil, unde repellat ea ex labore ab sunt? Error consectetur
                adipisci quia, ducimus iure eius quo totam? Lorem ipsum dolor sit amet consectetur
                adipisicing elit. Dignissimos ut facilis animi magnam, tenetur deserunt dolorem esse neque quod nihil odit dolorum nam 
                voluptate alias accusamus eligendi qui debitis laborum!</p>
                <button>Like</button>
                <button>Dislike</button>
            </th>
        </tr>
        <tr>
            <th>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Architecto commodi,
                dolorum animi mollitia nihil, unde repellat ea ex labore ab sunt? Error consectetur
                adipisci quia, ducimus iure eius quo totam? Lorem ipsum dolor sit amet consectetur
                adipisicing elit. Dignissimos ut facilis animi magnam, tenetur deserunt dolorem esse neque quod nihil odit dolorum nam 
                voluptate alias accusamus eligendi qui debitis laborum!</p>
                <button>Like</button>
                <button>Dislike</button>
            </th>
        </tr>
        <tr>
            <th>
                <input type="text" name="lname">
                <button>Like</button>
                <button>Dislike</button>
            </th>
        </tr>
        <tr>
            <td colspan="4" align="center" height="50px">Copyright © 2024. SAN Tour. All rights reserved</td>
        </tr>
    </table>
</body>
</html>
