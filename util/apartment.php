<?php
class Apartment {
    // property declaration
    public $address = '';
    public $rent = 0;
    public $size = 0;
    public $rooms = 0;
    public $floor = '1';
    public $elevator = '';
    public $city = '';
    public $area = '';
    public $freeFrom = '';
    public $summary = '';

    // method declaration
    public function get_json() {
        return json_encode(get_object_vars($this));
    }
}
?>