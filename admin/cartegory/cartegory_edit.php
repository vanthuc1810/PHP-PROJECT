<?php
include "../header.php";
include "../slider.php";
include "../class/cartegory_class.php";
?>
<?php 
$cartegory = new cartegory;
    if(!isset($_GET['cartegory_id']) || $_GET['cartegory_id'] == NULL)
    {
        echo "<script>window.location = 'cartegorylist.php'</script>";
    }else {
        $cartegory_id = $_GET['cartegory_id'];
    }
    $get_cartegory = $cartegory -> get_cartegory($cartegory_id);
    if($get_cartegory)
    {
        $result = $get_cartegory -> fetch_assoc();
    }
?>
<?php 
$cartegory = new cartegory;
if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $cartegory_name = $_POST['cartegory_name'];
    $cartegory = $cartegory -> update_cartegory($cartegory_name,$cartegory_id);
}
?>
<div class="col-8 admin-content-right">
                <div class="d-flex admin-content-right-cartegory flex-column">
                    <h2>Sửa danh mục</h2>
                    <form action="" method="POST" class="d-flex gap-4">
                        <input value="<?php echo $result['cartegory_name']?>" name="cartegory_name" type="text" class="form-control w-75" placeholder="Nhập tên danh mục" aria-label="Username" aria-describedby="basic-addon1">
                        <button class="btn btn-primary" type="submit">ADD</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>