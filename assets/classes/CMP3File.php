<?php
    class CMP3File {
        function getid3 ($file) {

            if ( file_exists($file) ) {

                $filesize = filesize($file);
                $file = fopen($file, "r");

                fseek($file, -128, SEEK_END); // It reads the

                $tag = fread($file, 3);

                if( $tag == "TAG" ) {
                    $this->track = trim( fread($file, 30) );
                    $this->artist = trim( fread($file, 30) );
                    $this->album = trim( fread($file, 30) );
                    $this->year = trim( fread($file, 4) );
                    $this->comment = trim( fread($file, 30) );
                }
                // else {
                //     echo $file;
                //     die("MP3 file does not have any ID3 tag!");
                // }
                fclose($file);
            }
            else {
                die("MP3 file does not exist");
            }
        }
    }
