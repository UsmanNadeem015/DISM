<?php
// Parent
class genre {
    public $genre;
    public function __construct($genre) {
        $this->genre = $genre;
    }
    
    public function get_genre() {
        return "The genre of this show is ". $this->genre;
    }
};

// Child 1
class fallout extends genre{
    public $type;

    public function __construct($type) {
        parent::__construct("video game adaptation");
        $this-> type = $type;
    }
    public function get_type() {
        return 'This show is a ' . $this->type;
    }
};

$showName=new fallout('web series');
echo $showName->get_genre();
echo '<br>';
echo $showName->get_type();
?>