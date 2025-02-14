<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor's Portal Login</title>

    <!-- General Styles -->
    <link rel="stylesheet" href="../css/style.css">

    <!-- Custom Login Styles -->
    <link rel="stylesheet" href="../css/login.css">

    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <h2><i class="fas fa-user-md"></i> Doctor's Portal</h2>
            <p class="subtitle">Secure Login</p>

            <form action="../backend/login_handler.php" method="POST">
                <div class="input-group">
                    <label for="username"><i class="fas fa-user"></i> Username</label>
                    <input type="text" name="username" id="username" required placeholder="Enter username">
                </div>

                <div class="input-group">
                    <label for="password"><i class="fas fa-lock"></i> Password</label>
                    <input type="password" name="password" id="password" required placeholder="Enter password">
                </div>

                <button type="submit" class="login-btn">Login <i class="fas fa-sign-in-alt"></i></button>

                <div class="bottom-links">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
