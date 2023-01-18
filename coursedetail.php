<!-- Start including header -->
<?php
include('./mainInclude/header.php');
?>
<!-- Start Course Page Banner -->
<div class="container-fluid bg-dark">
    <div class="row">
        <img src="./image/coursebanner.jpg" alt="courses" style="height:500px; width:100%; object-fit:cover; box-shadow:10px;" />
    </div>
</div> <!-- End Course Page Banner -->

<!-- Start main content -->
<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
            <img src="/image/Guitar.jpg" class="card-img-top" alt="image">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">Course Name: Learn guitar</h5>
                <p class="card-text">Description: Learn ipsum dolor sit .......... </p>
                <p class="card-text">Duration: 10 Day</p>
                <form action="" method="post">
                    <p class="card-text d-inline">Price:
                        <small>
                            <del>
                                &#8377 200
                            </del>
                        </small>
                        <span class="font-weight-bolder">&#8377 200</span>
                    </p>
                    <!-- <input type="hidden" name="course_id" value=""> -->
                    <button type="submit" style="margin-top: 100px;" class="btn btn-primary text-white font-weight-bolder float-right" name="buy">Buy now</button>
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <table class="table table-bordered table-hover" style="margin-top: 30px;">
                <thead>
                    <tr>
                        <th scope="col">Lesson No.</th>
                        <th scope="col">Lesson Name</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Intruoduction</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- End main content -->

<!-- End including header -->
<?php
include('./mainInclude/footer.php');
?>
<!-- End including footer -->