<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Employer Account</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
    font-family: Arial, sans-serif;
    background-image: url('reg.jpg'); /* Path to your background image */
    background-size: cover; /* Ensures the image covers the entire background */
    background-position: center center; /* Centers the image */
    background-repeat: no-repeat; /* Prevents the image from repeating */
}

.form-container {
    margin-top: 50px;
    padding: 0;
}

.form-header {
    text-align: center;
    padding: 20px;
    background-color: transparent;
    color: rgba(255, 255, 255, 0.8);
}

.form-header h2 {
    margin: 0;
    font-weight: 700;
}

.form-body {
    padding: 30px;
}

.form-group label {
    color: rgba(255, 255, 255, 0.8);
    font-weight: 500;
}

.btn-primary {
    background: #007bff;
    border: none;
    transition: background 0.3s;
}

.btn-primary:hover {
    background: #0056b3;
}

.back-arrow {
    position: absolute;
    top: 10px;
    left: 10px;
    font-size: 24px;
    font-weight: bold;
    color: rgba(255, 255, 255, 0.8);
    cursor: pointer;
    text-decoration: none;
}

        </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <div class="form-header">
                <a href="home2.php" class="back-arrow"><i class="fas fa-arrow-left"></i></a>
                <!-- <img src="reg2.jpg" alt="Company Logo" style="display:none;"> -->
                <h2>Job Posting - Employer</h2>
            </div>
            <div class="form-body">
                <form action="postjob_process.php" method="POST">
                    <div class="form-group">
                        <label for="companyName">Company name *</label>
                        <input type="text" class="form-control" id="companyName" name="companyName" required>
                    </div>
                    <div class="form-group">
                        <label for="numberOfEmployees"> Number of employees *</label>
                        <select class="form-control" id="numberOfEmployees" name="numberOfEmployees" required>
                            <option value="" disabled selected>Select</option>
                            <option value="1-10">1-10</option>
                            <option value="10-50">10-50</option>
                            <option value="50-100">50-100</option>
                            <option value="100-500">100-500</option>
                            <option value="500-1000">500-1000</option>
                            <option value="1000+">1000+</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="fullName">Name of Employer *</label>
                        <input type="text" class="form-control" id="fullName" name="fullName" required>
                    </div>
                    <div class="form-group">
    <label for="phoneNumber">Contact number *</label>
    <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" pattern="^(\+61|0)[0-9]{9,10}$" title="Please enter a valid Australian phone number, starting with +61 or 0" required>
    <!-- <small class="form-text text-muted">For account management communication. Not visible to jobseekers.</small> -->
</div>
                    <button type="submit" class="btn btn-primary btn-block">Next</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
