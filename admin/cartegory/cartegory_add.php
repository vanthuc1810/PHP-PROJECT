<?php
include "admin/slider.php";
?>
<?php
$cartegory = new cartegory;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cartegory_name = $_POST['cartegory_name'];
    $cartegory = $cartegory->insert_cartegory($cartegory_name);
}
?>
<div class="col-8" style="position: relative;">
    <div class="admin-content-right-cartegory flex-column" 
    style="
    position: absolute;
    top: 20%;
    left: 50%;
    transform: translate(-50%, 0%);
    width:100%;">
        <h2>Thêm danh mục</h2>
        <form action="" method="POST" class="d-flex gap-4">
            <input name="cartegory_name" type="text" class="form-control w-75" placeholder="Nhập tên danh mục" aria-label="Username" aria-describedby="basic-addon1">
            <button class="btn btn-success" type="submit">ADD</button>
        </form>
    </div>
</div>
</div>
</section>
</body>

</html>