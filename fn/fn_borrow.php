<?php 
    include('config.php');

    $b_id = $_POST['b_id'];
    $m_user = $_POST['m_user'];

    if($b_id != "" && $m_user != ""){
       $sql="INSERT INTO tb_borrow_book 
        VALUES ('$date', '0000-00-00', '$b_id', '$m_user', '0')";
       $conn -> query($sql);
       echo"
            <script>
                window.alert('บันทึกข้อมูลการยืมแล้ว');
                window.location = 'fn_destriy.php'
            </script>
       ";
    }else{
        echo"
        <script>
            window.alert('บันทึกขอมูลบ่ได้');
            window.location = 'fn_destriy.php'
        </script>
   ";
    }
?>