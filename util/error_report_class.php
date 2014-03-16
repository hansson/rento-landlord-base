<?php
class ErrorReport {
    public $name = '';
    public $socialSecurity = '';
    public $address = '';
    public $phone = '';
    public $email = '';
    public $apartmentNumber = '';
    public $email = '';
    public $masterKeyAllowed = '';
    public $summary = '';
    public $id = '';

    public function get_json() {
        return json_encode(get_object_vars($this));
    }
}
?>