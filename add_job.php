<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Posting</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
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
    padding: 3px;
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
            <div class="back-arrow">
                <a href="home2.php">&larr;</a>
            </div>
            <div class="form-header">
                <h2>Job Posting</h2>
            </div>
            <form action="add_job_process.php" method="POST">
                <div class="form-group">
                    <label for="companyIndustry">Company's industry *</label>
                    <select class="form-control" id="companyIndustry" name="companyIndustry" required>
                        <option value="" disabled selected>Select</option>
                        <option value="IT">Information Technology</option>
                        <option value="Finance">Finance</option>
                        <option value="Healthcare">Healthcare</option>
                        <option value="Education">Education</option>
                        <option value="Manufacturing">Manufacturing</option>
                        <option value="Retail">Retail</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="companyDescription">More about your Company</label>
                    <textarea class="form-control" id="companyDescription" name="companyDescription" rows="3" placeholder="Introduce your company to people in a few lines."></textarea>
                </div>
                <div class="form-group">
                    <label for="jobTitle">Job Role *</label>
                    <input type="text" class="form-control" id="jobTitle" name="jobTitle" required>
                </div>
                <div class="form-group">
                    <label for="jobLocation">Job location *</label>
                    <select class="form-control" id="jobLocation" name="jobLocation" required>
                        <option value="" disabled selected>Select</option>
                        <option value="On-site">On-site</option>
                        <option value="Remote">Remote</option>
                        <option value="Hybrid">Hybrid</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="city">City *</label>
                    <input type="text" class="form-control" id="city" name="city" required>
                </div>
                <div class="form-group">
                    <label for="area">Area</label>
                    <input type="text" class="form-control" id="area" name="area">
                </div>
                <div class="form-group">
                    <label for="pincode">Pincode</label>
                    <input type="text" class="form-control" id="pincode" name="pincode" pattern="\d*" title="Please enter valid pincode" required>
                </div>
                <div class="form-group">
                    <label for="streetAddress">Address</label>
                    <input type="text" class="form-control" id="streetAddress" name="streetAddress">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Next</button>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
