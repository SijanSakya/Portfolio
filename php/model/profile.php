<?php
class profile
{

    public $profile_id;
    public $fname;
    public $lname;
    public $dob;
    public $profile_pic_url;
    public $cover_image_url;
    public $bio;
    public $user_id;
    public $fb_link;
    public $insta_link;
    public $youtube_link;
    public $phone_no;
    public $cv_download;


    public function __construct($profile_id = "", $fname = "", $lname = "", $dob = "", $email_address = "", $profile_pic_url = "", $cover_image_url = "", $bio = "", $user_id = "", $fb_link = "", $insta_link = "", $youtube_link = "", $phone_no = "", $cv_download = "")
    {

        $this->profile_id = mysqli_real_escape_string($GLOBALS['conn'], $profile_id);
        $this->fname = mysqli_real_escape_string($GLOBALS['conn'], $fname);
        $this->lname = mysqli_real_escape_string($GLOBALS['conn'], $lname);
        $this->dob = mysqli_real_escape_string($GLOBALS['conn'], $dob);
        $this->email_address = mysqli_real_escape_string($GLOBALS['conn'], $email_address);
        $this->profile_pic_url = mysqli_real_escape_string($GLOBALS['conn'], $profile_pic_url);
        $this->cover_image_url = mysqli_real_escape_string($GLOBALS['conn'], $cover_image_url);
        $this->bio = mysqli_real_escape_string($GLOBALS['conn'], $bio);
        $this->userid = mysqli_real_escape_string($GLOBALS['conn'], $user_id);
        $this->fb_link = mysqli_real_escape_string($GLOBALS['conn'], $fb_link);
        $this->insta_link = mysqli_real_escape_string($GLOBALS['conn'], $insta_link);
        $this->youtube_link = mysqli_real_escape_string($GLOBALS['conn'], $youtube_link);
        $this->phone_no = mysqli_real_escape_string($GLOBALS['conn'], $phone_no);
        $this->cv_download = mysqli_real_escape_string($GLOBALS['conn'], $cv_download);
    }
    public function toString()
    {
        return "profile[profile_id = " . $this->profile_id . ",fname=" . $this->fname . "]";
    }

    public function setCVDownload($cv_download)
    {
        $this->cv_download = mysqli_real_escape_string($GLOBALS['conn'], $cv_download);
        return $this;
    }
}
