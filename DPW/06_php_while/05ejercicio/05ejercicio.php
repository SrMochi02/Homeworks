<?php
$product = 0;
$counter = 1;

if(isset($_POST["numValue"])) {

	$number_multiply = $_POST["numValue"];
	$limit_multiply = $_POST["numLimit"];
}
else {
	die ("Error: failed load data");
}


echo "<table border='1' cellspacing='1' cellpading='1'>";
while ($counter <= $limit_multiply) {

	$product = $number_multiply * $counter;
	echo "<tr>";
	echo "<td>{$number_multiply} x {$counter} = {$product}</td>";
	echo "</tr>";
	$counter++;

}
echo "</table>";

?>
