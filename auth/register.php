<?
include "../inc/function.php";
# Web Content
include "../inc/header.php";
?>
<?
if ($_SERVER['REQUEST_METHOD']=="GET"){
  include "inc/register1.php";
} else if ($_SERVER['REQUEST_METHOD']=="POST"){
  if ( isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['repassword']) && isset($_POST['isterm']) ){
    # Warning - This password_pash will not COMPATIBLE with ripple (password).
  echo password_hash(utf8_encode($_POST['password']), PASSWORD_BCRYPT, ["cost" => 10]);
  
















  
  } else {
    include "inc/register1.php";
  }
}

?>
<?
include "../inc/footer.php"
?>