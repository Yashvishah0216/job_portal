<!-- employer_registration.php -->
<?php
session_start();
include_once 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $companyName = $_POST['companyName'];
    $numberOfEmployees = $_POST['numberOfEmployees'];
    $fullName = $_POST['fullName'];
    $phoneNumber = $_POST['phoneNumber'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO employers (company_name, number_of_employees, full_name, phone_number) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $companyName, $numberOfEmployees, $fullName, $phoneNumber);

    // Execute the statement
    if ($stmt->execute()) {
        // Retrieve the auto-generated employer_id
        $employer_id = $stmt->insert_id;

        // Set the employer_id session variable
        $_SESSION['employer_id'] = $employer_id;

        // Redirect to add job page
        header("Location: add_job.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}
?>
