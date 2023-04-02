<?php
    session_start();
    ini_set('display_errors', 1);
    error_reporting(-1);
    $id = $_SESSION['id'];
    $conn = mysqli_connect('localhost', 'root', 'Ashutosh@2003', 'dblab8');
    // Check connection
    if ($conn === false) {
        echo 'Error: Could not connect. ';
        die('Error: Could not connect. ' . mysqli_connect_error());
    }
    $sql = "delete from users where id = $id ";
    $result = mysqli_query($conn, $sql);
    if($result){
        header("Location: deleted.php");
    }
?>