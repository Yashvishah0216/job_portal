<?php
session_start();
include_once 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and bind
    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE BINARY username = ?");
    $stmt->bind_param("s", $username);

    // Execute the statement
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $db_username, $db_password);
        $stmt->fetch();

        // Check if passwords match
        if (password_verify($password, $db_password)) {
            // Password matches, set session variables and redirect to home2.php
            $_SESSION['user_id'] = $id;
            $_SESSION['username'] = $db_username;
            header("Location: home2.php");
            exit();
        } else {
            header("Location: index.php");
            exit();
        }
    } else {
        header("Location: index.php");
            exit();
    }

    $stmt->close();
    $conn->close();
}
?>
