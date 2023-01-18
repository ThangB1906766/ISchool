<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootsrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">

    <!-- Font AweSome CSS -->
    <link rel="stylesheet" href="./css/all.min.css">


    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/css/style.css">

    <!-- Students Testimonial Owl CSS -->
    <link rel="stylesheet" href="/css/owl.min.css">
    <link rel="stylesheet" href="/css/owl.theme.min.css">
    <link rel="stylesheet" href="/css/testyslider.css">

    <title>iSchool</title>
</head>

<body>
    <!-- Start Navigation -->
    <nav class="navbar navbar-expand-sm navbar-dark pl-5 fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">iSchool</a>
            <span class="navbar-text">Learn anf Implement</span>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav custom-nav pl-5">
                    <li class="nav-item custom-nav-item"><a href="#" class="nav-link">Home</a></li>
                    <li class="nav-item custom-nav-item"><a href="/courses.php" class="nav-link">Course</a></li>
                    <li class="nav-item custom-nav-item"><a href="/paymentstatus.php" class="nav-link">Payment</a></li>

                    <?php
                    /*
                        1. Khởi tạo session của email Login
                        2. Kiểm tra nếu "is_login == true" của (addstudent.php) thì hiển thị giao diện cho Student đã đăng nhập
                        3. Ngược lại hiển thị giao diện chính
                        4. Khi nhấn nút "Logout" sau khi đăng nhập. Gọi file "logout.php" để hủy session và quay lại giao diện chính
                    */
                    session_start();
                    if (isset($_SESSION['is_login'])) {
                        echo '
                            <li class="nav-item custom-nav-item"><a href="/Student/studentProfile.php" class="nav-link">My Profile</a></li>
                            <li class="nav-item custom-nav-item"><a href="/logout.php" class="nav-link">Logout</a></li>
                            ';
                    } else {
                        echo '
                            <li class="nav-item custom-nav-item"><a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#stuLoginModalCenter">Login</a></li>
                            <li class="nav-item custom-nav-item"><a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#stuRegModalCenter">Signup</a></li>     
                            ';
                    }
                    ?>
                    <li class="nav-item custom-nav-item"><a href="#" class="nav-link">Feedback</a></li>
                    <li class="nav-item custom-nav-item"><a href="#" class="nav-link">Contact</a></li>

                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navigation -->