<?
if ($_SERVER['REQUEST_METHOD']=="GET"){
	if (isset($_GET['password']) && isset($_GET['hash'])) {
		$hash = urldecode($_GET['hash']);
	if (password_verify(md5($_GET['password']), $hash)) {
		echo 'Password is valid!';
	} else {
		echo 'Invalid password.';
	} 
	} else {
		echo "No Argument.";
	}
} else if ($_SERVER['REQUEST_METHOD']=="POST"){
	if (isset($_POST['password']) && isset($_POST['hash'])) {
		$hash = $_POST['hash'];
	if (password_verify(md5($_POST['password']), $hash)) {
		echo 'Password is valid!';
	} else {
		echo 'Invalid password.';
	} 
	} else {
		echo "No Argument.";
	}
}
?>