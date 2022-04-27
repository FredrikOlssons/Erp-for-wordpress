<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./style.css">
  <title>Document</title>
</head>

<body>
  <header>
    <div class="header1">
      <div class="title">ERP Affärsystem
      </div>
    </div>
    <div class="header2">
      <div><a href="./produkter.php">Produkter</a></div>
      <div><a href="./Blogginlägg.php">Posts</a></div>
      <div><a href="./Beställningar.php">Ordrar</a></div>
      <div><a href="./media.php">Media</a></div>
    </div>
  </header>
  <section>
    <div class="contentHeader">Media</div>

    <div class="row">


      <?php

      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://localhost/inlamning2/wp-json/wp/v2/media/?page=1&per_page=10&oauth_consumer_key=ck_492bfa30655531efd9744a68fc7867f3377e416a&oauth_signature_method=HMAC-SHA1&oauth_timestamp=1650549499&oauth_nonce=t4LnA5uDu5d&oauth_version=1.0&oauth_signature=Bx7lv8mKG2ezYasLSPHfQYw4%252Bp4%253D',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
      ));

      $response = curl_exec($curl);

      curl_close($curl);

      $all_media = json_decode($response);
      ?>

      
<div class="mediaHolder">

<?php
        for ($i = 0; $i < count($all_media); $i++) {
          $single_media = $all_media[$i];

          $img = $single_media->guid->rendered;
          //echo $img;

          echo "<img src='$img' height='300' width='300'>";

        }


        ?>
      </div>
    </div>
  </section>
</body>

</html>