<?php include './php/config/autoload.php';
extract($_POST);


if (isset($submit)) {
  $user = new user("", $username, $password);
  $result = $user->read_user();
  $_SESSION['username'] = $user->username;
  $_SESSION['password'] = $user->password;
  $_SESSION['user_id'] = $user->user_id;
  if (true) {
    header("Location: ./Menu.php");
  } else {
  }
}


?>
<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

  <title>Login page</title>
</head>

<body>
  <h1>Loginpage</h1>
  <form action="#" method="POST">
    <div class="form-group">
      <label for=Username">Username</label>
      <input value="" type="text" class="form-control" name="username" placeholder="Username">

    </div>
    <div class="form-group">
      <label for="Password">Password</label>
      <input value="" type="password" class="form-control" name="password" placeholder="Password">
    </div>

    <input value="login" type="submit" class="btn btn-primary" name="submit"></input>
    <a href="Createuser.php" class="btn btn-primary">Register</a>
  </form>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>


  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>

</body>

</html>