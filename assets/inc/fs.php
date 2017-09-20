<?php
include_once "CMP3File.php";

function the_walker($dir) {
  $mp3file = new CMP3File;

  if ( $handle = opendir($dir) ) {
    /* This is the correct way to loop over the directory. */
    while ( false !== ( $entry = readdir($handle) ) ) {
      // Avoiding first two entities . and .. ( Unix file system convention
      if( !unix_convention($entry) ){
        $mp3file->getid3( $dir . "/" . $entry );
        echo the_player($mp3file, $entry);
      }

      flush();
    }

    closedir( $handle );
  }
}

function unix_convention($entity){
  return $entity === '.' || $entity === '..';
}

function the_player($audio, $src) {
    $id = substr($src, 0, -4);
    $audio->comment = iconv('ISO-8859-1', 'UTF-8', $audio->comment);

    return <<<HTML
        <div
            id="$id"
            class="track quote-box">
            <div class="quote-text">
                <i class="fa fa-quote-left"></i>
                <span
                    id="text"
                    class="description">
                    $audio->comment
                </span>
            </div>
            <div class="quote-date m-b-20">
                <i class="fa fa-calendar" aria-hidden="true"></i>
                <span
                    id="date"
                    class="m-l-5">
                    $audio->year
                </span>
            </div>

            <audio
                crossorigin="anonymous"
                preload="metadata"
                class="aud"
                src="./assets/audio/$src"
                type="audio/mp3"
                controls>
            </audio>
        </div>
HTML;
}

function dir_childs_counter($path){
  return
    iterator_count( new FilesystemIterator($path, FilesystemIterator::SKIP_DOTS) );
}


function the_counter() {
    $fun = dir_childs_counter('./assets/audio');
    return <<<HTML
    <div class="counter">
        <i class="inline-block fa fa-retweet" aria-hidden="true"></i>
        <p class="inline-block size-20">
          $fun
        </p>
    </div>
HTML;
}
