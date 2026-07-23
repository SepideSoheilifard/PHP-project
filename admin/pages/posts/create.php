<?php include "../../includes/header.php";
$inputErrorTitle="";
if(isset($_POST['create']))
    {
        $title=$_POST['title'];
        $author=$_POST['author'];
        $categoryId=$_POST['categoryId'];
        $imageName=$_FILES['image']['name'];
        $imageName=time().$imageName;
        $imageTmp=$_FILES['image']['tmp-name'];
        $body=$_POST['body'];

        if(empty($title))
            $inputErrorTitle="لطفا عنوان را وارد کنید";
        if(empty($author))
            $inputErrorAuthor="لطفا نویسنده را وارد کنید";
        // if(empty($image))
        //     $inputErrorImage="لطفا عکس را وارد کنید";
        if(empty($body))
            $inputErrorBody="لطفا متن را وارد کنید";



        if(!empty($title) and !empty($author) and !empty($body))
            {
                move_uploaded_file($imageTmp,"../../images/posts/".$imageName );          
                $createCategory=$conn->query("insert into posts (`title`,`body`,`category_id`,`image`,`author` )
                                                       values ('$title','$body',$categoryId,'$imageName','$author')");
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
                        <h1 class="fs-3 fw-bold">ایجاد مقاله</h1>
                    </div>

                    <!-- Posts -->
                    <div class="mt-4">
                        <form class="row g-4" method="post" enctype="multipart/form-data">
                            <div class="col-12 col-sm-6 col-md-4">
                                <label class="form-label">عنوان مقاله</label>
                                <input type="text" name="title" class="form-control" />
                            </div>

                            <div class="col-12 col-sm-6 col-md-4">
                                <label class="form-label">نویسنده مقاله</label>
                                <input type="text" name="author" class="form-control" />
                            </div>

                            <div class="col-12 col-sm-6 col-md-4">
                                <label class="form-label"
                                    >دسته بندی مقاله</label
                                >
                                <select class="form-select" name="categoryId">
                                    <?php echo getcategory(null); ?>
                                    
                                </select>
                            </div>

                            <div class="col-12 col-sm-6 col-md-4">
                                <label for="formFile" class="form-label"
                                    >تصویر مقاله</label
                                >
                                <input name="image" class="form-control" type="file" />
                            </div>

                            <div class="col-12">
                                <label for="formFile" class="form-label"
                                    >متن مقاله</label
                                >
                                <textarea
                                    class="form-control"
                                    name="body"
                                    rows="6"
                                ></textarea>
                            </div>

                            <div class="col-12">
                                <button type="submit" name="create" value="send" class="btn btn-dark">
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
