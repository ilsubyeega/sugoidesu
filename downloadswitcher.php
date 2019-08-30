<?
#
#
# SugoiDesu! (https://github.com/ilsubyeega/sugoidesu)
# This File is Licensed as GNU Affero General Public License v3.0
# Find out more: https://github.com/ilsubyeega/sugoidesu/blob/master/LICENSE
#
#
#
include "inc/function.php";


# Page Settings
$page['title'] = "Download Switcher";
$page['description'] = "idk why i am doing"; 
$navbar_active[1] = "Keesu";
$navbar_active[2] = "DownloadSwitcher";
#$navbar_active[3] = "";

# Header Settings (If is not sets, it won't be shown)
$header['background_image'] = "/assets/img/background/heartnoatoaji3.jpg";
$header['title'] = "Download Switcher";
$header['description'] = "You can download server switchers here.";
#$header['button']['text'] = "Change to Relax";
#$header['button']['icon'] = "fas fa-exchange-alt";
#$header['button']['url'] = "/leaderboards/relax";




# Web Content
include "inc/header.php";
include "inc/navbar.php";
include "inc/base1.php";

#echo "SELECT  `id`,  `username`,  `total_score_std`, `pp_std`, `avg_accuracy_std`, `playcount_std` FROM `".$mysql_config['db']."`.`users_stats` ORDER BY `pp_std` DESC LIMIT 100;";
?>
<div class="card">
              <div class="card-header">
                <h4>Download Switcher</h4>
              </div>
              <div class="card-body">
                <p>Please notice that the server is Koreans only. If you have any reasons to join, Please join the <a href="https://discord.gg/jqKNUcT">Discord Server</a>.</p>
                <div class="section-title">kyo-rs &nbsp; <span class="badge badge-danger">BETA</span> &nbsp; <a href="https://github.com/osukeesu/kyo-rs/releases">(Download)</a> <a href="https://github.com/osukeesu/kyo-rs/">(Source)</a></div>
                <p class="section-lead">The switcher is Windows 10 only. You won't execute successfully from kyo-rs if use another OS.</p>
              </div>
              <div class="card-footer bg-whitesmoke">
                Created by <a href="https://leu.kr/">ilsubyeega</a>
              </div>
            </div>

<?
include "inc/footer.php";
?>