<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-3">
        <form action="" method="post" id="form">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email">
            <label for="password">Password:</label>
            <input type="text" class="form-control" id="password" name="password">
            <label for="confirmpassword">Confirm password:</label>
            <input type="password" class="form-control" id="confirmpassword" name="confirmpassword">
            <input type="submit" value="Submit" class="btn btn-primary mt-3" name="submit">
        </form>
    </div>

    <script src="./jquery.js"></script>
    <script src="./jqueryvalidate.js"></script>
    <script src="./jqueryvalidatead.js"></script>
    <script>
    $(document).ready(function() {
        $.validator.addMethod("lettersonly", function(value, element) {
            return this.optional(element) || /^[a-zA-Z]+$/i.test(value);
        }, "Name must contain only letters.");

        $("#form").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 3,
                    maxlength: 15,
                    lettersonly: true
                },
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 6,
                    pattern: /(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/
                },
                confirmpassword: {
                    required: true,
                    equalTo: "#password"
                }
            },
            messages: {
                name: {
                    required: "Name is required",
                    minlength: "Name must be at least 3 characters",
                    maxlength: "Name must be at most 15 characters",
                    lettersonly: "Name must contain only letters"
                },
                email: {
                    required: "Email is required",
                    email: "Email is invalid"
                },
                password: {
                    required: "Password is required",
                    minlength: "Password must be at least 6 characters",
                    pattern: "Password must contain at least one uppercase letter, one lowercase letter, one number or special character"
                },
                confirmpassword: {
                    required: "Confirm password is required",
                    equalTo: "Password and confirm password must be the same"
                }
            },
            errorElement: "div",
            errorPlacement: function(error, element) {
                error.addClass("invalid-feedback");
                element.closest(".form-control").after(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid').removeClass('is-valid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid').addClass('is-valid');
            }
        });
    });
    </script>
</body>
<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $con = mysqli_connect("localhost", "root", "", "test");
    if (!$con) {
        echo "Error: ";
    } else {
        $sql = "INSERT INTO `register`(`Username` ,`email`, `password` ) VALUES ('$name' , '$email' , '$password')";

        if ($con->query($sql) == true) {
            echo "Data is inserted successfully";
        } else {
            echo "Data is not inserted";
        }
    }
}
?>

</html>