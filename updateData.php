<?php
include 'connect.php';

$id_employee = $_GET['updateid'];

$sql = "SELECT * FROM employee where id_employee=$id_employee";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$nik = $row['nik'];
$name = $row['name'];
$id_department = $row['id_department'];


if (isset($_POST['submit'])) {
    $nik = $_POST['nik'];
    $name = $_POST['name'];
    $id_department = $_POST['id_department'];

    $sql = "UPDATE employee set id_employee='$id_employee', nik='$nik', name='$name', id_department='$id_department' where id_employee=$id_employee";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        // echo "update success";
        header('location:dataEmployee.php');
    } else {
        die(mysqli_error($conn));
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <form method="post" class="my-5">
            <div class="mb-3">
                <label class="form-label">NIK</label>
                <input type="number" class="form-control" placeholder="enter your NIK" name="nik" value=<?php echo $nik; ?>>
            </div>
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" placeholder="enter your name" name="name" value=<?php echo $name; ?>>
            </div>
            <div class="mb-3">
                <label class="form-label">Department</label>
                <select class="form-select" name="id_department">
                    <?php
                    $query = mysqli_query($conn, "SELECT * FROM department") or die(mysqli_error($conn));
                    while ($data = mysqli_fetch_array($query)) {
                        $selected = ($data['id_department'] == $id_department) ? 'selected' : '';
                        echo "<option value='$data[id_department]' $selected> $data[name_department]</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Update</button>
            <button class="btn btn-primary my-5"><a href="dataEmployee.php" class="text-light">Back</a></button>
        </form>

    </div>
</body>

</html>