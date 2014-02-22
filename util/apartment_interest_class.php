<?php
class ApartmentInterest {
    public $object = '';
    public $address = '';
    public $apartmentId = 0;
    public $interestCount = 0;

    public function get_json() {
        return json_encode(get_object_vars($this));
    }
}
?>