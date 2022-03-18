<?php
class education
{

    public $education_id;
    public $start_date;
    public $end_date;
    public $institution;
    public $board;
    public $program;
    public $user_id;

    public function __construct($education_id = "", $start_date = "", $end_date = "", $institution = "", $board = "", $program = "", $user_id = "")
    {


        $this->education_id = mysqli_real_escape_string($GLOBALS['conn'], $education_id);
        $this->start_date = mysqli_real_escape_string($GLOBALS['conn'], $start_date);
        $this->end_date = mysqli_real_escape_string($GLOBALS['conn'], $end_date);
        $this->institution = mysqli_real_escape_string($GLOBALS['conn'], $institution);
        $this->board = mysqli_real_escape_string($GLOBALS['conn'], $board);
        $this->program = mysqli_real_escape_string($GLOBALS['conn'], $program);
        $this->user_id = mysqli_real_escape_string($GLOBALS['conn'], $user_id);
    }

    public function toString()
    {
        return "education[education_id = " . $this->education_id . ",institution=" . $this->institution . "]";
    }
}
