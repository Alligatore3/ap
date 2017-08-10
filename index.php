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
					<span id="date">
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
			);
			$audio = array (
				array('something_water.mp3','07/01/17','Something in the water' ),

				array('pissio.mp3','04/02/15','Pissio DC' ),
				array('paul_vs_aleks.mp3','31/01/15','Alla cortese attenzione di Alessandro & Paolo', 'true'),
				array('vs_aleks.mp3','31/01/15','Alla cortese attenzione di Alessandro & Mattia', 'true'),
				array('mina_aleks.mp3','01/02/15','Che mina era?' ),
				array('staff_forte.mp3','01/02/15','STAFF FORTE' ),
				array('koolDek_emmaMarrone.mp3','08/08/15','Una Padova che non esiste' ),
				array('dove_sei.mp3','08/08/15','Dove cazzo sei' ),
				array('vicenza.mp3','11/08/15','Vorrei andare ogno giorno a Vicenza' ),
				array('nulla.mp3','12/08/15','Nullità' ),

				array('ragionare.mp3','27/09/15','Ragionare' ),
				array('rash-fibra.mp3','17/10/15','Tutto fibra 5€' ),
				array('macchina.mp3','04/11/15','Sei in macchina' ),
				array('ignorante.mp3','05/12/15','Sei ignorante' ),
				array('mattia.mp3','09/12/15','Oh Mattia Zanella' ),
				array('star-wars.mp3','16/12/15','Star Wars il risveglio della forza' ),
				array('ragioneria.mp3','16/12/15','Hai fatto ragioneria' ),
				array('mi_registrano.mp3','20/12/15','Mi registrano tutti' ),
				array('libro.mp3','23/12/15','Leggi un libro' ),
				array('pietro.mp3','09/02/2016','Pietro' ),
				array('parchetto.mp3','09/02/2016','Party One' ),
				array('lanciafiamme.mp3','13/02/2016','Lanciafiamme' ),
				array('merda.mp3','13/02/2016','È una merda' ),
				array('osa.mp3','21/02/2016','Osa solo' ),
				array('trammezzo.mp3','21/02/2016','Sei malata' ),
				array('permesso.mp3','21/02/2016','Autorizzazione' ),

				array('faccia.mp3','21/03/2016','Ha una faccia' ),
				array('jesolo.mp3','21/03/2016','Se andate a Jesolo' ),
				array('zane.mp3','21/03/2016','Zane' ),
				array('vetroloso.mp3','05/04/2016','Vetroloso' ),
				array('palette.mp3','05/04/2016','Palette colori' ),
				array('sido.mp3','21/04/2016','2€' ),

				array('keep.mp3','22/12/2016','Keep your fire burning' ),
				array('vedoNonVedo.mp3','22/12/2016','Vedo non vedo' ),

				array('solo.mp3','28/02/17','Vai da solo' ),

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
