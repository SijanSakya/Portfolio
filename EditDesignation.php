<?php include './php/config/autoload.php';
extract($_POST);
if (isset($submit)) {
  $desginationObject = new designation($_GET['designation_id'], $designation_icon, $designation_name, $designation_desc, $completed_percentage);

  $result = $user->update_designation($desginationObject);
  if ($result) {
    header("Location: Designationform.php");
  }
}
?>
<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

  <title>Designation Form</title>
</head>

<body>
  <?php include './layouts/navbar.php'; ?>

  <div class="container mt-5">
    <form method="POST">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card ">
            <div class="card-header pt-2">
              <h1>Edit Designation </h1>
              <div class="form-group">


                <input type="text" name="designation_icon" value="<?= $_GET['designation_icon'] ?>" class="form-control" placeholder=" Designation icon"><br>

              </div>
              <div class="form-group">
                <input type="text" name="designation_name" value="<?= $_GET['designation_name'] ?>" class="form-control" placeholder=" Designation Name"><br>

              </div>
              <div class="form-group">
                <input type="text" name="designation_desc" value="<?= $_GET['designation_desc'] ?>" class="form-control" placeholder=" Designation Description"><br>

              </div>
              <div class="form-group">

                <input type="text" name="completed_percentage" value="<?= $_GET['completed_percentage'] ?>" class="form-control" placeholder="Completed percentage"><br>

              </div>


              <input value="Edit" type="submit" class="btn btn-primary" name="submit"></input>
            </div>

          </div>
        </div>
      </div>
    </form>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>


  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>

</body>

</html>