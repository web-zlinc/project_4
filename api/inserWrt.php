<?php
/**
 * @Author: Marte
 * @Date:   2017-12-11 20:38:12
 * @Last Modified by:   Marte
 * @Last Modified time: 2017-12-11 21:12:56
 */
    header('Access-Control-Allow-Origin:*');

    include "DBHelper.php";

    $header = isset($_POST['header']) ? $_POST['header'] : '';
    $details = isset($_POST['details']) ? $_POST['details'] : '';
    $type = isset($_POST['type']) ? $_POST['type'] : '';
    $portrait = isset($_POST['portrait']) ? $_POST['portrait'] : 'src/assets/imgs/portrait.jpg';

    $sql = "insert into forum(header,details,type,portrait) values('$header','$details','$type','$portrait')";

    $result = add($sql);

    echo json_encode($result,JSON_UNESCAPED_UNICODE);
?>