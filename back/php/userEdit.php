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
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $nickname = isset($_POST['nickname']) ? $_POST['nickname'] : '';
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $age = isset($_POST['age']) ? $_POST['age'] : '';
    $city = isset($_POST['city']) ? $_POST['city'] : '';
    $brithday = isset($_POST['brithday']) ? $_POST['brithday'] : '';
    $education = isset($_POST['education']) ? $_POST['education'] : '';
    $major = isset($_POST['major']) ? $_POST['major'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $idcard = isset($_POST['idcard']) ? $_POST['idcard'] : '';
    $abstract = isset($_POST['abstract']) ? $_POST['abstract'] : '';
    $id = isset($_POST['id']) ? $_POST['id'] : '';

   
    $sql="update user set name='$name',nickname='$nickname',gender='$gender',age='$age',city='$city',brithday='$brithday',education='$education',major='$major',phone='$phone',idcard='$idcard',abstract='$abstract' where id='$id'";
    // 调用DBhelper中的excute方法
    $result = excute($sql);
    
    if($result){
        echo '修改成功';
    }else{
        echo 'no';  
    }
?>