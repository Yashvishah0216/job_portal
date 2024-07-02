<?php
session_start();
include_once 'db_connection.php';

// Fetch job listings from the database
$stmt = $conn->prepare("SELECT * FROM jobs");
$stmt->execute();
$jobListings = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
$stmt->close();
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Feed</title>
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
        .back-arrow {
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 24px;
            color: white;
            cursor: pointer;
        }
        .job-listings {
            padding: 30px 0;
        }
        .job-listings .container {
            max-width: 800px;
        }
        .job-card {
            background-color: #fff;
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
        }
        .job-card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        .job-card .card-body {
            padding: 20px;
        }
        .job-card .card-title {
            font-size: 20px;
            margin-bottom: 10px;
        }
        .job-card .card-subtitle {
            color: #666;
            margin-bottom: 10px;
        }
        .job-card .card-text {
            color: #333;
            margin-bottom: 10px;
        }
        .job-card .apply-btn {
            background-color: #007bff;
            border: none;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s ease;
        }
        .job-card .apply-btn:hover {
            background-color: #0056b3;
        }
        .text-center {
            color: white; /* Set the color to white */
            margin-bottom: 4rem; /* Increase margin bottom for spacing */
        }
    </style>
</head>
<body>

<a href="home2.php" class="back-arrow"><i class="fas fa-arrow-left"></i></a>

<section class="job-listings">
    <div class="container">
        <h2 class="text-center mb-4">Job List</h2>
        <?php foreach ($jobListings as $job): ?>
            <div class="job-card">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $job['job_title']; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $job['company_industry']; ?></h6>
                    <p class="card-text"><?php echo $job['company_description']; ?></p>
                    <p class="card-text">Location: <?php echo $job['city']; ?></p>
                    <a href="apply_now.php?job_id=<?php echo $job['job_id']; ?>" class="btn btn-primary mt-auto">Easy Apply</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

</body>
</html>
