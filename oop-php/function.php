<?php
function hw() {
echo"Hello, World";
};
// hw();

// $add =  function($a, $b) {
//     return $a + $b;
// };
// echo $add(5 , 5);

// $array_add = function($numbers){
//     $total = 0;
//     foreach($numbers as $number){
//         $total += $number; 
//     };
// return $total;
// };
// echo $array_add([5, 10]);

if(isset($_POST["btn"])){
    hw();
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fuction</title>
</head>
<body>
    <form action="" method="post">

    <button name="btn">Hemlo</button>

    </form>
</body>
</html>