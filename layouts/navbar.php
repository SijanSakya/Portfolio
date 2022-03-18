
<?php
extract($_POST);

if(isset($logout)){

session_unset();
session_destroy();
header("location:Loginform.php");
}
?>



<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="./Menu.php">Menu</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./Designationform.php">Designation</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./Educationform.php">Education</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./Experienceform.php">Experience</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./Languageform.php">Language</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./Locationform.php">Location</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="./Profileform.php">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./workGallery.php">Works</a>
        </li>
      </ul>
      <form class="form-inline" method="POST">
        <input value="Logout" type="submit" class="btn btn-primary" name="logout"></input>
    
  </form>

    </div>
  </div>
</nav>