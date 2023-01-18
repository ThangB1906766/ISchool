<!-- Start including header -->
<?php
include_once("./dbconnection.php");
include('./mainInclude/header.php');
?>
<!-- Start Course Page Banner -->
<div class="container-fluid bg-dark">
    <div class="row">
        <img src="./image/coursebanner.jpg" alt="courses" style="height:500px; width:100%; object-fit:cover; box-shadow:10px;" />
    </div>
</div> <!-- End Course Page Banner -->

<!-- Start All Course -->
</br>
<div class="row">
    <div class="col">
        <h1 class="text-center">All Course</h1>
    </div>
</div>
<div class="container text-center">
    <div class="row row-cols-3">
        <!-- Start Most All Course Card Deck -->
        <?php
            $sql = "SELECT * FROM course";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
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
        <!-- Start Most All Course Card Deck -->
    </div>
</div>

<!-- Start including footer -->
<!-- End including header -->
<?php
include('./mainInclude/footer.php');
?>
<!-- End including footer -->