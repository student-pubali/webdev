<?php
function printArray($array, $message) {
    $output = $message . ":\n";
    foreach ($array as $key => $value) {
        $output .= "[$key] => $value\n";
    }
    $output .= "-----------------\n";
    echo nl2br($output); 
}

$array = ["Toyota", "Honda", "Ford"];
printArray($array, "Original Array");

$array[] = "BMW";
printArray($array, "Array after inserting 'BMW'");

$key = array_search("Honda", $array);
if ($key !== false) {
    $array[$key] = "Hyundai";
}
printArray($array, "Array after updating 'Honda' to 'Hyundai'");

$key = array_search("Ford", $array);
if ($key !== false) {
    unset($array[$key]);
}
printArray($array, "Array after deleting 'Ford'");

$array = array_values($array);
printArray($array, "Array after re-indexing");
?>
