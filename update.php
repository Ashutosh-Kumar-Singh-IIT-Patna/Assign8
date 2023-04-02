<?php
    session_start();
    ini_set('display_errors', 1);
    error_reporting(-1);
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
?>

<html>
    <body>
        <center>
            <br><br>
            <h2>For updating the data : </h2>
            <form action="Update_data.php" method="post">
                <h3>
                    <label for="first_name">First Name:</label> 
                    <input type="text" name="first_name" value="<?php echo $first_name ?>" required/>
                </h3>
                <h3>
                    <label for="last_name">Last Name:</label>
                    <input type="text" name="last_name" value="<?php echo $last_name ?>" required/>
                </h3>
                <br>
                <button type="submit">Update Data</button>
            </form>
            <br><br>
            <h2>For updating the password : </h2>
            <form action="update_password.php" method="post">
                <h3>
                    <label>Password:</label>
                    <input type="password" name="password" placeholder="Password" required/>
                </h3>
                <h3>
                    <label>Confirm Password:</label>
                    <input type="password" name="confirm_password" placeholder="Confirm Password" required/>
                </h3>
                <br>
                <button type="submit">Update Password</button>
            </form>
            <br><br>
            <form action="logout.php">
                <button type="submit">
                    Log Out
                </button>
            </form>
        </center>
    </body>
</html>