<?php

require '../vendor/autoload.php';

$elements = new \App\HtmlElement('p', [], 'Este es el conteido');

echo htmlentities($elements->render(), ENT_QUOTES, 'UTF-8');
echo $elements->render();

$elements = new \App\HtmlElement('p', [ 'id' => 'idElement' ], 'Este es el conteido');
echo htmlentities($elements->render(), ENT_QUOTES, 'UTF-8');

echo "<br><hr>";

$elements = new \App\HtmlElement('p', [ 'id' => 'idElement', 'class' => 'succces' ], 'Este es el conteido');
echo htmlentities($elements->render(), ENT_QUOTES, 'UTF-8');

echo "<br><hr>";

$elements = new \App\HtmlElement('img', [ 'id' => 'idElement', 'src' => 'img.jpg' ], 'Este es el conteido');
echo htmlentities($elements->render(), ENT_QUOTES, 'UTF-8');

echo "<br><hr>";

$elements = new \App\HtmlElement('input');
echo htmlentities($elements->render(), ENT_QUOTES, 'UTF-8');