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
    <div class="contentHeader">Blogginlägg</div>


    <div class="blogContainer"> 
      
      <div class="imgDiv">
       <div class="divtitle">Huvudbild</div>

     
    <?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://localhost/inlamning2/wp-json/wp/v2/media?page=1&per_page=2&oauth_consumer_key=ck_492bfa30655531efd9744a68fc7867f3377e416a&oauth_signature_method=HMAC-SHA1&oauth_timestamp=1650957832&oauth_nonce=TDw2onIiP8E&oauth_version=1.0&oauth_signature=ebYUH2N%252F7h9U7zUoOd0OQ2L%252F8wQ%253D',
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
//echo $response;
$media_imgs = json_decode($response);
     
for ($i=0; $i <count($media_imgs) ; $i++) { 
  $media_for_blog = $media_imgs[$i];
  $bloggbild = $media_for_blog->guid->rendered;
  echo "<img class src='$bloggbild' height='200' width='200'>";
}     ?>
</div>


<div class="textHolder">
<?php

$curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://localhost/inlamning2/wp-json/wp/v2/posts?oauth_consumer_key=ck_492bfa30655531efd9744a68fc7867f3377e416a&oauth_signature_method=HMAC-SHA1&oauth_timestamp=1650457406&oauth_nonce=PprWtJp75l6&oauth_version=1.0&oauth_signature=MnqZ3MBg21RZkiPsYj6zoT81SSU%253D',
        //CURLOPT_URL => 'http://localhost/inlamning2/wp-json/wp/v2/posts/50',
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
      
      $all_posts = json_decode($response);

      ?>


        <?php echo "<table>";
        echo "<tr><th>Namn</th><th>Datum</th></tr>";

        for ($y = 0; $y < count($all_posts); $y++) {
          $post = $all_posts[$y];
          $post_title = $post->title->rendered;
          $post_date = $post->date;
          

         echo "<tr><td>$post_title</td><td>$post->date</td></tr>";

        }
          /*   for ($i=0; $i < count($post); $i++) { 
        $content = $post->content;
        echo "<tr><td>Innehåll:</td><td> $content->rendered</td></tr>"; */
        

       echo "</table>";


        ?>
      </div>
    </div>


    
</body>

</html>