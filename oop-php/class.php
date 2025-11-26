<?php
class multiply {
    public $num1;
    public $num2;

    public function __construct($num1, $num2) {
        $this->num1 = $num1;
        $this->num2 = $num2;
    }

    public function mult() {
        return 'The result of multiplying num 1 & 2 is = '. 
        ($this->num1 * $this->num2);
    }

};

$mul = new multiply(2,2);
echo $mul -> mult();

?>
