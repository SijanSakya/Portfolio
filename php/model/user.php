<?php
class user
{

	public $user_id;
	public $username;
	public $password;



	public function __construct($user_id = "", $username = "", $password = "")
	{

		$this->user_id = mysqli_real_escape_string($GLOBALS['conn'], $user_id);
		$this->username = mysqli_real_escape_string($GLOBALS['conn'], $username);
		$this->password = mysqli_real_escape_string($GLOBALS['conn'], $password);
	}

	public function toString()
	{
		return "user[user_id = " . $this->user_id . ",username=" . $this->username . "]";
	}

	//user
	public function create_user()
	{
		//if username password use gareyra user create vakoxa vane set this userid with the id present in db else only create new user
		//select statement where username password
		// if mysqli_num_cols true mysqli_fetch_assoc $row fetch id
		// this->userid = id
		if (isset($this->username) && isset($this->password)) {
			// $sql="SELECT * FROM `user` where user_id=$this->user_id";
			$sql = "SELECT * FROM `user` WHERE username='$this->username' AND password = '$this->password'";
		}
		$result = mysqli_query($GLOBALS['conn'], $sql);

		if (!$result) {
			echo "Error" . mysqli_error($GLOBALS['conn']) . "<br>";
		} else {
			//$this->user_id = database ma entry vako id rakhne 
			$row = mysqli_num_rows($result);
			if ($row == 1) {
				//this->user_id = user_id;
				//  username = $username;
				//	password= $password;
				$row = mysqli_fetch_assoc($result);
				$this->user_id = $row['user_id'];
			} else {
				$sql = "INSERT INTO `user`( `username`, `password`) VALUES ( '$this->username', '$this->password')";

				$result = mysqli_query($GLOBALS['conn'], $sql);

				if ($result) {


					$this->user_id = mysqli_insert_id($GLOBALS['conn']);
				} else {
					echo "ERror inserting the value";
				}
			}
		}

		//return the user
		return $this;
	}

	public function read_user()
	{
		// username, password
		$sql = "SELECT * FROM `user` WHERE `username` = '$this->username' AND `password` = '$this->password'";
		$result = mysqli_query($GLOBALS['conn'], $sql);
		$row = mysqli_num_rows($result);
		if ($row == 1) {
			//this->user_id = user_id;
			//  username = $username;
			//	password= $password;
			$row = mysqli_fetch_assoc($result);
			$this->user_id = $row['user_id'];
			return $result;
		} else {
			echo 'Not found';
			die;
		}
	}



	public function update_user()
	{
		$sql = "UPDATE `user`
	SET `username` = '$this->username', `password` = '$this->password' WHERE `user_id` = '$this->user_id'";
		$result = mysqli_query($GLOBALS['conn'], $sql);
		if (!$result) {
			echo "Error" . mysqli_error($GLOBALS['conn']) . "<br>";
		}
	}
	public function delete_user()
	{
		$sql = "DELETE FROM `user` WHERE `user_id` = '$this->user_id '";
		$result = mysqli_query($GLOBALS['conn'], $sql);
		if (!$result) {
			echo "Error" . mysqli_error($GLOBALS['conn']) . "<br>";
		}
	}



	//designation

	public function create_designation($objdes)
	{
		$sql = "INSERT INTO `designation` (`designation_icon`,`designation_name`,`designation_desc`,`completed_percentage`,`user_id`) VALUES ( '$objdes->designation_icon','$objdes->designation_name','$objdes->designation_desc','$objdes->completed_percentage','$this->user_id')";
		echo $sql;
		$result = mysqli_query($GLOBALS['conn'], $sql);
		if (!$result) {
			echo "Error" . mysqli_error($GLOBALS['conn']) . "<br>";
			return false;
		}
		return true;
	}
	public function read_designation()
	{

		$sql = "SELECT * FROM `designation` WHERE `user_id` = $this->user_id";
		$result = mysqli_query($GLOBALS['conn'], $sql);


		return $result;
	}

	public function update_designation($objdes)
	{
		$sql = "UPDATE `designation`
	SET `designation_icon` = '$objdes->designation_icon',`designation_name` = '$objdes->designation_name',`designation_desc` = '$objdes->designation_desc', `completed_percentage` = '$objdes->completed_percentage',`user_id` = '$this->user_id' WHERE `designation_id` = '$objdes->designation_id'";

		$result = mysqli_query($GLOBALS['conn'], $sql);
		if (!$result) {
			echo "Error" . mysqli_error($GLOBALS['conn']) . "<br>";
			return false;
		}
		return true;
	}
	public function delete_designation($id)
	{
		$sql = "DELETE FROM `designation` WHERE `designation_id` = '$id '";
		echo $sql;
		$result = mysqli_query($GLOBALS['conn'], $sql);
		if (!$result) {

			echo "Error" . mysqli_error($GLOBALS['conn']) . "<br>";
			return false;
		}
		return true;
	}

	// education

	public function create_education($objedu)
	{
		$sql = "INSERT INTO `education`( `start_date`, `end_date`, `institution`, `board`, `program`, `user_id`) VALUES ( '$objedu->start_date',' $objedu->end_date', '$objedu->institution', '$objedu->board', '$objedu->program', '$this->user_id')";
		echo $sql;

		$result = mysqli_query($GLOBALS['conn'], $sql);
		if (!$result) {

			echo "Error" . mysqli_error($GLOBALS['conn']) . "<br>";
			return false;
		}
		return true;
	}
	public function read_education()
	{

		$sql = "SELECT * FROM `education` where `user_id` = $this->user_id";

		$result = mysqli_query($GLOBALS['conn'], $sql);
		return $result;
	}
	public function update_education($objedu)
	{
		$sql = "UPDATE `education`
	SET `start_date` = '$objedu->start_date', `end_date` = '$objedu->end_date', `institution` = '$objedu->institution',`board` = '$objedu->board',`program` ='$objedu->program',`user_id` ='$this->user_id' WHERE `education_id` = '$objedu->education_id' ";
		$result = mysqli_query($GLOBALS['conn'], $sql);
		if (!$result) {
			echo "Error" . mysqli_error($GLOBALS['conn']) . "<br>";
			return false;
		}
		return true;
	}
	public function delete_education($id)
	{
		$sql = "DELETE FROM `education` WHERE `education_id` ='$id' ";
		$result = mysqli_query($GLOBALS['conn'], $sql);
		if (!$result) {
			return false;
			echo "Error" . mysqli_error($GLOBALS['conn']) . "<br>";
		}
		return true;
	}

	// experience

	public function create_experience($objexp)
	{
		$sql = "INSERT INTO `experience`( `company_name`, `job_title`, `job_description`, `start_date`, `end_date`, `user_id`) VALUES ('$objexp->company_name', '$objexp->job_title','$objexp->job_description', '$objexp->start_date',' $objexp->end_date', '$this->user_id')";
		$result = mysqli_query($GLOBALS['conn'], $sql);
		if (!$result) {

			echo "Error" . mysqli_error($GLOBALS['conn']) . "<br>";
			return false;
		}
		return true;
	}

	public function read_experience()
	{

		$sql = "SELECT * FROM `experience`
		WHERE `user_id` = $this->user_id";
		$result = mysqli_query($GLOBALS['conn'], $sql);
		return $result;
	}
	public function update_experience($objexp)
	{
		$sql = "UPDATE `experience`
	 SET `company_name`='$objexp->company_name',`job_title`='$objexp->job_title',`job_description`='$objexp->job_description',`start_date`='$objexp->start_date',`end_date`='$objexp->end_date',`user_id`='$this->user_id' WHERE `experience_id` = '$objexp->experience_id'";
		$result = mysqli_query($GLOBALS['conn'], $sql);
		if (!$result) {
			echo "Error" . mysqli_error($GLOBALS['conn']) . "<br>";
			return false;
		}
		return true;
	}
	public function delete_experience($id)
	{
		$sql = "DELETE FROM `experience` WHERE `experience_id` ='$id' ";
		$result = mysqli_query($GLOBALS['conn'], $sql);
		if (!$result) {
			return false;
			echo "Error" . mysqli_error($GLOBALS['conn']) . "<br>";
		}
		return true;
	}
	//language
	public function create_language($objlang)
	{
		$sql = "INSERT INTO `language`( `language_name`, `completed_percentage`, `user_id`) VALUES ('$objlang->language_name','$objlang->completed_percentage' ,'$this->user_id')";
		$result = mysqli_query($GLOBALS['conn'], $sql);
		if (!$result) {
			echo "Error" . mysqli_error($GLOBALS['conn']) . "<br>";
			return false;
		}
		return true;
	}
	public function read_language()
	{

		$sql = "SELECT * FROM `language`
		WHERE `user_id` = $this->user_id";
		$result = mysqli_query($GLOBALS['conn'], $sql);
		return $result;
	}
	public function update_language($objlang)
	{
		$sql = "UPDATE `language`
	 SET `language_name`='$objlang->language_name',`completed_percentage`='$objlang->completed_percentage',`user_id`='$this->user_id' WHERE `language_id` = '$objlang->language_id'";
		echo $sql;
		$result = mysqli_query($GLOBALS['conn'], $sql);
		if (!$result) {
			echo "Error" . mysqli_error($GLOBALS['conn']) . "<br>";
			return false;
		}
		return true;
	}
	public function delete_language($id)
	{
		$sql = "DELETE FROM `language` WHERE `language_id` ='$id' ";
		$result = mysqli_query($GLOBALS['conn'], $sql);
		if (!$result) {
			echo "Error" . mysqli_error($GLOBALS['conn']) . "<br>";
			return false;
		}
		return true;
	}

	//location

	public function create_location($objloc)
	{
		$sql = "INSERT INTO `location`( `address`, `country`, `latitude`, `longitude`,`user_id`) VALUES ('$objloc->address', '$objloc->country', '$objloc->latitude', '$objloc->longitude', '$this->user_id')";

		$result = mysqli_query($GLOBALS['conn'], $sql);
		if (!$result) {
			echo "Error" . mysqli_error($GLOBALS['conn']) . "<br>";
			return false;
		}
		return true;
	}
	public function read_location()
	{

		$sql = "SELECT * FROM `location`
		WHERE `user_id` = $this->user_id";
		$result = mysqli_query($GLOBALS['conn'], $sql);
		return $result;
	}
	public function update_location($objloc)
	{
		$sql = "UPDATE `location`
	 SET `address`='$objloc->address',`country`='$objloc->country',`latitude`='$objloc->latitude',`longitude`='$objloc->longitude',`user_id`='$this->user_id' WHERE `location_id` = '$objloc->location_id'";
		$result = mysqli_query($GLOBALS['conn'], $sql);
		if (!$result) {
			echo "Error" . mysqli_error($GLOBALS['conn']) . "<br>";
			return false;
		}
		return true;
	}
	public function delete_location($id)
	{
		$sql = "DELETE FROM `location` WHERE `location_id` ='$id' ";
		$result = mysqli_query($GLOBALS['conn'], $sql);
		if (!$result) {
			echo "Error" . mysqli_error($GLOBALS['conn']) . "<br>";
			return false;
		}
		return true;
	}

	public function get_location()
	{
		$sql = "SELECT * FROM `location`  WHERE `location`.`user_id` =" . $this->user_id;
		$result = mysqli_query($GLOBALS['conn'], $sql);
		$num = mysqli_num_rows($result);
		if ($num == 0) {
			return false;
		} else {
			$row = mysqli_fetch_assoc($result);
			return $row;
		}
	}


	//profile
	public function create_profile($objprofile)
	{
		$sql = "INSERT INTO `profile`( `fname`, `lname`, `dob`,`email_address`, `profile_pic_url`, `cover_image_url`, `bio`, `user_id`, `fb_link`, `insta_link`, `youtube_link`, `phone_no`,`cv_download`) VALUES ( '$objprofile->fname', '$objprofile->lname', '$objprofile->dob', '$objprofile->email_address', '$objprofile->profile_pic_url', '$objprofile->cover_image_url', '$objprofile->bio', '$this->user_id', '$objprofile->fb_link', '$objprofile->insta_link', '$objprofile->youtube_link', '$objprofile->phone_no','$objprofile->cv_download')";
		$result = mysqli_query($GLOBALS['conn'], $sql);
		if (!$result) {
			echo "Error" . mysqli_error($GLOBALS['conn']) . "<br>";
			return false;
		}
		return true;
	}
	public function read_profile()
	{

		$sql = "SELECT * FROM `profile`
		WHERE `user_id` = $this->user_id";
		$result = mysqli_query($GLOBALS['conn'], $sql);
		return $result;
	}
	public function update_profile($objprofile)
	{
		$sql = "UPDATE `profile`
	  SET `fname`='$objprofile->fname',`lname`='$objprofile->lname',
		`dob`='$objprofile->dob',
		`email_address`='$objprofile->email_address',
		`profile_pic_url`='$objprofile->profile_pic_url',
		`cover_image_url`='$objprofile->cover_image_url',
		`bio`='$objprofile->bio',
		`user_id`='$this->user_id',
		`fb_link`='$objprofile->fb_link',
		`insta_link`='$objprofile->insta_link',
		`youtube_link`='$objprofile->youtube_link',
		`phone_no`='$objprofile->phone_no',
		`cv_download`='$objprofile->cv_download' 
	  WHERE `profile_id` = '$objprofile->profile_id' ";
		$result = mysqli_query($GLOBALS['conn'], $sql);
		if (!$result) {
			echo "Error" . mysqli_error($GLOBALS['conn']) . "<br>";
			return false;
		}
		return true;
	}

	public function get_Profile()
	{
		$sql = "SELECT * FROM `profile`  WHERE `profile`.`user_id` =" . $this->user_id;
		$result = mysqli_query($GLOBALS['conn'], $sql);
		$num = mysqli_num_rows($result);
		if ($num == 0) {
			return false;
		} else {
			$row = mysqli_fetch_assoc($result);
			return $row;
		}
	}

	public function delete_profile($id)
	{
		$sql = "DELETE FROM `profile` WHERE `profile_id` ='$id' ";
		$result = mysqli_query($GLOBALS['conn'], $sql);
		if (!$result) {
			echo "Error" . mysqli_error($GLOBALS['conn']) . "<br>";
			return false;
		}
		return true;
	}

	//work
	public function create_work($objwork)
	{
		$sql = "INSERT INTO `work`( `media_type`, `media_url`, `catagory_name`, `user_id`) VALUES ('$objwork->media_type', '$objwork->media_url', '$objwork->catagory_name', '$this->user_id')";
		$result = mysqli_query($GLOBALS['conn'], $sql);
		if (!$result) {
			echo "Error" . mysqli_error($GLOBALS['conn']) . "<br>";
			return false;
		}
		return true;
	}
	public function read_work()
	{

		$sql = "SELECT * FROM `work`
		WHERE `user_id` = $this->user_id";
		$result = mysqli_query($GLOBALS['conn'], $sql);
		return $result;
	}
	public function update_work($objwork)
	{
		$sql = "UPDATE `work`
	 SET `media_type`='$objwork->media_type',`media_url`='$objwork->media_url',`catagory_name`='$objwork->catagory_name',`user_id`='$objwork->user_id' WHERE `work_id` = '$objwork->work_id'";
		$result = mysqli_query($GLOBALS['conn'], $sql);
		if (!$result) {
			echo "Error" . mysqli_error($GLOBALS['conn']) . "<br>";
			return false;
		}
		return true;
	}
	public function delete_work($id)
	{
		$sql = "DELETE FROM `work` WHERE `work_id` ='$id' ";
		$result = mysqli_query($GLOBALS['conn'], $sql);
		if (!$result) {
			echo "Error" . mysqli_error($GLOBALS['conn']) . "<br>";
			return false;
		}
		return true;
	}
}
