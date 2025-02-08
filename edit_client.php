<?php
require_once 'ClientModel.php';

$clientModel = new ClientModel();

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
    header('Location: clients.php');
}

$ID_client = $_GET['ID_client'];
$client = $clientModel->getClientById($ID_client);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактирование клиента</title>
</head>
<body>
    <h1>Редактирование клиента</h1>
    <form method="POST">
        <input type="hidden" name="ID_client" value="<?= $client['ID_client'] ?>">
        <input type="text" name="First_name" value="<?= $client['First_name'] ?>" required>
        <input type="text" name="Last_name" value="<?= $client['Last_name'] ?>" required>
        <input type="text" name="Patronymic" value="<?= $client['Patronymic'] ?>">
        <input type="date" name="Date_of_birth" value="<?= $client['Date_of_birth'] ?>" required>
        <input type="text" name="Phone_number" value="<?= $client['Phone_number'] ?>" required>
        <input type="number" name="Passport_number" value="<?= $client['Passport_number'] ?>" required>
        <input type="email" name="Email" value="<?= $client['Email'] ?>" required>
        <select name="Gender" required>
            <option value="0" <?= $client['Gender'] == 0 ? 'selected' : '' ?>>Мужской</option>
            <option value="1" <?= $client['Gender'] == 1 ? 'selected' : '' ?>>Женский</option>
        </select>
        <button type="submit" name="update">Обновить</button>
    </form>
</body>
</html>