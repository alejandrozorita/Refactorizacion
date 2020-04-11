<?php

require '../vendor/autoload.php';

$elements = new \App\HtmlElement('p','Este es el conteido');

echo html_entity_decode($elements->render(), ENT_QUOTES, 'UTF-8');
echo $elements->render();

