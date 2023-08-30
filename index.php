<?php
include_once('connection.php');



if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $insert_query = mysqli_query($conn, "insert into users set name = '$name', email = '$email', address = '$address'");
    if (isset($insert_query)) {
        echo "<script>alert('Data insterted successfully!')</script>";
    } else {
        die(mysqli_error($conn));
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
                <input type="text" name="name" class="form-control" id="name" placeholder="John Doe">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Your email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="johndoe@gmail.com">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Your address</label>
                <textarea name="address" class="form-control" id="address" rows="3"></textarea>
            </div>
            <div class="mb-3 d-flex justify-content-end">
                <button class="btn btn-success" name="submit">Submit</button>
            </div>
        </form>
    </div>

    <div class="table-sec">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $display_query = mysqli_query($conn, "select * from users where is_delete = 0");
                $sno = 1;
                while ($row = mysqli_fetch_array($display_query)) {
                    $id = $row['id'];
                    ?>
                    <tr>
                        <td>
                            <?= $sno ?>
                        </td>
                        <td>
                            <?= $row['name'] ?>
                        </td>
                        <td>
                            <?= $row['email'] ?>
                        </td>
                        <td>
                            <?= $row['address'] ?>
                        </td>
                        <td class="d-flex justify-content-center gap-4">
                            <a href="info.php?info_id=<?= $id ?>"><i class="las la-info"></i></a>
                            <a href="update.php?update_id=<?= $id ?>"><i class="las la-edit"></i></a>
                            <a href="delete.php?delete_id=<?= $id ?>"><i class="las la-trash"></i></a>
                        </td>
                    </tr>
                    <?php
                    $sno++;
                }
                ?>
            </tbody>
        </table>
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