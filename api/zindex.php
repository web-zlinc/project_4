<?php
    header('Access-Control-Allow-Origin:*');

    include "DBHelper.php";
    $recommend = isset($_POST["recommend"]) ? $_POST["recommend"] : '';
    $jid = isset($_POST["jid"]) ? $_POST["jid"] : '';
    $jtype = isset($_POST["jtype"]) ? $_POST["jtype"] : '';
    $site = isset($_POST["site"]) ? $_POST["site"] : '';
    $salary = isset($_POST["salary"]) ? $_POST["salary"] : '';
    $degree = isset($_POST["degree"]) ? $_POST["degree"] : '';


    if($recommend){
        $sql = "select * from jobs where recommend = '$recommend'";
    }
    else if($jid){
        $sql = "select * from jobs where jid = '$jid'";
    }
    else if($jtype){
        $sql = "select * from jobs where jtype = '$jtype'";
    }
    else if($site){
        $sql = "select * from jobs where site = '$site'";
    }
    else if($salary){
        $sql = "select * from jobs where salary = '$salary'";
    }
    else if($degree){
        $sql = "select * from jobs where degree = '$degree'";
    }
    else{
        $sql = "select * from jobs";
    }

    $result = query($sql);

    echo json_encode($result, JSON_UNESCAPED_UNICODE);

?>