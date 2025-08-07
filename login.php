<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="css/loginstyle.css">
</head>

<body>
    <div class="login-container">
        <form class="login-form" method="POST" action="action/sign-in.php">
            <h1>Welcome Back</h1>
            <p>Please login to your account</p>
            <div class="input-group">
                <input type="text" id="username" name="key" placeholder="Username or Mobile or email" required>
            </div>
            <div class="input-group">
                <input type="password" id="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" name="signin">Login</button>
            <div class="bottom-text">
                <p>Don't have an account? <a href="#">Sign Up</a></p>
                <p><a href="#">Forgot password?</a></p>
            </div>
        </form>
    </div>
</body>

</html>