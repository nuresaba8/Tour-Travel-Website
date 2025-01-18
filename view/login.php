<?
require_once('../controller/logoutCheck.php');
require_once('../controller/loginCheck.php');
?>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="../Css/styleLogin.css">
</head>

<body>
    <div class="center">
        <h1>Login</h1>
        <form method="post" action="../controller/loginCheck.php">
            <div class="txt_field">
                <input type="text" name="username" id="username" required>
                <span></span>
                <label>Username</label>
            </div>
            <div class="txt_field">
                <input type="password" name="password" id="password" required>
                <span></span>
                <label>Password</label>
            </div>
            <div class="pass">
                <label><input type="checkbox" name="check"> Remember Me</label>
                <a href="../view/forgotpassword.php">Forgot Password?</a>
            </div>
            <input type="submit" name="submit" value="Login" onclick="validateForm()">
            <div class="signup_link">
                Don't have an account? <a href="../view/registration.php">Signup</a>
            </div>
        </form>
    </div>

    <script>
        let validateForm = () => {
            let email = document.getElementById('username').value;
            let password = document.getElementById('password').value;
            let xhttp = new XMLHttpRequest();
            if (email == "" || password == "") {
                alert("null usernamepassword");
            } else {
                xhttp.open('POST', '../controller/loginCheck.php', true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send('username=' + email + '&password=' + password);
                xhttp.onreadystatechange = function() {
                    if (this.responseText.trim() === "home") {
                        window.location.href = "../view/home1.php";
                    } else if (this.responseText.trim() === "admin") {
                        window.location.href = "../view/admindashboard.php";
                    } else if (this.responseText.trim() === "host") {
                        window.location.href = "../view/hostdashboard.php";
                    } 
                }
            }
        }
    </script>

</body>

</html>