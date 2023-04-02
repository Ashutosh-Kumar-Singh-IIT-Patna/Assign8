<?php
    ini_set('display_errors', 1);
    error_reporting(-1);
    session_start();

    $conn = mysqli_connect('localhost', 'root', 'Ashutosh@2003', 'dblab8');
    // Check connection
    if ($conn === false) {
        echo 'Error: Could not connect. ';
        die('Error: Could not connect. ' . mysqli_connect_error());
    }
    if (isset($_POST['email']) && isset($_POST['password'])) {
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $email = validate($_POST['email']);
        $password = validate($_POST['password']);

        if (empty($email)) {
            header('Location: login.php?error=User Name is required');
            exit();
        } elseif (empty($password)) {
            header('Location: login.php?error=password is required');
            exit();
        } else {
            $sql = "select * from users where email='$email' and password='$password'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);
                if ($row['email'] === $email && $row['password'] === $password) {
                    echo 'Logged in!';
                    $_SESSION['logged_in'] = true;
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['first_name'] = $row['first_name'];
                    $_SESSION['last_name'] = $row['last_name'];
                    $_SESSION['password'] = $row['password'];
                    header('Location: home.php');
                } else {
                    header(
                        'Location: login.php?error=Incorect User name or password'
                    );
                    exit();
                }
            } else {
                header(
                    'Location: login.php?error=Incorect User name or password'
                );
                exit();
            }
        }
    } else {
        header('Location: login.php');
        exit();
    }
?>