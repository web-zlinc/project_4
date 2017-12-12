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

    $company = isset($_GET['company']) ? $_GET['company'] : '';
    $station = isset($_GET['station']) ? $_GET['station'] : '';
    $salary = isset($_GET['salary']) ? $_GET['salary'] : '';
    $site = isset($_GET['site']) ? $_GET['site'] : '';
    $degree = isset($_GET['degree']) ? $_GET['degree'] : '';
    $duration = isset($_GET['duration']) ? $_GET['duration'] : '';
    $rate = isset($_GET['rate']) ? $_GET['rate'] : '';
    $opty = isset($_GET['opty']) ? $_GET['opty'] : '';
    $lnsize = isset($_GET['lnsize']) ? $_GET['lnsize'] : '';
    $jd = isset($_GET['jd']) ? $_GET['jd'] : '';
    $logo = isset($_GET['logo']) ? $_GET['logo'] : './src/assets/zl (9).jpg';
    $cdetails = isset($_GET['cdetails']) ? $_GET['cdetails'] : '';
    $jtype = isset($_GET['jtype']) ? $_GET['jtype'] : '';
    $recommend = isset($_GET['recommend']) ? $_GET['recommend'] : 'false';

    $sql = "INSERT INTO jobs (company, station, salary, site, degree, duration, rate, opty, lnsize, jd, logo, cdetails, jtype, recommend)
VALUES ('$company', '$station', '$salary', '$site', '$degree', '$duration', '$rate', '$opty', '$lnsize', '$jd', '$logo', '$cdetails', '$jtype', '$recommend')";

    // 调用DBhelper中的query方法
    $result = query($sql);

    mysqli_close($conn);

?>