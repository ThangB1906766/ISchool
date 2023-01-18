// Ajax call for admin login verification
/*
    Sự kiện onclick="checkAdminLogin()"" ở footer.php
    Lấy thông tin từ form login gửi dữ liệu qua (admin.php) để kiểm tra đăng nhập
    Cần phải link với "footer.php"
        <script type="text/javascript" src="/js/adminajaxrequest.js"></script>
*/
function checkAdminLogin(){
    var adminLogEmail = $("#adminLogemail").val();
    var adminLogPass = $("#adminLogpass").val();
    $.ajax({
        url: '/Admin/admin.php', 
        method: "POST",
        data:{
            checkLogEmail: "checkLogEmail",
            adminLogEmail: adminLogEmail,
            adminLogPass: adminLogPass,
        },
        success:function(data){
            // console.log(data);
            if(data == 0){
                $("#statusAdminLogMsg").html('<small class="alert alert-danger"> Invalid Email or Password !</small>'); 
            }else if(data == 1){
                $("#statusAdminLogMsg").html('<small class="alert alert-success"> Success loading...</small>');
                setTimeout(()=>{
                    window.location.href = "/Admin/adminDasdBoard.php";
                }, 1000 );
            }
        }
    });
}