<?php 
class user {
    private $db;
    public function __construct()
    {
        $this -> db = new Database();
    }
    public function insert_user()
    {
        $user_name = $_POST['user_name'];
        $user_email = $_POST['user_email'];
        $user_phone = $_POST['user_phone'];
        $user_password = $_POST['user_password'];
        $query = "INSERT INTO tbl_user (
            user_name,
            user_email,
            user_phone,
            user_password
            ) VALUES (
            '$user_name',
            '$user_email',
            '$user_phone',
            '$user_password')";
        $result = $this -> db -> insert($query);
        return $result;
    }
    public function show_user() {
        $query = "SELECT * FROM tbl_user";
        $result = $this -> db -> select($query);
        return $result;
    }
    public function show_userById($user_id) {
        $query = "SELECT * FROM tbl_user WHERE user_id = '$user_id'";
        $result = $this -> db -> select($query);
        return $result;
    }
    public function get_cartegory($cartegory_id)
    {
        $query = "SELECT * FROM tbl_cartegory WHERE cartegory_id = '$cartegory_id'";
        $result = $this -> db -> select($query);
        return $result;
    }
    public function update_cartegory($cartegory_name,$cartegory_id)
    {
        $query = "UPDATE tbl_cartegory SET cartegory_name = '$cartegory_name' WHERE cartegory_id = '$cartegory_id' ";
        $result = $this -> db -> update($query);
        header('Location:cartegory_list.php');
        return $result;
    }
    public function delete_cartegory($cartegory_id)
    {
        $query = "DELETE FROM tbl_cartegory WHERE cartegory_id = '$cartegory_id'";
        $result = $this -> db ->delete($query);
        header('Location:cartegory_list.php');
        return $result;
    }
}
?>