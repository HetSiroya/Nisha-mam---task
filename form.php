<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>
    <form action="" method="post">
        Enter your name:
        <input type="text" name="name">
        <input type="submit" value="Submit" name="submit">
    </form>
</body>
<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    // echo "Your name is: $name";
    $con = mysqli_connect("localhost", "root", "", "test");
    if (!$con) {
        echo "Error: ";
    } else {
        $sql = "INSERT INTO `test`(`name`) VALUES ('$name')";

        if ($con->query($sql) == true) {
            echo "Data is inserted successfully";
        } else {
            echo "Data is not inserted";
        }
    }
}
?>

</html>