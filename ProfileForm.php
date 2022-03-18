<?php include './php/config/autoload.php';
extract($_POST);
extract($_FILES);
$profileData = $user->get_Profile();
if ($profileData) {

        $profile = new profile(
                $profileData['profile_id'],
                $profileData['fname'],
                $profileData['lname'],
                $profileData['dob'],
                $profileData['email_address'],
                $profileData['profile_pic_url'],
                $profileData['cover_image_url'],
                $profileData['bio'],
                $profileData['user_id'],
                $profileData['fb_link'],
                $profileData['insta_link'],
                $profileData['youtube_link'],
                $profileData['phone_no'],
                null
        );

        if (isset($submit)) {

                $filename = $cv_download['name'];

                $arr = explode(".", $filename);
                $ext = array_pop($arr);
                $time =  time();
                $filepath = $cv_download['tmp_name'];
                $fileerror = $cv_download['error'];
                if ($fileerror == 0) {
                        $destfile = 'uploaded/' . $time . '.' . $ext;
                        $result =  move_uploaded_file($filepath, $destfile);
                        if ($result) {
                                // $cv = new profile();
                                $profile = $profile->setCVDownload($destfile);
                                $user = $user->update_profile($profile);

                                if ($user) {
                                        header("Location: ./ProfileForm.php");
                                } else {
                                        unset($destfile);
                                }
                        } else {
                                echo "error";
                        }
                }

                $profile->fname = $fname;
                $profile->lname = $lname;
                $profile->dob = $dob;
                $profile->email_address = $email_address;
                $profile->profile_pic_url = $profile_pic_url;
                $profile->cover_image_url = $cover_image_url;

                $profile->bio = $bio;
                $profile->fb_link = $fb_link;
                $profile->insta_link = $insta_link;
                $profile->youtube_link = $youtube_link;
                $profile->phone_no = $phone_no;
                $profile->cv_download = null;
                $result = $user->update_profile($profile);
                if ($result) {
                        echo "Your profile is updated";
                }
        }
} else {
        $profile = new profile();
        if (isset($submit)) {


                $profile->fname = $fname;
                $profile->lname = $lname;
                $profile->dob = $dob;
                $profile->email_address = $email_address;
                $profile->profile_pic_url = $profile_pic_url;
                $profile->cover_image_url = $cover_image_url;

                $profile->bio = $bio;
                $profile->fb_link = $fb_link;
                $profile->insta_link = $insta_link;
                $profile->youtube_link = $youtube_link;
                $profile->phone_no = $phone_no;
                $profile->cv_download = $cv_download;

                $result = $user->create_profile($profile);
                if ($result) {
                        echo "Your profile is created";
                }
        }
}




?>
<!doctype html>
<html lang="en">

<head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

        <title>Profile Form</title>
</head>

<body>
        <?php include './layouts/navbar.php'; ?>
        <div class="container mt-5">
                <form method="POST" action="#" enctype="multipart/form-data">
                        <div class="row justify-content-center">
                                <div class="col-md-8">
                                        <div class="card ">
                                                <div class="card-header pt-2">

                                                        <h1>Profile Form</h1>


                                                        <div class="form-group">

                                                                <input type="text" class="form-control" name="fname" value="<?= $profile->fname ?>" placeholder="first name"><br>

                                                        </div>
                                                        <div class="form-group">

                                                                <input type="text" class="form-control" name="lname" value="<?= $profile->lname ?>" placeholder="last name"><br>

                                                        </div>
                                                        <div class="form-group">

                                                                <input type="text" class="form-control" name="dob" value="<?= $profile->dob ?>" placeholder="dob"><br>

                                                        </div>
                                                        <div class="form-group">

                                                                <input type="text" class="form-control" name="email_address" value="<?= $profile->email_address ?>" placeholder="Email Address"><br>

                                                        </div>
                                                        <div class="form-group">

                                                                <input type="text" class="form-control" name="profile_pic_url" value="<?= $profile->profile_pic_url ?>" placeholder="profile_pic_url"><br>

                                                        </div>
                                                        <div class="form-group">

                                                                <input type="text" class="form-control" name="cover_image_url" value="<?= $profile->cover_image_url ?>" placeholder="cover_image_url"><br>

                                                        </div>
                                                        <div class="form-group">

                                                                <input type="text" class="form-control" name="bio" value="<?= $profile->bio ?>" placeholder="bio"><br>

                                                        </div>
                                                        <div class="form-group">

                                                                <input type="text" class="form-control" name="fb_link" value="<?= $profile->fb_link ?>" placeholder="fb link"><br>

                                                        </div>
                                                        <div class="form-group">

                                                                <input type="text" class="form-control" name="insta_link" value="<?= $profile->insta_link ?>" placeholder="Insta link"><br>

                                                        </div>
                                                        <div class="form-group">

                                                                <input type="text" class="form-control" name="youtube_link" value="<?= $profile->youtube_link ?>" placeholder="Youtube link"><br>

                                                        </div>
                                                        <div class="form-group">

                                                                <input type="text" class="form-control" name="phone_no" value="<?= $profile->phone_no ?>" placeholder="phone_no"><br>

                                                        </div>
                                                        <div class="form-group">
                                                                <span>Cv</span>
                                                                <input type="file" class="form-control" name="cv_download" value="<?= $profile->cv_download ?>" placeholder="cv_download"><br>
                                                                <a href="./uploaded/<?= $profile->cv_download ?>" download="<?= $profile->cv_download ?>" alt="" width="104" height="142"></a>

                                                        </div>



                                                        <input value="update" type="submit" class="btn btn-primary" name="submit"></input>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </form>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>


        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>

</body>

</html>