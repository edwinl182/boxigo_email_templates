<?php

$color = $_SESSION[$favcolor];

 switch ($color) {
    case "red":
        echo "Your favorite color is red!  From dummy page";
        break;
    case "blue":
        echo "Your favorite color is blue!  From dummy page";
        break;
    case "green":
        echo "Your favorite color is green!  From dummy page";
        break;
    default:
        echo "Your favorite color is neither red, blue, nor green!";
}
 
?>