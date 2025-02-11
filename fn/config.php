<?php

    
    $host = 'localhost';
    $config_user = 'root';
    $config_pass = '';
    $config_db = 'db_library';
    $config_font = 'utf8';
    

    $conn = mysqli_connect($host,$config_user,$config_pass,$config_db);
    mysqli_select_db($conn, $config_db);
    mysqli_set_charset($conn,$config_font);


    date_default_timezone_set('Asia/Bangkok');
    $date = date('Y-m-d');
    $time = date('H:i:s');
    
    //No Connect
    // if(!$conn){
    //     echo 'เชื่อมไม่ได้ไอ่โง 55555';
    // }else{
    //     echo '🗿 เชื่อมต่อแล้ว 🗿';
    // }
?>