<?php

include ("config.php");
if (isset($_POST['register'])){
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $dateOfBirth = mysqli_real_escape_string($connection, $_POST['dateOfBirth']);
    $gender = mysqli_real_escape_string($connection, $_POST['gender']);
    $country = mysqli_real_escape_string($connection, $_POST['country']);
    
    
    $query = "INSERT INTO users (name, email, dateOfBirth, gender, country) VALUES ('$name', '$email', '$dateOfBirth', 'gender', 'country')";
    if(mysqli_query($connection, $query)) {
    $message = 'You have succesfully registered, proceed to log in';
    }else {
    $error = 'Could not register, check your details!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration page</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>

<div class="container">
<div class="row">
        <div class="col-md-12">
        <?php
            if($message) {
                echo   '<div class="alert alert-success alert-block">';
                echo   '<button type="button" class="close" data-dismiss="alert">×</button>';
                echo   '<strong><i class="fa fa-info-circle"></i>' .$message. '</strong>';
                echo   '</div>';
            }

            if($error) {
                echo   '<div class="alert alert-danger alert-block">';
                echo   '<button type="button" class="close" data-dismiss="alert">×</button>';
                echo   '<strong><i class="fa fa-info-circle"></i>' .$error. '</strong>';
                echo   '</div>';
            }
        ?>
        </div>
    <div class="row">
        <div class="col-6 offset-2">
            <H1 class="h1 my-5 "> Registration Form </H1>
            <hr>
            <br>
            <form action = '<?php echo $_SERVER['PHP_SELF'] ?>' method = 'POST'>
                <div class="mb-3">
                        <label for="InputName" class="form-label">Name</label>
                        <input type="text" class="form-control" name = "name" aria-describedby="name">
                </div>
                <div class="mb-3">
                        <label for="InputEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" name = "email" aria-describedby="email">
                </div>
                <div class="mb-3">
                        <label for="dateOfBirth" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" name = "dateOfBirth" aria-describedby="dateOfBirth">
                </div>
               <div class="mb-3">
                        <label for="gender" class="form-label"> Gender </label>
                        <input type="text" class="form-control" name = "gender" aria-describedby="gender">
                </div>
               <div class="mb-3">
                        <label for="dateOfBirth" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" name = "dateOfBirth" aria-describedby="dateOfBirth">
                </div>
              <div class="mb-3>
               <label for="gender" class="form-label"> Gender: </label>
                            <input type="text" class="form-control" name="gender" aria-describedby="dateOfBirth" list="genderlist">
                                <datalist id="genderlist">
                                    <option value="Male"></option>
                                    <option value="Female"></option>
                                </datalist>
              </div>
                <div>
                <button type="submit" name="register" class="btn btn-primary col-4 offset-4">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="js/bootstrap.bundle.js"></script>
</body>
</html>
