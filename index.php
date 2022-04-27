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
    <div class="row">
<div class="divided1"><h2 class="dividedbigheader">ERP appen för dig</h2></div>
<div class="divided2"><div class="dividedheader"><h2>All pages</h2>
    <?php get_pages() ?>
    </div>
</div>
</div>
</section>
</body>
</html>



<?php



function get_pages() {
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://localhost/inlamning2/wp-json/wp/v2/pages?oauth_consumer_key=ck_492bfa30655531efd9744a68fc7867f3377e416a&oauth_signature_method=HMAC-SHA1&oauth_timestamp=1650452554&oauth_nonce=ywQnpCCSMhq&oauth_version=1.0&oauth_signature=FiGKhl%252F31fbaMoyX6RoZTn0r6sE%253D',
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
$all_pages = json_decode($response);

for ($i=0; $i < count($all_pages); $i++) { 
    $page = $all_pages[$i];
  
    //gör variabel av varje och skriv ut dem på olika ställen
     
    $id = $page->id;
    $slug = $page->slug;
    /* $type = $page->type;
    $date = $page->date; */

    echo $id;
    echo $slug;
    
    /* echo "<tr><td>Post ID:</td><td> $page->id</td></tr>";
    echo "<table>";
    echo "<tr><td>Slug:</td><td> $page->slug</td></tr>";
    echo "<tr><td>Typ:</td><td> $page->type</td></tr>";
    echo "<tr><td>Länk:</td><td> $page->link</td></tr>";
    echo "<tr><td>Datum:</td><td> $page->date</td></tr>"; */
   
   /*  for ($i=0; $i < count($post); $i++) { 
        $content = $post->content;
        echo "<tr><td>Innehåll:</td><td> $content->rendered</td></tr>";*/
       // echo "</table>";
      }
  }


