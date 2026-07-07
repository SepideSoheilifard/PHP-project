<?php
include "includes/header.php";
$errorInputName="";
$errorInputComment="";
$succesComment="";

if(isset($_GET['postid']))

    {
        $postId=$_GET['postid'];
        $post=$conn->query("select * from posts where id=$postId")->fetch();
        $categoryId=$post['category_id'];
        
    }
if(isset($_POST['send']))
    {
        $name=$_POST['name'];
        $comment=$_POST['comment'];
        $postId=$_POST['postId'];  
        $post=$conn->query("select * from posts where id=$postId")->fetch();
        $categoryId=$post['category_id'];   

        if(empty($name))
            $errorInputName="لطفا نام را وارد کنید";
        
        if(empty($comment))
            $errorInputComment="لطفا متن کامنت را وارد کنید";

        if(!empty($name) and !empty($comment))
        {
            $insertComment=$conn->query("insert into comments(name,comment,post_id)
                values('$name','$comment',$postId)");
            $succesComment="کامنت شما با موفقیت ثبت شد و بعد از تایید مدیر نمایش داده خواهد شد";

        }
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
                        <h3><?= $post['title'];?></h3>
                        <button><?= getcategory($categoryId); ?></button>
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
            <form class="comment-div" action="single.php" method="post">
                <h4>ارسال کامنت</h4>
                <label for="">نام</label>
                <?php if(!empty($errorInputName)) :?>
                    <div class="danger">
                        <?= $errorInputName ?>
                    </div>
                <?php endif ?>    
                <input type="text" name="name">
                <label for="">متن کامنت</label>
                <?php if(!empty($errorInputComment)) :?>
                    <div class="danger">
                        <?= $errorInputComment ?>
                    </div>
                <?php endif ?>  
                <textarea name="comment" id="" placeholder="کامنت خودرا بنویسید"></textarea>
                <input type="hidden" name="postId" value="<?= $postId ?>">
                <button type="submit" name="send" class="send-btn">ارسال</button>
            </form>
        <div>
            <div class="com-title">
                <h4>تعداد کامنت : <?= countComment($postId) ?></h4>
                <h1 class="small-line"></h1>
            </div>
            <?php
               $comments=$conn->query("select * from comments where status=1 and post_id=$postId");
            ?>
            <?php foreach($comments as $comment):?>
            <div class="member-comment" action="single.php" method="post">
                <div class="name-comment">
                    <figure>
                        <img src="./images/person-icon.jpg" alt="">
                    </figure>
                    <span><?= $comment['name'] ?></span>
                </div>
                <p>
                    <?= $comment['comment'] ?>
                </p>
            </div>
            <?php endforeach ?>
           
        </div>
            
        </section>
    </main>
     <!-- Footer section  -->
     <?php
        include "includes/footer.php";
     ?> 
</body>
</html>