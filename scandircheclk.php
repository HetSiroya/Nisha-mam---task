<form action="" method="post" enctype="multipart/form-data">
    upload file:
    <input type="file" name="u_file">
    <input type="submit" name="u_btn">
</form>
<?php
$folder_name = "uploads/";
if (isset($_POST["u_btn"])) {
    $file_name = $_FILES['u_file']['name'];
    if (move_uploaded_file($_FILES['u_file']['tmp_name'], $folder_name . $file_name)); {
        echo 'file is upload successfully';
    }
    $files = scandir($folder_name);
    foreach ($files as $file) {
        if ($file != '.' && $file != '') {
            echo "$file <br><br>";
        }
    }
}