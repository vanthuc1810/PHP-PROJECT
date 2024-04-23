    <?php
    $admin = new user();
    $admin = $admin -> show_userById($_SESSION['user_id']);
    $result = $admin -> fetch_assoc();
    ?>
    <section class="admin-content container" style="padding-left: 0; margin-top: 140px;">
        <div class="container-xxl bg-white d-flex p-0 justify-content-between">
            <!-- Sidebar Start -->
            <div class="sidebar pe-4 px- pb-3 pt-3">
                <nav class="navbar bg-light navbar-light">
                    <div class="d-flex align-items-center ms-4 mb-4">
                        <div class="position-relative">
                            <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                        </div>
                        <div class="ms-3">
                            <h6 class="mb-0"><?php echo $result['user_name'] ?></h6>
                            <span>Admin</span>
                        </div>
                    </div>
                    <div class="navbar-nav w-100">
                        <a href="index.html" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle d-block" data-bs-toggle="dropdown"><i class="bi bi-card-list"></i>Danh mục</a>
                            <div class="dropdown-menu bg-transparent border-0">
                                <a href="?view=admin_cartegory_add" class="icon-link icon-link-hover fs-6 dropdown-item">Thêm danh mục</a>
                                <a href="?view=admin_cartegory_list" class="icon-link icon-link-hover fs-6 dropdown-item ">Danh sách danh mục</a>
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle d-block" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Sản phẩm</a>
                            <div class="dropdown-menu bg-transparent border-0">
                                <a href="?view=admin_product_add" class="icon-link icon-link-hover fs-6 dropdown-item">Thêm sản phẩm</a>
                                <a href="?view=admin_product_list" class="icon-link icon-link-hover fs-6 dropdown-item ">Danh sách sản phẩm</a>
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle d-block" data-bs-toggle="dropdown"><i class="bi bi-gift"></i></i>Khuyến mại</a>
                            <div class="dropdown-menu bg-transparent border-0">
                                <a href="?view=admin_promote_add" class="icon-link icon-link-hover fs-6 dropdown-item">Thêm khuyến mại</a>
                                <a href="?view=admin_promote_addToProduct" class="icon-link icon-link-hover fs-6 dropdown-item ">Danh khuyến mại cho sản phẩm</a>
                                <a href="?view=promote_list" class="icon-link icon-link-hover fs-6 dropdown-item">Danh sách khuyến mại</a>
                            </div>
                        </div>                        
                    </div>
                </nav>
            </div>
            <!-- Sidebar End -->   
