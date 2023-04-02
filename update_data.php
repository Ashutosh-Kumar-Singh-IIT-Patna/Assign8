<?php
    session_start();
    ini_set('display_errors', 1);
    error_reporting(-1);
    $id = $_SESSION['id'];

    $conn = mysqli_connect('localhost', 'root', 'Ashutosh@2003', 'dblab8');

    if ($conn === false) {
        echo 'Error: Could not connect to the Database ';
        die('Error: Could not connect to the Database' . mysqli_connect_error());
    }
    if ( isset($_POST['first_name']) && isset($_POST['last_name'])) {
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $first_name = validate($_POST['first_name']);
        $last_name = validate($_POST['last_name']);
        
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

        if (empty($first_name)) {
            header('Location: update_data.php?error=First Name is required');
            exit();
        } elseif (empty($last_name)) {
            header('Location: update_data.php?error=Last name is required');
            exit();
        } else {
            $sql = "select * from users where id='$id'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);

                $sql = "update users set first_name='$first_name', last_name='$last_name' where id='$id'";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    $SESSION['first_name'] = $first_name;
                    $SESSION['last_name'] = $last_name;
                    echo '<br><br><center><h2>Data Updated !</h2></center><br><br>';
                } else {
                    echo '<br><br><center><h2>Data Updation failed !</h2></center><br><br>';
                }
            } else {
                header('Location: home.php?error=Incorect data');
                exit();
            }
        }
    } else {
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