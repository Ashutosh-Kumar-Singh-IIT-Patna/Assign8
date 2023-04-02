<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Registration</title>
    </head>
    <body>
        <center>
            <?php
                ini_set('display_errors', 1);
                error_reporting(-1);
            ?>
            <h1>User Registration Form</h1>
            <br><br>
            <form action="insert.php" method="post">
                <p>
                    <label for="first_name">First name:</label>
                    <input type="text" name="first_name" id="first_name">
                </p>
                <p>
                    <label for="last_name">Last name:</label>
                    <input type="text" name="last_name" id="last_name">
                </p>
                <p>
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email">
                </p>
                <p>
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
                </p>
                <p>
                    <label for="confirm_password">Confirm Password:</label>
                    <input type="password" name="confirm_password" id="password">
                </p>
                <br>
                <input type="submit" value="Submit">
            </form>
            <br><br>
            <form action="login.php">
                <button type="submit">
                    Login
                </button>
            </form>
        </center>
    </body>
</html>