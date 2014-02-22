<?php
class Interest {
    //personal
    public $name = '';
    public $socialSecurity = '';
    public $address = '';
    public $postalNumber = '';
    public $city = '';
    public $phone = '';
    public $email = '';
    public $company = '';
    public $trade = '';
    public $yearlyIncome = '';

    //boolean
    public $smoker = '';
    public $animals = '';
    public $singleApplicant = '';

    //general
    public $apartmentId = '';
    public $id = '';

    public function get_json() {
        return json_encode(get_object_vars($this));
    }
}
?>