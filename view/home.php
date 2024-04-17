<?php
$cartegory = new cartegory();
$show_cartegory = $cartegory->show_cartegory();
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col col-4"></div>
            <div class="col col-8 d-flex overflow-hidden px-0">
                <img src="./img/slider1.jpeg" class="w-100" alt="...">
            </div>
        </div>
    </div>
</section>
<!-- Slider-->
<section>
    <div class="container text-center my-3">
        <div class="row mx-auto my-auto justify-content-center">
            <div id="recipeCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    <?php
                    if ($show_cartegory) {
                        $result = $show_cartegory->fetch_assoc();
                        $index = 1;
                    ?>
                        <div class="carousel-item active">
                            <div class="col-md-3">
                                <div class="card cus-boder-none py-5">
                                    <div class="card-img">
                                        <img src=<?php echo "/img/cartegory_" . $index . ".jpg";
                                                    $index++; ?> class="img-fluid py-4" style="width: 60%">
                                    </div>
                                    <div class="card-img-name"><?php echo $result['cartegory_name'] ?></div>
                                </div>
                            </div>
                        </div>
                        <?php
                        while ($result = $show_cartegory->fetch_assoc()) {
                        ?>
                            <div class="carousel-item">
                                <div class="col-md-3">
                                    <div class="card cus-boder-none py-5">
                                        <div class="card-img">
                                            <img src=<?php echo "/img/cartegory_" . $index . ".jpg" ?> class="img-fluid py-4" style="width: 60%">
                                        </div>
                                        <div class="card-img-name"><?php echo $result['cartegory_name'] ?></div>
                                    </div>
                                </div>
                            </div>
                    <?php
                            $index++;
                        }
                    }
                    ?>
                </div>
                <a class="carousel-control-prev bg-transparent w-aut" href="#recipeCarousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true">
                        <i class="fa-solid fa-chevron-left text-dark fs-2"></i>
                    </span>
                </a>
                <a class="carousel-control-next bg-transparent w-aut" href="#recipeCarousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true">
                        <i class="fa-solid fa-chevron-right text-dark fs-2"></i>
                    </span>
                </a>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container py-5">
        <div class="row justify-content-center align-items-center flex-column">
            <h1 class="text-heading col-6 text-center fs-2 fw-bold">
                Danh sách sản phẩm
            </h1>
            <div class="col-6 py-5">
                <form action="">
                    <ul class="list-feature list-unstyled d-flex justify-content-between">
                        <li class="featured-item text-decoration-none active">
                            <a href="?cartegory_id=0" class="text-decoration-none text-dark" id="featured-item-link">
                                ALL
                            </a>
                        </li>
                        <?php
                        $show_cartegory = $cartegory->show_cartegory();
                        if ($show_cartegory) {
                            while ($result = $show_cartegory->fetch_assoc()) {
                        ?>
                                <li class="featured-item">
                                    <a href="?cartegory_id=<?php echo $result['cartegory_id'] ?>" class="text-decoration-none text-dark" id= "featured-item-link">
                                        <?php echo $result['cartegory_name'] ?>
                                    </a>                                    
                                </li>
                        <?php
                            }
                        }
                        ?>
                    </ul>
                </form>
            </div>
        </div>
        <?php
        $product = new product();
        if(!isset($_GET['cartegory_id']))
        {
            $show_product = $product->show_product(12);
        }else
        { if ($_GET['cartegory_id'] == 0) {
            $show_product = $product->show_product(12);
        }else $show_product = $product->show_productById($_GET['cartegory_id'],12); 
        }
        ?>
        <div class="row">
            <div class="container-fluid">
                <div class="row ">
                    <?php
                    if ($show_product) {
                        while ($result = $show_product->fetch_assoc()) {
                    ?>
                            <div class="col-12 col-sm-6 col-md-3 align-items-center d-flex flex-column p-relative hidden item-hover">
                                <img src="admin/uploads/<?php echo $result['product_img'] ?>" alt="" class="w-100">
                                <div class="in4-product py-3 pb-1 text-center">
                                    <h6><?php echo $result['product_name'] ?></h6>
                                    <span class="fw-bold fs-5"><?php $price = $result['product_price'] * (1 - $result['product_discount'] / 100);
                                                                echo '$' . $price ?></span>
                                </div>
                                <div class="action-block w-60 d-flex justify-content-around">
                                    <li class="list-unstyled"><i class="fs-14 bi bi-suit-heart-fill"></i></li>
                                    <li class="list-unstyled"><i class="fs-14 bi bi-arrow-clockwise"></i></li>
                                    <li class="list-unstyled"><i class="fs-14 bi bi-cart-fill"></i></li>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
</section>
<section>
    <div class="container py-5">
        <div class="row ">
            <div class="col-6">
                <img src="/img/banner-1.jpg.webp" alt="" class="w-100">
            </div>
            <div class="col-6">
                <img src="/img/banner-2.jpg.webp" alt="" class="w-100">
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container py-5">
        <div class="row justify-content-center align-items-center flex-column">
            <h3 class="text-heading col-6 text-center fs-2 fw-bold">
                From The Blog
            </h3>
        </div>
        <div class="row pt-5">
            <div class="col-4">
                <img src="/img/blog-1.jpg.webp" alt="" class="w-100">
                <div class="row py-3">
                    <div class="col-6 fs-7 fw-normal color-gray">
                        <i class="bi bi-calendar"></i>
                        May 4, 2019
                    </div>
                    <div class="col-6 fs-7 fw-normal color-gray">
                        <i class="bi bi-chat"></i>
                        5
                    </div>
                </div>
                <div class="row">
                    <div class="content-heading fs-5 fw-bold">
                        Cooking tips make cooking simple
                    </div>
                </div>
                <div class="row">
                    <div class="content fs-6 fw-normal color-gray">
                        Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat
                    </div>
                </div>
            </div>
            <div class="col-4">
                <img src="/img/blog-2.jpg.webp" alt="" class="w-100">
                <div class="row py-3">
                    <div class="col-6 fs-7 fw-normal color-gray">
                        <i class="bi bi-calendar"></i>
                        May 4, 2019
                    </div>
                    <div class="col-6 fs-7 fw-normal color-gray">
                        <i class="bi bi-chat"></i>
                        5
                    </div>
                </div>
                <div class="row">
                    <div class="content-heading fs-5 fw-bold">
                        Cooking tips make cooking simple
                    </div>
                </div>
                <div class="row">
                    <div class="content fs-6 fw-normal color-gray">
                        Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat
                    </div>
                </div>
            </div>
            <div class="col-4">
                <img src="/img/blog-3.jpg.webp" alt="" class="w-100">
                <div class="row py-3">
                    <div class="col-6 fs-7 fw-normal color-gray">
                        <i class="bi bi-calendar"></i>
                        May 4, 2019
                    </div>
                    <div class="col-6 fs-7 fw-normal color-gray">
                        <i class="bi bi-chat"></i>
                        5
                    </div>
                </div>
                <div class="row">
                    <div class="content-heading fs-5 fw-bold">
                        Cooking tips make cooking simple
                    </div>
                </div>
                <div class="row">
                    <div class="content fs-6 fw-normal color-gray">
                        Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
