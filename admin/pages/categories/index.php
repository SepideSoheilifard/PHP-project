<?php include "../../includes/header.php";
$categories=$conn->query("select * from categories");
if(isset($_GET['id']) and isset($_GET['table']))
    {
        $id=$_GET['id'];
        $table=$_GET['table'];
        delete($table,$id);
    }
?>

        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar Section -->
                <div
                    class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary"
                >
                    <div
                        class="offcanvas-md offcanvas-end bg-body-tertiary"
                        tabindex="-1"
                        id="sidebarMenu"
                    >
                        <div class="offcanvas-header">
                            <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="offcanvas"
                                data-bs-target="#sidebarMenu"
                            ></button>
                        </div>

                        <div
                            class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto"
                        >
                            <ul class="nav flex-column pe-3">
                                <li class="nav-item">
                                    <a
                                        class="nav-link link-body-emphasis text-decoration-none d-flex align-items-center gap-2"
                                        href="../../index.html"
                                    >
                                        <i
                                            class="bi bi-house-fill fs-4 text-secondary"
                                        ></i>
                                        <span class="fw-bold">داشبورد</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a
                                        class="nav-link link-body-emphasis text-decoration-none d-flex align-items-center gap-2"
                                        href="../posts/index.html"
                                    >
                                        <i
                                            class="bi bi-file-earmark-image-fill fs-4 text-secondary"
                                        ></i>
                                        <span class="fw-bold">مقالات</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a
                                        class="nav-link link-body-emphasis text-decoration-none d-flex align-items-center gap-2 text-secondary"
                                        href="./index.html"
                                    >
                                        <i
                                            class="bi bi-folder-fill fs-4 text-secondary"
                                        ></i>

                                        <span class="fw-bold">دسته بندی</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a
                                        class="nav-link link-body-emphasis text-decoration-none d-flex align-items-center gap-2"
                                        href="../comments/index.html"
                                    >
                                        <i
                                            class="bi bi-chat-left-text-fill fs-4 text-secondary"
                                        ></i>

                                        <span class="fw-bold">کامنت ها</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a
                                        class="nav-link link-body-emphasis text-decoration-none d-flex align-items-center gap-2"
                                        href="#"
                                    >
                                        <i
                                            class="bi bi-box-arrow-right fs-4 text-secondary"
                                        ></i>

                                        <span class="fw-bold">خروج</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Main Section -->
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    <div
                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
                    >
                        <h1 class="fs-3 fw-bold">دسته بندی ها</h1>

                        <div class="btn-toolbar mb-2 mb-md-0">
                            <a href="./create.php" class="btn btn-sm btn-dark">
                                ایجاد دسته بندی
                            </a>
                        </div>
                    </div>

                    <!-- Categories -->
                    <div class="mt-4">
                        <div class="table-responsive small">
                           <table class="table table-hover align-middle">
                                <thead>
                                    <tr>
                                        <th>ردیف</th>
                                        <th>عنوان</th>
                                        <th>عملیات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $row=1;
                                    foreach($categories as $category): ?>
                                    <tr>
                                        <th><?= $row ?></th>
                                        <td><?= $category['title'] ?></td>
                                        <td>
                                            <a
                                                href="edit.php?id=<?= $category['id'] ?>"
                                                class="btn btn-sm btn-outline-dark"
                                                >ویرایش</a
                                            >
                                            <a
                                                href="index.php?id=<?= $category['id'] ?>&table=categories"
                                                class="btn btn-sm btn-outline-danger"
                                                >حذف</a
                                            >
                                        </td>
                                    </tr>
                                    <?php
                                    $row++;
                                    endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </main>
            </div>
        </div>

        <!-- footer section -->
         <?php
        include "../../includes/footer.php";
       ?> 
    </body>
</html>
