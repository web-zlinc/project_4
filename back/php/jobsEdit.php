<?php
        header('Access-Control-Allow-Methods:OPTIONS, GET, POST');
        header('Access-Control-Allow-Headers:x-requested-with');
        header('Access-Control-Max-Age:86400');  
        header('Access-Control-Allow-Origin:*');
        header('Access-Control-Allow-Credentials:true');
        header('Access-Control-Allow-Methods:GET, POST, PUT, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers:x-requested-with,content-type');
        header('Access-Control-Allow-Headers:Origin, No-Cache, X-Requested-With, If-Modified-Since, Pragma, Last-Modified, Cache-Control, Expires, Content-Type, X-E4M-With');
        
        $company = isset($_POST['company']) ? $_POST['company'] : '';
        $station = isset($_POST['station']) ? $_POST['station'] : '';
        $salary = isset($_POST['salary']) ? $_POST['salary'] : '';
        $site = isset($_POST['site']) ? $_POST['site'] : '';
        $degree = isset($_POST['degree']) ? $_POST['degree'] : '';
        $duration = isset($_POST['duration']) ? $_POST['duration'] : '';
        $rate = isset($_POST['rate']) ? $_POST['rate'] : '';
        $opty = isset($_POST['opty']) ? $_POST['opty'] : '';
        $lnsize = isset($_POST['lnsize']) ? $_POST['lnsize'] : '';
        $jd = isset($_POST['jd']) ? $_POST['jd'] : '';
        $jid = isset($_POST['jid']) ? $_POST['jid'] : '';
        $logo = isset($_POST['logo']) ? $_POST['logo'] : './src/assets/zl (9).jpg';
        $cdetails = isset($_POST['cdetails']) ? $_POST['cdetails'] : '';
        $recommend = isset($_POST['recommend']) ? $_POST['recommend'] : 'false';

        include "DBHelper.php";

        // $sql = INSERT INTO jobs (id, name, email) VALUES
        //         (1, 'nick', 'nick@126.com'),
        //         ON DUPLICATE KEY UPDATE name=VALUES(name), email=VALUES(email);
        
        $sql = "UPDATE jobs SET company='$company', 
                                station='$station', 
                                salary='$salary', 
                                site='$site', 
                                degree='$degree', 
                                duration='$duration', 
                                rate='$rate', 
                                opty='$opty', 
                                lnsize='$lnsize', 
                                jd='$jd', 
                                logo='$logo', 
                                cdetails='$cdetails', 
                                jtype='$jtype', 
                                recommend='$recommend'
                                WHERE jid='$jid'";


        // 调用DBhelper中的query方法
        $result = query($sql);

        echo json_encode($result,JSON_UNESCAPED_UNICODE)
?>