<?
#
#
# SugoiDesu! (https://github.com/ilsubyeega/sugoidesu)
# This File is Licensed as GNU Affero General Public License v3.0
# Find out more: https://github.com/ilsubyeega/sugoidesu/blob/master/LICENSE
#
#
#
include "../inc/function.php";


# Page Settings
$page['title'] = "Keesu / Docs";
$page['description'] = "W..Why watching me?"; 
$navbar_active[1] = "Keesu";
$navbar_active[2] = "Documents";
#$navbar_active[3] = "";

# Header Settings (If is not sets, it won't be shown)
$header['background_image'] = "/assets/img/background/granat1.jpg";
$header['title'] = "Docs";
$header['description'] = "You can find any way/soulations on docs.";
#$header['button']['text'] = "Change to Relax";
#$header['button']['icon'] = "fas fa-exchange-alt";
#$header['button']['url'] = "/leaderboards/relax";




# Web Content
include "../inc/header.php";
include "../inc/navbar.php";
include "../inc/base1.php";


#echo "SELECT  `id`,  `username`,  `total_score_std`, `pp_std`, `avg_accuracy_std`, `playcount_std` FROM `".$mysql_config['db']."`.`users_stats` ORDER BY `pp_std` DESC LIMIT 100;";
?>
<a href="How.php">
<div class="card">
              <div class="card-header">
                <h4>How to install?</h4>
              </div>
              <div class="card-body">
                <p>Do you want play Keesu? but you can't connect???</p>
                <div class="section-title">JUST CLICK  IT!</div>
                </div>
              <div class="card-footer bg-whitesmoke">
                Created by <a href="https://keepsobp.github.io">KeepSOBP</a>
              </div>
            </div>
</a>
<?
include "../inc/footer.php";
?>
