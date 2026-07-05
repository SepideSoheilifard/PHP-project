<?php 
    include "includes/header.php";
    if(isset($_GET['id']))
    {
        $categoryId=$_GET['id'];
        $posts=$conn->query("select * from posts where category_id=$categoryId");
    }else{
        $posts=$conn->query("select * from posts");
    }
    
    $inputErrorName='';
    $inputErrorEmail='';
    $successSubscribe='';
    
    if(isset($_POST['send']))
    {
        
        $name=$_POST['name'];
        $email=$_POST['email'];

        if(empty($name))
             $inputErrorName='لطفا نام را وارد کنید';
        if(empty($email))
             $inputErrorEmail='لطفا ایمیل خود را وارد کنید';
        if(!empty($name) and !empty($email))
            {
                $insertIntoSubscribe=$conn->query("insert into subscribes(name,email) values ('$name','$email')");
                $successSubscribe='ثبت نام شما با موفقیت انجام شد';
            }    
    }
?>    
         <!-- top slider -->
           <?php 
               include "includes/slider.php";
            ?>

        <section class="main-section container">
            <!-- posts content  -->
            <div class="article-div">
                <?php foreach($posts as $post) : 
                    $categoryId=$post['category_id'];
                   
                 ?>
                <article class="card">
                    <figure>
                        <img src="admin/images/posts/<?= $post['image']?>"
                         alt="">
                    </figure>
                    <div class="title-card">
                        <h3><?= $post['title'];?> </h3>
                        <button><?= getCategory($categoryId);?></button>
                    </div>
                    <p>
                        <?= $post['body']?>
                    </p>
                    <div class="bottom-card">
                       <button> <a href="single.php?postid=<?= $post['id']?>">مشاهده</a></button>
                        <span>نویسنده:
                            <?= $post['author'];?>
                            </span>
                    </div>
                </article>
                <?php endforeach ?>
                 <?php
                  if($posts->rowCount() <1) : ?>
                  <div class="danger1">هیچ پستی یافت نشد</div>
                  <?php endif ?>
                
            </div>
            <!-- side-bar -->
               <?php 
                  include "includes/sidebar.php"
                  ?>
        </section>
            <!-- comment section  -->
        <!-- <section class="comment-section container">
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
            
        </section> -->
    </main>
    <!-- Footer section  -->
     <?php
        include "includes/footer.php";
     ?>
</body>
<script>
     const swiper = new Swiper('.swiper', {

  loop: true,
   autoplay:{
    delay:2000
   },
   speed:2000
 
});
</script>
</html> 