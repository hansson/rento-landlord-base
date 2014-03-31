<?php
class Contact {
    public $name = '';
    public $position = '';
    public $email = '';
    public $phone = '';
    public $imageName = '';
    public $id = '';

    public function get_json() {
        return json_encode(get_object_vars($this));
    }
}
?>