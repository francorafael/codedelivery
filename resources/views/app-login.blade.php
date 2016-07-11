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

<div id="row">
	<div id="container">


		<!-- BEGIN MAIN PAGE CONTENT -->
		<div id="col-md-12">

			@yield('content')
			<!-- BEGIN FOOTER CONTENT -->
					<div class="footer-content" style="color:white; text-align: center">
						&copy; 2016 <a href="#">CodeDelivery</a>, All Rights Reserved.
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

	<script src="{{ url('assets/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
	<script src="{{ url('assets/js/plugins/datatables/datatables.js') }}"></script>
	<script src="{{ url('assets/js/plugins/datatables/datatables.responsive.js') }}"></script>

	<script src="{{ url('assets/js/plugins/datatables/datatables.init.js') }}"></script>


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
