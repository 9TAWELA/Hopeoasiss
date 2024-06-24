<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $userType = $_POST['userType'];
    $photo = $_FILES['photo']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($photo);

    // Simple password match check
    if ($password != $confirmPassword) {
        die("Passwords do not match!");
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Move uploaded file to target directory
    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
        // Insert user into database
        $sql = "INSERT INTO users (firstName, lastName, phone, email, password, userType, photo) VALUES ('$firstName', '$lastName', '$phone', '$email', '$hashedPassword', '$userType', '$photo')";

        if ($conn->query($sql) === TRUE) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    $conn->close();
}
?>
