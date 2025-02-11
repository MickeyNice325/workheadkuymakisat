<?php
include 'fn/config.php';


$sql_books = "SELECT COUNT(*) AS total_books FROM tb_book";
$result_books = $conn->query($sql_books);
$total_books = $result_books->fetch_assoc()['total_books'];


$sql_members = "SELECT COUNT(*) AS total_members FROM tb_member";
$result_members = $conn->query($sql_members);
$total_members = $result_members->fetch_assoc()['total_members'];


$sql_borrow = "SELECT COUNT(*) AS total_borrow FROM tb_borrow_book";
$result_borrow = $conn->query($sql_borrow);
$total_borrow = $result_borrow->fetch_assoc()['total_borrow'];


$sql_overdue = "SELECT COUNT(*) AS total_overdue FROM tb_borrow_book WHERE br_date_rt = '0000-00-00'";
$result_overdue = $conn->query($sql_overdue);
$total_overdue = $result_overdue->fetch_assoc()['total_overdue'];

$conn->close();
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
    <title>Dashboard</title>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <span class="navbar-brand mb-0 h1">ข้อมูลสถิติของห้องสมุด</span>
            
        </div>
        <a href="fn/fn_destroy.php" class="btn btn-outline-danger mx-5">กลับ</a>
    </nav>

    <div class="container my-4">
        <div class="row g-3">
            <div class="col-md-6">
                <div class="d-flex flex-column align-items-center justify-content-center p-4 text-white fw-bold bg-success" style="border-radius: 10px; height: 350px;">
                    <h5>หนังสือทั้งหมด (เล่ม)</h5>
                    <h1><?= $total_books ?></h1>
                </div>
            </div>

            <div class="col-md-6">
                <div class="d-flex flex-column align-items-center justify-content-center p-4 text-white fw-bold bg-primary" style="border-radius: 10px; height: 350px;">
                    <h5>การใช้บริการยืม-คืนหนังสือ (ครั้ง)</h5>
                    <h1><?= $total_borrow ?></h1>
                </div>
            </div>

            <div class="col-md-6">
                <div class="d-flex flex-column align-items-center justify-content-center p-4 text-white fw-bold bg-warning" style="border-radius: 10px; height: 350px;">
                    <h5>สมาชิกทั้งหมด (คน)</h5>
                    <h1><?= $total_members ?></h1>
                </div>
            </div>

            <div class="col-md-6">
                <div class="d-flex flex-column align-items-center justify-content-center p-4 text-white fw-bold bg-danger" style="border-radius: 10px; height: 350px;">
                    <h5>หนังสือค้างส่ง (เล่ม)</h5>
                    <h1><?= $total_overdue ?></h1>
                </div>
            </div>
        </div>
    </div>

</body>
</html>