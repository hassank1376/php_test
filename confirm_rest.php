<?php

require_once './DBOperation.php';
//require_once '../pl_core/algo_kl].php';
//echo json_encode($_POST);
$db = new DBOperation();

$action = $_POST['action'];
$id = $_POST['id'];

if ($action == 'confirm'){

    if ($db->kl_update('rests_list','status = 2',"id = $id")){
        $response['status'] = 'ok';
        $response['message'] = 'confirmed successfully';
    }
    else{
        $response['status'] = 'err';
        $response['message'] = 'confirm failed';
    }

}
else if ($action == 'refuse'){
    if ($db->kl_update('rests_list','status = 3',"id = $id")){
        $response['status'] = 'ok';
        $response['message'] = 'refused successfully';
    }
    else{
        $response['status'] = 'err';
        $response['message'] = 'refuse failed';
    }
}
else{
    $response['status'] = 'err';
    $response['message'] = 'action incorrect';
}

echo json_encode($response);
