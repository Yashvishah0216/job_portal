<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}

// Get the username from session data
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('reg.jpg'); /* Path to your background image */
            background-size: cover; /* Ensures the image covers the entire background */
            background-position: center center; /* Centers the image */
            background-repeat: no-repeat; /* Prevents the image from repeating */
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff; /* White container background */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Soft shadow effect */
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .sign-out-btn {
            display: block;
            width: 100%;
            max-width: 200px;
            margin: 20px auto;
        }
        .back-btn {
            display: inline-block;
            margin-bottom: 20px;
            color: #007bff; /* Blue color for the back button */
            text-decoration: none;
        }
        .back-btn i {
            margin-right: 5px;
        }
        .skill-container {
            display: flex;
            align-items: flex-start;
            margin-bottom: 20px;
        }
        .skill-input {
            flex: 1; /* Take up remaining space */
            margin-right: 10px; /* Add margin to separate from the button */
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }
        .add-skill-btn {
            background-color: #007bff; /* Blue color for the button */
            color: #fff; /* White color for the text */
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .add-skill-btn:hover {
            background-color: #0056b3; /* Darker shade of blue on hover */
        }
        .upload-resume-input {
            display: none; /* Hide the input by default */
        }
        .upload-resume-label {
            background-color: #007bff; /* Blue color for the button */
            color: #fff; /* White color for the text */
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            text-align: center;
            display: inline-block;
        }
        .upload-resume-label:hover {
            background-color: #0056b3; /* Darker shade of blue on hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="home2.php" class="back-btn"><i class="fas fa-arrow-left"></i> Back</a>
        <div class="header">
            <!-- <div class="user-initial"><?php echo strtoupper(substr($username, 0, 1)); ?></div> -->
            <div class="user-name"><?php echo $username; ?></div>
        </div>
        <div class="skill-container">
            <input type="text" class="skill-input" placeholder="Add a skill...">
            <a href="account.php" class="add-skill-btn">+</a>
        </div>
        <input type="file" id="uploadResume" class="upload-resume-input" accept=".pdf">
        <label for="uploadResume" class="upload-resume-label">Upload Resume (PDF)</label>
        <a href="signout.php" class="btn btn-primary sign-out-btn">Log Out</a>
    </div>
</body>
</html>
