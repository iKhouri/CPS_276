<?php
$htmlstring = '<ul>';
$Mainlistitems = 4; 
$Sublistitems = 5;  

for ($i = 1; $i <= $Mainlistitems; $i++) {
    $htmlstring .= "<li>$i<ul>";

    
    for ($j = 1; $j <= $Sublistitems; $j++) {
        $htmlstring .= "<li>$j</li>";
    }
    $htmlstring .= '</ul></li>';
}

$htmlstring .= '</ul>';

echo $htmlstring;
?>
