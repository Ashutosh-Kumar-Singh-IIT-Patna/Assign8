<!DOCTYPE html>
<html>
<head>
    <title>Insert Page</title>
</head>
<body>
    <center>
        <?php
            ini_set('display_errors', 1);
            error_reporting(-1);
            $conn = mysqli_connect('localhost', 'root', 'Ashutosh@2003', 'dblab8');
            // Check connection
            if ($conn === false) {
                echo 'Error: Could not connect. ';
                die('Error: Could not connect. ' . mysqli_connect_error());
            }
            $first_name = $_REQUEST['first_name'];
            $last_name = $_REQUEST['last_name'];
            $email = $_REQUEST['email'];
            $password = $_REQUEST['password'];
            $confirm_password = $_REQUEST['confirm_password'];
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
            //checking first name
            if (!preg_match("/^[a-zA-Z-' ]*$/",$first_name)){
                echo "<h1> Only letters allowed in First Name !<h1>";
                exit();
            }

            //checking last name
            if (!preg_match("/^[a-zA-Z-' ]*$/",$last_name)){
                echo "<h1> Only letters allowed in Last Name !<h1>";
                exit();
            }

            //password strength
            $number=preg_match('@[0-9]@',$password);
            $uppercase=preg_match('@[A-Z]@',$password);
            $lowercase=preg_match('@[a-z]@',$password);
            $specialChars=preg_match('@[^\w]@',$password);
            
            if(strlen($password)<8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
                echo "Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.";
                exit();
            }
            if($confirm_password === $password){
                $sql = "insert into users values (NULL,'$first_name','$last_name','$email','$password')";
            }else{
                echo "Password and Confirm password not matching !";
                exit();
            }
            // mysqli_query($conn, $sql);
            if (mysqli_query($conn, $sql)) {
                echo '<h2>Data stored in a database successfully.</h2>';
            } else {
                echo "Insertion failed !";
            }
            // Close connection
            mysqli_close($conn);
        ?>
        <form action="login.php">
            <button type="submit">
                Login
            </button>
        </form>
    </center>
</body>
</html>