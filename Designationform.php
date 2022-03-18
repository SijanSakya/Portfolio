<?php include './php/config/autoload.php';
// print_r($_GET);

extract($_GET);
if (isset($delete)) {

  $result = $user->delete_designation($delete);
}
$desinationAll = $user->read_designation();
//print_r($desinationAll);
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
  <div class="container mt-4">
    <form method="POST">
      <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="card ">
            <div class="card-header pt-2">
              <h1>Designation Form</h1>
              <table class="table">
                <tr>
                  <th>designation icon</th>
                  <th>designation name</th>
                  <th>designation desc</th>
                  <th>completed percentage</th>
                  <th>update </th>
                  <th>delete </th>
                </tr>

                <?php
                while ($row = mysqli_fetch_assoc($desinationAll)) {
                ?>

                  <div class="form-group">
                    <tr>
                      <td><span><?= $row['designation_icon'] ?></span></td>

                      <td><span><?= $row['designation_name'] ?></span></td>
                      <td><span><?= $row['designation_desc'] ?></span></td>
                      <td><span><?= $row['completed_percentage'] ?></span></td>



                      <td><span> <a href="EditDesignation.php?designation_icon=<?= $row['designation_icon'] ?>&designation_name=<?= $row['designation_name'] ?>&designation_desc=<?= $row['designation_desc'] ?>&designation_id=<?= $row['designation_id'] ?>&completed_percentage=<?= $row['completed_percentage'] ?>">Edit</a> </span></td>
                      <td> <span><a href="Designationform.php?delete=<?= $row['designation_id'] ?>&key=value">Delete</a> </span></td>

                    </tr>
                  </div>
                <?php } ?>

              </table>
              <a href="./AddDesignation.php" class="btn btn-primary">Add New</a>
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