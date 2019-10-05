<?
#
#
# SugoiDesu! (https://github.com/ilsubyeega/sugoidesu)
# This File is Licensed as GNU Affero General Public License v3.0
# Find out more: https://github.com/ilsubyeega/sugoidesu/blob/master/LICENSE
#
#
#
include "../inc/function.php";

# Import config
include "../inc/config.php";
include "../inc/config_secure.php";
global $config;

# Page Settings
$page['title'] = "Email Verification";
$page['description'] = "Email Verification"; 
$navbar_active[1] = $config['global']['servername'];

# Header Settings (If is not sets, it won't be shown)
$header['background_image'] = "/assets/img/background/Lune.jpg";
$header['title'] = "Email verification";
$header['description'] = "";


# Web Content
include "../inc/header.php";
include "../inc/navbar.php";
include "../inc/base1.php";




$success = 2; // Make it if is doing thing
// If parameters is not set
if (!(isset($_GET['user']) && isset($_GET['key']))){
  $success = 0;
  $reason = "There are no parameters about it. Try to look carefully on email.";
}
// Checking username is english chars + numbers only
if ($success==2){
	if (!(ctype_alnum($_GET['user']))) { 
		$success = 0;
		$reason = "Username should be only english and numbers.";
	}
}
// Checking Username is longer than 3 letters
if ($success==2){
	if (strlen($_GET["user"]) < '3') {
		$error = "Your Username Must Contain At Least 3 Characters!";
	}
}
// Checking Key is longer than 5 letters.
if ($success==2){
	if (strlen($_GET["key"]) < '5') {
		$error = "The key is invalid.";
	}
}
// Checking key is english chars and numbers only
if ($success==2){
	if (!(ctype_alnum($_GET['key']))) { 
		$success = 0;
		$reason = "The key should be only english and numbers.";
	}
}



// MySQL Connection owo (Not now)
if ($success==2){
	$mysqli = new mysqli($config['mysql']['host'], $config['mysql']['id'], $config['mysql']['pw'], $config['mysql']['db']); 
	}
	// If MySQL Connection Error
	if ($mysqli->connect_errno) {
		$success = 0;
		$reason = "Server Is Down (1)";
	}

// Checking the key is valid

if ($success==2){
	if (!$mysqli_result = $mysqli->query("SELECT * FROM `sugoidesu_emailverify` WHERE `username`='".$_GET["user"]."' AND `verifycode`='".$_GET["key"]."' LIMIT 1;")){
		$success = 0;
		$reason = "Server Side Error (2)";
	}
}



// 
if ($success==2){
	if ($mysqli_result->num_rows > 0){
		$mysqli_r = $mysqli_result->fetch_assoc();
		// username or key are same
		if (!($mysqli_r['username'] == $_GET['user'] && $mysqli_r['verifycode'] == $_GET['key'])){
			$success = 0;
			$reason = "Wrong username or verifykey";
		}
	} else {
		// If Value is not set
		$success = 0;
		$reason = "Wrong username or verifykey";
	}
}

if ($success==2){
	if ($mysqli_r['verified'] == 1){
		$success = 0;
		$reason = "You are already registered!";
	}
}

if ($success==2){
	if (!(isset($mysqli_r['username']) && isset($mysqli_r['email']) && isset($mysqli_r['password_md5']) && isset($mysqli_r['requesttime']))){
		$success = 0;
		$reason = "Something wrong with your registration. Please call moderator.";
	}
}
if ($success==2){
	$ttt = $mysqli_r['username'];
	$q="INSERT INTO `users` (`username`, `username_safe`, `password_md5`, `email`, `register_datetime`, `password_version`, `privileges`) VALUES ('".$mysqli_r['username']."', '".strtolower($ttt)."', '".$mysqli_r['password_md5']."', '".$mysqli_r['email']."', '".time()."', '10', 1)";
	
	if ($mysqli->query($q) === FALSE){
		$success = 0;
		$reason = "Something wrong with your registration. Please call moderator. (1)";
		$rip = $mysqli->query("DELETE FROM `users` WHERE  `username`='".$mysqli_r['username']."' AND `email`='".$mysqli_r['email']."';");
	}
}
// Get ID
if ($success==2){
	$q="SELECT * FROM `users` WHERE `username` = '".$mysqli_r['username']."' LIMIT 1;";
	
	if (!$mysqli_result = $mysqli->query($q)){
		$success = 0;
		$reason = "Something wrong with your registration. Please call moderator. (2)";
		$rip = $mysqli->query("UPDATE `sugoidesu_emailverify` SET `verified`='0' WHERE  `username`='".$mysqli_r['username']."' AND `email`='".$mysqli_r['email']."' AND `verifycode`='".$mysqli_r['verifycode']."' AND `password_md5`='".$mysqli_r['password_md5']."' AND `requesttime`=".$mysqli_r['requesttime']." LIMIT 1;");
		$rip = $mysqli->query("DELETE FROM `users` WHERE  `username`='".$mysqli_r['username']."' AND `email`='".$mysqli_r['email']."';");
	} else {
		$mysqli_e = $mysqli_result->fetch_assoc();
		if (!(isset($mysqli_e['id']))){
			$success = 0;
			$reason = "Something wrong with your registration. Please call moderator. (3)";
			$rip = $mysqli->query("DELETE FROM `users` WHERE  `username`='".$mysqli_r['username']."' AND `email`='".$mysqli_r['email']."';");
			$rip = $mysqli->query("ALTER TABLE `users` AUTO_INCREMENT=".$mysqli_e['id']-1);
		}
	}
}

if ($success==2){
	$q="UPDATE `sugoidesu_emailverify` SET `verified`='1' WHERE  `username`='".$mysqli_r['username']."' AND `email`='".$mysqli_r['email']."' AND `verifycode`='".$mysqli_r['verifycode']."' AND `password_md5`='".$mysqli_r['password_md5']."' AND `requesttime`=".$mysqli_r['requesttime']." LIMIT 1;";
	
	if ($mysqli->query($q) === FALSE){
		$success = 0;
		$reason = "Something wrong with your registration. Please call moderator. (2)";
		$rip = $mysqli->query("UPDATE `sugoidesu_emailverify` SET `verified`='0' WHERE  `username`='".$mysqli_r['username']."' AND `email`='".$mysqli_r['email']."' AND `verifycode`='".$mysqli_r['verifycode']."' AND `password_md5`='".$mysqli_r['password_md5']."' AND `requesttime`=".$mysqli_r['requesttime']." LIMIT 1;");
		$rip = $mysqli->query("DELETE FROM `users` WHERE  `username`='".$mysqli_r['username']."' AND `email`='".$mysqli_r['email']."';");
		$rip = $mysqli->query("ALTER TABLE `users` AUTO_INCREMENT=".$mysqli_e['id']-1);
	}
}



// Finally, Lets Insert it
if ($success==2){
	$q="INSERT INTO `users_stats`(id, username, user_color, user_style, ranked_score_std, playcount_std, total_score_std, ranked_score_taiko, playcount_taiko, total_score_taiko, ranked_score_ctb, playcount_ctb, total_score_ctb, ranked_score_mania, playcount_mania, total_score_mania) VALUES (".$mysqli_e['id'].", '".$mysqli_r['username']."', 'black', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);";
	
	if ($mysqli->query($q) === FALSE){
		$success = 0;
		$reason = "Something wrong with your registration. Please call moderator. (4)";
		$rip = $mysqli->query("UPDATE `sugoidesu_emailverify` SET `verified`='0' WHERE  `username`='".$mysqli_r['username']."' AND `email`='".$mysqli_r['email']."' AND `verifycode`='".$mysqli_r['verifycode']."' AND `password_md5`='".$mysqli_r['password_md5']."' AND `requesttime`=".$mysqli_r['requesttime']." LIMIT 1;");
		$rip = $mysqli->query("DELETE FROM `users` WHERE  `username`='".$mysqli_r['username']."' AND `email`='".$mysqli_r['email']."';");
		$rip = $mysqli->query("DELETE FROM `users_stats` WHERE  `username`='".$mysqli_r['username']."' AND `id`='".$mysqli_e['id']."';");
		$rip = $mysqli->query("ALTER TABLE `users` AUTO_INCREMENT=".$mysqli_e['id']-1);
	}
}

if ($success==2){
	$q="INSERT INTO `rx_stats`(id, username, user_color, user_style, ranked_score_std, playcount_std, total_score_std, ranked_score_taiko, playcount_taiko, total_score_taiko, ranked_score_ctb, playcount_ctb, total_score_ctb, ranked_score_mania, playcount_mania, total_score_mania) VALUES (".$mysqli_e['id'].", '".$mysqli_r['username']."', 'black', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);";
	
	if ($mysqli->query($q) === FALSE){
		$success = 0;
		$reason = "Something wrong with your registration. Please call moderator. (5)";
		$rip = $mysqli->query("UPDATE `sugoidesu_emailverify` SET `verified`='0' WHERE  `username`='".$mysqli_r['username']."' AND `email`='".$mysqli_r['email']."' AND `verifycode`='".$mysqli_r['verifycode']."' AND `password_md5`='".$mysqli_r['password_md5']."' AND `requesttime`=".$mysqli_r['requesttime']." LIMIT 1;");
		$rip = $mysqli->query("DELETE FROM `users` WHERE  `username`='".$mysqli_r['username']."' AND `email`='".$mysqli_r['email']."';");
		$rip = $mysqli->query("DELETE FROM `users_stats` WHERE  `username`='".$mysqli_r['username']."' AND `id`='".$mysqli_e['id']."';");
		$rip = $mysqli->query("DELETE FROM `rx_stats` WHERE  `username`='".$mysqli_r['username']."' AND `id`='".$mysqli_e['id']."';");
		$rip = $mysqli->query("ALTER TABLE `users` AUTO_INCREMENT=".$mysqli_e['id']-1);
	} else {
		$success=2;
	}
}
// Some useless bug
if ($success==2){
	$q="DELETE FROM `sugoidesu_emailverify` WHERE  (`username`='".$mysqli_r['username']."' AND `email`='".$mysqli_r['email']."') AND NOT `verifycode`='".$mysqli_r['verifycode']."'";
	if ($mysqli->query($q) === FALSE){
		
	} else {
		$success=1;
	}
}
if ($success==1){
echo '<div class="col-12 mb-4">
		<div class="hero align-items-center bg-success text-white">
		  <div class="hero-inner text-center">
			<h2>Registered</h2>
			<p class="lead">You have successfully registered the Keesu! Lets Play!</p>
			<div class="mt-4">
			  <a href="#" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="fas fa-download"></i>&nbsp; Download Switcher</a>
			</div>
		  </div>
		</div>
	  </div>';
} else {
  echo '<div class="col-12 mb-4">
		<div class="hero align-items-center bg-danger text-white">
		  <div class="hero-inner text-center">
			<h2>Error</h2>
			<p>Ah There is an Error: <span class="badge badge-danger">'.$reason.'</span></p>
		  </div>
		</div>
	  </div>';
}

include "../inc/footer.php";
?>