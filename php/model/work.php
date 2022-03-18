<?php
class work{

public $work_id;
public $media_type; 
public $media_url; 
public $catagory_name; 
public $user_id; 

public function __construct($work_id="",$media_type="",$media_url="",$catagory_name="",$user_id=""){
  
   
    $this->work_id= mysqli_real_escape_string($GLOBALS['conn'],$work_id);
    $this->media_type= mysqli_real_escape_string($GLOBALS['conn'],$media_type);
    $this->media_url= mysqli_real_escape_string($GLOBALS['conn'],$media_url);
    $this->catagory_name= mysqli_real_escape_string($GLOBALS['conn'],$catagory_name);
    $this->user_id= mysqli_real_escape_string($GLOBALS['conn'],$user_id);
}
public function toString(){
   // $jsonArry = json_decode(file_get_contents(URI."/api/room/"),true);

    return "work[work_id = ".$this->work_id.",media_type=".$this->media_type."]";
   
	}	
}
