<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    $firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING);
    $lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $attend = $_POST['attend'] ?? [];
    $tshirt = $_POST['tshirt'] ?? 'P';
    $abstract = $_FILES['abstract'];
    $terms = isset($_POST['terms']);

    if (empty($firstName) || empty($lastName) || empty($email)) {
        $errors[] = "First name, last name, and email are required.";
    }

    if (!preg_match("/\.pdf$/i", $abstract['name']) || $abstract['size'] > 3 * 1024 * 1024) {
        $errors[] = "Abstract must be a PDF file (max 3MB).";
    }

    if (empty($attend)) {
        $errors[] = "Please select at least one event to attend.";
    }

    if (!$terms) {
        $errors[] = "You must agree to terms & conditions.";
    }

    if (empty($errors)) {
        echo "<p>Registration successful!</p>";
    } else {
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Online Conference Registration</title>
</head>
<body>

<h3>Online conference registration</h3>

<form method="post" action="">
    <label for="fname"> First name:
        <input type="text" name="firstName">
    </label>
    <br><br>
    <label for="lname"> Last name:
        <input type="text" name="lastName">
    </label>
    <br><br>
    <label for="email"> E-mail:
        <input type="text" name="email">
    </label>
    <br><br>
    <label for="attend"> I will attend:<br>
        <input type="checkbox" name="attend[]" value="Event1">Event 1<br>
        <input type="checkbox" name="attend[]" value="Event2">Event2<br>
        <input type="checkbox" name="attend[]" value="Event3">Event2<br>
        <input type="checkbox" name="attend[]" value="Event4">Event3<br>
    </label>
    <br><br>
    <label for="tshirt"> What's your T-Shirt size?<br>
        <select name="tshirt">
            <option value="P">Please select</option>
            <option value="S">S</option>
            <option value="M">M</option>
            <option value="L">L</option>
            <option value="XL">XL</option>
        </select>
    </label>
    <br><br>
    <label for="abstract"> Upload your abstract<br>
        <input type="file" name="abstract"/>
    </label>
    <br><br>
    <input type="checkbox" name="terms" value="">I agree to terms & conditions.<br>
    <br><br>
    <input type="submit" name="submit" value="Send registration"/>
</form>
</body>
</html>