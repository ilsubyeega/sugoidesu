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
$page['title'] = "User Information";
$page['description'] = ""; 
$navbar_active[1] = $config['global']['servername'];
$navbar_active[2] = "User Information";
$navbar_active[3] = "";





include "inc/header.php";
include "inc/navbar.php";

$user_id = isset($_GET['u']) ? (int)$_GET['u'] : -1;
$mode = isset($_GET['m']) ? (int)$_GET['m'] : 0;



 
    switch ($mode) {
        default:
            $sql_table = "scores";
            $sql_modid = 0;
            $now_active = "std";
            $sql_stattable = "users_stats";
            $sql_statcolumn = "std";
            break;
        case 1:
            $sql_table = "scores";
            $sql_modid = 1;
            $now_active = "taiko";
            $sql_stattable = "users_stats";
            $sql_statcolumn = "taiko";
            break;
        case 2:
            $sql_table = "scores";
            $sql_modid = 2;
            $now_active = "ctb";
            $sql_stattable = "users_stats";
            $sql_statcolumn = "ctb";
            break;
        case 3:
            $sql_table = "scores";
            $sql_modid = 3;
            $now_active = "mania";
            $sql_stattable = "users_stats";
            $sql_statcolumn = "mania";
            break;
        case 4:
            $sql_table = "scores_relax";
            $sql_modid = 0;
            $now_active = "rx_std";
            $sql_stattable = "rx_stats";
            $sql_statcolumn = "std";
            break;
        case 5:
            $sql_table = "scores_relax";
            $sql_modid = 1;
            $now_active = "rx_taiko";
            $sql_stattable = "rx_stats";
            $sql_statcolumn = "taiko";
            break;
        case 6:
            $sql_table = "scores_relax";
            $sql_modid = 2;
            $now_active = "rx_ctb";
            $sql_stattable = "rx_stats";
            $sql_statcolumn = "ctb";
            break;
    }
    if ($mysqli_result = $mysqli->query("
    SELECT * from users 
    WHERE `id`=".$user_id.";")){
        if ($mysqli_result->num_rows > 0){
            $username = $mysqli_result->fetch_assoc()['username'];
            
            $mysqli_result2 = $mysqli->query("SELECT * from ".$sql_stattable." WHERE `id`=".$user_id.";");
        } else {
            $user_id= -1;
        }
    } else {
        $user_id= -1;
    }
?>

<script src="/assets/js/userpage.js"></script>
<div class="main-content" style="min-height: 858px;">
    <!-- First -->
    <section class="section">
        <div class="hero text-white hero-bg-image leu-herocustom1" data-background="/assets/img/background/lune.jpg"
            style="background-image: url(&quot;/assets/img/background/lune.jpg&quot;);">
            <div class="hero-inner">
                <h2>User Information</h2>
            </div>
        </div>

        <div class="card author-box card-primary leu-herocustom2">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-8">
                        <? if ($user_id>-1){?>
                        <div class="author-box-left">
                            <img alt="image" src="https://a.osu.leu.kr/<?echo $user_id;?>"
                                class="rounded-rectangle author-box-picture">
                            <div class="clearfix"></div>
                        </div>

                        <div class="author-box-details">
                            <div class="author-box-name">
                                <h5 class="leu-comfortaa">
                                    <?echo $username;?>
                                </h5>
                            </div>

                            <?} else {?>

                            <h5 class="leu-comfortaa">User not found </h5>


                            <? } ?>

                            <? if ($user_id==1) {?>

                            <div class="author-box-job">

                                <span class="badge badge-info" data-toggle="tooltip" data-html="true"
                                    data-original-title="This user is developing the keesu.<br>He is actually tryharding.">Developer</span>
                                <span class="badge badge-light" data-toggle="tooltip" data-html="true"
                                    data-original-title="This user is bad at game lol">Bad Game Player</span>

                            </div><br>
                            <? } ?>
                            <? if ($user_id==2 || $user_id==4) {?>

                            <div class="author-box-job">

                                <span class="badge badge-info" data-toggle="tooltip" data-html="true"
                                    data-original-title="This user is developing the keesu.">Developer</span>

                            </div><br>
                            <? } ?>
                            <!--
                            Signed up at <a data-toggle="tooltip" data-original-title="2019/9/8 20:21 AM">4 days
                                ago</a><br>
                            Last seen <a data-toggle="tooltip" data-original-title="2019/9/8 20:21 AM">4 days ago</a>
                            -->

                        </div>
                    </div>
                    <br>
                    <div class="col-lg-4">
                    <? if ($user_id>-1){?>
                        <div class="table-responsive" id="user">

                            <table class="table table-sm">
                                <tbody>
                                    <tr>
                                        <th scope="row">Rank</th>
                                        <td>
                                            <center><span class="badge badge-primary">Unknown</span></center>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Performance Point</th>
                                        <td>
                                            <center><span class="badge badge-primary"><? $rs = $mysqli_result2->fetch_assoc();
                                             echo number_format($rs['pp_'.$sql_statcolumn])?> pp</span></center>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Hit Accuracy</th>
                                        <td>
                                            <center><span class="badge badge-primary"><? echo number_format($rs['avg_accuracy_'.$sql_statcolumn], 2);?>%</span></center>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Play Count</th>
                                        <td>
                                            <center><span class="badge badge-primary"><? echo number_format($rs['playcount_'.$sql_statcolumn]);?></span></center>
                                        </td>
                                    </tr>
                                    </tr>
                                    <tr>
                                        <th scope="row">Total Score</th>
                                        <td>
                                            <center><span class="badge badge-primary"><? echo number_format($rs['total_score_'.$sql_statcolumn])?></span></center>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    <? } ?>
                    </div>
                </div>

            </div>
        </div>

        <div class="card">
            <div class="leu-modeselect-bef"></div>
            <center>
                <div class="leu-modeselect">
                    <?
                    echo '<a href="user?u='.$user_id.'&m=0" class="leu-modebutton'.(($now_active=="std") ? "-active" : "").'">osu!</a>'.
                    '<a href="user?u='.$user_id.'&m=1" class="leu-modebutton'.(($now_active=="taiko") ? "-active" : "").'">osu!taiko</a>'.
                    '<a href="user?u='.$user_id.'&m=2" class="leu-modebutton'.(($now_active=="ctb") ? "-active" : "").'">osu!catch</a>'.
                    '<a href="user?u='.$user_id.'&m=3" class="leu-modebutton'.(($now_active=="mania") ? "-active" : "").'">osu!mania</a>'.
                '</div>'.
                '<br>'.
                '<div class="leu-modeselect">'.
                '<a href="user?u='.$user_id.'&m=4" class="leu-modebutton-down'.(($now_active=="rx_std") ? "-active" : "").'">osu! (relax)</a>'.
                '<a href="user?u='.$user_id.'&m=5" class="leu-modebutton-down'.(($now_active=="rx_taiko") ? "-active" : "").'">osu!taiko (relax)</a>'.
                '<a href="user?u='.$user_id.'&m=6" class="leu-modebutton-down'.(($now_active=="rx_ctb") ? "-active" : "").'">osu!ctb (relax)</a>'.
                '</div>';
                ?>
            </center>
            <div class="card-header">
                <h4>Best Scores</h4>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped" id="best">

                    </table>
                </div>
            </div>


            <div class="card">
                <div class="card-header">
                    <h4>Recent Scores</h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped" id="recent">

                        </table>

                    </div>
                </div>
            </div>
        </div>





        <?php include "inc/footer.php";?>
<script>

var best = <?
    if ($mysqli_result = $mysqli->query("
    SELECT s.*, b.`song_name` from ".$sql_table." as s
    INNER JOIN beatmaps AS b ON b.beatmap_md5 = s.beatmap_md5 
    INNER JOIN users AS u ON u.id = s.userid 
    WHERE s.`completed`=3 AND s.`userid`=".$user_id." AND s.`play_mode`=".$sql_modid."
    ORDER BY s.`pp` DESC LIMIT 10;")){
        if ($mysqli_result->num_rows > 0){
            echo json_encode($mysqli_result->fetch_all(MYSQLI_ASSOC));
        } else {
            echo "[]";
        }
    } else {
        echo "[]";
    }
    
 ?>;
var recent = <?
    if ($mysqli_result = $mysqli->query("
    SELECT s.*, b.`song_name` from ".$sql_table." as s
    INNER JOIN beatmaps AS b ON b.beatmap_md5 = s.beatmap_md5 
    INNER JOIN users AS u ON u.id = s.userid 
    WHERE s.`userid`=".$user_id." AND s.`play_mode`=".$sql_modid."
    ORDER BY s.`time` DESC LIMIT 10;")){
        if ($mysqli_result->num_rows > 0){
            echo json_encode($mysqli_result->fetch_all(MYSQLI_ASSOC));
        } else {
            echo "[]";
        }
    } else {
        echo "[]";
    }
    
 ?>;

 RenderBest(best);
 RenderRecent(recent);
</script>