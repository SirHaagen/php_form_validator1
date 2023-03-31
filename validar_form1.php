<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP - FORM VALIDATION 1</title>
</head>

<body>

  <form action="validar_form1.php" method="post">
    <label>Name:</label><input type="text" name="name"><br>
    <label>Password:</label><input type="password" name="password"><br>
    <label>Email:</label><input type="email" name="email">
    <input type="submit" value="Send">
  </form>

  <?php
  $message_array = array();
  if ($_POST) {
    foreach ($_POST as $key => $value) {
      if (empty($value)) {
        echo "EMPTY DATA IS NOT ALLOWED, PLEASE TRY AGAIN";
        die();
      }
    }
    if (strlen($_POST["name"]) < 5) {
      array_push($message_array, "NAME MINIMUM 5 CHARACTERS");
    }
    if (strlen($_POST["password"]) < 5) {
      array_push($message_array, "PASSWORD MINIMUM 5 CHARACTERS");
    }
    if (strpos($_POST["email"], "@") == "" || strpos($_POST["email"], ".") == "") {
      array_push($message_array, "INCORRECT EMAIL ADDRESS");
    }
    if (count($message_array) > 0) {
      echo "<div style='color:red'><ul>";
      for ($i = 0; $i < count($message_array); $i++) {
        echo "<li>$message_array[$i]</li>";
      }
      echo "</ul></div>";
    } else {
      echo "<p style='color:green'>DATA SUCCESFULLY SUBMITTED</p>";
    }
  }
  ?>

</body>

</html>