<?php
session_start();
include_once 'db_connection.php'; // Ensure this file contains your database connection details

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ensure session variable is set
    if (!isset($_SESSION['job_id'])) {
        echo "Error: job_id is not set in session.";
        exit;
    }

    // Retrieve form data
    $job_id = intval($_SESSION['job_id']);
    $jobType = isset($_POST['jobType']) ? (is_array($_POST['jobType']) ? implode(", ", $_POST['jobType']) : $_POST['jobType']) : '';
    $schedule = isset($_POST['schedule']) ? (is_array($_POST['schedule']) ? implode(", ", $_POST['schedule']) : $_POST['schedule']) : '';
    $numberOfPeople = isset($_POST['numberOfPeople']) ? intval($_POST['numberOfPeople']) : 0;
    $payMin = isset($_POST['payMin']) ? floatval($_POST['payMin']) : 0.0;
    $payMax = isset($_POST['payMax']) ? floatval($_POST['payMax']) : 0.0;
    $payRate = isset($_POST['payRate']) ? $_POST['payRate'] : '';
    $benefits = isset($_POST['benefits']) ? (is_array($_POST['benefits']) ? implode(", ", $_POST['benefits']) : $_POST['benefits']) : '';
    $jobDescription = isset($_POST['jobDescription']) ? htmlspecialchars($_POST['jobDescription']) : '';


    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO job_details (job_id, job_type, schedule, number_of_people, pay_min, pay_max, pay_rate, benefits, job_description) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    if (!$stmt) {
        echo "Error preparing statement: " . $conn->error;
        exit;
    }

    $stmt->bind_param("issiddsss", $job_id, $jobType, $schedule, $numberOfPeople, $payMin, $payMax, $payRate, $benefits, $jobDescription);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirection to home2.php
        header("Location: home2.php");
        exit();
    } else {
        echo "Error executing statement: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
