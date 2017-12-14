<?php
/**
 * @Author: sherah
 * @Date:   2017-12-14 11:21:47
 * @Last Modified by:   Marte
 * @Last Modified time: 2017-12-14 11:36:47
 */
 header('Access-Control-Allow-Origin:*');
    include "DBHelper.php";
    $phone= isset($_POST["phone"]) ? $_POST["phone"] : '';
    if($phone){
        $sql="select * from jobs where jid in (select collect_job from  user as u  where u.phone=$phone)";
        $result = query($sql);
    }
    echo json_encode($result, JSON_UNESCAPED_UNICODE); 
?>