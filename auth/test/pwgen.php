<?
#
#
# SugoiDesu! (https://github.com/ilsubyeega/sugoidesu)
# This File is Licensed as GNU Affero General Public License v3.0
# Find out more: https://github.com/ilsubyeega/sugoidesu/blob/master/LICENSE
#
#
#
if ($_SERVER['REQUEST_METHOD']=="GET"){
	if (isset($_GET['password'])) {
        $gen = password_hash(md5($_GET['password']), PASSWORD_BCRYPT, ["cost" => 10]);
        echo $gen;
	} else {
		echo "No Argument.";
	}
} else if ($_SERVER['REQUEST_METHOD']=="POST") {
	if (isset($_POST['password'])) {
        $gen = password_hash(md5($_POST['password']), PASSWORD_BCRYPT, ["cost" => 10]);
        echo $gen;
	} else {
		echo "No Argument.";
	}
	} else {
		echo 'Unsupported Method.';
	}
?>