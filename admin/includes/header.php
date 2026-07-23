<?php 
session_start();

$path=$_SERVER['REQUEST_URI'];
if(str_contains($path, "pages"))
    {
        include "../../../config/db.php" ;
        include "../../includes/function.php"; 
    }else{
        include "../config/db.php" ;
        include "includes/function.php";
    } 

if(empty($_SESSION['email']))
    {
        $errorMes='لطفا ابتدا وارد شوید';
        header("Location:pages/auth/login.php?errorMes=$errorMes");
    }
?>
<!DOCTYPE html>
<html dir="rtl" lang="fa">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>php tutorial || blog project || shetabamooz</title>

        <link
            rel="stylesheet"
            <?php 
            if(str_contains($path, "pages")) :?>
                href="../../assets/fonts/bootstrap-icons.css"

            <?php else : ?>
            href="assets/fonts/bootstrap-icons.css"
            <?php endif ?>
        />
            
        <link
            <?php 
            if(str_contains($path, "pages")) :?>
            href="../../assets/css/bootstrap.min.css"
            <?php else : ?>
                href="assets/css/bootstrap.min.css"
            <?php endif ?>
            rel="stylesheet"
          
            crossorigin="anonymous"
        />

        <link rel="stylesheet" href="./assets/css/style.css" />
    </head>

    <body>
        <header
            class="navbar sticky-top bg-secondary flex-md-nowrap p-0 shadow-sm"
        >
            <a
                class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-5 text-white"
                href="index.html"
                >پنل ادمین</a
            >

            <button
                class="ms-2 nav-link px-3 text-white d-md-none"
                type="button"
                data-bs-toggle="offcanvas"
                data-bs-target="#sidebarMenu"
            >
                <i class="bi bi-justify-left fs-2"></i>
            </button>
        </header>