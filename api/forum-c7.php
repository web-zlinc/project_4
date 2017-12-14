<?php
/**
 * @Author: Marte
 * @Date:   2017-12-10 20:28:53
 * @Last Modified by:   Marte
 * @Last Modified time: 2017-12-12 12:08:39
 */
    header('Access-Control-Allow-Origin:*');
    
    include "DBHelper.php";

    $type = isset($_POST['type']) ? $_POST['type'] : null;
    $phone = isset($_POST['phone']) ? $_POST['phone'] : null;

    $sql = "select * from forum where ";
    
    if($type){
        $sql .= "type='$type' and";
    }

    if($phone){
        $sql .= "phone='$phone' and";
    }

    $sql .= " 1=1";

    $result = query($sql);

    echo json_encode($result,JSON_UNESCAPED_UNICODE);
?>