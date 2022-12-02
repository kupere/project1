<!DOCTYPE html>
<html lang="en">

<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/db9ef70621.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.0/css/fontawesome.min.css">
    <title>Login Page</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
   
    <form class="form" action="../backend/handle_login.php" method="post" name="login">
        <h1 class="login-title">Login</h1>
        <label for="email">Email</label>
        <input type="email" class="login-input" name="email" placeholder="Email" autofocus="true" required />
        <label for="password">Password</label>
        <input type="password" class="login-input" name="password" placeholder="Password"  required>
        <input type="submit" value="sign in" name="login" class="login-button" />
        <p class="link"><a href="registration.php">New Registration</a></p>
    </form>

</body>

</html>