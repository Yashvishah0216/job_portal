<!-- add_job.php -->
<?php
session_start(); // Start the session to access session variables
include_once 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $companyIndustry = $_POST['companyIndustry'];
    $companyDescription = $_POST['companyDescription'];
    $jobTitle = $_POST['jobTitle'];
    $jobLocation = $_POST['jobLocation'];
    $city = $_POST['city'];
    $area = $_POST['area'];
    $pincode = $_POST['pincode'];
    $streetAddress = $_POST['streetAddress'];
    
    // Retrieve employer_id from session
    $employer_id = $_SESSION['employer_id'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO jobs (employer_id, company_industry, company_description, job_title, job_location, city, area, pincode, street_address) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issssssss", $employer_id, $companyIndustry, $companyDescription, $jobTitle, $jobLocation, $city, $area, $pincode, $streetAddress);

    // Execute the statement
    if ($stmt->execute()) {
        // Set the job_id session variable
        $_SESSION['job_id'] = $conn->insert_id;

        // Redirect to add job details page
        header("Location: add_job_details.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}
?>
