<?php 

// salvo il file di testo in una variabile
$str = file_get_contents('dischi.json');

// lo decodifico in php
$list = json_decode($str);

// lo trasformo in file .json
header('Content-Type: application/json');

// infine lo stampo
echo json_encode($list);