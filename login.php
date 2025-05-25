<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="Shortcut Icon" type="image/png" href="/bxs-log-in-circle.svg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login_Page</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="Wrapper">
        <form action="" method="post"> <!-- Action points to the same page -->
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" name="username" placeholder="User_name" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox" />Remember me</label>
                <a href="#">Forgot password</a>
            </div>
            <button type="submit" class="btn">Login</button>

            <div class="register-link">
                <p>Don't have an account? <a href="register.php">Register here</a></p>
            </div>

            <?php  
            // Database connection
            include 'connect.php';

            // Check if form is submitted
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = $_POST["username"];
                $password = $_POST["password"];

                // Query to check for user credentials
                $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    // Successful login: redirect to the next page
                    header("Location: index.php");
                    exit(); // Ensure no further code is executed
                } else {
                    // Incorrect credentials
                    echo "<p style='color: red;'>Code incorrect. Please try again.</p>";
                }
            }
            ?>
        </form>
    </div>
</body>
</html>
