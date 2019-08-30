<?
function NavActive($original, $currently){
	if (!(isset($currently))){
		return "";
	} else if ($original == $currently) {
		return "active";
	} else {
		return "";
	}
}


// https://stackoverflow.com/questions/834303/startswith-and-endswith-functions-in-php










?>