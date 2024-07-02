<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Details Preview</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Roboto', sans-serif;
        }
        .preview-container {
            margin-top: 50px;
            padding: 30px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            animation: fadeInUp 0.5s ease;
        }
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translate3d(0, 40px, 0);
            }
            to {
                opacity: 1;
                transform: translate3d(0, 0, 0);
            }
        }
        .preview-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .preview-header h2 {
            font-weight: 700;
        }
        .preview-content {
            margin-bottom: 20px;
        }
        .btn-primary {
            background: #007bff;
            border: none;
            transition: background 0.3s;
        }
        .btn-primary:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="preview-container">
            <div class="preview-header">
                <h2>Job Details Preview</h2>
            </div>
            <div class="preview-content">
                <p><strong>Job Type:</strong> <?php echo implode(", ", $_POST['jobType']); ?></p>
                <p><strong>Schedule:</strong> <?php echo implode(", ", $_POST['schedule']); ?></p>
                <p><strong>Number of People:</strong> <?php echo $_POST['numberOfPeople']; ?></p>
                <p><strong>Pay Range:</strong> <?php echo $_POST['payMin'] . " - " . $_POST['payMax'] . " " . $_POST['payRate']; ?></p>
                <p><strong>Benefits:</strong> <?php echo isset($_POST['benefits']) ? implode(", ", $_POST['benefits']) : ''; ?></p>
                <p><strong>Job Description:</strong> <?php echo htmlspecialchars($_POST['jobDescription']); ?></p>
            </div>
            <div class="back-button">
                <!-- Back button -->
                <a href="add_job_details.php" class="btn btn-secondary">Back to Form</a>
            </div>
            <form action="job_details_process.php" method="POST">
                <!-- Hidden fields to pass data to the processing script -->
                <input type="hidden" name="jobType" value="<?php echo htmlspecialchars(implode(", ", $_POST['jobType'])); ?>">
                <input type="hidden" name="schedule" value="<?php echo htmlspecialchars(implode(", ", $_POST['schedule'])); ?>">
                <input type="hidden" name="numberOfPeople" value="<?php echo htmlspecialchars($_POST['numberOfPeople']); ?>">
                <input type="hidden" name="payMin" value="<?php echo htmlspecialchars($_POST['payMin']); ?>">
                <input type="hidden" name="payMax" value="<?php echo htmlspecialchars($_POST['payMax']); ?>">
                <input type="hidden" name="payRate" value="<?php echo htmlspecialchars($_POST['payRate']); ?>">
                <input type="hidden" name="benefits" value="<?php echo isset($_POST['benefits']) ? htmlspecialchars(implode(", ", $_POST['benefits'])) : ''; ?>">
                <input type="hidden" name="jobDescription" value="<?php echo htmlspecialchars($_POST['jobDescription']); ?>">
                <button type="submit" class="btn btn-primary btn-block">Confirm and Submit</button>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
