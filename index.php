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
		<div id="main" class="col-md-12 col-sm-12 text-center">

		<?php
			$video = array(
				array('faccia.mp4','faccia.jpg' ),
				array('ale.mp4','ale.jpg' ),
			);
			$audio = array (
				array('something_water.mp3','07/01/17','Something in the water' ),
				array('fissato_aleks.mp3','03/02/15','Fissato del cazzo' ),
				array('pissio.mp3','04/02/15','Pissio DC' ),
				array('aleks_vs_paul.mp3','31/01/15','Alla cortese attenzione di Alessandro & Paolo', 'true'),
				array('paul_vs_aleks.mp3','31/01/15','Alla cortese attenzione di Alessandro & Paolo', 'true'),
				array('vs_aleks.mp3','31/01/15','Alla cortese attenzione di Alessandro & Mattia', 'true'),
				array('mina_aleks.mp3','01/02/15','Che mina era?' ),
				array('staff_forte.mp3','01/02/15','STAFF FORTE' ),
				array('koolDek_emmaMarrone.mp3','08/08/15','Una Padova che non esiste' ),
				array('dove_sei.mp3','08/08/15','Dove cazzo sei' ),
				array('vicenza.mp3','11/08/15','Vorrei andare ogno giorno a Vicenza' ),
				array('nulla.mp3','12/08/15','Nullità' ),
				array('dico_a_cib.mp3','23/09/15','Dico solo a Cib' ),
				array('ragionare.mp3','27/09/15','Ragionare' ),
				array('balzo_milano.mp3','27/09/15','Sono Mattia Zanella' ),
				array('rash-fibra.mp3','17/10/15','Tutto fibra 5€' ),
				array('attiva.mp3','30/09/15','Attivati' ),
				array('destinatario.mp3','22/10/15','Chi è il destinatario' ),
				array('macchina.mp3','04/11/15','Sei in macchina' ),
				array('ignorante.mp3','05/12/15','Sei ignorante' ),
				array('mattia.mp3','09/12/15','Oh Mattia Zanella' ),
				array('star-wars.mp3','16/12/15','Star Wars il risveglio della forza' ),
				array('ragioneria.mp3','16/12/15','Hai fatto ragioneria' ),
				array('mi_registrano.mp3','20/12/15','Mi registrano tutti' ),
				array('libro.mp3','23/12/15','Leggi un libro' ),
				array('pietro.mp3','09/02/2016','Pietro' ),
				array('parchetto.mp3','09/02/2016','Party One' ),
				array('ciuffo.mp3','13/02/2016','La fame nel mondo' ),
				array('lanciafiamme.mp3','13/02/2016','Lanciafiamme' ),
				array('merda.mp3','13/02/2016','È una merda' ),
				array('chieta.mp3','21/02/2016','Sta Chieta' ),
				array('osa.mp3','21/02/2016','Osa solo' ),
				array('trammezzo.mp3','21/02/2016','Sei malata' ),
				array('permesso.mp3','21/02/2016','Autorizzazione' ),
				array('alessio.mp3','03/03/2016','Alessio' ),
				array('finito.mp3','06/03/2016','Hai finito?' ),
				array('elena.mp3','15/03/2016','Brava persona' ),
				array('andrea.mp3','15/03/2016','Andrea Galeazzi' ),
				array('faccia.mp3','21/03/2016','Ha una faccia' ),
				array('jesolo.mp3','21/03/2016','Se andate a Jesolo' ),
				array('zane.mp3','21/03/2016','Zane' ),
				array('vetroloso.mp3','05/04/2016','Vetroloso' ),
				array('palette.mp3','05/04/2016','Palette colori' ),
				array('sido.mp3','21/04/2016','2€' ),
				array('aula.mp3','22/12/2016','In aula lui' ),
				array('ios.mp3','22/12/2016','iOS' ),
				array('keep.mp3','22/12/2016','Keep your fire burning' ),
				array('vedoNonVedo.mp3','22/12/2016','Vedo non vedo' ),
				array('baffo.mp3','22/12/2016','Io ti verrò a cercare' ),
				array('grave.mp3','22/12/2016','Oltrepassare i limiti' ),
				array('della.mp3','07/01/17','Dellai' ),
				array('solo.mp3','28/02/17','Vai da solo' ),
				array('basta.mp3','28/02/17','Basta' ),
				array('abbandonato.mp3','31/03/17','Abbandonato' ),
				array('godo.mp3','24/07/17','Godoooh' )
			);

		  	foreach ($audio as $tone):
		?>


			<div
				id="<?php echo substr($tone[0], 0, -4);?>"
				class="track quote-box">
				<div class="quote-text">
					<i class="fa fa-quote-left"> </i>
					<span
						id="text"
						class="description">
						<?php echo $tone[2] ; ?>
					</span>
				</div>
				<div class="quote-date m-b-20">
					<i class="fa fa-calendar" aria-hidden="true"></i>
					<span id="date">
						<?php echo $tone[1]; ?>
					</span>
				</div>

				<audio
					crossorigin="anonymous"
					class="aud <?php if ($tone[3]) { echo $tone[3]; } ?>"
					src="./assets/audio/<?php echo $tone[0]; ?>"
					type="audio/mp3"
					controls>
				</audio>
			</div>

		<?php endforeach; ?>

		<div class="counter">
			<i class="inline-block fa fa-retweet" aria-hidden="true"></i>
			<p class="inline-block size-20">
				<?php echo count($audio); ?>
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
