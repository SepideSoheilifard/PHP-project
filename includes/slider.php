<?php
$sliders=$conn->query("select * from posts_slider");
?>

<main>
        <div class="swiper container top-banner">
            <div class="swiper-wrapper swiper-div">
                <!-- slider 1  -->
                <?php
                 foreach ($sliders as $slider)  :  
                 $postId=$slider['post_id'];
                 $post=$conn->query("select * from posts where id=$postId")->fetch();           
                ?> 
                 <div class="swiper-slide">
                     <img src="admin/images/posts/<?= $post['image'] ?>" alt="">
                    </div>

              
                
                <?php endforeach ?>


            </div>
        </div>