<?php
if (!isset($_SESSION)) {
    session_start();
}

include('../Admin/admininclude/header.php');
include('../dbconnection.php');

if (isset($_SESSION['is_admin_login'])) {
    $adminEmail = $_SESSION['adminLogEmail'];
} else {
    echo "<script> location.href='../index.php'; </script>";
}
?>

<div class="col-sm-9 mt-5 mx-3">
    <form action="" class="mt-3 form-inline d-print-none">
        <div class="form-group mr-3">
            <label for="checkid">Enter Course ID: </label>
            <input type="text" class="form-control ml-3" id="checkid" name="checkid"  onkeypress="isInputNumber(event)">
        </div>
        <button type="submit" class="btn btn-danger">Search</button>
    </form>

    <?php
    $sql = "SELECT course_id FROM course";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        if (isset($_REQUEST['checkid']) && $_REQUEST['checkid'] == $row['course_id']) {
            $sql = "SELECT * FROM course WHERE course_id = {$_REQUEST['checkid']}";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            if (($row['course_id']) == $_REQUEST['checkid']) {
                $_SESSION['course_id'] = $row['course_id'];
                $_SESSION['course_name'] = $row['course_name'];
    ?>
                <h3 class="mt-5 bg-dark text-white p-2">
                    Course ID: <?php
                                if (isset($row['course_id'])) {
                                    echo $row['course_id'];
                                }
                                ?>
                    Course Name:
                    <?php
                    if (isset($row['course_name'])) {
                        echo $row['course_name'];
                    }
                    ?>
                </h3>
    <?php
                $sql = "SELECT * FROM lesson WHERE course_id = {$_REQUEST['checkid']}";
                $result = $conn->query($sql);
                echo '
            <table class="table">
            <thead>
              <tr>
              <th scope="col">Lesson ID</th>
              <th scope="col">Lesson Name</th>
              <th scope="col">Lesson Link</th>
              <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>';
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<th scope="row">' . $row["lesson_id"] . '</th>';
                    echo '<td>' . $row["lesson_name"] . '</td>';
                    echo '<td>' . $row["lesson_link"] . '</td>';
                    echo '<td>
                            <form action="editlesson.php" method="POST" class="d-inline"> 
                                <input type="hidden" name="id" value=' . $row["lesson_id"] . '>
                                    <button type="submit" class="btn btn-info mr-3" name="view" value="View">
                                        <i class="fas fa-pen"></i>
                                    </button>
                            </form>  
                            <form action="" method="POST" class="d-inline"><input type="hidden" name="id" value=' . $row["lesson_id"] . '>
                                <button type="submit" class="btn btn-secondary" name="delete" value="Delete">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </form>
                         </td>
                         </tr>';
                }
                echo '</tbody>  
                     </table>';
           }
        } else {
            // Thông báo không tìm thấy khóa học tương ứng ID 
            // echo '<div class="alert alert-dark mt-4" role="alert">
            //     Course Not Found ! </div>';
        }
        if (isset($_REQUEST['delete'])) {
            $sql = "DELETE FROM lesson WHERE lesson_id = {$_REQUEST['id']}";
            if ($conn->query($sql) === TRUE) {
                // echo "Record Deleted Successfully";
                // below code will refresh the page after deleting the record
                echo '<meta http-equiv="refresh" content= "0;URL=?deleted" />';
            } else {
                echo "Unable to Delete Data";
            }
        }
    } ?>
</div>

<?php
if (isset($_SESSION['course_id'])) {
    echo '
        <div>
            <a href="/Admin/addLesson.php" class="btn btn-danger box">
                <i class="fas fa-plus fa-2x"></i>
            </a>
        </div>
        ';
}
?>

<!-- Only Number for input fields -->
<script>
  function isInputNumber(evt) {
    var ch = String.fromCharCode(evt.which);
    if (!(/[0-9]/.test(ch))) {
      evt.preventDefault();
    }
  }
</script>

<?php
include('../Admin/admininclude/footer.php');
?>