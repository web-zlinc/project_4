<?php
/**
 * @Author: Marte
 * @Date:   2017-12-11 20:38:12
 * @Last Modified by:   Marte
 * @Last Modified time: 2017-12-12 15:22:24
 */
    header('Access-Control-Allow-Origin:*');

    include "DBHelper.php";

    $header = isset($_POST['header']) ? $_POST['header'] : '';
    $details = isset($_POST['details']) ? $_POST['details'] : '';
    $type = isset($_POST['type']) ? $_POST['type'] : '';
    $portrait = isset($_POST['portrait']) ? $_POST['portrait'] : 'src/assets/imgs/portrait.jpg';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $nickname = isset($_POST['nickname']) ? $_POST['nickname'] : '';
    $likes = isset($_POST['likes']) ? $_POST['likes'] : 0;


    $sql = "insert into forum(header,details,type,portrait,phone,nickname,likes) values('$header','$details','$type','$portrait','$phone','$nickname','$likes')";

    $result = add($sql);

    echo json_encode($result,JSON_UNESCAPED_UNICODE);
?>