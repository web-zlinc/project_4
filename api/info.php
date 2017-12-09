<?php
/**
 * @Author: sherah
 * @Date:   2017-12-09 11:08:38
 * @Last Modified by:   Marte
 * @Last Modified time: 2017-12-09 17:01:57
 */
    header('Access-Control-Allow-Origin:*');
    include "DBHelper.php";
    
    $username = isset($_POST["username"]) ? $_POST["username"] : '';
    $sql = "select * from user where phone = $username";
    
    $result = query($sql);
    echo json_encode($result, JSON_UNESCAPED_UNICODE);

?>