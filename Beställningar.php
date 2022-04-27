<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Beställningar</title>
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
        <div class="contentHeader">Alla ordrar</div>


        <div class="row">

            <?php
         
              
         $curl = curl_init();

         curl_setopt_array($curl, array(
           CURLOPT_URL => 'http://localhost/inlamning2/wp-json/wc/v3/orders?oauth_consumer_key=ck_492bfa30655531efd9744a68fc7867f3377e416a&oauth_signature_method=HMAC-SHA1&oauth_timestamp=1650960152&oauth_nonce=TgFbzlWoiJN&oauth_version=1.0&oauth_signature=Hjwy4di41gbw%252BboJTaIF9bCgRRQ%253D',
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

                $all_orders = json_decode($response);
            ?>

                <div class="infoHolder">
                <?php echo "<table>";
                echo "<tr><th>Order ID</th><th>Orderstatus</th><th>Pris</th><th>Datum</th></tr>";

                for ($i = 0; $i < count($all_orders); $i++) {
                    $order = $all_orders[$i];

                    echo "<tr><td>$order->id</td><td> $order->status</td><td> $order->total</td><td> $order->date_created</td>";


                    /*  for ($i=0; $i < count($post); $i++) { 
        $content = $post->content;
        echo "<tr><td>Innehåll:</td><td> $content->rendered</td></tr>";*/
                }
            echo "</table>";

                ?>
                </div>
        </div>
    </section>
</body>

</html>