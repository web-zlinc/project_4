<?php
    header('Access-Control-Allow-Methods:OPTIONS, GET, POST');
    header('Access-Control-Allow-Headers:x-requested-with');
    header('Access-Control-Max-Age:86400');  
    header('Access-Control-Allow-Origin:*');
    header('Access-Control-Allow-Credentials:true');
    header('Access-Control-Allow-Methods:GET, POST, PUT, DELETE, OPTIONS');
    header('Access-Control-Allow-Headers:x-requested-with,content-type');
    header('Access-Control-Allow-Headers:Origin, No-Cache, X-Requested-With, If-Modified-Since, Pragma, Last-Modified, Cache-Control, Expires, Content-Type, X-E4M-With');


    include "DBHelper.php";

    // 获取搜索框中传入的值
    $key = isset($_POST['key']) ? $_POST['key'] : '';
    $val = isset($_POST['val']) ? $_POST['val'] : '';

    $sql = "select * from jobs where  $key like '%$val%'";

    // 调用DBhelper中的query方法
    $result = query($sql);
    
    echo json_encode($result,JSON_UNESCAPED_UNICODE)
?>