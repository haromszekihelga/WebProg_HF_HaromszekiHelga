<?php
session_start();

$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

if (isset($_POST['remove_from_cart'])) {
    $productId = $_POST['product_id'];
    if (isset($cart[$productId]) && $cart[$productId]['quantity'] > 1) {
        $cart[$productId]['quantity']--;
    } else {
        unset($cart[$productId]);
    }
    $_SESSION['cart'] = $cart;
}

$totalPrice = 0;
foreach ($cart as $productId => $item) {
    $totalPrice += $item['price'] * $item['quantity'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
</head>
<body>
<h1>Shopping Cart</h1>

<ul>
    <?php foreach ($cart as $productId => $item) { ?>
        <li>
            <form method="post">
                <?php echo $item['name']; ?> - $<?php echo $item['price']; ?>
                (Quantity: <?php echo $item['quantity']; ?>)
                <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
                <input type="submit" name="remove_from_cart" value="Remove from Cart">
            </form>
        </li>
    <?php } ?>
</ul>

<p>Total Price: $<?php echo number_format($totalPrice, 2); ?></p>

</body>
</html>