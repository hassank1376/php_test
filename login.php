<?php
require_once './DBOperation.php';
//require_once '../pl_core/algo_kl].php';
//echo json_encode($_POST);
$db = new DBOperation();

$action = $_POST['action'];
$username = $_POST['username'];
$password = $_POST['password'];

//$where = 'username =' .$_POST[''];

if ($action == 'login'){
    $where = " username='$username' and password='$password' ";
    $select = $db->kl_select('*', 'users', $where);

    if ($select -> num_rows > 0 ){
        $response['status'] = 'ok';
        $result = $select->fetch_assoc();
        $response['id'] = $result['id'];
        $response['name'] = $result['fullname'];
        $response['phone'] = $result['phone'];
        $response['message'] = 'user exist';
    }
    else{
        $response['status'] = 'err';
        $response['message'] = 'user not found';
    }
}
else if($action == 'register'){
    $phone = $_POST['phone'];
    $fullname = $_POST['fullname'];
    $value = "'$fullname','$username','$password','$phone'";
    if ($db->kl_insert('users','`fullname`, `username`, `password`, `phone`',$value)){
        $response['status'] = 'ok';
        $where = " username='$username' and password='$password' ";
        $select = $db->kl_select('*' , 'users', $where);
        $result = $select->fetch_assoc();
        $response['id'] = $result['id'];
        $response['name'] = $result['fullname'];
        $response['phone'] = $result['phone'];
        $response['message'] = 'user registered';
    }
    else{
        $response['status'] = 'err';
        $response['message'] = 'register failed';
    }

}
else{
    $response['status'] = 'err';
    $response['message'] = 'action incorrect';
}



echo json_encode($response);