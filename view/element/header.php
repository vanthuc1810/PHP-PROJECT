<?php
include 'admin/class/cartegory_class.php';
include 'admin/class/user_class.php';
include 'admin/class/product_class.php';
include 'admin/class/promote_class.php';
include 'admin/class/giohang.php';
include 'cloudinary/vendor/autoload.php';
$cartegory = new cartegory();
$user = new user();
if (isset($_SESSION['user_id'])) {
    $show_user = $user->show_userById($_SESSION['user_id']);
} else $show_user = $user->show_user();
$show_cartegory = $cartegory->show_cartegory();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main-css.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="/css/home.css">
    <link rel="stylesheet" href="/css/shop.css">
    <link rel="stylesheet" href="/css/contact.css">
    <link rel="stylesheet" href="/css/product.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/fontawesome-free-6.5.1-web/css/all.min.css">
    <!-- Libararies stylesheet -->
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <title></title>
</head>

<body>
    <!-- A grey horizontal navbar that becomes vertical on small screens -->
    <div class="positio top-0" style="z-index: 99; left: 0; right:0">
        <header>
            <nav class="navbar navbar-expand-md bg-light ">
                <div class="container-md">
                    <ul class="navbar-nav align-items-center">
                        <a href="" class="navbar-brand">
                            <img src="/img/logo.png.webp" alt="">
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <li class="nav-item mx-5 active">
                            <a class="nav-link text-dark d-block py-4" style="height: 100%;" href="?view=home">HOME</a>
                        </li>
                        <li class="nav-item mx-5">
                            <a class="nav-link text-dark d-block py-4" style="height: 100%;" href="?view=shop">SHOP</a>
                        </li>
                        <li class="nav-item mx-5">
                            <a class="nav-link text-dark d-block py-4" style="height: 100%;" href="#">PAGES</a>
                        </li>
                        <li class="nav-item mx-5">
                            <a class="nav-link text-dark d-block py-4" style="height: 100%;" href="?view=contact">CONTACT</a>
                        </li>
                    </ul>
                    <div class="d-flex gap-4 align-items-center">
                        <div class="profile-toggle position-relative account text-dark text-decoration-none" style="z-index: 1;">
                            <button class="btn bg-customcolor" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
                                <?php echo (isset($_SESSION['user_name'])) ? $_SESSION['user_name'] : 'Username'?>
                            </button>
                            <div style="min-height: 120px;" class="position-absolute">
                                <div class="collapse collapse-horizontal" id="collapseWidthExample">
                                    <div class="card card-body" style="width: 250px;">
                                        <div class="">
                                            <?php
                                            if (!isset($_SESSION['user_id'])) {
                                            ?>
                                                <li class="d-flex align-items-center gap-1">
                                                    <i class="bi bi-box-arrow-right fs-5 mx-2"></i>
                                                    <a href="?view=log_in" class="account fs-6 text-dark text-decoration-none">Log in</a>
                                                </li>

                                            <?php
                                            } else {
                                            ?>

                                                <li class="d-flex align-items-center gap-1">
                                                    <i class="bi bi-person fs-5 mx-2"></i>
                                                    <a href="?view=user" class="account fs-6 text-dark text-decoration-none">Thông tin cá nhân</a>
                                                </li>
                                                <li class="d-flex align-items-center gap-1">
                                                    <i class="bi bi-cart2 fs-5 mx-2"></i>
                                                    <a href="?view=user" class="account fs-6 text-dark text-decoration-none">Giỏ hàng</a>
                                                </li>
                                                <?php
                                                $result = $show_user->fetch_assoc();
                                                if ($result['user_admin'] == '1') {
                                                ?>
                                                    <li class="d-flex align-items-center gap-1">
                                                        <i class="bi bi-person-lock fs-5 mx-2"></i>
                                                        <a href="?view=admin_cartegory_list" class="account fs-6 text-dark text-decoration-none">Admin</a>
                                                    </li>
                                                <?php
                                                }
                                                ?>
                                                <li class="d-flex align-items-center gap-1">
                                                    <i class="bi bi-box-arrow-left fs-5 mx-2"></i>
                                                    <a href="?view=log_out" class="account fs-6 text-dark text-decoration-none">Log out</a>
                                                </li>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        if(isset($_SESSION['user_id'])){
                            $giohang = new giohang();
                            $giohang = $giohang->show_number($_SESSION['user_id']);
                            $giohang = $giohang->fetch_assoc();
                        }
                        ?>
                        <a href="?view=giohang" class="btn bg-customcolor position-relative">
                            <i class="bi bi-cart"></i>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                <?php
                                if(isset($giohang))
                                {
                                    echo ($giohang['number'] > 100) ? '99+' : $giohang['number']; 
                                }else echo '0'; 
                                ?>
                            </span>
                        </a>
                    </div>
                </div>
            </nav>

        </header>
        <div class="container" style="margin-top: 0; padding-left:0;">
            <div class="row align-items-center">
                <div class="col col-4">
                    <div class="heading-department d-flex align-items-center gap-4 cursor-pointer text-light px-3 position-relative w-100">
                        <i class="bi bi-list fs-3 px-3"></i>
                        <li class="m-0 ml-2 fw-bold fs-6 list-unstyled position-relative">All departments

                        </li>
                        <i class="bi bi-chevron-compact-down fw-bold"></i>
                        <ul class="menu list-unstyled position-absolute w-100" style="z-index: 9;">
                            <?php
                            if ($show_cartegory) {
                                while ($result = $show_cartegory->fetch_assoc()) {
                            ?>
                                    <li class="py-4 px-4 cartegory-items-name"><a href="?view=shop&cartegory_id=<?php echo $result['cartegory_id'] ?>" class="text-decoration-none text-dark fw-normal fs-6"><?php echo $result['cartegory_name'] ?></a></li>
                            <?php

                                }
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="col col-8">
                    <div class="input-group" style="z-index: 0;">
                        <input type="text" class="form-control" placeholder="Search..." aria-label="Search" aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary bg-customcolor fw-bold " style="z-index: 0;" type="button" id="button-addon2">Search</button>
                    </div>
                </div>
            </div>
        </div>
    </div>