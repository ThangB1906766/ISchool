/* 
    Ngày 14/01/2023
    Hàm addStu() chức năng thêm một student vào csdl khi chọn signup (tên, emaim, mật khẩu)
    1. addStu() gán sự kiện onlick ở nút submit form đăng ký
    2. Tạo addStu() ở ajaxrequest.js
        - Lấy giá trị từ 3 trường trong form từ #id
            + stuname. stuemail, stupass
        - Tạo  $.ajax() để đẩy dữ liệu qua addstudent.php để xử lý
        - Kiểm tra các ràng buộc như rỗng, nhập đúng định dạng email
        - Khi đăng ký thành công hiển thị thông báo
    3. Hàm clearStuRegField() để reset các trường khi đăng ký thành công
    4. (document).ready(function() xử lý kiểm tra email đã tồn tại hay chưa
    5. function checkStuLogin() 

*/

$(document).ready(function(){
    // Ajax call form already exists email verification
    $("#stuemail").on("keypress blur", function(){
        var reg = /^[A-Z0-9._/%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
        var stuemail = $("#stuemail").val();
        $.ajax({
             url: '/Student/addstudent.php', 
             method: "POST",
             data:{
                checkemail: "checkmail",
                stuemail: stuemail,
             },
             success:function(data){
                console.log(data);
                if(data != 0){
                     $("#statusMsg2").html('<small style="color:red;"> Email ID Already Used !</small>');
                     $("#signup").attr("disabled", true);
                }else if(data == 0 && reg.test(stuemail)){
                    $("#statusMsg2").html('<small style="color:green;"> There You Go !</small>');
                    $("#signup").attr("disabled", false);
                }else if(!reg.test(stuemail)){
                    $("#statusMsg2").html('<small style="color:red;"> Please Enter valid Email e.g example@gmail.com !</small>');
                    $("#stuemail").focus();
                    $("#signup").attr("disabled", false);
                }
            }
        });
    });
});

function addStu(){
    var reg = /^[A-Z0-9._/%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    var stuname = $("#stuname").val();
    var stuemail = $("#stuemail").val();
    var stupass = $("#stupass").val();
    // console.log(stuname);
    // console.log(stuemail);
    // console.log(stupass);

    // Checking form Failed on form submitssion
    if(stuname.trim() == ""){
        $("#statusMsg1").html('<small style="color:red;"> Please Enter Name !</small>');
        $("#stuname").focus();
        return false;
    } else if (stuemail.trim() == ""){
        $("#statusMsg2").html('<small style="color:red;"> Please Enter Email !</small>');
        $("#stuemail").focus();
        return false; 
    }else if (stuemail.trim() != "" && !reg.test(stuemail)){
        $("#statusMsg2").html('<small style="color:red;"> Please Enter valid Email e.g example@gmail.com !</small>');
        $("#stuemail").focus();
        return false; 
    }else if (stupass.trim() == ""){
        $("#statusMsg3").html('<small style="color:red;"> Please Enter Password !</small>');
        $("#stupass").focus();
        return false; 
    } else {
    /*
     Hàm $.ajax() của JQuery được sử dụng để thực hiện các request HTTP bất đồng bộ (async).
     - url: là một chuỗi chứa URL mà bạn muốn sử dụng AJAX để thực hiện request, trong khi đó tham số options là một object thuần chứa các thiết lập cho request AJAX đó.
     - dataType: là dạng dữ liệu trả về. (text, json, script, xml,html,jsonp )
     - data: không bắt buộc ,là một đối tượng object gồm các key : value sẽ gửi lên server
    */
    $.ajax({
        url:'/Student/addstudent.php', 
        method: "POST",
        dataType: "json",
        data:{
            stusignup: "stusignup", // Gui thong bao dang ky qua addstudent
            stuname: stuname,
            stuemail: stuemail,
            stupass: stupass,
        },
        success:function(data){    
            console.log(data)
            if(data == "OK"){
                $('#successMsg').html("<span class='alert alert-success'> Registration uccessful !</span>")
                clearStuRegField();
            }else if(data == "Failed"){
                  $('#successMsg').html("<span class='alert alert-bg-danger'> Unable to Register !</span>")
            }
        }
    });
    }
}

// Empty all Failed
function clearStuRegField(){
    $("#stuRegForm").trigger("reset");
    $("#statusMsg1").html(" ");
    $("#statusMsg2").html(" ");
    $("#statusMsg3").html(" ");

}

// Ajax call for student login verification
/*
    Sự kiện onclick="checkStuLogin()" ở footer.php
    Lấy thông tin từ form login gửi dữ liệu qua addstudent.php để kiểm tra đăng nhập
*/
function checkStuLogin(){
    // console.log("Login Clicked!!")
    var stuLogEmail = $("#stuLogemail").val();
    var stuLogpass = $("#stuLogpass").val();
    $.ajax({
        url: '/Student/addstudent.php', 
        method: "POST",
        data:{
            checkLogEmail: "checkLogEmail",
            stuLogEmail: stuLogEmail,
            stuLogpass: stuLogpass,
        },
        success:function(data){
            // console.log(data);
            if(data == 0){
                $("#statusLogMsg").html('<small class="alert alert-danger"> Invalid Email or Password !</small>'); 
            }else if(data == 1){
                $("#statusLogMsg").html('<div class="spinner-border text-success role="status"></div>');
                setTimeout(()=>{
                    window.location.href = "index.php";
                }, 1000 );
            }
        }
    });
}