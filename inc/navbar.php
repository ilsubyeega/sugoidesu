<body class="layout-3">
	<div id="app">
		<div class="main-wrapper container">
			<div class="navbar-bg"></div>
			<nav class="navbar navbar-expand-lg main-navbar">
				<a href="index.html" class="navbar-brand sidebar-gone-hide">&nbsp; Leu</a>

				<div>
					<ul class="navbar-nav">
						<a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
						<li class="nav-item active"><a href="/" class="nav-link">Keesu</a><div class="navbar-nav">
          
        </div></li>
					</ul>
				</div>

			</nav>

			<nav class="navbar navbar-secondary navbar-expand-lg">
				<div class="container">
					<ul class="navbar-nav">
					
					
						<li class="nav-item <? echo NavActive(Home, $navbar_active[2]); ?>">
							<a href="/" class="nav-link"><i class="far fa-heart"></i><span>Home</span></a>
						</li>
						
						
						<li class="nav-item <? echo NavActive(Leaderboards, $navbar_active[2]); ?> dropdown">
							<a data-toggle="dropdown" class="nav-link has-dropdown"><i class="far fa-chart-bar"></i><span>Leaderboards</span></a>
							<ul class="dropdown-menu">
								<li class="nav-item <? echo NavActive(LeadNormal, $navbar_active[3]); ?>"><a href="/leaderboards/normal" class="nav-link"><i class="fas fa-cookie-bite"></i>&nbsp; Normal</a></li>
								
								<li class="nav-item <? echo NavActive(LeadRelax, $navbar_active[3]); ?>"><a href="/leaderboards/relax" class="nav-link"><i class="fas fa-cookie"></i>&nbsp; Relax</a></li>
							</ul>
						</li>
						
						
						<li class="nav-item <? echo NavActive(Info, $navbar_active[2]); ?> dropdown">
							<a data-toggle="dropdown" class="nav-link has-dropdown"><i class="far fa-copy"></i><span>Info</span></a>
							<ul class="dropdown-menu">
							
								<li class="nav-item <? echo NavActive(IJoinDiscord, $navbar_active[3]); ?>"><a href="https://discord.gg/jqKNUcT" class="nav-link"><i class="far fa-comment-alt"></i>&nbsp; Join Discord</a></li>
								
								<li class="nav-item dropdown"><a class="nav-link has-dropdown">Documentation</a>
									<ul class="dropdown-menu">
										<li class="nav-item"><a href="/docs/what_is_Keesu" class="nav-link">What is Keesu?</a></li>
										<li class="nav-item"><a href="/docs/How_to_connect" class="nav-link">How to connect</a></li>
										<li class="nav-item"><a href="/docs/How_to_register" class="nav-link">How to register</a></li>
										<li class="nav-item"><a href="/docs/Rank_the_Beatmaps" class="nav-link">Rank the Beatmaps</a></li>
									</ul>
								</li>
								<li class="nav-item <? echo NavActive(ILICENSES, $navbar_active[3]); ?>"><a href="/licenses" class="nav-link">LICENSES</a></li>
							</ul>
						</li>
						<li class="nav-item">
							<a href="/downloadswitcher" class="nav-link <? echo NavActive(DownloadSwitcher, $navbar_active[3]); ?>"><i class="far fa-snowflake"></i><span>Download Switcher</span></a>
						</li>
					</ul>
				</div>
			</nav>