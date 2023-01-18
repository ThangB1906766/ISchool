<?php
/*
    student.php hiển thị list "student" trong csdl
        - delete
        - insert -> (addnewstudent.php)
        - update -> (editstudent.php)
*/
if (!isset($_SESSION)) {
    session_start();
  }
  
include('../Admin/admininclude/header.php');
include('../dbconnection.php');

if(isset($_SESSION['is_admin_login'])){
  $adminEmail = $_SESSION['adminLogEmail'];
} else {
    echo "<script> location.href='../index.php'; </script>";
}

?>

<div class="col-sm-9 mt-5">
    <!--Table-->
    <p class=" bg-dark text-white p-2">List of Students</p>
    <?php
    $sql = "SELECT * FROM student";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Student ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<th scope="row">'.$row["stu_id"].'</th>';
                    echo   '<td>'.$row["stu_name"].'</td>';
                    echo   '<td>'.$row["stu_email"].'</td>';
                    echo   '<td>';
                    echo        '<form action="/Admin/editstudent.php" method="POST" class="d-inline">
                                    <input type="hidden" name="id" value='.$row["stu_id"].'>
                                    <button type="submit" class="btn btn-info mr-3" name="view" value="View">
                                        <i class="fas fa-pen"></i>
                                    </button>
                                </form>';
                    echo        '<form action="" method="POST" class="d-inline">
                                    <input type="hidden" name="id" value='.$row["stu_id"].'>
                                    <button type="submit" class="btn btn-secondary" name="delete" value="Delete">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </form>';
                    echo    '</td>';
                    echo  '</tr>';
                } ?>
            </tbody>
        </table>
    <?php } else {
        echo "0 result";
    } 
    
    // Delete 1 khóa học "course" trong csdl khi lick button name="delete"
    if(isset($_REQUEST['delete'])){ //name="delete" của button
        $sql = "DELETE FROM student WHERE stu_id = {$_REQUEST['id']}"; // "id" name="id" của thẻ input
        if($conn->query($sql) == TRUE){
            // echo "Record Deleted Successfully";
            // refresh the page after deleted
            echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
          } else {
            echo "Unable to Delete Data";
          }
       }
    ?>

    

</div>
</div> <!-- div Row close from header -->

<div><a class="btn btn-danger box" href="/Admin/addnewstudent.php"><i class="fas fa-plus fa-2x"></i></a></div>
</div> <!-- div Conatiner-fluid close from header -->

<?php
include('../Admin/admininclude/footer.php');
?>