<?php
$product = new product();
if(!isset($_GET['product_id']) || $_GET['product_id'] == NULL)
    {
        echo "<script>window.location = 'index.php'</script>";
    }else {
        $product_id = $_GET['product_id'];
    }
$show_product = $product -> get_product($product_id);
$result = $show_product -> fetch_assoc();
?>
<section>
    <div class="container py-5">
        <div class="row">
            <div class="col col-8 d-flex justify-content-center">
                <div class="product_img" style="width: 600px; height: 600px;">
                    <img src="admin/uploads/<?php echo $result['product_img']?>" alt="@">
                </div>
            </div>
            <div class="col col-4 d-flex flex-column position-relative">
                <h2 class="fw-bold fs-5"><?php echo $result['product_name'] ?>
                </h2>
                <span class="rate color-orange">5.0 <i class="bi bi-star-fill"></i></span>
                <div class="row py-4">
                    <div class="col-4 fw-normal fs-6 color-gray">
                        Giá bán lẻ
                    </div>
                    <div class="col-8 fs-14 text-danger fw-normal">
                    <?php echo '$'.$result['product_price']*(1-$result['product_discount']/100) ?>

                        <span class="sale-item-discount fs-6 color-gray text-decoration-line-through">
                            <?php echo '$'.$result['product_price']?>
                        </span>
                    </div>

                </div>
                <div class="row py-4">
                    <div class="col-4 fw-normal fs-6 color-gray">
                        Tình trạng
                    </div>
                    <div class="col-8 fw-normal fs-6">
                        <?php echo ($result['product_price']>0) ? 'Còn hàng' : 'Hết hàng'?>
                    </div>
                </div>
                <div class="row py-4">
                    <div class="col-4 fw-normal fs-6 color-gray">
                        Vận chuyển
                    </div>
                    <div class="col-8 fw-normal fs-6">
                        Miễn phí giao hàng cho đơn từ 10$
                    </div>
                </div>
                <div class="row py-4">
                    <div class="col-4 fw-normal fs-6 color-gray">
                        Khuyến mại
                    </div>
                    <div class="col-8 fw-normal fs-6 text-danger">
                        <?php echo $result['product_promote']?>
                    </div>
                </div>
                <div class="row py-4">
                    <div class="col-4 fw-normal fs-6 color-gray">
                        Số lượng
                    </div>
                    <div class="col-8 fw-normal fs-6 text-danger">
                        <button class="dec fw-bold fs-6 px-1 border-0 bg-light">
                            -
                        </button>
                        <input type="text" class="count-product border-0" placeholder="0">
                        <button class="inc fw-bold fs-6 px-1 border-0 bg-light">
                            +
                        </button>
                    </div>
                </div>
                <div class="row pt-4 position-absolute action-btn gap-5">
                    <button class="col-6 fw-normal fs-16 bg-danger text-light border-0 pr-2 py-2 fw-bold">
                        Thêm vào giỏ hàng
                        <i class="bi bi-cart-plus"></i>
                    </button>
                    <button class="col-4 fw-normal fs-16 bg-danger text-light border-0 pl-2 py-2 fw-bold">
                        Mua ngay
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container py-5">
        <div class="row">
            <div class="col-5 d-flex">
                <img src="/img/producer.jfif" alt="" class="producer-img">
                <div class="row producer-infor px-3 flex-start">
                    <h6 class="name fw-normal">Organic Shop</h6>
                    <div class="row">
                        <div class="col-6 pr-1">
                            <button class="color-orange bg-white chat-btn w-100">
                                <i class="bi bi-chat-left-text"></i>
                                Chat now
                            </button>
                        </div>
                        <div class="col-6 pl-1">
                            <button class="view-btn bg-white w-100 fw-normal">
                                <i class="bi bi-shop"></i>
                                View now
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-7">
                <div class="row">
                    <div class="col-4">
                        <p class="fw-normal">Đánh giá <span class="rate color-orange px-3">9.8k</span></p>
                        <p class="fw-normal">Sản phẩm <span class="count color-orange px-3">90</span></p>
                    </div>
                    <div class="col-4">
                        <p class="fw-normal">Tỷ lệ phản hồi <span class="rate color-orange px-3">90%</span></p>
                        <p class="fw-normal">Thời gian phản hồi <span class="count color-orange px-3">30p</span></p>
                    </div>
                    <div class="col-4">
                        <p class="fw-normal">Tham gia <span class="rate color-orange px-3">9.8k</span></p>
                        <p class="fw-normal">Người theo dõi <span class="count color-orange px-3">500</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container py-3">
        <div class="row">
            <h3 class="heading">
                Mô tả sản phẩm
            </h3>
            <div class="col-8 custom-text-justify fw-normal review-product">
                Hiện nay khi vấn đề thực phẩm bẩn đang được xã hội đặc biệt quan tâm thì trên thị trường đã xuất hiện nhiều thương hiệu tự hô hào là bán thực phẩm sạch, bán rau hữu cơ. Nhưng liệu rằng đây có phải là rau sạch, rau an toàn hay không? Để nhận biết được điều đó, chúng ta cần cập nhật những kiến thức, kỹ năng rau sạch, rau hữu cơ,.. Vậy rau sạch là gì? Rau hữu cơ là gì? Làm sao để phân biệt rau sạch và rau hữu cơ Hãy cùng EcoClean Việt Nam tìm hiểu qua bài viết dưới đây.
            </div>
        </div>
    </div>
</section>