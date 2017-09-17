<?php
	include_once "./assets/inc/fs.php";
	include_once "./assets/inc/CMP3File.php";
?>

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
			$mp3file = new CMP3File;

			if ( $handle = opendir('./assets/audio') ) {
			    /* This is the correct way to loop over the directory. */
			    while ( false !== ( $entry = readdir($handle) ) ) {
						// Avoiding first two entities . and .. ( Unix file system convention
						if( !unix_convention($entry) ){
							$mp3file->getid3( "./assets/audio/" . $entry );
							echo the_player($mp3file, $entry);
						}

						flush();
		    	}

		    	closedir( $handle );
			}

			$video = array(
				array('faccia.mp4','faccia.jpg' ),
				array('ale.mp4','ale.jpg' ),
				array('filetto.mp4','filetto.jpeg' ),
				array('foto.mp4','placeholder.jpg' )
			);

		?>

		<?php echo the_counter(); ?>

		</div>

		<div class="video col-md-12 col-sm-12 text-center m-b-100 f-none">
			<div class="video-wrapper">
				<?php foreach ($video as $vid): ?>
					<video
						class="vid center"
						poster="./assets/images/cover/<?php echo $vid[1] ?>"
						preload="true"
						controls>
						<source
							src="./assets/video/<?php echo $vid[0]; ?>"
							type="video/mp4">
					</video>
				<?php endforeach; ?>
			</div>
		</div>

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
