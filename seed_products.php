<?php
//$servername = "127.0.0.1";  // Заменено localhost на 127.0.0.1 для избежания проблем с сокетами
//$username = "root";
//$password = "1234";
//$dbname = "unrealDB";
//
//// Создание соединения
//$conn = new mysqli($servername, $username, $password, $dbname);
//
//// Проверка соединения
//if ($conn->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
//}
//
//// Количество записей для вставки
//$totalRecords = 1000000;
//$batchSize = 10000;
//
//$brands = ['Toyota', 'Honda', 'Ford', 'BMW', 'Mercedes', 'Nissan', 'Hyundai', 'Kia', 'Chevrolet', 'Volkswagen'];
//$prices = [100000, 150000, 200000, 250000, 300000, 350000, 400000, 450000, 500000];
//$mileages = [10000, 50000, 100000, 200000, 300000, 400000];
//
//$insertedRecords = 0;
//
//// Функция для отображения прогресса
//function showProgress($current, $total) {
//    $percent = ($current / $total) * 100;
//    $bar = floor($percent / 2);
//    $progress = str_repeat('=', $bar) . str_repeat(' ', 50 - $bar);
//    printf("\r[%s] %d%% (%d/%d)", $progress, $percent, $current, $total);
//}
//
//// Вставка данных партиями
//while ($insertedRecords < $totalRecords) {
//    $values = [];
//    for ($j = 0; $j < $batchSize; $j++) {
//        $brand = $brands[array_rand($brands)];
//        $price = $prices[array_rand($prices)];
//        $mileage = $mileages[array_rand($mileages)];
//        $values[] = "('$brand', $price, $mileage, NOW(), NOW())";
//    }
//
//    $sql = "INSERT INTO products (name, price, mileage, created_at, updated_at) VALUES " . implode(", ", $values);
//
//    if ($conn->query($sql) === TRUE) {
//        $insertedRecords += $batchSize;
//        showProgress($insertedRecords, $totalRecords);
//    } else {
//        echo "\nError: " . $sql . "\n" . $conn->error;
//        break;
//    }
//}
//
//echo "\nSeeding completed successfully.\n";
//
//// Закрытие соединения
//$conn->close();



//$servername = "127.0.0.1";  // Заменено localhost на 127.0.0.1 для избежания проблем с сокетами
//$username = "root";
//$password = "1234";
//$dbname = "unrealDB";
//
//// Создание соединения
//$conn = new mysqli($servername, $username, $password, $dbname);
//
//// Проверка соединения
//if ($conn->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
//}
//
//// Количество записей для удаления
//$totalRecords = 1000000;
//// Размер одной партии для удаления
//$batchSize = 10000;
//
//$deletedRecords = 0;
//
//// Функция для отображения прогресса
//function showProgress($current, $total)
//{
//    $percent = ($current / $total) * 100;
//    $bar = floor($percent / 2);
//    $progress = str_repeat('=', $bar) . str_repeat(' ', 50 - $bar);
//    printf("\r[%s] %d%% (%d/%d)", $progress, $percent, $current, $total);
//}
//
//// Удаление данных партиями
//while ($deletedRecords < $totalRecords) {
//    // Удаляем партию записей, ограничивая запрос по ID или LIMIT
//    $sql = "DELETE FROM products ORDER BY id LIMIT $batchSize";
//
//    if ($conn->query($sql) === TRUE) {
//        $deletedRecords += $batchSize;
//        showProgress($deletedRecords, $totalRecords);
//    } else {
//        echo "\nError: " . $sql . "\n" . $conn->error;
//        break;
//    }
//}
//
//echo "\nDeletion completed successfully.\n";
//
//$conn->close();

$servername = "127.0.0.1";
$username = "root";
$password = "1234";
$dbname = "unrealDB";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$totalProducts = 1000000;
$batchSize = 10000;

$properties = [
    'Тип двигателя' => ['бензин', 'дизель', 'электро'],
    'Привод' => ['задний', 'передний', 'полный'],
    'Коробка передач' => ['механика', 'автомат'],
    'Объем двигателя' => ['1.6', '2.0', '3.0', '4.0'],
    'Расход топлива' => ['5', '7', '10', '15'],
    'Цвет' => ['красный', 'синий', 'черный', 'белый'],
    'Кузов' => ['седан', 'хэтчбек', 'универсал', 'внедорожник']
];

$propertyIds = [];
$result = $conn->query("SELECT id, name FROM properties");

while ($row = $result->fetch_assoc()) {
    $propertyIds[$row['name']] = $row['id'];
}

foreach (array_keys($properties) as $propertyName) {
    if (!isset($propertyIds[$propertyName])) {
        die("Property '$propertyName' not found in the database.");
    }
}

function showProgress($current, $total): void
{
    $percent = ($current / $total) * 100;
    $bar = floor($percent / 2);
    $progress = str_repeat('=', $bar) . str_repeat(' ', 50 - $bar);
    printf("\r[%s] %d%% (%d/%d)", $progress, $percent, $current, $total);
}

$insertedProducts = 0;
$totalRecords = $totalProducts * count($properties);
$currentRecords = 0;

while ($insertedProducts < $totalProducts) {
    $values = [];
    for ($i = 0; $i < $batchSize; $i++) {
        $productId = 2000001 + $insertedProducts + $i;

        foreach ($properties as $propertyName => $propertyValues) {
            $propertyId = $propertyIds[$propertyName];
            $value = $propertyValues[array_rand($propertyValues)];
            $values[] = "($productId, $propertyId, '$value', NOW(), NOW())";
            $currentRecords++;
        }
    }

    $sql = "INSERT INTO product_properties (product_id, property_id, value, created_at, updated_at) VALUES " . implode(", ", $values);

    if ($conn->query($sql) === TRUE) {
        $insertedProducts += $batchSize;
        showProgress($currentRecords, $totalRecords);
    } else {
        echo "\nError: " . $sql . "\n" . $conn->error;
        break;
    }
}

echo "\nSeeding completed successfully.\n";

$conn->close();



//$servername = "127.0.0.1";
//$username = "root";
//$password = "1234";
//$dbname = "unrealDB";
//
//// Создание соединения
//$conn = new mysqli($servername, $username, $password, $dbname);
//
//// Проверка соединения
//if ($conn->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
//}
//
//// Характеристики и их возможные значения
//$properties = [
//    'Тип двигателя' => ['бензин', 'дизель', 'электро'],
//    'Привод' => ['задний', 'передний', 'полный'],
//    'Коробка передач' => ['механика', 'автомат'],
//    'Объем двигателя' => ['1.6', '2.0', '3.0', '4.0'],
//    'Расход топлива' => ['5', '7', '10', '15'],
//    'Цвет' => ['красный', 'синий', 'черный', 'белый'],
//    'Пробег' => ['10000', '50000', '100000', '150000'],
//    'Кузов' => ['седан', 'хэтчбек', 'универсал', 'внедорожник']
//];
//
//// Получаем ID всех свойств из таблицы properties
//$propertyIds = [];
//$result = $conn->query("SELECT id, name FROM properties");
//
//while ($row = $result->fetch_assoc()) {
//    $propertyIds[$row['name']] = $row['id'];
//}
//
//// Получаем все уникальные комбинации property_id и value
//$uniqueValues = [];
//
//foreach ($properties as $propertyName => $propertyValues) {
//    $propertyId = $propertyIds[$propertyName] ?? null;
//
//    if ($propertyId) {
//        foreach ($propertyValues as $value) {
//            // Собираем уникальные комбинации
//            $uniqueValues[] = "($propertyId, '$value')";
//        }
//    }
//}
//
//function showProgress($current, $total): void
//{
//    $percent = ($current / $total) * 100;
//    $bar = floor($percent / 2);
//    $progress = str_repeat('=', $bar) . str_repeat(' ', 50 - $bar);
//    printf("\r[%s] %d%% (%d/%d)", $progress, $percent, $current, $total);
//}
//
//// Вставка данных в property_list
//$totalValues = count($uniqueValues);
//$batchSize = 10000; // Размер партии
//$insertedRecords = 0;
//
//while ($insertedRecords < $totalValues) {
//    // Берем следующую партию значений
//    $batchValues = array_splice($uniqueValues, 0, $batchSize);
//
//    // Строим SQL запрос для вставки
//    $sqlInsert = "INSERT INTO properties_list (property_id, value) VALUES " . implode(", ", $batchValues);
//
//    // Выполняем запрос
//    if ($conn->query($sqlInsert) === TRUE) {
//        $insertedRecords += count($batchValues);
//        showProgress($insertedRecords, $totalValues);
//    } else {
//        echo "\nError: " . $sqlInsert . "\n" . $conn->error;
//        break;
//    }
//}
//
//echo "\nSeeding completed successfully.\n";
//
//// Закрытие соединения
//$conn->close();
//


