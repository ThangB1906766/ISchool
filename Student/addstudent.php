
<?php
if (!isset($_SESSION)) { // Nếu chưa có sesion thì start
    session_start();
}
/*
    Ngày 14/01/2023
    Thực hiện thêm student (tên, email, mật khẩu) khi signup vào csdl "student"
    1. Kết nối csdl
    2. Thực hiện thêm
    3. Kiểm tra email nhập vào có tồn tại trong csdl chưa
*/
include_once("../dbconnection.php"); // Kết nối csdl

// Checking email registration
if (isset($_POST['checkemail']) && isset($_POST['stuemail'])) {
    $stuemail = $_POST['stuemail'];
    $sql = "SELECT stu_email FROM student WHERE stu_email ='" . $stuemail . "'";
    $result = $conn->query($sql);
    $row = $result->num_rows;
    echo json_encode($row);
}

// Insert student
// isset hàm kiểm tra một biến dữ liệu có xác định và khác NULL hay không?
if (isset($_POST['stusignup']) && isset($_POST['stuname']) && isset($_POST['stuemail']) && isset($_POST['stupass'])) {
    $stuname = $_POST['stuname'];
    $stuemail = $_POST['stuemail'];
    $stupass = $_POST['stupass'];

    $sql = "INSERT INTO student(stu_name, stu_email, stu_pass) VALUE ('$stuname' ,'$stuemail', '$stupass')";

    if ($conn->query($sql) == TRUE) {
        echo json_encode("OK");
    } else {
        echo json_encode("Failed");
    }
}

// Student Login Verification
/* 
    Nhận thông tin "function checkStuLogin()" của "ajaxrequest.js"
*/

if (!isset($_SESSION['is_login'])) { // Nếu chưa login thì tiến hành kiểm tra emaim + pass
    if (isset($_POST['checkLogEmail']) && isset($_POST['stuLogEmail']) && isset($_POST['stuLogpass'])) {

        $stuLogEmail = $_POST['stuLogEmail'];
        $stuLogpass = $_POST['stuLogpass'];

        $sql = "SELECT stu_email, stu_pass FROM student WHERE stu_email ='" . $stuLogEmail . "' AND stu_pass='" . $stuLogpass . "'";

        $result = $conn->query($sql);
        $row = $result->num_rows;

        if ($row === 1) {
            $_SESSION['is_login'] = true;
            $_SESSION['stuLogEmail'] = $stuLogEmail;
            echo json_encode($row);
        } else if ($row === 0) {
            echo json_encode($row);
        }
    }
}
?>
