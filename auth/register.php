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
# Web Content
include "../inc/header.php";
#MySQL
include "../inc/sqlconfig.php";
#Email content
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
include_once('../inc/PHPMailer/src/Exception.php');
include_once('../inc/PHPMailer/src/PHPMailer.php');
include_once('../inc/PHPMailer/src/SMTP.php');
include('../inc/secure/mail.php');
global $mysql_config;

if ($_SERVER['REQUEST_METHOD']=="GET"){
	include "inc/register1.php";
} else if ($_SERVER['REQUEST_METHOD']=="POST"){
  if ( isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['repassword']) ){
	global $error;
	$error = "";
	$errortemplate1 = '<div class="alert alert-primary alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>×</span></button>';
	$errortemplate2 = '</div></div>';


	$username = $_POST['name'];
	$password = $_POST['password'];


    // Checking username is english chars + numbers only
    if (!(ctype_alnum($_POST['name']))) { 
		$error = $error.$errortemplate1."Username should be only english and numbers.".$errortemplate2;
	}
	// Checking Username is longer than 3 letters
	if (strlen($_POST["name"]) < '3') {
        $error = $error.$errortemplate1."Your Username Must Contain At Least 3 Characters!".$errortemplate2;
    }
	// Email WhiteListing
	$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); // Filter all illegal strings
	if (!(filter_var($email, FILTER_VALIDATE_EMAIL))){
		$error = $error.$errortemplate1.$email." is not a valid email address!".$errortemplate2;
	}

	if (!(strpos($email, "naver.com"))){
		$error = $error.$errortemplate1."We are currently whitelisted Naver Mail only.".$errortemplate2;
	}

	// If Password this
	if (strlen($_POST["password"]) <= '8') {
        $error = $error.$errortemplate1."Your Password Must Contain At Least 8 Characters!".$errortemplate2;
    }
    if(!preg_match("#[0-9]+#",$_POST["password"])) {
        $error = $error.$errortemplate1."Your Password Must Contain At Least 1 Number!".$errortemplate2;
    }
    if(!preg_match("#[a-z]+#",$_POST["password"])) {
        $error = $error.$errortemplate1."Your Password Must Contain At Least 1 Lowercase Letter!".$errortemplate2;
	}
	// If Password and Confirm is not set
	if (!($_POST["password"] == $_POST["repassword"])){
		$error = $error.$errortemplate1."Please Check You're Entered or confirmed Your Password!".$errortemplate2;
	}
	
	// Checks User confirms the Term of Conditions
	if (!(isset($_POST["isterm"]))){
		$error = $error.$errortemplate1."Please agree the Term Of Conditions!".$errortemplate2;
	} else if (!($_POST["isterm"] == "on")){
		$error = $error.$errortemplate1."Please agree the Term Of Conditions!".$errortemplate2;
	}

	// Verify country is KR from ip.zxq.co
	if (!($_SERVER['REMOTE_ADDR'] == "127.0.0.1" || $_SERVER['REMOTE_ADDR'] == "::1")){
		$ip = $_SERVER['REMOTE_ADDR'];
		$ip_c = @file_get_contents("http://ip.zxq.co/".$ip);
		if ($ip_c == FALSE) {
			$error = $error.$errortemplate1."Sorry, Currently IP Services are down. Try again later.".$errortemplate2;
		} else {
			$details = json_decode($ip_c);
			if (!($details->country == "KR")){
				$error = $error.$errortemplate1."Sorry, The Server is Korean only. You can only register at South Korea".$errortemplate2;
			}
		}
	}

	// MySQL Connection owo (Not now)
	if ($error == ""){
	$mysqli = new mysqli($mysql_config['host'], $mysql_config['id'], $mysql_config['pw'], $mysql_config['db']); 
	}

	


		// If MySQL Connection Error
	if ($mysqli->connect_errno) {
			$error = $error.$errortemplate1."Sorry, The connection to database has failed: ".$mysqli->connect_error.$errortemplate2;
		}
		// If Registion is Enabled
		if ($error == ""){
			if (!$mysqli_result = $mysqli->query("SELECT  `type`,  `int` FROM `sugoidesu_settings` WHERE `type` = 'registrations_enabled' LIMIT 1")){
				$error = $error.$errortemplate1."Sorry, The databases just makes us error. (1".$mysqli->errno.")".$errortemplate2;
			}
			// If Value is not set
			if ($mysqli_result->num_rows > 0){
				$mysqli_r = $mysqli_result->fetch_assoc();
				if (!$mysqli_r['int'] == 1){
					$error = $error.$errortemplate1."Sorry, Registrations are currently disabled.".$errortemplate2;
				}
			} else {
				$error = $error.$errortemplate1."Sorry, Registrations are currently disabled.".$errortemplate2;
			}
		}
		// If User has dulpicate account (ip)
		if ($error == ""){
			if (!$mysqli_result = $mysqli->query("SELECT * FROM `ip_user` WHERE `ip`='".$_SERVER['REMOTE_ADDR']."';")){
				$error = $error.$errortemplate1."Sorry, The databases just makes us error. (2".$mysqli->errno.")".$errortemplate2;
			}
			// If Value is set
			if ($mysqli_result->num_rows > 0){
				$error = $error.$errortemplate1."Wait, You are multiaccounting on same ip! If you have any questions, tell us at discord server.".$errortemplate2;
			}
		}
		
		// If Already registered (Didnt Verified Email, sugoidesu_emailverify)
		if ($error == ""){
			if (!$mysqli_result = $mysqli->query("SELECT * FROM `sugoidesu_emailverify` WHERE (`username`='".$username."' OR `email`='".$email."') AND `verified`=0 LIMIT 1000;")){
				$error = $error.$errortemplate1."Sorry, The databases just makes us error. (2".$mysqli->errno.")".$errortemplate2;
			}
			// If Value is set
			if ($mysqli_result->num_rows > 0){
				$error = $error.$errortemplate1."There is same username/email on Server!<br>But it is not verified, so look at your emails!".$errortemplate2;
			}
		}
		// If Already registered (verified, user)
		if ($error == ""){
			if (!$mysqli_result = $mysqli->query("SELECT * FROM `users` WHERE `username`='".$username."' OR `email`='".$email."' LIMIT 1000;")){
				$error = $error.$errortemplate1."Sorry, The databases just makes us error. (3".$mysqli->errno.")".$errortemplate2;
			}
			// If Value is set
			if ($mysqli_result->num_rows > 0){
				$error = $error.$errortemplate1."There is same username/email on Server!".$errortemplate2;
			}
		}


	// If Sucess, Lets Notify Him (Email)

	if ($error == ""){
		

		$verifykey = generateRandomString();
		


		$mail = new PHPMailer(true);

		try {
			//Server settings
			$mail->CharSet = 'utf-8';
			$mail->SMTPDebug = 0;                                       // Enable verbose debug output
			$mail->isSMTP();                                            // Set mailer to use SMTP
			$mail->Host       = $secure_mail['host'];  // Specify main and backup SMTP servers
			$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
			$mail->Username   = $secure_mail['username'];                     // SMTP username
			$mail->Password   = $secure_mail['password'];                               // SMTP password
			$mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
			$mail->Port       = $secure_mail['port'];                                    // TCP port to connect to

			//Recipients
			$mail->setFrom('services@leu.kr', 'ilsubyeega (Services)');
			$mail->addAddress('ilsubyeega@naver.com');     // Add a recipient

			// Content
			$mail->isHTML(false);                                  // Set email format to HTML
			$mail->Subject = "Register Verification Mail";
			$mail->Body    = "안녕하세요 ".$username."님, https://osu.leu.kr/ 의 가입을 축하드립니다.\r\n
이제 이메일 인증만 남았군요. 아래 주소를 클릭하시면 됩니다.\r\n
만약에 본인이 아니라면 수신 차단을 위해 ilsubyeega@naver.com으로 연락 부탁드립니다.\r\n
\r\n
Hello ".$username.", Congratulation for registering https://osu.leu.kr/ !\r\n
Now we need email verification. Click the Link Down here.\r\n
If you did not request this, please reply immediately to ilsubyeega@naver.com for block this email.\r\n
\r\n
URL(주소): https://keesu.leu.kr/auth/email?user=".$username."&key=".$verifykey;


			$mail->send();
		} catch (Exception $e) {
			$error = $error.$errortemplate1."There was error while send the mail! Registion Cancelled.<br>{$mail->ErrorInfo}".$errortemplate2;
		}
	}

	if ($error == ""){
		$password_crypt = password_hash(md5($password), PASSWORD_BCRYPT, ["cost" => 10]);
		$q="INSERT INTO `sugoidesu_emailverify` (`username`, `email`, `verifycode`, `password_md5`, `requesttime`) VALUES ('".$username."', '".$email."', '".$verifykey."', '".$password_crypt."', '".time()."')";
		if ($mysqli->query($q) === FALSE){
			$error = $error.$errortemplate1."There was error while updating the profile! Registion Cancelled. (1)".$errortemplate2;
			$rip = $mysqli->query("DELETE FROM `sugoidesu_emailverify` WHERE  `username`='".$username."' AND `email`='".$email."' AND `verifycode`='".$verifykey."' AND `password_md5`='".$password_crypt."';");
		}
	}
	// Real notify him owo
	


	if (!($error == "")){
		include "inc/register1.php";
	} else {
		// Filter the Email
		if (strpos($email, "naver.com")){
			$emailprovider = "Naver Mail";
			$emailurl = "https://mail.naver.com";
		}
		if (strpos($email, "gmail.com")){
			$emailprovider = "Google Mail";
			$emailurl = "https://mail.google.com";
		}
		if (strpos($email, "daum.net")){
			$emailprovider = "Daum Mail";
			$emailurl = "https://mail.daum.net";
		}
		// Setup Webpage
		$page['title'] = "Done!";
		$page['description'] = "idk why i am doing"; 
		$navbar_active[1] = "Keesu";
		$header['background_image'] = "/assets/img/background/granat2.jpg";
		$header['title'] = "Done!";
		$header['description'] = "";
		include "../inc/header.php";
		include "../inc/navbar.php";
		include "../inc/base1.php";
		echo '<div class="col-12 mb-4">
		<div class="hero align-items-center bg-success text-white">
		  <div class="hero-inner text-center">
			<h2>Email Verification</h2>
			<p class="lead">We just sent the verification mail on your email '.$email.'. If not found, Check it on Spam Folder!</p>
			<div class="mt-4">';
			  echo '<a href="'.$emailurl.'" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="fas fa-sign-in-alt"></i> '.$emailprovider.'</a>';
		echo '	</div>
		  </div>
		</div>
	  </div>';
	}















	} else {
		include "inc/register1.php";
	}
}

?>


<?
include "../inc/footer.php";
?>