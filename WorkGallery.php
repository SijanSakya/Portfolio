<?php
include './php/config/autoload.php';

extract($_GET);
extract($_FILES);
//print_r($_FILES);

//upload image
if (isset($_POST['submit'])) {
  $filename = $file['name'];
  $arr = explode(".", $filename);
  $ext = array_pop($arr);
  $time =  time();
  $filepath = $file['tmp_name'];
  $fileerror = $file['error'];

  if ($fileerror == 0) {
    $destfile = './uploaded/' . $time . '.' . $ext;
    $result =  move_uploaded_file($filepath, $destfile);
    if ($result) {
      $workObj = new work(" ", "1", $time . '.' . $ext, 1, $user->user_id);
      $workGallery = $user->create_work($workObj);
      //print_r(workGallery );
      if ($workGallery) {
        header("Location: ./WorkGallery.php");
      } else {
        unlink($destfile);
      }
    } else {
      echo "error";
    }
    //  $insert =$user->create_work();

  }
}
//edit image

if (isset($_POST['edit'])) {

  $filename = $nextImage['name'];
  $arr = explode(".", $filename);
  $ext = array_pop($arr);
  $time =  time();
  $filepath = $nextImage['tmp_name'];
  $fileerror = $nextImage['error'];

  if ($fileerror == 0) {
    $destfile = './uploaded/' . $time . '.' . $ext;
    $result =  move_uploaded_file($filepath, $destfile);
    if ($result) {
      $workObj = new work($_POST['changeImageId'], "1", $time . '.' . $ext, "1", $user->user_id);
      $workGallery = $user->update_work($workObj);
      //print_r(workGallery );
      if ($workGallery) {
        unlink('./uploaded/' . $_POST['edit']);
        header("Location: ./WorkGallery.php");
      } else {
        unset($destfile);
      }
    } else {
      echo "error";
    }
    //  $insert =$user->create_work();

  }
}



//delete image
if (isset($delete)) {

  $res = $user->delete_work($delete);
  if ($res) {
    unlink('./uploaded/' . $edit);
  }
  //print_r($delete);

}
//select image and display them 
$workGallery = $user->read_work();
//print_r($workGallery);
?>
<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="https://kit.fontawesome.com/1dc8fa370c.js" crossorigin="anonymous"></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

  <title>Gallery</title>
</head>

<body>
  <?php include './layouts/navbar.php'; ?>


  <div class="container">
    <div class="d-flex flex-row align-items-center">
      <h1>Gallery</h1>
      <form action="#" method="POST" enctype="multipart/form-data">
        <div class="mx-2">
          <i onclick="openInput('open')" style="color:#0a0;font-size:20px" class="fas fa-plus"></i>
          <input id="open" style="display:none" onchange="submitInput('submit')" name="file" type="file">
          <input name="changeImageId" id="changeImage" style="display:none" type="text" value="">
          <input name="submit" id="submit" style="display:none" type="submit">

        </div>
      </form>

    </div>
  </div>
  </div>
  </div>
  <div class="d-flex flex-wrap flex-row justify-content-space-around align-items-center">
    <?php
    while ($row = mysqli_fetch_assoc($workGallery)) {
    ?>
      <div class="rounded p-2">

        <img src=<?= "./uploaded/" . $row['media_url']; ?> alt="" style="height:150px;width:200px;object-fit:cover" />

        <div class="d-flex w-100 flex-row justify-content-around" style="height:50px; background:#0005; position:relative; top:-50px">

          <a href="WorkGallery.php?delete=<?= $row['work_id'] ?>&edit=<?= $row['media_url'] ?>"><i style="color:#ddd;font-size:20px" class="fa fa-trash"></i></a>

          <form action="#" method="POST" enctype="multipart/form-data">
            <i onclick="openInput('open<?= $row['work_id'] ?>')" style="color:#ddd;font-size:20px" class="far fa-edit"></i>
            <input name="nextImage" id="open<?= $row['work_id'] ?>" onchange="submitInput('submit<?= $row['work_id'] ?>')" style="display:none" type="file">
            <input name="changeImageId" id="changeImage<?= $row['work_id'] ?>" style="display:none" type="text" value="<?= $row['work_id'] ?>">
            <input name="edit" id="submit<?= $row['work_id'] ?>" value="<?= $row['media_url'] ?>" style="display:none" type="submit">
          </form>
        </div>
      </div>
    <?php

    }
    ?>

  </div>



  </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>


  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
  <script>
    function openInput(a) {
      document.getElementById(a).click()
    }

    function submitInput(a) {
      document.getElementById(a).click()
    }
    // 
  </script>
  <!-- <script src="https://kit.fontawesome.com/1dc8fa370c.js" crossorigin="anonymous"></script> -->
</body>

</html>