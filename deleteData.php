<?php
include 'connect.php';

if (isset($_GET['deleteid'])) {
    $id_employee = $_GET['deleteid'];

    $sql = "DELETE FROM employee where id_employee=$id_employee";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        // echo "Deleted Successfull";
        header('location:dataEmployee.php');
    } else {
        die(mysqli_error($conn));
    }
}
