<?php
session_start();
include './php/config/db.php';
include './php/model/designation.php';
include './php/model/education.php';
include './php/model/experience.php';
include './php/model/language.php';
include './php/model/location.php';
include './php/model/profile.php';
include './php/model/work.php';
include './php/model/user.php';


if(isset($_SESSION['user_id'])){
    $user = new User($_SESSION['user_id'],$_SESSION['username'],$_SESSION['password']);
}else{
    // echo "<pre>";
    // print_r($_SERVER);
    if($_SERVER['REQUEST_URI'] == "/portfolio/Loginform.php" || $_SERVER['REQUEST_URI'] == "/portfolio/Createuser.php"|| $_SERVER['REQUEST_URI'] == "/portfolio/index.php" ){
        
    }else{
        header("Location: Loginform.php");
    }
}
?>