<?php
class location
{

    public $location_id;
    public $address;
    public $country;
    public $latitude;
    public $longitude;

    public function __construct($location_id = "", $address = "", $country = "", $latitude = "", $longitude = "", $user_id = "")
    {


        $this->location_id = mysqli_real_escape_string($GLOBALS['conn'], $location_id);
        $this->address = mysqli_real_escape_string($GLOBALS['conn'], $address);
        $this->country = mysqli_real_escape_string($GLOBALS['conn'], $country);
        $this->latitude = mysqli_real_escape_string($GLOBALS['conn'], $latitude);
        $this->longitude = mysqli_real_escape_string($GLOBALS['conn'], $longitude);
        $this->user_id = mysqli_real_escape_string($GLOBALS['conn'], $user_id);
    }

    public function toString()
    {
        return "location[location_id = " . $this->location_id . ",address=" . $this->address . "]";
    }
}
