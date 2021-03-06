<html>

<head>
	<title>Website Yayasan Alfasalam</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="assets2/css/main.css" />
</head>

<body>

	<!-- Header -->
	<header id="header">
		<div class="inner">
			<a href="index.html" class="logo">Theory</a>
			<nav id="nav">
				<a href="index.html">Home</a>
				<a href="generic.html">Generic</a>
				<a href="elements.html">Elements</a>
				<!-- Header Content -->
				<div class="content-header">
					<!-- Left Section -->
					<div class="d-flex align-items-center">
						<!-- Toggle Sidebar -->
						<!-- Layout API, functionality initialized in Template._uiApiLayout()-->
						<button type="button" class="btn btn-sm btn-dual mr-2 d-lg-none" data-toggle="layout" data-action="sidebar_toggle">
							<i class="fa fa-fw fa-bars"></i>
						</button>
						<!-- END Toggle Sidebar -->

						<!-- Toggle Mini Sidebar -->
						<!-- Layout API, functionality initialized in Template._uiApiLayout()-->
						<button type="button" class="btn btn-sm btn-dual mr-2 d-none d-lg-inline-block" data-toggle="layout" data-action="sidebar_mini_toggle">
							<i class="fa fa-fw fa-ellipsis-v"></i>
						</button>
						<!-- END Toggle Mini Sidebar -->
					</div>
					<!-- END Left Section -->

					<!-- Right Section -->
					<div class="d-flex align-items-center">
						<!-- User Dropdown -->
						<div class="dropdown d-inline-block ml-2">
							<button type="button" class="btn btn-sm btn-dual" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<img class="rounded" src="{{ asset('media/avatars/avatar10.jpg') }}" alt="Header Avatar" style="width: 18px;">
								<span class="d-none d-sm-inline-block ml-1">{{Auth::guard('warga_belajar')->user()->nama_panggilan}}</span>
								<i class="fa fa-fw fa-angle-down d-none d-sm-inline-block"></i>
							</button>
							<div class="dropdown-menu dropdown-menu-right p-0 border-0 font-size-sm" aria-labelledby="page-header-user-dropdown">
								<div class="p-3 text-center bg-primary">
									<img class="img-avatar img-avatar48 img-avatar-thumb" src="{{ asset('media/avatars/avatar10.jpg') }}" alt="">
								</div>
								<div class="p-2">
									<h5 class="dropdown-header text-uppercase">User Options</h5>
									<a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
										<span>Settings</span>
										<i class="si si-settings"></i>
									</a>
									<div role="separator" class="dropdown-divider"></div>
									<h5 class="dropdown-header text-uppercase">Actions</h5>
									<a class="dropdown-item d-flex align-items-center justify-content-between" href="{{route('warga_belajar.logout')}}">
										<span>Log Out</span>
										<i class="si si-logout ml-1"></i>
									</a>
								</div>
							</div>
						</div>
						<!-- END User Dropdown -->
					</div>
					<!-- END Right Section -->
				</div>
				<!-- END Header Content -->
			</nav>
			<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
		</div>
	</header>

	<!-- Banner -->
	<section id="banner">
		<h1>Welcome to Theory</h1>
		<p>A free responsive HTML5 website template by TEMPLATED.</p>
	</section>

	<!-- One -->
	<section id="one" class="wrapper">
		<div class="inner">
			<div class="flex flex-3">
				<article>
					<header>
						<h3>Magna tempus sed amet<br /> aliquam veroeros</h3>
					</header>
					<p>Morbi interdum mollis sapien. Sed ac risus. Phasellus lacinia, magna a ullamcorper laoreet, lectus arcu.</p>
					<footer>
						<a href="#" class="button special">More</a>
					</footer>
				</article>
				<article>
					<header>
						<h3>Interdum lorem pulvinar<br /> adipiscing vitae</h3>
					</header>
					<p>Morbi interdum mollis sapien. Sed ac risus. Phasellus lacinia, magna a ullamcorper laoreet, lectus arcu.</p>
					<footer>
						<a href="#" class="button special">More</a>
					</footer>
				</article>
				<article>
					<header>
						<h3>Libero purus magna sapien<br /> sed ullamcorper</h3>
					</header>
					<p>Morbi interdum mollis sapien. Sed ac risus. Phasellus lacinia, magna a ullamcorper laoreet, lectus arcu.</p>
					<footer>
						<a href="#" class="button special">More</a>
					</footer>
				</article>
			</div>
		</div>
	</section>

	<!-- Two -->
	<section id="two" class="wrapper style1 special">
		<div class="inner">
			<header>
				<h2>Ipsum Feugiat</h2>
				<p>Semper suscipit posuere apede</p>
			</header>
			<div class="flex flex-4">
				<div class="box person">
					<div class="image round">
						<img src="images/pic03.jpg" alt="Person 1" />
					</div>
					<h3>Magna</h3>
					<p>Cipdum dolor</p>
				</div>
				<div class="box person">
					<div class="image round">
						<img src="images/pic04.jpg" alt="Person 2" />
					</div>
					<h3>Ipsum</h3>
					<p>Vestibulum comm</p>
				</div>
				<div class="box person">
					<div class="image round">
						<img src="images/pic05.jpg" alt="Person 3" />
					</div>
					<h3>Tempus</h3>
					<p>Fusce pellentes</p>
				</div>
				<div class="box person">
					<div class="image round">
						<img src="images/pic06.jpg" alt="Person 4" />
					</div>
					<h3>Dolore</h3>
					<p>Praesent placer</p>
				</div>
			</div>
		</div>
	</section>

	<!-- Three -->
	<section id="three" class="wrapper special">
		<div class="inner">
			<header class="align-center">
				<h2>Nunc Dignissim</h2>
				<p>Aliquam erat volutpat nam dui </p>
			</header>
			<div class="flex flex-2">
				<article>
					<div class="image fit">
						<img src="images/pic01.jpg" alt="Pic 01" />
					</div>
					<header>
						<h3>Praesent placerat magna</h3>
					</header>
					<p>Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor lorem ipsum.</p>
					<footer>
						<a href="#" class="button special">More</a>
					</footer>
				</article>
				<article>
					<div class="image fit">
						<img src="images/pic02.jpg" alt="Pic 02" />
					</div>
					<header>
						<h3>Fusce pellentesque tempus</h3>
					</header>
					<p>Sed adipiscing ornare risus. Morbi est est, blandit sit amet, sagittis vel, euismod vel, velit. Pellentesque egestas sem. Suspendisse commodo ullamcorper magna non comodo sodales tempus.</p>
					<footer>
						<a href="#" class="button special">More</a>
					</footer>
				</article>
			</div>
		</div>
	</section>

	<!-- Footer -->
	<footer id="footer">
		<div class="inner">
			<div class="flex">
				<div class="copyright">
					&copy; Untitled. Design: <a href="https://templated.co">TEMPLATED</a>. Images: <a href="https://unsplash.com">Unsplash</a>.
				</div>
				<ul class="icons">
					<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
					<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
					<li><a href="#" class="icon fa-linkedin"><span class="label">linkedIn</span></a></li>
					<li><a href="#" class="icon fa-pinterest-p"><span class="label">Pinterest</span></a></li>
					<li><a href="#" class="icon fa-vimeo"><span class="label">Vimeo</span></a></li>
				</ul>
			</div>
		</div>
	</footer>

	<!-- Scripts -->
	<script src="assets2/js/jquery.min.js"></script>
	<script src="assets2/js/skel.min.js"></script>
	<script src="assets2/js/util.js"></script>
	<script src="assets2/js/main.js"></script>

</body>

</html>