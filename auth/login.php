<?php
#
#
# SugoiDesu! (https://github.com/ilsubyeega/sugoidesu)
# This File is Licensed as GNU Affero General Public License v3.0
# Find out more: https://github.com/ilsubyeega/sugoidesu/blob/master/LICENSE
#
#
#
include "../inc/include.php";

# Page Settings
$page['title'] = "Login";
$page['description'] = "Login"; 
$navbar_active[1] = $config['global']['servername'];

# Header Settings (If is not sets, it won't be shown)
$header['background_image'] = "/assets/img/background/Lune.jpg";
$header['title'] = "Login";
$header['description'] = "";

if ($_SERVER['REQUEST_METHOD']=="POST"){
  if ( isset($_POST['user']) && isset($_POST['password']) ){
      $username = $mysqli->real_escape_string($_POST['user']);
			if (!$mysqli_result = $mysqli->query("SELECT * FROM `users` WHERE 
        (
        `username`='".$username."' 
        OR `username_safe`='".$username."'
        OR `email`='".$username."'
        ) 
        LIMIT 1000;")){
				die("SQL ERROR");
			}
			if ($mysqli_result->num_rows > 0){
        $mysqli_e = $mysqli_result->fetch_assoc();
        if ( isset($mysqli_e['id']) && isset($mysqli_e['password_md5']) ){
          if (password_verify(md5($_POST['password']), $mysqli_e['password_md5'])) {
            $noaccount = 0;
            $_SESSION['userid']=$mysqli_e['id'];
            $_SESSION['username']=$mysqli_e['username'];
            die(header('Location: '.'http://' . $_SERVER['HTTP_HOST']));
            exit;
          } else {
            $noaccount = 1;
          }
        } else {
          $noaccount = 1;
        }
			} else {
        $noaccount = 1;
      }
    }
  } else {
    $noaccount=2;
  }

# Web Content
include "../inc/header.php";
include "../inc/navbar.php";
include "../inc/base1.php";







?>














            <div class="card card-primary">
              <div class="card-header"><h4>Login</h4></div>

              <div class="card-body">
                <div class="container">
                  <?
                  if (isset($noaccount) && ($noaccount==1)){
                    echo '<div class="alert alert-primary alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>×</span></button>Wrong Username or Email or Password.</div></div>';
                  }



                  ?>
                <?
                if ($session_exists == 0){?>
<form method="POST" action="#" class="needs-validation" novalidate="">
  <div class="form-group">
    <label for="user">Username (Email)</label>
    <input id="user" type="text" class="form-control" name="user" tabindex="1" required autofocus>
    <div class="invalid-feedback">
      Please fill in your email/username
    </div>
  </div>

  <div class="form-group">
    <div class="d-block">
      <label for="password" class="control-label">Password</label>
      <div class="float-right">
        <!--<a href="forgot_password" class="text-small">
                          Forgot Password?
                        </a>-->
      </div>
    </div>
    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
    <div class="invalid-feedback">
      please fill in your password
    </div>
  </div>

  <div class="form-group">
    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
      Login
    </button>
  </div>
</form>
<? } else {
                  echo 'You are already logged in!';
                }?>

</div>
</div>
</div>
<?if ($session_exists == 0){?>
<div class="mt-5 text-muted text-center">
  Don't have an account? <a href="register">Create One</a>
</div>
<?}?>
</div>
<br><br><br><br><br>
<!-- General JS Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
  integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
  integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="../assets/js/stisla.js"></script>

<!-- JS Libraies -->

<!-- Template JS File -->
<script src="../assets/js/scripts.js"></script>
<script src="../assets/js/custom.js"></script>

<!-- Page Specific JS File -->
</body>

</html>
