<?php
    header('Access-Control-Allow-Origin:*');

    include "DBHelper.php";
    $recommend = isset($_POST["recommend"]) ? $_POST["recommend"] : '';
    $jid = isset($_POST["jid"]) ? $_POST["jid"] : '';
    $jtype = isset($_POST["jtype"]) ? $_POST["jtype"] : '';

    // var_dump($jtype);
    if($recommend){
        $sql = "select * from jobs where recommend = '$recommend'";
    }else if($jid){
        $sql = "select * from jobs where jid = '$jid'";
    }else if($jtype){
        $sql = "select * from jobs where jtype = '$jtype'";
    }else{
        $sql = "select * from jobs";
    }

    $result = query($sql);

    echo json_encode($result, JSON_UNESCAPED_UNICODE);

?>