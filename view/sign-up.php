<section style="margin-top: 140px;">
    <div class="container p-5 mt-5">
        <div class="row d-flex justify-content-around ">
            <form action="../controller/sign_up_control.php" class="col-md-6" method="POST">
                <h3 class="text-center">ĐĂNG KÝ TÀI KHOẢN</h3>
                <div class="input-group mb-3">
                    <input required type="text" name="user_name" id="" class="form-control boder-none ountline-none" placeholder="Họ và tên">
                </div>
                <div class="input-group mb-3">
                    <input required type="email" name="user_email" id="" class="form-control boder-none ountline-none" placeholder="E-mail">
                </div>
                <div class="input-group mb-3">
                    <input required type="text" name="user_phone" id="" class="form-control boder-none ountline-none" placeholder="Số điện thoại">
                </div>
                <div class="input-group mb-3">
                    <input required type="password" name="user_password" id="" class="form-control boder-none ountline-none" placeholder="Password">
                </div>
                <div class="input-group mb-3">
                    <input required type="password" name="user_confirm_password" id="" class="form-control boder-none ountline-none" placeholder="Confirm Password">    
                </div>

                <button type="submit" class="btn bg-customcolor w-100" data-bs-toggle="modal" data-bs-target="#sign-up">Đăng ký</button>
                <!-- <div class="modal fade" id="sign-up" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Organi thông báo</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn bg-customcolor">Đồng ý</button>
                        </div>
                        </div>
                    </div>
                </div> -->
            </form>
            <div class="col-6 img-slider flex">
                <img src="/img/pc3.jpeg" alt="" class="">
                <img src="/img/pc4.jpeg" alt="" class="">
                <img src="/img/market.jpg" alt="" class="">
            </div>
        </div>
    </div>
</section>