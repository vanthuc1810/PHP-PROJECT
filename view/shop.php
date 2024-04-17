<?php
$cartegory = new cartegory();
$product = new product();
?>
<section>
    <div id="carouselExampleSlidesOnly" class="carousel slide z-index-5" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./img/banner-3.webp" class="d-block w-100" alt="..." style="border-radius: 0;">
                <div class="carousel-caption d-flex justify-content-center flex-column h-100 carousel-caption-banner-cus">
                    <h2 class="">Ogani Shop</h2>
                    <p><span class="fw-bold">Home</span> - Shop</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container py-5">
        <div class="row">
            <div class="col col-4">
                <h4 class="department-heading fw-bold">Department</h4>
                <div class="department-list">
                    <?php
                    $show_cartegory = $cartegory->show_cartegory();
                    if ($show_cartegory) {
                        while ($result = $show_cartegory->fetch_assoc()) {
                    ?>
                            <a href="?view=shop&cartegory_id=<?php echo $result['cartegory_id'] ?>" class="text-dark text-decoration-none">
                                <li class="department-item list-unstyled py-2 fw-normal"><?php echo $result['cartegory_name'] ?></li>
                            </a>
                    <?php
                        }
                    }
                    ?>
                </div>
                <div class="price-search py-5">
                    <input type="range" name="count" id="count" min="10" max="100">
                    <div class="price-range d-flex gap-1 fs-16 ">
                        <p class="start fw-bolds">
                            $10
                        </p>
                        <p> - </p>
                        <p class="end fw-bolds">
                            $100
                        </p>
                    </div>
                </div>
            </div>
            <div class="col col-8">
                <h2 class="sale-heading">Sale Off<h2>
                        <div class="row py-5">
                            <?php
                            $show_best_product_discount = $product->show_best_discount();
                            if ($show_best_product_discount) {
                                while ($result = $show_best_product_discount->fetch_assoc()) {
                            ?>
                                    <div class="col-12 col-sm-6 col-md-4 align-items-center d-flex flex-column sale-item position-relative hidden item-hover">
                                                                                <a href="?view=product&product_id=<?php echo $result['product_id'] ?>">
                                        <a href="?view=product&product_id=<?php echo $result['product_id'] ?>">
                                        <img src="admin/uploads/<?php echo $result['product_img'] ?>" alt="" class="w-100">
                                        </a>
                                        <div class="in4-product py-3 pb-1 text-center">
                                            <h6><?php echo $result['product_name'] ?></h6>
                                            <p class="fw-bolds fs-18">
                                                <?php $value = $result['product_price'] * (1 - $result['product_discount'] / 100);
                                                echo $value . '$' ?>
                                                <span class="sale-item-discount fs-14 color-gray">
                                                    <?php echo $result['product_price'] . '$' ?>
                                                </span>
                                            </p>
                                        </div>
                                        <div class="sale-item-discount-percent fs-14 text-light d-flex align-items-center justify-content-center fw-light" style="left: 0;">
                                            <?php echo '-' . $result['product_discount'] . '%' ?>
                                        </div>
                                        <!-- action buy item-->
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
                        <h6 class="heading-list-items text-center fw-normal color-gray fs-14">
                            <span class="count fw-bolds fs-6 text-dark">16</span>
                            Sản phẩm được tìm thấy
                        </h6>
                        <div class="row">
                            <?php
                            $value = 9;
                            $cartegory_id =0;
                            if(isset($_POST['value']))
                            {
                                $value += intval($_POST['value']);
                            }
                            $show_product = $product->show_product($value);

                            if (isset($_GET['cartegory_id'])) {
                                $cartegory_id = $_GET['cartegory_id'];
                                $show_product = $product->show_productById($cartegory_id, $value);
                            }
                            if ($show_product) {
                                while ($result = $show_product->fetch_assoc()) {
                            ?>
                                    <div class="col-12 col-sm-6 col-md-4 align-items-center d-flex flex-column p-relative hidden item-hover">
                                        <a href="?view=product&product_id=<?php echo $result['product_id'] ?>">
                                            <img src="admin/uploads/<?php echo $result['product_img'] ?>" alt="" class="w-100">
                                        </a>
                                        <div class="in4-product py-3 pb-1 text-center">
                                            <h6><?php echo $result['product_name'] ?></h6>
                                            <p class="fw-bolds fs-18">
                                                <?php $value = $result['product_price'] * (1 - $result['product_discount'] / 100);
                                                echo $value . '$' ?>
                                                <span class="sale-item-discount fs-14 color-gray">
                                                    <?php echo $result['product_price'] . '$' ?>
                                                </span>
                                            </p>
                                        </div>
                                        <!-- action buy item-->
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
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="row py-4 justify-content-center">
                                <div class="col-4">
                                    <input type="hidden" name="value" value=<?php echo $value ?>>
                                    <input type="hidden" name="cartegory_id" value=<?php echo (isset($_POST['cartegory_id'])) ? $_POST['cartegory_id'] : 0 ?>>
                                    <button class="btn btn-success btn-lg w-100" type="submit" name="product_list_ad12">
                                        Xem thêm
                                    </button>
                                </div>
                            </div>
                        </form>
            </div>
        </div>
    </div>
    </div>
</section>
</body>
<script>
    const featured_items = document.querySelectorAll(".featured-item");
    for (const featured_item of featured_items) {
        featured_item.addEventListener('click', function() {
            featured_items.forEach(function(featured_item) {
                featured_item.classList.remove('active');
            })
            featured_item.classList.add('active');
        })
    }
    const department_items = document.querySelectorAll(".heading-department");
    const department_menu = department_items[0].getElementsByClassName("menu");
    department_items[0].addEventListener('click', function() {
        if (department_menu[0].classList.contains("active")) {
            department_menu[0].classList.remove("active")
        } else {
            department_menu[0].classList.add("active")
        }
    })
</script>