
<?php
 include './php/config/autoload.php';

extract($_POST);

if(isset($submit)){
    
 $user = new user('',$username,$password);
 $Usercreate =$user->create_user( $user );
$createprofile =new profile("",$fname,$lname);

$result=$user->create_profile($createprofile);


if($result){
  
    echo 'Register successfully!';
  }  
  
 }



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>CreateUser</title>
</head>
<body>
<div>
<div class="d-flex justify-content-center  mb-3">
 <h1> Create user</h1></div>
 <form action="#" method="POST">

 <div class="form-group">
    <label>First name</label>
    <input  type="text" class="form-control" name="fname" placeholder="Username">
    <div class="form-group">
    <label>last name</label>
    <input  type="text" class="form-control" name="lname" placeholder="last name">

  <div class="form-group">
    <label for=Username">Username</label>
    <input  type="text" class="form-control" name="username" placeholder="Username">
    
  </div>
  <div class="form-group">
    <label for="Password">Password</label>
    <input  type="password" class="form-control" name="password" placeholder="Password">
  </div>
  
<input value="Create" type="submit" class="btn btn-primary" name="submit"></input>
<a href="Loginform.php"  class="btn btn-primary">Login</a>
</form>
   
   </div>
    </form>
    
      <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
</body>
</html>