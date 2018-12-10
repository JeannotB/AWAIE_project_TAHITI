<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title><?php echo $title; ?></title>

		<!-- Bootstrap core CSS -->
		<link href="./css/bootstrap.css" rel="stylesheet">
		<!--external css-->
		<link href="./font-awesome/css/font-awesome.css" rel="stylesheet" />
			
		<!-- Custom styles for this template -->
		<link href="./css/style.css" rel="stylesheet">
		<link href="./css/style-responsive.css" rel="stylesheet">

		<!--- Icon -->
		<link rel="icon" type="image/png" href="../img/icon.png" />

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>

	<body>
		<?php echo $error;?>
		<!-- **********************************************************************************************************************************************************
		MAIN CONTENT
		*********************************************************************************************************************************************************** -->

		<div id="login-page">
			<div class="container">
			
                <?php echo $content; ?>
            
			</div>
		</div>

		<!-- js placed at the end of the document so the pages load faster -->
		<script src="./js/jquery.js"></script>
		<script src="./js/bootstrap.min.js"></script>

		<!--BACKSTRETCH-->
		<!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
		<script type="text/javascript" src="./js/jquery.backstretch.min.js"></script>
		<script>
			$.backstretch("../img/automate2.png", {speed: 500});
		</script>


	</body>
</html>