<?php

//connection variable
define("HOST", "localhost");
define("USER", "root");
define("PASS", "");
define("DATA", "portfolio");

$conn = mysqli_connect(HOST,USER,PASS,DATA);
if(!$conn){
	echo "error on database";
	die;
}else{
	//echo "Success in connection database";
}
