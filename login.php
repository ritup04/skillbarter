<?php
    $conn = mysqli_connect("localhost", "root", "", "skillzyDB");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        header("Location: home.html");
        exit;
    } else {
        echo "Invalid email or password.";
    }

    mysqli_close($conn);
?>
