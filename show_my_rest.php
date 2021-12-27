<?php
require_once './DBOperation.php';
//require_once '../pl_core/algo_kl].php';
//echo json_encode($_POST);
$db = new DBOperation();

$id = $_POST['id'];

$where = "user_id = '$id'";

$select = $db->kl_select('*', 'rests_list', $where);
$nums = $select->num_rows;
if ($nums > 0) {

    for ($i = 0; $i < $nums; $i++) {
        $new = $select->fetch_assoc();

        $rest_list[$i] = $new;
    }

} else {

    $rest_list = [];

}

echo json_encode($rest_list);
