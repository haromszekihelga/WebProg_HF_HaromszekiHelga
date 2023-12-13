<?php
session_start();

if (!isset($_SESSION['veletlen_szam'])) {
    $random_number = rand(1, 100); 
    $_SESSION['veletlen_szam'] = $random_number;
} else {
    $random_number = $_SESSION['veletlen_szam'];
}

if (isset($_POST['elkuld'])) {
    if (isset($_POST['tipp'])) {
        $user_guess = intval($_POST['tipp']);
        if ($user_guess > $random_number) {
            echo "A tipped nagyobb, próbálkozz kisebb számmal!";
        } elseif ($user_guess < $random_number) {
            echo "A tipped kisebb, próbálkozz nagyobb számmal!";
        } else {
            echo "Gratulálok, eltaláltad a számot: $random_number";
            unset($_SESSION['veletlen_szam']);
        }
    } else {
        echo "Adj meg egy számot!";
    }
}
?>

<form method="POST" action="">
    Tippelj egy számot (1 és 100 között):
    <input type="number" name="tipp">
    <input type="submit" name="elkuld" value="Tippel">
</form>
