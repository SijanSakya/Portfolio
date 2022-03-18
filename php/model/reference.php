$profileRow = $user->getProfile();
if($profileRow){
        // print_r($profileRow);
        $profile = new profile($profileRow['profile_id'],$profileRow['fname'],$profileRow['lname'],$profileRow['dob'],$profileRow['profile_pic_url'],$profileRow['cover_image_url'],$profileRow['bio'],$profileRow['user_id'],$profileRow['fb_link'],$profileRow['insta_link'],$profileRow['youtube_link'],$profileRow['phone_no']);
        if(isset($submit)){
                $profile->fname = $fname;
                $profile->lname = $lname;
                $profile->dob = $dob;
                $profile->profile_pic_url = $profile_pic_url;
                $profile->cover_image_url = $cover_image_url;
                $profile->bio = $bio;
                $profile->fb_link = $fb_link;
                $profile->insta_link = $insta_link;
                $profile->youtube_link = $youtube_link;
                $profile->phone_no = $phone_no;
                $result = $user->update_profile($profile);
                if($result){
                        echo "Your profile is successfully updated";
                }
        }
}else{
        $profile = new profile();
        if(isset($submit)){
                $profile->fname = $fname;
                $profile->lname = $lname;
                $profile->dob = $dob;
                $profile->profile_pic_url = $profile_pic_url;
                $profile->cover_image_url = $cover_image_url;
                $profile->bio = $bio;
                $profile->fb_link = $fb_link;
                $profile->insta_link = $insta_link;
                $profile->youtube_link = $youtube_link;
                $profile->phone_no = $phone_no;
                $result = $user->create_profile($profile);
                if($result){
                        echo "Your profile is successfully updated";
                }
        }
}



public function getProfile(){
	$sql = "SELECT * FROM `profile`  WHERE `profile`.`user_id` =".$this->user_id;
		$result = mysqli_query($GLOBALS['conn'],$sql);
		$num = mysqli_num_rows($result);
		if($num == 0){
			return false;
		}else{
			$row= mysqli_fetch_assoc($result);
			return $row;
		}
}