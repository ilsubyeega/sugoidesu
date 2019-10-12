<?php
#
#
# SugoiDesu! (https://github.com/ilsubyeega/sugoidesu)
# This File is Licensed as GNU Affero General Public License v3.0
# Find out more: https://github.com/ilsubyeega/sugoidesu/blob/master/LICENSE
#
#
#
?>
<div class="main-content" style="min-height: 858px;">
        <section class="section">
		<div class="hero text-white hero-bg-image leu-herocustom1" data-background="<? echo $header['background_image']; ?>" style="background-image: url(&quot;<? echo $header['background_image']; ?>&quot;);">
                  <div class="hero-inner">
                    <?php                    global $mode, $relax;
                    if (isset($header['title'])){
                      echo '<h2>'.$header['title'].'</h2>';
                    }
                     
                    if (isset($header['description'])){
                      echo $header['description'];
                    }
					
					//Leaderboard (leaderbaord normal-mania)
					if (isset($relax) && isset($relax)){
						if ($relax==0 && $mode=="mania"){
						  echo '<div class="mt-4"><div class="btn btn-lg leu-transparent">There is no relax on osu!mania :(</div></div>';
						} else if (isset($header['button']['text']) && isset($header['button']['icon']) && isset($header['button']['url'])){
						   echo '<div class="mt-4"><a href="'.$header['button']['url'].
						   '" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="'.$header['button']['icon'].
						   '"></i>&nbsp; '.$header['button']['text'].'</a></div>';
						}
					}
                    ?>
                    
                  </div>
                </div>
          <div class="section-header leu-herocustom2">
            <?php            if (isset($header['footerdesc'])){
              echo '<div class="breadcrumb-item active">'.$header['footerdesc'].'</div>';
            }
            ?>    
            <div class="section-header-breadcrumb">
              <? 
              if (isset($navbar_active[1])){
                echo '<div class="breadcrumb-item active">'.$navbar_active[1].'</div>';
              }
              if (isset($navbar_active[2])){
                echo '<div class="breadcrumb-item">'.$navbar_active[2].'</div>';
              }
              if (isset($navbar_active[3])){
                echo '<div class="breadcrumb-item">'.$navbar_active[3].'</div>';
              }
              ?>
            </div>
          </div>

          <div class="section-body">