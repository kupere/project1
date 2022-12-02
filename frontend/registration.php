<!DOCTYPE html>
<html lang="en">
<head>
    
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/db9ef70621.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.0/css/fontawesome.min.css">
    <title>Registration Page</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

    <form class="form" action="../backend/handle_register.php" method="post">
        <h1 class="login-title">Registration</h1>
        <label for="firstname">First name</label>
        <input type="text" class="login-input" name="fname" placeholder="First name" required />
        <label for="secondname">Second Name</label>
        <input type="text" class="login-input" name="sname" placeholder="Second Name" required />
        <label for="username">Username</label>
        <input type="text" class="login-input" name="username" placeholder="Username" required />
        <label for="email">Email</label>
        <input type="text" class="login-input" name="email" placeholder="Email Adress" required>
        <label for="phone">Phone Number</label>
        <input type="tel" class="login-input" name="phone" placeholder="Phone Number" required>
        <label for="password">Password</label>
        <input type="password" class="login-input" name="password" placeholder="Password"required>
        <label for="password2">Confirm Password</label>
        <input type="password" class="login-input" name="password2" placeholder="Confirm Password"required>
        <input type="submit" name="register" value="Register" class="login-button">
        <p class="link"><a href="login.php">Click to Login</a></p>
    </form>

</body>
</html>