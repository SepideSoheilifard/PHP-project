<?php include "../../includes/header.php";
$inputErrorTitle="";
$inputErrorAuthor="";
$inputErrorBody="";
if(isset($_GET['id']))
    {
        $id=$_GET['id'];
        $post=$conn->query("select * from posts where id=$id")->fetch();
        $oldImage=$post['image']; 
    }
if(isset($_POST['edit']))
    {
        $postId=$_POST['id'];
        $title=$_POST['title'];
        $author=$_POST['author'];
        $categoryId=$_POST['categoryId'];
        $imageName=$_FILES['image']['name'];
        $imageTmp=$_FILES['image']['tmp_name'];
        $body=$_POST['body'];

        if(empty($title))
            $inputErrorTitle="لطفا عنوان را وارد کنید";
        if(empty($author))
            $inputErrorAuthor="لطفا نویسنده را وارد کنید";
        // if(empty($image))
        //     $inputErrorImage="لطفا عکس را وارد کنید";
        if(empty($body))
            $inputErrorBody="لطفا متن را وارد کنید";



        if(!empty($title) and !empty($author) and !empty($body) and empty($imageName))
            {          
                $createCategory=$conn->query("UPDATE `posts` SET `title`='$title',`body`='$body',`category_id`=$categoryId,`author`='$author' WHERE id=$postId ");    
                header("Location:index.php");
            }
            else
            {
                if(file_exists("../../images/posts/".$oldImage))
                    {
                        unlink("../../images/posts/".$oldImage);
                    }
                $imageName=time().$imageName;
                move_uploaded_file($imageTmp,"../../images/posts/".$imageName );          
                $createCategory=$conn->query("UPDATE `posts` SET `title`='$title',`body`='$body',`category_id`=$categoryId,`author`='$author',`image`='$imageName' 
                WHERE id=$postId ");    
                header("Location:index.php");
            }    
        
    }
?>

        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar Section -->
                <?php include "../../includes/sidebar.php" ?>

                <!-- Main Section -->
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    <div
                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
                    >
                        <h1 class="fs-3 fw-bold">ویرایش مقاله</h1>
                    </div>

                    <!-- Posts -->
                    <div class="mt-4">
                        <form class="row g-4" method="post" enctype="multipart/form-data">
                            <div class="col-12 col-sm-6 col-md-4">
                                <label class="form-label">عنوان مقاله</label>
                                <?php if(!empty($inputErrorTitle)): ?>
                                    <div class="alert alert-danger"><?= $inputErrorTitle?></div>
                                <?php endif ?>   
                                <input type="text" name="title" value="<?= $post['title'] ?>" class="form-control" />
                            </div>
                            <input type="hidden" name="id" value="<?= $id ?>">
 
                            <div class="col-12 col-sm-6 col-md-4">
                                <label class="form-label">نویسنده مقاله</label>
                                <?php if(!empty($inputErrorAuthor)): ?>
                                    <div class="alert alert-danger"><?= $inputErrorAuthor?></div>
                                <?php endif ?>
                                <input type="text" name="author" value="<?= $post['author'] ?>" class="form-control" />
                            </div>

                            <div class="col-12 col-sm-6 col-md-4">
                                <label class="form-label"
                                    >دسته بندی مقاله</label
                                >
                                <select class="form-select" name="categoryId">
                                    <?php echo getcategory($post['category_id'] ); ?>
                                    
                                </select>
                            </div>

                            <div class="col-12 col-sm-6 col-md-4">
                                <label for="formFile" class="form-label"
                                    >تصویر مقاله</label
                                >
                                <?php if(!empty($inputErrorImage)): ?>
                                    <div class="alert alert-danger"><?= $inputErrorImage?></div>
                                <?php endif ?>
                                <input name="image" class="form-control" type="file" />
                                <img src="../../images/posts/<?= $post['image'] ?>" alt="">
                            </div>

                            <div class="col-12">
                                <label for="formFile" class="form-label"
                                    >متن مقاله</label
                                >
                                <?php if(!empty($inputErrorBody)): ?>
                                    <div class="alert alert-danger"><?= $inputErrorBody?></div>
                                <?php endif ?>
                                <textarea
                                    class="form-control"
                                    name="body"
                                    rows="6"
                                ><?= $post['body'] ?></textarea>
                            </div>

                            <div class="col-12">
                                <button type="submit" name="edit" value="send" class="btn btn-dark">
                                     ایجاد
                                </button>
                            </div>
                        </form>
                    </div>
                </main>
            </div>
        </div>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
