<?php
session_start();
include_once 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve keywords and location from the form
    $keywords = $_POST['keywords'];
    $location = $_POST['location'];

    // Fetch job listings from the database based on the provided keywords and location
    $stmt = $conn->prepare("SELECT * FROM jobs WHERE job_title LIKE ? OR city LIKE ?");
    $keywordsParam = '%' . $keywords . '%';
    $locationParam = '%' . $location . '%';
    $stmt->bind_param("ss", $keywordsParam, $locationParam);
    $stmt->execute();
    $jobListings = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Feed</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('reg.jpg'); /* Path to your background image */
            background-size: cover; /* Ensures the image covers the entire background */
            background-position: center center; /* Centers the image */
            background-repeat: no-repeat; /* Prevents the image from repeating */
        }
        header {
            text-align: center;
            font-size: 24px;
            padding: 20px 0;
        }
        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        nav ul li {
            display: inline-block;
            margin-right: 10px;
        }
        nav ul li a {
            text-decoration: none;
            color: #333;
            font-size: 18px;
        }
        nav ul li a:hover {
            color: #000;
        }
        .text-center {
    color: #fff;
}
        .job-listings {
            padding: 30px 0;
        }
        .slick-slide {
            padding: 10px;
        }
        .card {
            height: 350px; /* Set a fixed height for the cards */
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        
    </style>
        
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">WorkConnect</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="home2.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="jobs.php">Jobs</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="upload-cv.php">Upload your CV </a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" href="postJob.php">Job Posting</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="signup.php">Account</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <section class="job-search">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form action="search_job2.php" method="POST">
                        <div class="form-row">
                            <div class="col">
                                <input type="text" class="form-control" name="keywords" placeholder="Job Role">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="location" placeholder="Area">
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary">Search Job</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="job-listings">
        <div class="container">
            <h2 class="text-center">Job Feed</h2>
            <ul class="list-group">
                <?php if (!empty($jobListings)): ?>
                    <?php foreach ($jobListings as $job): ?>
                        <li class="list-group-item">
                            <h5><?php echo $job['job_title']; ?></h5>
                            <!-- <h6 class="text-muted"><?php echo $job['company_industry']; ?></h6> -->
                        <h6><?php echo $job['company_description']; ?></h6>
                            <p>Location: <?php echo $job['city']; ?></p>
                            <a href="apply_now.php?job_id=<?php echo $job['job_id']; ?>" class="btn btn-primary mt-2">Easy Apply</a>
                        </li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="alert alert-info" role="alert">
                        No matching job found.
                    </div>
                <?php endif; ?>
            </ul>
        </div>
    </section>

    <footer>
        <div class="container">
            <p class="text-center">&copy; 2024 WorkConnect</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.job-slider').slick({
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 3,
                autoplay: true,
                autoplaySpeed: 2000,
                arrows: true,
                dots: true,
                draggable: true,
                responsive: [
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
        });
    </script>
</body>
</html>
