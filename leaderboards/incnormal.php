<?
include "../../inc/function.php";
include "../../inc/sqlconfig.php";


global $mode, $relax;

# Page Settings

$page['description'] = "idk why i am doing"; 
$navbar_active[1] = "Keesu";
$navbar_active[2] = "Leaderboards";


# Header Settings (If is not sets, it won't be shown)


$header['description'] = "";
if (!($relax==0 & $mode=="mania")){

$header['button']['icon'] = "fas fa-exchange-alt";
} else {
	$header['description'] = "There is no Relax on mania :(";
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

$mysqli = new mysqli($mysql_config['host'], $mysql_config['id'], $mysql_config['pw'], $mysql_config['db']);
if (!mysqli_connect_errno())
  {
  if ($mysqli->connect_errno) {
    echo "Error : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
$res = $mysqli->query("SELECT  `id`,  `username`,  `total_score_".$mode."`, `pp_".$mode."`, `avg_accuracy_".$mode."`, `playcount_".$mode."` FROM `".$mysql_config['db']."`.`".$table."` ORDER BY `pp_std` DESC LIMIT 100;");
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
#echo "SELECT  `id`,  `username`,  `total_score_std`, `pp_std`, `avg_accuracy_std`, `playcount_std` FROM `".$mysql_config['db']."`.`users_stats` ORDER BY `pp_std` DESC LIMIT 100;";
?>
<div class="row">

<div class="col-12 col-md-12 col-lg-12">
    <div class="card">
        <div class="card-body p-0">
            <div class="container">
                <br>
                <ul class="nav nav-pills">
				<?
					
					
					
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
                                <center>Performance Points</center>
                            </th>
                            <th>
                                <center>Accuracy</center>
                            </th>
                            <th>
                                <center>Total Score</center>
                            </th>
                            <th>
                                <center>Playcount</center>
                            </th>
                        </tr>
                        <?
                      $x = 0;
                      while ($row = mysqli_fetch_array($res)) {
                        $x = $x + 1;
                        echo '<tr>';
                        echo '<td><center>#'.$x.'</center></td>';
                        echo '<td><center><a href="/u/'.$row['id'].'">'.$row['username'].'</a></center></td>';
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

<?
include "../../inc/footer.php";
?>