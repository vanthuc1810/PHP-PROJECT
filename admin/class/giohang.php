<?php 
class giohang {
    private $db;
    public function __construct()
    {
        $this -> db = new Database();
    }
    public function insert_product()
    {
        if(isset($_SESSION['user_id']))
        {
            $user_id = $_SESSION['user_id'];
            $product_id = $_POST['product_id'];
            $count = $_POST['amount'];
            $query = "SELECT * FROM tbl_chitiet_giohang WHERE user_id = '$user_id' AND product_id = '$product_id'";
            $result = $this -> db -> select($query);
            if($result)
            {
                $query = "UPDATE tbl_chitiet_giohang SET count = count + $count WHERE product_id = '$product_id' ";
                $result = $this -> db -> update($query);
            }else {
                $query = "INSERT INTO tbl_chitiet_giohang (user_id, product_id, count) VALUES ('$user_id', '$product_id', '$count')";
                $result = $this -> db -> insert($query);
            }
        }else{
            header('Location:?view=log_in');
        }
        return $result;
    }
    
    public function delete_product($product_id)
    {
        $query = "DELETE FROM tbl_chitiet_giohang WHERE product_id = '$product_id'";
        $result = $this -> db -> delete($query);
        header("Refresh:0");
        return $result;
    }

    public function show_best_discount()
    {
        $query = "SELECT * FROM tbl_product ORDER BY product_discount DESC LIMIT 3";
        $result = $this -> db -> select($query);
        return $result;
    }
    // public function show_product($value){
    //     $query = "SELECT * FROM tbl_product ORDER BY product_name LIMIT $value";
    //     $result = $this -> db -> select($query);
    //     return $result;
    // }   
    public function show_number($user_id)
    {
        $query = "SELECT COUNT(*) AS 'number' FROM tbl_chitiet_giohang WHERE user_id = '$user_id'";
        $result = $this -> db -> select($query);
        return $result;
    }
    public function show_giohang($user_id)
    {
        $query = "SELECT * FROM tbl_chitiet_giohang INNER JOIN tbl_product ON tbl_chitiet_giohang.product_id = tbl_product.product_id WHERE user_id = '$user_id'";
        $result = $this -> db -> select($query);
        return $result;
    }

    

}
?>