<html>
<head>
    <title>Forget Password</title>
</head>
<body>
        <form method="post" action="forgetpassCheck.php" enctype="">
        <table border="1" align="center"><tr><td>
        <table border="0" align="center">
            <h3 align="center">Please enter your details</h3>
            
            <tr>
                <td>Email:</td>
            </tr>
            <tr>
                <td><input type="email" name="email" value="" /></td>
                <td><input type="submit" name="code" value="Code" /></td>
            </tr>
            <tr>
                <td>Code:</td>
            </tr>
            <tr>
                <td><input type="number" name="pcode" value="" /></td>
            </tr>
            <tr>
                <td>Password: </td>
                
            </tr>
            <tr>
                <td><input type="password" name="password" value="" /> </td>
            </tr>
            <tr>
               
                <td>Re-password: </td>
                
            </tr>
            <tr>
                <td><input type="password" name="re-password" value="" /> </td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="Submit" /></td>
            </tr>
        </table>
</td></tr></table>
        </form>
</body>
</html>