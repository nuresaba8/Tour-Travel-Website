

<html>

<head>
    <title>HTML form</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>

<body>
    <table border="0" cellpadding="5" cellspacing="0" width="80%" align="center">
      
        <tr rowspan="10">
            <td>
                <form action="../controller/signupCheck.php" method="post">
                    <fieldset>
                        <legend>
                            Registration
                        </legend>
                        <table border="0">
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
                                    <input type="text" name="email" placeholder="example@gmail.com" id="email">


                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Username:
                                </td>
                                <td>
                                    <input type="text" name="username" id="username">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Password:
                                </td>
                                <td>
                                    <input type="password" name="password" id="password">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Confirm Password:
                                </td>
                                <td>
                                    <input type="password" name="cpassword" id="cpassword">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Gender
                                </td>
                                <td>
                                    <input type="radio" name="gender" value="male" required> Male
                                    <input type="radio" name="gender" value="female" required> Female
                                    <input type="radio" name="gender" value="other" required> Other
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Date of Birth
                                </td>
                                <td>
                                    <input type="text" name="dob-day" size="1px" value="" /> /
                                    <input type="text" name="dob-month" size="1px" value="" /> /
                                    <input type="text" name="dob-year" size="1px" value="" />
                                    <i>(dd/mm/yyyy)</i>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>
                                    <hr>
                                </td>
                            </tr>
                            <tr>
                                <th align="left">
                                    <input type="button" name="submit" value="Submit" id="submit" class="btn" onclick="ajax()" />
                                    &nbsp;

                                </th>
                            </tr>
                        </table>

                    </fieldset>
                </form>

                <script>
                    let name = "";
                    let username = "";
                    let password = "";
                    let cpassword = "";
                    let email = "";
                    let gender = "";
                    let day = "";
                    let month = "";
                    let year = "";

                    function validateFields() {
                        name = document.getElementById('name').value;
                        username = document.getElementById("username").value.trim();
                        password = document.getElementById("password").value.trim();
                        cpassword = document.getElementById("cpassword").value.trim();
                        email = document.getElementById("email").value;

                        if (email === "") {
                            alert("Email cannot be empty");
                            return false;
                        } else if (!isValidEmail(email)) {
                            alert("Invalid email format");
                            return false;
                        }

                        let genders = document.getElementsByName("gender");
                        let isChecked = false;
                        for (let i = 0; i < genders.length; i++) {
                            if (genders[i].checked) {
                                isChecked = true;
                                gender = genders[i].value;
                                break;
                            }
                        }

                        if (!isChecked) {
                            alert("At least one gender must be selected");
                            return false;
                        }

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

                        if (username === "") {
                            alert("Username cannot be empty.");
                            return false;
                        }
                        if (password === "" || password.length < 8) {
                            alert("Password must be at least 8 characters long.");
                            return false;
                        }
                        if (password !== cpassword) {
                            alert("Password must match.");
                            return false;
                        }

                        if (!isValidPassword(password)) {
                            alert("Password must contain at least one letter, one number, and one special character.");
                            return false;
                        }

                        day = parseInt(document.getElementsByName("dob-day")[0].value);
                        month = parseInt(document.getElementsByName("dob-month")[0].value);
                        year = parseInt(document.getElementsByName("dob-year")[0].value);

                        if (isNaN(day) || isNaN(month) || isNaN(year)) {
                            alert("Date of birth cannot be empty!");
                            return false;
                        } else if (!isValidDate(day, month, year)) {
                            alert("Invalid date of birth");
                            return false;
                        }
                        return true;
                    }

                    function ajax() {

                        if (validateFields()) {
                            let user = {
                                'name': name,
                                'username': username,
                                'email': email,
                                'gender': gender,
                                'dob_day': day,
                                'dob_month': month,
                                'dob_year': year,
                                'password': password,
                                'cpassword': cpassword
                            }
                            /*if (user.hasOwnProperty('name')) {
                                alert("User name: " + user.username);
                            } else {
                                console.error("User name is not defined.");
                            }*/

                            let data = JSON.stringify(user);
                            alert(data);
                            let xhttp = new XMLHttpRequest();
                            xhttp.open('POST', '../controller/signupCheck.php', true);
                            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                            xhttp.send("user=" + data);


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

                    function isValidPassword(password) {
                        let hasLetter = false;
                        let hasNumber = false;
                        let hasSpecialChar = false;

                        for (let i = 0; i < password.length; i++) {
                            let char = password[i];

                            if ((char >= 'a' && char <= 'z') || (char >= 'A' && char <= 'Z')) {
                                hasLetter = true;
                            } else if (char >= '0' && char <= '9') {
                                hasNumber = true;
                            } else if (!(char >= 'a' && char <= 'z') && !(char >= 'A' && char <= 'Z') && !(char >= '0' && char <= '9')) {
                                hasSpecialChar = true;
                            }
                        }

                        return hasLetter && hasNumber && hasSpecialChar;
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
                    let isValidDate = (day, month, year) => {
                        if (year < 1900 || year > 2016) {
                            return false;
                        }
                        if (month < 1 || month > 12) {
                            return false;
                        }
                        if (day < 1 || day > 31) {
                            return false;
                        }
                        return true;
                    };
                </script>
            </td>
        </tr>
    </table>
</body>

</html> 