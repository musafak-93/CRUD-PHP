<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <button class="btn btn-primary my-5"><a href="addData.php" class="text-light">Add Data</a></button>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">NIK</th>
                    <th scope="col">NAME</th>
                    <th scope="col">ID DEPARTMENT</th>
                    <th scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $sql = "SELECT * FROM employee";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id_employee = $row['id_employee'];
                        $nik = $row['nik'];
                        $name = $row['name'];
                        $id_department = $row['id_department'];
                        echo
                        '<tr>
                        <th scope="row">' . $no . '</th>
                        <td>' . $nik . '</td>
                        <td>' . $name . '</td>
                        <td>' . $id_department . '</td>
                        <td>
                        <button class="btn btn-primary"><a href="updateData.php?updateid=' . $id_employee . '" class="text-light">Edit</a></button>
                        <button class="btn btn-danger"><a href="deleteData.php?deleteid=' . $id_employee . '" class="text-light">Delete</a></button>
                        </td>
                    </tr>';
                        $no++;
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>