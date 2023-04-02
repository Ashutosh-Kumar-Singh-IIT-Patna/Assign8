<?php
    session_start();
    ini_set('display_errors', 1);
    error_reporting(-1);

    $id = $_SESSION['id'];

    $conn = mysqli_connect('localhost', 'root', 'Ashutosh@2003', 'dblab8');

    // Check connection
    if($conn === false){
        echo 'Error: Could not connect to the database . ';
        die('Error: Could not connect to the datbase ' . mysqli_connect_error());
    }

    if( isset($_POST['password']) && isset($_POST['confirm_password'])){
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $password = validate($_POST['password']);
        $confirm_password = validate($_POST['confirm_password']);

        //password strength
        $number=preg_match('@[0-9]@',$password);
        $uppercase=preg_match('@[A-Z]@',$password);
        $lowercase=preg_match('@[a-z]@',$password);
        $specialChars=preg_match('@[^\w]@',$password);
        
        if(strlen($password)<8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
            echo "Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.";
            exit();
        }
        if(empty($password)){
            header('Location: update_password.php?error=password is required');
            exit();
        }elseif(empty($confirm_password)){
            header('Location: update_password.php?error=confirm password is required');
            exit();
        }else{
            $sql = "select * from users where id='$id'";

            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);
                if($confirm_password !== $password){
                    echo("Password and Confirm Password are not matching .");
                    exit();
                }
                $sql = "update users set password='$password' where id='$id'";
                $result = mysqli_query($conn, $sql);
                if($result){
                    echo '<br><br><center><h2>Password Updated !</h2></center><br><br>';
                }else{
                    echo '<br><br><center><h2>Password updation failed !</h2></center><br><br>';
                }
            }else{
                header(
                    'Location: home.php?error=Incorect data'
                );
                exit();
            }
        }
    }else{
        header('Location: home.php');
        exit();
    }
?>

<center>
    <form action="logout.php">
        <button type="submit">
            Log Out
        </button>
    </form>
</center>