<?php
/**
 * @Author: Marte
 * @Date:   2017-12-10 15:43:46
 * @Last Modified by:   Marte
 * @Last Modified time: 2017-12-10 15:44:27
 */
    header('Access-Control-Allow-Origin:*');

    include "DBHelper.php";

    $phone = isset($_POST["phone"]) ? $_POST["phone"] : '';

    $sql = "select * from user where phone = $phone";

    $result = query($sql);

    echo json_encode($result,JSON_UNESCAPED_UNICODE);
?>