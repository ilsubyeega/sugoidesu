<?
include "../inc/function.php";


# Page Settings
$page['title'] = "No Content";
$page['description'] = "idk why i am doing"; 
$navbar_active[1] = "Keesu";
$navbar_active[2] = "Documents";
#$navbar_active[3] = "";

# Header Settings (If is not sets, it won't be shown)
$header['background_image'] = "/assets/img/background/granat1.jpg";
$header['title'] = "Not Found";
$header['description'] = "";
#$header['button']['text'] = "Change to Relax";
#$header['button']['icon'] = "fas fa-exchange-alt";
#$header['button']['url'] = "/leaderboards/relax";




# Web Content
include "../inc/header.php";
include "../inc/navbar.php";
include "../inc/base1.php";


#echo "SELECT  `id`,  `username`,  `total_score_std`, `pp_std`, `avg_accuracy_std`, `playcount_std` FROM `".$mysql_config['db']."`.`users_stats` ORDER BY `pp_std` DESC LIMIT 100;";
?>
<div class="card">
              <div class="card-header">
                <h4>No Content</h4>
              </div>
              <div class="card-body">
                <p>There is no written document here.</p>
              </div>
            </div>

<?
include "../inc/footer.php";
?>