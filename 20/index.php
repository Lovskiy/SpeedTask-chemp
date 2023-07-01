<?php

$db = new PDO('mysql:host=127.0.0.1;dbname=20', 'root', '');

$sql = "SELECT orders.order_id, users.user_id, users.username, orders.order_time, books.book_id, books.book_title
        FROM orders
        INNER JOIN users ON orders.user_id = users.user_id
        INNER JOIN books ON orders.book_id = books.book_id";

$result = $db->query($sql);

$br = "<br>";

if ($result->rowCount() > 0) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "Идентификатор заказа: " . $row["order_id"] . $br;
        echo "Идентификатор пользователя: " . $row["user_id"] . $br;
        echo "Имя пользователя: " . $row["username"] . $br;
        echo "Время заказа: " . $row["order_time"] . $br;
        echo "Идентификатор книги: " . $row["book_id"] . $br;
        echo "Название книги: " . $row["book_title"] . $br;
        echo $br;
    }
} else {
    echo "Отсутствуют заказанные книги";
}