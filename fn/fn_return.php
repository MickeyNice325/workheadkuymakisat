<?php 
    include("config.php");

    $b_id  = $_POST['b_id'];
    $br_fine  = $_POST['br_fine'];

    if($b_id !='' && $br_fine != ''){
        $sql = "UPDATE tb_borrow_book SET 
                br_date_rt='$date' , br_fine ='$br_fine' WHERE b_id = '$b_id' AND br_date_rt = '0000-00-00' ";
        $conn -> query($sql);
        echo"
            <script>
                window.alert('บันทึกข้อมูลการยืมแล้ว');
                window.location = 'fn_destroy.php'
            </script>
       ";
    }else{
        echo"
        <script>
            window.alert('กรุณากรอกค่าปรับ');
            history.back()
        </script>
   ";
    }
?>