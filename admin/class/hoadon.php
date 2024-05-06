<?php 
class hoadon {
    private $db;
    public function __construct()
    {
        $this -> db = new Database();
    }
    public function insert_hoadon($list_product)
    {
        $user_id = $_SESSION['user_id'];
        $user_id = intval($user_id);
        $query = "INSERT INTO tbl_hoadon (user_id) VALUES ($user_id)";
        $result = $this -> db -> insert($query);
        $query = "SELECT * FROM tbl_hoadon WHERE user_id = '$user_id' ORDER BY hoadon_id DESC";
        $result = $this -> db -> select($query);
        $hoadon = $result -> fetch_assoc();
        $hoadon_id = $hoadon['hoadon_id'];
        $product_id_list = array_keys($list_product);
        $product_count_list = array_values($list_product);
        for($i = 0 ; $i < count($product_id_list) ; $i ++)
        {
            $product_id = $product_id_list[$i];
            $count = $product_count_list[$i];
            $query = "INSERT INTO tbl_chitiet_hoadon (hoadon_id, product_id, count) VALUES ('$hoadon_id','$product_id','$count')";
            $result = $this -> db -> insert($query);
        }
        return $result;
    }

    public function show_hoadon()
    {
        $query = "SELECT * FROM `tbl_hoadon` INNER JOIN tbl_user ON tbl_hoadon.user_id = tbl_user.user_id";
        $result = $this -> db -> select($query);
        return $result;
    }
    public function show_hoadon_byId($hoadon_id)
    {
        $query = "SELECT * FROM `tbl_hoadon` INNER JOIN tbl_chitiet_hoadon ON tbl_hoadon.hoadon_id = tbl_chitiet_hoadon.hoadon_id INNER JOIN tbl_product ON tbl_chitiet_hoadon.product_id = tbl_product.product_id WHERE tbl_chitiet_hoadon.hoadon_id = $hoadon_id";
        $result = $this -> db -> select($query);
        return $result;
    }

    public function delete_hoadon($hoadon_id)
    {
        $query = "DELETE FROM tbl_hoadon WHERE hoadon_id = $hoadon_id";
        $result = $this -> db -> delete($query);
        header('Location:?view=admin_hoadon');
        return $result;
    }
}
?>