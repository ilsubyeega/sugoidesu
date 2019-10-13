<?php
#
#
# SugoiDesu! (https://github.com/ilsubyeega/sugoidesu)
# This File is Licensed as GNU Affero General Public License v3.0
# Find out more: https://github.com/ilsubyeega/sugoidesu/blob/master/LICENSE
#
#
#
include "../../inc/include.php";


global $mode, $relax;

# Page Settings

$page['description'] = "idk why i am doing"; 
$navbar_active[1] = $config['global']['servername'];
$navbar_active[2] = "Leaderboards";


# Header Settings (If is not sets, it won't be shown)


$header['description'] = "Taiko, CTB, Mania is currently not supported for pp. Score will still be saved for future calculations.";
$header['button']['icon'] = "fas fa-exchange-alt";

if (isset($_GET['order'])){
    if ($_GET['order'] == "pp"){
        $order_by = "pp_".$mode;
        $ordere = "pp";
    } else if ($_GET['order'] == "acc" || $_GET['order'] == "accuracy"){
        $order_by = "avg_accuracy_".$mode;
        $ordere = "avg_accuracy";
    } else if ($_GET['order'] == "score" || $_GET['order'] == "scores"){
        $order_by = "total_score_".$mode;
        $ordere = "total_score";
    } else if ($_GET['order'] == "plays" || $_GET['order'] == "playcount"){
        $order_by = "playcount_".$mode;
        $ordere = "playcount";
    } else {
        $order_by = "pp_".$mode;
        $ordere = "pp";
    }
} else {
    $order_by = "pp_".$mode;
    $ordere = "pp";
}

if ($relax==1) {
    $page['title'] = "Leaderboard (Relax)";
    $header['title'] = "Leaderboard (Relax)";
    $header['background_image'] = "/assets/img/background/heartnoatoaji1.jpg";
    $table = "rx_stats";
    $header['button']['text'] = "Change to Normal";
    $header['button']['url'] = "/leaderboards/normal/".$mode;
    $navbar_active[3] = "LeadRelax";
} else {
    $page['title'] = "Leaderboard (Normal)";
    $header['title'] = "Leaderboard (Normal)";
    $header['background_image'] = "/assets/img/background/angedublacpur.jpg";
    $table = "users_stats";
    $header['button']['text'] = "Change to Relax";
    $header['button']['url'] = "/leaderboards/relax/".$mode;
    $navbar_active[3] = "LeadNormal";
}



# Web Content
include "../../inc/header.php";
include "../../inc/navbar.php";
include "../../inc/base1.php";

$mysqli = new mysqli($config['mysql']['host'], $config['mysql']['id'], $config['mysql']['pw'], $config['mysql']['db']);
if (!mysqli_connect_errno())
  {
    $res = $mysqli->query("SELECT  `id`,  `username`,  `total_score_".$mode."`, `pp_".$mode."`, `avg_accuracy_".$mode."`, `playcount_".$mode."` FROM `".$config['mysql']['db']."`.`".$table."` ORDER BY `".$order_by."` DESC LIMIT 100;");
  } else {
	  echo '<div class="row"><div class="col-12 col-md-12 col-sm-12"> <div class="card"> <div class="card-header"> <h4>Cannot connect to MySQL Server</h4> </div><div class="card-body"> <div class="empty-state" data-height="400" style="height: 400px;"> <div class="empty-state-icon"> <i class="fas fa-question"></i> </div><h2>'; echo "We couldn't find any data"; echo '</h2> <p class="lead">'; echo "We couldn't connect the server. Maybe Server Shutdowned? </p> </div></div></div>";
	  exit;
  }

function LeadActive($require, $current){
						if ($require==$current) {
							return "active";
						} else {
							return "";
						}
					}
#echo "SELECT  `id`,  `username`,  `total_score_std`, `pp_std`, `avg_accuracy_std`, `playcount_std` FROM `".$config['mysql']['db']."`.`users_stats` ORDER BY `pp_std` DESC LIMIT 100;";
?>
<div class="row">

<div class="col-12 col-md-12 col-lg-12">
    <div class="card">
        <div class="card-body p-0">
            <div class="container">
                <br>
                <ul class="nav nav-pills">
				<?php					
					
					
					if ($relax==0) {
                    echo '<li class="nav-item"><a href="/leaderboards/normal/std" class="nav-link '.LeadActive("std", $mode).'">Standard</a></li>&nbsp';
                    echo '<li class="nav-item"><a href="/leaderboards/normal/taiko" class="nav-link '.LeadActive("taiko", $mode).'">Taiko</a></li>&nbsp';
                    echo '<li class="nav-item"><a href="/leaderboards/normal/ctb" class="nav-link '.LeadActive("ctb", $mode).'">Catch The Beat</a></li>&nbsp';
                    echo '<li class="nav-item"><a href="/leaderboards/normal/mania" class="nav-link '.LeadActive("mania", $mode).'">Mania</a></li>&nbsp';
					} else {
						echo '<li class="nav-item"><a href="/leaderboards/relax/std" class="nav-link '.LeadActive("std", $mode).'">Standard</a></li>&nbsp';
						echo '<li class="nav-item"><a href="/leaderboards/relax/taiko" class="nav-link '.LeadActive("taiko", $mode).'">Taiko</a></li>&nbsp';
						echo '<li class="nav-item"><a href="/leaderboards/relax/ctb" class="nav-link '.LeadActive("ctb", $mode).'">Catch The Beat</a></li>&nbsp';
					}
					
				?>
                </ul>
                <br>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-md">
                    <tbody>
                        <tr>
                            <th>
                                <center>Rank</center>
                            </th>
                            <th>
                                <center>Username</center>
                            </th>
                            <th>
                                <center><?php                                if ($ordere=="pp"){
                                    echo '<a href="'.$mode.'?order=pp" class="leu-table-active">Performance Points';
                                } else {
                                    echo '<a href="'.$mode.'?order=pp" class="leu-table-dont-color">Performance Points';
                                } ?></center>
                            </th>
                            <th>
                                <center><?if ($ordere=="avg_accuracy"){
                                    echo '<a href="'.$mode.'?order=accuracy" class="leu-table-active">Accuracy';
                                } else {
                                    echo '<a href="'.$mode.'?order=accuracy" class="leu-table-dont-color">Accuracy';
                                } ?></center>
                            </th>
                            <th>
                                <center><?if ($ordere=="total_score"){
                                    echo '<a href="'.$mode.'?order=score" class="leu-table-active">Total Score';
                                } else {
                                    echo '<a href="'.$mode.'?order=score" class="leu-table-dont-color">Total Score';
                                } ?></center>
                            </th>
                            <th>
                                <center><?if ($ordere=="playcount"){
                                    echo '<a href="'.$mode.'?order=playcount" class="leu-table-active">Play Count';
                                } else {
                                    echo '<a href="'.$mode.'?order=playcount" class="leu-table-dont-color">Play Count';
                                } ?></center>
                            </th>
                        </tr>
                        <?php                      $x = 0;
                      while ($row = mysqli_fetch_array($res)) {
                        $x = $x + 1;
                        echo '<tr>';
                        echo '<td><center>#'.$x.'</center></td>';
                        echo '<td><center><a class="leu-comfortaa" href="/u/'.$row['id'].'">'.$row['username'].'</a></center></td>';
                        echo '<td><center><div class="badge badge-info">'.number_format($row['pp_'.$mode]).'pp</div></center></td>';
                        echo '<td><center><div class="badge badge-success">'.number_format($row['avg_accuracy_'.$mode], 2).'%</div></center></td>';
                        echo '<td><center><div class="badge badge-light">'.number_format($row['total_score_'.$mode]).'</div></center></td>';
                        echo '<td><center><div class="badge badge-primary">'.number_format($row['playcount_'.$mode]).' plays</div></center></td>';
                        echo '</tr>';
                      }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>

</div>
</div>
</div>
</section>
</div>

<?php include "../../inc/footer.php";
?>