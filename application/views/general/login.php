
<html>
 <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/template/back/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/template/back/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/template/back/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/template/back/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/template/back/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/template/back/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/template/back/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/template/back/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/template/back/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/template/back/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<head>
	<title> SIJAK HELPDESK</title>
  <link rel="icon" href="<?php echo  base_url('assets/images/surveyor.png')  ?>" type="image/png" sizes="16x16">
  <style type="text/css">
  	body{
      background-color: #FFFFFF !important;
      /*background-repeat: no-repeat;*/
      background-size: 100% 100%;
    }
  </style>
</head>

<body style="background: #FFFFFF;padding: 0px" >
	<div class="col-md-12">
		<div class="row" style="margin-top: 0px;">
			<div class="login-box">
		  	<div class="login-logo">
		  		<img src="<?php echo base_url('assets/images/surveyor.png') ?>" width="140px">
		    	<a href="#"><h3><b>Aplikasi Helpdesk </b><br>Surveyor Indonesia Cabang Jakarta</h3></a>
		  	</div>
		  <!-- /.login-logo -->
		  <div class="login-box-body" style="background:blue;">
		    <p class="login-box-msg">
		    	<div style="color:red;" align="center"><?php if(isset($notification1)) echo $notification1; ?></div>
		    </p>
		    <form action="<?php echo base_url().'index.php/login/login_proses'; ?>" method="post"  enctype="multipart/form-data" onsubmit="return validasi()">
				<div class="form-group has-feedback">
					<input type="text" class="form-control" id="username" name="username" placeholder="Username">
					<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				</div>
					<div class="form-group has-feedback">
					<input type="password" class="form-control" id="password" name="password" placeholder="Password">
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>
				<div class="row">
					<div class="col-xs-8">
					</div>
					<!-- /.col -->
					<div class="col-xs-4">
						<button type="submit" class="btn btn-default btn-block btn-flat">Log In</button>
					</div>
					<!-- /.col -->
				</div>
		    </form>
		    <div class="social-auth-links text-center">
<!-- 		      <p>- OR -</p>
		      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
		        Facebook</a>
		      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
		        Google+</a> -->
		    </div>
		  </div>
		  <!-- /.login-box-body -->
		</div>
		<!-- /.login-box -->
		</div>
	</div>
</body>

<script type="text/javascript">
	function validasi() {
		swal("Good job!");
		return false;
	}
</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-146784115-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-146784115-1');
</script>


</html>
