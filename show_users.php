<?php

require_once './DBOperation.php';
//require_once '../pl_core/algo_kl].php';
//echo json_encode($_POST);
$db = new DBOperation();

$select = $db->kl_select('*', 'users', '1');

$nums = $select->num_rows;

if ($nums > 0) {

    for ($i = 0; $i < $nums; $i++) {
        $new = $select->fetch_assoc();
        $users_list[$i] = $new;
    }

} else {

    $users_list = [];

}

echo json_encode($users_list);