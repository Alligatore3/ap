<?php

function the_player($audio, $src) {
    echo '
        <div
            id="' . substr($src, 0, -4) . '"
            class="track quote-box">
            <div class="quote-text">
                <i class="fa fa-quote-left"></i>
                <span
                    id="text"
                    class="description">
                    ' . iconv('ISO-8859-1', 'UTF-8', $audio->comment) . '
                </span>
            </div>
            <div class="quote-date m-b-20">
                <i class="fa fa-calendar" aria-hidden="true"></i>
                <span
                    id="date"
                    class="m-l-5">
                    ' . $audio->year . '
                </span>
            </div>

            <audio
                crossorigin="anonymous"
                class="aud"
                src="./assets/audio/' . $src . '"
                type="audio/mp3"
                controls>
            </audio>
        </div>
        ';
}
