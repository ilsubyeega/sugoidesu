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

<body class="layout-3">
	<div id="app">
		<div class="main-wrapper container">
			<div class="navbar-bg"></div>
			<nav class="navbar navbar-expand-lg main-navbar">
				<a href="https://leu.kr/" class="navbar-brand sidebar-gone-hide">&nbsp; Leu</a>

				<div>
					<ul class="navbar-nav">
						<a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i
								class="fas fa-bars"></i></a>
						<li class="nav-item active"><a href="/" class="nav-link">
								<? echo $config['global']['servername']?></a>
							<div class="navbar-nav">

							</div>
						</li>
					</ul>
				</div>

			</nav>

			<nav class="navbar navbar-secondary navbar-expand-lg">
				<div class="container">
					<ul class="navbar-nav">


						<li class="nav-item <? if (isset($navbar_active[2])){ echo NavActive("Home",
							$navbar_active[2]); } ?>">
							<a href="/" class="nav-link"><i class="far fa-heart"></i><span><?echo $lang['modules']['navbar']['home'];?></span></a>
						</li>


						<li class="nav-item <? if (isset($navbar_active[2])){ echo NavActive("Leaderboards",
							$navbar_active[2]); } ?> dropdown">
							<a data-toggle="dropdown" class="nav-link has-dropdown"><i
									class="far fa-chart-bar"></i><span><?echo $lang['modules']['navbar']['leaderboards']['title'];?></span></a>
							<ul class="dropdown-menu">
								<li class="nav-item <? if (isset($navbar_active[3])){ echo NavActive("LeadNormal",
									$navbar_active[3]); } ?>"><a href="/leaderboards/normal/std" class="nav-link"><i
											class="fas fa-cookie-bite"></i>&nbsp; <?echo $lang['modules']['navbar']['leaderboards']['normal'];?></a></li>

								<li class="nav-item <? if (isset($navbar_active[3])){ echo NavActive("LeadRelax",
									$navbar_active[3]); } ?>"><a href="/leaderboards/relax/std" class="nav-link"><i
											class="fas fa-cookie"></i>&nbsp; <?echo $lang['modules']['navbar']['leaderboards']['relax'];?></a></li>
							</ul>
						</li>


						<li class="nav-item <? if (isset($navbar_active[2])){ echo NavActive("Info",
							$navbar_active[2]); } ?> dropdown">
							<a data-toggle="dropdown" class="nav-link has-dropdown"><i
									class="far fa-copy"></i><span><?echo $lang['modules']['navbar']['info']['title'];?></span></a>
							<ul class="dropdown-menu">

								<li class="nav-item <? if (isset($navbar_active[3])){ echo NavActive("IJoinDiscord",
									$navbar_active[3]); } ?>"><a href="https://discord.gg/aC2G7dm" class="nav-link"><i
											class="far fa-comment-alt"></i>&nbsp; <?echo $lang['modules']['navbar']['info']['joindiscord'];?></a></li>

								<li class="nav-item <? if (isset($navbar_active[3])){ echo NavActive("Docs",
									$navbar_active[3]); } ?>"><a href="/docs" class="nav-link"><?echo $lang['modules']['navbar']['info']['docs'];?></a></li>
								<li class="nav-item <? if (isset($navbar_active[3])){ echo NavActive("Licenses",
									$navbar_active[3]); } ?>"><a href="/licenses" class="nav-link"><?echo $lang['modules']['navbar']['info']['licenses'];?></a></li>
							</ul>
						</li>
						<li class="nav-item <? if (isset($navbar_active[2])){ echo NavActive("DownloadSwitcher",
							$navbar_active[2]); } ?>">
							<a href="/downloadswitcher" class="nav-link"><i class="far fa-snowflake"></i><span><?echo $lang['modules']['navbar']['downloadswitcher'];?></span></a>
						</li></ul>
						<ul class="navbar-nav">
							<li class="nav-item <? if (isset($navbar_active[2])){ echo NavActive("Auth",
								$navbar_active[2]); } ?> dropdown">
								<a data-toggle="dropdown" class="nav-link has-dropdown "><i
										class="fas fa-user"></i><span><?echo $lang['modules']['navbar']['auth']['title'];?></span></a>
										<ul class="dropdown-menu leu-navright">

									<li class="nav-item <? if (isset($navbar_active[3])){ echo NavActive("Register",
										$navbar_active[3]); } ?>"><a href="/auth/register" class="nav-link"><i
												class="fas fa-user-plus"></i>&nbsp; <?echo $lang['modules']['navbar']['auth']['register'];?></a></li>
								
						</ul>
						</li>
					</ul>
				</div>
			</nav>