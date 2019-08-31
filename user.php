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

$header['background_image'] = "../assets/img/unsplash/andre-benz-1214056-unsplash.jpg";
$header['title'] = "User Information";
$header['description'] = "";




include "inc/header.php";
include "inc/navbar.php";
include "inc/base1.php";
?>




            
            <div class="row">
              
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped table-md">
                        <tbody><tr>
                          <th><center>Rank</center></th>
                          <th><center>Username</center></th>
                          <th><center>pp</center></th>
                          <th><center>Accuracy</center></th>
                          <th><center>Playcount</center></th>
                        </tr>
                        <tr>
                          <td><center>#1</center></td>
                          <td><center><a href="/u/1000">ilsubyeega</a></center></td>
                          <td><center><div class="badge badge-primary">7,652pp</div></center></center></td>
                          <td><center><div class="badge badge-secondary">100%</div></center></td>
                          <td><center><a href="#" class="badge badge-info">1,024</a></center></td>
                        </tr>
                        <tr>
                          <td><center>#2</center></td>
                          <td><center><a href="/u/1000">ilsubyeega</a></center></td>
                          <td><center><div class="badge badge-primary">7,652pp</div></center></center></td>
                          <td><center><div class="badge badge-secondary">100%</div></center></td>
                          <td><center><a href="#" class="badge badge-info">1,024</a></center></td>
                        </tr>
                        <tr>
                          <td><center>#3</center></td>
                          <td><center><a href="/u/1000">ilsubyeega</a></center></td>
                          <td><center><div class="badge badge-primary">7,652pp</div></center></center></td>
                          <td><center><div class="badge badge-secondary">100%</div></center></td>
                          <td><center><a href="#" class="badge badge-info">1,024</a></center></td>
                        </tr>
                        <tr>
                          <td><center>#4</center></td>
                          <td><center><a href="/u/1000">ilsubyeega</a></center></td>
                          <td><center><div class="badge badge-primary">7,652pp</div></center></center></td>
                          <td><center><div class="badge badge-secondary">100%</div></center></td>
                          <td><center><a href="#" class="badge badge-info">1,024</a></center></td>
                        </tr>
                        <tr>
                          <td><center>#5</center></td>
                          <td><center><a href="/u/1000">ilsubyeega</a></center></td>
                          <td><center><div class="badge badge-primary">7,652pp</div></center></center></td>
                          <td><center><div class="badge badge-secondary">100%</div></center></td>
                          <td><center><a href="#" class="badge badge-info">1,024</a></center></td>
                        </tr>
                      </tbody></table>
                    </div>
                  </div>
                  <div class="card-footer text-right">
                    <nav class="d-inline-block">
                      <ul class="pagination mb-0">
                        <li class="page-item disabled">
                          <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                        <li class="page-item">
                          <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                          <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                        </li>
                      </ul>
                    </nav>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>

<?
include "inc/footer.php";
?>