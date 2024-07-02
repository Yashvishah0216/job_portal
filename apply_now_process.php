<?php
session_start();
include_once 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $job_id = intval($_POST['job_id']);

    // Fetch job details
    $stmt = $conn->prepare("SELECT * FROM job_details WHERE job_id = ?");
    $stmt->bind_param("i", $job_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $job = $result->fetch_assoc();
        
        // Fetch employer details
        $stmt = $conn->prepare("SELECT * FROM employers WHERE employer_id = ?");
        $stmt->bind_param("i", $job['employer_id']);
        $stmt->execute();
        $employer_result = $stmt->get_result();
        
        if ($employer_result->num_rows > 0) {
            $employer = $employer_result->fetch_assoc();
            echo "<h2>Job Details</h2>";
            echo "<p><strong>Job Type:</strong> " . htmlspecialchars($job['job_type']) . "</p>";
            echo "<p><strong>Schedule:</strong> " . htmlspecialchars($job['schedule']) . "</p>";
            echo "<p><strong>Number of People:</strong> " . htmlspecialchars($job['number_of_people']) . "</p>";
            echo "<p><strong>Pay Range:</strong> $" . htmlspecialchars($job['pay_min']) . " - $" . htmlspecialchars($job['pay_max']) . " " . htmlspecialchars($job['pay_rate']) . "</p>";
            echo "<p><strong>Benefits:</strong> " . htmlspecialchars($job['benefits']) . "</p>";
            echo "<p><strong>Job Description:</strong> " . htmlspecialchars($job['job_description']) . "</p>";
            echo "<h2>Company Details</h2>";
            echo "<p><strong>Company Name:</strong> " . htmlspecialchars($employer['company_name']) . "</p>";
            echo "<p><strong>Number of Employees:</strong> " . htmlspecialchars($employer['number_of_employees']) . "</p>";
            echo "<p><strong>Full Name:</strong> " . htmlspecialchars($employer['full_name']) . "</p>";
            echo "<p><strong>Phone Number:</strong> " . htmlspecialchars($employer['phone_number']) . "</p>";
        } else {
            echo "<p>Error: Employer details not found.</p>";
        }
    } else {
        echo "<p>Error: Job details not found.</p>";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "<p>Invalid request method.</p>";
}
?>
