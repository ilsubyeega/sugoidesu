<?
include "inc/function.php";


# Page Settings
$page['title'] = "Error";
$page['description'] = "idk why i am doing"; 
$navbar_active[1] = "Keesu";
$navbar_active[2] = "Error";
#$navbar_active[3] = "";

# Header Settings (If is not sets, it won't be shown)
$header['background_image'] = "/assets/img/unsplash/andre-benz-1214056-unsplash.jpg";
$header['title'] = "Error (Not Found)";
$header['description'] = "";


# Web Content
include "inc/header.php";
include "inc/navbar.php";
include "inc/base1.php";


?>
<div class="card">
                  <div class="card-header">
                    <h4>Not Found</h4>
                  </div>
                  <div class="card-body">
                    <div class="empty-state" data-height="400" style="height: 400px;">
                      <div class="empty-state-icon bg-danger">
                        <i class="fas fa-times"></i>
                      </div>
                      <h2>404 Not Found</h2>
                      <p class="lead">
                        We tried it, but there are no files about that.
                      </p>
                      <a href="" class="btn btn-warning mt-4">Try Again</a>
                      <a href="/" class="mt-4 bb">Go to Home</a>
                    </div>
                  </div>
                </div>

<?
include "inc/footer.php";
?>