<?php
class Client {
    public $ID_client;
    public $First_name;
    public $Last_name;
    public $Patronymic;
    public $Date_of_birth;
    public $Phone_number;
    public $Passport_number;
    public $Email;
    public $Gender;

    public function __construct(
        $ID_client = null,
        $First_name = '',
        $Last_name = '',
        $Patronymic = '',
        $Date_of_birth = '',
        $Phone_number = '',
        $Passport_number = null,
        $Email = '',
        $Gender = 0
    ) {
        $this->ID_client = $ID_client;
        $this->First_name = $First_name;
        $this->Last_name = $Last_name;
        $this->Patronymic = $Patronymic;
        $this->Date_of_birth = $Date_of_birth;
        $this->Phone_number = $Phone_number;
        $this->Passport_number = $Passport_number;
        $this->Email = $Email;
        $this->Gender = $Gender;
    }
}
?>