<?php
include "admin/slider.php";
?>
<?php
    $promote = new promote();
    if($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        $promote = $promote -> insert_promote($_POST);
    }
?>

<div class="col-8 admin-content-right py-4">
                <h4>Thêm chương trình khuyến mãi</h4>
                <div class="admin-content-right-cartegory flex-column w-100 d-flex align-items-center ">
                    <form method="POST" enctype="multipart/form-data" class="d-flex gap-4 flex-column w-75">
                        <div class="row">
                            <div class="col col-12">
                                <label class="fw-normal">Chương trình khuyến mãi</label>
                                <input name="promote_name" type="text" class="form-control" placeholder="Nhập tên chương trình khuyến mãi">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label class="fw-normal" for="promote_start">Ngày bắt đầu</label>
                                <input name="promote_start" id="promote_start"  type="date" class="form-control">
                            </div>
                            <div class="col-6">
                                 <label class="fw-normal" for="promote_end">Ngày kết thúc</label>
                                <input name="promote_end" id="promote_end" type="date" class="form-control">
                            </div>
                        </div>
                        <button class="btn btn-success" type="submit">ADD</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>