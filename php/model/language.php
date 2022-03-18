<?php
class language
{

    public $language_id;
    public $language_name;
    public $completed_percentage;
    public $user_id;


    public function __construct($language_id = "", $language_name = "", $completed_percentage = "", $user_id = "")
    {


        $this->language_id = mysqli_real_escape_string($GLOBALS['conn'], $language_id);
        $this->language_name = mysqli_real_escape_string($GLOBALS['conn'], $language_name);
        $this->completed_percentage = mysqli_real_escape_string($GLOBALS['conn'], $completed_percentage);
        $this->user_id = mysqli_real_escape_string($GLOBALS['conn'], $user_id);
    }
    public function toString()
    {
        return "language[language_id ='" . $this->language_id . "',language_name=" . $this->language_name . "]";
    }
}
