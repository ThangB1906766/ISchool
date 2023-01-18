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


<h1>Payment Statuc</h1>
<!-- Start main content -->

<div class="container">
    <h2 class="text-center my-4">Payment Status</h2>
    <form method="post" action="">
        <div class="form-group col" style="display: flex;">
            <label class=" offset-sm-3 col-form-label">Order ID: </label>
            <div>
                <input type="text" class="form-control mx-4">
            </div>
            <div>
                <input type="submit" value="View" class="btn btn-primary mx-5">
            </div>
        </div>
    </form>
</div>

<!-- End main content -->

<!-- Start contact us -->
<?php
include('./contact.php');
?>
<!-- End contact us -->


<!-- End including header -->
<?php
include('./mainInclude/footer.php');
?>
<!-- End including footer -->