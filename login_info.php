<?php
    $email = $_POST['email'];
    $password = $_POST['password'];
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "rms";
    $conn = new mysqli ($host, $user, $pass, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if(isset($_POST['Submit'])) {
        $query = "select * from admin where email=\"$email\" and passwd=\"$password\"";
        var_dump($query);
        $result = $conn->query($query);
        if($result->num_rows > 0) {
            echo "Login Successfull";
        }
        else {
            echo "Invalid email/password";
        }
    }


    
?>