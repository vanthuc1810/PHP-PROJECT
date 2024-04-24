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
}
?>