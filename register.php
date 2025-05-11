<?php
    $conn = mysqli_connect("localhost", "root", "");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "CREATE DATABASE IF NOT EXISTS skillzyDB";
    mysqli_query($conn, $sql);

    $conn = mysqli_connect("localhost", "root", "", "skillzyDB");

    $sql = "CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        full_name VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL UNIQUE,
        phone VARCHAR(20) NOT NULL,
        country VARCHAR(50) NOT NULL,
        city VARCHAR(50) NOT NULL,
        password VARCHAR(50) NOT NULL,
        gender VARCHAR(20) NOT NULL
    )";
    mysqli_query($conn, $sql);

    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $gender = $_POST['gender'];

    if ($password !== $confirm_password) {
        echo "Passwords do not match.";
        exit;
    }

    $sql = "INSERT INTO users (full_name, email, phone, country, city, password, gender)
            VALUES ('$full_name', '$email', '$phone', '$country', '$city', '$password', '$gender')";

    if (mysqli_query($conn, $sql)) {
        header("Location: home.html");
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
?>
