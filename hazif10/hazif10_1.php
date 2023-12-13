<?php
function fetchDataFromAPI($url) {
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    if ($response === false) {
        echo 'Error: ' . curl_error($curl);
        return null;
    }
    curl_close($curl);
    return json_decode($response, true);
}

$products = fetchDataFromAPI('https://fakestoreapi.com/products');

if ($products) {
    $productPrices = array_column($products, 'price');

    $carts = fetchDataFromAPI('https://fakestoreapi.com/carts/user/3');

    if ($carts) {
        $sum = 0;
        foreach ($carts as $cart) {
            foreach ($cart['products'] as $product) {
                $productId = $product['productId'];
                $quantity = $product['quantity'];

                if (isset($productPrices[$productId - 1])) {
                    $sum += $quantity * $productPrices[$productId - 1];
                }
            }
        }
        echo "Sum = $sum";
    } else {
        echo 'No carts found.';
    }
} else {
    echo 'No products found.';
}
?>
