
<body class="layout-3">
	<div id="app">
		<div class="main-wrapper container">
			<div class="navbar-bg"></div>
			<nav class="navbar navbar-expand-lg main-navbar">
				<a href="https://leu.kr/" class="navbar-brand sidebar-gone-hide">&nbsp; Leu</a>

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
					
					
						<li class="nav-item <? echo NavActive("Home", $navbar_active[2]); ?>">
							<a href="/" class="nav-link"><i class="far fa-heart"></i><span>Home</span></a>
						</li>
						
						
						<li class="nav-item <? echo NavActive("Leaderboards", $navbar_active[2]); ?> dropdown">
							<a data-toggle="dropdown" class="nav-link has-dropdown"><i class="far fa-chart-bar"></i><span>Leaderboards</span></a>
							<ul class="dropdown-menu">
								<li class="nav-item <? echo NavActive("LeadNormal", $navbar_active[3]); ?>"><a href="/leaderboards/normal/std" class="nav-link"><i class="fas fa-cookie-bite"></i>&nbsp; Normal</a></li>
								
								<li class="nav-item <? echo NavActive("LeadRelax", $navbar_active[3]); ?>"><a href="/leaderboards/relax/std" class="nav-link"><i class="fas fa-cookie"></i>&nbsp; Relax</a></li>
							</ul>
						</li>
						
						
						<li class="nav-item <? echo NavActive("Info", $navbar_active[2]); ?> dropdown">
							<a data-toggle="dropdown" class="nav-link has-dropdown"><i class="far fa-copy"></i><span>Info</span></a>
							<ul class="dropdown-menu">
							
								<li class="nav-item <? echo NavActive("IJoinDiscord", $navbar_active[3]); ?>"><a href="https://discord.gg/aC2G7dm" class="nav-link"><i class="far fa-comment-alt"></i>&nbsp; Join Discord</a></li>
								
								<li class="nav-item <? echo NavActive("Docs", $navbar_active[3]); ?>"><a href="/docs" class="nav-link">Documentation</a></li>
								<li class="nav-item <? echo NavActive("Licenses", $navbar_active[3]); ?>"><a href="/licenses" class="nav-link">LICENSES</a></li>
							</ul>
						</li>
						<li class="nav-item <? echo NavActive("DownloadSwitcher", $navbar_active[2]); ?>">
							<a href="/downloadswitcher" class="nav-link"><i class="far fa-snowflake"></i><span>Download Switcher</span></a>
						</li>
					</ul>
				</div>
			</nav>