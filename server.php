<?php 

// salvo il file di testo in una variabile
$str = file_get_contents('dischi.json');

// lo decodifico in php
$list = json_decode($str, true);



// controllo che siano tutti settati e che nessuno sia vuoto
if (isset($_POST['newAlbumTitle']) && isset($_POST['newAlbumPoster']) && isset($_POST['newAlbumAuthorName']) && isset($_POST['newAlbumAuthorHref']) && isset($_POST['newAlbumYear']) && isset($_POST['newAlbumGenre']) && isset($_POST['newAlbumBio']) && isset($_POST['newAlbumHref']) && !empty($_POST['newAlbumTitle']) && !empty($_POST['newAlbumPoster']) && !empty($_POST['newAlbumAuthorName']) && !empty($_POST['newAlbumAuthorHref']) && !empty($_POST['newAlbumYear']) && !empty($_POST['newAlbumGenre']) && !empty($_POST['newAlbumBio']) && !empty($_POST['newAlbumHref'])) {

  $newAlbum = [
    'id' => rand(100, 100000),
    'title' => $_POST['newAlbumTitle'],
    'author' => [
      'name' => $_POST['newAlbumAuthorName'],
      'href' => $_POST['newAlbumAuthorHref'],
    ],
    'year' => $_POST['newAlbumYear'],
    'poster' => $_POST['newAlbumPoster'],
    'genre' => $_POST['newAlbumGenre'],
    'bio' => $_POST['newAlbumBio'],
    'href' => $_POST['newAlbumHref'],
  ];

  $list[] = $newAlbum;
  file_put_contents('dischi.json', json_encode($list));

}

if (isset($_POST['indexToDelete'])) {

  $indexToDelete = $_POST['indexToDelete'];
  array_splice($list, $indexToDelete, 1);

  file_put_contents('dischi.json', json_encode($list));
  
}

if (isset($_POST['indexToLike'])) {

  $indexToLike = $_POST['indexToLike'];

  $list[$indexToLike]['isLiked'] = !$list[$indexToLike]['isLiked'];

  file_put_contents('dischi.json', json_encode($list));

}



// lo trasformo in file .json
header('Content-Type: application/json');

// infine lo stampo
echo json_encode($list);