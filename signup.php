<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Advanced CSS for Registration Page */

body, html {
    height: 100%;
    margin: 0;
    font-family: 'Roboto', sans-serif;
    background: linear-gradient(135deg, #ece9e6, #ffffff);
}

.full-height-container {
    background-image: url('reg.jpg');
    background-size: cover;
    background-position: center;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

.registration-container {
    position: relative;
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(10px);
    width: 90%;
    max-width: 500px;
    padding: 40px;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
    align-items: center;
}

.back-arrow {
    position: absolute;
    top: 20px;
    left: 20px;
    font-size: 1.8rem;
    color: #333;
    cursor: pointer;
    transition: color 0.3s ease;
}

.back-arrow:hover {
    color: #007bff;
}

h2 {
    text-align: center;
    margin-bottom: 30px;
    color: #333;
    font-size: 2rem;
    font-weight: 700;
    letter-spacing: 1px;
}

.form-group {
    width: 100%;
    margin-bottom: 25px;
    display: flex;
    flex-direction: column;
}

label {
    font-weight: 600;
    color: #555;
    margin-bottom: 5px;
}

.form-control {
    width: 100%;
    padding: 10px 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 1rem;
    color: #333;
    transition: border-color 0.3s ease;
}

.form-control:focus {
    border-color: #007bff;
    outline: none;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

.btn-primary {
    width: 100%;
    padding: 10px 15px;
    background-color: #007bff;
    border-color: #007bff;
    border-radius: 5px;
    font-size: 1.1rem;
    font-weight: 600;
    color: #fff;
    cursor: pointer;
    transition: background-color 0.3s ease, box-shadow 0.3s ease;
}

.btn-primary:hover {
    background-color: #0056b3;
    border-color: #0056b3;
    box-shadow: 0 5px 15px rgba(0, 86, 179, 0.4);
}

p {
    text-align: center;
    margin-bottom: 10px;
    color: #666;
}

a {
    color: #007bff;
    text-decoration: none;
    transition: color 0.3s ease;
}

a:hover {
    color: #0056b3;
}

.password-strength {
    margin-top: 5px;
    font-size: 0.8rem;
    color: #555;
}

/* Responsive Design */
@media (max-width: 576px) {
    .registration-container {
        padding: 20px;
    }

    .back-arrow {
        font-size: 1.5rem;
        top: 15px;
        left: 15px;
    }

    h2 {
        font-size: 1.5rem;
        margin-bottom: 20px;
    }

    .form-control, .btn-primary {
        font-size: 0.9rem;
    }
}

        </style>
</head>
<body>
    <div class="full-height-container">
        <div class="registration-container">
            <a href="index.php" class="back-arrow"><i class="fas fa-arrow-left"></i></a>
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
            <!-- <p>By registering, you agree to our <a href="terms.php">Terms of Service</a> and <a href="privacy.php">Privacy Policy</a>.</p> -->
        </div>
    </div>

    <script>
    $(document).ready(function() {
        $('#registrationForm').on('submit', function(event) {
            var password = $('#password').val();
            var confirmPassword = $('#confirmPassword').val();

            // Check if passwords match
            if (password !== confirmPassword) {
                $('#confirmPasswordError').text('Passwords do not match.');
                event.preventDefault(); // Prevent form submission
            }
        });

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
