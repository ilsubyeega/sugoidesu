<?php
#
#
# SugoiDesu! (https://github.com/ilsubyeega/sugoidesu)
# This File is Licensed as GNU Affero General Public License v3.0
# Find out more: https://github.com/ilsubyeega/sugoidesu/blob/master/LICENSE
#
#
#
include "inc/include.php";

# Page Settings
$page['title'] = $lang['pages']['home']['title'];
$page['description'] = "idk why i am doing"; 
$navbar_active[1] = $config['global']['servername'];
$navbar_active[2] = "Home";
#$navbar_active[3] = "";

# Header Settings (If is not sets, it won't be shown)
$header['background_image'] = "/assets/img/background/bluenation.jpg";
$header['title'] = $lang['pages']['home']['title'];
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
                <h4><?php echo $lang['pages']['home']['content']['title']; ?></h4>
              </div>
              <div class="card-body">
              <?php echo $lang['pages']['home']['content']['content']; ?>
              </div>
              <div class="card-footer bg-whitesmoke">
              <?php echo $lang['pages']['home']['content']['footer']; ?>
              </div>
            </div>

<?php include "inc/footer.php";
?>