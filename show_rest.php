<?php

require_once './DBOperation.php';
//require_once '../pl_core/algo_kl].php';
//echo json_encode($_POST);
$db = new DBOperation();

$select = $db->kl_select('*', 'rests_list', '1');

$nums = $select->num_rows;

if ($nums > 0) {

    for ($i = 0; $i < $nums; $i++) {
        $new = $select->fetch_assoc();
        $user_id = $new['user_id'];
        $select_name = $db->kl_select('*','users',"id = $user_id");
////        $new['name'] = $select_name->fetch_assoc();
        $rests_list[$i] = $new;
        $rests_list[$i]['user'] = $select_name->fetch_assoc();
    }

} else {

    $rests_list = [];

}

echo json_encode($rests_list);