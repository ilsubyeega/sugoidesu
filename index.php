<?php
#
#
# SugoiDesu! (https://github.com/ilsubyeega/sugoidesu)
# This File is Licensed as GNU Affero General Public License v3.0
# Find out more: https://github.com/ilsubyeega/sugoidesu/blob/master/LICENSE
#
#
#
include "inc/function.php";


# Import config
include "inc/config.php";
include "inc/config_secure.php";
global $config;

# Page Settings
$page['title'] = "Home";
$page['description'] = "idk why i am doing"; 
$navbar_active[1] = $config['global']['servername'];
$navbar_active[2] = "Home";
#$navbar_active[3] = "";

# Header Settings (If is not sets, it won't be shown)
$header['background_image'] = "/assets/img/background/bluenation.jpg";
$header['title'] = "Home";
$header['description'] = "";
#$header['button']['text'] = "Change to Relax";
#$header['button']['icon'] = "fas fa-exchange-alt";
#$header['button']['url'] = "/leaderboards/relax";


# Web Content
include "inc/header.php";
include "inc/navbar.php";
include "inc/base1.php";


?>
<div class="card">
              <div class="card-header">
                <h4>Welcome to Keesu</h4>
              </div>
              <div class="card-body">
                <p>Keesu is a private osu server powered by <a href="https://github.com/ilsubyeega/ruri">ruri</a> which is bancho that safe, fast for Korean.<br>
                You can check out more features here. Keesu has Korean based community and its <a href="https://github.com/osukeesu">open source</a>!</p>
              </div>
              <div class="card-footer bg-whitesmoke">
                Created by <a href="https://leu.kr/">ilsubyeega</a>
              </div>
            </div>

<?php include "inc/footer.php";
?>