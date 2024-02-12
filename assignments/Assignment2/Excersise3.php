<?php
$htmlstring = "<table border='1'>"; 
$numberofcells = 5;
$numberofrows = 15;


for ($row = 1; $row <= $numberofrows; $row++) {
    $htmlstring .= "<tr>"; 
for ($cell = 1; $cell <= $numberofcells; $cell++) {
        $htmlstring .= "<td>Row $row Cell $cell</td>"; 
    }
    $htmlstring .= "</tr>"; 
}

$htmlstring .= "</table>"; 

echo $htmlstring;
?>

