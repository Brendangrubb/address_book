<?php
class Contact
{
    private $name;
    private $number;
    private $address;
    private $acquaintance;

    function __construct($name, $number, $address, $acquaintance) {
        $this->name = $name;
        $this->number = $number;
        $this->address = $address;
        $this->acquaintance = $acquaintance;
    }

    function setName($new_name) {
        $this->name = $new_name;
    }

    function setNumber($new_number) {
        $this->number = $new_number;
    }

    function setAddress($new_address) {
        $this->address = $new_address;
    }

    function setAcquaintance($new_acquaintance) {
        $this->acquaintance = $new_acquaintance;
    }

    function getName() {
        return $this->name;
    }

    function getNumber() {
        return $this->number;
    }

    function getAddress() {
        return $this->address;
    }

    function getAcquaintance() {
        return $this->acquaintance;
    }

    function save() {
        array_push($_SESSION['list_of_contacts'], $this);
    }

    static function getAll() {
        return $_SESSION['list_of_contacts'];
    }

    static function deleteAll() {
        $_SESSION['list_of_contacts'] = array();
    }
}
?>
