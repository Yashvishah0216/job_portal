<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Details</title>
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
    padding: 10px;
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
                <a href="add_job.php">&larr;</a>
            </div>
            <div class="form-header">
                <h2>ADD Job Details</h2>
            </div>
            <form action="job_details_process.php" method="POST">
                <div class="form-group">
                    <label for="jobType">Job level *</label>
                    <div class="checkbox-group" id="jobType">
                        <label><input type="checkbox" name="jobType[]" value="Fresher"> Fresher</label>
                        <label><input type="checkbox" name="jobType[]" value="Experienced"> Experienced</label>
                        <label><input type="checkbox" name="jobType[]" value="Internship"> Internship</label>
                        <label><input type="checkbox" name="jobType[]" value="Permanent"> Permanent</label>
                        <label><input type="checkbox" name="jobType[]" value="Full Time"> Full Time</label>
                        <label><input type="checkbox" name="jobType[]" value="Part Time"> Part Time</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="schedule">Working time *</label>
                    <div class="checkbox-group" id="schedule">
                        <label><input type="checkbox" name="schedule[]" value="Monday to Friday"> Monday to Friday</label>
                        <label><input type="checkbox" name="schedule[]" value="Weekends"> Weekends</label>
                        <label><input type="checkbox" name="schedule[]" value="Flexible Hours"> Flexible Hours</label>
                        <label><input type="checkbox" name="schedule[]" value="Night Shift"> Night Shift</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="numberOfPeople">Vaccancie *</label>
                    <select class="form-control" id="numberOfPeople" name="numberOfPeople" required>
                        <option value="" disabled selected>Select number of people</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        
                        <option value="More than 3">More than 3</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="pay">Pay rate *</label>
                    <div class="input-group">
                        <input type="number" class="form-control" id="payMin" name="payMin" placeholder="Minimum Pay" required>
                        <input type="number" class="form-control" id="payMax" name="payMax" placeholder="Maximum Pay" required>
                        <select class="form-control" id="payRate" name="payRate" required>
                            <option value="Month">Per Month</option>
                            <option value="Year">Per Year</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="benefits">Benefits</label>
                    <div class="checkbox-group" id="benefits">
    <label><input type="checkbox" name="benefits[]" value="Health Insurance"> Health Insurance</label>
    <label><input type="checkbox" name="benefits[]" value="Paid Time Off"> Paid Time Off</label>
    <label><input type="checkbox" name="benefits[]" value="Remote Work"> Remote Work</label>
    <label><input type="checkbox" name="benefits[]" value="Flexible Hours"> Flexible Hours</label>
    <label><input type="checkbox" name="benefits[]" value="Employee Discounts"> Employee Discounts</label>
    <label><input type="checkbox" name="benefits[]" value="Commuter Benefits"> Commuter Benefits</label>
</div>
                </div>
                <div class="form-group">
                    <label for="jobDescription">Job description *</label>
                    <textarea class="form-control" id="jobDescription" name="jobDescription" rows="4" minlength="20" required></textarea>
                </div>
            
                <button type="submit" class="btn btn-primary btn-block">Post Job</button>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
