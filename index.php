<?php include_once "./assets/inc/fs.php"; ?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="description" content="Il sito è una raccolta di evocazioni a divinità vietato ai minori di 19." />
		<title>Aleks & Paolo</title>

		<link rel="stylesheet" href="./css/bootstrap.min.css" />
		<link rel="stylesheet" href="./css/skin.min.css" />
		<link rel="stylesheet" href="./css/plyr.css">

		<link rel="icon" href="./assets/images/smile.png" type="image/png" />
	</head>

	<body class="container">
		<div class="spinner_container">
			<img
				src="./assets/images/cover/placeholder.jpg"
				alt="placeholder"
				class="placeholder"/>

				<div class="spinner">
				  <div class="double-bounce1"></div>
				  <div class="double-bounce2"></div>
				</div>
		</div>
		<div
			id="main"
			class="col-md-12 col-sm-12 text-center f-none">

		<?php
			the_walker("./assets/audio", true);

			$video = array(
				array('faccia.mp4','faccia.jpg' ),
				array('ale.mp4','ale.jpg' ),
				array('filetto.mp4','filetto.jpeg' ),
				array('foto.mp4','placeholder.jpg' )
			);

		?>

		<?php echo the_counter(); ?>

		</div>

		<?php //the_walker("./assets/video", false); ?>

		<footer>
			<script src="./js/jquery.min.js"></script>
			<script src="./js/plyr.js"></script>
			<script src="https://use.fontawesome.com/26b7e42569.js"></script>
			<script>
				$(function() {
				  // Handler for .ready() called.
				  plyr.setup();

					$( window ).on(
						"load",
						$('.spinner_container').hide()
					);
				});
			</script>
		</footer>
	</body>
</html>
