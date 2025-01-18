<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        table {
            border-collapse: collapse;
            width: 60%;
            margin: auto;
            margin-top: 50px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        input[type="number"] {
            width: 100px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        span.right {
            float: right;
        }

        footer {
            text-align: center;
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <table border='1'>
        <tr>
            <th colspan="4">
                <h2 align="left">SAN TOUR</h2>
                <h3>
                    <a href="home.php">Home</a>&nbsp;&nbsp;
                    <a href="tour.php">Tour</a>&nbsp;&nbsp;
                    <a href="travel.php">Travel</a>&nbsp;&nbsp;
                    <a href="menu.php">Menu</a>
                    <span class="right">
                        <a href="login.php">Login</a>&nbsp;&nbsp;
                        <a href="registration.php">Signup</a>
                    </span>
                </h3>
            </th>
        </tr>
        <form method='get' enctype=''>
            <tr>
                <th align='center' colspan="2">
                    <p>Currency Conversion</p>
                </th>
            </tr>
            <tr>
                <th>
                    <input type='number' name='fnumber'>
                </th>
                <th>
                    <p>US Dollar</p>
                </th>
            </tr>
            <tr>
                <th>
                    <input type='number' value="<?= $result2 ?>" name='snumber' readonly>
                </th>
                <th>
                    <p>Bangladeshi Taka</p>
                </th>
            </tr>
            <tr>
                <th colspan="2">
                    <p>Exchange Rate: 1 Dollar = 80tk</p>
                    <button type="submit" name="submit" value="submit">Convert</button>
                </th>
            </tr>
        </form>
        <tr>
            <td colspan="4" align="center" height="50px">Copyright © 2024. SAN Tour. All rights reserved</td>
        </tr>
    </table>
    <footer>Footer content here</footer>
</body>
</html>
