<?php
$url = "https://fakestoreapi.com/products";

include_once "Product.php";
include_once "CartItem.php";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HTTPGET, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

$productsjson = json_decode($response, true);
//print_r($productsjson);

$url = "https://fakestoreapi.com/carts/user/1";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HTTPGET, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

$cartsjson = json_decode($response, true);
//print_r($cartsjson);

$products = array();
$carts = array();

//foreach ($productsjson as $product) {
//    $products[] = new Product($product["id"], $product["price"]);
//}

$total = 0;
foreach ($cartsjson as $cart) {
    foreach ($cart["products"] as $cartItem) {}
//    $carts[] = new CartItem($product["id"], $product["quantity"], $product["productId"]);
        foreach ($productsjson as $product) {
            if ($cartItem["productId"] == $product["id"]) {
                $total += $product["price"]*$cartItem["quantity"];
            }
        }
}
//$total = 0;
//
//foreach ($carts as $cart) {
//    foreach ($products as $product) {
//        if ($product->getId() == $cart->getProductId()) {
//            $total += $cart->getQuantity() * $product->getPrice();
//        }
//    }
//}

echo "<br>Total: $" . $total;