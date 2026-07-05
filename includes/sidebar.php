<?php

   $categories=$conn->query("select * from categories");
?>
<div class="side-bar">
                <div class="search-box">
                    <h4>جستجو در وبلاگ</h4>
                    <form class="search-form">
                        <input type="text" placeholder="جستجو...">
                        <button>
                            <svg class="iconly-default" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                             <path fill-rule="evenodd" clip-rule="evenodd" d="M9.69369 1.875C13.9129 1.87518 17.3328 5.29572 17.3328 9.51497C17.3327 11.4921 16.5812 13.2934 15.3488 14.6501L17.7633 17.0573C18.0077 17.3011 18.0079 17.6975 17.7642 17.9419C17.5204 18.1861 17.1247 18.1863 16.8804 17.9427L14.4341 15.5029C13.1313 16.5359 11.4854 17.1549 9.69369 17.1549C5.47431 17.1549 2.05392 13.7341 2.05371 9.51497C2.05371 5.2956 5.47427 1.875 9.69369 1.875ZM9.69369 3.125C6.16462 3.125 3.30371 5.98596 3.30371 9.51497C3.30392 13.044 6.16484 15.9049 9.69369 15.9049C13.2223 15.9048 16.0826 13.0438 16.0828 9.51497C16.0828 5.98608 13.2225 3.12518 9.69369 3.125Z" fill="currentColor"></path>
                            </svg>
                        </button>
                    </form>
                </div>
                <div>
                    <nav class="nav-sidebar">
                        <h4>دسته بندی ها</h4>
                        <ul>
                            <?php foreach ($categories as $item) : ?>

                            <a href="index.php?id=<?= $item['id']; ?>"><?php echo $item ['title']; ?></a>
                            <?php endforeach ?>
                        </ul>
                    </nav>
                </div>
                <div>
                      
                    <form class="login-box" action="index.php" method="post">
                        <h4>عضویت در خبرنامه</h4>
                        <?php if (!empty($successSubscribe)): ?>
                            <div class="allert">
                                <?= $successSubscribe ?>
                            </div>
                         <?php endif ?>
                        <label for="">نام</label>
                         <?php if (!empty($inputErrorName)): ?>
                            <div class="danger">
                                <?= $inputErrorName ?>
                            </div>
                         <?php endif ?>
                        <input type="text" name="name" value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';  ?>">
                        <label for="">ایمیل</label>
                          <?php if (!empty($inputErrorEmail)): ?>
                            <div class="danger">
                                <?= $inputErrorEmail ?>
                            </div>
                         <?php endif ?>
                        <input type="text" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';  ?>">
                        <button type="submit" name="send">ارسال</button>
                   </form>
                </div>
                <div class="about-div">
                    <h4>درباره ما</h4>
                    <p>طبیعت هنگامی زیبا است که در ما همان تأثیر هنر را نداشته باشد، به این طریق، زیبائی چه در طبیعت و چه در هنر ممکن است به وسیله همآهنگی و شورانگیزی و مخصوصأ اتحاد درونی آن دو باهم، توصیف گردد.</p>
                </div>
</div>