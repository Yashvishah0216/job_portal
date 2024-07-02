<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Your CV</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding-top: 50px;
        }
        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
            padding: 40px;
            max-width: 600px;
            margin: 0 auto;
        }
        .container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-control-file {
            padding: 10px;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .back-link {
            color: #007bff;
            text-decoration: none;
            font-size: 18px;
            margin-bottom: 20px;
            display: inline-block;
        }
        .back-link i {
            margin-right: 5px;
        }
        .alert {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="javascript:history.go(-1)" class="back-link"><i class="fas fa-arrow-left"></i> Back</a>
        <h2 class="text-center">Upload Your CV</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="resume">Select your CV (PDF only):</label>
                <input type="file" class="form-control-file" id="resume" name="resume" accept=".pdf" required>
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>

    <!-- Upload Success Alert -->
    <div class="alert alert-success" role="alert" id="uploadSuccess">
        The file has been uploaded successfully.
    </div>

    <script>
        // Show success message after uploading file
        <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["resume"])): ?>
            document.getElementById("uploadSuccess").style.display = "block";
            setTimeout(function(){
                document.getElementById("uploadSuccess").style.display = "none";
            }, 3000);
        <?php endif; ?>
    </script>
</body>
</html>
