<?
include "../inc/function.php";
# Web Content
include "../inc/header.php";
?>
<?
if ($_SERVER['REQUEST_METHOD']=="GET"){
	include "inc/register1.php";
} else if ($_SERVER['REQUEST_METHOD']=="POST"){
  if ( isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['repassword']) ){
	global $error;
	$error = "";
	$errortemplate1 = '<div class="alert alert-primary alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>×</span></button>';
	$errortemplate2 = '</div></div>';
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
		// If MySQL Connection Error
		// If Registion is Enabled
		// If Already registered (Didnt Verified Email, sugoidesu_emailverify)
		// If Already registered (verified, user)
		// MySQL Query Error
	// If Sucess, Lets Notify Him xD
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