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
$page['title'] = "User Information";
$page['description'] = "idk why i am doing"; 
$navbar_active[1] = $config['global']['servername'];
$navbar_active[2] = "User Information";
$navbar_active[3] = "";





include "inc/header.php";
include "inc/navbar.php";
?>

<div class="main-content" style="min-height: 858px;">
    <!-- First -->
    <section class="section">
        <div class="hero text-white hero-bg-image leu-herocustom1" data-background="/assets/img/background/lune.jpg"
            style="background-image: url(&quot;/assets/img/background/lune.jpg&quot;);">
            <div class="hero-inner">
                <h2>User Information</h2><br><div class="dropdown d-inline mr-2">
                      <button class="btn btn-primary dropdown-toggle leu-disableshadow" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Modes
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item active" href="#">Standard</a>
                        <a class="dropdown-item" href="#">Taiko</a>
                        <a class="dropdown-item" href="#">Catch The Beat</a>
                        <a class="dropdown-item" href="#">Mania</a>
                        <a class="dropdown-item" href="#">Standard (Relax)</a>
                        <a class="dropdown-item" href="#">Taiko (Relax)</a>
                        <a class="dropdown-item" href="#">Catch The Beat (Relax)</a>
                      </div>
                    </div> 
            </div>
        </div>

        <div class="card author-box card-primary leu-herocustom2">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="author-box-left">
                            <img alt="image"
                                src="https://cdn.discordapp.com/avatars/600605776381214738/7db15a83ccd19b7924294a9f877840cc.png"
                                class="rounded-rectangle author-box-picture">
                            <div class="clearfix"></div>
                        </div>
                        <div class="author-box-details">
                            <div class="author-box-name">
                                <h5>ilsubyeega </h5>
                            </div>
                            <div class="author-box-job">
                                <span class="badge badge-info" 
                                data-toggle="tooltip"  data-html="true" data-original-title="This user is developing the keesu.<br>He is actually tryharding.">Developer</span>
                                <span class="badge badge-light" 
                                data-toggle="tooltip"  data-html="true" data-original-title="This user is bad at game lol">Bad Game Player</span>
                            </div><br>
                            Signed up at  <a data-toggle="tooltip" data-original-title="2019/9/8 20:21 AM">4 days ago</a><br>
                            Last seen  <a data-toggle="tooltip" data-original-title="2019/9/8 20:21 AM">4 days ago</a>
                        </div>
                    </div>
                    <br>
                    <div class="col-lg-4">
                        
                    <div class="table-responsive">
                        
                      <table class="table table-sm">
                        <tbody>
                          <tr>
                            <th scope="row">Rank</th>
                            <td><center><span class="badge badge-primary">#1</span></center></td>
                          </tr>
                          <tr>
                            <th scope="row">Performance Point</th>
                            <td><center><span class="badge badge-primary">100 pp</span></center></td>
                          </tr>
                          <tr>
                            <th scope="row">Hit Accuracy</th>
                            <td><center><span class="badge badge-primary">100%</span></center></td>
                          </tr>
                          <tr>
                            <th scope="row">Play Count</th>
                            <td><center><span class="badge badge-primary">1</span></center></td>
                          </tr>
                          </tr>
                          <tr>
                            <th scope="row">Total Score</th>
                            <td><center><span class="badge badge-primary">3,000,000,010</span></center></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    </div>
                </div>

            </div>
</div>

            <div class="card">
                <div class="card-header">
                    <h4>Best Scores</h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        <center>Rank</center>
                                    </th>
                                    <th>
                                        <center>Map</center>
                                    </th>
                                    <th>
                                        <center>Score</center>
                                    </th>
                                    <th>
                                        <center>Date</center>
                                    </th>
                                    <th>
                                        <center>pp</center>
                                    </th>
                                    <th>
                                        <center>Accuracy</center>
                                    </th>
                                    <th>
                                        <center>Action</center>
                                    </th>
                                </tr>
                                <tr>
                                    <td class="p-0 text-center">
                                        SS
                                    </td>
                                    <td><a href="#" data-toggle="tooltip"
                                                    data-html="true" data-original-title="Mapped by ilsubyeega <br> 5.61★">yay i'm seunglabfx [yay you are being chicken]</a></td>
                                    <td><a data-toggle="tooltip" data-original-title="1307x">1,100,100,100</a></td>
                                    <td>
                                        <center>
                                            <a data-toggle="tooltip" data-original-title="2019/9/8 20:21 AM">2
                                                days ago</a>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                        <a data-toggle="tooltip" data-original-title="100pp (100pp, 100%)">100pp</a>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                        <a data-toggle="tooltip" data-placement="left" 
                                                    data-html="true" data-original-title="
                                                    300: 1 <br>
                                                    Gekis: 1<br>
                                                    100: 1<br>
                                                    Katus: 1<br>
                                                    50: 1<br>
                                                    Misses: 1
                                                    ">100%</a>
                                        </center>
                                    </td>
                                    <td>
                                        <center><button type="button" class="btn btn-primary" data-toggle="tooltip"
                                                data-original-title="Download Replay">
                                                <i class="fas fa-star"></i>
                                            </button></center>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>


                <div class="card">
                    <div class="card-header">
                        <h4>Recent Scores</h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th>
                                            <center>Rank</center>
                                        </th>
                                        <th>
                                            <center>Map</center>
                                        </th>
                                        <th>
                                        <center>Score</center>
                                    </th>
                                        <th>
                                            <center>Date</center>
                                        </th>
                                        <th>
                                            <center>pp</center>
                                        </th>
                                        <th>
                                            <center>Accuracy</center>
                                        </th>

                                        <th>
                                            <center>Status</center>
                                        </th>
                                        <th>
                                            <center>Action</center>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td class="p-0 text-center">
                                            SS
                                        </td>
                                        <td><a href="#" data-toggle="tooltip"
                                                    data-html="true" data-original-title="Mapped by ilsubyeega <br> 5.61★">yay i'm seunglabfx [yay you are being chicken]</a></td>
                                        <td><a data-toggle="tooltip" data-original-title="1307x">1,100,100,100</a></td>
                                        <td>
                                            <center>
                                                <a data-toggle="tooltip" title=""
                                                    data-original-title="2019/9/8 20:21 AM">2 days ago</a>
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                100pp
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                            <a data-toggle="tooltip" data-placement="left" 
                                                    data-html="true" data-original-title="
                                                    300: 1 <br>
                                                    Gekis: 1<br>
                                                    100: 1<br>
                                                    Katus: 1<br>
                                                    50: 1<br>
                                                    Misses: 1
                                                    ">100%</a>
                                            </center>
                                        </td>

                                        <td>
                                            <center>
                                                <div class="badge badge-success" data-toggle="tooltip"
                                                    data-original-title="Completed"><i class="fas fa-check"></i></div>
                                            </center>
                                        </td>
                                        <td>
                                            <center><button type="button" class="btn btn-primary" data-toggle="tooltip"
                                                    data-original-title="Download Replay">
                                                    <i class="fas fa-star"></i>
                                                </button></center>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>





            <?php include "inc/footer.php";
?>