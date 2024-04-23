<?php 
$promote = new promote;
    if(!isset($_GET['promote_id']) || $_GET['promote_id'] == NULL)
    {
        echo "<script>window.location = 'promote_list.php'</script>";
    }else {
        $promote_id = $_GET['promote_id'];
    }
    $promote = $promote -> delete_promote($promote_id);
?>
