<?php
session_start();
include_once 'db_connection.php';

// Check if the job_id is provided in the URL
if(isset($_GET['job_id']) && !empty($_GET['job_id'])) {
    // Sanitize the input to prevent SQL injection
    $job_id = mysqli_real_escape_string($conn, $_GET['job_id']);

    // Fetch the job details from the database
    $stmt = $conn->prepare("SELECT jobs.*, job_details.* FROM jobs JOIN job_details ON jobs.job_id = job_details.job_id WHERE jobs.job_id = ?");
    $stmt->bind_param("i", $job_id);
    $stmt->execute();
    $jobDetails = $stmt->get_result()->fetch_assoc();
    $stmt->close();

    // Check if the job exists
    if($jobDetails) {
        // Job exists, you can proceed with your application form or process here
        // For example, you can display the job details and a form for applying
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Apply for Job</title>
            <!-- Include your CSS and other necessary files -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding-top: 50px;
        }
        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
            padding: 40px;
            max-width: 600px;
            margin: 0 auto;
        }
        .container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-control-file {
            padding: 10px;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
        </head>
        <body>
            <div class="container">
            <a href="javascript:history.go(-1)" class="back-link"><i class="fas fa-arrow-left"></i> Back</a>
            <br>
            <br>
                <h2 class="text-center">Apply for Job: <?php echo $jobDetails['job_title']; ?></h2>
                <!-- <p><strong>Company Industry:</strong> <?php echo $jobDetails['company_industry']; ?></p> -->
                <p><strong>Company:</strong> <?php echo $jobDetails['company_description']; ?></p>
                <!-- <p><strong>Job Location:</strong> <?php echo $jobDetails['job_location']; ?></p> -->
                <p><strong>Location:</strong> <?php echo $jobDetails['city']; ?></p>
                <!-- <p><strong>Area:</strong> <?php echo $jobDetails['area']; ?></p>
                <p><strong>Pincode:</strong> <?php echo $jobDetails['pincode']; ?></p>
                <p><strong>Street Address:</strong> <?php echo $jobDetails['street_address']; ?></p> -->
                <p><strong>Job Type:</strong> <?php echo $jobDetails['job_type']; ?></p>
                <p><strong>Schedule:</strong> <?php echo $jobDetails['schedule']; ?></p>
                <p><strong>Number of vaccancies:</strong> <?php echo $jobDetails['number_of_people']; ?></p>
                <p><strong>Min pay:</strong> <?php echo $jobDetails['pay_min']; ?></p>
                <p><strong>Max pay:</strong> <?php echo $jobDetails['pay_max']; ?></p>
                <p><strong>per:</strong> <?php echo $jobDetails['pay_rate']; ?></p>
                <p><strong>Benefits:</strong> <?php echo $jobDetails['benefits']; ?></p>
                <p><strong>Job Description:</strong> <?php echo $jobDetails['job_description']; ?></p>
                <!-- You can include a form here for applying -->
                <!-- Example form -->
                <form action="home2.php" method="POST">
                    <input type="hidden" name="job_id" value="<?php echo $job_id; ?>">
                    <!-- Add your form fields here -->
                    <div class="form-group">
                        <label for="name">Your Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Your Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="resume">Upload Resume (PDF only):</label>
                        <input type="file" class="form-control-file" id="resume" name="resume" accept=".pdf" required>
                    </div>
                    <!-- Add more fields as needed -->
                    <a href="home2.php" ><button type="submit" class="btn btn-primary">Submit Application</button></a>
                </form>
            </div>
        </body>
        </html>
        <?php
    } else {
        // Job not found
        echo "Job not found.";
    }
} else {
    // job_id is not provided in the URL
    echo "Invalid request.";
}

$conn->close();
?>
