<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CodeDelivery</title>

	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ url('assets/css/fonts.css') }}">
	<link rel="stylesheet" href="{{ url('assets/font-awesome/css/font-awesome.min.css') }}">

	<!-- PAGE LEVEL PLUGINS STYLES -->
	<link href="{{ url('assets/css/plugins/daterangepicker/daterangepicker-bs3.css') }}" rel="stylesheet">
	<link href="{{ url('assets/css/plugins/morris/morris.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ url('assets/css/plugins/bootstrap-datepicker/datepicker.css') }}">
	<!-- REQUIRE FOR SPEECH COMMANDS -->

	<!-- Tc core CSS -->
	<link id="qstyle" rel="stylesheet" href="{{ url('assets/css/themes/style.css') }}">
	<link href="{{ url('assets/css/bootstrap-dialog.min.css') }}" rel="stylesheet">
	<link href="{{ url('assets/css/select2.css') }}" rel="stylesheet" />


	<!-- Add custom CSS here -->
	<link rel="stylesheet" href="{{ url('assets/css/only-for-demos.css') }}">
	<style type="text/css">
		body,td,th {
			font-family: "Open Sans", sans-serif;
		}
	</style>

	<!-- End custom CSS here -->

	<!--[if lt IE 9]>
	<script src="{{ url('assets/js/html5shiv.js') }}"></script>
	<script src="{{ url('assets/js/respond.min.js') }}"></script>
	<![endif]-->

	<!--[if lte IE 8]>
	<script src="{{ url('assets/js/plugins/easypiechart/easypiechart.ie-fix.js') }}"></script>
	<![endif]-->
</head>
<body>

<div id="wrapper">
	<div id="main-container">
		<!-- BEGIN TOP NAVIGATION -->
		<nav class="navbar-top" role="navigation">
			<!-- BEGIN BRAND HEADING -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle pull-right" data-toggle="collapse" data-target=".top-collapse">
					<i class="fa fa-bars"></i>
				</button>
				<div class="navbar-brand">
					<a href="{{ url('/home') }}">
						CodeDelivery
					</a>
				</div>
			</div>
			<!-- END BRAND HEADING -->
			<div class="nav-top">

				<ul class="nav navbar-right">

					<!--Search Box-->
					<li class="dropdown nav-search-icon show-on-hover">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<span class="glyphicon glyphicon-search"></span>
						</a>
						<ul class="dropdown-menu dropdown-search">
							<li>
								<div class="search-box">
									<form class="" role="search">
										<input type="text" class="form-control" placeholder="Search">
									</form>
								</div>
							</li>
						</ul>
					</li>
					<!--Search Box-->
					@if(auth()->guest())
					@if(!Request::is('auth/login'))
					<!--Speech Icon-->
					<li class="dropdown show-on-hover">
						<a href="{{ url('/auth/login') }}">
							<i class="fa fa-sign-in"></i> Login
						</a>
					</li>
					@endif
					@if(!Request::is('auth/register'))
					<li class="dropdown show-on-hover">
						<a href="{{ url('/auth/register') }}">
							<i class="fa fa-user-plus"></i> Register
						</a>
					</li>
					@endif
					@else
					<li class="dropdown show-on-hover">
						<a href="#">
							<i class="fa fa-user"></i> {{ auth()->user()->name }}
						</a>
					</li>
					<li class="dropdown show-on-hover">
						<a href="{{ url('/auth/logout') }}">
							<i class="fa fa-power-off"></i> Logout
						</a>
					</li>
					@endif

				</ul>

				<!-- BEGIN TOP MENU -->
				<div class="collapse navbar-collapse top-collapse">
					<!-- .nav -->
					<ul class="nav navbar-left navbar-nav">
						<li><a href="{{ url('/home') }}">Dashboard</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								Categories <b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li><a href="{{ route('admin.categories.create') }}">Add Category</a></li>
								<li><a href="{{ route('admin.categories.index') }}">List Categories</a></li>
							</ul>
						</li>

						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								Products <b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li><a href="{{ route('admin.products.create') }}">Add Product</a></li>
								<li><a href="{{ route('admin.products.index') }}">List Products</a></li>
							</ul>
						</li>

						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								Clients <b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li><a href="{{ route('admin.clients.create') }}">Add Client</a></li>
								<li><a href="{{ route('admin.clients.index') }}">List Clients</a></li>
							</ul>
						</li>
						<li><a href="{{ route('admin.orders.index') }}">Orders</a></li>
					</ul><!-- /.nav -->


				</div>
				<!-- END TOP MENU -->

			</div><!-- /.nav-top -->
		</nav><!-- /.navbar-top -->
		<!-- END TOP NAVIGATION -->


		<!-- BEGIN SIDE NAVIGATION -->
		<nav class="navbar-side" role="navigation">
			<div class="navbar-collapse sidebar-collapse collapse">

				<ul id="side" class="nav navbar-nav side-nav">
					<!-- BEGIN SIDE NAV MENU -->
					<!-- Navigation category -->
					<li>
						<h4>Navegation</h4>
					</li>
					<!-- END Navigation category -->

					<li>
						<a href="{{ url('/home') }}">
							<i class="fa fa-dashboard"></i> Dashboard
						</a>
					</li>
					<!-- BEGIN COMPONENTS DROPDOWN -->
					<li class="panel">
						<a  href="javascript:;" data-parent="#side" data-toggle="collapse" class="accordion-toggle" data-target="#categories">
							<i class="fa fa-list"></i> Categories <span class="fa arrow"></span>
						</a>
						<ul class="collapse nav" id="categories">
							<li>
								<a href="{{ route('admin.categories.create') }}">
									<i class="fa fa-plus"></i> Add Category
								</a>
							</li>
							<li>
								<a href="{{ route('admin.categories.index') }}">
									<i class="fa fa-list"></i> List Categories
								</a>
							</li>
						</ul>
					</li>

					<li class="panel">
						<a  href="javascript:;" data-parent="#side" data-toggle="collapse" class="accordion-toggle" data-target="#products">
								<i class="fa fa-cubes"></i> Products <span class="fa arrow"></span>
						</a>
						<ul class="collapse nav" id="products">
							<li>
								<a href="{{ route('admin.products.create') }}">
									<i class="fa fa-plus"></i> Add Product
								</a>
							</li>
							<li>
								<a href="{{ route('admin.products.index') }}">
									<i class="fa fa-list"></i> List Products
								</a>
							</li>
						</ul>
					</li>


					<li class="panel">
						<a  href="javascript:;" data-parent="#side" data-toggle="collapse" class="accordion-toggle" data-target="#clients">
							<i class="fa fa-users"></i> Clients <span class="fa arrow"></span>
						</a>
						<ul class="collapse nav" id="clients">
							<li>
								<a href="{{ route('admin.clients.create') }}">
									<i class="fa fa-plus"></i> Add Client
								</a>
							</li>
							<li>
								<a href="{{ route('admin.clients.index') }}">
									<i class="fa fa-list"></i> List Clients
								</a>
							</li>
						</ul>
					</li>

					<li class="panel">
						<a  href="javascript:;" data-parent="#side" data-toggle="collapse" class="accordion-toggle" data-target="#orders">
							<i class="fa fa-cart-plus"></i> Orders <span class="fa arrow"></span>
						</a>
						<ul class="collapse nav" id="orders">
							<li>
								<a href="{{ route('admin.orders.index') }}">
									<i class="fa fa-list"></i> List Orders
								</a>
							</li>
						</ul>
					</li>

					<!-- END COMPONENTS DROPDOWN -->
				</ul><!-- /.side-nav -->
			</div><!-- /.navbar-collapse -->
		</nav><!-- /.navbar-side -->
		<!-- END SIDE NAVIGATION -->


		<!-- BEGIN MAIN PAGE CONTENT -->
		<div id="page-wrapper">

			@yield('content')
			<!-- BEGIN FOOTER CONTENT -->
			<div class="footer">
				<div class="footer-inner">
					<!-- basics/footer -->
					<div class="footer-content">
						&copy; 2016 <a href="#">CodeDelivery</a>, All Rights Reserved.
					</div>
					<!-- /basics/footer -->
				</div>
			</div>
			<button type="button" id="back-to-top" class="btn btn-primary btn-sm back-to-top">
				<i class="fa fa-angle-double-up icon-only bigger-110"></i>
			</button>
			<!-- END FOOTER CONTENT -->

		</div><!-- /#page-wrapper -->
		<!-- END MAIN PAGE CONTENT -->
	</div>
</div>


	<!-- Scripts -->
	<!-- core JavaScript -->
	<script src="{{ url('assets/js/jquery.min.js') }}"></script>
	<script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
	<script src="{{ url('assets/js/bootstrap-dialog.min.js') }}"></script>
	<script src="{{ url('assets/js/jquery.maskMoney.js') }}"></script>
	<script src="{{ url('assets/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
	<script src="{{ url('assets/js/plugins/pace/pace.min.js') }}"></script>
	<script src="{{ url('assets/js/select2.min.js') }}"></script>

	<!-- PAGE LEVEL PLUGINS JS -->
	<script src="{{ url('assets/js/plugins/jqueryui/jquery-ui.custom.min.js') }}"></script>
	<script src="{{ url('assets/js/plugins/jqueryui/jquery.ui.touch-punch.min.js') }}"></script>
	<script src="{{ url('assets/js/plugins/daterangepicker/moment.js') }}"></script>
	<script src="{{ url('assets/js/plugins/daterangepicker/daterangepicker.js') }}"></script>
	<script src="{{ url('assets/js/plugins/morris/raphael-min.js') }}"></script>
	<script src="{{ url('assets/js/plugins/morris/morris.min.js') }}"></script>
	<script src="{{ url('assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>
	<script src="{{ url('assets/js/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
	<script src="{{ url('assets/js/plugins/easypiechart/jquery.easypiechart.min.js') }}"></script>
	<script src="{{ url('assets/js/plugins/easypiechart/excanvas.compiled.js') }}"></script>
	<script src="{{ url('assets/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
	<script src="{{ url('assets/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>


	<script src="{{ url('assets/js/plugins/footable/footable.min.js') }}"></script>

	<!-- Themes Core Scripts -->
	<script src="{{ url('assets/js/main.js') }}"></script>
	<script src="{{ url('assets/js/acoes.js') }}"></script>

	<!-- REQUIRE FOR SPEECH COMMANDS -->
	<script src="{{ url('assets/js/speech-commands.js') }}"></script>

	<!-- initial page level scripts for examples -->
	<script src="{{ url('assets/js/plugins/slimscroll/jquery.slimscroll.init.js') }}"></script>
	<script src="{{ url('assets/js/home-page.init.js') }}"></script>
	<script src="{{ url('assets/js/plugins/jquery-sparkline/jquery.sparkline.init.js') }}"></script>
	<script src="{{ url('assets/js/plugins/easypiechart/jquery.easypiechart.init.js') }}"></script>
</body>
</html>
