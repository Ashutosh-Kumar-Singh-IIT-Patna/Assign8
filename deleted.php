<?php
    ini_set('display_errors', 1);
    error_reporting(-1);
    session_start();
    unset($_SESSION['id']);
    unset($_SESSION['password']);
    unset($_SESSION['email']);
    session_destroy();
?>

<html>
    <body>
        <center>
            <br><br>
            <h2>Account Deleted !</h2>
            <br><br>
            <form action="reg.php">
                <button type="submit">
                    Register
                </button>
            </form>
        </center>
    </body>
</html>