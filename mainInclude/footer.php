<!-- Start Footer -->
<footer class="container-fluid bg-dark text-center p-2">
    <small class="text-white">Copyright &copy; 2019 || Designed By E-Learning ||
        <a href="#login" data-bs-toggle="modal" data-bs-target="#adminLoginModalCenter"> Admin login</a>
    </small>

</footer> <!-- End Footer -->

<!-- Start student registration modal -->
<!-- Modal -->
<div class="modal fade" id="stuRegModalCenter" tabindex="-1" aria-labelledby="stuRegModalCenterLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="stuRegModalCenterLabel">Student registration</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Start student registration modal form -->
                <?php include('./studentRegistration.php'); ?>
                <!-- End student registration modal form -->
            </div>
            <div class="modal-footer">
                <span id="successMsg"></span>
                <button type="button" class="btn btn-primary" onclick="addStu()" id="signup">Sign up</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- End student registration modal -->

<!-- Start student login modal -->
<!-- Modal -->
<div class="modal fade" id="stuLoginModalCenter" tabindex="-1" aria-labelledby="stuLoginModalCenterLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="stuLoginModalCenterLabel">Student login</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Start student login modal form -->
                <form role="form" id="stuLoginForm">
                    <div class="form-group">
                        <i class="fas fa-envelope"></i><label for="stuLogemail" class="pl-2 font-weight-bold">Email</label><small id="statusMsg2"></small><input type="email" class="form-control" placeholder="Email" name="stuLogemail" id="stuLogemail">

                    </div>
                    <div class="form-group">
                        <i class="fas fa-key"></i><label for="stuLogpass" class="pl-2 font-weight-bold">
                            Password</label><small id="statusMsg3"></small><input type="password" class="form-control" placeholder="Password" name="stuLogpass" id="stuLogpass">
                    </div>
                </form>
                <!-- Start student login modal form -->
            </div>
            <div class="modal-footer">
                <small id="statusLogMsg"></small>
                <button type="button" class="btn btn-primary" id="ctuLoginBtn" onclick="checkStuLogin()">Login</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!-- End student login modal -->

<!-- Start admin login modal -->
<!-- Modal -->
<div class="modal fade" id="adminLoginModalCenter" tabindex="-1" aria-labelledby="adminLoginModalCenterLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="adminLoginModalCenterLabel">Admin login</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Start admin login modal form -->
                <form role="form" id="adminLoginForm">
                    <div class="form-group">
                        <i class="fas fa-envelope"></i><label for="adminLogemail" class="pl-2 font-weight-bold">Email</label><small id="statusMsg2"></small><input type="email" class="form-control" placeholder="Email" name="adminLogemail" id="adminLogemail">

                    </div>
                    <div class="form-group">
                        <i class="fas fa-key"></i><label for="adminLogpass" class="pl-2 font-weight-bold">
                            Password</label><small id="statusMsg3"></small><input type="password" class="form-control" placeholder="Password" name="adminLogpass" id="adminLogpass">
                    </div>
                </form>
                <!-- Start admin login modal form -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="adminLoginBtn" onclick="checkAdminLogin()">Login</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!-- End admin login modal -->


<!-- Jquery and bootsrap JS -->
<Script src="/js/jquery.min.js"></Script>
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.min.js"></script>

<!-- Font AweSome JS -->
<script src="/js/all.min.js"></script>

<!-- Student Testimonial Owl Slider JS -->
<script type="text/javascript" src="/js/owl.min.js"></script>
<script type="text/javascript" src="/js/testyslider.js"></script>

<!-- Student Call Ajax JavaScript -->
<script type="text/javascript" src="/js/ajaxrequest.js"></script>

<!-- Admin Call Ajax JavaScript -->
<script type="text/javascript" src="/js/adminajaxrequest.js"></script>
</body>

</html>