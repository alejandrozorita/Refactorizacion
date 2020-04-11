<?php

require '../vendor/autoload.php';

$elements = new \App\HtmlElement('p', [], 'Este es el conteido');
echo htmlentities($elements->render(), ENT_QUOTES, 'UTF-8');

$elements = new \App\HtmlElement('p', [ 'id' => 'idElement' ], 'Este es el conteido');
echo htmlentities($elements->render(), ENT_QUOTES, 'UTF-8');

echo "<br><hr>";

$elements = new \App\HtmlElement('p', [ 'id' => 'idElement', 'class' => 'succces' ], 'Este es el conteido');
echo htmlentities($elements->render(), ENT_QUOTES, 'UTF-8');

echo "<br><hr>";

$elements = new \App\HtmlElement('img', [ 'id' => 'idElement', 'src' => 'img.jpg' ], 'Este es el conteido');
echo htmlentities($elements->render(), ENT_QUOTES, 'UTF-8');

echo "<br><hr>";

$elements = new \App\HtmlElement('img', [
  'id' => 'idElement', 'src' => 'img.jpg', 'title' => 'Curso de "Refactorización" de alejandro'
], 'Este es el conteido');
echo htmlentities($elements->render(), ENT_QUOTES, 'UTF-8');

echo "<br><hr>";

$elements = new \App\HtmlElement('input', [ 'required' ]);
echo htmlentities($elements->render(), ENT_QUOTES, 'UTF-8');