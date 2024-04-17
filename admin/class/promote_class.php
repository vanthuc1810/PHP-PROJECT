<?php 
class promote {
    private $db;
    public function __construct()
    {
        $this -> db = new Database();
    }
    public function insert_promote()
    {
        $promote_name = $_POST['promote_name'];
        $promote_start = $_POST['promote_start'];
        $promote_end = $_POST['promote_end'];
        $query = "INSERT INTO tbl_promote (
            promote_name,
            promote_start,
            promote_end
        ) 
        VALUES ('$promote_name','$promote_start','$promote_end')";
        $result = $this -> db -> insert($query);
        return $result;
    }

    public function product_add_promote($product_id_list,$promote)
    {
        $query = "UPDATE tbl_product SET promote_id = '$promote' WHERE product_id IN($product_id_list)";
        $result = $this -> db -> update($query);
        header('Location:?view=admin_promote_addToProduct');
        return $result;
    }



    public function show_promote(){
        $query = "SELECT * FROM tbl_promote ORDER BY promote_id DESC";
        $result = $this -> db -> select($query);
        return $result;
    }
    public function show_cartegory() {
        $query = "SELECT * FROM tbl_cartegory ORDER BY cartegory_id DESC";
        $result = $this -> db -> select($query);
        return $result;
    }
    public function get_product($product_id)
    {
        $query = "SELECT * FROM tbl_product WHERE product_id = '$product_id'";
        $result = $this -> db -> select($query);
        return $result;
    }
    public function update_product($product_id)
    {   
        $product = new product();
        $result = $product -> get_product($product_id);    
        $result = $result -> fetch_assoc();
        $product_name = !empty($_POST['product_name']) ? $_POST['product_name'] : $result['product_name'];
        $product_decs = !empty($_POST['product_decs']) ? $_POST['product_decs'] : $result['product_decs'];
        $product_discount = !empty($_POST['product_discount']) ? $_POST['product_discount'] : $result['product_discount'];
        $product_quantity = !empty($_POST['product_quantity']) ? $_POST['product_quantity'] : $result['product_quantity'];
        move_uploaded_file($_FILES['product_img']['tmp_name'],'../uploads/'.$_FILES['product_img']['name']);
        $product_img = !empty($_FILES['product_img']['name']) ? $_FILES['product_img']['name'] : $result['product_img'];
        $product_price = !empty($_POST['product_price']) ? $_POST['product_price'] : $result['product_price'];
        $cartegory_id = !empty($_POST['cartegory_id']) ? $_POST['cartegory_id'] : $result['cartegory_id'];
        $query = "UPDATE tbl_product SET cartegory_id = '$cartegory_id', product_name = '$product_name', product_price = '$product_price', product_discount = '$product_discount', product_quantity = '$product_quantity', product_img = '$product_img', product_decs = '$product_decs'
        WHERE product_id = '$product_id'";
        $result = $this -> db -> update($query);
        header('Location:product_list.php');
        return $result;
    }
    public function delete_product($product_id)
    {
        $query = "DELETE FROM tbl_product WHERE product_id = '$product_id'";
        $result = $this -> db ->delete($query);
        header('Location:product_list.php');
        return $result;
    }
}
?>