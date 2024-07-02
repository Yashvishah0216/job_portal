<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-image: url('reg.jpg');
            background-size: cover;
            background-position: center;
            background-color: #000000;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
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

        .login-container {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .back-arrow {
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 1.5rem;
            color: black;
        }

        h2 {
            color: #333333;
            text-align: center;
            margin-bottom: 30px;
            font-size: 2rem;
        }

        .form-group {
            width: 100%;
        }

        .form-group label {
            color: black;
            font-weight: 600;
        }

        .form-control {
            border-color: #cccccc;
            border-radius: 5px;
            color: #333333;
        }

        .btn-primary {
            background-color: blue;
            border-color: #007bff;
            width: 100%;
            border-radius: 5px;
            margin-top: 20px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        p {
            margin-top: 7px;
            text-align: center;
            color: #666666;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            color: #0056b3;
            text-decoration: underline;
        }

        .error-message {
            color: #dc3545;
            font-size: 0.9rem;
            margin-top: 5px;
            text-align: center;
        }

    </style>
</head>
<body>
    <div class="container">
        <a href="index.php" class="back-arrow"><i class="fas fa-arrow-left"></i></a>
        <div class="login-container">
            <h2>Login</h2>
            <form id="loginForm" action="login_process.php" method="post" onsubmit="return validateForm()">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <!--  -->
                <button type="submit" class="btn btn-primary">Login</button>
                <div class="welcome-box-text">
                    <p>Don't have any account? <a href="signup.php">Register</a></p>
                </div>
                <div id="errorMessage" class="error-message"></div>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#loginForm').on('submit', function(event) {
                var username = $('#username').val();
                var password = $('#password').val();
                var errorMessage = $('#errorMessage');

                // Check if username or password is empty
                if (username.trim() === "" || password.trim() === "") {
                    errorMessage.text('Please enter both username and password.').show(); // Show error message
                    event.preventDefault(); // Prevent form submission
                } else {
                    errorMessage.hide(); // Hide error message if previously shown
                }
            });
        });
    </script>
</body>
</html>
