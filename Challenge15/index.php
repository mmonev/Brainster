<?php
require_once 'Product.php';
require_once 'MarketStall.php';
require_once 'Cart.php';

$orange = new Orange();
$potato = new Potato();
$nuts = new Nuts();
$kiwi = new Kiwi();
$pepper = new Pepper();
$raspberry = new Raspberry();

$marketStall = new MarketStall();

$marketStall->addProductToMarket('orange', $orange);
$marketStall->addProductToMarket('potato', $potato);
$marketStall->addProductToMarket('nuts', $nuts);
$marketStall->addProductToMarket('kiwi', $kiwi);
$marketStall->addProductToMarket('pepper', $pepper);
$marketStall->addProductToMarket('raspberry', $raspberry);

$cart = new Cart();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $selectedItems = $_POST['items'] ?? [];

    
    foreach ($selectedItems as $itemName) {
        $item = $marketStall->getItem($itemName, 1);
        if ($item !== false) {
            $cart->addToCart($item);
        }
    }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Market</title>
  </head>
  <body>
    <div class="container-fluid">

    <h1 class="py-3">Welcome to the Market</h1>

    <form method="POST">
        <h2 class="py-3">Select Products:</h2>
        <?php foreach ($marketStall->getProducts() as $name => $product) : ?>
            <label>
                <input type="checkbox" name="items[]" value="<?= $name; ?>">
                <?= $name; ?> - <?= $product->getPrice(); ?> denars
            </label><br>
        <?php endforeach; ?>

        <br>
        <button type="submit" class="btn btn-primary">Add to Cart</button>
    </form>

    <h2 class="py-3">Your Cart</h2>
    <?php
    if ($cart->isEmpty()) {
        echo "Your cart is empty.";
    } else {
        $cart->printReceipt();
    }
    ?>
    </div>

<!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
  </body>
</html>