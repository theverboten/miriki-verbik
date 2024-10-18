<?php

$pages = array(
    'index' => 'homepage',
    'komponenty' => 'komponenty',
    'policy' => 'textová šablona',

    'realizace' => 'realizace',
    'realizace-detail' => 'detail realizace',
    'sluzby' => 'služby',
    'onas' => 'o nás',
    '404' => 'Error 404',
    'kontakt' => 'kontakt',
);



// Output
include 'header.php';

component('page-header', ['title' => 'Seznam stránek']);

echo '<section class="section">';
    echo '<div class="container">';
        echo '<div class="apply-formatting">';
            echo '<ul style="line-height: 1.8;">';

                foreach ($pages as $url => $title) {
                    echo '<li><a href="'.$url.'" target="_blank">'.$title.'</a></li>';
                }

            echo '</ul>';
        echo '</div>';
    echo '</div>';
echo '</section>';

include 'footer.php';
