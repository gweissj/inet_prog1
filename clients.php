<?php
require_once 'ClientModel.php';

$clientModel = new ClientModel();

// Обработка добавления клиента
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add'])) {
    $clientModel->addClient(
        $_POST['First_name'],
        $_POST['Last_name'],
        $_POST['Patronymic'],
        $_POST['Date_of_birth'],
        $_POST['Phone_number'],
        $_POST['Passport_number'],
        $_POST['Email'],
        $_POST['Gender']
    );
}

// Обработка обновления клиента
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $clientModel->updateClient(
        $_POST['ID_client'],
        $_POST['First_name'],
        $_POST['Last_name'],
        $_POST['Patronymic'],
        $_POST['Date_of_birth'],
        $_POST['Phone_number'],
        $_POST['Passport_number'],
        $_POST['Email'],
        $_POST['Gender']
    );
}

// Обработка удаления клиента
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['delete'])) {
    $clientModel->deleteClient($_GET['delete']);
}

$clients = $clientModel->getClients();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Клиенты</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 10px; text-align: left; }
        form { margin-bottom: 20px; }
    </style>
</head>
<body>
    <h1>Клиенты</h1>

    <!-- Форма добавления клиента -->
    <form method="POST">
        <input type="text" name="First_name" placeholder="Имя" required>
        <input type="text" name="Last_name" placeholder="Фамилия" required>
        <input type="text" name="Patronymic" placeholder="Отчество">
        <input type="date" name="Date_of_birth" required>
        <input type="text" name="Phone_number" placeholder="Телефон" required>
        <input type="number" name="Passport_number" placeholder="Номер паспорта" required>
        <input type="email" name="Email" placeholder="Email" required>
        <select name="Gender" required>
            <option value="0">Мужской</option>
            <option value="1">Женский</option>
        </select>
        <button type="submit" name="add">Добавить</button>
    </form>

    <!-- Таблица клиентов -->
    <table>
        <tr>
            <th>ID</th>
            <th>Имя</th>
            <th>Фамилия</th>
            <th>Отчество</th>
            <th>Дата рождения</th>
            <th>Телефон</th>
            <th>Паспорт</th>
            <th>Email</th>
            <th>Пол</th>
            <th>Действия</th>
        </tr>
        <?php foreach ($clients as $client): ?>
        <tr>
            <td><?= $client['ID_client'] ?></td>
            <td><?= $client['First_name'] ?></td>
            <td><?= $client['Last_name'] ?></td>
            <td><?= $client['Patronymic'] ?></td>
            <td><?= $client['Date_of_birth'] ?></td>
            <td><?= $client['Phone_number'] ?></td>
            <td><?= $client['Passport_number'] ?></td>
            <td><?= $client['Email'] ?></td>
            <td><?= $client['Gender'] ? 'Женский' : 'Мужской' ?></td>
            <td>
                <a href="?delete=<?= $client['ID_client'] ?>">Удалить</a>
                <a href="edit_client.php?ID_client=<?= $client['ID_client'] ?>">Редактировать</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>