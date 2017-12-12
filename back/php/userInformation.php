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


    // $sql = "select id as id,name as 姓名,nickname as 昵称,gender as 性别,age as 年龄 ,city as 所在地,brithday as 生日,education as 教育,major as 专业,phone as 电话,idcard as 身份证,abstract as 签名 from user";
    $sql = "select * from user";
    // 调用DBhelper中的query方法
    $result = query($sql);

    echo json_encode($result,JSON_UNESCAPED_UNICODE)
?>