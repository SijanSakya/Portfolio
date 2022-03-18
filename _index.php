<?php
  include './php/config/autoload.php';

//create user object
$user = new user("","rahuls","rahulpasss");
//create all other 

$designation1 = new designation(" ","Sijan","65",1);
$edu1 = new education("2010","222","inst","board22",12);
$exp =new experience("","companyname","jobtitle","desc....","2019","2021",12);
$lang1=new language("","english","50","1");
$loc1 = new location("","Pulchowk","Nepal","123-123-214","212-2-2-4");
$pro1 = new profile("","Sijan","Shakya","2000/11/22","profile_pic_url","cover_image_url","SijanShakya sadoas....","12","1","fblink.com","insta.com","youtube.com",986934342344354);
$work1 = new work("","video","media.cc/wedas","Designer","12");

//create user
$user->create_user();
echo "<hr>";
print_r($user);
echo "<hr>";

//create entry of all other object
$user->create_education($edu1);
$user->create_designation($designation1);
$user->create_experience($exp);
$user->create_language($lang1);
$user->create_location($loc1);
$user->create_profile($pro1);
$user->create_work($work1);
//create all objects




?>