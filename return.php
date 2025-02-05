<?php 
    include("fn/config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&display=swap" rel="stylesheet">
    <!--link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="css/bg.css">
    <title>Borrow</title>
    <style>
        body{
            font-family: "Noto Sans Thai", serif !important;
        }
    </style>
</head>
<body>
    <div class="container mt-3">
        <div class='d-flex justify-content-center mb-3'>
            <a href="borrow.php" class="btn btn-outline-dark ms-2 w-25">ยืมหนังสือ</a>
            <a href="return.php" class="btn btn-outline-dark ms-2 w-25">คืนหนังสือ</a>
        </div>

        <?php 
            $b_id = $_POST['b_id'] ?? '';
            $sql = "SELECT tb_borrow_book.b_id, tb_book.b_name, tb_member.m_name, tb_borrow_book.br_date_br 
                    FROM tb_borrow_book 
                    INNER JOIN tb_book 
                    ON tb_borrow_book.b_id = tb_book.b_id 
                    INNER JOIN tb_member 
                    ON tb_borrow_book.m_user = tb_member.m_user 
                    WHERE tb_borrow_book.b_id = '$b_id' 
                    AND tb_borrow_book.br_date_rt = '0000-00-00'";

            $query = $conn->query($sql);
            $row = mysqli_fetch_array($query);
        ?>
        <center><h2>คืนหนังสือ</h2></center>
        <form action="" method="post">
            <div class='d-flex justify-content-center mb-3'>
                <label for="">รหัสหนังสือที่ต้องการคืน</label>&nbsp;
                <input type="search" name='b_id' id='b_id' class="form-control w-25">
                <button type="submit" class="btn btn-primary ms-2">ค้นหา</button>
            </div>
        </form>
    </div>

    <center>
        <form action="fn/fn_return.php" method="post">
        <table class='table table-bordered mt-3 w-50 border-dark'>
            <tr>
                <th class="w-25">รหัสหนังสือ</th>
                <td class="w-50"><?=$row['b_id'] ?></td>
            </tr>
            <tr>
                <th>ชื่อหนังสือ</th>
                <td class="w-50"><?=$row['b_name'] ?></td>
            </tr>
            <tr>
                <th>ผู้ยืม - คืนหนังสือ</th>
                <td class="w-50"><?=$row['m_name'] ?></td>
            </tr>
            <tr>
                <th>วันที่ยืมหนังสือ</th>
                <td class="w-50"><?=$row['br_date_br'] ?></td>
            </tr>
            <tr>
                <th>ค่าปรับ</th>
                <td><input type="text" class='form-control' placeholder="กรอกค่าปรับหนังสือ"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="hidden" name="b_id" value='<?=$row['b_id'] ?>'>
                    <input type="hidden" name="br_fine" value='<?=$row['br_fine'] ?>'>
                    <div  class="d-flex justify-content-center">
                        <input type="submit" value="คืนหนังสือ" class="btn btn-outline-success w-25 ms-2">
                        <a href="index.php" class="btn btn-outline-danger ms-2 w-25">ยกเลิก</a>
                    </div>
                </td>
            </tr>
        </table>
        </form>
        
    </center>
</body>
</html>
