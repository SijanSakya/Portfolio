<?php include './php/config/autoload.php';


extract($_GET);
if (isset($delete)) {
  $result = $user->delete_education($delete);
}
$education = $user->read_education();


?>
<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

  <title>Education Form</title>
</head>

<body>
  <?php include './layouts/navbar.php'; ?>
  <div class="container mt-5">
    <form method="POST">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card ">
            <div class="card-header pt-2">
              <h1>EducationForm</h1>
              <table class="table">
                <tr>

                  <th>start date</th>
                  <th>end date </th>
                  <th>Institution</th>
                  <th> board </th>
                  <th> program </th>
                  <th>update </th>
                  <th>delete </th>
                </tr>
                <?php
                while ($row = mysqli_fetch_assoc($education)) {
                ?>

                  <div class="form-group">
                    <tr>
                      <td><span><?= $row['start_date']  ?></span></td>
                      <td><span><?= $row['end_date']  ?></span></td>
                      <td><span><?= $row['institution']  ?></span></td>
                      <td><span><?= $row['board']  ?></span></td>
                      <td> <span><?= $row['program']  ?></span></td>


                      <td><a href="EditEducation.php?education_id=<?= $row['education_id'] ?>&start_date=<?= $row['start_date'] ?>&end_date=<?= $row['end_date'] ?>&institution=<?= $row['institution'] ?>&board=<?= $row['board'] ?>&program=<?= $row['program'] ?>">Edit</a></td>
                      <td> <a href="EducationForm.php?delete=<?= $row['education_id'] ?>&key=value">Delete</a></td>
                      </td>
                  </div>
                <?php
                }
                ?>
              </table>
              <a href="./AddEducation.php " class="btn btn-primary">Add new</a>


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