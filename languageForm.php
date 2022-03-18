<?php include './php/config/autoload.php';

extract($_GET);

if (isset($delete)) {
  $result = $user->delete_language($delete);
}
$language = $user->read_language();
//print_r($language);

?>
<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

  <title>LanguageForm</title>
</head>

<body>
  <?php include './layouts/navbar.php'; ?>
  <div class="container mt-5">
    <form method="POST">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card ">
            <div class="card-header pt-2">
              <h1>LanguageForm</h1>
              <table class="table">
                <tr>
                  <th>Language </th>
                  <th>percentage</th>
                  <th>update </th>
                  <th>delete </th>
                </tr>
                <div class="form-group">
                  <?php
                  while ($row = mysqli_fetch_assoc($language)) {
                  ?>

                    <div class="form-group">
                      <tr>
                        <td><span><?= $row['language_name']  ?></span></td>

                        <td><span><?= $row['completed_percentage']  ?></span></td>




                        <td> <a href="./EditLanguage.php?language_id=<?= $row['language_id'] ?>&language_name=<?= $row['language_name'] ?>&completed_percentage=<?= $row['completed_percentage'] ?>&">Edit</a></td>

                        <td><a href="languageForm.php?delete=<?= $row['language_id'] ?>&key=value">Delete</a>

                        </td>
                    </div>
                  <?php
                  }
                  ?>
              </table>
              <a href="./AddLanguage.php " class="btn btn-primary">Add new</a>
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