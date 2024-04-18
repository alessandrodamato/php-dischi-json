<?php 

  // salvo il file di testo in una variabile
  $str = file_get_contents('dischi.json');

  // lo decodifico in php
  $list = json_decode($str, true);

  //indice dell'album selezionato
  $albumIndex = $_GET['index'];
  
  //variabili
  $title = $list[$albumIndex]['title'];
  $authorName = $list[$albumIndex]['author']['name'];
  $authorHref = $list[$albumIndex]['author']['href'];
  $year = $list[$albumIndex]['year'];
  $poster = $list[$albumIndex]['poster'];
  $genre = $list[$albumIndex]['genre'];
  $bio = $list[$albumIndex]['bio'];
  $href = $list[$albumIndex]['href'];

  //se uno di questi è === null reindirizzo alla pagina index.html
  if ($title === null || $authorName === null || $authorHref === null || $year === null || $poster === null || $genre === null || $bio === null || $href === null){
    header('Location: index.html');
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!-- vuejs -->
  <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>

  <!-- axios -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.8/axios.min.js" integrity="sha512-PJa3oQSLWRB7wHZ7GQ/g+qyv6r4mbuhmiDb8BjSFZ8NZ2a42oTtAq5n0ucWAwcQDlikAtkub+tPVCw4np27WCg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- custom styles -->
  <link rel="stylesheet" href="assets/style/details.css">

  <title>Dettagli Album</title>
</head>

<body>

  <div id="app">

    <header class="d-flex align-items-center bg-black text-white position-fixed top-0 start-0 w-100 z-3 px-5">

      <div class="logo m-0">
        <a href="index.html"><img src="https://static.vecteezy.com/system/resources/previews/018/930/750/non_2x/spotify-app-logo-spotify-icon-transparent-free-png.png" alt="Boolify"></a>
      </div>

      <h1 class="title m-0"><a class="text-white text-decoration-none" href="index.html">Boolify</a></h1>

    </header>

    <main style="background-image: url('<?php echo $poster ?>')">

      <div class="layer w-100 h-100 p-5">

        <h1 class="mb-5"><?php echo $title ?></h1>

        <h2>Author: 
          <a target="_blank" class="text-white text-decoration-none hov-underline" href="<?php echo $authorHref ?>"><?php echo $authorName ?></a>
        </h2>

        <h3>Year: <?php echo $year ?></h3>
        <h3 class="mb-4">Genre: <?php echo $genre ?></h3>

        <p class="mb-1"><?php echo $bio ?></p>

        <a target="_blank" class="text-white text-decoration-none hov-underline" href="<?php echo $href ?>">Vai all'album</a>

      </div>

    </main>

    <footer class="text-center bg-black text-white">Boolify</footer>

  </div>

  <script src="assets/js/script.js"></script>
</body>

</html>