<?php
/**
 * @Author: Marte
 * @Date:   2017-12-10 11:57:36
 * @Last Modified by:   Marte
 * @Last Modified time: 2017-12-10 12:00:17
 */
    header('Access-Control-Allow-Origin:*');

    include "DBHelper.php";

    $phone = isset($_POST["phone"]) ? $_POST["phone"] : '';

    $password = isset($_POST["password"]) ? $_POST["password"] : '';

    $sql = "insert into user(phone,password) values('$phone','$password')";

    $result = add($sql);

    echo json_encode($result,JSON_UNESCAPED_UNICODE);
    


?>