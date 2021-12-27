<?php
require_once './DBOperation.php';
//require_once '../pl_core/algo_kl].php';
//echo json_encode($_POST);
$db = new DBOperation();

$description = $_POST['description'];
$request_time = $_POST['request_time'];
$rest_time = $_POST['rest_time'];
$user_id = $_POST['user_id'];

$value = "'$request_time','$rest_time','$description','$user_id','1'";
if ($db->kl_insert('rests_list','`request_time`, `rest_time`, `description`, `user_id`, `status`',$value)){
    $response['status'] = 'ok';
    $response['message'] = 'request submitted';
}
else{
    $response['status'] = 'err';
    $response['message'] = 'request failed';
}

echo json_encode($response);