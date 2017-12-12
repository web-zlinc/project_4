<?php
/**
 * @Author: Marte
 * @Date:   2017-12-10 20:28:53
 * @Last Modified by:   Marte
 * @Last Modified time: 2017-12-11 16:25:56
 */
    header('Access-Control-Allow-Origin:*');
    
    include "DBHelper.php";

    $type = isset($_POST['type']) ? $_POST['type'] : null;
    $uid = isset($_POST['uid']) ? $_POST['uid'] : null;

    $sql = "select * from forum where ";
    
    if($type){
        $sql .= "type='$type' and";
    }

    if($uid){
        $sql .= "uid='$uid' and";
    }

    $sql .= " 1=1";

    $result = query($sql);

    echo json_encode($result,JSON_UNESCAPED_UNICODE);
?>