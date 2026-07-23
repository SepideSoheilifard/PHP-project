<?php
include "../../../config/db.php";
session_start();
$errorMes='';
if(isset($_GET['errorMes']))
    {
        $errorMes=$_GET['errorMes'];
    }else{
        $errorMes='';
    }
if(isset($_POST['login']))
    {
        $email=$_POST['email'];
        $password=$_POST['password'];
        $check=$conn->query("select * from users where email='$email' and pass='$password'");
        if($check->rowCount() == 1)
            {
                $_SESSION['email']=$email;
                header("Location:../../index.php");
            }else{
                $errorMes='نام کاربری و کلمه عبور اشتباه است';
                header("Location:login.php?errorMes=$errorMes");
            }
    }
?>

<!DOCTYPE html>
<html dir="rtl" lang="fa">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>php tutorial || blog project || shetabamooz</title>

        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
            crossorigin="anonymous"
        />

        <link rel="stylesheet" href="../../assets/css/style.css" />
    </head>
    <body class="auth">
        <main class="form-signin w-100 m-auto">
            <form method="post">
                <?php if($errorMes) : ?>
                    <div class="alert alert-danger"><?= $errorMes ?></div>
                <?php endif ?>    
                <div class="fs-2 fw-bold text-center mb-4">shetabamooz</div>
                <div class="mb-3">
                    <label class="form-label">ایمیل</label>
                    <input type="email" name="email" class="form-control" />
                </div>

                <div class="mb-3">
                    <label class="form-label">رمز عبور</label>
                    <input type="password" name="password" class="form-control" />
                </div>
                <button class="w-100 btn btn-dark mt-4" name="login" type="submit">
                    ورود
                </button>
            </form>
        </main>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
