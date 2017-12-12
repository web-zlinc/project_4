<?php
    header('Access-Control-Allow-Origin:*');

    include "DBHelper.php";
    

    $sql = "select * from student";

    $result = query($sql);

    echo json_encode($result, JSON_UNESCAPED_UNICODE);

?>