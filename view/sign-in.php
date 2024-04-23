<section style="margin-top: 140px;">
    <div class="container py-6 px-5 mt-5 d-flex justify-content-center align-items-center" style="min-height: 60vh;">
        <div class="row d-flex justify-content-around w-100 ">
            <form action="../controller/sign_in_control.php" class="col-md-5 d-flex flex-wrap justify-content-center " method="POST">
                <div class="row justify-content-around align-items-end">
                    <div class="col-5">
                        <img src="/img/logo.png.webp" alt="">
                    </div>
                    <div class="col-7">
                        <h3 class="text-center my-1 fw-bold">
                        ĐĂNG NHẬP
                        </h3>
                    </div>
                </div>     
                <div class="input-group mb-3">
                    <input required style="max-height: 3rem" type="email" name="user_email" id="user_email" class="form-control boder-none ountline-none" placeholder="E-mail">
                </div>
                <div class="input-group mb-3">
                    <input required style="max-height: 3rem" type="password" name="user_password" id="user_password" class="form-control boder-none ountline-none" placeholder="Password">
                </div>
                <button type="submit"  style="max-height: 3rem" class="btn bg-customcolor w-100" data-bs-toggle="modal" data-bs-target="">Đăng nhập</button>    
                <div class="sign-up justify-content-end w-100 d-flex px-2">
                <a href="?view=sign_up" class="fs-5 color-green">Đăng ký</a>
                </div>
            </form>
            <div class="col-6 img-slider flex">
                <img src="/img/pc3.jpeg" alt="" class="">
                <img src="/img/pc4.jpeg" alt="" class="">
                <img src="/img/market.jpg" alt="" class="">
            </div>
        </div>
    </div>
</section>