<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "responsi";

    $connection = new mysqli($host, $username, $password, $database);

    if($connection->connect_error){
        die("Connect error: ". $connection->connect_error);
    }

?>

<?php


    $user = $_POST['username'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM staff WHERE username = '$user' AND password = '$pass'";
    $query = $connection->query($sql);

    $data = $query->fetch_object();
    $check = $query->num_rows;

    if($check > 0){
        session_start();
        $_SESSION['full_name'] = $data->full_name;
        $_SESSION['username'] = $user;
        header("location:homepage.php");
    }else{
        header("location:Login.php?message=invalid");
    }


?>