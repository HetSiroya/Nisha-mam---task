<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <form action="./scandircheclk.php" method="post" enctype="multipart/form-data">
        upload file:
        <input type="file" name="u_file">
        <input type="submit" name="u_btn">
    </form>
    <div class="container mt-3">
        <table class="table table-light">
            <thead>
                <tr>
                    <th>File Name</th>
                    <th>Download</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
    </div>
    <?php
    $folder_name = "uploads/";
    if (isset($_POST["u_btn"])) {
        $file_name = $_FILES['u_file']['name'];
        if (move_uploaded_file($_FILES['u_file']['tmp_name'], $folder_name . $file_name)); {
            // echo 'file is upload successfully';
        }
        $files = scandir($folder_name);
        foreach ($files as $file) {
            if ($file != '.' && $file != '..') {
                // echo "$file <br><br>";
    ?>
                <tr>
                    <!--  < ? = is use for "php echo" -->
                    <td><?= $file ?></td>
                    <td><button class="btn btn-success">Download</button></td>
                    <td><button class="btn btn-danger">Delete</button></td>
                </tr>
    <?php
            }
        }
    }
    ?>


    </tbody>
    </table>
</body>

</html>