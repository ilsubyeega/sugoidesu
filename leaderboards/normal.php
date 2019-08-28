<?
include "../inc/function.php";
include "../inc/sqlconfig.php";


# Page Settings
$page['title'] = "Leaderboard (Normal)";
$page['description'] = "idk why i am doing"; 
$navbar_active[1] = "Keesu";
$navbar_active[2] = "Leaderboards";
$navbar_active[3] = "LeadNormal";

# Header Settings (If is not sets, it won't be shown)
$header['background_image'] = "/assets/img/unsplash/andre-benz-1214056-unsplash.jpg";
$header['title'] = "Leaderboard (Normal)";
$header['description'] = "";
$header['button']['text'] = "Change to Relax";
$header['button']['icon'] = "fas fa-exchange-alt";
$header['button']['url'] = "/leaderboards/relax";




# Web Content
include "../inc/header.php";
include "../inc/navbar.php";
include "../inc/base1.php";

$mysqli = new mysqli($mysql_config['host'], $mysql_config['id'], $mysql_config['pw'], $mysql_config['db']);
if ($mysqli->connect_errno) {
    echo "Error : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$res = $mysqli->query("SELECT  `id`,  `username`,  `total_score_std`, `pp_std`, `avg_accuracy_std`, `playcount_std` FROM `".$mysql_config['db']."`.`users_stats` ORDER BY `pp_std` DESC LIMIT 100;");

#echo "SELECT  `id`,  `username`,  `total_score_std`, `pp_std`, `avg_accuracy_std`, `playcount_std` FROM `".$mysql_config['db']."`.`users_stats` ORDER BY `pp_std` DESC LIMIT 100;";
?>
<div class="row">

<div class="col-12 col-md-12 col-lg-12">
    <div class="card">
        <div class="card-body p-0">
            <div class="container">
                <br>
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <div class="nav-link active" href="#">Standard</div>
                    </li>
                    &nbsp;
                    <li class="nav-item">
                        <div class="nav-link" href="#">Taiko</div>
                    </li>
                    &nbsp;
                    <li class="nav-item">
                        <div class="nav-link">Catch The Beat</div>
                    </li>
                    &nbsp;
                    <li class="nav-item">
                        <div class="nav-link">Mania</div>
                    </li>
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
                        echo '<td><center><div class="badge badge-info">'.number_format($row['pp_std']).'pp</div></center></td>';
                        echo '<td><center><div class="badge badge-success">'.number_format($row['avg_accuracy_std'], 2).'%</div></center></td>';
                        echo '<td><center><div class="badge badge-light">'.number_format($row['total_score_std']).'</div></center></td>';
                        echo '<td><center><div class="badge badge-primary">'.number_format($row['playcount_std']).' plays</div></center></td>';
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
include "../inc/footer.php";
?>