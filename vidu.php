<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $conn = new mysqli("localhost","root","","testphp");
    ?>
    <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $cccd = $_POST['cccd'];
        $cccd = intval($cccd);
        $name = $_POST['name'];
        $sql = "INSERT INTO tbl_cccd (cccd,fullname) VALUES($cccd,'$name')";
        try {
            $result = $conn -> query($sql);
        } catch (Exception $e) {
            echo '<script>alert("Có lỗi trong quá trình insert database.")</script>';
        }
    }
    ?>
    <form action="" method="POST">
        <label for="cccd">cccd</label>
        <input type="text" name="cccd" id="cccd">
        <label for="name">Ho va ten</label>
        <input type="text" name="name" id="name">
        <button type="submit">ADD</button>
    </form>
    <?php 
    $sql = "SELECT * FROM tbl_cccd";
    $result = $conn -> query($sql);
    if($result)
    {
        while($row = $result -> fetch_assoc())
        {
    ?>
    <div class="box" style="margin: 15px 40px;">
        <div class="cccd">
            CCCD: <?php echo $row['cccd']; ?>
        </div>
        <div class="name">
            Ten nguoi: <?php echo $row['fullname']; ?>
        </div>
    </div>
    <?php
        }
    }
    ?>
</body>
</html>