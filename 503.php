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
$page['title'] = "Error";
$page['description'] = "idk why i am doing"; 
$navbar_active[1] = $config['global']['servername'];
$navbar_active[2] = "Error";
#$navbar_active[3] = "";

# Header Settings (If is not sets, it won't be shown)
$header['background_image'] = "/assets/img/background/Lune.jpg";
$header['title'] = "Error (Not Found)";
$header['description'] = "";


# Web Content
include "inc/header.php";
include "inc/navbar.php";
include "inc/base1.php";



?>
<div class="card">
                  <div class="card-header">
                    <h4>Service Unavailable</h4>
                  </div>
                  <div class="card-body">
                    <div class="empty-state" data-height="400" style="height: 400px;">
                      <div class="empty-state-icon bg-danger">
                        <i class="fas fa-times"></i>
                      </div>
                      <h2>This is Korean Only server.</h2>
                      <p class="lead">
                        If you want, just go to another server.
                      </p>
                      <a href="/" class="mt-4 bb">Go to Home</a>
                    </div>
                  </div>
                </div>

<?php include "inc/footer.php";
?>