<?php

$counter = 0;
$counter2 = 0;
if(isset($_POST["numColumns"])) {

	$num_columns = $_POST["numColumns"];
	$num_rows = $_POST["numRows"];
} else {
	die ("Error: failed load data");
}

echo "<table border='1' cellpading='1' cellspacing='1'>";

for ($counter = 1; $counter <= $num_rows; $counter++) {

	echo "<tr color='black' height='5' width='5'>";
	for ($counter2 = 1; $counter2 <= $num_columns; $counter2++) {
		echo "<td color='white' height='50' width='50'></td>";
	}
	echo "</tr>";
}

echo "</table>";
?>
