<?php
include_once('connection.php');
$update_id = $_GET['update_id'];
if (isset($update_id)) {
    $info_quary = mysqli_query($conn, "select * from users where id = $update_id");
    $row = mysqli_fetch_array($info_quary);
}

if (isset($_POST['submit'])) {
    $upd_name = $_POST['upd_name'];
    $upd_email = $_POST['upd_email'];
    $upd_address = $_POST['upd_address'];
    $update_quary = mysqli_query($conn, "update users set name = '$upd_name', email = '$upd_email', address = '$upd_address' where id = $update_id");
    if ($upd_address) {
        header(
            "location:index.php",
        );
    } else {
        echo "<script>alert('Data updation failed!')</script>";
    }
}

?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="form-sec">
        <form action="" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Your name</label>
                <input type="text" name="upd_name" class="form-control" id="name" value="<?= $row['name'] ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Your email</label>
                <input type="email" name="upd_email" class="form-control" id="email" value="<?= $row['email'] ?>">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Your address</label>
                <textarea name="upd_address" class="form-control" id="address"
                    rows="3"><?= $row['address'] ?></textarea>
            </div>
            <div class="mb-3 d-flex justify-content-between">
                <button class="btn btn-success"><a href="index.php" class="text-white">Back</a></button>
                <button class="btn btn-success" name="submit">Update</button>
            </div>
        </form>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
        </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
        </script>
</body>

</html>