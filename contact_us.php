<?php
    // Database credentials
    $db_hostname = "localhost"; // Use "localhost" or "127.0.0.1" for local MySQL server
    $db_username = "root"; // Ensure this matches your MySQL username
    $db_password = "#"; // Ensure this matches your MySQL password
    $db_name = "Travel"; // Database name

    // Create connection
    $conn = new mysqli($db_hostname, $db_username, $db_password, $db_name);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Sanitize form data to prevent SQL injection
    $name = mysqli_real_escape_string($conn, $name);
    $email = mysqli_real_escape_string($conn, $email);
    $phone = mysqli_real_escape_string($conn, $phone);
    $subject = mysqli_real_escape_string($conn, $subject);
    $message = mysqli_real_escape_string($conn, $message);

    // Insert data into database
    $sql = "INSERT INTO contact (Name, Email, Phone, Subject, Message) 
            VALUES ('$name', '$email', '$phone', '$subject', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
?>