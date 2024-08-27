<?php
require("configration.php");
if (!$_SESSION['login']) {
    $_SESSION['login'] = '';
}
if ($_SESSION['login'] == 'login') {
    echo"سجل خروج";
//     echo "
// <script>
//  window.location.href ='index.php';
// </script>";
}
if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "SELECT * FROM users WHERE email='$email'";
    $myres = mysqli_query($connectios, $query);
    $myarry =  mysqli_fetch_array($myres);
    if ($myarry) {
        echo " <script>alert('الحساب موجود ب الفعل');</script>";
        //  header('Location: mylogin.php');
    } 
    else {
        $insertQuery = "INSERT INTO users(username,email,password) VALUE('$username','$email','$password')";
        $res = mysqli_query($connectios,$insertQuery);

        if ($res == true) {
            $_SESSION['login'] = 'login';
            header('Location:mylogin.php');
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="mysignup.css">
</head>

<body>
    <div class="box">
        <div class="container">
            <div class="top-header">
                <span>Haven't an account ?</span>
                <header>SIGN UP</header>
            </div>
            <form action="mysignup.php" method="post">
                <div class="input-field">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="username" placeholder="Enter your username">
                </div>

                <div class="input-field">
                    <label for="email">Email</label><br>
                    <input type="email" name="email" id="email" class="email" placeholder="Enter your email">
                </div>

                <div class="input-field">
                    <label for="password">Password</label><br>
                    <input type="password" name="password" id="password" class="password"
                        placeholder="Enter your password">
                </div>

                <div class="input-field">
                    <input type="submit" name="signup" class="login" value="SIGN UP">
                </div>

                <div class="bottom">
                    <div class="left">
                        <input type="checkbox" id="check">
                        <label for="check">Reamander me</label>
                    </div>

                </div>
                <div class="signup-con">
                    <h3>Have an account?</h3>
                    <a href="mylogin.php">Login </a>
                </div>
            </form>
        </div>

    </div>
</body>

</html>