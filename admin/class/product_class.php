<?php 
class product {
    private $db;
    public function __construct()
    {
        $this -> db = new Database();
    }
    public function insert_product()
    {
        $product_name = $_POST['product_name'];
        $product_decs = $_POST['product_decs'];
        $product_discount = $_POST['product_discount'];
        $product_quantity = $_POST['product_quantity'];
        move_uploaded_file($_FILES['product_img']['tmp_name'],'admin/uploads/'.$_FILES['product_img']['name']);
        $product_img = $_FILES['product_img']['name'];
        $product_price = $_POST['product_price'];
        $cartegory_id = $_POST['cartegory_id'];
        $query = "INSERT INTO tbl_product (
            product_name,
            product_discount,
            product_quantity,
            product_img,
            product_price,
            cartegory_id,
            product_decs
        ) 
        VALUES ('$product_name','$product_discount','$product_quantity','$product_img','$product_price','$cartegory_id', '$product_decs')";
        $result = $this -> db -> insert($query);
        header('Location:?view=admin_product_add');
        return $result;
    }
   
    public function show_best_discount()
    {
        $query = "SELECT * FROM tbl_product ORDER BY product_discount DESC LIMIT 3";
        $result = $this -> db -> select($query);
        return $result;
    }
    public function show_product($value){
        $query = "SELECT * FROM tbl_product ORDER BY product_name LIMIT $value";
        $result = $this -> db -> select($query);
        return $result;
    }
    public function show_productById($cartegory_id, $value)
    {
        $query = "SELECT * FROM tbl_product WHERE cartegory_id = '$cartegory_id' ORDER BY product_name LIMIT $value";
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
        header('Location:?view=admin_product_list');
        return $result;
    }
    public function delete_product($product_id)
    {
        $query = "DELETE FROM tbl_product WHERE product_id = '$product_id'";
        $result = $this -> db ->delete($query);
        header('Location:?view=admin_product_list');
        return $result;
    }
    public function get_cartegory($cartegory_id)
    {
        $query = "SELECT * FROM tbl_cartegory WHERE cartegory_id = '$cartegory_id'";
        $result = $this -> db -> select($query);
        return $result;
    }
}
?>