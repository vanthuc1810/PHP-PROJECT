<?php
include "admin/slider.php";
?>

<?php
$promote = new promote();
$show_promote = $promote -> show_promote();
?>


<div class="col-8 admin-content-right">
                <div class="d-flex admin-content-right flex-column">
                <table class="table">
  <thead class="text-center">
    <tr>
      <th scope="col">#</th>
      <th scope="col" class="text-start">Chương trình khuyến mãi</th>
      <th scope="col">Tùy chọn</th>
    </tr>
  </thead>
  <?php
  if($show_promote)
  {
    $index = 0;
    while($result = $show_promote -> fetch_assoc())
    {
        $index++;
  ?>
  <tbody>
    <tr class="text-center">
        <th scope="row fw-normal">
            <?php echo $index ?>
        </th>
        <td class="text-start fw-normal">
            <?php
                echo $result['promote_name'];
            ?>
        </td>
        <td>
            <a href="?view=promote_delete&promote_id=<?php echo $result['promote_id'] ?>" class="link-danger px-2">Xóa</a>
            <a href="?view=promote_edit&promote_id=<?php echo $result['promote_id'] ?>" class="link-primary px-2">Sửa</a>
        </td>
    </tr>    
  </tbody>
  <?php
      }
    }
  ?>
</table>
    </section>
</body>
</html>