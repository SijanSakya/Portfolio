<?php
class experience
{

    public $experience_id;
    public $company_name;
    public $job_title;
    public $job_description;
    public $start_date;
    public $end_date;
    public $user_id;

    public function __construct($experience_id = "", $company_name = "", $job_title = "", $job_description = "", $start_date = "", $end_date = "", $user_id = "")
    {


        $this->experience_id = mysqli_real_escape_string($GLOBALS['conn'], $experience_id);
        $this->company_name = mysqli_real_escape_string($GLOBALS['conn'], $company_name);
        $this->job_title = mysqli_real_escape_string($GLOBALS['conn'], $job_title);
        $this->job_description = mysqli_real_escape_string($GLOBALS['conn'], $job_description);
        $this->start_date = mysqli_real_escape_string($GLOBALS['conn'], $start_date);
        $this->end_date = mysqli_real_escape_string($GLOBALS['conn'], $end_date);
        $this->user_id = mysqli_real_escape_string($GLOBALS['conn'], $user_id);
    }
    public function toString()
    {
        return "experience[experience_id = " . $this->experience_id . ",company_name=" . $this->company_name . "]";
    }
}
