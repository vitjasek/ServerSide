<?php
$databaze = 'ete32e_1920zs_09';
$uzivatel = 'ete32e_1920zs_09';
$heslo = 'mvMzFY';
$conn =  new mysqli('localhost', $uzivatel, $heslo, $databaze);
if ($conn->connect_error)
	die('Nepodarilo se pripojit k databazovemu serveru.' . $conn->connect_error);
