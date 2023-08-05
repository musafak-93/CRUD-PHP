<?php
include 'connect.php';

if (isset($_POST['submit'])) {
    $nik = $_POST['nik'];
    $name = $_POST['name'];
    $id_department = $_POST['id_department'];

    $sql = "INSERT INTO employee (nik,name,id_department)
    VALUES('$nik', '$name', '$id_department')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        // echo "data insert success";
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
                <input type="number" class="form-control" placeholder="enter your NIK" name="nik">
            </div>
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" placeholder="enter your name" name="name">
            </div>
            <div class="mb-3">
                <label class="form-label">Department</label>
                <select class="form-select" name="id_department">
                    <option selected>Select</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            <button class="btn btn-primary my-5"><a href="dataEmployee.php" class="text-light">Back</a></button>
        </form>

    </div>
</body>

</html>