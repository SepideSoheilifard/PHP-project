<?php
   include "config/db.php";
   include "includes/function.php";
        $categories=$conn->query("select * from categories");
   
   
?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="./css/footer.css">

    <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css"
/>

<script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>
</head>
<body> 
    <header>
        <section class="header container">
            <div class="logo">
                <a href="index.php">ShetabAmooz</a>
            </div>
            <nav class="nav-bar">
                <ul>
                    <?php foreach ($categories as $item) : ?>

                        <a href="index.php?id=<?= $item['id']; ?>"><?= $item['title']; ?></a>

                    <?php endforeach ?>
                    
                </ul>
            </nav>
        </section>
        <h1 class="base-line container"></h1>
    </header>