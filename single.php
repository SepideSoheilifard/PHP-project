<?php
include "includes/header.php";
 if(isset($_GET['postid']))
    {
        $postId=$_GET['postid'];
        $post=$conn->query("select * from posts where id=$postId")->fetch();
        $categoryId=$post['category_id'];
        
    }
?>
         <section class="main-section container">
            <!-- posts content  -->
            <div class="article-divsingle">
                
                <article class="cardsingle">
                    <figure>
                        <img src="admin/images/posts/<?= $post['image']?>"
                         alt="">
                    </figure>
                    <div class="title-cardsingle">
                        <h3><?= $post['title'];?> </h3>
                        <button><?= getCategory($categoryId);?></button>
                    </div>
                    <p>
                         <?= $post['body']?>
                    </p>
                    <div class="bottom-cardsingle">
                
                        <span>نویسنده:
                           <?= $post['author'];?>
                            </span>
                    </div>
                </article>
               
                 
                  
                
            </div>
            <!-- side-bar -->
              <?php 
                  include "includes/sidebar.php"
                  ?>
        </section>
            <!-- comment section  -->
        <section class="comment-section container">
            <div class="comment-div">
                <h4>ارسال کامنت</h4>
                <label for="">نام</label>
                <input type="text">
                <label for="">متن کامنت</label>
                <textarea name="" id="" placeholder="کامنت خودرا بنویسید"></textarea>
                <button type="submit" class="send-btn">ارسال</button>
            </div>
            <div>
                 <div class="member-comment">
                <div class="name-comment">
                    <figure>
                        <img src="./images/person-icon.jpg" alt="">
                    </figure>
                    <span>محمد صالحی</span>
                </div>
                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت </p>
            </div>
            <div class="member-comment">
                <div class="name-comment">
                    <figure>
                        <img src="./images/person-icon.jpg" alt="">
                    </figure>
                    <span>محمد صالحی</span>
                </div>
                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت </p>
            </div>
            <div class="member-comment">
                <div class="name-comment">
                    <figure>
                        <img src="./images/person-icon.jpg" alt="">
                    </figure>
                    <span>محمد صالحی</span>
                </div>
                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت </p>
            </div>
            </div>
            
        </section>
    </main>
     <!-- Footer section  -->
     <?php
        include "includes/footer.php";
     ?> 
</body>
</html>