<!-- Start Include header -->
<?php
include_once("./dbconnection.php");
include('./mainInclude/header.php');
?>
<!-- End Include header -->

<!-- Start Video Background -->
<div class="container-fluid remove-margin">
    <div class="video-parent">
        <video playsinline autoplay muted loop>
            <source src="/video/Video_Backgroud1.mp4">
        </video>
        <div class="video-overplay remove-margin">
        </div>
    </div>
    <div class="vid-content">
        <h1 class="my-content">Welcome to iSchool</h1>
        <small class="my-content">Learn and Implement</small> <br /><br />

        <?php 
        /*
            1. Nếu is_login == false của (addstudent.php) tức chưa đăng nhập thì hiển thị giao diện chính
            2. Ngược lại hiển thị giao diện sau khi đăng nhập
        */
            if(!isset($_SESSION['is_login'])){
                echo '
                    <a href="#" class="btn btn-danger m-3" data-bs-toggle="modal" data-bs-target="#stuRegModalCenter">Get Started </a>
                ';
            }else{
                echo '
                    <a href="/Student/studentProfile.php" class="btn btn-primary mt-3">My Profile</a>
                ';
            }
        ?>


    </div>
</div>
<!-- End Video Background -->

<!-- Start Text Banner -->
<div class="container-fuild bg-danger txt-banner">
    <div class="row bottom-banner">
        <div class="col-sm">
            <h5><i class="fa-sharp fa-book mr-3"></i> 100+ Online Course</h5>
        </div>
        <div class="col-sm">
            <h5><i class="fa-sharp fa-user mr-3"></i> Expert Instructors</h5>
        </div>
        <div class="col-sm">
            <h5><i class="fa-sharp fa-key mr-3"></i> Life time Access</h5>
        </div>
        <div class="col-sm">
            <h5><i class="fa-sharp fa-users-rectangle mr-3"></i> Money Back Guarantee</h5>
        </div>
    </div>
</div>
<!-- End Text Banner -->
<!-- Start Popular Course -->
</br>
<div class="row">
    <div class="col">
        <h1 class="text-center">Popular Course</h1>
    </div>
</div>
<!-- Gird bootstrap -->
<div class="container text-center">
    <div class="row row-cols-3">
        <!-- Start Most Popular Course 1st Card Deck -->
        <?php 
            $sql = "SELECT * FROM course LIMIT 3";
            $result = $conn->query($sql);
            if($result->num_rows > 0){ 
              while($row = $result->fetch_assoc()){
                $course_id = $row['course_id'];
                echo '
                <div class="col">
                <div class="card-deck mt-4">
                    <a href="/coursedetail.php?course_id='.$course_id.'" class="btn" style="text-align: left; padding:0px; margin:0px;">
                        <div class="card">
                            <img src="'.str_replace('..', '.',$row['course_img']).'" class="card-img-top" alt="Guitar" />
                            <div class="card-body">
                                <h5 class="card-title">'.$row['course_name'].'</h5>
                                <p class="card-text">'.$row['course_desc'].'</p>
                            </div>
                            <div class="card-footer">
                                <p class="card-text d-inline">
                                    Price: <small><del>&#8377 '.$row['course_original_price'].'</del></small> 
                                    <span class="font-weight-bolder">&#8377 '.$row['course_price'].'<span>
                                </p>
                                <a class="btn btn-primary text-white font-weight-bolder float-right" 
                                href="/coursedetail.php?course_id='.$course_id.'">Enroll</a>
                            </div>
                        </div>
                    </a>
                </div>
                </div>
                ';
                }
            }
        ?>

        
        
        <!-- End Most Popular Course 1st Card Deck -->

        <!-- Start Most Popular Course 2nd Card Deck -->
        <?php 
            $sql = "SELECT * FROM course LIMIT 3, 3";
            $result = $conn->query($sql);
            if($result->num_rows > 0){ 
              while($row = $result->fetch_assoc()){
                $course_id = $row['course_id'];
                echo '
                <div class="col">
                <div class="card-deck mt-4">
                    <a href="/coursedetail.php?course_id='.$course_id.'" class="btn" style="text-align: left; padding:0px; margin:0px;">
                        <div class="card">
                            <img src="'.str_replace('..', '.',$row['course_img']).'" class="card-img-top" alt="Guitar" />
                            <div class="card-body">
                                <h5 class="card-title">'.$row['course_name'].'</h5>
                                <p class="card-text">'.$row['course_desc'].'</p>
                            </div>
                            <div class="card-footer">
                                <p class="card-text d-inline">
                                    Price: <small><del>&#8377 '.$row['course_original_price'].'</del></small> 
                                    <span class="font-weight-bolder">&#8377 '.$row['course_price'].'<span>
                                </p>
                                <a class="btn btn-primary text-white font-weight-bolder float-right" 
                                href="/coursedetail.php?course_id='.$course_id.'">Enroll</a>
                            </div>
                        </div>
                    </a>
                </div>
                </div>
                ';
                }
            }
        ?>
        <!-- End Most Popular Course 2nd Card Deck -->
    </div>
</div>

<div class="text-center m-2">
    <a class="btn btn-danger btn-sm" href="courses.php">View All Course</a>
</div>
<!-- End Popular Course -->

<!-- Start Contact US-->
<?php
include('./contact.php');
?>
<!-- End Contact US-->

<!-- Start Students Testimonial -->
<div class="container-fluid mt-5" style="background-color: #4B7289" id="Feedback">
    <h1 class="text-center testyheading p-4"> Student's Feedback </h1>
    <div class="row">
        <div class="col-md-12">
            <div id="testimonial-slider" class="owl-carousel">
            <?php 
                $sql = "SELECT s.stu_name, s.stu_occ, s.stu_img, f.f_content 
                        FROM student AS s JOIN feedback AS f 
                        ON s.stu_id = f.stu_id ";
                $result = $conn->query($sql);
                if( $result->num_rows > 0 ){
                    while($row = $result->fetch_assoc()){
                        $s_img = $row['stu_img'];
                        $n_img = str_replace('..', '.',$s_img);


            ?>
                <div class="testimonial">
                    <p class="description">
                        <?php 
                            echo $row['f_content'];
                        ?>
                    </p>
                    <div class="pic">
                        <img src="<?php echo $n_img ?>" alt="" />
                    </div>
                    <div class="testimonial-prof">
                        <h4> <?php echo $row['stu_name']?> </h4>
                        <small> <?php echo $row['stu_occ']?> </small>
                    </div>
                </div>
           <?php }
                } 
                ?>
            </div>
        </div>
    </div>
</div>
<!-- End Students Testimonial -->
<!-- Start Social Follow -->
<div class="container-fluid bg-danger">
    <div class="row text-white text-center p-1">
        <div class="col-sm">
            <a class="text-white social-hover" href="#"><i class=""></i> Facebook</a>
        </div>
        <div class="col-sm">
            <a class="text-white social-hover" href="#"><i class=""></i> Twitter</a>
        </div>
        <div class="col-sm">
            <a class="text-white social-hover" href="#"><i class=""></i> WhatsApp</a>
        </div>
        <div class="col-sm">
            <a class="text-white social-hover" href="#"><i class=""></i> Instagram</a>
        </div>
    </div>
</div>
<!-- End Social Follow -->

<!-- Start About Section -->
<div class="container-fluid p-4" style="background-color:#E9ECEF">
    <div class="container" style="background-color:#E9ECEF">
        <div class="row text-center">
            <div class="col-sm">
                <h5>About Us</h5>
                <p>iSchool provides universal access to the worlds best education, partnering with top universities and organizations to offer courses online.</p>
            </div>
            <div class="col-sm">
                <h5>Category</h5>
                <a class="text-dark" href="#">Web Development</a><br />
                <a class="text-dark" href="#">Web Designing</a><br />
                <a class="text-dark" href="#">Android App Dev</a><br />
                <a class="text-dark" href="#">iOS Development</a><br />
                <a class="text-dark" href="#">Data Analysis</a><br />
            </div>
            <div class="col-sm">
                <h5>Contact Us</h5>
                <p>iSchool Pvt Ltd <br> Near Police Camp II <br> Bokaro, Jharkhand <br> Ph. 000000000 </p>
            </div>
        </div>
    </div>
</div> <!-- End About Section -->

<!-- Start Include footer -->
<?php
include('./mainInclude/footer.php');
?>
<!-- End Include header -->