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
            <h3>
                First Name: <?php echo($first_name); ?>
            </h3>
            <h3>
                Last Name: <?php echo($last_name); ?>
            </h3>
            <h3>
                Email: <?php echo($email); ?>
            </h3>
            <br><br>
            <form action="logout.php">
                <button type="submit">
                    Log Out
                </button>
            </form>
        </center>
    </body>
</html>