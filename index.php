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
    <title>index</title>
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
        .navbar-nav {
            flex-direction: row;
        }
        .navbar-nav .nav-item {
            margin-left: 15px;
        }
        .navbar-nav .nav-item .nav-link {
            font-size: 18px;
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
        }
        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        @media (max-width: 768px) {
            .navbar-nav {
                flex-direction: column;
                align-items: center;
            }
            .navbar-nav .nav-item {
                margin-left: 0;
                margin-bottom: 10px;
            }
            .navbar-nav .nav-item .nav-link {
                font-size: 16px;
            }
            .job-listings {
                padding: 20px 0;
            }
        }
        @media (max-width: 480px) {
            header {
                font-size: 20px;
            }
            .navbar-brand {
                font-size: 18px;
            }
            .navbar-nav .nav-item .nav-link {
                font-size: 14px;
            }
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
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="signup.php">Register Here</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <section class="job-search">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form action="search_job.php" method="POST">
                        <div class="form-row">
                            <div class="col">
                                <input type="text" class="form-control" name="keywords" placeholder="Job Role">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="location" placeholder="Area">
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary btn-block">Search Job</button>
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
                <?php foreach ($jobListings as $job): ?>
                    <li class="list-group-item mb-3">
                        <div class="job-item">
                            <h5><?php echo $job['job_title']; ?></h5>
                            <!-- <h6 class="text-muted"><?php echo $job['company_industry']; ?></h6> -->
                            <h6><?php echo $job['company_description']; ?></h6>
                            <p>Location: <?php echo $job['city']; ?></p>
                            <!-- Additional job details can be displayed here -->
                            <a href="login.php" class="btn btn-primary mt-2">Easy Apply</a>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>

    <footer>
        <div class="container">
            <p class="text-center">&copy; 2024 WorkConnect</p> 
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.job-slider').slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                arrows: true,
                dots: true,
                draggable: true,
                responsive: [
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
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
