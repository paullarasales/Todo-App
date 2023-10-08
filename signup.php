<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
    <div class="login">
        <h1>Create Your Account</h1>
        <h2>Join 1,000,000 users and supercharge your productivity.</h2>
        <h2>Sign up now to get organized and achieve more!</h2>
    </div>
    <div class="form">
        <form action="./php/signup-acc.php" method="post">
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
            <input type="submit" name="signup" value="Sign up">
        </form>
        <p>Already Have an Account? <a href="login.php">Login Here</a></p>
    </div>
    <p class="social-m">or Log in with</p>
    <div class="social">
       <i class="fa-brands fa-google"></i>
       <i class="fa-brands fa-github"></i>
       <i class="fa-brands fa-facebook"></i>
       <i class="fa-brands fa-linkedin"></i>
    </div>
    </div>


</body>
</html>