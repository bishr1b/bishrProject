<?php
require('configration.php');

if ($_SESSION['login']==false) {
    $_SESSION['login'] = '';
}
if ($_SESSION['login'] == 'login') {
        echo "
    <script>
     window.location.href ='adminasset/dashboard.php';
    </script>";
}
$password = "";
$email = "";
$passwordError = "";
$emailError = "";
if (isset($_POST['save'])) {

    // email
    $email = $_POST['email'];
    if (empty($email)) {
        $emailError = "Enter The email";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) && (empty($email) == false)) {
        $emailError = "ادخل الايميل ب صوره الصحيحه";
    }

    // password
    $password = $_POST['password'];
    if (empty($password)) {
        $passwordError = "Enter the password";
    }
    if (strlen($password) < 8 && !empty($password)) {
        $passwordError = "الباسورد لازم يتكون اقل شي من 8 حروف";
    }


    // complete
    if ($emailError == "" && $passwordError == "") {
        $selectQuery = "SELECT * FROM users WHERE email='$email'";
        $res = mysqli_query($connectios, $selectQuery);
        if ($res == true) {
            $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
            if ($password == $row['password']) {
                // session
                $_SESSION['login'] = 'login';
                echo "
         <script>alert('تم الاتصال')</script>
         ";
                header("Location:adminasset/dashboard.php");
            } else {
                echo "
            <script>
            
            alert('The information is wrong');
            </script>
            ";
            }
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
    <link rel="stylesheet" href="mylogin.css">
</head>

<body>
    <div class="box">
        <div class="container">
            <div class="top-header">
                <span>Have an account ?</span>
                <header>LOGIN</header>
            </div>
            <form action="mylogin.php" method="post">
                <div class="input-field">
                    <label for="email">Email</label><br>
                    <input type="email" name="email" id="email" class="email" placeholder="Enter your email"
                        value=<?php echo $email ?>>
                    <div style="color:red;font-size:16px; margin-bottom:10px;">
                        <?php
                        echo $emailError;
                        ?>
                    </div>

                    <div class="input-field">
                        <label for="password">Password</label><br>
                        <input type="password" name="password" id="password" class="password"
                            placeholder="Enter your password">
                        <div style="color:red;font-size:16px; margin-bottom:10px;">
                            <?php
                            echo $passwordError;
                            ?>
                        </div>

                        <div class="input-field">
                            <input type="submit" name="save" class="login" value="LOGIN">
                        </div>

                        <div class="bottom">
                            <div class="left">
                                <input type="checkbox" id="check">
                                <label for="check">Reamander me</label>
                            </div>
                            <div class="right">
                                <label><a href="#">Forger password</a></label>
                            </div>
                        </div>
                        <div class="signup-con">
                            <h3>Haven't an account?</h3>
                            <a href="mysignup.php">Create a new account</a>
                        </div>
            </form>
        </div>

    </div>
</body>

</html>
