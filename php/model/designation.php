<?php
class designation
{

    public $designation_id;
    public $designation_icon;
    public $designation_name;
    public $designation_desc;
    public $completed_percentage;
    public $user_id;


    public function __construct($designation_id = "", $designation_icon = "", $designation_name = "", $designation_desc = "", $completed_percentage = "", $user_id = "")
    {


        $this->designation_id = mysqli_real_escape_string($GLOBALS['conn'], $designation_id);
        $this->designation_icon = mysqli_real_escape_string($GLOBALS['conn'], $designation_icon);
        $this->designation_name = mysqli_real_escape_string($GLOBALS['conn'], $designation_name);
        $this->designation_desc = mysqli_real_escape_string($GLOBALS['conn'], $designation_desc);
        $this->completed_percentage = mysqli_real_escape_string($GLOBALS['conn'], $completed_percentage);
        $this->user_id = mysqli_real_escape_string($GLOBALS['conn'], $user_id);
    }
    public function toString()
    {
        return "designation[designation_id = " . $this->designation_id . ",designation_name=" . $this->designation_name . "]";
    }
}
