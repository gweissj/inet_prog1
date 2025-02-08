<?php
require_once 'Database.php';

class ClientModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Получение всех клиентов
    public function getClients() {
        $sql = "SELECT * FROM Clients";
        $stmt = $this->db->connect()->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Добавление клиента
    public function addClient($First_name, $Last_name, $Patronymic, $Date_of_birth, $Phone_number, $Passport_number, $Email, $Gender) {
        $sql = "INSERT INTO Clients (First_name, Last_name, Patronymic, Date_of_birth, Phone_number, Passport_number, Email, Gender)
                VALUES (:First_name, :Last_name, :Patronymic, :Date_of_birth, :Phone_number, :Passport_number, :Email, :Gender)";
        $stmt = $this->db->connect()->prepare($sql);
        $stmt->bindParam(':First_name', $First_name);
        $stmt->bindParam(':Last_name', $Last_name);
        $stmt->bindParam(':Patronymic', $Patronymic);
        $stmt->bindParam(':Date_of_birth', $Date_of_birth);
        $stmt->bindParam(':Phone_number', $Phone_number);
        $stmt->bindParam(':Passport_number', $Passport_number);
        $stmt->bindParam(':Email', $Email);
        $stmt->bindParam(':Gender', $Gender);
        return $stmt->execute();
    }

    // Обновление клиента
    public function updateClient($ID_client, $First_name, $Last_name, $Patronymic, $Date_of_birth, $Phone_number, $Passport_number, $Email, $Gender) {
        $sql = "UPDATE Clients SET First_name = :First_name, Last_name = :Last_name, Patronymic = :Patronymic,
                Date_of_birth = :Date_of_birth, Phone_number = :Phone_number, Passport_number = :Passport_number,
                Email = :Email, Gender = :Gender WHERE ID_client = :ID_client";
        $stmt = $this->db->connect()->prepare($sql);
        $stmt->bindParam(':ID_client', $ID_client);
        $stmt->bindParam(':First_name', $First_name);
        $stmt->bindParam(':Last_name', $Last_name);
        $stmt->bindParam(':Patronymic', $Patronymic);
        $stmt->bindParam(':Date_of_birth', $Date_of_birth);
        $stmt->bindParam(':Phone_number', $Phone_number);
        $stmt->bindParam(':Passport_number', $Passport_number);
        $stmt->bindParam(':Email', $Email);
        $stmt->bindParam(':Gender', $Gender);
        return $stmt->execute();
    }

    // Удаление клиента
    public function deleteClient($ID_client) {
        $sql = "DELETE FROM Clients WHERE ID_client = :ID_client";
        $stmt = $this->db->connect()->prepare($sql);
        $stmt->bindParam(':ID_client', $ID_client);
        return $stmt->execute();
    }
}
?>