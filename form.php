<?php
require 'db-connect.php';

if (
    isset($_POST["first_name"]) && isset($_POST["your_address"]) &&
    isset($_POST["email"]) && isset($_POST["phone"])
) {

    $first_name = htmlentities(mysqli_real_escape_string($link, $_POST['first_name']));
    $your_address = htmlentities(mysqli_real_escape_string($link, $_POST['your_address']));

    if (!empty($_POST['email'])) {

        $email = trim(htmlspecialchars(mysqli_real_escape_string($link, $_POST['email'])));
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);

        if ($email === false) {
            exit('Почта введена не верно <a href="">Назад</a>');
        }
    }
    $phone = htmlentities(mysqli_real_escape_string($link, $_POST['phone']));

    $query = "INSERT INTO formweb (first_name, your_address, email, phone) 
VALUES ('$first_name', '$your_address', '$email', '$phone')";

    if (mysqli_query($link, $query)) {
        echo "Данные успешно добавлены";
    } else {
        echo "Ошибка: " . mysqli_error($link);
    }
    mysqli_close($link);
}
