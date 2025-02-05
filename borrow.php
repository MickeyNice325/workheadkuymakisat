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
        <center><h2>ยืมหนังสือ</h2></center>
        <form action="" method="POST">
            <div class='d-flex justify-content-center mb-3'>
                <label for="">ผู้ที่ต้องการยืม</label>&nbsp;
                <input type="text" name='m_user' id='m_user' class="form-control w-25 " required>
                <button type='submit' class="btn btn-primary ms-2">ตกลง</button>
            </div>
            <div class='d-flex justify-content-center'>
                <label for="">รหัสหนังสือ</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" name='b_id' id='b_id' class="form-control w-25" required>
                <button type='submit' class="btn btn-primary ms-2">ตกลง</button>
            </div>
        </form>
    </div>

    <center>
        <form action="fn/fn_borrow.php" method="post">
            <table class='table table-bordered mt-3 w-50 border-dark'>
                <tr>
                    <th class="w-25">ชื่อ - สกุลผู้ยืม</th>
                    <td class="w-50"><?php echo $_SESSION['m_user'] ?? ''; ?></td>
                </tr>
                <tr>
                    <th>รหัสหนังสือ</th>
                    <td class="w-50"><?php echo $_SESSION['b_id'] ?? ''; ?></td>
                </tr>
                <tr>
                    <th>ชื่อหนังสือ</th>
                    <td class="w-50"><?php echo $_SESSION['b_name'] ?? ''; ?></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="b_id" value="<?php echo $_SESSION['b_id'] ?? ''; ?>">
                        <input type="hidden" name="m_user" value="<?php echo $_SESSION['m_user'] ?? ''; ?>">
                        <div  class="d-flex justify-content-center">
                            <input type="submit" value="ยืมหนังสือ" class="btn btn-outline-success w-25 ms-2">
                            <a href="index.php" class="btn btn-outline-danger ms-2 w-25">ยกเลิก</a>
                        </div>
                    </td>
                </tr>
            </table>
        </form>
    </center>
</body>
</html>
