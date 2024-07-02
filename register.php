<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        /* Custom CSS */
        .full-height-container {
            background-image: url('login6.jpeg');
            background-size: cover;
            background-position: center;
            height: 100vh; /* Full height */
            width: 100%; /* Full width */
            /* background-color: white;  */
            display: flex; /* Use flexbox for alignment */
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
        }
        .registration-container {
            background-image: url('login5.jpeg');
            background-size: cover;
            background-position: center;
            max-width: 450px; /* Limit the width of the container */
            height: 600px;
            background-color: #ffffff; /* White background */
            padding: 30px;
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.1); /* Add shadow */
        }
        h2 {
            text-align: center;
            margin-bottom: 30px; /* Add space below the heading */
            color: black; /* Heading color */
            font-weight: bold; /* Heading font weight */
        }
        .form-group {
            margin-bottom: 25px; /* Add space between form groups */
        }
        label {
            font-weight: bold; /* Label font weight */
            color: #555; /* Label color */
        }
        .form-control {
            border-color: #ccc; /* Border color */
            border-radius: 5px; /* Border radius */
            color: #333; /* Text color */
        }
        .btn-primary {
            background-color: black; /* Button background color */
            border-color: black; /* Button border color */
            border-radius: 5px; /* Button border radius */
            transition: background-color 0.3s ease; /* Smooth button hover effect */
        }
        .btn-primary:hover {
            background-color: #0056b3; /* Button hover background color */
            border-color: #0056b3; /* Button hover border color */
        }
        p {
            text-align: center;
            margin-bottom: 10px; /* Add space below paragraphs */
        }
        a {
            color: #007bff; /* Link color */
            text-decoration: none; /* Remove underline */
        }
        a:hover {
            color: #0056b3; /* Link hover color */
        }
        .password-strength {
            margin-top: 5px;
            font-size: 0.8rem;
            color: #555; /* Text color */
        }
    </style>
</head>
<body>
    <div class="full-height-container">
        <div class="registration-container">
            <h2>Registration</h2>
            <form id="registrationForm" action="register_process.php" method="post">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                    <small id="usernameError" class="text-danger"></small>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                    <small id="passwordError" class="text-danger"></small>
                    <div class="password-strength"></div>
                </div>
                <div class="form-group">
                    <label for="confirmPassword">Confirm Password:</label>
                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                    <small id="confirmPasswordError" class="text-danger"></small>
                </div>
                <div class="form-group">
                    <button id="registerBtn" type="submit" class="btn btn-primary btn-block">Register</button>
                </div>
            </form>
            <p>Already have an account? <a href="login.php">Login</a></p>
            <p>By registering, you agree to our <a href="terms.php">Terms of Service</a> and <a href="privacy.php">Privacy Policy</a>.</p>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#password').on('keyup', function() {
                var password = $(this).val();
                var strength = 0;

                // Add your password strength check logic here
                // Example: Check length, presence of uppercase letters, lowercase letters, numbers, and special characters

                // Display password strength
                if (password.length >= 8) {
                    strength += 1;
                }
                if (password.match(/[a-z]/)) {
                    strength += 1;
                }
                if (password.match(/[A-Z]/)) {
                    strength += 1;
                }
                if (password.match(/[0-9]/)) {
                    strength += 1;
                }
                if (password.match(/[$&+,:;=?@#|'<>.^*()%!-]/)) {
                    strength += 1;
                }
                var strengthText = '';
                if (strength < 2) {
                    strengthText = 'Weak';
                } else if (strength < 4) {
                    strengthText = 'Moderate';
                } else {
                    strengthText = 'Strong';
                }

                $('.password-strength').text('Password Strength: ' + strengthText);
            });
        });
    </script>
</body>
</html>

