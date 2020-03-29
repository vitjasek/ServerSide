<?php
$databaze = 'ete32e_1920zs_09';
$uzivatel = 'ete32e_1920zs_09';
$heslo = 'mvMzFY';

if (!($cnn = mysqli_connect('localhost', $uzivatel, $heslo)))
	die('Nepodarilo se pripojit k databazovemu serveru.');
if (!mysqli_select_db($cnn, $databaze))
	die('Nepodarilo se otevrit databazi.');

echo 'Pripojeni k databazi bylo uspesne.';
