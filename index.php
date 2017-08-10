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
			include_once "./assets/classes/CMP3File.php";
			$mp3file = new CMP3File;

			if ( $handle = opendir('./assets/audio') ) {
				$counter = 0;
			    /* This is the correct way to loop over the directory. */
			    while ( false !== ( $entry = readdir($handle) ) ) {
					// Avoiding first two entities . and .. ( Unix file system convention )
					if( $counter !== 0 && $counter !== 1 ):
						$mp3file->getid3( "./assets/audio/" . $entry ); ?>
			<div
				id="<?php echo substr($entry, 0, -4); ?>"
				class="track quote-box">
				<div class="quote-text">
					<i class="fa fa-quote-left"></i>
					<span
						id="text"
						class="description">
						<?php echo iconv('ISO-8859-1', 'UTF-8', $mp3file->comment); ?>
					</span>
				</div>
				<div class="quote-date m-b-20">
					<i class="fa fa-calendar" aria-hidden="true"></i>
					<span
						id="date"
						class="m-l-5">
						<?php echo $mp3file->year; ?>
					</span>
				</div>

				<audio
					crossorigin="anonymous"
					class="aud"
					src="./assets/audio/<?php echo $entry; ?>"
					type="audio/mp3"
					controls>
				</audio>
			</div>

			<?php
				endif;
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

		<div class="counter">
			<i class="inline-block fa fa-retweet" aria-hidden="true"></i>
			<p class="inline-block size-20">
				<?php echo $counter; ?>
			</p>
		</div>

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
