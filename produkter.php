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
        <div class="contentHeader">Alla produkter</div>


        <div class="row">
            <?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://localhost/inlamning2/wp-json/wc/v3/products?oauth_consumer_key=ck_492bfa30655531efd9744a68fc7867f3377e416a&oauth_signature_method=HMAC-SHA1&oauth_timestamp=1650963869&oauth_nonce=c1OJ3miDscS&oauth_version=1.0&oauth_signature=8Z2KIB4cUM80ZydpiKzhfuOFqrM%253D',
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


            $all_products = json_decode($response);
            ?>

            <div class="infoHolder">
                <?php echo "<table>";
                echo "<tr><th>Huvudbild</th><th>Namn</th><th>Pris</th><th>Produkt ID</th><th>Kategori</th></tr>";

                for ($i = 0; $i < count($all_products); $i++) {
                    $products = $all_products[$i];
                    $productimg = $products->images;


                    for ($y = 0; $y < count($productimg); $y++) {

                        $img = $productimg[$y]->src;

                        /* echo "<tr><td>Produkt ID:</td><td> $products->id</td></tr>";
                        echo "<tr><td>Namn:</td><td> $products->name</td></tr>";
                        echo "<tr><td>Pris:</td><td> $products->price</td></tr>";
                        echo "<tr><td>Huvudbild</td><td><img src='$img' height='130' width='130'</td></tr>"; */

                        echo "<tr><td><img src='$img' height='160' width='160'</td><td> $products->name</td><td> $products->price</td><td> $products->id</td>";
                    }
                    
                    //  function get_category($all_products) {    
                    /* for ($z = 0; $z < count($all_products); $z++) {
                        $product_category = $all_products[$z];
                        $category = $product_category->categories;
    
                        for ($c = 0; $c < count($category); $c++) {
                            
                            $category_name = $category[$c]->name;
                            
                            return $category_name;
                            echo "<td>$category_name</td></tr>";
                        }
                    } */
                }
                echo "</table>";


                // }
                ?>
            </div>
        </div>
    </section>
</body>

</html>