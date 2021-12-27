<?php
class DBOperation{
    private $con;

    function __construct(){
        require_once dirname(__FILE__).'/DBConnect.php';
        $db=new DBConnect();

        $this->con=$db->connect();
    }

    function kl_select($select,$table,$condition){
//        echo "SELECT $select FROM $table WHERE $condition";
        $insert = $this->con->query("SELECT $select FROM $table WHERE $condition");
        if($insert){
            return $insert;
        }else{
            return false;
        }
    }
    function kl_insert($table,$field,$value){
//        echo "INSERT into $table ($field) VALUES ($value)";
        $insert = $this->con->query("INSERT into $table ($field) VALUES ($value)");
        if($insert){
            return $this->con->insert_id;
        }else{
            return false;
        }
    }
    function kl_update($table,$set,$condition){
//        echo "UPDATE $table SET $set  WHERE $condition";
        $insert = $this->con->query("UPDATE $table SET $set  WHERE $condition");
        if($insert){
            return $insert;
        }else{
            return false;
        }
    }
    function kl_delete($table,$condition){
//        echo "DELETE FROM $table WHERE $condition";
        $insert = $this->con->query("DELETE FROM $table WHERE $condition");
        if($insert){
            return true;
        }else{
            return false;
        }
    }
    function kl_ideal($query){
//        echo $query;
        $insert = $this->con->query($query);
        if($insert){
            return $insert;
        }else{
            return false;
        }
    }

    function kl_get_history($user_id){
        $join = $this->con->query("SELECT fp_orders.id,driver_id,start_name,end_name,start_phone,end_phone,start_address,end_address,start_lat,start_lon,end_lat,end_lon,explan,load_type,load_weight,pic_link,date_started,date_finished,date_created,status_pay,duration,distance,price,first_name,last_name,trunkType,trunkCode FROM fp_orders INNER JOIN fp_driver_users ON fp_orders.driver_id = fp_driver_users.id where user_id = $user_id and status_order = 3");
        if ($join){
            return $join;
        }
        else{
            return false;
        }
    }
}
