<head>
    <script type="text/javascript">
        var baseUrl = 'http://localhost/assign8/';
        function delete_confirmation() {
            if (confirm("Do you really want to delete your account ?")){
                location.href = baseUrl + '/delete.php';
            }
        }
    </script>
</head>

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
            <h1>Welcome,</h1>
            <h2>
                <?php echo($first_name); echo(" "); echo($last_name);?>
            </h2>
            <br><br>
            <form action="view.php">
                <button type="submit">
                    View Info
                </button>
            </form>
            <br><br>
            <form action="update.php">
                <button type="submit">
                    Update Info
                </button>
            </form>
            <br><br>
            <?php
                echo '<button type="button" onclick="delete_confirmation()">Delete Account</button>';
            ?>
            <br><br>
            <br><br>
            <form action="logout.php">
                <button type="submit">
                    Log Out
                </button>
            </form>
        </center>
    </body>
</html>