<?php
$errors = [];
if (isset($_POST['btn_Name'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $gender = $_POST['gender'];

  if ($name == "") {
    $errors["name"] = "Please fill The name filed";
  } else if (!preg_match("/^[a-zA-Z .]{3,}$/", $name)) {
    $errors["name"] = "Invalid Name";
  }

  if (empty($email)) {
    $errors["email"] = "Please fill The Email filed";
  } elseif (!preg_match("/^[a-zA-Z0-9._]{4,}[@][a-z]{2,}[.][a-zA-Z]{2,}$/", $email)) {
    $errors["email"] = "Invalid Email";
  }
  // echo $email;



  if (count($errors) == 0) {
    echo "Data is Saved";
    // unset($_POST['name']);
    // unset($_POST['email']);
    // unset($_POST['subject']);
    // unset($_POST['gender']);
    // unset($_POST['btn_Name']);
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
  }
}





?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h1> This is PHP File</h1>
  <form action="" method="POST">
    <label for="n">Give Your Name</label> <br>
    <input type="text" name="name" id="n"> <br>
    <?php
    echo  isset($errors["name"]) ? "<p style='color:red'> {$errors['name']} </p>" : ""
    ?>
    <br>
    <label for="n">Email</label> <br>
    <input type="text" name="email" id="email"> <br>
    <?php
    echo  isset($errors["email"]) ? "<p style='color:red'> {$errors['email']} </p>" : ""
    ?>
    <br>
    <input type="checkbox" name="subject[]" id="n" value="bangla"> Bangla<br>
    <input type="checkbox" name="subject[]" id="n" value="english"> english<br>
    <input type="checkbox" name="subject[]" id="n" value="Math"> Math<br>
    <input type="checkbox" name="subject[]" id="n" value="Arabic"> Arabic<br>
    <br>
    Gender
    <input type="radio" name="gender[]" id="n" value="Male"> Male<br>
    <input type="radio" name="gender[]" id="n" value="Female"> Female<br>


    <input type="submit" name="btn_Name">
  </form>

</body>

</html>