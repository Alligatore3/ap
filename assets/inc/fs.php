<?php

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


function the_counter($counter) {

    return <<<HTML
    <div class="counter">
        <i class="inline-block fa fa-retweet" aria-hidden="true"></i>
        <p class="inline-block size-20">
            $counter
        </p>
    </div>
HTML;
}
