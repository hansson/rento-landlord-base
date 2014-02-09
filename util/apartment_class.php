<?php
class Apartment {
    public $address = '';
    public $rent = '';
    public $size = '';
    public $rooms = '';
    public $floor = '';
    public $elevator = '';
    public $city = '';
    public $area = '';
    public $freeFrom = '';
    public $summary = '';
    public $imageName = '';
    public $id = '';

    public function get_json() {
        return json_encode(get_object_vars($this));
    }
}
?>