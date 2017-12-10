<?php
/**
 * @Author: Marte
 * @Date:   2017-12-09 11:08:38
 * @Last Modified by:   Marte
 * @Last Modified time: 2017-12-09 11:18:50
 */
    header('Access-Control-Allow-Origin:*');

    include "DBHelper.php";

    $username = isset($_POST["username"]) ? $_POST["username"] : '';

    $password = isset($_POST["password"]) ? $_POST["password"] : '';

    $sql = "select * from user where username = $username and  password = $password";

    $result = query($sql);

    echo json_encode($result,JSON_UNESCAPED_UNICODE);
    
?>