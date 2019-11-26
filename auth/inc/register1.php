<?php
#
#
# SugoiDesu! (https://github.com/ilsubyeega/sugoidesu)
# This File is Licensed as GNU Affero General Public License v3.0
# Find out more: https://github.com/ilsubyeega/sugoidesu/blob/master/LICENSE
#
#
#
?>
<body>
  <div id="app">
    <section class="section">
      <div class="d-flex flex-wrap align-items-stretch">
        <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white leu-register">
          <div class="p-4 m-3">
            <img src="/assets/icon/favicon-96x96.png" alt="Keesu logo" width="60" class="mb-5 mt-2">
            <h4 class="text-dark font-weight-normal">Welcome to <span class="font-weight-bold">Keesu</span> :D</h4>
            <p class="text-muted">Before you get started, you must login or register if you don't already have an account.</p>
            <?php            global $error;
            if (!($error == "")){
                echo $error;
            }
            ?>
            <form method="POST" action="#" class="needs-validation" novalidate="">
            <div class="form-group">
                <label for="name">Username</label>
                <input id="name" type="name" class="form-control" name="name" tabindex="1" required autofocus>
                <small id="namehelp" class="form-text text-muted">
                  Your name must be 1-15 characters long, contain letters and numbers, and must not contain special characters, or emoji.
                </small>
                <div class="invalid-feedback">
                  Please fill in your username
                </div>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                <small id="namehelp" class="form-text text-muted">
                  Keesu requires Naver, Daum Mail to register.
                </small>
                <div class="invalid-feedback">
                  Please fill in your email
                </div>
              </div>

              <div class="form-group">
                <div class="d-block">
                  <label for="password" class="control-label">Password</label>
                </div>
                <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                <div class="invalid-feedback">
                  please fill in your password
                </div>
              </div>

              <div class="form-group">
                <div class="d-block">
                  <label for="repassword" class="control-label">Retype Password</label>
                </div>
                <input id="repassword" type="password" class="form-control" name="repassword" tabindex="2" required>
                <div class="invalid-feedback">
                  please fill in your password
                </div>
              </div>

              <div class="form-group">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" name="isterm" class="custom-control-input" tabindex="3" id="isterm">
                  <label class="custom-control-label leu-custom-control-input" for="isterm">I already read <a href="#">Terms and Conditions</a></label>
                </div>
              </div>

              <div class="form-group text-right">
                <a href="/auth/login" class="float-left mt-3">
                  Already have account?
                </a>
                <a href="/" class="btn btn-icon btn-danger btn-lg"><i class="fas fa-home"></i></a> &nbsp; 
                <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
                  Register
                </button>
              </div>

            </form>

          </div>
        </div>
        
        <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="../assets/img/unsplash/login-bg.jpg">
        <div style="position: static; width: 100%; height: 100%">
        <iframe frameborder="0" height="100%" width="100%" 
         src="https://youtube.com/embed/VIS9QTUF2S0?autoplay=1&controls=0&showinfo=0&autohide=1&mute=1">
         </iframe>
        </div>
          <div class="absolute-bottom-left index-2">
            <div class="text-light p-5 pb-2">
              <div class="mb-5 pb-3">
                <h1 class="mb-2 display-4 font-weight-bold">환영합니다</h1>
                <h5 class="font-weight-normal text-muted-transparent">Keesu</h5>
              </div>
              Video by <a class="text-light bb" target="_blank" href="<?php echo $config['page']['register']['by_url'];?>"><?php echo $config['page']['register']['by'];?></a>
               on <a class="text-light bb" target="_blank" href="<?php echo $config['page']['register']['by_service_url'];?>"><?php echo $config['page']['register']['by_service'];?></a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
