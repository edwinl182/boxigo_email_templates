<!DOCTYPE html>
<html>
<body>

<?php
session_start();
$favcolor = "red";

switch ($favcolor) {
    case "red":
        include_once  '../mailer.php';
        $_SESSION[$favcolor]= 'red';
        break;
    case "blue":
        include_once  '../try/dummy.php';
        $_SESSION[$favcolor] = 'blue';
        break;
    case "green":
        include_once  '../try/dummy.php';
        $_SESSION[$favcolor] = 'green';
        break;
    default:
        echo "Your favorite color is neither red, blue, nor green!";
}
?>
 
</body>
</html>