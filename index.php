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
		<link rel="stylesheet" href="./css/skin.css" />
		<link rel="stylesheet" href="https://cdn.plyr.io/2.0.13/plyr.css">

		<link rel="icon" href="./assets/images/smile.png" type="image/png" />
	    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700' rel='stylesheet' type='text/css'>
	</head>

	<body class="container">
		<div
			id="main"
			class="col-md-12 col-sm-12 text-center">

		<?php
			$mp3file = new CMP3File;

			if ( $handle = opendir('./assets/audio') ) {
				$counter = 0;
			    /* This is the correct way to loop over the directory. */
			    while ( false !== ( $entry = readdir($handle) ) ) {
					// Avoiding first two entities . and .. ( Unix file system convention )
					if( $counter !== 0 && $counter !== 1 ){
						$mp3file->getid3( "./assets/audio/" . $entry );
						echo the_player($mp3file, $entry);
					}
					$counter++;

					flush();
		    	}

		    	closedir( $handle );
			}

			/*$video = array(
				array('faccia.mp4','faccia.jpg' ),
				array('ale.mp4','ale.jpg' ),
			);*/

		?>

		<?php echo the_counter($counter); ?>

		</div>

		<div class="video col-md-12 col-sm-12 text-center m-b-100">
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

		<footer>
			<script src="./js/jquery.js"></script>
			<script src="https://use.fontawesome.com/26b7e42569.js"></script>
			<script src="https://cdn.plyr.io/2.0.13/plyr.js"></script>
			<script>
				$(function() {
				  // Handler for .ready() called.
				  plyr.setup();
				});
			</script>
		</footer>
	</body>
</html>
