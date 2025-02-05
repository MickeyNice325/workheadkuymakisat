<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&display=swap" rel="stylesheet">
        <!--link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <link rel="stylesheet" href="css/bg.css">
        <title>Index</title>
    </head>
    <body>
        <?php
            include("fn/config.php");
        ?>
        <div class="container mt-3">
            <br><br><br><br>
            <h2>ระบบดูการยืมคืนหนังสือ</h2>
            <a href="borrow.php" class="btn btn-outline-dark mb-3">จัดการข้อมูล</a> 
            <table class="table table-dark table-hover text-center">
                <thead>
                    <tr>
                        <th>รหัสหนังสือ</th>
                        <th>ชื่อหนังสือ</th>
                        <th>ผู้ยืม - คืน</th>
                        <th>วันที่ยืม</th>
                        <th>วันที่คืน</th>
                        <th>ค่าปรับ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                      
                        $sql = "SELECT tb_borrow_book.*, tb_book.b_name, tb_member.m_name 
                                FROM tb_borrow_book
                                JOIN tb_book ON tb_borrow_book.b_id = tb_book.b_id
                                JOIN tb_member ON tb_borrow_book.m_user = tb_member.m_user";
                        $query = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_array($query)) {
                    ?>
                        <tr>
                            <td><?=$row['b_id']?></td>
                            <td><?=$row['b_name']?></td>
                            <td><?=$row['m_name']?></td>
                            <td><?=$row['br_date_br']?></td>
                            <td><?=$row['br_date_rt']?></td>
                            <td><?=$row['br_fine']?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" 
        crossorigin="anonymous"></script>
    </body>
</html>