<?php
include './php/config/autoload.php';
$user = new user("", $_SESSION['username'], $_SESSION['password']);
$user->create_user();
print_r($user);

$educationResult = $user->read_education();

$designationResult = $user->read_designation();

$experienceResult = $user->read_experience();

$profileResult = $user->read_profile();
$profileRow = mysqli_fetch_assoc($profileResult);

$languageResult = $user->read_language();

$locationResult = $user->read_location();
$locationRow = mysqli_fetch_assoc($locationResult);

$workResult = $user->read_work();

?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from bslthemes.com/ryan/demo/index-new-demo-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Feb 2021 15:17:53 GMT -->

<head>

	<!--
		Basic
	-->
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?= $profileRow['fname'] ?>-Portfolio</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<meta name="description" content="vCard & Resume Template" />
	<meta name="keywords" content="vcard, resposnive, resume, personal, card, cv, cards, portfolio" />
	<meta name="author" content="beshleyua" />

	<!--
		Load Fonts
	-->
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!--
		Load CSS
	-->
	<link rel="stylesheet" href="css/basic.css" />
	<link rel="stylesheet" href="css/layout.css" />
	<link rel="stylesheet" href="css/blogs.css" />
	<link rel="stylesheet" href="css/ionicons.css" />
	<link rel="stylesheet" href="css/magnific-popup.css" />
	<link rel="stylesheet" href="css/animate.css" />
	<link rel="stylesheet" href="css/owl.carousel.css" />

	<!--
		Background Gradient
	-->
	<link rel="stylesheet" href="css/gradient.css" />

	<!--
		Template New-Skin
	-->
	<link rel="stylesheet" href="css/new-skin/new-skin.css" />

	<!--
		Template RTL
	-->
	<!--<link rel="stylesheet" href="css/rtl.css" />-->

	<!--
		Template Colors
	-->
	<link rel="stylesheet" href="../bslthemes.com/ryan/demo/css/demos/demo-2-colors.css" />
	<link rel="stylesheet" href="../bslthemes.com/ryan/demo/css/template-dark/dark.css" />
	<!-- <link rel="stylesheet" href="css/demos/demo-1-colors.css" /> -->
	<!--<link rel="stylesheet" href="css/template-colors/blue.css" />-->
	<!--<link rel="stylesheet" href="css/template-colors/orange.css" />-->
	<!--<link rel="stylesheet" href="css/template-colors/pink.css" />-->
	<!--<link rel="stylesheet" href="css/template-colors/purple.css" />-->
	<!--<link rel="stylesheet" href="css/template-colors/red.css" />-->

	<!--
		Template Dark
	-->
	<!--<link rel="stylesheet" href="css/template-dark/dark.css" />-->


	<!--[if lt IE 9]>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!--
		Favicons
	-->
	<link rel="shortcut icon" href="images/favicons/favicon.ico">

</head>

<body>
	<div class="page new-skin">

		<!-- preloader
		<div class="preloader">
			<div class="centrize full-width">
				<div class="vertical-center">
					<div class="spinner">
						<div class="double-bounce1"></div>
						<div class="double-bounce2"></div>
					</div>
				</div>
			</div>
		</div> -->

		<!-- background -->
		<div class="background gradient">
			<ul class="bg-bubbles">
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
			</ul>
		</div>

		<!--
			Container
		-->
		<div class="container opened" data-animation-in="fadeInLeft" data-animation-out="fadeOutLeft">

			<!--
				Header
			-->
			<header class="header">

				<!-- header profile -->
				<div class="profile">
					<div class="title"><?= $profileRow['fname'] . " " . $profileRow['lname'] ?></div>
					<div class="subtitle subtitle-typed">
						<div class="typing-title">
							<!-- $experienceResult = $user->read_experience(); -->
							<p><?= $exprow['job_description'] ?></p>

						</div>
					</div>
				</div>

				<!-- menu btn
				<a href="#" class="menu-btn"><span></span></a>

				<!-- menu -->
				<div class="top-menu">
					<ul> -->
						<li class="active">
							<a href="#about-card">
								<span class="icon ion-person"></span>
								<span class="link">About</span>
							</a>
						</li>
						<li>
							<a href="#resume-card">
								<span class="icon ion-android-list"></span>
								<span class="link">Resume</span>
							</a>
						</li>
						<li>
							<a href="#works-card">
								<span class="icon ion-paintbrush"></span>
								<span class="link">Works</span>
							</a>
						</li>
						<li>
							<a href="#contacts-card">
								<span class="icon ion-at"></span>
								<span class="link">Contact</span>
							</a>
						</li>
					</ul>
				</div>

			</header>

			<!--
				Card - Started
			-->
			<div class="card-started" id="home-card">

				<!--
					Profile
				-->
				<div class="profile">


					<!-- profile image -->
					<div class="slide" style="background-image: url(<?= $profileRow['cover_image_url'] ?>);" alt="">
					</div>

					<div class="image">
						<img src="<?= $profileRow['profile_pic_url'] ?>" alt="" style=" border-radius: 50%; height:150px; width:150px;object-fit:cover">
					</div>




					<!-- profile titles -->
					<div class="title"><?= $profileRow['fname'] . " " . $profileRow['lname'] ?></div>
					<!--<div class="subtitle">Web Designer</div>-->
					<div class="subtitle subtitle-typed">
						<div class="typing-title">
							<?php
							while ($designationrow = mysqli_fetch_assoc($designationResult)) {
							?>

								<p><?= $designationrow['designation_name'] ?></p>
							<?php } ?>


						</div>
					</div>

					<!-- profile socials -->
					<div class="social">
						<a target="_blank" href="<?= $profileRow['insta_link'] ?>"><span class="fab fa-instagram"></span></a>
						<a target="_blank" href="<?= $profileRow['fb_link'] ?>"><span class="fab fa-facebook"></span></a>
						<a target="_blank" href="<?= $profileRow['youtube_link'] ?>"><span class="fab fa-youtube"></span></a>
					</div>

					<!-- profile buttons -->
					<div class="lnks">
						<a href="<?= $profileRow['cv_download'] ?>" download="<?= $profileRow['cv_download'] ?>" class="lnk ">
							<span class="file">Download </span>
						</a>
						<a href="#" class="lnk discover">
							<span class="text">Contact Me</span>
						</a>
					</div>

				</div>

			</div>

			<!-- 
				Card - About
			-->
			<div class="card-inner animated active" id="about-card">
				<div class="card-wrap">

					<!-- 
						About 
					-->
					<div class="content about">

						<!-- title -->
						<div class="title">About Me</div>

						<!-- content -->
						<div class="row">
							<div class="col col-d-6 col-t-6 col-m-12 border-line-v">
								<div class="text-box">
									<p>
										I am <?= $profileRow['fname'] . " " . $profileRow['lname'] ?>
										<?= $profileRow['bio']  ?>
									</p>
								</div>
							</div>
							<div class="col col-d-6 col-t-6 col-m-12 border-line-v">
								<div class="info-list">
									<ul>
										<li><strong>Date of Birth...</strong> <?= $profileRow['dob']  ?></li>
										<li><strong>Residence . . . . .</strong><?= $locationRow['country']  ?></li>
										<!-- <li><strong>Freelance . . . . .</strong> Available</li> -->
										<li><strong>Address . . . . .</strong><?= $locationRow['address']  ?></li>
									</ul>
								</div>
							</div>
							<div class="clear"></div>
						</div>

					</div>

					<!--
						Designation
					-->
					<div class="content services">

						<!-- title -->
						<div class="title">Designation</div>

						<!-- content -->
						<div class="row service-items border-line-v">


							<?php
							$designationResult = $user->read_designation();
							while ($designationrow = mysqli_fetch_assoc($designationResult)) {
							?>
								<!-- service item -->
								<div class="col col-d-6 col-t-6 col-m-12 border-line-h">
									<div class="service-item">
										<div class="icon">
											<span class="<?= $designationrow['designation_icon'] ?>"></span>
										</div>
										<div class="name">
											<span>
												<?= $designationrow['designation_name'] ?> </span>
										</div>
										<div class="desc">
											<div>
												<p><?= $designationrow['designation_desc'] ?></p>
											</div>
										</div>
									</div>

								</div>
							<?php
							}
							?>


						</div>
						<div class="clear"></div>

					</div>

				</div>
			</div>

			<!--
				Card - Resume
			-->
			<div class="card-inner" id="resume-card">
				<div class="card-wrap">

					<!--
						Resume
					-->
					<div class="content resume">

						<!-- title -->
						<div class="title">Resume</div>

						<!-- content -->
						<div class="row">

							<!-- experience -->
							<div class="col col-d-6 col-t-6 col-m-12 border-line-v">
								<div class="resume-title border-line-h">
									<div class="icon"><i class="fa fa-briefcase"></i></div>
									<div class="name">Experience</div>
								</div>
								<div class="resume-items">
									<?php
									while ($exprow = mysqli_fetch_assoc($experienceResult)) {
									?>

										<div class="resume-item border-line-h active">
											<div class="date"><?= $exprow['start_date'] ?></div>
											<div class="name"><?= $exprow['job_title'] ?></div>
											<div class="company"><?= $exprow['company_name'] ?></div>
											<p>
												<?= $exprow['job_description'] ?>
											</p>
										</div>

									<?php
									}
									?>


								</div>
							</div>

							<!-- education -->
							<div class="col col-d-6 col-t-6 col-m-12 border-line-v">
								<div class="resume-title border-line-h">
									<div class="icon"><i class="fa fa-university"></i></div>
									<div class="name">Education</div>
								</div>
								<div class="resume-items">
									<?php
									while ($edurow = mysqli_fetch_assoc($educationResult)) {
									?>
										<div class="resume-item border-line-h">
											<div class="date"><?= $edurow['start_date'] ?> - <?= $edurow['end_date'] ?></div>
											<div class="name"><?= $edurow['institution'] ?></div>
											<div class="company"><?= $edurow['board'] ?></div>
											<p>
												<?= $edurow['program'] ?>
											</p>
										</div>
									<?php
									} ?>

								</div>
							</div>

							<div class="clear"></div>
						</div>

					</div>

					<!--
						Skills
					-->
					<div class="content skills">


						<!-- content -->
						<div class="row">



							<!-- skill item -->
							<div class="col col-d-6 col-t-6 col-m-12 border-line-v">
								<div class="skills-list dotted">
									<div class="skill-title border-line-h">
										<div class="icon"><i class="fa fa-flag"></i></div>
										<div class="name">Languages</div>
									</div>
									<ul>
										<?php
										while ($languagerow = mysqli_fetch_assoc($languageResult)) {
										?>

											<li class="border-line-h">
												<div class="name"><?= $languagerow['language_name'] ?></div>
												<div class="progress">
													<div class="percentage" style="width:<?= $languagerow['completed_percentage'] ?>%;"></div>
												</div>
											</li>
										<?php
										}
										?>

									</ul>
								</div>
							</div>

							<div class="clear"></div>
						</div>

					</div>


				</div>
			</div>

			<!--
				Card - Works
			-->
			<div class="card-inner" id="works-card">
				<div class="card-wrap">

					<!--
						Works
					-->
					<div class="content works">

						<!-- title -->
						<div class="title">Recent Works</div>
						<!-- 
						<div class="filter-menu filter-button-group">
							<div class="f_btn active">
								<label><input type="radio" name="fl_radio" value="grid-item" />All</label>
							</div>
							<div class="f_btn">
								<label><input type="radio" name="fl_radio" value="photo" />Image</label>
							</div>
							<div class="f_btn">
								<label><input type="radio" name="fl_radio" value="gallery" />Gallery</label>
							</div>
							<div class="f_btn">
								<label><input type="radio" name="fl_radio" value="video" />Video</label>
							</div>
							<div class="f_btn">
								<label><input type="radio" name="fl_radio" value="music" />Music</label>
							</div>
							<div class="f_btn">
								<label><input type="radio" name="fl_radio" value="design" />Content</label>
							</div>
						</div> -->

						<!-- content -->
						<div class="row grid-items border-line-v">
							<?php while ($row = mysqli_fetch_assoc($workResult)) { ?>
								<!-- work item photo -->
								<div class="col col-d-6 col-t-6 col-m-12 grid-item photo border-line-h">
									<div class="box-item">
										<div class="image">
											<a href="./uploaded/<?= $row['media_url'] ?>" class="has-popup-image">
												<img src="./uploaded/<?= $row['media_url'] ?>" alt="" />
												<span class="info">
													<span class="ion ion-image"></span>
												</span>
											</a>
										</div>
									</div>
								</div>
							<?php } ?>

							<div class="clear"></div>
						</div>

					</div>

				</div>
			</div>


			<!--
				Card - Contacts
			-->
			<div class="card-inner contacts" id="contacts-card">
				<div class="card-wrap">

					<!--
						Conacts Info
					-->
					<div class="content contacts">

						<!-- title -->
						<div class="title">Get in Touch</div>

						<!-- content -->
						<div class="row">
							<iframe src="https://maps.google.com/maps?q=<?= $locationRow['latitude'] ?>,<?= $locationRow['longitude'] ?>&hl=es&z=14&amp;output=embed" width="600" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

							<div class="col col-d-12 col-t-12 col-m-12 border-line-v">
								<div class="info-list">
									<ul>
										<li><strong>Address . . . . .</strong><?= $locationRow['address'] ?></li>
										<li><strong>Email . . . . .</strong><?= $profileRow['email_address'] ?> </li>
										<li><strong>Phone . . . . .</strong><?= $profileRow['phone_no'] ?></li>
										<li><strong>Freelance . . . . .</strong> Available</li>
									</ul>
								</div>
							</div>
							<div class="clear"></div>
						</div>

					</div>


				</div>
			</div>

		</div>

		<div class="s_overlay"></div>
		<div class="content-sidebar">
			<div class="sidebar-wrap search-form">
				<aside id="secondary" class="widget-area">
					<section id="search-2" class="widget widget_search">
						<label>
							<span class="screen-reader-text">Search for:</span>
							<input type="search" class="search-field" placeholder="Search …" value="" name="s">
						</label>
						<input type="submit" class="search-submit" value="Search">
					</section>
					<section class="widget widget_recent_entries">
						<h2 class="widget-title">
							<span class="widget-title-span"><span class="first-word">Recent</span> Posts</span>
						</h2>
						<ul>
							<li>
								<a href="#">Creativity Is More Than</a>
							</li>
							<li>
								<a href="#">Designing the perfect</a>
							</li>
							<li>
								<a href="#">Music Player Design</a>
							</li>
							<li>
								<a href="#">A Song And Dance Act</a>
							</li>
							<li>
								<a href="#">By spite about do of allow</a>
							</li>
						</ul>
					</section>
					<section class="widget widget_recent_comments">
						<h2 class="widget-title">
							<span class="widget-title-span"><span class="first-word">Recent</span> Comments</span>
						</h2>
						<ul>
							<li class="recentcomments">
								<span class="comment-author-link">JOHN SMITH</span> on <a href="#">Creativity Is More Than</a>
							</li>
							<li class="recentcomments">
								<span class="comment-author-link">ADAM SMITH</span> on <a href="#">Creativity Is More Than</a>
							</li>
							<li class="recentcomments">
								<span class="comment-author-link">admin</span> on <a href="#">Designing the perfect</a>
							</li>
							<li class="recentcomments">
								<span class="comment-author-link">admin</span> on <a href=#">Designing the perfect</a>
							</li>
							<li class="recentcomments">
								<span class="comment-author-link">James</span> on <a href="#">Designing the perfect</a>
							</li>
						</ul>
					</section>
					<section class="widget widget_archive">
						<h2 class="widget-title">
							<span class="widget-title-span">
								<span class="first-letter">Archives</span>
							</span>
						</h2>
						<ul>
							<li>
								<a href="#">November 2018</a>
							</li>
						</ul>
					</section>
					<section class="widget widget_categories">
						<h2 class="widget-title">
							<span class="widget-title-span"><span class="first-letter">Categories</span></span>
						</h2>
						<ul>
							<li class="cat-item cat-item-2">
								<a href="#">Design</a>
							</li>
							<li class="cat-item cat-item-3">
								<a href="#">Music</a>
							</li>
						</ul>
					</section>
					<section class="widget widget_meta">
						<h2 class="widget-title">
							<span class="widget-title-span"><span class="first-letter">Meta</span></span>
						</h2>
						<ul>
							<li><a href="#">Log in</a></li>
							<li><a href="#">Entries feed</a></li>
							<li><a href="#">Comments feed</a></li>
							<li><a href="#">WordPress.org</a></li>
						</ul>
					</section>
				</aside>
			</div>
			<span class="close"></span>
		</div>

	</div>

	<!--
		jQuery Scripts
	-->
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery.validate.js"></script>
	<script src="js/jquery.magnific-popup.js"></script>
	<script src="js/imagesloaded.pkgd.js"></script>
	<script src="js/isotope.pkgd.js"></script>
	<script src="js/jquery.slimscroll.js"></script>
	<script src="js/owl.carousel.js"></script>
	<script src="js/typed.js"></script>
	<script src="https://kit.fontawesome.com/1dc8fa370c.js" crossorigin="anonymous"></script>


	<!--
		Main Scripts
	-->
	<script src="js/scripts.js"></script>

</body>

<!-- Mirrored from bslthemes.com/ryan/demo/index-new-demo-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Feb 2021 15:18:09 GMT -->

</html>