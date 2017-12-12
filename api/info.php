<?php
/**
 * @Author: sherah
 * @Date:   2017-12-09 11:08:38
 * @Last Modified by:   Marte
 * @Last Modified time: 2017-12-11 19:56:28
 */
    header('Access-Control-Allow-Origin:*');
    include "DBHelper.php";
    $username = isset($_POST["username"]) ? $_POST["username"] : '';
    // $adduser= isset($_POST["adduser"]) ? $_POST["adduser"] : '';
    $phone= isset($_POST["phone"]) ? $_POST["phone"] : '';
    $updata_info=isset($_POST["updata_info"]) ? $_POST["updata_info"] : '';
    if($username){    
        $sql = "select * from user where phone = $username";
        $result = query($sql);
       
    }
    // 修改
    else if($phone){
        $data=json_decode($updata_info,JSON_UNESCAPED_UNICODE);    
        $updata="update user set portrait='$data[0]',name='$data[1]',nickname='$data[2]',abstract='$data[3]',gender='$data[4]',age='$data[5]',city='$data[6]',brithday='$data[7]',education='$data[8]',major='$data[9]',phone='$data[10]',email='$data[11]',idcard='$data[12]' where phone = '$phone'";
        $result=excute($updata); 
    }
    // // 插入新记录
    // else if($adduser){
    //     $insert= "insert into user(name,nickname,abstract,gender,age,city,brithday,education,major,phone,email,idcard) values($adduser)";
    //     $result=excute($insert);
    // } 
    echo json_encode($result, JSON_UNESCAPED_UNICODE); 

?>