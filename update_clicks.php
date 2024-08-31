<?php
$servername = "localhost"; // або IP адреса вашого сервера
$username = "root";        // ваше ім'я користувача MySQL
$password = "";            // ваш пароль MySQL
$dbname = "unis2-clicker"; // ім'я вашої бази даних

// Створення підключення
$conn = new mysqli($servername, $username, $password, $dbname);

// Перевірка підключення
if ($conn->connect_error) {
    die("Підключення не вдалося: " . $conn->connect_error);
}

// Оновлення кількості кліків
$sql = "UPDATE clicks SET count = count + 1 WHERE id = 1";
$conn->query($sql);

// Отримання нової кількості кліків
$sql = "SELECT count FROM clicks WHERE id = 1";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

echo json_encode(array('count' => $row['count']));

// Закриття з'єднання
$conn->close();
?>
