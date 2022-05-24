<?php


$error = '';
$message = '';

function clean_text($string){
 $string = trim($string);
 $string = stripslashes($string);
 $string = htmlspecialchars($string);
 return $string;
}

if(isset($_POST["submit"]))
{
 if(empty($_POST["name"]))
 {
  $error .= "Please Enter your Name";
 }
 else
 {
  $message = clean_text($_POST["name"]);
  if(!preg_match("/^[a-zA-Z ]*$/",$name))
  {
   $error .= "Invalid name entered";
  }
 }
 if(empty($_POST["email"]))
 {
  $error = "Please Enter your Email";
 }
 else
 {
  $message = clean_text($_POST["email"]);
  if(!filter_var($email, FILTER_VALIDATE_EMAIL))
  {
   $error = "Invalid email format";
  }
 }
 if(empty($_POST["dateOfBirth"]))
 {
  $error = "Date of birth is required";
 }
 else
 {
  $message = clean_text($_POST["dateOfBirth"]);
 }
 if(empty($_POST["gender"]))
 {
  $error .= "Gender is required";
 }
 else
 {
  $message = clean_text($_POST["gender"]);
 }
    if(empty($_POST["country"]))
 {
  $error = "Country is required";
 }
 else
 {
  $message = clean_text($_POST["country"]);
 }

 if($error == '')
 {
  $file_open = fopen("userdata.csv", "a");
  $no_rows = count(file("userdata.csv"));
  if($no_rows > 1)
  {
   $no_rows = ($no_rows - 1) + 1;
  }
  $form_data = array(
   'sr_no'  => $no_rows,
   'name'  => $name,
   'email'  => $email,
   'dateOfBirth' => $dateOfBirth,
   'gender' => $gender,
    'country' => $country
  );
  fputcsv($file_open, $form_data);
  $message = "We have succesfully saved your records";
  $name = '';
  $email = '';
  $dateOfBirth = '';
  $gender = '';
  $country = '';
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
